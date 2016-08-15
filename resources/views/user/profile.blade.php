<!DOCTYPE html>
<html>
<head>
    <title>Due In • Profile</title>
    <meta charset="UTF-8">
    <title>Profile • Due In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('task/css/style-profile.css')}}">
</head>
<body>
<div class="bar">
    <a href="{{URL::route('nav.landing')}}"><img class="logo" src="{{URL::to('forms/Logo.png')}}" href="{{URL::route('nav.landing')}}"/></a>
</div>

<div class="container-fluid">
    @foreach(array_chunk($tasks, 3) as $taskChunk)
        <div class="row">
            @foreach($taskChunk as $task)
            <div class="col-md-4">
                <div class="container">
                    <div class="view">
                        <h3>{{$task->title}}</h3>
                        <h4>{{$task->description}}</h4>
                        <h4>Due In: {{$task->due}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endforeach

</div>
</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>