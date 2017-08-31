<?php 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Artisan,DB;
class TipoProducto extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipos_productos';
    
    public function linea()
    {
        $linea = DB::table('linea_negocios')->join('tipos_productos', 'tipos_productos.linea_negocio_id', '=', 'linea_negocios.id')
            ->where('tipos_productos.id',$this->id)
            ->select('linea_negocios.nombre as linea')->first();
        return $linea->linea;
    }

}