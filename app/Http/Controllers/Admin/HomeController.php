<?php



namespace App\Http\Controllers\Admin;


use Validator;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\Gasto;
use App\Models\Admin\Bitacora;
use App\Models\Admin\Documento;
use App\Models\Admin\Banner;
use App\Models\Admin\TipoProducto;
use App\Models\Admin\LineaNegocio;
use App\Models\Admin\Marca;
use App\Models\Admin\Modelo;
use App\Models\Admin\Producto;
use App\Models\Admin\Imagen;
use App\Models\User;
use Auth;
use Carbon\Carbon as Carbon;
use PDF;

class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }


    public function index()

    {
        return view('admin.pages.dashboard.index');
    }

    public function addGastos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cantidad' => 'required|integer',
            'descripcion' => 'required|max:200',
            'precio' => 'required|numeric',

        ]);

        if ($validator->fails()) {
            session(['state' => 'gas']);
            return redirect()->back()->withErrors($validator)->withInput();

        }

        $gastos = $request->cantidad*$request->precio;
        $gastos = $gastos+$request->total;

        if($request->pv < $gastos){
            session(['state' => 'gas']);
            session(['error' => 'Los gastos no pueden ser mayor al precio de venta']);
           return redirect()->back()->withInput();
        }

        $gasto = new Gasto;
        $gasto->producto_id = $request->producto_id;
        $gasto->cantidad = $request->cantidad;
        $gasto->descripcion = $request->descripcion;
        $gasto->precio = $request->precio;
        $gasto->user_id = Auth::id();
        $gasto->save();

        session(['state' => 'gas']);
        return redirect()->back();
    }

    public function delGastos(Request $request){
        $Gasto = Gasto::find($request->gasto_id)->delete();
        session(['state' => 'gas']);
        return redirect()->back();
    }

    public function addBitacoras(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comentario' => 'required|max:200',
            'responsable' => 'required|max:200',

        ]);
        if ($validator->fails()) {
            session(['state' => 'bit']);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $gasto = new Bitacora;
        $gasto->producto_id = $request->producto_id;
        $gasto->comentario = $request->comentario;
        $gasto->responsable = $request->responsable;
        $gasto->save();
        session(['state' => 'bit']);
        return redirect()->back();
    }

    public function delBitacoras(Request $request){
        Bitacora::find($request->bitacora_id)->delete();
        session(['state' => 'bit']);
        return redirect()->back();
    }

    public function addDocumentos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comentario_doc' => 'required|max:200',
            'documento' => 'required|mimes:jpeg,jpg,png,gif,ppt,doc,docx,xls,pdf,xlsx,pptx'

        ]);
        if ($validator->fails()) {
            session(['state' => 'doc']);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $doc = new Documento;
        $doc->producto_id = $request->producto_id;
        $doc->comentario = $request->comentario_doc;
        
        if($request->file('documento')!=NULL)
        { 
            $file_documento=$request->file('documento');
            $ext = $request->file('documento')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $documento= $doc->id.$nameIMG.'.'.$ext;
            $picname = $documento;
            $documento= url('asset/docucumentos').'/marca'.$documento;
            $doc->documento = $documento;
        }
        if($doc->save()){
            if($request->file('documento')!=NULL)            {
                $file_documento->move("asset/docucumentos/",$documento);
                if($ext=="jpg" or $ext == 'jpeg' or $ext == 'png'){
                    // Cargar la estampa y la foto para aplicarle la marca de agua
                    $estampa = imagecreatefrompng(base_path('asset_admin/images/SinValorComercial.png'));
                    if($ext == 'png'){
                        $im = imagecreatefrompng(base_path('asset/docucumentos/marca'. $picname));
                    }else{
                        $im = imagecreatefromjpeg(base_path('asset/docucumentos/marca'. $picname));
                    }
                    
                    
                    // Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
                    $margen_dcho = 0;
                    $margen_inf = 0;
                    $sx = imagesx($estampa);
                    $sy = imagesy($estampa);
                    
                    // Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el
                    // ancho de la foto para calcular la posición de la estampa. 
                    imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));
                    
                    // Imprimir y liberar memoria
                    header('Content-type: image/png');
                    imagepng($im,base_path('asset/docucumentos/marca'. $picname));
                    imagedestroy($im);
                } 
            }
            session(['state' => 'doc']);
            return redirect()->back();
        }
    }

    public function delDocumentos(Request $request){
        Documento::find($request->documento_id)->delete();
        session(['state' => 'doc']);
        return redirect()->back();
    }

    public function getSortable($table,Request $request){
        $array = $request->datos;
        $array = explode(',',$array[0]);

        foreach ($array as $position => $item)
        {

            $promo = Banner::find($item);
            $promo->order_img = $position;
            $promo->save();  
        }

        return response()->json(array('success'  => true ));
    }

    public function addProducto(){
        $lineas = LineaNegocio::where('tipo','unidades')->get();

        if(!$producto=Producto::where('state', 'draf')->first()){

            $producto = new Producto;

            $producto->state = "draf";

            $producto->save();

        }

        Imagen::where('producto_id', $producto->id)->orderBy('order_img', 'ASC')->delete();
        
        $img = new Imagen;
        $img->producto_id = $producto->id;
        $img->order_img = 1;
        $img->video = 1;
        $img->picture = '/asset/images/promin_play.jpg';
        $img->save();

        $imgs = Imagen::where('producto_id', $producto->id)->orderBy('order_img', 'ASC')->get();
        $accesos = DB::table('users')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')     
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('roles.name','<>','cliente')
                ->pluck('users.name', 'users.id')->toArray();
        $accesos[''] = "Seleccione una opción";

        $tipos = array();
        $marcas = array();
        $modelos = array();

        if(old('linea_negocio_id')){
            $tipos = TipoProducto::where('linea_negocio_id', old('linea_negocio_id'))->get();
            if(old('tipo_producto_id')){
                $marcas = Marca::where('tipo_producto_id',old('tipo_producto_id'))->get();
                //var_dump($marcas);
                if(old('marcas_id')){
                    $modelos = Modelo::where('marcas_id', old('marcas_id'))->get();
                }
            }
        }

        return view('admin.pages.productos.new-unidades')->with(['tipos'=>$tipos, 'marcas'=>$marcas, 'modelos'=>$modelos,'accesos'=>$accesos, 'lineas'=>$lineas, 'producto'=>$producto, 'imgs'=>$imgs]);

    }

    public function saveProducto(Request $request, $id){
        $producto = Producto::find($id);
        $state =  $producto->state;
        $data = array(
            'linea_negocio_id' => 'required|max:200',
            'tipo_producto_id' => 'required|max:200',
            'marcas_id' => 'required|max:200',
            'modelo_id' => 'required|max:200',
            'codigo' => 'required|unique:productos,codigo,'.$id.'|max:200',
            'motor' => 'max:200',
            'combustible' => 'max:200',
            'cantidad' => 'required|integer',
            'minimo' => 'required|integer',
            'ficha' => 'max:200',
            'serie' => 'required|max:200',
            'nFact' => 'required|max:200',
            'asesor_id' => 'required|max:200',
            'priceVenta' => 'required|numeric',
            'descripcion' => 'max:160',
            'keywork' => 'max:160',
            'state' => 'required|max:20',
            'destacado' => 'max:200',
        );

        if($request->has('ano'))
            $data['ano'] = 'integer';
        if($request->has('ano'))
            $data['ano'] = 'integer';
        if($request->has('alto'))
            $data['alto'] = 'integer';
        if($request->has('largo'))
            $data['largo'] = 'integer';
        if($request->has('ancho'))
            $data['ancho'] = 'integer';
        if($request->has('peso'))
            $data['peso'] = 'integer';
        if($request->has('horometro'))
            $data['horometro'] = 'integer';
        if($request->has('linkMercadoLibre'))
            $data['linkMercadoLibre'] = 'url';
        if($request->has('LinkMachineryTrader'))
            $data['LinkMachineryTrader'] = 'url';
        if($request->has('link_video'))
            $data['link_video'] = 'url';

        if($state == "draf"){
            $data['galeria'] = 'required|mimes:jpeg,bmp,png';
        }
        if(!Imagen::where('producto_id', $producto->id)->get()){
            session(['error' => 'Seleccione una imagen en la galeria.']);
            return redirect()->back()->withInput();
        }
        $validator = Validator::make($request->all(), $data);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $producto->linea_negocio_id = $request->linea_negocio_id;
        $producto->tipo_producto_id = $request->tipo_producto_id;
        $producto->marcas_id = $request->marcas_id;
        $producto->modelo_id = $request->modelo_id;
        $producto->linea_negocio_id = $request->linea_negocio_id;
        $producto->serie = $request->serie;
        $producto->nFact = $request->nFact;
        $producto->nPedi = $request->nPedi;
        $producto->horometro = $request->horometro;
        $producto->asesor_id = $request->asesor_id;
        $producto->priceVenta = $request->priceVenta;
        $producto->descripcion = $request->descripcion;
        $producto->linkMercadoLibre = $request->linkMercadoLibre;
        $producto->LinkMachineryTrader = $request->LinkMachineryTrader;
        $producto->alto = $request->alto;
        $producto->largo = $request->largo;
        $producto->ancho = $request->ancho;
        $producto->peso = $request->peso;
        $producto->keywork = $request->keywork;
        $producto->state = $request->state;
        $producto->codigo = $request->codigo;
        $producto->ano = $request->ano;
        $producto->combustible = $request->combustible;
        $producto->cantidad = $request->cantidad;
        $producto->minimo = $request->minimo;
        $producto->ficha = $request->ficha;
        $producto->mx = 0; 
        $producto->motor = $request->motor;
        $producto->destacado = $request->destacado;
        $producto->link_video = $request->link_video;
        $producto->nombre = $producto->codigo.' '.$producto->tipo().' '.$producto->marca().' '.$producto->modelo();
        if($state == "draf"){
            $producto->created_at = Carbon::now();
        }
        $producto->save();
        return redirect('/admin/productos');
    }

    public function saveMxProducto(Request $request, $id){
        $validator = Validator::make($request->all(), [
            //entradas
            'nombreMotor' => 'max:200',
            'tipoMotor' => 'max:200',
            'modeloMotor' => 'max:200',
            'SerieMotor' => 'max:200',
            'motor' => 'max:200',
            'trenRodaje' => 'max:200',
            'sistemaElectrico' => 'max:200',
            'tableroInstrumentos' => 'max:200',
            'frenos' => 'max:200',
            'sistemaHidraulico' => 'max:200',
            'equipos' => 'max:200',
            'filtros' => 'max:200',
            'carroceria' => 'max:200',
            'rodillosVibratorios' => 'max:200',
            'transmicionMarca' => 'max:200',
            'transmicionModelo' => 'max:200',
            'transmicionMserie' => 'max:200',
            'transmicion' => 'max:200',
            'varios' => 'max:200',
            'combustible' => 'max:200',
            'tomaFotos' => 'max:200',
            'avaluoLlantas' => 'max:200',
            'statusLlantas' => 'max:200',
            'observacionesLlantas' => 'max:200',
            'status' => 'max:200',
            'observacioneGenerales' => 'max:200',
            'observaciones' => 'max:200',

        ]);

        $gastos = $request->gastos;
        if($request->priceVenta < $gastos){

            session(['error' => 'Los gastos no pueden ser mayor al precio de venta']);
           return redirect()->back()->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $producto = Producto::find($id);
        $producto->nombreMotor = $request->nombreMotor;
        $producto->tipoMotor = $request->tipoMotor;
        $producto->modeloMotor = $request->modeloMotor;
        $producto->SerieMotor = $request->SerieMotor;
        if ($request->motor != NULL) {
            $producto->motor = implode(',',$request->motor);
        }else{
            $producto->motor = "";
        }
        $producto->mx = 1; 
        

        if ($request->trenRodaje != NULL){
            $producto->trenRodaje = implode(',',$request->trenRodaje);
        }else{
            $producto->trenRodaje = "";
        }
        
        if ($request->sistemaElectrico != NULL) {
            $producto->sistemaElectrico = implode(',',$request->sistemaElectrico);
        }else{
            $producto->sistemaElectrico = "";
        }
        
        if ($request->tableroInstrumentos != NULL) {
            $producto->tableroInstrumentos = implode(',',$request->tableroInstrumentos);
        }else{
            $producto->tableroInstrumentos = "";
        }
        
        if ($request->frenos != NULL) {
            $producto->frenos = implode(',',$request->frenos);
        }else{
            $producto->frenos = "";
        }
        
        if ($request->sistemaHidraulico != NULL) {
            $producto->sistemaHidraulico = implode(',',$request->sistemaHidraulico);
        }else{
            $producto->sistemaHidraulico = "";
        }
        
        if ($request->equipos != NULL) {
            $producto->equipos = implode(',',$request->equipos);
        }else{
            $producto->equipos = "";
        }
        
        if ($request->filtros != NULL) {
            $producto->filtros = implode(',',$request->filtros);
        }else{
            $producto->filtros = "";
        }
        
        if ($request->carroceria != NULL) {
            $producto->carroceria = implode(',',$request->carroceria);
        }else{
            $producto->carroceria = "";
        }
        
        if ($request->rodillosVibratorios != NULL) {
            $producto->rodillosVibratorios = implode(',',$request->rodillosVibratorios);
        }else{
            $producto->rodillosVibratorios = "";
        }
        
        $producto->transmicionMarca = $request->transmicionMarca;
        $producto->transmicionModelo = $request->transmicionModelo;
        $producto->transmicionMserie = $request->transmicionMserie;

        if ($request->transmicion != NULL) {
            $producto->transmicion = implode(',',$request->transmicion);
        }else{
            $producto->transmicion = "";
        }
        
        if ($request->varios != NULL) {
            $producto->varios = implode(',',$request->varios);
        }else{
            $producto->varios = "";
        }
        
        $producto->combustible = $request->combustible;
        $producto->tomaFotos = $request->tomaFotos;
        $producto->avaluoLlantas = $request->avaluoLlantas;
        $producto->statusLlantas = $request->statusLlantas;
        $producto->observacionesLlantas = $request->observacionesLlantas;
        $producto->status = $request->status;
        $producto->observacioneGenerales = $request->observacioneGenerales;
        $producto->observaciones = $request->observaciones;
        $producto->nombreMotor = $request->nombreMotor;
        $producto->variosOtros = $request->variosOtros;
        $producto->save();
        session(['state' => 'ent']);
        return redirect()->back();
    }

    public function getWishlist(Request $request){
        
        if(!$_POST){
            $accesos = DB::table('users')->join('role_user', 'role_user.user_id', '=', 'users.id')->join('roles', 'role_user.role_id', '=', 'roles.id')->where('roles.name','cliente')->select('users.name as nombre', 'users.last_name as apellido', 'users.parental_name as s_apellido', 'users.id as id')->orderBy('users.name', 'ASC')->get();
            $lineas = DB::table('productos')->join('linea_negocios', 'linea_negocios.id', '=', 'productos.linea_negocio_id')
                                        ->select('linea_negocios.id as id', 'linea_negocios.nombre as nombre')
                                        ->groupBy('linea_negocios.id')
                                        ->get();

            return view('admin.report.reporte-wishlists')->with(['clientes'=>$accesos, 'lineas'=>$lineas]);
        }else{
            //dd($request->desde);
            $wishlists = DB::table('wishlists')->join('users', 'wishlists.user_id', '=', 'users.id')
                                               ->join('productos', 'wishlists.product_id', '=', 'productos.id')
                                               ->join('linea_negocios', 'productos.linea_negocio_id', '=', 'linea_negocios.id')
                                               ->join('tipos_productos', 'productos.tipo_producto_id', '=', 'tipos_productos.id')
                                               ->join('marcas', 'productos.marcas_id', '=', 'marcas.id')
                                               ->join('modelos', 'productos.modelo_id', '=', 'modelos.id');
            $wishlists = $wishlists->where('wishlists.created_at', '>=', Carbon::parse($request->desde))
                                   ->where('wishlists.created_at', '<=', Carbon::parse($request->hasta)->addDay(2));
            if($request->cliente!="all" and $request->cliente!=""){
                $cliente = User::find($request->cliente);
                $cliente = $cliente->name.' '.$cliente->last_name.' '.$cliente->parental_name;
                $wishlists = $wishlists->where('wishlists.user_id', $request->cliente);
            }else
                $cliente = "Todos";
           
            if($request->linea!="all" and $request->linea!=""){
                $linea = LineaNegocio::find($request->linea)->nombre;
                $wishlists = $wishlists->where('productos.linea_negocio_id', $request->linea);
            }else
                $linea = "Todas";

            if($request->tipo!="all" and $request->tipo!=""){
                $tipo = TipoProducto::find($request->tipo)->nombre;
                $wishlists = $wishlists->where('productos.tipo_producto_id', $request->tipo);
            }else
                $tipo = "Todos";

            if($request->marcas!="all" and $request->marcas!=""){
                $marca = Marca::find($request->marcas)->nombre;
                $wishlists = $wishlists->where('productos.marcas_id', $request->marcas);
            }else
                $marca = "Todos";

            if($request->modelos!="all" and $request->modelos!=""){
                $modelo = Modelo::find($request->modelos)->nombre;
                $wishlists = $wishlists->where('productos.modelo_id', $request->modelos);
            }else
                $modelo = "Todos";

            if($request->order_linea=="asc" or $request->order_linea=="desc"){
                $wishlists = $wishlists->orderBy('linea_negocios.nombre');
            }elseif($request->order_linea=="new"){
                    $wishlists = $wishlists->orderBy('linea_negocios.created_at','DESC');
            }elseif($request->order_linea=="old"){
                    $wishlists = $wishlists->orderBy('linea_negocios.nombre','ASC');
            }

            if($request->order_tipo=="asc" or $request->order_tipo=="desc"){
                $wishlists = $wishlists->orderBy('tipos_productos.nombre');
            }elseif($request->order_tipo=="new"){
                    $wishlists = $wishlists->orderBy('tipos_productos.created_at','DESC');
            }elseif($request->order_tipo=="old"){
                    $wishlists = $wishlists->orderBy('tipos_productos.created_at','ASC');
            }

            if($request->order_tipo=="asc" or $request->order_tipo=="desc"){
                $wishlists = $wishlists->orderBy('marcas.nombre');
            }elseif($request->order_tipo=="new"){
                    $wishlists = $wishlists->orderBy('marcas.created_at','DESC');
            }elseif($request->order_tipo=="old"){
                    $wishlists = $wishlists->orderBy('marcas.created_at','ASC');
            }

            if($request->order_tipo=="asc" or $request->order_tipo=="desc"){
                $wishlists = $wishlists->orderBy('modelos.nombre');
            }elseif($request->order_tipo=="new"){
                    $wishlists = $wishlists->orderBy('modelos.created_at','DESC');
            }elseif($request->order_tipo=="old"){
                    $wishlists = $wishlists->orderBy('modelos.nombre','ASC');
            }

            $wishlists = $wishlists->groupBy('wishlists.id')->select('wishlists.created_at as fecha','users.name as nombre', 'users.last_name as apellido', 'users.parental_name as s_apellido', 'users.email as email', 'linea_negocios.nombre as linea', 'tipos_productos.nombre as tipo', 'marcas.nombre as marca', 'modelos.nombre as modelo', 'productos.priceVenta as precio', 'productos.nombre as producto', 'productos.id as producto_id')->get();

            $pdf = PDF::loadView('admin.pdf.wishlists', ['wishlists'=>$wishlists,'cliente'=> $cliente,'linea'=> $linea,'tipo'=>$tipo,'marca'=>$marca,'modelo'=>$modelo,'desde'=>Carbon::parse($request->desde)->format('d-M-Y'),'hasta'=>Carbon::parse($request->hasta)->format('d-M-Y')]);
            $rout = 'asset_admin/pdfs/wishlists-'.date("YmdHis").'.pdf';
            $pdf->save(base_path($rout));


            return view('admin.report.reporte-wishlists-data')->with(['rout'=>$rout, 'wishlists'=>$wishlists,'cliente'=> $cliente,'linea'=> $linea,'tipo'=>$tipo,'marca'=>$marca,'modelo'=>$modelo,'desde'=>Carbon::parse($request->desde)->format('d').'-'.trans('main.'.Carbon::parse($request->desde)->format('m')).'-'.Carbon::parse($request->desde)->format('Y'),'hasta'=>Carbon::parse($request->hasta)->format('d').'-'.trans('main.'.Carbon::parse($request->hasta)->format('m')).'-'.Carbon::parse($request->hasta)->format('Y')  ]);
        }
    }
}

