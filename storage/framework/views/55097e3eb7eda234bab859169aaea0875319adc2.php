<!DOCTYPE html>

<html lang="es">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex">



    <title><?php echo $__env->yieldContent('title'); ?> | Proveedora de Equipos Mineros ® PROMIN ®</title>

  

    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">



    <!-- FOOTER -->

    <?php echo $__env->make('admin.includes/area_css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <style type="text/css">
      .help-block strong {
          color: #b20202 !important;
      }
    </style>
    

  </head>





  <body class="nav-md">

    

    <div class="container body">

      <div class="main_container">

          

        

        <!-- LEFT NAV -->

        <?php echo $__env->make('admin.includes/menu_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



        <!-- TOP NAV -->

        <?php echo $__env->make('admin.includes/area_top_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



        <!-- page content -->

        <div class="right_col" role="main">

          

          <?php echo $__env->yieldContent('content'); ?>          

        

        </div>

        <!-- /page content -->



        <!-- FOOTER -->

        <?php echo $__env->make('admin.includes/area_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

     



        

      </div>

    </div>

    

    <!-- JS -->

    <?php echo $__env->make('admin.includes/area_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



    <!-- Modal Venta -->

    <?php echo $__env->yieldContent('js-script'); ?>

    

  </body>

</html>

