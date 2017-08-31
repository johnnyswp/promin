<?php

namespace App\Http\Controllers\Admin;



use Validator;

use DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;

use Illuminate\Http\Request;

use App\Models\Admin\Marca;

use App\Models\Admin\Modelo;

use App\Models\Admin\TipoProducto;
use Illuminate\Validation\Rule;
use Form;

use Auth;



class ModelosController extends Controller
{

    public function index(Request $request)
    {
        if($request->buscar!=""){
            $modelos = DB::table('modelos')->join('tipos_productos', 'tipos_productos.id', '=', 'modelos.tipo_producto_id')
                                           ->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id')
                                           ->join('marcas', 'marcas.id', '=', 'modelos.marcas_id')
                                           ->where('modelos.nombre','like','%'.$request->buscar.'%')
                                           ->orWhere('tipos_productos.nombre','like','%'.$request->buscar.'%');
        }else{
            $modelos = DB::table('modelos')->join('tipos_productos', 'tipos_productos.id', '=', 'modelos.tipo_producto_id')
                                           ->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id')
                                           ->join('marcas', 'marcas.id', '=', 'modelos.marcas_id');
        }

        if($request->order=="asc" or $request->order=="desc"){
            
            if($request->filtro=="linea"){
                $modelos = $modelos->orderBy('linea_negocios.nombre',$request->order);
            }elseif($request->filtro=="tipo"){
                $modelos = $modelos->orderBy('tipos_productos.nombre',$request->order);
            }elseif($request->filtro=="marca"){
                $modelos = $modelos->orderBy('marcas.nombre',$request->order);
            }else{
                $modelos = $modelos->orderBy('modelos.nombre',$request->order);
            }
        }elseif($request->order=="new"){
            if($request->filtro=="linea"){
                $modelos = $modelos->orderBy('linea_negocios.nombre',$request->order);
            }elseif($request->filtro=="tipo"){
                $modelos = $modelos->orderBy('tipos_productos.created_at','DESC');
            }elseif($request->filtro=="marca"){
                $modelos = $modelos->orderBy('marcas.created_at','DESC');
            }else{
                $modelos = $modelos->orderBy('modelos.created_at','DESC');
            }
        }elseif($request->order=="old"){
            if($request->filtro=="linea"){
                $modelos = $modelos->orderBy('linea_negocios.nombre',$request->order);
            }elseif($request->filtro=="tipo"){
                $modelos = $modelos->orderBy('tipos_productos.created_at','ASC');
            }elseif($request->filtro=="marca"){
                $modelos = $modelos->orderBy('marcas.created_at','ASC');
            }else{
                $modelos = $modelos->orderBy('modelos.created_at','ASC');
            }
        }else{
            if($request->filtro=="linea"){
                $modelos = $modelos->orderBy('linea_negocios.nombre',$request->order);
            }elseif($request->filtro=="tipo"){
                $modelos = $modelos->orderBy('tipos_productos.nombre','ASC');
            }elseif($request->filtro=="marca"){
                $modelos = $modelos->orderBy('marcas.nombre','ASC');
            }else{
                $modelos = $modelos->orderBy('modelos.nombre','ASC');
            }
        }

        $modelos = $modelos->groupBy('modelos.id')
                           ->select('modelos.nombre as nombre',
                                    'tipos_productos.nombre as tipo',
                                    'linea_negocios.nombre as linea',
                                    'marcas.nombre as marca',
                                    'modelos.created_at as created_at',
                                    'modelos.id as id');

        if($request->numb!=""){
            $modelos = $modelos->paginate($request->numb);
        }else{
            $modelos = $modelos->paginate(100);
        }

        return view('admin.pages.modelos.index')->with(['modelos'=>$modelos,'input'=>$request]);
    }

    public function create()
    {
        $tipos = TipoProducto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
        if(old('tipo_producto_id')!=""){
            $marcas = Marca::orderBy('nombre', 'ASC')->where('tipo_producto_id',old('tipo_producto_id'))->pluck('nombre', 'id')->toArray();
            $marcas[''] = "Seleccione una opción"; 
        }else{
           $marcas = Marca::orderBy('nombre', 'ASC')->where('tipo_producto_id',key($tipos))->pluck('nombre', 'id')->toArray();
           $marcas[''] = "Seleccione una opción"; 
        }
        

        return view('admin.pages.modelos.new')->with(['tipos'=>$tipos,'marcas'=>$marcas]);
    }

    public function store(Request $request)
    {
        
        if($request->has('marcas_id')){
            $validator = Validator::make($request->all(), [
                'tipo_producto_id' => 'required|min:1|max:12',
                'marcas_id' => 'required|min:1|max:12',
                'nombre' => [
                    'required',
                    Rule::unique('modelos')->where('marcas_id', $request->marcas_id),
                ],

            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'tipo_producto_id' => 'required|min:1|max:12',
                'marcas_id' => 'required|min:1|max:12'
            ]);
        }


        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $modelo = new Modelo;
        $modelo->tipo_producto_id = $request->tipo_producto_id;
        $modelo->marcas_id = $request->marcas_id;
        $modelo->nombre = $request->nombre;

        if($modelo->save()){
            session(['success' => 'Se agregó el modelo '.$request->nombre]);
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $modelo = Modelo::find($id);
        if($modelo){
            $tipos = TipoProducto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->toArray();
            $marcas = Marca::orderBy('nombre', 'ASC')->where('tipo_producto_id',$modelo->tipo_producto_id)->pluck('nombre', 'id')->toArray();
            $marcas[''] = "Seleccione una opción";
            return view('admin.pages.modelos.edit')->with(['modelo'=>$modelo,'marcas'=>$marcas,'tipos'=>$tipos]);
        }
        return var_dump('404');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tipo_producto_id' => 'required|min:1|max:12',
            'marcas_id' => 'required|min:1|max:12',
            'nombre' => [
                'required',
                Rule::unique('modelos')->ignore($id)->where('marcas_id', $request->marcas_id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $modelo = Modelo::find($id);
        if(!$modelo){
            return var_dump('404');
        }

        $modelo->tipo_producto_id = $request->tipo_producto_id;
        $modelo->marcas_id = $request->marcas_id;
        $modelo->nombre = $request->nombre;

        if($modelo->save()){
            return redirect('/admin/modelos');
        }
        return var_dump('404');
    }


    public function destroy($id)
    {
        $modelo = Modelo::find($id);
        $modelo->delete();
        return redirect()->back();
    }
}

