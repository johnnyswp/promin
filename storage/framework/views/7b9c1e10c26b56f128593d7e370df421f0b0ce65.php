   <div class="top_nav">

          <div class="nav_menu">

            <nav>

              <div class="nav toggle bars_top">

                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div>

              <ul class="nav navbar-nav navbar-right">

                <li class="">

                  <p><img src="<?php if(file_exists(\Auth::user()->picture)): ?> <?php echo e(\Auth::user()->picture); ?> <?php else: ?> <?php echo e(url('/asset/images/img_perfil.png')); ?> <?php endif; ?>" alt="" class="img-circle" width="35"> <?php echo e(\Auth::user()->name); ?></p>

                </li>

                <li>&nbsp;</li>

                <li>

                  <a href="productos-sin-stock.php" class="info-number bg_rojo">

                    <i class="fa fa-exclamation-triangle tipo_blanca"></i>

                    <span class="badge bg-white tipo_roja">6</span>

                  </a>

                </li> <!-- Cuando no haya registros, es necesario ocultar el <li> correspondiente a los productos sin stock -->

              </ul>

            </nav>

          </div>

        </div>