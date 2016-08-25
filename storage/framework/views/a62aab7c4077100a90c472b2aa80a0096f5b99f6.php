<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profile • Due In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(URL::to('task/css/style-profile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('landing/css/font-awesome.min.css')); ?>">
</head>
<body>
<div class="bar">
    <a href="<?php echo e(URL::route('nav.landing')); ?>"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
</div>
<div class="profile-bar">
    <img style="display: inline-block" class="owner" src="<?php echo e(URL::to('images/profiles/cal.jpg')); ?>" width="75px" height="75px">
    <div class="profile-container" style="padding-right: 15px; border-right: 2px solid rgba(50,50,50,0.7);">
        <h4>@Calrizer</h4>
        <h5>Callum Drain</h5>
    </div>
    <div class="profile-container" style="margin-left: 15px">
        <h5>Edit Profile</h5>
        <h5>Change Picture</h5>
    </div>
    <div class="stats-container" style="margin-right: 80px">
        <h3><?php echo e(count($setTasks)); ?></h3>
        <h4>Tasks Set</h4>
    </div>
    <div class="stats-container">
        <h3><?php echo e(count($dueTasks)); ?></h3>
        <h4>Tasks Due</h4>
    </div>
</div>
<div class="due-selector">
    <h4>Tasks Due</h4>
</div>
<div class="set-selector">
    <h4>Tasks Set</h4>
</div>
<div class="spacer"></div>
<div class="container-fluid">
    <?php foreach(array_chunk($dueTasks, 2) as $taskChunk): ?>
        <div class="row">
            <?php foreach($taskChunk as $task): ?>
                <div class="col-md-6">
                    <div class="container">
                        <div class="view">
                            <h3><?php echo e($task->title); ?></h3>
                            <h4><?php echo e($task->description); ?></h4>
                            <h4>Due In: <?php echo e($task->due); ?></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>