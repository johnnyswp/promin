<header class="header">



        <div class="hbottom right-pos">

            <div class="container borde_bottom">

                

                <!-- LOGO -->

                <div class="col-sm-2 visible-sm visible-xs text-center">

                    <a href="/"><img src="images/proveedora-equipos-mineros-promin-logo70.png" alt="Proveedora de Equipos Mineros"></a>

                </div>



                <!-- BUSCADOR -->

                <div class="col-md-4 col-sm-2 iconmenu pull-right">

                    <div class="pull-right search_container">

                        <a href="" class="a-search"><i class="custom-icon custom-icon-ico-search"></i></a>

                    </div>

                    

                </div>



              

                <!-- MENU PRINCIPAL -->

                <div class="col-md-8 col-sm-2 mainmenu">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <div class="collapse navbar-collapse" id="navbar-collapse">

                        <nav>

                            <ul class="nav navbar-nav">
                                <li <?php echo e((Request::is('/') ? 'class=active' : '')); ?> > <a href="/">Inicio</a> </li>

                                <li <?php echo e((Request::is('nosotros') ? 'class=active' : '')); ?>> <a href="/nosotros">Nosotros</a> </li>

                                <li class="dropdown">
                                    <a data-toggle="dropdown"  class="dropdown-toggle" href="#">Catálogo</a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                        
                                        $lineas = \DB::table('productos')->join('linea_negocios', 'linea_negocios.id', '=', 'productos.linea_negocio_id')
                                        ->select('linea_negocios.id as id', 'linea_negocios.nombre as nombre')
                                        ->groupBy('linea_negocios.nombre')
                                        ->get(); 
                                        ?>
                                        <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(url('linea-negocio/'.str_slug($linea->nombre).'-'.$linea->id)); ?>"><?php echo e($linea->nombre); ?></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>

                                </li>
                                <li <?php echo e((Request::is('noticias') ? 'class=active' : '')); ?>>
                                    <a href="/noticias">Noticias</a>
                                </li>
                                <li <?php echo e((Request::is('contacto') ? 'class=active' : '')); ?>>
                                    <a href="/contacto">Contacto</a>
                                </li>

                            </ul>

                        </nav>

                    </div>

                </div>



            </div>





            <div class="search">

                <div class="container">

                    <form action="/">

                        <div class="col-sm-6 col-sm-offset-3 col-xs-10">

                            <input type="text" autofocus placeholder="Buscar...">

                        </div>

                        <div class="col-md-1 col-xs-2">

                            <a href="" class="sclose"><i class="custom-icon custom-icon-lightclose"></i></a>

                        </div>

                    </form>

                </div>

            </div>



        </div>

    </header>