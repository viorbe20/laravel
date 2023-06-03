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
    <h2>Hola,</h2>
    <p>Se ha generado una nueva contraseña para tu cuenta. A continuación, encontrarás los detalles:</p>
    <p>Contraseña: {{ $randomPassword }}</p>
    <p>Por favor, inicia sesión con esta nueva contraseña y asegúrate de cambiarla después de ingresar.</p>
    <p>Gracias y saludos,</p>
    <p>Tu aplicación</p>
</body>
</html>
