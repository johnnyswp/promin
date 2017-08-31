<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Promo Cereales Golden Foods </title>
     
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:site_name" content="">
    <meta property="og:image:type" content="image/png">
    <link rel="stylesheet" href="{{ asset('assets_pro/css/style.css') }}">
    <link rel="icon" type="image/png" href="/assets_pro/img/favicon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets_pro/css/animate.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
    {!! HTML::style('/assets/css/validetta.min.css') !!}
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if IE]>
      <link rel="stylesheet" href="{{ asset('assets_pro/css/ie.css') }}">      
    <![endif]-->
 
    @yield('head')
     <style type="text/css" media="screen">
      @-moz-document url-prefix() {
        h1 {
          color: red;
        }
      }
     .al{
            background: transparent !important;
    padding: 13px 39px !important;
    margin: 10px 0;
     }
     #dropdownMenu{}
     #dropdownMenu a{
        padding: 3px 10px!important;        
     }
     #dropdownMenu1{
        color: blue;
        margin: 23px 0 0;
     }
    #dropdownMenu1:hover{
        background-color: #d4d4d4 !important;
    }
    .titlepro{
        position: relative;
        top: -29px;
        font-size: 22px;
        margin-bottom: 0;
    }
    .leyend{
        font-size: 10px;
    }
    .ff{
          font-family: arial, Helvetica Neue !important;
    }
 </style>
</head>

<body>

<!--Navigation-->

@include('partials.above-navbar-alert')
 

<!-- Header -->
<div class="header navbar-fixed-top"  style="background-image:url({{ asset('assets_pro/img/menubk.jpg')}});">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header"  style="width: 160px">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="/"><img src="{{ asset('assets_pro/img/logo.png')}}" alt=""/></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            
            <li class="{{ Request::segment(1) == '' ? 'activemenu' : null }}"><a class="con-menu con-menu-1" href="/">INICIO</a></li>
            <li class="{{ Request::segment(1) == 'allpro' ? 'activemenu' : null }}"><a class="con-menu con-menu-6" href="/allpro">PRODUCTOS PARTICIPANTES</a></li>
            <li class="{{ Request::segment(1) == 'mecanica' ? 'activemenu' : null }}"><a class="con-menu con-menu-3" href="/mecanica">MECÁNICA</a></li>
            <li class="{{ Request::segment(1) == 'premios' ? 'activemenu' : null }}"><a class="con-menu con-menu-4" href="/premios">PREMIOS</a></li>            
            @if(!Auth::check())
            <li class="{{ Request::segment(1) == 'register' ? 'activemenu' : null }}"><a class="con-menu con-menu-5" href="/register">REGISTRO</a></li>
            <li class="{{ Request::segment(1) == 'login' ? 'activemenu' : null }}"><a class="con-menu con-menu-2" href="/login">ACCESO</a></li>
            @else
            <li><div class="dropdown" id="dropdownMenu" >
              <a class="btn btn-default dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <img src="{{ Auth::user()->picture }}" style="width: 20px" /> {{ Auth::user()->first_name }}
               
                <span class="caret"></span>
              </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                   <!----><li >
                        <a href="#" data-toggle="modal" data-target="#myModalPerfil">Mi Perfil</a>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal"> 
                            Mis SQDOS 
                            @if(Auth::user()->mispuntos() =="")
                                <span id="misP" puntos="0" class="badge">(0)</span>
                            @else
                                <span id="misP" puntos="{{Auth::user()->mispuntos()}}" class="badge">{{Auth::user()->mispuntos()}}</span>
                            @endif </a> </li>
                    <li role="separator" class="divider"></li>
                    <li >
                        <a class="nav-link" href="{{url('user/resgistrar-puntos')}}">Registrar SQDOS</a>
                    </li>
                      <li >
                        <a class="nav-link" href="{{url('user/participar')}}">Participar</a>
                    </li>  
                    <li role="separator" class="divider"></li>

                    <li><a href="/logout">Cerrar Sesion </a></li>
                  </ul>
                </div></li> 
            @endif
          </ul>
          
        </div>
      </div>
    </nav>
</div> 
  @if(Auth::check())
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">HISTORIAL DE SQDOS</h4>
      </div>
      <div class="modal-body">
        <table class="table table-condensed">   
        <thead> 
            <tr> 
                <th>CANTIDAD</th> 
                <th>SQDOS</th> 
                <th>TODAL DE SQDOS </th> 
            </tr> 
            </thead>  
            <tbody>
             <?php   $t =0; $t2 =0;  ?>
            @foreach(App\Models\Front\User::resumen(Auth::user()->id) as $v)
            <?php $v = (object) $v;    ?>
                <tr>
                    <td class="" style=" font-size:26px;   vertical-align: middle;">{{$v->item}}</td>
                    <td class=""><img width="50" src="{{$v->img}}" alt=""> </td>
                    <td class="" style="  font-size:26px;    vertical-align: middle;">{{$v->total}}</td>
                </tr>
                <?php 
                    $t = $t+$v->item;
                    $t2 = $t2+$v->total;
                ?>
            @endforeach
            </tbody>   
            <tfoot style="    border-top: 1px solid #e5e5e5;">
             <tr>
                    <td  class="text red" style=" font-size:26px;     vertical-align: middle;padding: 0 !important;margin: 0;">{{$t}}</td>
                    <td  class="text red" style="    vertical-align: middle;padding: 0 !important;margin: 0;"> </td>
                    <td class="text blue" style=" font-size:26px;     vertical-align: middle;padding: 0 !important;margin: 0;">{{$t2}}</td>
                </tr>
                <tr style="border-top: 1px solid white; ">
                    <td colspan="3" class="text red" style="font-size: 16px;padding: 0 !important;margin: 0;">SQDOS Utilizados {{App\Models\Front\User::misPuntosOfertados()}} </td>
                </tr>
                 <tr>
                    <td colspan="3" class="text red" style="margin: 0;padding: 0;color: white;font-size: 12px;text-align: center;text-transform: uppercase;width: 251px;margin-left: 31px;">SQDOS para canjear  {{Auth::user()->mispuntos()}}  </td>
                </tr>

            </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Perfil -->
