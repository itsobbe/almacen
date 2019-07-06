<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de caja</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/styles.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/csspropio.css">
        <script type="text/javascript" src="../JS/GestionLejas.js"></script> 
    </head>

    <body>
        <?php
        include_once '../MODELOS/Estanteria.php';

        session_start();
        $estanteriasDis = $_SESSION["estanteriasDisponibles"];

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
                                <h1>Registro de caja</h1>
                            </div>
                        </div>
                    </div>
                    <div class="align-items-center m-auto" style="width:589px;">
                        <form class="d-block" name="miFormulario" action="../CONTROLADORES/ControladorAltaCaja.php" autocomplete="off">
                            <div class="form-row">
                                <div class="col">
                                    <label>Codigo</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" name="etiqueta" value="ES" id="basic-addon1">CA</span>
                                        </div>
                                        <input class="form-control" name="codigo" ype="text" pattern="[0-9]+" minlength="3" maxlength="3" aria-describedby="basic-addon1" required="">
                                        <small id="codigoAyuda" class="form-text text-muted">Introduzca 3 números.</small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Contenido</label><input class="form-control" name="contenido" type="text" required=""></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Material</label><input class="form-control" name="material" type="text" required=""></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group"><label>Profundidad</label><input class="form-control" name="profundidad" min="1" type="number" step="any" required=""></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Alto</label><input class="form-control" name="ancho" min="1" type="number" step="any" required=""></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Ancho</label><input class="form-control" name="alto" min="1" type="number" step="any" required=""></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group ml-auto"><label>Color&nbsp;&nbsp;</label><input type="color" name="color" required=""></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group"><label>Estanteria</label>
                                        <select class="form-control"  name="estanteriasDisponibles" id="estanteriasDisponibles" onchange="lejas(this.value)" required="">
                                            <optgroup label="Estanterias disponibles">
                                                <option value="nulo" selected="">Elige</option>

                                                <?php foreach ($estanteriasDis as $estanteria) { ?>
                                                    <option value="<?php echo $estanteria->id ?>"> 
                                                        <?php echo "  Codigo:  " . $estanteria->codigo . "  Pasillo:  " . $estanteria->letra . " Numero: " . $estanteria->numero ?>
                                                    </option>
                                                <?php } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Leja</label>
                                        <select class="form-control" id="lejasDisponibles" name="lejasDisponibles" required="">
                                            <optgroup label="Elige una leja">
                                                <option value="nulo" selected="selected">elige</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group"><button class="btn btn-primary" type="submit">Registrar</button></div>
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