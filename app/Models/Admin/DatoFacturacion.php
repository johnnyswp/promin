<?php 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class DatoFacturacion extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'datos_facturacion';

    public function user()
    {
         return $this->belongsTo('App\Models\User');
    }

}