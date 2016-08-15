<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create Task • Due In</title>
    <link rel="stylesheet" href="{{URL::to('forms/css/style.css')}}">
</head>

<body>
<a href="{{URL::route('nav.landing')}}"><img class="logo" src="{{URL::to('forms/Logo.png')}}" href="{{URL::route('nav.landing')}}"/></a>
<div class="container">
    <form id="contact" action="{{route('task.create')}}" method="post">
        <h3>Create Task</h3>
        <h4>Enter information to create a task.</h4>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <h4>{{$error}}</h4>
            @endforeach
        @endif
        <p class="label">Title*</p>
        <fieldset>
            <input placeholder="Title..." type="text" tabindex="1" name="title" required autofocus>
        </fieldset>
        <p class="label">Due Date*&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160&#160Due Time (Optional)</p>
        <fieldset>
            <select name="day" title="Day" class="day" id="day" tabindex="2">
                <option value="">Day</option>
                @for($day = 1; $day <= 31; $day++)
                    @if($day < 10)
                        <option value="0{{$day}}">{{$day}}</option>
                    @else
                        <option value="{{$day}}">{{$day}}</option>
                    @endif
                @endfor
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
                @for($year = 2016; $year <= 2026; $year++)
                    <option value="{{$year}}">{{$year}}</option>
                @endfor
            </select>
            <select name="hour" title="Hour" class="hour" id="hour">
                <option value="">Hour</option>
                @for($hour = 0; $hour <= 23; $hour++)
                    @if($hour < 10)
                        <option value="0{{$hour}}">0{{$hour}}</option>
                    @else
                        <option value="{{$hour}}">{{$hour}}</option>
                    @endif
                @endfor
            </select>
            <select name="minute" title="Minute" class="minute" id="minute">
                <option value="">Minute</option>
                @for($min = 0; $min <= 59; $min++)
                    @if($min < 10)
                        <option value="0{{$min}}">0{{$min}}</option>
                    @else
                        <option value="{{$min}}">{{$min}}</option>
                    @endif
                @endfor
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
        {{csrf_field()}}
    </form>
</div>
</body>
</html>