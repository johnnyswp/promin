<?php 

namespace App\Models\Admin;



use Illuminate\Database\Eloquent\Model;

use DB;

class Documento extends Model {
    /**

     * The database table used by the model.

     *

     * @var string

     */
    protected $table = 'documentos';

    protected $fillable = ['id','producto_id','comentario','documento','created_at','updated_at'];

}