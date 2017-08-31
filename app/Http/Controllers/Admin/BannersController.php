<?php
namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Admin\Banner;
use Form;
use Auth;

class BannersController extends Controller
{
    public function index()
    {
         $marcas = DB::table('banner')->orderBy('order','asc')->paginate(20);
        return view('admin.pages.banners.index')->with(['banners'=>$marcas]);
    }

    public function create()
    {
        return view('admin.pages.banners.new');
    }

    public function store(Request $request)
    {
       if($request->tipo_banner==0){
            $validator = Validator::make($request->all(), [
                'link_imagen' => 'required|url|min:1|max:255',
                'titulo_banner' => 'required|max:255',
                'file' => 'mimes:jpeg,jpg,png,gif'
            ]);
       }else{
            $validator = Validator::make($request->all(), [
                'link_video' => 'required|url|min:1|max:255',
                'url_video' => 'required|url|max:255',
                'titulo_video'  => 'required|max:255'            
            ]);
       }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new Banner;
        if($request->tipo_banner==0){
            $user->title=$request->titulo_banner;
            $user->link=$request->link_imagen;
            $user->tipo="picture";
        }else{
            $user->title=$request->titulo_video;
            $user->link=$request->link_video;
            $user->tipo="video";
            $user->picture=$request->url_video;
        }

        if($request->file('file')!=NULL)
        {
            //agrega imagen de picture
            $file_picture=$request->file('file');
            $ext = $request->file('file')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $picture= $user->id.$nameIMG.'.'.$ext;
            $picname = $picture;
            $picture= url('asset/images').'/PIC'.$picture;
            $user->picture = $picture;
        }else{
            $user->picture=$request->url_video;
        }

        if($user->save()){
            if($request->file('file')!=NULL)
            {
                $file_picture->move("asset/images/",$picture); 
            }
            return redirect('/admin/banners');
        }
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        if($banner){            
            return view('admin.pages.banners.edit')->with(['banner'=>$banner]);
        }
        return var_dump('404');
    }

    public function update(Request $request, $id)
    {
        if($request->tipo_banner==0){
            $validator = Validator::make($request->all(), [
                'link_imagen' => 'required|url|min:1|max:50',
                'titulo_banner' => 'required|max:255',
                'file' => 'mimes:jpeg,jpg,png,gif'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user = Banner::find($id);
            $user->title=$request->titulo_banner;
            $user->link=$request->link_imagen;
            $user->tipo="picture";
            if($request->file('file')!=NULL)
            {
                //agrega imagen de picture
                $file_picture=$request->file('file');
                $ext = $request->file('file')->getClientOriginalExtension();
                $nameIMG=date('YmdHis');
                $picture= $user->id.$nameIMG.'.'.$ext;
                $picname = $picture;
                $picture= url('asset/images').'/PIC'.$picture;
                $user->picture = $picture;
            }

            if($user->save()){
                if($request->file('file')!=NULL)
                {
                    $file_picture->move("asset/images/",$picture); 
                }
                return redirect('/admin/banners');
            }

        }else{
            $validator = Validator::make($request->all(), [
                'link_video' => 'required|url|min:1|max:50',
                'url_video' => 'required|url|max:255',
                'titulo_video'  => 'required|max:255'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user = Banner::find($id);
            $user->title=$request->titulo_video;
            $user->link=$request->link_video;
            $user->tipo="video";
            $user->picture=$request->url_video;
            if($user->save()){
                return redirect('/admin/banners');
            }
        }
        return var_dump('404');
    }

    public function destroy($id)
    {
        $user = Banner::find($id);
        $user->delete();
        return redirect('/admin/banners');
    }
}

