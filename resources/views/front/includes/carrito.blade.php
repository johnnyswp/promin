<a href="#" class="btn_carrito"><i class="fa fa-shopping-cart carrito"></i> {{Cart::count()}} items - $ {{Cart::total()}}</a>
<div class="dropdown" id="content-cart">
    <nav>
        <ul class="hcart-list">
            @foreach(Cart::content() as $cart)
            <li id="item-cart-{{$cart->id}}}">
                <a href="{{$cart->options->link}}" class="fig pull-left"><img src="{{$cart->options->img}}" style="width: 85%;"></a>
                <div class="block">
                    <a href="{{$cart->options->link}}">{{$cart->name}}</a>
                    <div class="cost"><input type="number" class="input_cant update-cart" value="{{$cart->qty}}" data-id="{{$cart->rowId}}"> $ {{number_format($cart->total, 2, '.', ',')}}<div class="container_eliminar pull-right"><a href="#" class="delete-cart" data-id="{{$cart->rowId}}"><i class="fa fa-remove tipo_roja"></i></a></div></div>
                </div>
            </li>
            @endforeach
        </ul>
    </nav>
    <div class="hcart-total">
        <a href="#" class="btn btn-default btn_checkout"><i class="fa fa-check"></i> Checkout</a>
        <div class="total">Total: <ins>$ {{Cart::total()}}</ins></div>
    </div>
</div>