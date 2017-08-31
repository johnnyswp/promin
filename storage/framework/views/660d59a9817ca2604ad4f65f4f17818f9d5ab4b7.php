<?php $__env->startSection('title', $linea->nombre); ?>
<?php $__env->startSection('metadata'); ?>
<meta name="description" content="<?php echo e($linea->descripcion); ?>">
<meta name="keywords" content="<?php echo e($linea->keywork); ?>">
<meta name="author" content="promin.mx">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('front.includes.linea_negocio_top_banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
  <?php echo $__env->make('front.includes.linea_negocio_contenido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>