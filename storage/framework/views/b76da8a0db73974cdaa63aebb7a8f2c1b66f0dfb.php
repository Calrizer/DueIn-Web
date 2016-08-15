<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Email • Due In</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="<?php echo e(URL::to('forms/css/style.css')); ?>">
</head>

<body>
<a href="<?php echo e(URL::route('nav.landing')); ?>"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
<div class="container">
    <form id="contact" action="<?php echo e(route('user.signup')); ?>" method="post">
        <h3>Verify Email</h3>
        <h4>Enter the six digit code sent to <strong><?php echo e($user->email); ?></strong> to verify your email.</h4>
        <?php if(count($errors) > 0): ?>
            <?php foreach($errors->all() as $error): ?>
                <h4><?php echo e($error); ?></h4>
            <?php endforeach; ?>
        <?php endif; ?>
        <p class="label">Verification Code*</p>
        <fieldset>
            <input placeholder="Code..." type="tel" tabindex="1" name="code" required autofocus>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Verifying">Submit</button>
        </fieldset>
        <p class="agreement">Not recieved the email? Click <a href="https://colorlib.com" target="_blank" title="Forgotten Password">here</a> to resend.</p>
        <p class="agreement">Want to stop signing up? Click <a href="<?php echo e(URL::route('nav.signup')); ?>" title="Register">here</a> to cancel.</p>
        <?php echo e(csrf_field()); ?>

    </form>
</div>
</body>
</html>