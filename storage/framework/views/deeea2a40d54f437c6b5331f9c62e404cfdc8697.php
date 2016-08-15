<h1>Sign Up</h1>
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <?php foreach($errors->all() as $error): ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<form action="<?php echo e(route('user.signup')); ?>" method="post">
    <div class="form-group">
        <label for="email">E-Mail</label>
        <input type="text" id="email" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
    <?php echo e(csrf_field()); ?>

</form>