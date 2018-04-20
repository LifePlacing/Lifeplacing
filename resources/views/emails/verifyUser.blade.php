<!DOCTYPE html>
<html>
<head>
    <title>Bem Vindo</title>
</head>
 
<body>
<h2>Bem vindo ao LifePlacing {{$user['name']}}</h2>
<br/>
Seu e-mail cadastrado é {{$user['email']}} , Por favor, clique no link abaixo para verificar sua conta de e-mail
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">Ativar Conta</a>
</body>
 
</html>