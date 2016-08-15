<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task • Due In</title>
    <link rel="stylesheet" href="<?php echo e(URL::to('task/css/style.css')); ?>">
</head>

<body>
<a href="<?php echo e(URL::route('nav.landing')); ?>"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
<div class="container">
    <div class="view">
        <h3>Task Name</h3>
        <h4>Enter the six digit code sent to verify your email.</h4>
        <h4>Due In: </h4>
        <h5>Created By: </h5>
        <div class="img-container">
            <img class="code" src="<?php echo e(URL::to('images/1ZV5C0.png')); ?>" width="170px" height="170px"/>
        </div>
        <p class="TaskID">1ZV5C0 <img src="<?php echo e(URL::to('task/icon.png')); ?>" width="18px" height="18px"></p>
    </div>
</div>
</body>
</html>