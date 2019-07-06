<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de inventario</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/styles.min.css">
        <link rel="stylesheet" href="../CSS/assets/css/csspropio.css">
    </head>

    <body>
        <?php
        session_start();
        //recoger el array de objectos del fetch object que nos llega desde el controlador
        $array = $_SESSION["arrayInventario"];
        //variable en la que guardare la estanteria imprimida, la inicio a 0 por si acaso y sabiendo que ningun id tendra 0
        $idEstanteriaPuesto = 0;
        ?>
        <div id="wrapper">
            <div id="sidebar-wrapper">
                <?php include_once 'menu.php'; ?>
            </div>
            <div class="page-content-wrapper">
                <div class="container-fluid"><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-md-12">
                            <div>
                                <h1>Listado de inventario</h1>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr bgcolor="#99CC00">
                                            <th colspan="2">
                                                Codigo
                                            </th>
                                            <th colspan="2">
                                                Capacidad
                                            </th>
                                            <th colspan="">
                                                Numero lejas ocupadas
                                            </th>
                                            <th colspan="2">
                                                Pasillo
                                            </th>
                                            <th>
                                                Número en pasillo
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            foreach ($array as $fila) {
                                                //si el id estanteria anteriormente puesto es distinto al que nos llega ahora en la fila significara
                                                //es una nueva estanteria por lo que imprimimos los datos de estanteria 
                                                if ($idEstanteriaPuesto != $fila->estanteriaId) {
                                                    ?>
                                                    <td colspan="2" >
                                                        <?php echo $fila->estanteriaCodigo; ?>
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo $fila->capacidadLejas; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila->lejasOcupadas; ?>
                                                    </td>
                                                    <td colspan="2">
                                                        <?php echo $fila->letra; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $fila->numero; ?>
                                                    </td>
                                                </tr>
                                                <?php if ($fila->cajaId != null) {    //si el id caja es null significa que la estanteria no tiene caja por lo que no hace falta que imprimamos las cosas de caja
                                                    ?>
                                                    <tr>
                                                        <th>Código Caja</th>
                                                        <th>Contenido</th>
                                                        <th>Material</th>
                                                        <th>Color</th>
                                                        <th>Profundidad</th>
                                                        <th>Ancho</th>
                                                        <th>Alto</th>
                                                        <th>Fecha</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $fila->codigoCaja; ?></td>
                                                        <td><?php echo $fila->contenido; ?></td>
                                                        <td><?php echo $fila->material; ?></td>
                                                        <td style="background-color:<?php echo $fila->color; ?>"></td>
                                                        <td><?php echo $fila->profundidad; ?></td>
                                                        <td><?php echo $fila->ancho; ?></td>
                                                        <td><?php echo $fila->alto; ?></td>
                                                        <td><?php echo $fila->fecha; ?></td>
                                                    </tr>
                                                    <?php
                                                }//llave del if dentro del if
                                                //llave del if
                                            } else if ($fila->cajaId != null) { //controlando que la estanteria que tengo ahora tiene caja o no
                                                ?>
                                                <tr>
                                                    <td><?php echo $fila->codigoCaja; ?></td>
                                                    <td><?php echo $fila->contenido; ?></td>
                                                    <td><?php echo $fila->material; ?></td>
                                                    <td style="background-color:<?php echo $fila->color; ?>"></td>
                                                    <td><?php echo $fila->profundidad; ?></td>
                                                    <td ><?php echo $fila->ancho; ?></td>
                                                    <td><?php echo $fila->alto; ?></td>
                                                    <td ><?php echo $fila->fecha; ?></td>
                                                </tr>
                                                <?php
                                            } //lave del else
                                            $idEstanteriaPuesto = $fila->estanteriaId;
                                        }//llave del primer for 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="../CSS/assets/js/script.min.js"></script>
    </body>

</html>