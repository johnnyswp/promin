<?php 

namespace App\Models;



use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Passwords\CanResetPassword;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Keygen\Keygen;

 

use Artisan,DB,Auth;





class User extends Model implements AuthenticatableContract, CanResetPasswordContract

{

    use Authenticatable, CanResetPassword, Notifiable;



    /**

     * The database table used by the model.

     *

     * @var string

     */

    protected $table = 'users';



    /**

     * The attributes that are not mass assignable.

     *

     * @var array

     */

    protected $guarded = ['id'];

    

    //protected $dateFormat = 'U';

    

    /**

     * The attributes excluded from the model's JSON form.

     *

     * @var array

     */



    protected $hidden = ['password', 'remember_token'];





    public function roles()

    {

        return $this->belongsToMany('App\Models\Role')->withTimestamps();

    }





    public function role()

    {

        $role = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->join('roles', 'role_user.role_id', '=', 'roles.id')

            ->where('users.id',$this->id)

            ->select('roles.name as role')->first();

        return $role->role;

    }





    public function hasRole($name)

    {

        foreach($this->roles as $role)

        {

            if($role->name == $name) return true;

        }



        return false;

    }



    public function assignRole($role)

    {

        return $this->roles()->attach($role);

    }



    public function removeRole($role)

    {

        return $this->roles()->detach($role);

    }



    public function social()

    {

        return $this->hasMany('App\Models\Front\Social');

    }



    public function homeUrl()

    {

        if ($this->hasRole('user')) {

            $url = route('user.home');

        } else {

            $url = route('admin.home');

        }



        return $url;

    }



    public static function key()

    {



        $keygen = new Keygen;



        $alphanum = $keygen->alphanum(15);



        return strtoupper($alphanum->generate());  

        

    }



    





    public function datoFacturacion()

    {

         return $this->hasOne('App\Models\Admin\DatoFacturacion');

    }

    public function whishlists()
    {

         return $this->hasMany('App\Models\Whishlist');

    }





    public function datoEnvio()

    {

         return $this->hasOne('App\Models\Admin\DatoEnvio');

    }

    



    public static function byRole($nameRol)

    {

        if($nameRol=="cliente"){

         $roles = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->join('roles', 'role_user.role_id', '=', 'roles.id')

            ->where('roles.name',$nameRol)

            ->select("users.name as name","users.newsletter as newsletter","users.parental_name as name_father","users.last_name as name_mother","users.motivo_delete as motivo",'users.email as email','users.tipo_user as tipo_user','users.id as id',"users.activated as activated",'users.picture as picture','users.created_at  as created_at'); 

            # ->get();

             #dd($roles);

        }else if($nameRol=="ventas"){

            $roles = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->join('roles', 'role_user.role_id', '=', 'roles.id')

            ->where('roles.name',$nameRol)

            ->pluck(DB::raw("concat(users.name,' ', users.last_name) as name"),'users.id as id');



        }

        

        return $roles;

    }



    public  function tipo()

    {

        if($this->tipo_user == "facebook"){

            return "fa fa-facebook";

        } else if($this->tipo_user == "twitter"){

            return "fa fa-twitter";

        } else if($this->tipo_user == "email"){

            return "fa fa-envelope";

        } else if($this->tipo_user == "banco"){

            return "fa fa-database";

        }

    }



     public function getFullNameAttribute() {

        return ucfirst($this->name) . ' ' . ucfirst($this->last_name);

    }

}