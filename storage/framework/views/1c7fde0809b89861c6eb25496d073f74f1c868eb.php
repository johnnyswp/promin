<!-- jQuery -->

    <script src="<?php echo e(asset('asset_admin/vendors/jquery/dist/jquery.min.js')); ?>"></script>

    <!-- Bootstrap -->

    <script src="<?php echo e(asset('asset_admin/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    <!-- FastClick -->

    <script src="<?php echo e(asset('asset_admin/vendors/fastclick/lib/fastclick.js')); ?>"></script>

    <!-- NProgress -->

    <script src="<?php echo e(asset('asset_admin/vendors/nprogress/nprogress.js')); ?>"></script>    

    <!-- Chart.js -->

    <script src="<?php echo e(asset('asset_admin/vendors/Chart.js/dist/Chart.min.js')); ?>"></script>

    <!-- jQuery Sparklines -->

    <script src="<?php echo e(asset('asset_admin/vendors/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>

    <!-- easy-pie-chart -->

    <script src="<?php echo e(asset('asset_admin/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')); ?>"></script>

    <!-- bootstrap-progressbar -->

    <script src="<?php echo e(asset('asset_admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>

    <!-- jQuery-Tag-This-master -->

    <script src="<?php echo e(asset('/asset_admin/vendors/sliptree-bootstrap-tokenfield-9c06df4/dist/bootstrap-tokenfield.js')); ?>"></script>    

    <!-- custom -->

    <script src="<?php echo e(asset('/asset_admin/vendors/pnotify/pnotify.custom.min.js')); ?>"></script>    

        

    <!-- GALERÍA -->

    <script src="<?php echo e(asset('asset_admin/js/jquery.magnific-popup.js')); ?>"></script>



    <!-- DRAG & DROP -->

    <script src="<?php echo e(asset('asset_admin/js/dragdrop.js')); ?>"></script>



    <!-- Custom Theme Scripts -->

    <script src="<?php echo e(asset('asset_admin/build/js/custom.min.js')); ?>"></script>

    <script src="<?php echo e(asset('asset_admin/js/admin.js')); ?>"></script>



  

    <?php echo $__env->yieldContent('script'); ?>

<script type="text/javascript">
  var inputs = "input[maxlength], textarea[maxlength]";
    $(document).on('keyup', "[maxlength]", function (e) {
        var este = $(this),
            maxlength = este.attr('maxlength'),
            maxlengthint = parseInt(maxlength),
            textoActual = este.val(),
            currentCharacters = este.val().length;
            remainingCharacters = maxlengthint - currentCharacters,
            espan = este.prev('label').find('span');            
            // Detectamos si es IE9 y si hemos llegado al final, convertir el -1 en 0 - bug ie9 porq. no coge directamente el atributo 'maxlength' de HTML5
            if (document.addEventListener && !window.requestAnimationFrame) {
                if (remainingCharacters <= -1) {
                    remainingCharacters = 0;            
                }
            }
            espan.html(remainingCharacters);
            if (!!maxlength) {
                var texto = este.val(); 
                if (texto.length > maxlength) {
                    este.addClass("borderojo");
                    este.val(text.substring(0, maxlength));
                    e.preventDefault();
                }
                else if (texto.length < maxlength) {
                    este.removeClass('borderojo');
                }   
            }   
        });
</script>

    <!-- Galería -->

    <script>

      $('#gal16').magnificPopup({

          items: [

            {

              src: '<?php echo e(asset('asset_admin/images/img_producto_demo_1.jpg')); ?>'

            },

            {

              src: '<?php echo e(asset('asset_admin/images/img_producto_demo_2.jpg')); ?>',

            },

            {

              src: '<?php echo e(asset('asset_admin/images/img_producto_demo_3.jpg')); ?>',

            },

            {

              src: '<?php echo e(asset('asset_admin/images/img_producto_demo_4.jpg')); ?>',

            },

            {

              src: '<?php echo e(asset('asset_admin/images/img_producto_demo_5.jpg')); ?>',

            }      

          ],

          gallery: {

            enabled: true

          },

          type: 'image' 

      });

      <?php if(session('success')): ?>
        new PNotify({
            title: 'Notificación',
            text: '<?php echo e(session('success')); ?>',
            type: 'success',
            styling: 'brighttheme'
        });
        <?php echo e(session()->forget('success')); ?>

      <?php endif; ?>



    </script>



    