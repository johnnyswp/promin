<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <?php echo $__env->yieldContent('metadata'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <title><?php echo $__env->yieldContent('title'); ?> - PROMIN - Mexico / USA</title>

    <link rel="shortcut icon" href="<?php echo e(url('favicon.ico')); ?>">    

    <link href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(url('assets/css/style.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(url('assets/css/stilos.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('style'); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>

<body>



    



<!-- Preloader -->

<?php echo $__env->make('front.includes.area_preloader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>





<!-- Chat -->

<?php echo $__env->make('front.includes.area_chat', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<!-- Top Datos -->

<?php if(Auth::guest()): ?>

    <?php echo $__env->make('front.includes.area_top_dato', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php else: ?>

    <?php echo $__env->make("front.includes.area_top_datos_login", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endif; ?>

<!-- WRAPPER -->

<div class="wrapper">

    

    <!-- MENU -->

    <?php echo $__env->make('front.includes.inicio_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



    <?php if($carousel): ?>

    <!-- CARRUSEL -->

    <?php echo $__env->make('front.includes.inicio_carrusel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php endif; ?>

    

    <!-- CONTENT -->

    <div class="content">

        

        <!-- CONTENIDO -->

        <?php echo $__env->yieldContent('content'); ?>



        <!-- NEWSLETTER -->

        <?php echo $__env->make('front.includes.area_newsletter2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        

    </div>

    <!-- /.content -->



</div>

<!-- /.wrapper -->







<!-- FOOTER -->

<?php echo $__env->make('front.includes.area_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<!-- LOGIN -->

<?php echo $__env->make('front.includes.area_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<!-- Crear Cuenta -->

<?php echo $__env->make('front.includes.area_crear_cuenta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<!-- ScrollTop Button -->

<?php echo $__env->make('front.includes.area_boton_scroll', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>







<script src="<?php echo e(url('assets/js/jquery-2.1.1.min.js')); ?>"></script>

<script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(url('assets/js/jquery.plugins.min.js')); ?>"></script>

<script src="<?php echo e(url('assets/js/custom.min.js')); ?>"></script>

<script src="<?php echo e(url('assets/js/promin.js')); ?>"></script>

<script src="<?php echo e(url('assets/js/promin-cart.js')); ?>"></script>


 <?php echo $__env->yieldContent('js-script'); ?>

 <script type="text/javascript">    

    jQuery(document).ready(function() {

       jQuery('.whish').on('click', function (event) {

            event.preventDefault();

            var pro = jQuery(this).attr('producto');

            $.ajax({

                method: "GET",

                type:'json',

                url: "/whishlist/"+pro,            

                success: function(data) {

                    console.log("success.wishlist");

                    if(data.success){                        

                        jQuery(this).addClass('disabled'); 

                        promin.m('success','Producto agregado a su wishlist');

                    }

                    if(data.info){    

                                        

                        promin.m('info','Este producto ya existe en su wishlist');

                    }

                    if(data.login){    

                        $('#login_open').click(); 
                        $('#url').attr('active',1);
                        $('#url').attr('producto',pro) 



                    }

                },

                error: function(data) {

                        promin.m('danger','Error al agregar a su wishlist');                   

                }

            });

       });

       jQuery('#sendFormCreate').on('click', function(event) {



            event.preventDefault();



            promin.register();



        });

       jQuery('#sendFormLogin').on('click', function(event) {



            event.preventDefault();



            promin.login();



        });
        <?php if(session('urls')): ?>
            console.log('entro session');
             $.ajax({

                method: "GET",

                type:'json',

                url: "/whishlist/"+<?php echo e(session('urls')); ?>,            

                success: function(data) {

                    console.log("success.wishlist");

                    if(data.success){                        
                        jQuery(this).addClass('disabled'); 

                        promin.m('success','Producto agregado a su wishlist');

                        setTimeout(function() {
                             window.location.href = "<?php echo e(session('wish')); ?>";
                        }, 1000);
                    }

                    if(data.info){    

                                        

                        promin.m('info','Este producto ya existe en su wishlist');

                    }

                    if(data.login){    

                        $('#login_open').click(); 
                        $('#url').attr('active',1);
                        $('#url').attr('producto',pro) 



                    }
                }
             });    
        <?php endif; ?>
    });

</script>

<style type="text/css" media="screen">

    span.red{ background-color: red; }

    span.blue{ background-color: #027ee4; }

</style>

 <span id="m" class="msj_success hide" ><i class="fa "></i> <b>Mensaje</b> </span>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCQ4twFS87Ji-69gchik7Vak4lEsxOCA6M"></script>
</body>



</html>