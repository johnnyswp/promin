<a href="#" class="btn_carrito"><i class="fa fa-shopping-cart carrito"></i> <?php echo e(Cart::count()); ?> items - $ <?php echo e(Cart::total()); ?></a>
<div class="dropdown" id="content-cart">
    <nav>
        <ul class="hcart-list">
            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li id="item-cart-<?php echo e($cart->id); ?>}">
                <a href="<?php echo e($cart->options->link); ?>" class="fig pull-left"><img src="<?php echo e($cart->options->img); ?>" style="width: 85%;"></a>
                <div class="block">
                    <a href="<?php echo e($cart->options->link); ?>"><?php echo e($cart->name); ?></a>
                    <div class="cost"><input type="number" class="input_cant update-cart" value="<?php echo e($cart->qty); ?>" data-id="<?php echo e($cart->rowId); ?>"> $ <?php echo e(number_format($cart->total, 2, '.', ',')); ?><div class="container_eliminar pull-right"><a href="#" class="delete-cart" data-id="<?php echo e($cart->rowId); ?>"><i class="fa fa-remove tipo_roja"></i></a></div></div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </nav>
    <div class="hcart-total">
        <a href="#" class="btn btn-default btn_checkout"><i class="fa fa-check"></i> Checkout</a>
        <div class="total">Total: <ins>$ <?php echo e(Cart::total()); ?></ins></div>
    </div>
</div>