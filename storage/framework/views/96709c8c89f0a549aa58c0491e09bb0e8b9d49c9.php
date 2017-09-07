<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Login | Proveedora de Equipos Mineros ® PROMIN ®</title>
  
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">

    <!-- FOOTER -->
    <?php echo $__env->make('admin.includes.area_css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <link href="<?php echo e(asset('asset_admin/css/login.css')); ?>" rel="stylesheet">
    
  </head>


  <body class="nav-md">
    
    <div class="container body">
      <div class="main_container">
          
        
        <div class="text-center" style="padding:50px 0">
          <div class="logo"><img src="<?php echo e(asset('asset_admin/images/promin-logo.png')); ?>" alt=""></div>
          <!-- Main Form -->
          <div class="login-form-1">
            <form  class="text-left" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo e(csrf_field()); ?>

              <div class="login-form-main-message"></div>
              <div class="main-login-form">
                <div class="login-group">
                  <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <label for="lg_username" class="sr-only">Usuario</label>
                    <input type="text" class="form-control " id="lg_username" name="email" placeholder="Usuario" value="<?php echo e(old('email')); ?>">
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                  <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <label for="lg_password" class="sr-only">Contraseña</label>
                    <input type="password" class="form-control" id="lg_password" name="password" placeholder="Contraseña">
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
                  </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
              </div>
            </form>
          </div>
          <!-- end:Main Form -->
        </div>


        
      </div>
    </div>
    
    <!-- JS -->
    <?php echo $__env->make('admin.includes.area_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
  </body>
</html>

