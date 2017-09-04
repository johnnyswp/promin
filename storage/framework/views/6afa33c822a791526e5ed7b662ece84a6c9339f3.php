<?php
$var = "&";
foreach(explode('&', $_SERVER['QUERY_STRING']) as $dato){
    if(strpos($dato, 'page')===false){
        if($dato!=""){
            $var = $var.'&'.$dato;
        }
    }
}

if($var=='&'){
    $var="";
}
?>
<?php if($paginator->hasPages()): ?>

    <ul class="pagination">

        

        <?php if($paginator->onFirstPage()): ?>

            <li class="disabled"><span><i class="fa fa-arrow-circle-left"></i></span></li>

        <?php else: ?>

            <li><a href="<?php echo e($paginator->previousPageUrl().$var); ?>" rel="prev"><i class="fa fa-arrow-circle-left"></i></a></li>

        <?php endif; ?>



        

        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            

            <?php if(is_string($element)): ?>

                <li class="disabled"><span><?php echo e($element); ?></span></li>

            <?php endif; ?>



            

            <?php if(is_array($element)): ?>

                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($page == $paginator->currentPage()): ?>

                        <li class="active"><span><?php echo e($page); ?></span></li>

                    <?php else: ?>

                        <li><a href="<?php echo e($url.$var); ?>"><?php echo e($page); ?></a></li>

                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        

        <?php if($paginator->hasMorePages()): ?>
            <li><a href="<?php echo e($paginator->nextPageUrl().$var); ?>" rel="next"><i class="fa fa-arrow-circle-right"></i></a></li>
        <?php else: ?>

            <li class="disabled"><span><i class="fa fa-arrow-circle-right"></i></span></li>

        <?php endif; ?>

    </ul>

<?php endif; ?>

