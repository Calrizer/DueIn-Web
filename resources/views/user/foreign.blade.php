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
<div class="edit-bg">
    <div class="edit-profile">
        <h3 style="display: inline-block">Change Picture:</h3>
        <i style="display: inline-block; float: right; font-size: 20px; cursor: pointer" class="fa fa-times close-trigger"></i>
        <div style="display: block"></div>
        <img style="display: inline-block" class="edit-owner" src="{{URL::to('images/profiles/cal.jpg')}}" width="75px" height="75px">
        <div class="profile-container" style="padding-right: 20px">
            <h4 style="margin-top: 0">@Calrizer</h4>
            <h5>Callum Drain</h5>
        </div>
        <input type="file" value="Choose Image" name="upload" size="40">
        <button name="submit" type="submit" id="contact-submit" data-submit="Saving...">Save Changes</button>
    </div>
</div>
<div class="profile-bar">
    <img style="display: inline-block" class="owner" src="{{URL::to('images/profiles/cal.jpg')}}" width="75px" height="75px">
    <div class="profile-container" style="padding-right: 20px">
        <h4>{{"@".$user->username}}</h4>
        <h5>{{$user->name}}</h5>
    </div>
    <div class="stats-container" style="margin-right: 80px">
        @if($setTasks === false)
            <h3>0</h3>
            <h4>Tasks Set</h4>
        @else
            <h3>{{count($setTasks)}}</h3>
            @if(count($setTasks) === 1)
                <h4>Task Set</h4>
            @else
                <h4>Tasks Set</h4>
            @endif
        @endif
    </div>
</div>
<div class="spacer"></div>
@if($setTasks === false)
    <h3>No Tasks Set</h3>
@else
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
@endif
</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{URL::to('scripts/changePicture.js')}}"></script>

</html>