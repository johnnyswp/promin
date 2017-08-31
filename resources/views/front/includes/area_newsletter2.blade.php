<div class="bg_newsletter" style="padding: 45px 0;">
    <div class="row text-center">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="tipo_blanca">Newsletter</h2>
            <p class="tipo_blanca">Recibe las mejores promociones de maquinaria.</p>
        </div>
    </div>
    <form name='formNewsletter' >
        <div class="row">
            <div class="col-md-6 col-md-offset-3" id="form-errors_s">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-2">
                  <div class="form-group">
                    <input required type="text" class="form-control" id="name_s" placeholder="Nombre">
                  </div>
            </div>
    
            <div class="col-md-2 ">
                  <div class="form-group">
                    <input required type="email" class="form-control" id="email_s" placeholder="Email">
                  </div>
            </div>
            

            <div class="col-md-2" style="margin-bottom: 10px;">
                <select class="form-control" placeholder="Servicios" id="servicio_s" style="padding: 35px 15px;">
                <?php foreach (\App\Models\Admin\LineaNegocio::all() as $linea ) {?>
                    @if($linea->id==1)
                    @else
                    <option value="{{$linea->id}}">{{$linea->nombre}}</option>
                    @endif
                <?php }?>                    
                </select>
            </div>
    
            <div class="col-md-2 skin-yellow">
                <button type="button" class="btn btn-default" id="suscribirme"><i class="fa fa-check"></i> Suscribirme</button>
                <br>
                <div class="checkbox">
                  <label><input type="checkbox" checked="" id="aviso_s"> <span class="tipo_chk_aviso">Acepto Aviso de Privacidad<span></label>
                </div>
            </div>
        </div>
    </form>
</div>