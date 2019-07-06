<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Estantería</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/styles.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/csspropio.css">
        <!--<script type="text/javascript" src="../JS/GestionNumerosPasillos.js"></script>--> 
    </head>

    <body>
        <?php
//        include_once '../MODELOS/Pasillo.php';
//        session_start();
//
//        $pasillos = $_SESSION["pasillosDisponibles"];
        ?>
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <?php include_once 'menu.php'; ?>
            </div>
            <div class="page-content-wrapper">
                <div class="container-fluid"><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <h1>Seguimiento</h1>
                            </div>
                        </div>
                    </div>
                    <div class="align-items-center m-auto" style="width:589px;">
                        <form class="d-block" name="miFormulario" action="../CONTROLADORES/ControladorSeguimiento.php" autocomplete="off">
                            <div class="form-row">
                                <div class="col">
                                    <label>Código</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" name="etiqueta" value="ES" id="basic-addon1">CA</span>
                                        </div>
                                        <input class="form-control" id="codigo" name="codigo" type="text" pattern="[0-9]+" minlength="3" maxlength="3" aria-describedby="basic-addon1" required="">
                                    </div>
                                    <small id="codigoAyuda" class="form-text text-muted">Introduzca 3 números.</small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group"><button class="btn btn-primary" type="submit">Buscar</button></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><button class="btn btn-primary" onclick="reset()" type="reset">Borrar todo</button></div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../JS/jsPropio.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="../CSS/assets/js/script.min.js"></script>
    </body>

</html>