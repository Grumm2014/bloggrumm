<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to the site {{$user['name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Пожалуйста, пройдите по ссылке ниже, чтобы подтвердить свою учетную запись и адрес электронной почты.
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">Подтвердить Email</a>
</body>
</html>