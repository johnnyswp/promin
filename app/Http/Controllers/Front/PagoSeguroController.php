<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
 
use App\Models\Admin\Imagen;
use App\Models\Admin\Producto;
use App\Models\Admin\LineaNegocio;
use App\Models\Admin\Marca;
use App\Models\Admin\TipoProducto;
use App\Models\Front\Pedido;
use App\Models\Front\DetallesPedido;
use App\Models\User;

use App\Models\Front\PedidoDatoFacturacion;

use App\Models\Front\PedidoDatoEnvio;

use DB,Cart;
use Validator,Redirect;

use Auth;

use Hash;






use URL;
use Session;
use Input;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;



class PagoSeguroController extends Controller
{
     private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function pedidoSave(Request $req, Response $res)
    {

        /*Guardar Pedido*/
        $val = [


            'nombre'        =>'required|max:200',
            'apellido'      =>'required|max:200',
            'email'         =>'required|email|max:200',
            'telefono'      =>'required|min:6',
            'razon_social'  =>'required',
            'cp'            =>'required|numeric',
            'rfc'           => array(
                              'required',
                              'min:6',                            
                              'regex:/^[A-Z]{2,4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([A-Z0-9]{0,4})$/'
                              // VECJ 880326 XXXX
                              // CIMA 830930 UC5
                             ),

            'calle'         =>'required',
            'n_ext'         =>'required',
            #'n_int'         =>'required',
            'colonia'       =>'required',
            'municipio'     =>'required',
            'estado'        =>'required',
            'pais'          =>'required',
            //'activo'        =>'required',
            'cp_2'          => 'required|numeric',
            'calle_2'       => 'required',
            'n_ext_2'       => 'required',
            #'n_int_2'       => 'required',
            'colonia_2'     => 'required',
            'municipio_2'   => 'required',
            'estado_2'      => 'required',
        ];

        $validator = Validator::make($req->all(), $val);
        if ($validator->fails()) { dd($validator);
            return redirect()->back()
                        ->withErrors($validator)
                        /*->with('envioF',$eFac)                        
                        ->with('envioD',$eEnvio)  */                      
                        ->withInput();

        }

        /*User Model */    
        $name = $req->get("nombre");
        $last_name = "";
        $email = $req->get("email");;
        $parental_name = $req->get("apellido");
        $telephone = $req->get("telefono");
        $crear_cuenta = $req->get("crear_cuenta");


        
        
        if(Auth::check()){
            $user = User::find(Auth::user()->id); 
            $user_id = $user->id;
        }else{
            if($req->get("crear_cuenta")){
                $email_e = User::where('email',$email)->first();
                if($email_e){
                   $user_id = $email_e->id; 
                }else{
                    $user = new User;
                    $user->name             =$name;
                    $user->parental_name    =$parental_name;
                    $user->telephone        =$telephone;
                    $user->email            =$email;
                    $user->save();

                    $user_id = $user->id;
                }
            }
        }

        /* Pedido Model */
        $pedido = new Pedido;
        $pedido->status = 'En proceso';
        $pedido->user_id = $user_id;
        $pedido->nombre = $name;
        $pedido->apellido = $parental_name;
        $pedido->email = $email;
        $pedido->telefono = $telephone;
        $pedido->total = Cart::subtotal();
        $pedido->save();

        /* Detalle Pedido */
        foreach(Cart::content() as $cart){
            # code...
            $detallePedido = new DetallesPedido;
            $detallePedido->pedido_id =$pedido->id;
            $detallePedido->producto_id=$cart->id;
            $detallePedido->precio=$cart->price;
            $detallePedido->cantidad=$cart->qty;
            $detallePedido->subtotal=$cart->subtotal;
            $detallePedido->save();
        }

        $DatoEnvio = new PedidoDatoEnvio;
        $DatoEnvio->pedido_id =$pedido->id;
        $DatoEnvio->activo =$req->activo;
        $DatoEnvio->cp =$req->cp_2;
        $DatoEnvio->calle =$req->calle_2;
        $DatoEnvio->n_ext =$req->n_ext_2;
        $DatoEnvio->n_int =$req->n_int_2;
        $DatoEnvio->colonia =$req->colonia_2;
        $DatoEnvio->municipio =$req->municipio_2;
        $DatoEnvio->estado =$req->estado_2;
        $DatoEnvio->pais =$req->pais_2;
        $DatoEnvio->save();

        $DatoFacturacion = new PedidoDatoFacturacion;
        $DatoFacturacion->pedido_id =$pedido->id;
        $DatoFacturacion->razon_social =$req->razon_social;
        $DatoFacturacion->rfc =$req->rfc;
        $DatoFacturacion->cp =$req->cp;
        $DatoFacturacion->calle =$req->calle;
        $DatoFacturacion->n_ext =$req->n_ext;
        $DatoFacturacion->n_int =$req->n_int;
        $DatoFacturacion->colonia =$req->colonia;
        $DatoFacturacion->municipio =$req->municipio;
        $DatoFacturacion->estado =$req->estado;
        $DatoFacturacion->pais =$req->pais;
        $DatoFacturacion->save();






        

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        
        $items = [];
        $subtotal = 0;

        foreach(Cart::content() as $cart){
            # code...
            /*$detallePedido = new DetallesPedido;
            $detallePedido->pedido_id =$pedido->id;
            $detallePedido->producto_id=$cart->id;
            $detallePedido->precio=$cart->price;
            $detallePedido->cantidad=$cart->qty;
            $detallePedido->subtotal=$cart->subtotal;
            $detallePedido->save();*/

            $item = new Item();
            $item->setName($cart->name) /** item name **/
            ->setCurrency('MXN')
            ->setQuantity($cart->qty)
            ->setPrice($cart->price);

            $items[] = $item;
            $subtotal = $subtotal + $cart->subtotal;
        }

      /**   $item_1 = new Item();
        $item_1->setName('Item 1')  
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); unit price **/
        /* CONTENT SHOP CART */

        $item_list = new ItemList();
        $item_list->setItems($items);

        /*$item_list = new ItemList();
        $item_list->setItems(array($item_1));*/



        /**/

        /*$amount = new Amount();
        $amount->setCurrency('MXN')
            ->setTotal($subtotal);*/

        $ship_tax = 0;
        $ship_cost = 0;
        $shipping_discount = 0;
        $details = new Details();
        $details->setSubtotal($subtotal)
                ->setTax($ship_tax)
                ->setShipping($ship_cost)
                ->setShippingDiscount(- $shipping_discount);


        $amount = new Amount();
        $amount->setCurrency('MXN')
            ->setDetails($details)
                ->setTotal($subtotal);
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

            
        


        

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));


        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
           /* dd($payment->create($this->_api_context)->id);exit;  ***/
        try {
            $pago = $payment->create($this->_api_context);
            $pedido = Pedido::find($pedido->id);
            $pedido->token = $pago->id;
            $pedido->save();


        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('addmoney.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('addmoney.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error','Unknown error occurred');
        return Redirect::route('addmoney.paywithpaypal'); 
    }


    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        
        Session::forget('paypal_payment_id');
        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('addmoney.paywithpaypal');
        }
        
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        /**  dd($result);exit;/** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') { 

            $pedido = Pedido::where('token',$result->id)->first();
            $pedido->status = 'completado';
            $pedido->save();

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            \Session::put('success','Payment success');


            return Redirect::route('addmoney.paywithpaypal');
        }
        \Session::put('error','Payment failed');
        return Redirect::route('addmoney.paywithpaypal');
    }
       

    /*
    public function addCart($id)
    {
        $pro = Producto::findOrFail($id);
        Cart::add(['id'=>$pro->id, 'name'=>$pro->nombre, 'qty'=>1,'price'=>$pro->priceVenta,'options'=>['img' => $pro->image(), 'link'=>url('linea-negocio/'.str_slug($pro->linea()).'/'.str_slug($pro->nombre).'-'.$pro->id)]]);
        return view('front.includes.carrito');
    }

    public function deleteCart($id)
    {
        Cart::remove($id);
        return view('front.includes.carrito');
    }

    public function updateCart($id,$val)
    {
        Cart::update($id, $val);
        return view('front.includes.carrito');
    }

    public function pedidoCart(){
    	return view('front.pages.pago-seguro')->with('carousel', false);
    }
    */
}
