<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminacion de Cuenta</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
          Eliminacion de cuenta en Chronos Web
        </div>
        <div class="card-body">
          <h3 class="card-title">Notificación de cierre de cuenta</h3>
          <p class="card-text">El usuario {{$user->nom_cuentas }} {{ $user->ape_cuentas }}, acaba de eliminar sus datos de nuestra plataforma Web.</p>
          <p class="card-text">Su correo electrónico es {{ $user->email }}.</p>
        </div>
      </div>
</body>
</html>