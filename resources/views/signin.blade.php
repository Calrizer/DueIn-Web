<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign In • Due In</title>
    <link rel="stylesheet" href="{{URL::to('forms/css/style.css')}}">
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
<div class="container">
    <form id="contact" action="{{route('user.signin')}}" method="post">
        <h3>Sign In</h3>
        <h4>Enter your email and password to sign in.</h4>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <h4 class="error">{{$error}}</h4>
            @endforeach
        @endif
        <p class="label">Email*</p>
        <fieldset>
            <input placeholder="Email..." type="email" tabindex="1" name="email" required autofocus>
        </fieldset>
        <p class="label">Password*</p>
        <fieldset>
            <input placeholder="Password..." type="password" tabindex="2" name="password" required>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Signing in">Sign In</button>
        </fieldset>
        <p class="agreement"><a href="https://colorlib.com" target="_blank" title="Forgotten Password">Forgotten your password?</a></p>
        <p class="agreement">New user? Click <a href="{{URL::route('nav.signup')}}" title="Register">here</a> to create an account.</p>
        {{csrf_field()}}
    </form>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>
<script type="text/javascript" src="{{URL::to('scripts/showMenu.js')}}"></script>
</body>
</html>