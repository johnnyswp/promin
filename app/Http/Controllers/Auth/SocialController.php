<?php

namespace App\Http\Controllers\Auth;





 





use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Input;

//use App\Http\Controllers\Controller;

#use App\Traits\ActivationTrait;

use App\Models\Front\Social;

use App\Models\User;

use App\Models\Role;

use App\Models\Admin\DatoFacturacion;

use App\Models\Admin\DatoEnvio;



use App\Mail\UserRegister;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;



use Illuminate\Contracts\Auth\Guard;

use Artisan,DB,Auth;



#use App\Mail\UserRegisterEmail; 



class SocialController extends Controller

{



   # use ActivationTrait;



    public function getSocialRedirect( $provider )

    {



        $providerKey = Config::get('services.' . $provider);



        if (empty($providerKey)) {



            return view('pages.status')

                ->with('error','No such provider');



        }



        return Socialite::driver( $provider )->redirect();



    }



    public function getSocialHandle( $provider )
    {
        if (Input::get('denied') != '') {
            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');
        }
        $user = Socialite::driver( $provider )->user();
        $socialUser = null;

        #Verifica si hay email
        $userCheck = User::where('email', '=', $user->email)->first();
        if (!$user->email) {
            #Cuando no tenemos email de las redes socailes
            $email = 'missing' . str_random(10);
            $email_box = $email;
        }
        if (!empty($userCheck)) {
            $socialUser = $userCheck;
            /*if($userCheck->login==1){
                return redirect()->route('public.home')->with('noactivate', 'Sesion ya Existe')->with('user_id', $userCheck->id);   
            }*/
        }
        else {
            $sameSocialId = Social::where('social_id', '=', $user->id)

                ->where('provider', '=', $provider )

                ->first();   

            if (is_null($sameSocialId)) {
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email = $user->email;
                $name = explode(' ', $user->name);

                if (count($name) >= 1) {
                    $newSocialUser->name = $name[0];
                }

                if (count($name) >= 2) {
                    $newSocialUser->last_name = $name[1];
                }

                

                $newSocialUser->picture=$user->avatar;
                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->token = str_random(64);
                $newSocialUser->tipo_user = $provider; 
                $newSocialUser->activated = 1; //!config('settings.activation');
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);

                // Add role
                $role = Role::whereName('cliente')->first();
                $newSocialUser->assignRole($role);

               // $this->initiateEmailActivation($newSocialUser);
                $socialUser = $newSocialUser;

                $dd = new DatoFacturacion;
                $dd->user_id = $newSocialUser->id;
                $dd->save();

                $de = new DatoEnvio;
                $de->user_id = $newSocialUser->id;
                $de->save();
            }

            else {
                $socialUser = $sameSocialId->user;
            }

        }

        auth()->login($socialUser, true);

        /*$id = Auth::user()->id;

        $user = User::find(Auth::user()->id);

        $user->login = 1;

        $user->save();*/

        if (!filter_var($socialUser->email, FILTER_VALIDATE_EMAIL)) {

				    // invalid e-mail address

		}else{
            if(!$userCheck){
                Mail::to($socialUser)->send(new UserRegister($socialUser)); 
            }
        	

		}   

        if ( auth()->user()->hasRole('cliente')) {

            return redirect()->route('user.mi-cuenta');

        }

        if ( auth()->user()->hasRole('administrator')) {

            return redirect()->route('admin.home');

        }

        return abort(500, 'User has no Role assigned, role is obligatory! You did not seed the database with the roles.');

    }

}