<div class="modal fade" id="myModalPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" style="opacity: 1; color: white; " class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mi Perfil</h4>
      </div>
      <div class="modal-body">
        <h4 class="name">Nombre: <span>{{Auth::user()->first_name ." ". Auth::user()->last_name}}</span></h4>
        <h4 class="email">Email: <span>{{Auth::user()->email}}</span></h4>
        <h4 class="fecha">Registro: <span>{{Auth::user()->created_at}}</span></h4>
        <img src="{{ Auth::user()->picture }}" class="perfil-img img-circle">
        <div class="box_table">
            <div class="col-md-12">
                <p class="text_white">Resumen de SQDOS</p>
            </div>
            <div class="col-md-12">
                @foreach(App\Models\Front\User::resumen(Auth::user()->id) as $fa)
                    <?php $fa = (object) $fa;    ?>  
                    <div class="col-md-2"> <img width="50" src="{{$fa->img}}" alt=""> </div>
                @endforeach                
            </div>
            <div class="col-md-12">
                @foreach(App\Models\Front\User::resumen(Auth::user()->id) as $fa)
                    <?php $fa = (object) $fa;    ?>                  
                    <div class="col-md-2">
                        <span>{{$fa->item}}</span>
                    </div> 
                @endforeach  
                               
            </div>
        </div>
         <div class="box_table2">
          <div class="col-md-12">
                <p class="text_white">Productos por los que participo</p>
            </div>
            <div class="col-md-12">
                @foreach(App\Models\Front\User::misArticulosPerfil() as $fa)               
                    <?php 
                        $fa = (object) $fa;    
                        $art = App\Models\Article::find($fa->articulo_id);
                    ?>  
                    <div class="col-md-2 img_box" style="background-image: url({{$art->image}});"> 
                        <span style="margin: 0 0 0 6px!important; font-size: 9px;">{{$fa->count}}</span>
                    </div>
                @endforeach                
            </div>            
        </div>
        <div class="box_table2" style="margin-top: 15px; margin-left: 32px;">
            <div class="col-md-12">
                <p class="text_white" style="margin: 0; padding: 0; color: white; font-size: 12px; text-align: center; text-transform: uppercase; width: 240px; margin-left: 39px;">SQDOS para canjear  {{Auth::user()->mispuntos()}}
                </p> 
            </div>
    </div>
      </div>
    </div>
  </div>
</div>


 @endif
<!--/Navigation-->
@yield('content')
<style>
  #term{
    width: 100%;
    display: block;
    height: 100%;
  }
</style>
<!-- Modal terminos -->
<div class="modal fade" id="myModalTerminos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="    z-index: 9999;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="    overflow-y: hidden;">
      <div class="modal-header">
        <button type="button" style="opacity: 1; color: white; " class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terminos y Condiciones</h4>
      </div>
      <div class="modal-body" style="height: 100%;">
        <iframe id="term" src="/term.html" frameborder="0"></iframe>
    </div> 
    </div>
  </div>
</div>

<!-- Modal Aviso Legal -->
<div class="modal fade" id="myModalAvisoLegal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  style="    z-index: 9999;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" style="opacity: 1; color: white; " class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Aviso de Privacidad</h4>
      </div>
      <div class="modal-body">
       @include('includes.aviso')
         
    </div> 
    </div>
  </div>
</div>
<div class="col-md-12 footer con-footer">
  <p id="con-terminos" class="ff"><a data-toggle="modal" data-target="#myModalTerminos" >Terminos y Condiciones </a></p><p> | </p> <p class="ff" id="con-aviso"><a data-toggle="modal" data-target="#myModalAvisoLegal" >Aviso de Privacidad</a> </p>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>
jQuery(document).ready(function(){
    jQuery(".marvel-logo").css("position","fixed");
    jQuery(".marvel-logo").css("left","13%");
    jQuery(".marvel-logo").css("bottom","0%");
});
</script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
{!! HTML::script('/assets/plugins/validetta.min.js') !!}
@yield('footer')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCQ4twFS87Ji-69gchik7Vak4lEsxOCA6M"></script>


</body>
</html>
