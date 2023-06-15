<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Inscripción como mentor</h1>
  <p>Has recibido un nuevo mensaje para dar de alta un mentor:</p>
    <p>Estos son los datos del solicitante:</p>
  <ul>
    <li>Nombre: {{ $nombre }}</li>
    <li>Email: {{ $email }}</li>
    <li>Teléfono: {{ $tel }}</li>
    <li>Redes sociales:</li>
      <ul>
        <li>Twitter: {{ $twitter }}</li>
        <li>Instagram: {{ $instagram }}</li>
        <li>Linkedin: {{ $linkedin }}</li>
        <li>Web: {{ $web }}</li>
      </ul>
    <li>Mensaje: {{ $mensaje }}</li>

  </ul>
</body>
</html>