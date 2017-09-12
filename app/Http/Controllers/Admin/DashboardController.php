<?php

namespace App\Http\Controllers\Admin;

use Validator;

use DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Front\Pedido;

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

class DashboardController extends Controller
{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {
        /*
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
        */
            $pedidos = new Pedido;
            if($request->numb!=""){

                $pedidos= $pedidos->paginate($request->numb);

            }else{

                $pedidos= $pedidos->paginate(10);

            }
            
            return view('admin.pages.dashboard.index')->with(['pedidos'=>$pedidos]);

        /*
            return view('admin.pages.productos.index')->with(['tipos'=>$tipos,'lineas'=>$lineas,'productos'=>$productos,'input'=>$request]);
        */

    }

    public function detalle($id)
    {
        $pedido = Pedido::detalle($id);
        
        return view('admin.pages.dashboard.detalle')->with(['pedido'=>$pedido]);
        
    }

    public function saveOption($id,$tipo,Request $req)
    {
        $pedido = Pedido::find($id);

        switch ($tipo) {
            case 'cancel':
                $pedido->status="cancelado";
                $pedido->save();
                return response()->json(['status'=>200]);
                break;

            case 'costo_envio':

                break;
            case 'venta':
                $pedido->status="completado";
                $pedido->vendedor=$req->vendedor;
                $pedido->factura=$req->factura;
                $pedido->comision=$req->comision;
                $pedido->t_comprobante=$req->t_comprobante;                
                $pedido->save();
                return response()->json(['status'=>200]);
                break;            
            default:
                # code...
                break;
        }
        

        
        return view('admin.pages.dashboard.detalle')->with(['pedido'=>$pedido]);
        
    }
 

}

