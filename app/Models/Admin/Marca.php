<?php 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class Marca extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marcas';

    public function tipo()
    {
        $tipo = DB::table('tipos_productos')->join('marcas', 'marcas.tipo_producto_id', '=', 'tipos_productos.id')
            ->where('marcas.id',$this->id)
            ->select('tipos_productos.nombre as tipo')->first();
        return $tipo->tipo;
    }

}