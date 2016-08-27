<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$user->username}}'s Tasks • Due In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('task/css/style-profile.css')}}">
    <link rel="stylesheet" href="{{URL::to('landing/css/font-awesome.min.css')}}">
</head>
<body>
<div class="bar">
    <a href="{{URL::route('nav.landing')}}"><img class="logo" src="{{URL::to('forms/Logo.png')}}" href="{{URL::route('nav.landing')}}"/></a>
</div>
<div class="profile-bar">
    <img style="display: inline-block" class="owner" src="{{URL::to('images/profiles/cal.jpg')}}" width="75px" height="75px">
    <div class="profile-container" style="padding-right: 20px; border-right: 2px solid rgba(256, 256, 256, 0.7);">
        <h4>@Calrizer</h4>
        <h5>Callum Drain</h5>
    </div>
    <div class="profile-container" style="margin-left: 20px">
        <h5>Edit Profile</h5>
        <h5>Change Picture</h5>
    </div>
    <div class="stats-container" style="margin-right: 80px">
        <h3>{{count($setTasks)}}</h3>
        <h4>Tasks Set</h4>
    </div>
    <div class="stats-container">
        <h3>{{count($dueTasks)}}</h3>
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
<div class="due-tasks">
    <div class="container-fluid">
        @foreach(array_chunk($dueTasks, 2) as $taskChunk)
            <div class="row">
                @foreach($taskChunk as $dueTask)
                    <div class="col-md-6">
                        <div class="container">
                            <div class="view">
                                <h3>{{$dueTask->title}}</h3>
                                <h4>{{htmlentities($dueTask->description)}}</h4>
                                <h4>Due In: {{$dueTask->due}}</h4>
                                <i class="fa fa-check" aria-hidden="true" style="display: inline-block; font-size: 24px; color: green; margin: 4px 20px 8px 0"></i>
                                <i class="fa fa-times" aria-hidden="true" style="display: inline-block; font-size: 24px; color: red"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<div class="set-tasks">
    <div class="container-fluid">
        @foreach(array_chunk($setTasks, 2) as $taskChunk)
            <div class="row">
                @foreach($taskChunk as $setTask)
                    <div class="col-md-6">
                        <div class="container">
                            <div class="view">
                                <h3>{{$setTask->title}}</h3>
                                <h4>{{htmlentities($setTask->description)}}</h4>
                                <h4>Due In: {{$setTask->due}}</h4>
                                <i style="display: inline-block; font-size: 20px; margin: 4px 20px 8px 0">Edit</i>
                                <i class="fa fa-times" aria-hidden="true" style="display: inline-block; font-size: 24px; color: red"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{URL::to('scripts/tabSelector.js')}}"></script>

</html>