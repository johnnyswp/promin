<?php 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class Modelo extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modelos';

    public function tipo()
    {
        $tipo = DB::table('tipos_productos')->join('modelos', 'modelos.tipo_producto_id', '=', 'tipos_productos.id')
            ->where('modelos.id',$this->id)
            ->select('tipos_productos.nombre as tipo')->first();
        return $tipo->tipo;
    }

}