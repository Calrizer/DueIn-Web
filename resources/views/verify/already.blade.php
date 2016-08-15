<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Account Already Verified • Due In</title>
    <link rel="stylesheet" href="{{URL::to('task/css/style.css')}}">
</head>

<body>
<a href="{{URL::route('nav.landing')}}"><img class="logo" src="{{URL::to('forms/Logo.png')}}" href="{{URL::route('nav.landing')}}"/></a>
<div class="container">
    <div class="view">
        <h3>Account Already Verified!</h3>
        <h4>Your account has already been verified, continue to your profile.</h4>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Signing Up">Continue To Profile</button>
    </div>
</div>
</body>
</html>