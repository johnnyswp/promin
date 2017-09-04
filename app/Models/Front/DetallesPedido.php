<?php 

namespace App\Models\Front;



use Illuminate\Database\Eloquent\Model;

use DB;

class DetallesPedido extends Model {



    /**

     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'pedidos_detalle';
     
    public function pedido()
    {
        return $this->belongsTo('App\Models\Front\Pedido');
    }


}



                