<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo e($user->username); ?>'s Tasks • Due In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(URL::to('task/css/style-profile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('landing/css/font-awesome.min.css')); ?>">
</head>
<body>
<div class="bar">
    <a href="<?php echo e(URL::route('nav.landing')); ?>" style="display: inline-block"><img class="logo" src="<?php echo e(URL::to('forms/Logo.png')); ?>" href="<?php echo e(URL::route('nav.landing')); ?>"/></a>
    <div class="controls end">
        <div class="control-button">
            <h1 class="control-text"><a href="<?php echo e(URL::route('user.logout')); ?>">Logout</a></h1>
        </div>
    </div>
    <div class="controls">
        <div class="control-button">
            <h1 class="control-text"><a href="<?php echo e(URL::route('nav.new')); ?>">Create Task</a></h1>
        </div>
    </div>
</div>
<div class="edit-bg">
    <div class="edit-profile">
        <h3 style="display: inline-block">Change Picture:</h3>
        <i style="display: inline-block; float: right; font-size: 20px; cursor: pointer" class="fa fa-times close-trigger"></i>
        <div style="display: block"></div>
        <img style="display: inline-block" class="edit-owner" src="<?php echo e(URL::to('images/profiles/cal.jpg')); ?>" width="75px" height="75px">
        <div class="profile-container" style="padding-right: 20px">
            <h4 style="margin-top: 0"><?php echo e('@'.$user->username); ?></h4>
            <h5><?php echo e($user->name); ?></h5>
        </div>
        <input type="file" value="Choose Image" name="upload" size="40">
        <button name="photo-change" type="submit" id="contact-submit" data-submit="Saving...">Save Changes</button>
    </div>
</div>
<div class="profile-bar">
    <img style="display: inline-block" class="owner" src="<?php echo e(URL::to('images/profiles/cal.jpg')); ?>" width="75px" height="75px">
    <div class="profile-container" style="padding-right: 20px; border-right: 2px solid rgba(256, 256, 256, 0.7);">
        <h4><?php echo e('@'.$user->username); ?></h4>
        <h5><?php echo e($user->name); ?></h5>
    </div>
    <div class="profile-container" style="margin-left: 20px">
        <h5 class="profile-trigger" style="cursor: pointer">Edit Profile</h5>
        <h5 class="picture-trigger" style="cursor: pointer">Change Picture</h5>
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
<div class="complete-selector">
    <h4>Tasks Complete</h4>
</div>
<div class="set-selector">
    <h4>Tasks Set</h4>
</div>
<div class="spacer"></div>

<div class="due-tasks">
    <?php if($dueTasks === false): ?>
        <div class="no-due">
            <h3>No Tasks Due</h3>
            <button name="photo-change" type="submit" id="contact-submit" data-submit="Setting...">Search for Tasks or Users</button>
        </div>
    <?php else: ?>
        <div class="container-fluid">
            <?php foreach(array_chunk($dueTasks, 2) as $taskChunk): ?>
                <div class="row">
                    <?php foreach($taskChunk as $dueTask): ?>
                        <div class="col-md-6">
                            <div class="container">
                                <div class="view">
                                    <h3><?php echo e($dueTask->title); ?></h3>
                                    <h4><?php echo e(htmlentities($dueTask->description)); ?></h4>
                                    <h4 style="margin-bottom: 10px">Due In: <?php echo e($dueTask->due); ?></h4>
                                    <div class="line"></div>
                                    <div style="display: inline-block">
                                        <form>
                                            <input type="hidden" value="<?php echo e($dueTask->TaskID); ?>">
                                            <button name="task-done" type="submit"><i class="fa fa-check" aria-hidden="true" style="display: inline-block; font-size: 24px; color: green; margin: 4px 10px 0 0"></i></button>
                                            <h4 style="display: inline-block">Complete Task</h4>
                                        </form>
                                    </div>
                                    <h3 style="display: inline-block; margin-right: 20px; margin-left: 20px">•</h3>
                                    <div style="display: inline-block">
                                        <form action="<?php echo e(URL::route('task.remove', $dueTask->TaskID)); ?>">
                                            <button name="task-done" type="submit"><i class="fa fa-times" aria-hidden="true" style="display: inline-block; font-size: 24px; color: red; margin-right: 10px"></i></button>
                                            <h4 style="display: inline-block">Remove Task</h4>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<div class="complete-tasks">
    <?php if($completeTasks === false): ?>
        <div class="no-due">
            <h3>No Tasks Complete</h3>
            <button name="photo-change" type="submit" id="contact-submit" data-submit="Setting...">Search for Tasks or Users</button>
        </div>
    <?php else: ?>
        <div class="container-fluid">
            <?php foreach(array_chunk($completeTasks, 2) as $taskChunk): ?>
                <div class="row">
                    <?php foreach($taskChunk as $completeTask): ?>
                        <div class="col-md-6">
                            <div class="container">
                                <div class="view">
                                    <h3><?php echo e($completeTask->title); ?></h3>
                                    <h4><?php echo e(htmlentities($completeTask->description)); ?></h4>
                                    <h4 style="margin-bottom: 10px">Due In: <?php echo e($dueTask->due); ?></h4>
                                    <div class="line"></div>
                                    <div style="display: inline-block">
                                        <form>
                                            <input type="hidden" value="<?php echo e($completeTask->TaskID); ?>">
                                            <button name="task-done" type="submit"><i class="fa fa-check" aria-hidden="true" style="display: inline-block; font-size: 24px; color: green; margin: 4px 10px 0 0"></i></button>
                                            <h4 style="display: inline-block">Complete Task</h4>
                                        </form>
                                    </div>
                                    <h3 style="display: inline-block; margin-right: 20px; margin-left: 20px">•</h3>
                                    <div style="display: inline-block">
                                        <form action="<?php echo e(URL::route('task.remove', $completeTask->TaskID)); ?>">
                                            <button name="task-done" type="submit"><i class="fa fa-times" aria-hidden="true" style="display: inline-block; font-size: 24px; color: red; margin-right: 10px"></i></button>
                                            <h4 style="display: inline-block">Remove Task</h4>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<div class="set-tasks">
    <?php if($setTasks === false): ?>
        <div class="no-set">
            <h3>You haven't set any tasks.</h3>
            <button name="photo-change" type="submit" id="contact-submit" data-submit="Setting...">Set A New Task</button>
        </div>
    <?php else: ?>
    <div class="container-fluid">
        <?php foreach(array_chunk($setTasks, 2) as $taskChunk): ?>
            <div class="row">
                <?php foreach($taskChunk as $setTask): ?>
                    <div class="col-md-6">
                        <div class="container">
                            <div class="view">
                                <h3><?php echo e($setTask->title); ?></h3>
                                <h4><?php echo e(htmlentities($setTask->description)); ?></h4>
                                <h4>Due In: <?php echo e($setTask->due); ?></h4>
                                <p style="display: inline-block; font-size: 20px; margin: 4px 20px 8px 0">Edit</p>
                                <p style="display: inline-block; font-size: 20px">Delete</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo e(URL::to('scripts/tabSelector.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::to('scripts/changePicture.js')); ?>"></script>

</html>