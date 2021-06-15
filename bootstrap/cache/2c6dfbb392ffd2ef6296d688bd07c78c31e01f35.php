<?php $__env->startSection('title', 'Dashboard'); ?>


<?php $__env->startSection('content'); ?>

<div class="container-fluid">
   <?php echo e($admin); ?>

 <!-- container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>