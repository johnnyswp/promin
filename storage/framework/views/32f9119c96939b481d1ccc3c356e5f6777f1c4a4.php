<?php if($producto->mx==1): ?>
<?php $__env->startSection('title', 'MX '.$producto->id.' '.$producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->linea()); ?>
<?php else: ?>
<?php $__env->startSection('title', $producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->codigo.' '.$producto->linea()); ?>
<?php endif; ?>
<?php $__env->startSection('metadata'); ?>
<meta name="description"          content="<?php echo e($producto->descripcion); ?>">
<meta name="keywords"             content="<?php echo e($producto->keywork); ?>">
<meta name="author"               content="promin.mx">
<!-- Twitter Card data -->
<meta name="twitter:card" value="summary">
<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<?php if($producto->mx==1): ?>
<meta property="twitter:title"         content="<?php echo e('MX '.$producto->id.' '.$producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->linea()); ?>" />
<?php else: ?>
<meta property="twitter:title"         content="<?php echo e($producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->codigo.' '.$producto->linea()); ?>" />
<?php endif; ?>
<meta name="twitter:description" content="<?php echo e($producto->descripcion); ?>">

<!-- Twitter summary card with large image. Al menos estas medidas 280x150px -->
<meta name="twitter:image:src" content="<?php echo e($producto->image()); ?>">


<meta property="og:url"           content="<?php echo e(url($_SERVER['REQUEST_URI'])); ?>" />
<meta property="og:type"          content="website" />
<?php if($producto->mx==1): ?>
<meta property="og:title"         content="<?php echo e('MX '.$producto->id.' '.$producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->linea()); ?>" />
<?php else: ?>
<meta property="og:title"         content="<?php echo e($producto->tipo().' '.$producto->marca().' '.$producto->modelo().' '.$producto->codigo.' '.$producto->linea()); ?>" />
<?php endif; ?>
<meta property="og:description"   content="<?php echo e($producto->descripcion); ?>" />
<meta property="og:image"         content="<?php echo e($producto->image()); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('front.includes.producto_top_banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
  <?php echo $__env->make('front.includes.producto_contenido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>