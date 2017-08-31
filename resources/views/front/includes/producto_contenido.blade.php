
    <div class="content">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <div class="container breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{url('linea-negocio/'.str_slug($producto->linea().'-'.$producto->linea_negocio_id))}}">{{$producto->linea()}}</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        @if($producto->mx==0)
                        <li class="active">{{$producto->codigo}} {{$producto->tipo()}} {{$producto->marca()}} {{$producto->modelo()}}</li>
                        @else
                        <li class="active">{{$producto->nombre}}</li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>

        <div class="container product no_pad_top">

            <!-- Galleria -->
            <div class="col-sm-6 product-gallery magnific-wrap">
                <div class="img-medium text-center">
                    <!--<div class="sticker sticker-sale">sale</div>-->
                    <!-- Preview Slider -->
                    <div class="medium-slider">
                        @foreach($producto->images() as $img)
                            @if($img->video==1)
                                @if($producto->link_video!="")
                                <a id="vid1"><div style="position:relative;height:0;padding-bottom:56.25%; border: 1px solid white;"><iframe src="{{$producto->link_video}}" width="640" height="360" frameborder="0" allowfullscreen style="position:absolute;width:100%;height:100%;left:0;"></iframe></div></a>
                                @endif
                            @else
                             <a href="{{$img->picture}}" title="{{$producto->serie}} {{$producto->modelo()}}" class="magnific"><img src="{{$img->picture}}" alt="{{$producto->serie}} {{$producto->modelo()}}"></a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Thumbs Slider -->
                <div class="thumbs-wrap">
                    <a href="" class="th-prev th-arrow pull-left">
                        <i class="custom-icon custom-icon-arrow-prev"></i>
                    </a>
                    <a href="" class="th-next th-arrow pull-right">
                        <i class="custom-icon custom-icon-arrow-next"></i>
                    </a>
                    <div class="thwrap">
                        <div class="thumbs-slider">
                            <?php $x=0; ?>
                            @foreach($producto->images() as $img)
                                @if($img->video==1)
                                    @if($producto->link_video!="")
                                    <a href="#vid1"><img src="{{url('asset/images/promin_play.jpg')}}" alt="" class="miniaturas"></a>
                                    @endif
                                @else
                                 <a href="{{$img->picture}}" data-bigimg="{{$img->picture}}"><img src="{{$img->picture}}" alt="" class="miniaturas"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 text-center compartir">
                        <strong>Compartir:</strong>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//dev.promin.mx{{$_SERVER['REQUEST_URI']}}" target="_black">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x face"></i>
                              <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <a href="https://twitter.com/home?status=http%3A//dev.promin.mx{{$_SERVER['REQUEST_URI']}}" target="_black">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x twitt"></i>
                              <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </div>
                </div>

            </div>
            
            <!-- Descripción Producto -->
            <div class="col-sm-6">
                <div class="row">
                        <h1>{{$producto->nombre}}</h1>
                    <div class="cost">
                        <span class="new">$ {{number_format($producto->priceVenta, 2, '.', ',')}}</span>
                    </div>

                    <div class="wishlist">
                        <a href="" style="cursor: pointer;" class="corazon whish" producto='{{$producto->id}}'><i class="fa fa-heart corazon"></i> Agregar a Wishlist</a>
                    </div>
                </div>
                
                <div class="row">
                    <p>{{$producto->descripcion}}</p>
                </div>
                <div class="row product-count">
                    <div class="counting inline-block">
                        <a href="" class="a-less disabled">-</a>
                        <input type="text" value="1">
                        <a href="" class="a-more">+</a>
                    </div>
                    <div class="inline-block"><a class="btn btn_checkout add-cart" id="{{$producto->id}}" href="#"><i class="fa fa-check"></i> Comprar</a></div>
                    @if($producto->linkMercadoLibre!="" or $producto->LinkMachineryTrader!="")
                    <h4 class="tit_ml_mt">También lo puedes comprar en:</h4>
                    @endif
                    @if($producto->linkMercadoLibre!="")
                    <div class="inline-block"><a href="{{$producto->linkMercadoLibre}}" target="_blank" class="btn_ml"><img src="{{url('asset/images/btn-mercado-libre.png')}}" alt="{{$producto->serie}} {{$producto->modelo()}} en MercadoLibre"></a></div>
                    @endif
                    @if($producto->LinkMachineryTrader!="")
                    <div class="inline-block"><a href="{{$producto->LinkMachineryTrader}}" target="_blank" class="btn_ml"><img src="{{url('asset/images/btn-machinery-trader.png')}}" alt="{{$producto->serie}} {{$producto->modelo()}} en Machinery Trader"></a></div>
                    @endif
                    
                    
                </div>
            </div>
        </div>
        <!-- /.container -->
        
        <div class="container slider related text-center" id="slider-0">
                        <div class="row">
                <div class="page-header col-sm-8 col-sm-offset-2">
                    <h2>Productos Relacionados</h2>
                </div>
            </div>
            <div class="row text-center">
            
                <div class="col-md-3 col-sm-6 citem">
                    <div class="cimg">
                        <a href="producto.php" class="aimg" title="$NombreProducto $Modelo $Marca"><img src="/assets/images/img_producto_demo_4.jpg" alt="$NombreProducto $Marca $Modelo"></a>
                        <a href="" class="btn btn-primary add-cart"><i class="fa fa-shopping-cart"></i> Agregar</a>
                        <a href="" class="btn btn2"><i class="fa fa-heart corazon"></i></a>
                    </div>
                    <h5>
                        <a href="producto.php" class="black" title="$NombreProducto $Modelo $Marca">Bomba de Concreto</a>
                        <small>KCP37ZX5170</small>
                    </h5>
                    <div class="cost">$ 2,000.00</div>
                </div>
                
            </div>
        </div>

        <!-- TABS -->
        <div class="tabs no_margin_bot">
            <ul class="container nav nav-tabs text-center">
                
                <li class="active"><a href="#description" data-toggle="tab"><span><i class="fa fa-list-alt"></i> Ficha Técnica</span></a></li>
                <li><a href="#reviews" data-toggle="tab"><span><i class="fa fa-comments"></i> Comentarios</span></a></li>
            </ul>
            <div class="bg_amarillo">
                <div class="container tab-content">
                    <div class="tab-pane fade in active" id="description">
                        <div class="row">
                            <div class="col-sm-4">
                                <h2>{{$producto->nombre}}</h2>
                                <a href="{{url('linea-negocio/'.str_slug($producto->linea()).'-'.$producto->linea_negocio_id)}}" class="btn_ver_catalogo"><i class="fa fa-search"></i> Ver Catálogo {{$producto->linea()}}</a><!-- aquí va la línea de negocio, en este ejemplo es KCP-->
                                <br><br>
                            </div>
                            <div class="col-sm-8">
                                <div class="tab-responsive">
                                    <table class="table table-bordered table-condensed">
                                        <tbody>
                                        @if($producto->mx==1)
                                            <tr>
                                                <td class="bg_blanco">SKU</td>
                                                <td class="bg_blanco">MX-{{$producto->id}}-{{$producto->tipo()}}- {{$producto->serie}} </td>
                                            </tr>
                                        @endif
                                            <tr>
                                                <td class="bg_blanco">Marca</td>
                                                <td class="bg_blanco">{{$producto->marca()}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bg_blanco">Modelo</td>
                                                <td class="bg_blanco">{{$producto->modelo()}}</td>
                                            </tr>
                                            <tr>
                                                <td class="bg_blanco">Serie</td>
                                                <td class="bg_blanco">{{$producto->serie}}</td>
                                            </tr>
                                            @if($producto->mx==0)
                                            <tr>
                                                <td class="bg_blanco">Código</td>
                                                <td class="bg_blanco">{{$producto->serie}}</td>
                                            </tr>
                                            @endif
                                            @if($producto->horometro!="")
                                            <tr>
                                                <td class="bg_blanco">Horómetro</td>
                                                <td class="bg_blanco">{{$producto->horometro}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                @if($producto->mx==0 and $producto->ficha!="")
                                <a href="{{$producto->ficha}}" target="_blank" class="btn_ver_ficha inline-block"><i class="fa fa-search"></i> Ver ficha técnica</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 bg_blanco2">
                                <div class="fb-comments" data-href="{{url($_SERVER['REQUEST_URI'])}}" data-numposts="3" data-width="700" data-mobile="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id='mySmallModalLabel' class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="padding: 40px; ">
              Agregado Correctamente
            </div>
          </div>
        </div>
@section('js-script')
        <script type="text/javascript">
        
        </script>
@endsection