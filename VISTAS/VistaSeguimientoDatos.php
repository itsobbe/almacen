<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de cajas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/assets/css/styles.min.css">
    <link rel="stylesheet" href="../CSS/assets/css/csspropio.css">
</head>

<body>
     <?php
        include_once '../MODELOS/Caja.php';
        session_start();
        $donde=$_REQUEST["donde"];
        $caja=$_SESSION["caja"];
        $contador=$_SESSION["contador"];
//        print_r($caja);exit;
//        echo $caja->getCodigo();
//        print_r($caja->getCodigo());
//        print_r($caja);
        //exit;
        ?>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <?php include_once 'menu.php'; ?>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid"><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <div class="row"  style="margin-bottom: 50px;">
                    <div class="col-md-12">
                        <div>
                            <h1><?php 
                                        if ($donde==1) {
                                            echo "Caja disponible en Almacén";
                                        }else if ($donde == 2) {
                                            echo "Caja vendida";
                                        }
                            
                                    ?></h1>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <?php if ($donde == 1) {
                                                    
                                                ?>
                                <thead>
                                    <tr>
                                        <th>
                                            Codigo
                                        </th>
                                        <th>
                                            Contenido
                                        </th>
                                        <th>
                                            Material
                                        </th>
                                        <th>
                                            Profundidad
                                        </th>
                                        <th>
                                            Ancho
                                        </th>
                                        <th>
                                            Alto
                                        </th>
                                        <th>
                                            Color
                                        </th>
                                        <th>
                                            Fecha Alta
                                        </th>
                                        <th>
                                            Leja
                                        </th>
                                        <th>
                                            Estantería
                                        </th>
                                        <th>
                                            Veces devuelta
                                        </th>
                                       

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td>
                                            <?php echo $caja->codCaja;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->contenido;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->material;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->profundidad;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->ancho;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->alto;?>
                                        </td>
                                        <td style="background-color: <?php echo $caja->color;?>">

                                        </td>
                                        <td>
                                            <?php echo $caja->fecha;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->numLeja;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->codigo;?>
                                        </td>
                                        <td>
                                            <?php print_r($contador);?>
                                        </td>
                                        
                                    </tr>
                                    
                                </tbody>
                                <?php } ?>
                                 <?php if ($donde == 2) {
                                                    
                                                ?>
                                <thead>
                                    <tr>
                                        <th>
                                            Codigo
                                        </th>
                                        <th>
                                            Contenido
                                        </th>
                                        <th>
                                            Material
                                        </th>
                                        <th>
                                            Profundidad
                                        </th>
                                        <th>
                                            Ancho
                                        </th>
                                        <th>
                                            Alto
                                        </th>
                                        <th>
                                            Color
                                        </th>
                                        <th>
                                            Fecha Alta
                                        </th>
                                        <th>
                                            Fecha Baja
                                        </th>
                                        <th>
                                            Leja
                                        </th>
                                        <th>
                                            Estantería
                                        </th>
                                        <th>
                                            Veces devuelta
                                        </th>
                                       

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td>
                                            <?php echo $caja->codigo;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->contenido;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->material;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->profundidad;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->ancho;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->alto;?>
                                        </td>
                                        <td style="background-color: <?php echo $caja->color;?>">

                                        </td>
                                        <td>
                                            <?php echo $caja->fechaAlta;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->fechaBaja;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->numLeja;?>
                                        </td>
                                        <td>
                                            <?php echo $caja->codigoEstanteria;?>
                                        </td>
                                        <td>
                                            <?php echo $contador;?>
                                        </td>
                                        
                                    </tr>
                                    
                                </tbody>
                                <?php } ?>
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