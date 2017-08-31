<?php

namespace App\Http\Controllers\Admin;



use Validator;

use DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\File;

use Illuminate\Http\Request;

use App\Models\Admin\Noticia;

use Illuminate\Support\Facades\Mail;

use App\Mail\NoticiaInterna;


use Form;

use Auth;



class NoticiasController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $req)

    {
        //$users = User::where('admin', '>', 0)->paginate(10);

        if($req->q!=""){
                $noticias = DB::table('noticias')->where('title','like','%'.$req->q.'%');
            }else{
                $noticias = DB::table('noticias');                 
            }


             if($req->type=="all"){

        }elseif($req->type=="interna"){
            $noticias =  $noticias->where('type','interna');
        }elseif($req->type=="promin"){
            $noticias =  $noticias->where('type','promin');
        }

             if($req->status=="all"){

        }elseif($req->status=="normal"){
            $noticias =  $noticias->where('state','normal');
        }elseif($req->status=="urgente"){
            $noticias =  $noticias->where('state','urgente');
        }

            if($req->order=="asc"){
            $noticias =  $noticias->orderBy('title','asc');                
        }elseif($req->order=="desc"){
            $noticias =  $noticias->orderBy('title','desc');
        }elseif($req->order=="last"){
            $noticias =  $noticias->orderBy('created_at','asc');
        }elseif($req->order=="news"){
            $noticias =  $noticias->orderBy('created_at','desc');
        }


        if($req->numb!=""){
            $noticias = $noticias->paginate($req->numb);
        }else{
            $noticias = $noticias->paginate(100);
        }

        return view('admin.pages.noticias.index')->with(['noticias'=>$noticias,'input'=>$req]);
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('admin.pages.noticias.new');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {        
        
        $validacion = [

            'title' => 'required|min:1|max:250',
            'type' => 'required',
            'content' => 'required',
            'state' => 'required', 
            'type_link'  => 'required',
            'imagen'  => 'required',
            'froms'  => 'required',
            'link'  => 'required'
        ];

        if(is_null($request->froms)){ 
            array_forget($validacion, 'froms'); 
        }
         
        if($request->type_link=="video"){ 
            array_forget($validacion, 'imagen');
        }else{
            array_forget($validacion, 'link');

        }
        if($request->file('imagen')!=NULL){

        }else{
            array_forget($validacion, 'imagen');
        }

         
        $validator = Validator::make($request->all(), $validacion);



        if ($validator->fails()) {
             
            return redirect()->back()

                        ->withErrors($validator)

                        ->withInput();

        }

        $user = new Noticia;

        $user->title = $request->title;

        $user->type = $request->type;

        $user->content = $request->content;

        $user->state = $request->state;

        
        $user->froms = (is_null($request->froms)) ? NULL : $request->froms ;
        

        if($request->file('imagen')!=NULL)
        {

            $file_picture=$request->file('imagen');

            $ext = $request->file('imagen')->getClientOriginalExtension();

            $nameIMG=date('YmdHis');

            $picture= $user->id.$nameIMG.'.'.$ext;

            $picname = $picture;

            $picture= url('asset').'/noticias/'.$picture;

            $file_picture->move("asset/noticias/",$picture);           

            $user->link = $picture;

            $user->type_link = 'imagen';

        }else{

            $user->link = (is_null($request->link)) ? NULL : $request->link;
            
            $user->type_link = 'video';        

        }



        if($user->save()){
            if(!is_null($request->froms)){

                    #Mail::to($request->froms)->send(new NoticiaInterna($user));
                    Mail::to(explode(',',$request->froms))->send(new NoticiaInterna($user));

                    
            }   
            return redirect('/admin/noticias');
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

        $user = Noticia::find($id);

        if($user){

             

            return view('admin.pages.noticias.edit')->with(['noticia'=>$user]);

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

        $validacion = [

            'title' => 'required|min:1|max:250',
            'type' => 'required',
            'content' => 'required',
            'state' => 'required', 
            'type_link'  => 'required',
            'imagen'  => 'required',
            'froms'  => 'required',
            'link'  => 'required'
        ];

        if(is_null($request->froms)) array_forget($validacion, 'froms');
        if(is_null($request->link)) array_forget($validacion, 'link');

        if($request->file('imagen')!=NULL){

        }else{
            array_forget($validacion, 'imagen');
        }

        $validator = Validator::make($request->all(), $validacion);


        if ($validator->fails()) {
           
            return redirect()->back()

                        ->withErrors($validator)

                        ->withInput();

        }

        $user = Noticia::find($id);

        if(!$user){
            return var_dump('404');
        }

        $user->title = $request->title;

        $user->type = $request->type;

        $user->content = $request->content;

        $user->state = $request->state;

        
        $user->froms = (is_null($request->froms)) ? NULL : $request->froms ;
        

        if($request->file('imagen')!=NULL)
        {

            //agrega imagen de picture

            $file_picture=$request->file('imagen');

            $ext = $request->file('imagen')->getClientOriginalExtension();

            $nameIMG=date('YmdHis');

            $picture= $user->id.$nameIMG.'.'.$ext;

            $picname = $picture;

            $picture= url('asset').'/noticias/'.$picture;

            $file_picture->move("asset/noticias/",$picture);           

            $user->link = $picture;

             

            $user->type_link = 'imagen';

        }else{

            $user->link = (is_null($request->link)) ? NULL : $request->link;
            $user->type_link = 'video';        

        }



        if($user->save()){


            return redirect('/admin/noticias');

        }

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {



        $user = Noticia::find($id);

        $user->delete();

            return redirect('/admin/noticias');

         

 

    }

}

