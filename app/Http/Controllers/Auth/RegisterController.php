<?php



namespace App\Http\Controllers\Auth;



use App\Models\User;

use App\Models\Admin\DatoFacturacion;

use App\Models\Admin\DatoEnvio;

use App\Models\Role;



#Mail
use App\Mail\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Register Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles the registration of new users as well as their

    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |

    */



    use RegistersUsers;



    /**

     * Where to redirect users after registration.

     *

     * @var string

     */

    protected $redirectTo = '/';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest');

    }



    /**

     * Get a validator for an incoming registration request.

     *

     * @param  array  $data

     * @return \Illuminate\Contracts\Validation\Validator

     */

    protected function validator(array $data)
    {

        return Validator::make($data, [

            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            //'password' => 'required|string|min:6|confirmed',
            'password' => 'required|string|min:6',

        ]);

    }



    /**

     * Create a new user instance after a valid registration.

     *

     * @param  array  $data

     * @return User

     */

    protected function create(array $data){

            $u = User::whereEmail($data['email'])->whereNewsletter(1)->first();
            if($u){
                $u->tipo_user = 'email';  
                $u->newsletter  = 1;
                $u->save();
                    $mail = Mail::to($u)->send(new UserRegister($u)); 
                return $u;
            }else{
                $user = User::create([
                    'name' => $data['name'],
                    'email'     => $data['email'],
                    'tipo_user' => 'email',
                    'activated' => 1,
                    'linea_negocio' => 1,
                    'newsletter' => 0,
                    'password'  => bcrypt($data['password']),
                ]);

                $dd = new DatoFacturacion;
                $dd->user_id = $user->id;
                $dd->save();

                $de = new DatoEnvio;
                $de->user_id = $user->id;
                $de->save();

                $role = Role::whereName('cliente')->first();
                $user->assignRole($role);

                $mail = Mail::to($user)->send(new UserRegister($user)); 

                return $user;
            }
        
    }
}

