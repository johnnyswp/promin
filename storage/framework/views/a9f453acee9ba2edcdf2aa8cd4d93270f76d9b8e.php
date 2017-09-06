<div class="block-popup popup plogin skin-yellow" id="login">

    <a href="" class="pclose small"><i class="custom-icon custom-icon-close-s"></i></a>

    <h3 class="text-center">Ingresa a tu cuenta</h3>

       <div id="form-errors-login"></div>

     

    <form class="loginform" role="form" method="POST" action="<?php echo e(route('login')); ?>">

        <div class="formwrap">

            <div class="form-group">

             <?php echo e(csrf_field()); ?>


                <input type="text" class="form-control" placeholder="Usuario" name="email" id="email_login" value="<?php echo e(old('email')); ?>" required autofocus>
                <input type="hidden" name="url" id="url" active='0' producto='0' value="<?php echo e(url()->previous()); ?>">
            </div>

            <div class="form-group has-feedback">

                <input type="password" class="form-control login-password" placeholder="Contraseña" id="login-password" name="password" required>

            </div>

        </div>

        <div class="checkbox">

            <label>

                <input type="checkbox" value="" >

                Recuérdame

            </label>

        </div>

        <div class="form-group text-center">

            <button id="sendFormLogin" type="submit" class="btn btn-default block"><i class="fa fa-check"></i> Aceptar</button>

            <a href="/password/reset"  class="block">¿Olvidaste tu contraseña?</a>

            <br>

            <a href="#" data-popup="crear_cuenta" class="block">Crear cuenta</a>

        </div>



        <div class="row">

            <hr>

            <h4 class="text-center">o desde</h4>

            <div class="col-md-6">

            <a  href="<?php echo e(url('/social/redirect/facebook')); ?>" class="btn btn-default btn-sm btn_login_f"><i class="fa fa-facebook"></i> Facebook</a ></div>

            <div class="col-md-6"><a  href="<?php echo e(url('/social/redirect/twitter')); ?>" class="btn btn-default btn-sm btn_login_t"><i class="fa fa-twitter"></i> Twitter</a></div>

            <div class="col-md-12 text-center">

                <a href="#" class="a-privacy block text-center">Aviso de Privacidad</a>    

                <br><br><br>

            </div>

        </div>

        

    </form>

    

</div>



<div class="block-popup popup plogin skin-yellow" id="recuperar_password">

    <a href="" class="pclose small"><i class="custom-icon custom-icon-close-s"></i></a>

    <h3 class="text-center">Recuperar Contraseña</h3>



    <form class="loginform" role="form" method="POST" action="<?php echo e(route('password.request')); ?>">

        <div class="formwrap">

             <?php echo e(csrf_field()); ?>


            <div class="form-group has-feedback">

            <input   type="email" class="form-control" name="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" required autofocus>

            </div>

        </div>

        <div class="form-group text-center">

            <button type="submit"  class="btn btn-default block"><i class="fa fa-check"></i> Aceptar</button>

            <br>

            <a href="#" style="cursor: pointer;" data-popup="crear_cuenta" class="block">Crear cuenta</a>

        </div>



    </form>

    

</div>

