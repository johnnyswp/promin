<!DOCTYPE html>

<html lang="es">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex">



    <title>@yield('title') | Proveedora de Equipos Mineros ® PROMIN ®</title>

  

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">



    <!-- FOOTER -->

    @include('admin.includes/area_css')
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

        @include('admin.includes/menu_nav')



        <!-- TOP NAV -->

        @include('admin.includes/area_top_nav')



        <!-- page content -->

        <div class="right_col" role="main">

          

          @yield('content')          

        

        </div>

        <!-- /page content -->



        <!-- FOOTER -->

        @include('admin.includes/area_footer')

     



        

      </div>

    </div>

    

    <!-- JS -->

    @include('admin.includes/area_js')



    <!-- Modal Venta -->

    @yield('js-script')

    

  </body>

</html>

