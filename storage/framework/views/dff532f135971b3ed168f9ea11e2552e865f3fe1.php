<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Email • Due In</title>
    <link rel="stylesheet" href="<?php echo e(URL::to('forms/css/style.css')); ?>">
</head>

<body>
<a href="<?php echo e(URL::route('nav.landing')); ?>"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
<div class="container">
        <h3>Verify Your Account</h3>
        <h4>Hi <?php echo e($user->name); ?>,<br/>This email address has been used to create an account with Due In.</h4>
        <h4>Please click this link: <a href="http://localhost/verify/<?php echo e($user->verify); ?>" target="_blank" title="Verify Account">http://localhost/verify/<?php echo e($user->verify); ?></a> to verify your account.</h4>
</div>
</body>
</html>