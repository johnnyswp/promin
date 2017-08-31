<div class="header_info">

    <div class="row">

        <div class="col-md-12 text-center">

            <ul class="datos_contacto">

                <li>

                    <a href="/mi-cuenta">

                        <img src=" {{ Auth::user()->picture }}" class="avatar img-circle">&nbsp;

                        <span class="header-username">Hola,  {{ Auth::user()->name }}</span>

                    </a>

                </li>

                <li>

                    <a class="btn_login" href="{{route('logout')}}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                        <i class="fa fa-sign-out"></i>

                        <span class="hidden-xs hidden-sm">Cerrar Sesión</span>

                    </a>

                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">

                    {{ csrf_field() }}

                    </form>

                 </li>

                <li class="hidden-xs hidden-sm"><a href="https://www.facebook.com/prominmx/" target="_blank"><i class="fa fa-facebook"></i></a></li>

                <li class="hidden-xs hidden-sm"><a href="https://www.instagram.com/promin_mexico/" target="_blank"><i class="fa fa-instagram"></i></a></li>

                <li class="hidden-xs hidden-sm"><a href="https://www.youtube.com/channel/UCh-frRoUXQciPpdv2bJmZ_w/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>

                <li class="hidden-xs hidden-sm"><a href="https://www.linkedin.com/in/promin-m%C3%A9xico-96741213a/" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                <li class="hidden-xs hidden-sm"><a href="mailto:contacto@promin.mx" class="a-email"><i class="fa fa-envelope"></i> contacto@promin.mx</a></li>

                <li class="hidden-xs hidden-sm"><a href="tel:+52-55-2643-0892" class="tel_top"><i class="fa fa-phone"></i> 2643-0892</a></li>

                <li class="hidden-xs hidden-sm"><a href="tel:+52-55-7155-5874" class="tel_top"><i class="fa fa-phone"></i> 7155-5874</a></li>

                <li><div class="hcart">@include ('front.includes.carrito')</div></li> 

            </ul>

        </div>

    </div>

</div>

<div class="container borde_bottom hidden-xs hidden-sm">

    <div class="row">

        <div class="col-md-12 text-center">

             <a href="{{url('/')}}"><img src="/assets/images/proveedora-equipos-mineros-promin-logo.png" alt="Proveedora de Equipos Mineros"></a>

         </div>    

    </div>

</div>