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
<div class="spacer"></div>
    <div class="container-fixed">
    <div class="row">
        <div class="col-xs-4">
            <div class="container">
                <div class="sidebar">
                    <div class="black">
                        <img style="display: inline-block" class="owner" src="{{URL::to('images/profiles/cal.jpg')}}" width="75px" height="75px">
                        <div style="display: inline-block; padding-left: 15px; vertical-align: middle">
                            <h4 class="name">@Calrizer</h4>
                            <h5 class="name">Callum Drain</h5>
                        </div>
                    </div>
                    <h3>Test</h3>
                    <h4>Test</h4>
                    <h4>Hello World</h4>
                </div>
            </div>
        </div>
        <div class="col-xs-8">
            <div class="container-fixed">
                @foreach($tasks as $task)
                    <div class="row">
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
        </div>
    </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>