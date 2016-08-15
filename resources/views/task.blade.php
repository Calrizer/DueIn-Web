<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$task->title}} • Due In</title>
    <link rel="stylesheet" href="{{URL::to('task/css/style.css')}}">
</head>

<body>
<a href="{{URL::route('nav.landing')}}"><img class="logo" src="{{URL::to('forms/Logo.png')}}" href="{{URL::route('nav.landing')}}"/></a>
<div class="container">
    <div class="view">
        <h3>{{$task->title}}</h3>
        <h4>{{$task->description}}</h4>
        <h4>Due In: {{$task->due}}</h4>
        <h5>Created By: {{'@'.$task->owner}}</h5>
        <h5>Task Set: {{$task->set}}</h5>
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
            <img class="code" src="{{URL::to('images/codes/'.$task->TaskID.'.png')}}" width="170px" height="170px"/>
        </div>
        <p class="TaskID">{{$task->TaskID}} <img src="{{URL::to('task/icon.png')}}" width="18px" height="18px"></p>
        <form action="{{route('task.add', $task->TaskID)}}" method="post">
        @if(Auth::check())
            @if($task->owner === Auth::user()->username)
                <button name="admin" type="submit" id="contact-submit" data-submit="...Deleting Task">Delete Task</button> <button name="admin" type="submit" id="contact-submit" data-submit="...Deleting Task">Edit Task</button>
            @else
                <button name="submit" type="submit" id="contact-submit" data-submit="...Adding Task">Add To My Tasks</button>
            @endif
        @else
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sign In">Sign In To Add This Task</button>
        @endif
            {{csrf_field()}}
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