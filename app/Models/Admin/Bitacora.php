<?php 

namespace App\Models\Admin;



use Illuminate\Database\Eloquent\Model;

use DB;
use App\Models\User;
class Bitacora extends Model {
    /**

     * The database table used by the model.

     *

     * @var string

     */
    protected $table = 'bitacora';
    

    public static function responsable($responsable) {
    	$user = User::findOrFail($responsable);
    	return $user->name;
    }
}