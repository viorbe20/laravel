@php
    use Illuminate\Contracts\Mail\Mailable;
@endphp

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva contraseña generada</title>
</head>
<body>
    <h1>Hola, {{ $usuario->nombre }}</h1>
    <p>Se ha generado una nueva contraseña para tu cuenta. A continuación, encontrarás los detalles:</p>
    <p>Tu cuenta de acceso es: {{ $usuario->email }}</p>
    <p>Tu nueva contraseña es: {{ $randomPassword }}</p>
    <p>Un saludo.</p>
</body>
</html>
