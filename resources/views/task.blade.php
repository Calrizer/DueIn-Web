<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$task->title}} • Due In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('task/css/style.css')}}">
</head>

<body>
<div class="menuwrapper">
    <div class="menubar">

    </div>
</div>
<div class="wrapper">
    <a href="#"><img class="back" src="{{URL::to('forms/arrow.png')}}" href="{{URL::route('nav.landing')}}"/></a>
    <a href="{{URL::route('nav.landing')}}"><img class="logo" src="{{URL::to('forms/Logo.png')}}" href="{{URL::route('nav.landing')}}"/></a>
    <a class="activate"><img class="menu" src="{{URL::to('forms/menu.png')}}" href="{{URL::route('nav.landing')}}"/></a>
</div>
<div class="container-main">
    <div class="view-main">
        <h3>{{$task->title}}</h3>
        <h4>{{$task->description}}</h4>
        <h4>Due In: {{$task->due}}</h4>

        <div class="line">

        </div>

        <div class="row">
                <div class="col-xs-6">
                    <h4>Task Info:</h4>
                    <img style="display: inline-block" class="owner" src="{{URL::to('images/profiles/cal.jpg')}}" width="75px" height="75px">
                    <div style="display: inline-block; padding-left: 15px; vertical-align: middle">
                        <h5>Created By:</h5>
                        <h5>{{'@'.$task->owner}}</h5>
                    </div>
                    <h5>Task Set: {{$task->set}}</h5>
                    <p class="TaskID">Task ID: {{$task->TaskID}} <img src="{{URL::to('task/icon.png')}}" width="18px" height="18px"></p>
                </div>
                <div class="col-xs-6">
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
                </div>
            </div>


        @if(Auth::check())
            @if($task->owner === Auth::user()->username)
                <form action="{{route('task.delete', $task->TaskID)}}" method="delete">
                    <button name="admin" type="submit" id="contact-submit" data-submit="...Deleting Task">Delete Task</button> <button name="admin" type="submit" id="contact-submit" data-submit="...Deleting Task">Edit Task</button>
                    {{csrf_field()}}
                </form>
            @else

                <button name="submit" type="submit" id="contact-submit" data-submit="...Adding Task">Add To My Tasks</button>

            @endif
        @else
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sign In">Sign In To Add This Task</button>
        @endif
    </div>
</div>
<div class="ad-container">
    <div class="ad">
        <img style="-webkit-user-select:none; display:block; " src="https://storage.googleapis.com/support-kms-prod/SNP_BBFA15D142E88EAB62B5C247174644F87043_2922338_en_v2">
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
<script type="text/javascript" src="{{URL::to('scripts/showMenu.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>