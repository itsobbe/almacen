<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <ul class="sidebar-nav">
            <li class="sidebar-brand"> <a href="inicio.php">Inicio</a></li>
                <li>    
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Estantería
                    </a>
                    <div class="dropdown-menu" id="cuadro" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="../CONTROLADORES/ControladorPasilloOption.php">Registro</a>
                      <a class="dropdown-item" href="../CONTROLADORES/ControladorListarEstanteria.php">Listado</a>
                      
                    </div>
                </li>
                <li> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Caja
                        </a>
                    <div class="dropdown-menu" id="cuadro" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../CONTROLADORES/ControladorHayEstanteriaRegistrada.php">Registro</a>
                        <a class="dropdown-item" href="../CONTROLADORES/ControladorRevisionSiHayCajas.php">Salida/Venta</a>
                        <a class="dropdown-item" href="../CONTROLADORES/ControladorRevisionSiHayCajasBackup.php">Devolución</a>
                      <a class="dropdown-item" href="../CONTROLADORES/ControladorListarCaja.php">Listado</a>
                    </div>
                </li>
                <li> 
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Almacen
                        </a>
                    <div class="dropdown-menu" id="cuadro" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../CONTROLADORES/ControladorListarInventario.php">Listar inventario</a>
                      
                    </div>
                </li>
                <li> <a href="VistaSeguimiento.php">Seguimiento</a></li>
            </ul>
    </body>
</html>
