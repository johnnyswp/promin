<?php 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class DatoEnvio extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'datos_envios';

    public function user()
    {
         return $this->belongsTo('App\Models\User');
    }

}