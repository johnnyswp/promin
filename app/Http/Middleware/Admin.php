<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
 
use Illuminate\Contracts\Auth\Guard;



class Admin

{

    /**

     * The Guard implementation.

     *

     * @var Guard

     */

    protected $auth;

    /**

     * Create a new filter instance.

     *

     * @param  Guard  $auth

     * @return void

     */

    public function __construct(Guard $auth)

    {

        $this->auth = $auth;

    }

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @param $role

     * @return mixed

     */

    public function handle($request, Closure $next)

    {

        if (config('settings.activation')) {

            if ($this->auth->user()->activated == false) {

                session()->put('above-navbar-message', 'Please activate your email. <a href="'. route('authenticated.activation-resend') .'">Resend</a> activation email.');

            } else {

                session()->forget('above-navbar-message');

            }

        }

                 

              /*  if($this->auth->user()->estado=="" )

                {

                    session()->put('estado', true); 

                   

                    session()->put('editperfil', true);   

                }

                else

                {

                    session()->forget('estado');

                }





                 if($this->auth->user()->gender=="")

                {

                    session()->put('gender', true);

                    session()->put('editperfil', true);   

                }

                else

                {

                    session()->forget('gender');



                }





                if($this->auth->user()->telephone=="")

                {

                    session()->put('telephone', true);   

                    session()->put('editperfil', true);                 

                }

                else

                {

                    session()->forget('telephone');



                }*/



                

        if ( !$this->auth->user()->hasRole('administrator')) {


            return redirect('/mi-cuenta');



        }



        //if($role == 'all')
//
        //{
//
        //    return $next($request);
//
        //}



         
        return $next($request);

    }

}