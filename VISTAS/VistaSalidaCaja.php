<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Salida/venta de caja</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/styles.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/csspropio.css">
        <link href='../CSS/jquery-ui.min.css' type='text/css' rel='stylesheet' >

    </head>

    <body>
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <?php include_once 'menu.php'; ?>
            </div>
            <div class="page-content-wrapper">
                <div class="container-fluid"><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <h1>Salida de caja</h1>
                            </div>
                        </div>
                    </div>

                    <div class="align-items-center m-auto" style="width:589px;">
                        <form class="d-block" action="../CONTROLADORES/ControladorSalidaCaja.php" autocomplete="off">
                            <div class="form-row">
                                <div class="col">
                                    
                                    <div class="form-group"><label>Codigo</label><input class='form-control codigo' id='codigo' name="codigo"  type="text" required=""></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Contenido</label><input class='form-control contenido' id='contenido' type="text" readonly=""></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Material</label><input id="material" class="form-control" type="text" readonly=""></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group"><label>Profundidad</label><input id="profundidad" class="form-control" type="number" readonly=""></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Alto</label><input id="alto" class="form-control" type="number" readonly=""></div>
                                </div>
                                <div class="col">
                                    <div class="form-group"><label>Ancho</label><input id="ancho" class="form-control" type="number" readonly=""></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group ml-auto"><label>Color&nbsp;&nbsp;</label><input id="color" type="color" disabled=""></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    
                                    <div class="form-group"><label>Estanteria</label><input id="estanteria" class="form-control" type="number" readonly=""></div>
                                </div>
                                <div class="col">
                                    
                                    <div class="form-group"><label>Leja</label><input id="leja" class="form-control" type="number" readonly=""></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group"><button class="btn btn-primary" type="submit">Registrar</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="../CSS/assets/js/script.min.js"></script>
        <script src="../JS/autocompleteSalidaCaja.js"></script>
        <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous">
        </script>

    </body>

</html>