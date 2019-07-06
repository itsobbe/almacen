<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/styles.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/cssLogin.css">
    </head>

    <body>
        <div class="login-dark" style="height:722px;">
            <form method="post" action="../CONTROLADORES/ControladorRegistroUsuario.php" autocomplete="off">
                <h2 class="sr-only">Sign in Form</h2>
                <h3 style="text-align: center;">Registro de usuario</h3>
                <div class="illustration"><i class="icon ion-ios-paper-outline"></i></div>
                <div class="form-group"><input class="form-control" type="text" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre" autofocus="" required></div>
                <div class="form-group"><input class="form-control" type="password" id="contraseñaUsuario" name="contraseñaUsuario" placeholder="Contraseña" required></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Registrar</button></div>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="../CSS/assets/js/script.min.js"></script>
    </body>

</html>