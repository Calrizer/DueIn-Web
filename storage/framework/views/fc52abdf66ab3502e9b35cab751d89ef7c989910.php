<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign In • Due In</title>
    <link rel="stylesheet" href="<?php echo e(URL::to('forms/css/style.css')); ?>">
</head>

<body>
<div class="menuwrapper">
    <div class="menubar">

    </div>
</div>
<div class="wrapper">
    <a href="#"><img class="back" src="<?php echo e(URL::to('forms/arrow.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
    <a href="<?php echo e(URL::route('nav.landing')); ?>"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
    <a class="activate"><img class="menu" src="<?php echo e(URL::to('forms/menu.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
</div>
<div class="container">
    <form id="contact" action="<?php echo e(route('user.signin')); ?>" method="post">
        <h3>Sign In</h3>
        <h4>Enter your email and password to sign in.</h4>
        <?php if(count($errors) > 0): ?>
            <?php foreach($errors->all() as $error): ?>
                <h4 class="error"><?php echo e($error); ?></h4>
            <?php endforeach; ?>
        <?php endif; ?>
        <p class="label">Email*</p>
        <fieldset>
            <input placeholder="Email..." type="email" tabindex="1" name="email" required autofocus>
        </fieldset>
        <p class="label">Password*</p>
        <fieldset>
            <input placeholder="Password..." type="password" tabindex="2" name="password" required>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Signing in">Sign In</button>
        </fieldset>
        <p class="agreement"><a href="https://colorlib.com" target="_blank" title="Forgotten Password">Forgotten your password?</a></p>
        <p class="agreement">New user? Click <a href="<?php echo e(URL::route('nav.signup')); ?>" title="Register">here</a> to create an account.</p>
        <?php echo e(csrf_field()); ?>

    </form>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo e(URL::to('scripts/showMenu.js')); ?>"></script>
</body>
</html>