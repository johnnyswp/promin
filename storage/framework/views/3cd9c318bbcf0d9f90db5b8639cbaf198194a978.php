<div class="col-md-3 left_col">

  <div class="left_col scroll-view">

    <div class="navbar nav_title" style="border: 0;">

      <a href="dashboard.php" class="site_title"><img src="<?php echo e(asset('asset_admin/images/proveedora-equipos-mineros-promin-logo.png')); ?>" alt=""> <span>Panel PROMIN</span></a>

    </div>



    <div class="clearfix"></div>



    <!-- Imagen Perfil -->

    <div class="profile clearfix">

      <div class="profile_pic">

        <img src="<?php if(file_exists(\Auth::user()->picture)): ?> <?php echo e(\Auth::user()->picture); ?> <?php else: ?> <?php echo e(url('/asset/images/img_perfil.png')); ?> <?php endif; ?>" alt="..." class="img-circle profile_img">

      </div>

      <div class="profile_info">

        <span>Bienvenido,</span>

        <h2><?php echo e(\Auth::user()->name); ?></h2>

      </div>

    </div>

    



    <br />



    <!-- Menu Principal -->

    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

      <div class="menu_section">

        

        <ul class="nav side-menu">

          <li><a href="pedidos.php"><i class="fa fa-list-alt"></i> Pedidos</a></li>

          <li><a href="<?php echo e(url('admin/banners')); ?>"><i class="fa fa-picture-o"></i> Banners</a></li>

          <li><a href="<?php echo e(url('admin/noticias')); ?>"><i class="fa fa-newspaper-o"></i> Noticias</a></li>

          <li><a><i class="fa fa-list-ul"></i> Catálogos <span class="fa fa-chevron-down"></span></a>

            <ul class="nav child_menu">

              <li><a href="<?php echo e(url('admin/linea-negocios')); ?>"><i class="fa fa-cube"></i> Línea de negocio</a></li>

              <li><a href="<?php echo e(url('admin/tipos-productos')); ?>"><i class="fa fa-cubes"></i> Tipo de producto</a></li>

              <li><a href="<?php echo e(url('admin/marcas')); ?>"><i class="fa fa-trademark"></i> Marcas</a></li>

              <li><a href="<?php echo e(url('admin/modelos')); ?>"><i class="fa fa-tag"></i> Modelos</a></li>

              <li><a href="<?php echo e(url('admin/accesos')); ?>"><i class="fa fa-key"></i> Accesos</a></li>

            </ul>

          </li>

          <li><a href="<?php echo e(url('admin/productos')); ?>"><i class="fa fa-cubes"></i> Productos</a></li>

          <li><a href="<?php echo e(url('admin/clientes')); ?>"><i class="fa fa-users"></i> Clientes</a></li>

          <li><a href="reportes.php"><i class="fa fa-file-text-o"></i> Reporte Ventas</a></li>
          <li><a href="<?php echo e(url('admin/reporte-wishlist')); ?>"><i class="fa fa-heart"></i> Reporte Wishlists</a></li>
          <li>

            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

              <i class="fa fa-power-off"></i> Cerrar sesión

            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">

              <?php echo e(csrf_field()); ?>


            </form>

          </li>

        </ul>

      </div>

    </div>

    



  </div>

</div>