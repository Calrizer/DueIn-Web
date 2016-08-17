<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Task • Due In</title>
    <link rel="stylesheet" href="<?php echo e(URL::to('forms/css/style.css')); ?>">
</head>

<body>
<div class="wrapper">
    <a href="#"><img class="back" src="<?php echo e(URL::to('forms/arrow.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
    <a href="<?php echo e(URL::route('nav.landing')); ?>"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
    <a><img class="profile" src="<?php echo e(URL::to('forms/menu.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
</div>
<div class="container">
    <form id="contact" action="<?php echo e(route('task.create')); ?>" method="post">
        <h3>Create Task</h3>
        <h4>Enter information to create a task.</h4>
        <?php if(count($errors) > 0): ?>
            <?php foreach($errors->all() as $error): ?>
                <h4><?php echo e($error); ?></h4>
            <?php endforeach; ?>
        <?php endif; ?>
        <p class="label">Title*</p>
        <fieldset>
            <input placeholder="Title..." type="text" tabindex="1" name="title" required autofocus>
        </fieldset>
        <p class="label">Due Date*&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160Due Time (Optional)</p>
        <fieldset>
            <select name="day" title="Day" class="day" id="day" tabindex="2">
                <option value="">Day</option>
                <?php for($day = 1; $day <= 31; $day++): ?>
                    <?php if($day < 10): ?>
                        <option value="0<?php echo e($day); ?>"><?php echo e($day); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($day); ?>"><?php echo e($day); ?></option>
                    <?php endif; ?>
                <?php endfor; ?>
            </select>
            <select name="month" title="Month" class="month" id="month" tabindex="3">
                <option value="">Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select name="year" title="Year" class="year" id="year" tabindex="4">
                <option value="">Year</option>
                <?php for($year = 2016; $year <= 2026; $year++): ?>
                    <option value="<?php echo e($year); ?>"><?php echo e($year); ?></option>
                <?php endfor; ?>
            </select>
            <select name="hour" title="Hour" class="hour" id="hour">
                <option value="">Hour</option>
                <?php for($hour = 0; $hour <= 23; $hour++): ?>
                    <?php if($hour < 10): ?>
                        <option value="0<?php echo e($hour); ?>">0<?php echo e($hour); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($hour); ?>"><?php echo e($hour); ?></option>
                    <?php endif; ?>
                <?php endfor; ?>
            </select>
            <select name="minute" title="Minute" class="minute" id="minute">
                <option value="">Minute</option>
                <?php for($min = 0; $min <= 59; $min++): ?>
                    <?php if($min < 10): ?>
                        <option value="0<?php echo e($min); ?>">0<?php echo e($min); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($min); ?>"><?php echo e($min); ?></option>
                    <?php endif; ?>
                <?php endfor; ?>
            </select>
        </fieldset>
        <p class="label">Description*</p>
        <fieldset>
            <textarea placeholder="Description..." type="text" tabindex="5" name="description" required></textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Creating Task">Create Task</button>
        </fieldset>
        <p class="agreement">When you create a task a code is generated that people can scan to retrieve all of the task's information. <a href="https://colorlib.com" target="_blank" title="Learn More">Learn More</a>.</p>
        <?php echo e(csrf_field()); ?>

    </form>
</div>
</body>
</html>