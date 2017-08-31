<?php 

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Keygen\Keygen;

use Artisan,DB,Auth;





class Wishlist extends Model 

{

    protected $table = 'wishlists';


    public function social()
    {

        return $this->hasMany('App\Models\Front\Social');

    }


    public function user()
    {

         return $this->hasOne('App\Models\User');

    }

}