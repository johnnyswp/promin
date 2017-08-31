<?php

namespace App\Http\Controllers\Admin;



use Validator;

use DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;

use Illuminate\Http\Request;

use App\Models\Admin\TipoProducto;

use App\Models\Admin\LineaNegocio;
use Illuminate\Validation\Rule;

use Form;

use Auth;



class TiposProductosController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {  

        if($request->buscar!=""){

            $tipos = DB::table('tipos_productos')->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id')

            ->where('tipos_productos.nombre','like','%'.$request->buscar.'%')

            ->orWhere('linea_negocios.nombre','like','%'.$request->buscar.'%');

        }else{

            $tipos = DB::table('tipos_productos')->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id');

        }

        $tipos = $tipos->select('tipos_productos.nombre as tipo_producto',

                                'linea_negocios.nombre as linea',

                                'tipos_productos.created_at as created_at',

                                'tipos_productos.id as id');



        if($request->order=="asc" or $request->order=="desc"){
            if($request->filtro=="linea"){
                $tipos = $tipos->orderBy('linea_negocios.nombre',$request->order);
            }else{
                $tipos = $tipos->orderBy('tipos_productos.nombre',$request->order);
            }
        }elseif($request->order=="new"){
            if($request->filtro=="linea"){
                $tipos = $tipos->orderBy('linea_negocios.created_at','DESC');
            }else{
                $tipos = $tipos->orderBy('tipos_productos.created_at','DESC');
            }
        }elseif($request->order=="old"){
            if($request->filtro=="linea"){
                $tipos = $tipos->orderBy('linea_negocios.created_at','ASC');
            }else{
                $tipos = $tipos->orderBy('tipos_productos.created_at','ASC');
            }
        }else{
            if($request->filtro=="linea"){
                $tipos = $tipos->orderBy('linea_negocios.nombre','ASC');
            }else{
                $tipos = $tipos->orderBy('tipos_productos.nombre','ASC');
            }
            
        }

        $tipos = $tipos->groupBy('tipos_productos.id');

        if($request->numb!=""){

            $tipos = $tipos->paginate($request->numb);

        }else{

            $tipos = $tipos->paginate(100);

        }



        return view('admin.pages.tipos-productos.index')->with(['tipos'=>$tipos, 'input'=>$request]);



    }

    



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $lineas = LineaNegocio::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();

        return view('admin.pages.tipos-productos.new')->with(['lineas'=>$lineas]);

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

            'linea_negocio_id' => 'required|min:1|max:12',

            'nombre' => [
                'required',
                Rule::unique('tipos_productos')->where('linea_negocio_id', $request->linea_negocio_id),
            ],

            'descripcion' => 'required'

        ]);



        if ($validator->fails()) {

            return redirect()->back()

                        ->withErrors($validator)

                        ->withInput();

        }



        $linea = new TipoProducto;

        $linea->linea_negocio_id = $request->linea_negocio_id;

        $linea->nombre = $request->nombre;

        $linea->descripcion = $request->descripcion;



        if($linea->save()){
            session(['success' => 'Se agregó el tipo de producto '.$request->nombre]);
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

        $tipo = TipoProducto::find($id);

        if($tipo){

            $lineas = LineaNegocio::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();

            return view('admin.pages.tipos-productos.edit')->with(['tipo'=>$tipo,'lineas'=>$lineas]);

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

            'linea_negocio_id' => 'required|min:1|max:12',

            'nombre' => ['required', Rule::unique('tipos_productos')->ignore($id)->where('linea_negocio_id', $request->linea_negocio_id)],

            'descripcion' => 'required',

        ]);



        if ($validator->fails()) {

            return redirect()->back()

                        ->withErrors($validator)

                        ->withInput();

        }



        $tipo = TipoProducto::find($id);

        if(!$tipo){

            return var_dump('404');

        }



        $tipo = TipoProducto::find($id);

        $tipo->linea_negocio_id = $request->linea_negocio_id;

        $tipo->nombre = $request->nombre;

        $tipo->descripcion = $request->descripcion;



        if($tipo->save()){



            return redirect('/admin/tipos-productos');

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



        $tipo = TipoProducto::find($id);

        $tipo->delete();

            return redirect('/admin/tipos-productos');

         

 

    }

}

