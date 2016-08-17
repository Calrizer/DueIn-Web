<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e($task->title); ?> • Due In</title>
    <link rel="stylesheet" href="<?php echo e(URL::to('task/css/style.css')); ?>">
</head>

<body>
<div class="wrapper">
    <a href="#"><img class="back" src="<?php echo e(URL::to('forms/arrow.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
    <a href="<?php echo e(URL::route('nav.landing')); ?>"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
    <a><img class="profile" src="<?php echo e(URL::to('forms/menu.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
</div>
<div class="container">
    <div class="view">
        <h3><?php echo e($task->title); ?></h3>
        <h4><?php echo e($task->description); ?></h4>
        <h4>Due In: <?php echo e($task->due); ?></h4>
        <h5>Created By: <?php echo e('@'.$task->owner); ?></h5>
        <h5>Task Set: <?php echo e($task->set); ?></h5>
        <div class="img-container">
            <?php
                include(public_path().'/scripts/qr/qrlib.php');

                $directory = public_path().'/images/codes/';

                $contents = 'http://localhost:8000/task/'.$task->TaskID;

                $name = $task->TaskID.'.png';

                $path = $directory.$name;

                if (!file_exists($path)) {
                    QRcode::png($contents, $path);
                }
            ?>
            <img class="code" src="<?php echo e(URL::to('images/codes/'.$task->TaskID.'.png')); ?>" width="170px" height="170px"/>
        </div>
        <p class="TaskID"><?php echo e($task->TaskID); ?> <img src="<?php echo e(URL::to('task/icon.png')); ?>" width="18px" height="18px"></p>
        <form action="<?php echo e(route('task.add', $task->TaskID)); ?>" method="post">
        <?php if(Auth::check()): ?>
            <?php if($task->owner === Auth::user()->username): ?>
                <button name="admin" type="submit" id="contact-submit" data-submit="...Deleting Task">Delete Task</button> <button name="admin" type="submit" id="contact-submit" data-submit="...Deleting Task">Edit Task</button>
            <?php else: ?>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Adding Task">Add To My Tasks</button>
            <?php endif; ?>
        <?php else: ?>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sign In">Sign In To Add This Task</button>
        <?php endif; ?>
            <?php echo e(csrf_field()); ?>

        </form>
    </div>
</div>
<div class="ad-container">
    <div class="ad">
        <img style="-webkit-user-select:none; display:block; " src="https://storage.googleapis.com/support-kms-prod/SNP_BBFA15D142E88EAB62B5C247174644F87043_2922338_en_v2">
    </div>
</div>
</body>
</html>