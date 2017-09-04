<?php 

namespace App\Models\Front;



use Illuminate\Database\Eloquent\Model;

use DB;

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

}



                