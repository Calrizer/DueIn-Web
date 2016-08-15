<?php $__env->startSection('title'); ?>
    <?php echo e($task->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <h1><?php echo e($task->title); ?></h1>
    <h2><?php echo e($task->description); ?></h2>
    <h2><?php echo e($task->TaskID); ?></h2>

    <?php

        include(public_path().'/scripts/qr/qrlib.php');

        $tempDir = public_path().'/images/';

        $codeContents = 'http://localhost:8000/task/'.$task->TaskID;

        $fileName = $task->TaskID.'.png';

        $pngAbsoluteFilePath = $tempDir.$fileName;
        $urlRelativeFilePath = public_path().'/images/'.$fileName;

        // generating
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::png($codeContents, $pngAbsoluteFilePath);
        }
    ?>

    <img src="<?php echo e(URL::to('images/'.$task->TaskID.'.png')); ?>" width="125px" height="125px"/>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>