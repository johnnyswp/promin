<div id="carousel-example" class="carousel slide" data-ride="carousel">

  



  <div class="carousel-inner">


  <?php
    $banners = DB::table('banner')->orderBy('order','asc')->get();
    $a =0;
  ?>
     
    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($banner->tipo=='picture'): ?>
    <div class="item <?php echo e($a); ?> item_banner <?php if($a==0): ?> active <?php endif; ?>">

      <img src="<?php echo e($banner->picture); ?>"/>

      <div class="carousel-caption">

        <div class="full-width text-center">

            <div class="text-center mostar_txt bg_titulos">

                <h1><?php echo e($banner->title); ?></h1>

                <a href="<?php echo e($banner->link); ?>" class="btn_sabermas"><i class="fa fa-arrow-right"></i> Ver Catálogo</a>

            </div>

        </div>

      </div>

    </div>
    <?php else: ?>
    <div class="item <?php echo e($a); ?> item_banner <?php if($a==0): ?> active <?php endif; ?>">
      <div style="position:relative;height:0;padding-bottom:56.25%"><iframe src="<?php echo e($banner->picture); ?>" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>
      <div class="carousel-caption">
        <div class="full-width text-center">
            <div class="text-center mostar_txt bg_titulos">
                <h1><?php echo e($banner->title); ?></h1>
                <a href="<?php echo e($banner->link); ?>" class="btn_sabermas"><i class="fa fa-arrow-right"></i> Ver Catálogo</a>
            </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php $a=$a+1; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>



  <a class="left carousel-control" href="#carousel-example" data-slide="prev">

    <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-arrow-left"></i></span>

  </a>

  <a class="right carousel-control" href="#carousel-example" data-slide="next">

    <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-arrow-right"></i></span>

  </a>

</div>