<div class="block-popup popup plogin skin-yellow" id="crear_cuenta">
    <a href="" class="pclose small"><i class="custom-icon custom-icon-close-s"></i></a>
       <h3 class="text-center">Crea tu cuenta</h3>
       <div id="form-errors"></div>
    <form action="#" class="loginform">
        <div class="formwrap">
            <div class="form-group">
                <input id="names" name="names" type="text" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input id="email_register" type="text" class="form-control" placeholder="email@example.com">
            </div>
            <div class="form-group has-feedback">
                <input id="pass" type="password" class="form-control login-password" placeholder="Contraseña" id="login-password">
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input id="aviso" type="checkbox" value="1">
                Acepto el <a href="/aviso-privacidad">Aviso de Privacidad</a> y los <a href="/terminos-condiciones-uso">Términos y Condiciones de Uso</a>
            </label>
        </div>
        <div class="form-group text-center">
            <button id="sendFormCreate"   class="btn btn-default block"><i class="fa fa-check"></i> Aceptar</button> <!-- validar que la casilla de acepto aviso de privacidad y terminos y condiciones de uso este palomeado -->
        </div>
        <div class="row">
            <hr>
            <h4 class="text-center">También la puedes crear desde</h4>
             <div class="col-md-6">
            <a  href="{{ url('/social/redirect/facebook') }}" class="btn btn-default btn-sm btn_login_f"><i class="fa fa-facebook"></i> Facebook</a ></div>
            <div class="col-md-6"><a  href="{{ url('/social/redirect/twitter') }}" class="btn btn-default btn-sm btn_login_t"><i class="fa fa-twitter"></i> Twitter</a></div>
            <div class="col-md-12"><br></div>
        </div>
        
        
    </form>
    
</div>

