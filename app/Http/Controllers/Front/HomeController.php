<?php



namespace App\Http\Controllers\Front;



use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\PedidoSend;
use Illuminate\Support\Facades\Mail;

use App\Models\Admin\Imagen;
use App\Models\Admin\Producto;
use App\Models\Admin\LineaNegocio;
use App\Models\Admin\Marca;
use App\Models\Admin\Noticia;
use App\Models\Admin\TipoProducto;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin\DatoFacturacion;

use App\Models\Admin\DatoEnvio;
use App\Models\Front\Pedido;

use App\Models\Wishlist;

use Artisan,DB,Hash,Auth,Cart;
use Validator;


class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    //public function __construct()
//
    //{
//
    //    $this->middleware('auth');
//
    //}



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        $productos = Producto::where('destacado',1)
                     ->get();
        //dd($productos);
        return view('front.index')
                ->with('carousel',true)
                ->with('productos',$productos);
    }


    public function getMiCuenta(){
        //dd( old_input(null,2,'ok'));
        $whishlists = DB::table('users')
                ->join('wishlists', 'wishlists.user_id', '=', 'users.id')     
                ->join('productos', 'productos.id', '=', 'wishlists.product_id')
                ->where('users.id',Auth::user()->id) 
                ->select(
                    'wishlists.id as id',
                    'productos.id as product_id',
                    'productos.nombre as product_name',
                    'productos.descripcion as product_description',
                    'productos.priceVenta as price',
                    'wishlists.created_at as created_at'
                )
                ->get();

        $pedidos = Pedido::where('user_id',Auth::user()->id)->where('status','Pedido')->pluck('id');
        $pedidos2 = Pedido::where('user_id',Auth::user()->id)->where('status','completado')->pluck('id');
        
        return view('front.pages.mi-cuenta')
                    ->with('carousel',false)
                    ->with('pedidos',$pedidos)
                    ->with('pedidos2',$pedidos2)
                    ->with('whishlists',$whishlists);
    }



    public function getCp($id){

        $data = DB::table('cps')
                ->where('cp',$id)
                ->select(
                    'cp',
                    'colonia',
                    'del_mun as municipio',
                    'ciudad',
                    'estado'                    
                    )
                ->first();
        return response()->json($data);
    }


    public function postTest(Request $req)
    {
        if($req->hasFile('file')){
            echo 'Uploaded';
            $date = date_create();$name= date_format($date, 'U-').str_random(50);
            $file=$req->file('file');
            $file->move( base_path().'/asset/uploads' , $name.".".$file->getClientOriginalExtension());
            $imagen = new Imagen;
            $imagen->producto_id = $req->id;
            $imagen->picture='/asset/uploads/'.$name.".".$file->getClientOriginalExtension();
            $imagen->save();
        }
    }
    
    public function postOk(Request $req)
    {
        return Pedido::detalle(1);
    }

    public function getLineasNegocios($name, Request $request)
    {
        $linea_id = array_reverse(explode('-',$name))[0];

        $lineas = DB::table('productos')->join('linea_negocios', 'linea_negocios.id', '=', 'productos.linea_negocio_id')
                                        ->select('linea_negocios.id as id', 'linea_negocios.nombre as nombre')
                                        ->groupBy('linea_negocios.id')->orderBy('nombre', 'ASC')->get();

        $marcas = Marca::orderBy('nombre', 'ASC')->orderBy('nombre', 'ASC')->get();

        $tipos = TipoProducto::where('linea_negocio_id',$linea_id)->orderBy('nombre', 'ASC')->get();

        $linea = LineaNegocio::findOrFail($linea_id);
        $productos = Producto::where('linea_negocio_id', $linea_id);

        if($request->linea!="" and $request->linea!=0){
            return redirect('linea-negocio/'.str_slug($linea->nombre).'-'.$linea->id);
        }

        if($request->tipo!="" and $request->tipo!=0){
            $marcas = Marca::where('tipo_producto_id',$request->tipo)->orderBy('nombre', 'ASC')->get();

            $productos= $productos->where('tipo_producto_id', $request->tipo); 
        }

        if($request->marca!="" and $request->marca!=0){ $productos= $productos->where('marcas_id', $request->marca); }
        
        $productos= $productos->orderBy('serie','ASC');

        if($request->numb!="" and $request->numb!=0){ $productos= $productos->paginate($request->numb); }else{ $productos= $productos->paginate(20); }
        if($linea->nombre =='Promin Drill')
            return view('front.pages.promin-drill.promin-drill')->with(['input'=>$request,'tipos'=>$tipos,'marcas'=>$marcas,'linea'=>$linea,'lineas'=>$lineas,'productos'=>$productos,'carousel'=>false]);
        
        if($linea->nombre =='Promin Blast')
            return view('front.pages.promin-blast.promin-blast')->with(['input'=>$request,'tipos'=>$tipos,'marcas'=>$marcas,'linea'=>$linea,'lineas'=>$lineas,'productos'=>$productos,'carousel'=>false]);

        return view('front.pages.productos')->with(['input'=>$request,'tipos'=>$tipos,'marcas'=>$marcas,'linea'=>$linea,'lineas'=>$lineas,'productos'=>$productos,'carousel'=>false]);
    }

    public function getTipoProductos($name, Request $request)
    {
        $id = array_reverse(explode('-',$name))[0];

        $tipo = TipoProducto::findOrFail($id);

        $linea = LineaNegocio::findOrFail($tipo->linea_negocio_id);

        $marcas = Marca::where('tipo_producto_id',$id)->orderBy('nombre', 'ASC')->get();
        $marcas[''] = "Todas";

        $tipos = TipoProducto::where('linea_negocio_id',$tipo->linea_negocio_id)->orderBy('nombre', 'ASC')->get();

        $productos = Producto::where('tipo_producto_id', $id);

        if($request->tipo!="" and $request->tipo!=0){
            $t = TipoProducto::findOrFail($request->tipo);
            return redirect('tipo-producto/'.str_slug($t->nombre).'-'.$t->id);

            $productos= $productos->where('tipo_producto_id', $request->tipo); 
        }

        if($request->marca!="" and $request->marca!=0){ $productos= $productos->where('marcas_id', $request->marca); }
        
        $productos= $productos->orderBy('serie','ASC');

        if($request->numb!="" and $request->numb!=0){ $productos= $productos->paginate($request->numb); }else{ $productos= $productos->paginate(20); }

        return view('front.pages.productos-tipo')->with(['input'=>$request,'tipos'=>$tipos,'marcas'=>$marcas,'linea'=>$linea,'tipo'=>$tipo,'productos'=>$productos,'carousel'=>false]);
    }

    public function getProducto($linea, $producto)
    {
        $producto_id = array_reverse(explode('-',$producto))[0];
        $producto = Producto::find($producto_id);
     
        session(['pro_id'=>$producto_id]);
        $cart = Cart::content();
        $itemCart = $cart->search(function ($cartItem, $rowId) {
            return $cartItem->id === intval(session('pro_id'));
        });
        $rowId="";
        $qty = 0;
        if($itemCart!==false){
           $data  = Cart::get($itemCart);
           $rowId = $itemCart;
           $qty = $data->qty;
        }
        
        return view('front.pages.producto')->with(['producto'=>$producto,'rowId'=>$rowId,'qty'=>$qty,'carousel'=>false]);
    }

    public function getNoticias(Request $req)
    {
         
        /*$adminRole = Role::whereName('administrator')->first();
        $user1 = User::create(array(
            'name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'john@admin.com',
            'password'      => Hash::make('admin123'),
            'picture'         => '/assets/images/avatar.png',            
            'token'         => str_random(64),
            'activated'     => true,
            'tipo_user'     => 'email'

        ));
        $user1->assignRole($adminRole);
       */
        $noticias = DB::table('noticias')->where('type','Promin.mx')->orderBy('id','desc');  

        if($req->numb!=""){
            $noticias = $noticias->paginate($req->numb);
        }else{
            $noticias = $noticias->paginate(10);
        }

        return view('front.pages.noticias')->with(['noticias'=>$noticias,'carousel'=>false,'input'=>$req]); 
    }
    public function getNosotros()
    {
         
        /*$adminRole = Role::whereName('administrator')->first();
        $user1 = User::create(array(
            'name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'john@admin.com',
            'password'      => Hash::make('admin123'),
            'picture'         => '/assets/images/avatar.png',            
            'token'         => str_random(64),
            'activated'     => true,
            'tipo_user'     => 'email'

        ));
        $user1->assignRole($adminRole);
       */
         

        return view('front.pages.nosotros')->with(['carousel'=>false]); 
    }


    public function getAviso(){
        return view('front.pages.avisos')->with(['carousel'=>false]); 
    }
    public function getTerminos(){
        return view('front.pages.terminos')->with(['carousel'=>false]); 
    }

     public function getContacto()
    {
         
        /*$adminRole = Role::whereName('administrator')->first();
        $user1 = User::create(array(
            'name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'john@admin.com',
            'password'      => Hash::make('admin123'),
            'picture'         => '/assets/images/avatar.png',            
            'token'         => str_random(64),
            'activated'     => true,
            'tipo_user'     => 'email'

        ));
        $user1->assignRole($adminRole);
       */
         

        return view('front.pages.contacto')->with(['carousel'=>false]); 
    }
    /* POST ACTION ONE */

    public function postWhishlist($producto_id){

       # return response()->json(['success'=>url()->previous()]);
        #exit();
        if (Auth::check()) {

            $exist = DB::table('wishlists')
                    ->where('user_id',Auth::user()->id)
                    ->where('product_id',$producto_id)
                    ->first();
            if(!$exist){

            $w= new Wishlist;
            $w->user_id = Auth::user()->id;
            $w->product_id = $producto_id;
            $w->save();
            session()->forget('urls');
            return response()->json(['success'=>true]);

            }else{
                session()->forget('urls');
                return response()->json(['info'=>true]);
            }
        }else{
            return response()->json(['login'=>true]);
        }
    }

    public function postWhishlistDelete($wishlist_id){

        $w= Wishlist::find($wishlist_id);

        if($w){
            $w->delete();
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false],303);        
        }
    }



    public function postSaveNewsletter(Request $req, Response $res)
    {

        /* verificar si ya existe un usuario tipo = newsletter */
        if($req->email!=''){
            $u = User::whereEmail($req->email)->whereNewsletter(1)->first();
            if($u){
              return response()->json(['Este email ya esta suscrito'],303);  
            }
            if(Auth::check()){
                $u = User::whereEmail($req->email)->whereNewsletter(1)->first();
                
                if($u){
                  return response()->json(['Este email ya esta suscrito'],303);  
                }
                
                $user = User::find(Auth::user()->id);                               
              
                $user->linea_negocio = $req->linea;

                $user->newsletter  = 1;

                 $user->tipo_user='email';

                $user->save(); 

                if($user){

                return response()->json(['success'=>"Se inscribio correctamente"],202);     

                }else{
                    return response()->json(['success'=>"Ha ocurrido algo al momento de guardar"],303);
                }
            } 
        }          
        $val = [

            'name'      =>'required|max:200',

            'linea'     =>'required|max:200',
            
            'email'     =>'required|email|max:200'

        ];
        
         
        $validator = Validator::make($req->all(), $val);



        if ($validator->fails()) { //dd($validator);

            return response()->json($validator->errors(),303);     


        }

        $user = new User;                               

        $user->name    =    $req->name;                              

        $user->email   =    $req->email;

        $user->linea_negocio = $req->linea;

        $user->tipo_user   ="newsletter";
        
        $user->activated   = 1;

        $user->newsletter  = 1;

        $user->save();   

        $dd = new DatoFacturacion;
        $dd->user_id = $user->id;
        $dd->save();

        $de = new DatoEnvio;
        $de->user_id = $user->id;
        $de->save();

        $role = Role::whereName('cliente')->first();
        $user->assignRole($role);

        #$mail = Mail::to($user)->send(new UserRegister($user));                                            

        if($user){

            return response()->json(['success'=>"Se inscribio correctamente"],202);     

        }else{

            return response()->json(['success'=>"Ha ocurrido algo al momento de guardar"],303);            

        }

    }

}

