<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
 
use App\Models\Admin\Imagen;
use App\Models\Admin\Producto;
use App\Models\Admin\LineaNegocio;
use App\Models\Admin\Marca;
use App\Models\Admin\TipoProducto;
use DB,Cart;

class ShopingCartController extends Controller
{
    public function addCart($id)
    {
        $pro = Producto::findOrFail($id);
        if($pro->mx != 1){
            session(['pro_id'=>$id]);
            $cart = Cart::content();
            $itemCart = $cart->search(function ($cartItem, $rowId) {
                return $cartItem->id === intval(session('pro_id'));
            });

            if($itemCart!==false){
               $data = Cart::get($itemCart);
               if($data->qty >= $pro->cantidad){
                  return "0";
               }
            }
        }

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
        $qty = $val;
        $cart = Cart::get($id);
        $pro = Producto::findOrFail($cart->id);
        if($pro->mx == '0'){
            session(['pro_id'=>$id]);
            if($cart->qty >= $pro->cantidad and $val>$pro->cantidad){
                $html = '<a href="#" class="btn_carrito"><i class="fa fa-shopping-cart carrito"></i> '.Cart::count().' items - $ '.Cart::subtotal().'</a>
                         <div class="dropdown" id="content-cart">
                             <nav>
                                 <ul class="hcart-list">';
                                    foreach(Cart::content() as $cart){
                                      $html .= '<li id="item-cart-'.$cart->id.'">
                                                    <a href="'.$cart->options->link.'" class="fig pull-left"><img src="'.$cart->options->img.'" style="width: 85%;"></a>
                                                    <div class="block">
                                                        <a href="'.$cart->options->link.'">'.$cart->name.'</a>
                                                        <div class="cost"><input type="number" class="input_cant update-cart" value="'.$cart->qty.'" data-id="'.$cart->rowId.'"> $ '.number_format($cart->subtotal, 2, '.', ',').'<div class="container_eliminar pull-right"><a href="#" class="delete-cart" data-id="'.$cart->rowId.'"><i class="fa fa-remove tipo_roja"></i></a></div></div>
                                                    </div>
                                                </li>';
                                                if($cart->rowId==$id){ $qty = $cart->qty; }
                                    }
                                 $html .= '</ul>
                             </nav>
                             <div class="hcart-total">
                                 <a href="/pago-seguro" class="btn btn-default btn_checkout"><i class="fa fa-check"></i> Checkout</a>
                                 <div class="total">Total: <ins>$ '.Cart::subtotal().'</ins></div>
                             </div>
                         </div>';
               return response()->json(['html'=>$html,'error'=>'1']);
            }
        }
        Cart::update($id,$val);
        $html = '<a href="#" class="btn_carrito"><i class="fa fa-shopping-cart carrito"></i> '.Cart::count().' items - $ '.Cart::subtotal().'</a>
                 <div class="dropdown" id="content-cart">
                     <nav>
                         <ul class="hcart-list">';
                            foreach(Cart::content() as $cart){
                              $html .= '<li id="item-cart-'.$cart->id.'">
                                            <a href="'.$cart->options->link.'" class="fig pull-left"><img src="'.$cart->options->img.'" style="width: 85%;"></a>
                                            <div class="block">
                                                <a href="'.$cart->options->link.'">'.$cart->name.'</a>
                                                <div class="cost"><input type="number" class="input_cant update-cart" value="'.$cart->qty.'" data-id="'.$cart->rowId.'"> $ '.number_format($cart->subtotal, 2, '.', ',').'<div class="container_eliminar pull-right"><a href="#" class="delete-cart" data-id="'.$cart->rowId.'"><i class="fa fa-remove tipo_roja"></i></a></div></div>
                                            </div>
                                        </li>';
                                        if($cart->rowId==$id){ $qty = $cart->qty; }
                            }
               $html .= '</ul>
                     </nav>
                     <div class="hcart-total">
                         <a href="/pago-seguro" class="btn btn-default btn_checkout"><i class="fa fa-check"></i> Checkout</a>
                         <div class="total">Total: <ins>$ '.Cart::subtotal().'</ins></div>
                     </div>
                 </div>';
        return response()->json(['html'=>$html,'error'=>'0','qty'=>$qty,'id'=>$pro->id]);
    }

    public function updateOneCart($id,$val,$mode)
    {
        $error = "0";
        $qty = $val;
        if($val<0){
            $error = "4";
            $qty = 0;
        }else{
            $pro = Producto::findOrFail($id);
            
            
            session(['pro_id'=>$id]);
            $cart = Cart::content();
            $itemCart = $cart->search(function ($cartItem, $rowId) {
                return $cartItem->id === intval(session('pro_id'));
            });
           
            if($itemCart!==false){
                $data = Cart::get($itemCart);
                if($pro->mx != 1){
                    if($data->qty > $pro->cantidad or $val>$pro->cantidad){
                        $error = "1";
                    }else{
                        Cart::update($itemCart,$val);
                    }
                }else{
                    Cart::update($itemCart,$val);
                }
            }else{
                if($val<=0){
                    $error = "2";
                }else{
                    if($mode=='add'){
                     Cart::add(['id'=>$pro->id, 'name'=>$pro->nombre, 'qty'=>1,'price'=>$pro->priceVenta,'options'=>['img' => $pro->image(), 'link'=>url('linea-negocio/'.str_slug($pro->linea()).'/'.str_slug($pro->nombre).'-'.$pro->id)]]);
                    }else{
                        $error = "3";
                    }
                }
            }
        } 
        $html = '<a href="#" class="btn_carrito"><i class="fa fa-shopping-cart carrito"></i> '.Cart::count().' items - $ '.Cart::subtotal().'</a>
                 <div class="dropdown" id="content-cart">
                     <nav>
                         <ul class="hcart-list">';
                            foreach(Cart::content() as $cart){
                              $html .= '<li id="item-cart-'.$cart->id.'">
                                            <a href="'.$cart->options->link.'" class="fig pull-left"><img src="'.$cart->options->img.'" style="width: 85%;"></a>
                                            <div class="block">
                                                <a href="'.$cart->options->link.'">'.$cart->name.'</a>
                                                <div class="cost"><input type="number" class="input_cant update-cart" value="'.$cart->qty.'" data-id="'.$cart->rowId.'"> $ '.number_format($cart->subtotal, 2, '.', ',').'<div class="container_eliminar pull-right"><a href="#" class="delete-cart" data-id="'.$cart->rowId.'"><i class="fa fa-remove tipo_roja"></i></a></div></div>
                                            </div>
                                        </li>';
                                        if($cart->id==$id){ $qty = $cart->qty; }
                            }
               $html .= '</ul>
                     </nav>
                     <div class="hcart-total">
                         <a href="/pago-seguro" class="btn btn-default btn_checkout"><i class="fa fa-check"></i> Checkout</a>
                         <div class="total">Total: <ins>$ '.Cart::subtotal().'</ins></div>
                     </div>
                 </div>';
        return response()->json(['html'=>$html,'error'=>$error, 'qty'=>$qty]);
    }

    public function pedidoCart(){
    	return view('front.pages.pago-seguro')->with('carousel', false);
    }
}
