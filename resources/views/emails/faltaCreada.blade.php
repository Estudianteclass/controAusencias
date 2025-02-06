<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ausencia añadida</title>
</head>
<body>
    <h2>Ausencia creada</h2>
<p>Usuario:{{$user->name}} {{$user->last_name}}</p>
<p>Departamento: {{$department->dep_name}}</p>
<p>Fecha de creacion de la ausencia:{{$absence->created_at}}</p>
<p>Fecha de la ausencia:{{$absence->absence_date}}</p>
<p>Turno: {{$absence->turn}}</p>
<p>Hora: {{$absence->hour}}</p>
<p>Comentario: {{$absence->description}}</p>
</body>
</html>