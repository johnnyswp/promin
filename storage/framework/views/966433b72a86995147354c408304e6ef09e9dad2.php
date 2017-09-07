<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <?php if($message = Session::get('success')): ?>
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <?php echo $message; ?>

                </div>
                <?php Session::forget('success'); Cart::destroy(); Session::forget('pedido_id');Session::forget('email'); ?>
                <?php endif; ?>
                <?php if($message = Session::get('error')): ?>
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <?php echo $message; ?>

                </div>
                <?php Session::forget('error'); Cart::destroy(); Session::forget('pedido_id');Session::forget('email');?>
                <?php endif; ?>
               
            </div>
        </div>
    </div>
</div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>