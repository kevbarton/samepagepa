<!doctype html>
<html lang="en">
<head>
    <title>Same Page - Family PA Calendar Assistants - Family Invite</title>
</head>
<body>
    <h4 style="margin-bottom:15px;">Hello {{$name}}!</h4>
    <p style="margin-bottom:15px;">
        {{$user->first_name}} has invited you to join on Samepage
    </p>
    <p style="margin-bottom:15px;"><strong style="margin-right:15px;">Invite Code:</strong><span style="padding:10px;font-weight:bold;background:#ccc">{{$code}}</span></p>
    
    <p style="margin-bottom:15px;"><a href="{{route('app.acceptinvite')}}" style="color:#fff;padding:10px 20px;background:blue;text-align:center;">Accept Invite</a></p>
     
    <br>
    <p>Thank You,<br>Same Page</p>
</body>
</html>