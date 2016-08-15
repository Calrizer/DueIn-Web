<?php $__env->startSection('title'); ?>
    Due In • Task Not Found!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h2>The task <?php echo e($id); ?> was not found!</h2>
    <h2>Please check if you have mis-spelt the ID.</h2>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>