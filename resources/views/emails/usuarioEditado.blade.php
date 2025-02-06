<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario editado</title>
</head>
<body>
    <h2>Usuario actualizado </h2>
<h3>Datos nuevos</h3>
<p>Usuario:{{$user->name}} {{$user->last_name}}</p>
<p>Departamento: {{$department->dep_name}}</p>
<p>Fecha de creacion del usuario:{{$user->created_at}}</p>
<p>Correo electronico:{{$user->email}}</p>

</body>
</html>