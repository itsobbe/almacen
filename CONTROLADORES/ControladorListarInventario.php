<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/Operaciones.php';

session_start();

$resultadoInventario= Operaciones::listarInventario();

//si el array que viene de operaciones no tiene ningun dato significa que no hay datos en la bd para inventario
if ($resultadoInventario != null) {
    $_SESSION["arrayInventario"]=$resultadoInventario;
    header("Location:../VISTAS/VistaListarInventario.php");
}else  {
    $msg="No hay datos en el inventario";
    header("Location:../VISTAS/VistaErrores.php?error=$msg");
}
