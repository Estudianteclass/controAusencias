<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario nuevo</title>
</head>
<body>
    <h2>Nuevo usuario</h2>
    <h3> datos</h3>
<p>Usuario:{{$user->name}} {{$user->last_name}}</p>
<p>Departamento: {{$department->dep_name}}</p>
<p>Fecha de creacion del usuario:{{$user->created_at}}</p>
<p>Correo electronico:{{$user->email}}</p>
<p>Recuerde generar su contraseña en el menu de login pulsando el enlace de "olvido su contraseña"</p>
</body>
</html>