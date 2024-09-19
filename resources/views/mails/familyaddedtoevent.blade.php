<!doctype html>
<html lang="en">
<head>
    <title>Same Page - Family PA Calendar Assistants - Member added to Event</title>
</head>
<body>
    <h4 style="margin-bottom:15px;">Hello {{$addeduser->first_name}}!</h4>
    <p style="margin-bottom:15px;">
        {{$user->first_name}} has added you to an event.
    </p>
    
    <p style="margin-bottom:15px;"><a href="{{route('appindex')}}" style="color:#fff;padding:10px 20px;background:blue;text-align:center;">Visit SamePage</a></p>
     
    <br>
    <p>Thank You,<br>Same Page</p>
</body>
</html>