<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Email • Due In</title>
    <link rel="stylesheet" href="<?php echo e(URL::to('task/css/style.css')); ?>">
</head>

<body>
<a href="<?php echo e(URL::route('nav.landing')); ?>"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
<div class="container">
    <div class="view">
        <h3>Verify Email</h3>
        <h4>A verification link has been sent to <strong><?php echo e($user->email); ?></strong>.<br> Click this link to verify your email and complete your account setup.</h4>
        <p class="agreement">Not received the email? Click <a href="https://colorlib.com" target="_blank" title="Forgotten Password">here</a> to resend.</p>
    </div>
</div>
</body>
</html>