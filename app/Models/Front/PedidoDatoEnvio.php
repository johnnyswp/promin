<?php 
namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;
use DB;

class PedidoDatoEnvio extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pedido_datos_envios';

    public function user()
    {
         return $this->belongsTo('App\Models\User');
    }

}