<?php

namespace App\Http\Controllers\Admin;



use Validator;

use DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Role;

use Form;

use Auth;

use Hash;

class AccesosController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {


        if($request->buscar!=""){

            $users = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')     

                                        ->join('roles', 'role_user.role_id', '=', 'roles.id')->where('users.name','like','%'.$request->buscar.'%')
                                        ->where('roles.name','<>','cliente') ;

        }else{

            $users = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')     

                                        ->join('roles', 'role_user.role_id', '=', 'roles.id')
                                        ->where('roles.name','<>','cliente') ;

        }


        if($request->order=="asc" or $request->order=="desc"){
            if($request->filtro=="users"){
                $users = $users->orderBy('users.email',$request->order);
            }elseif($request->filtro=="tipo"){
                $users = $users->orderBy('roles.name',$request->order);
            }else{
                $users = $users->orderBy('users.name',$request->order);
            }
        }elseif($request->order=="new"){
            $users = $users->orderBy('users.created_at','DESC');
        }elseif($request->order=="old"){
            $users = $users->orderBy('users.created_at','ASC');
        }else{
            if($request->filtro=="users"){
                $users = $users->orderBy('users.email','ASC');
            }elseif($request->filtro=="tipo"){
                $users = $users->orderBy('roles.name','ASC');
            }else{
                $users = $users->orderBy('users.name','ASC');
            }
        }

        $users = $users->select('users.id as id', 'users.name as name', 'users.last_name as last_name', 'users.parental_name as parental_name', 'users.email as email', 'roles.name as role', 'users.picture as picture', 'users.created_at as created_at')->groupBy('users.id');

         if($request->numb!=""){

            $users = $users->paginate($request->numb);

        }else{

            $users = $users->paginate(100);

        } 

     

        return view('admin.pages.accesos.index')->with(['users'=>$users,'input'=>$request]);

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('admin.pages.accesos.new');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {



        $validator = Validator::make($request->all(), [

            'admin' => 'required|max:100',

            'email' => 'required|unique:users|max:255',

            'name' => 'required|max:100',

            'last_name' => 'max:100',

            'parental_name' => 'max:100',
            
            'password' => 'required|confirmed|min:6|max:50',

            'password_confirmation' => 'required',

            'picture' => 'mimes:jpeg,jpg,png,gif'

        ]);



        if ($validator->fails()) {

            return redirect()->back()

                        ->withErrors($validator)

                        ->withInput();

        }



        $user = new User;

        $user->password = Hash::make($request->password);   

        $user->email = $request->email;

        $user->name = $request->name;

        $user->last_name = $request->last_name;

        $user->parental_name = $request->parental_name;

        $user->picture = $request->picture;

        $user->activated =1;
        

        if($request->file('picture')!=NULL)

        {

            //agrega imagen de picture

            $file_picture=$request->file('picture');

            $ext = $request->file('picture')->getClientOriginalExtension();

            $nameIMG=date('YmdHis');

            $picture= $user->id.$nameIMG.'.'.$ext;

            $picname = $picture;

            $picture= url('asset/images').'/PIC'.$picture;

            $user->picture = $picture;

        }else{

            $user->picture = url('asset/images').'/img.jpg';

        }



        if($user->save()){

            

            $userRole = Role::whereName($request->admin)->first();

            $user->assignRole($userRole);

            

            if($request->file('picture')!=NULL)

            {

                $file_picture->move("asset/images/",$picture); 

            }



            return redirect('/admin/accesos');

        }



    }





    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = User::find($id);

        if($user){

            $type = ['ventas' =>'Ventas', 'compras' =>'Compras', 'staff' =>'Staff', 'servicio' =>'Servicio', 'administrator' =>'Administrador'];

            return view('admin.pages.accesos.edit')->with(['user'=>$user, 'type'=>$type]);

        }

        return var_dump('404');

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {
        
        if($request->has('password')){
            $validator = Validator::make($request->all(), [

                'admin' => 'required|max:100',

                'email' => 'required|email|unique:users,email,'.$id,

                'name' => 'required|max:100',

                'last_name' => 'max:100',

                'parental_name' => 'max:100',

                'password' => 'confirmed|min:6|max:100',

                'password_confirmation' => 'max:100',

                'picture' => 'mimes:jpeg,jpg,png,gif'

            ]);
        }else{
            $validator = Validator::make($request->all(), [

                'admin' => 'required|max:100',

                'email' => 'required|email|unique:users,email,'.$id,

                'name' => 'required|max:100',

                'last_name' => 'max:100',

                'parental_name' => 'max:100',

                'picture' => 'mimes:jpeg,jpg,png,gif'

            ]);
        }
        



        if ($validator->fails()) {

            return redirect()->back()

                        ->withErrors($validator)

                        ->withInput();

        }



        $user = User::find($id);

        if(!$user){

            return var_dump('404');

        }

        if($request->has('password')){
            $user->password = Hash::make($request->password);            
        }

        $user->email = $request->email;

        $user->name = $request->name;

        $user->last_name = $request->last_name;

        $user->parental_name = $request->parental_name;

        
        if($request->file('picture')!=NULL)
        {

            //agrega imagen de picture

            $file_picture=$request->file('picture');

            $ext = $request->file('picture')->getClientOriginalExtension();

            $nameIMG=date('YmdHis');

            $picture= $user->id.$nameIMG.'.'.$ext;

            $picname = $picture;

            $picture= url('asset/images').'/PIC'.$picture;

            $user->picture = $picture;



        }



        if($user->save()){

            if($request->admin != $user->role()){

                $userRol = Role::whereName($user->role())->first();

                $user->removeRole($userRol);



                $userRole = Role::whereName($request->admin)->first();

                $user->assignRole($userRole);

            }

            

            if($request->file('picture')!=NULL)

            {

                $file_picture->move("asset/images/",$picture); 

            }

            return redirect('/admin/accesos');

        }



        return var_dump('404');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {



        $u = User::find($id);
        $u->delete();

        return redirect('/admin/accesos');

         

 

    }

}

