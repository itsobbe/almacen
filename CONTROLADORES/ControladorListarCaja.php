<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/Operaciones.php';
session_start();
$resultado= Operaciones::listarCaja();
if ($resultado != null) {
    $_SESSION["arrayListadoCaja"]=$resultado;
    header("Location:../VISTAS/VistaListarCaja.php");
}else {
    $msg="No hay cajas registradas";
    header("Location:../VISTAS/VistaErrores.php?error=$msg");
}

