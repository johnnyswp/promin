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
}
