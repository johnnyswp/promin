<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    @yield('metadata')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <title>@yield('title') - PROMIN - Mexico / USA</title>

    <link rel="shortcut icon" href="{{url('favicon.ico')}}">    

    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{url('assets/css/style.min.css')}}" rel="stylesheet">

    <link href="{{url('assets/css/stilos.css')}}" rel="stylesheet">

    @yield('style')

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>



    



<!-- Preloader -->

@include('front.includes.area_preloader')





<!-- Chat -->

@include('front.includes.area_chat')



<!-- Top Datos -->

@if(Auth::guest())

    @include('front.includes.area_top_dato')

@else

    @include("front.includes.area_top_datos_login")

@endif

<!-- WRAPPER -->

<div class="wrapper">

    

    <!-- MENU -->

    @include('front.includes.inicio_menu')



    @if($carousel)

    <!-- CARRUSEL -->

    @include('front.includes.inicio_carrusel')

    @endif

    

    <!-- CONTENT -->

    <div class="content">

        

        <!-- CONTENIDO -->

        @yield('content')



        <!-- NEWSLETTER -->

        @include('front.includes.area_newsletter2')

        

    </div>

    <!-- /.content -->



</div>

<!-- /.wrapper -->







<!-- FOOTER -->

@include('front.includes.area_footer')



<!-- LOGIN -->

@include('front.includes.area_login')



<!-- Crear Cuenta -->

@include('front.includes.area_crear_cuenta')



<!-- ScrollTop Button -->

@include('front.includes.area_boton_scroll')







<script src="{{url('assets/js/jquery-2.1.1.min.js')}}"></script>

<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

<script src="{{url('assets/js/jquery.plugins.min.js')}}"></script>

<script src="{{url('assets/js/custom.min.js')}}"></script>

<script src="{{url('assets/js/promin.js')}}"></script>

<script src="{{url('assets/js/promin-cart.js')}}"></script>


 @yield('js-script')

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
        @if (session('urls'))
            console.log('entro session');
             $.ajax({

                method: "GET",

                type:'json',

                url: "/whishlist/"+{{session('urls')}},            

                success: function(data) {

                    console.log("success.wishlist");

                    if(data.success){                        
                        jQuery(this).addClass('disabled'); 

                        promin.m('success','Producto agregado a su wishlist');

                        setTimeout(function() {
                             window.location.href = "{{session('wish')}}";
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
        @endif
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