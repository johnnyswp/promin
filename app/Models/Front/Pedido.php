<?php 

namespace App\Models\Front;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use DB;
use App\Models\Admin\Producto;

use App\Models\Front\PedidoDatoEnvio;
use App\Models\Front\PedidoDatoFacturacion;

use Carbon\Carbon;
class Pedido extends Model {



    /**

     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'pedidos';
     
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function detalle_pedidos()
    {

         return $this->hasMany('App\Models\Front\DetallePedido');

    }

    static public function detalle($id)
    {
        $pedido = DB::table('pedidos')->whereId($id)->first();
        $p = [];
        if($pedido){
            $arrays = [];

            $p=collect([
                'id'        =>$pedido->id,
                'total'     =>$pedido->total,
                'estado'    =>$pedido->status,
                'factura'   =>$pedido->factura,
                'telefono'  =>$pedido->telefono,
                'nombre'    =>$pedido->nombre." ".$pedido->apellido ,
                'fecha'     =>Carbon::parse($pedido->created_at)->format('d')."-".trans('main.'.Carbon::parse($pedido->created_at)->format('m'))."-".Carbon::parse($pedido->created_at)->format('Y')
            ]);
            $detalle = DB::table('pedidos_detalle')->where('pedido_id',$id)->get(); 
            
            $p->pull('detalles');
            
            foreach ($detalle as $pe) {
                $pro = Producto::findOrFail($pe->producto_id);                                
                $detalles[] = array(
                        'cantidad'  =>$pe->cantidad,
                        'imagen'    =>$pro->image(),
                        'nombre'    =>$pro->nombre,
                        'precio'    =>$pe->precio,
                        'subtotal'  =>$pe->subtotal
                );                 
            }
            
            //$collapsed = $p->combine($arrays);
            $p->put('detalles' , $detalles);


            
            $p->pull('facturacion');
            $PedidoDatoFacturacion=PedidoDatoFacturacion::find($pedido->id);
                $pdf[] = array(
                        'razon_social'  =>$PedidoDatoFacturacion->razon_social,
                        'rfc'           =>$PedidoDatoFacturacion->rfc,
                        'cp'            =>$PedidoDatoFacturacion->cp,
                        'calle'         =>$PedidoDatoFacturacion->calle,
                        'n_ext'         =>$PedidoDatoFacturacion->n_ext
                );                 

            $p->put('facturacion', $pdf);


            $p->pull('envio');
            $PedidoDatoEnvio=PedidoDatoEnvio::find($pedido->id);
                $pde[] = array(
                        'rfc'           =>$PedidoDatoEnvio->rfc,
                        'cp'            =>$PedidoDatoEnvio->cp,
                        'calle'         =>$PedidoDatoEnvio->calle,
                        'n_ext'         =>$PedidoDatoEnvio->n_ext
                );                 

            $p->put('envio', $pde);


            
            
            
            //dd($p->get('detalles'));

            /*foreach ($p->get('detalles') as $key) {
                
                # code...
                dd($key['cantidad']);

            }*/
            return $p;
        }

    }

}



                