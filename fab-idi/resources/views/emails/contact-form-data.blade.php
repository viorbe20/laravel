<!DOCTYPE html>
<html>
<head>
    <title>Datos del formulario de contacto</title>
</head>
<body>
    <h1>Datos del formulario de contacto</h1>

    <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
    <p><strong>Apellidos:</strong> {{ $data['apellidos'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Teléfono:</strong> {{ $data['telefono'] }}</p>
    <p><strong>Centro:</strong> {{ $data['centro'] }}</p>
    <p><strong>Curso:</strong> {{ $data['curso'] }}</p>
    <p><strong>Asignatura:</strong> {{ $data['asignatura'] }}</p>
    <p><strong>PIP:</strong> {{ $data['pip'] }}</p>
    <p><strong>Mentor:</strong> {{ $data['mentor'] }}</p>
    <p><strong>Comentario:</strong> {{ $data['comentario'] }}</p>
</body>
</html>

