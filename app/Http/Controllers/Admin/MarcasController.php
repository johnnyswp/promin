<?php

namespace App\Http\Controllers\Admin;



use Validator;

use DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;

use Illuminate\Http\Request;

use App\Models\Admin\Marca;

use App\Models\Admin\TipoProducto;
use App\Models\Admin\LineaNegocio;
use Illuminate\Validation\Rule;
use Form;

use Auth;



class MarcasController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {  

        if($request->buscar!=""){

            $marcas = DB::table('marcas')->join('tipos_productos', 'tipos_productos.id', '=', 'marcas.tipo_producto_id')
                                         ->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id')

            ->where('marcas.nombre','like','%'.$request->buscar.'%')

            ->orWhere('tipos_productos.nombre','like','%'.$request->buscar.'%');

        }else{

            $marcas = DB::table('marcas')->join('tipos_productos', 'tipos_productos.id', '=', 'marcas.tipo_producto_id')
                                         ->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id');

        }

        if($request->order=="asc" or $request->order=="desc"){
            if($request->filtro=="linea"){
                $marcas = $marcas->orderBy('linea_negocios.nombre',$request->order);
            }elseif($request->filtro=="tipo"){
                $marcas = $marcas->orderBy('tipos_productos.nombre',$request->order);
            }else{
                $marcas = $marcas->orderBy('marcas.nombre',$request->order);
            }
        }elseif($request->order=="new"){
            if($request->filtro=="linea"){
                $marcas = $marcas->orderBy('linea_negocios.created_at','DESC');
            }elseif($request->filtro=="tipo"){
                $marcas = $marcas->orderBy('tipos_productos.created_at','DESC');
            }else{
                $marcas = $marcas->orderBy('marcas.created_at','DESC');
            }
        }elseif($request->order=="old"){
            if($request->filtro=="linea"){
                $marcas = $marcas->orderBy('linea_negocios.created_at','ASC');
            }elseif($request->filtro=="tipo"){
                $marcas = $marcas->orderBy('tipos_productos.created_at','ASC');
            }else{
                $marcas = $marcas->orderBy('marcas.created_at','ASC');
            }
        }else{
            if($request->filtro=="linea"){
                $marcas = $marcas->orderBy('linea_negocios.nombre','ASC');
            }elseif($request->filtro=="tipo"){
                $marcas = $marcas->orderBy('tipos_productos.nombre','DESC');
            }else{
                $marcas = $marcas->orderBy('marcas.nombre','DESC');
            }
            
        }

        
        $marcas = $marcas->select('marcas.nombre as nombre', 'tipos_productos.nombre as tipo', 'linea_negocios.nombre as linea', 'marcas.created_at as created_at', 'marcas.id as id')
                        ->groupBy('marcas.id');

         if($request->numb!=""){

            $marcas = $marcas->paginate($request->numb);

        }else{

            $marcas = $marcas->paginate(100);

        }



        return view('admin.pages.marcas.index')->with(['marcas'=>$marcas,'input'=>$request]);



    }

    



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()
    {
        $lineas = LineaNegocio::orderBy('nombre','ASC')->pluck('nombre', 'id')->toArray();

        if(old('linea_negocio_id')!=""){
            $tipos = TipoProducto::orderBy('nombre', 'ASC')->where('linea_negocio_id',old('linea_negocio_id'))->orderBy('nombre','ASC')->pluck('nombre', 'id')->toArray();
        }else{
            $tipos = TipoProducto::orderBy('nombre', 'ASC')->where('linea_negocio_id',key($lineas))->orderBy('nombre','ASC')->pluck('nombre', 'id')->toArray();
        }

        return view('admin.pages.marcas.new')->with(['tipos'=>$tipos,'lineas'=>$lineas]);

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {



        $validator = Validator::make($request->all(), [

            'tipo_producto_id' => 'required|min:1|max:12',

            'nombre' => [
                'required',
                Rule::unique('marcas')->where('tipo_producto_id', $request->tipo_producto_id),
            ],

        ]);



        if ($validator->fails()) {

            return redirect()->back()

                        ->withErrors($validator)

                        ->withInput();

        }



        $marcas = new Marca;

        $marcas->tipo_producto_id = $request->tipo_producto_id;

        $marcas->nombre = $request->nombre;



        if($marcas->save()){
            session(['success' => 'Se agregó la marca '.$request->nombre]);
            return redirect()->back();

        }



    }





    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $marca = Marca::find($id);

        if($marca){

            $tipos = TipoProducto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();

            return view('admin.pages.marcas.edit')->with(['marca'=>$marca,'tipos'=>$tipos]);

        }

        return var_dump('404');

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

        $validator = Validator::make($request->all(), [

            'tipo_producto_id' => 'required|min:1|max:12',

            'nombre' => [
                'required',
                Rule::unique('marcas')->ignore($id)->where('tipo_producto_id', $request->tipo_producto_id),
            ],

        ]);



        if ($validator->fails()) {

            return redirect()->back()

                        ->withErrors($validator)

                        ->withInput();

        }



        $marca = Marca::find($id);

        if(!$marca){

            return var_dump('404');

        }



        $marca->tipo_producto_id = $request->tipo_producto_id;

        $marca->nombre = $request->nombre;



        if($marca->save()){



            return redirect('/admin/marcas');

        }



        return var_dump('404');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {



        $tipo = Marca::find($id);

        $tipo->delete();

            return redirect('/admin/marcas');

         

 

    }

}

