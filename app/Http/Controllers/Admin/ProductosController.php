<?php

namespace App\Http\Controllers\Admin;



use Validator;

use DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Admin\LineaNegocio;

use App\Models\Admin\TipoProducto;

use App\Models\Admin\Producto;
use App\Models\Admin\Imagen;
use App\Models\Admin\Gasto;
use App\Models\Admin\Bitacora;
use App\Models\Admin\Documento;
use App\Models\Admin\Marca;
use App\Models\Admin\Modelo;
use Carbon\Carbon;
use App\Models\Role;

use Form;

use Auth;



class ProductosController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
        $lineas['all'] = "Todas";
    	$ls = LineaNegocio::orderBy('nombre', 'ASC')->get();
        foreach ($ls as $linea) {
           $lineas[$linea->id] = $linea->nombre;
        }
        
        $tipos['all'] = "Todas";
        $ts = TipoProducto::orderBy('nombre', 'ASC')->get();
        foreach ($ts as $tipo) {
           $tipos[$tipo->id] = $tipo->nombre;
        }

        $productos = new Producto;

        if($request->linea!='all' and $request->linea!=""){
            $productos= $productos->where('linea_negocio_id', $request->linea);
            $tipos = array();
            $tipos['all'] = "Todos";
            $ts = TipoProducto::where('linea_negocio_id', $request->linea)->orderBy('nombre', 'ASC')->get();
            foreach ($ts as $tipo) {
               $tipos[$tipo->id] = $tipo->nombre;
            }
        }

        if($request->tipo!='all' and $request->tipo!=""){
            $productos= $productos->where('tipo_producto_id', $request->tipo);
        }

        if($request->status!="" and $request->status!="all"){
            if($request->status=='Sin Stock'){
                $productos= $productos->where('cantidad','0');
            }elseif($request->status=='Activo'){
                $productos= $productos->where('state','public');
            }elseif($request->status=='Inactivo'){
                $productos= $productos->where('state','hidden');
            }else{
                $productos= $productos->where('status', $request->status);
            }
        }

        $productos= $productos->where('state', '!=', 'draf');

        if($request->buscar!=""){

            $productos= $productos->where('serie','like','%'.$request->buscar.'%');

        }

        if($request->category!="all" and $request->category!=""){
            $lineas = array();
            $lineas['all'] = "Todas";
            if($request->category==1){ $ls = LineaNegocio::where('tipo','mx')->orderBy('nombre', 'ASC')->get(); }else{ $ls = LineaNegocio::where('tipo','unidades')->orderBy('nombre', 'ASC')->get(); }
            foreach ($ls as $linea) { $lineas[$linea->id] = $linea->nombre; }
            $productos= $productos->where('mx',$request->category);

        }

        if($request->order=="asc" or $request->order=="desc"){

            $productos= $productos->orderBy('serie',$request->order);

        }

        if($request->order=="new"){

            $productos= $productos->orderBy('created_at', 'DESC');

        }

        if($request->order=="old"){

            $productos= $productos->orderBy('created_at', 'ASC');

        }

        if($request->numb!=""){

            $productos= $productos->paginate($request->numb);

        }else{

            $productos= $productos->paginate(100);

        }

        

        return view('admin.pages.productos.index')->with(['tipos'=>$tipos,'lineas'=>$lineas,'productos'=>$productos,'input'=>$request]);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {
        $lineas = LineaNegocio::where('tipo','mx')->get();
        if(!$producto=Producto::where('state', 'draf')->first()){
            $producto = new Producto;
            $producto->state = "draf";
            $producto->save();
        }

        Imagen::where('producto_id', $producto->id)->orderBy('order_img', 'ASC')->delete();
        $img = new Imagen;
        $img->producto_id = $producto->id;
        $img->order_img = 1;
        $img->video = 1;
        $img->picture = '/asset/images/promin_play.jpg';
        $img->save();

        $imgs = Imagen::where('producto_id', $producto->id)->orderBy('order_img', 'ASC')->get();
        $accesos = DB::table('users')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')     
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('roles.name','<>','cliente') 
                //->where('users.id','<>',Auth::user()->id) 
                ->pluck('users.name', 'users.id')->toArray();
        $accesos[''] = "Seleccione una opción";

        $tipos = array();
        $marcas = array();
        $modelos = array();

        if(old('linea_negocio_id')){
            $tipos = TipoProducto::where('linea_negocio_id', old('linea_negocio_id'))->get();
            if(old('tipo_producto_id')){
                $marcas = Marca::where('tipo_producto_id',old('tipo_producto_id'))->get();
                //var_dump($marcas);
                if(old('marcas_id')){
                    $modelos = Modelo::where('marcas_id', old('marcas_id'))->get();
                }
            }
        }

        return view('admin.pages.productos.new')->with(['imgs'=>$imgs,'tipos'=>$tipos, 'marcas'=>$marcas, 'modelos'=>$modelos, 'accesos'=>$accesos, 'lineas'=>$lineas, 'producto'=>$producto]);


    }





    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)
    {
        if(!$producto=Producto::find($id)){
            return view('404');
        }


        $gastos = Gasto::where('producto_id', $producto->id)->orderBy('created_at', 'DESC')->get();
        $imgs = Imagen::where('producto_id', $producto->id)->orderBy('order_img', 'ASC')->get();
        $accesos = DB::table('users')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')     
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('roles.name','<>','cliente')->orderBy('users.name', 'ASC') 
                //->where('users.id','<>',Auth::user()->id) 
                ->pluck('users.name', 'users.id')->toArray();
        $accesos['0'] = "Seleccione una opción";
        $bitacoras = Bitacora::where('producto_id', $producto->id)->orderBy('created_at', 'DESC')->get();
        $documentos = Documento::where('producto_id', $producto->id)->orderBy('created_at', 'DESC')->get();

        if($producto->mx==1){
        	$lineas = LineaNegocio::where('tipo','mx')->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            $lineas[' '] = "Seleccione una opción";

            $tipos = TipoProducto::where('linea_negocio_id', $producto->linea_negocio_id)->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $tipos[' '] = "Seleccione una opción";

            $marcas = Marca::where('tipo_producto_id',$producto->tipo_producto_id)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            $marcas[' '] = "Seleccione una opción";

            $modelos = Modelo::where('marcas_id', $producto->marcas_id)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            $modelos[' '] = "Seleccione una opción";

        	return view('admin.pages.productos.edit')->with(['documentos'=>$documentos, 'bitacoras'=>$bitacoras, 'accesos'=>$accesos, 'lineas'=>$lineas, 'producto'=>$producto, 'imgs'=>$imgs, 'gastos'=>$gastos, 'tipos'=>$tipos, 'marcas'=>$marcas, 'modelos'=>$modelos]);
        }else{
        	$lineas = LineaNegocio::where('tipo','unidades')->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            $lineas[' '] = "Seleccione una opción";

            $tipos = TipoProducto::where('linea_negocio_id', $producto->linea_negocio_id)->orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $tipos[' '] = "Seleccione una opción";

            $marcas = Marca::where('tipo_producto_id',$producto->tipo_producto_id)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            $marcas[' '] = "Seleccione una opción";

            $modelos = Modelo::where('marcas_id', $producto->marcas_id)->orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            $modelos[' '] = "Seleccione una opción";

        	return view('admin.pages.productos.edit-unidades')->with(['accesos'=>$accesos, 'lineas'=>$lineas, 'producto'=>$producto, 'imgs'=>$imgs, 'tipos'=>$tipos, 'marcas'=>$marcas, 'modelos'=>$modelos]);
        }
    }

    



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)
    {   
    	$producto = Producto::find($id);
        $state =  $producto->state;
        $data = array(
        	'linea_negocio_id' => 'required|max:200',
            'tipo_producto_id' => 'required|max:200',
            'marcas_id' => 'required|max:200',
            'modelo_id' => 'required|max:200',
            'serie' => 'required|max:200',
            'nFact' => 'required|max:200',
            'nPedi' => 'max:200',
            'asesor_id' => 'required|max:200',
            'priceVenta' => 'required|max:200',
            'descripcion' => 'max:160',
            'keywork' => 'max:160',
            'state' => 'required|max:200',
            'destacado' => 'max:200',
            );

        if($request->has('alto'))
            $data['alto'] = 'integer';
        if($request->has('largo'))
            $data['largo'] = 'integer';
        if($request->has('ancho'))
            $data['ancho'] = 'integer';
        if($request->has('peso'))
            $data['peso'] = 'integer';
        if($request->has('horometro'))
            $data['horometro'] = 'integer';
        if($request->has('linkMercadoLibre'))
            $data['linkMercadoLibre'] = 'url';
        if($request->has('LinkMachineryTrader'))
            $data['LinkMachineryTrader'] = 'url';
        if($request->has('link_video'))
            $data['link_video'] = 'url';

        if($state == "draf"){
        	$data['galeria'] = 'required|mimes:jpeg,bmp,png';
        }
        $validator = Validator::make($request->all(), $data);

        $gastos = $request->gastos;
        if($request->priceVenta < $gastos){
            session(['error' => 'Los gastos no pueden ser mayor al precio de venta']);
            return redirect()->back()->withInput();
        }

        if(!Imagen::where('producto_id', $producto->id)->get()){
            session(['error' => 'Seleccione una imagen en la galeria.']);
            return redirect()->back()->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        $producto->linea_negocio_id = $request->linea_negocio_id;
        $producto->tipo_producto_id = $request->tipo_producto_id;
        $producto->marcas_id = $request->marcas_id;
        $producto->modelo_id = $request->modelo_id;
        $producto->serie = $request->serie;
        $producto->nFact = $request->nFact;
        $producto->nPedi = $request->nPedi;
        $producto->horometro = $request->horometro;
        $producto->asesor_id = $request->asesor_id;
        $producto->priceVenta = $request->priceVenta;
        $producto->descripcion = $request->descripcion;
        $producto->linkMercadoLibre = $request->linkMercadoLibre;
        $producto->LinkMachineryTrader = $request->LinkMachineryTrader;
        $producto->alto = $request->alto;
        $producto->largo = $request->largo;
        $producto->ancho = $request->ancho;
        $producto->peso = $request->peso;
        $producto->keywork = $request->keywork;
        $producto->state = $request->state;
        $producto->destacado = $request->destacado;
        $producto->link_video = $request->link_video;
        $producto->nombre = 'MX '.$producto->id.' '.$producto->tipo().' '.$producto->marca().' '.$producto->modelo();
        $producto->mx = 1;
        if($state == "draf"){
            $producto->created_at = Carbon::now();
        }

        $producto->save();
        if($state == "draf"){
        	session(['state' => 'ent']);
        	return redirect('/admin/productos/'.$producto->id.'/edit');
        }
        session(['state' => 'gen']);
        return redirect()->back();
    }

    public function destroy($id){
        $user = Producto::find($id);
        $user->delete();
        return redirect('/admin/productos');
    }

}

