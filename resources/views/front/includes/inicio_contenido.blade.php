        <div class="container slider related text-center" style="margin-top: 45px;">
            <div class="row">
                <div class="page-header col-sm-8 col-sm-offset-2">
                    <h2>Productos Destacados</h2>
                </div>
            </div>
            <div class="row">
                <ul>
                @foreach($productos as $producto)
                    <li class="col-md-4">
                        <div class="cimg">
                           <a href="{{url('linea-negocio/'.str_slug($producto->linea()).'/'.str_slug($producto->serie).'-'.str_slug($producto->marca()).'-'.str_slug($producto->modelo()).'-'.$producto->id)}}" class="aimg" title="{{$producto->linea().' '.$producto->serie.' '.$producto->marca().' '.$producto->modelo()}}"><img src="{{$producto->image()}}" alt="$NombreProducto $Marca $Modelo" class="producto_destacado"></a>
                            <a href="pago-seguro.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Comprar</a>
                            <a href="#whish" class="btn btn2 whish " producto='{{$producto->id}}'><i class="fa fa-heart corazon"></i></a>
                        </div>
                        <h5>
                            <a href="producto.php" class="black" title="{{$producto->linea().' '.$producto->serie.' '.$producto->marca().' '.$producto->modelo()}}">{{$producto->nombre}}</a>
                            <small>{{$producto->modelo()}}</small>
                        </h5>
                        <div class="cost">$ {{number_format($producto->priceVenta, 2, '.', ',')}}</div>
                    </li>                    
                @endforeach
                </ul>
            </div>
            <div class="slidebar">
                <nav class="pagination"></nav>
            </div>
</div>
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>PROMIN Proveedora de Equipos Mineros ®</h1>
                </div>
                <div class="col-md-10 col-md-offset-1 text-center">
                    <p class="text-justify">PROMIN Proveedora de Equipos Mineros ® le da la más cordial bienvenida a esta nueva experiencia de compra, poniendo a su disposición nuestra gama de productos y servicios así como asesoría en maquinaria para <strong>Minería, Construcción y Agricultura.</strong></p>
                    <p class="text-justify">Estamos a sus órdenes.</p>
                </div>
            </div>
        </div>
        
        <div class="container-fluid bg_dgray">
            <div class="container">
                <div class="row" >
                    <div class="col-md-12 text-center">
                        <h3 class="tipo_blanca">Grandes razones para comprar o vender su equipo con Proveedora de Equipos Mineros ®.</h3>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-compra-equipo-minero-construccion-agricultura.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary2 tipo_14">COMPRA DE<br>MAQUINARIA USADA</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-venta-equipo-minero-construccion-agricultura.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary2 tipo_14">VENTA DE<br>MAQUINARIA USADA</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-ollas-sand-blast-df-cdmx.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">OLLAS SAND BLAST</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-venta-excavadoras-caterpillar.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary2 tipo_14">VENTA DE<br>EXCAVADORAS HIDRÁULICAS</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-vibrocompactadores-seminuevos-raygo.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary2 tipo_14">VENTA DE<br>VIBROCOMPACTADORES</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-helicopteros.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">RENTA HELICÓPTEROS</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-fletes.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">FLETES</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-mecanica-suelos-perforadoras-1.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">MECÁNICA DE SUELOS</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-promin-drill.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">PROMIN DRILL</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-compra-venta-reconstruccion-locomotoras-mineras-trolley-diesel-flameproof-clayton.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">LOCOMOTORAS</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-acero-barrenacion-df.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">ACERO DE BARRENACIÓN</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-bombas-concreto-kcp-cdmx-mexico-df.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">BOMBAS DE CONCRETO</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center margin_top">
                        <div class="cimg">
                            <a href="ollas-sand-blast-df.php" class="aimg">
                                <img src="{{url('assets/images/mosaico-brazo-telescopico-excavadoras-hidraulicas-cosben-mexico-cdmx-df.jpg')}}" alt="" class="img-responsive">
                            </a>
                            <a href="ollas-sand-blast-df.php" class="btn btn-primary tipo_14">BRAZOS TELESCÓPICOS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
