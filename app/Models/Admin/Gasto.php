<?php 

namespace App\Models\Admin;



use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;

class Gasto extends Model {
    /**

     * The database table used by the model.

     *

     * @var string

     */
    protected $table = 'gastos';

    public  function user(){
    	return User::find($this->user_id)->name;
    }

}