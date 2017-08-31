<?php 

namespace App\Models\Admin;



use Illuminate\Database\Eloquent\Model;

use DB;

class Producto extends Model {



    /**

     * The database table used by the model.

     *

     * @var string

     */

    protected $table = 'productos';

    public  function image()
    {   
    	$dato = false;
    	$tipo = DB::table('images')->where('producto_id',$this->id)->where('video',NULL)->orderBy('order_img','ASC')->first();
    	if($tipo){
           $dato = $tipo->picture;
    	}
        
        return $dato;

    }

    public  function images()
    {   
        $tipo = DB::table('images')->where('producto_id',$this->id)->orderBy('order_img','ASC')->orderBy('id','asc')->get();
        return $tipo;

    }

    public  function modelo()
    {   
    	$dato = false;
    	$tipo = DB::table('modelos')->find($this->modelo_id);
    	if($tipo){
           $dato = $tipo->nombre;
    	}
        
        return $dato;

    }

    public  function tipo()
    {   
        $dato = false;
        $tipo = DB::table('tipos_productos')->find($this->tipo_producto_id);
        if($tipo){
           $dato = $tipo->nombre;
        }
        
        return $dato;

    }

    public  function marca()
    {   
    	$dato = false;
    	$tipo = DB::table('marcas')->find($this->marcas_id);
    	if($tipo){
           $dato = $tipo->nombre;
    	}
        
        return $dato;

    }

    public  function linea()
    {   
    	$dato = false;
    	$tipo = DB::table('linea_negocios')->find($this->linea_negocio_id);
    	if($tipo){
           $dato = $tipo->nombre;
    	}
        
        return $dato;

    }

}



                