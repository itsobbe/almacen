<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/Operaciones.php';
session_start();
$codigo="CA".$_REQUEST["codigo"];

$donde= Operaciones::seguimientoDondeEsta($codigo);
$caja= Operaciones::seguimientoDatosV2($donde, $codigo);
$contador= Operaciones::contadorDevolucion($codigo);
$_SESSION["caja"]=$caja;
$_SESSION["contador"]=$contador;
header("Location:../VISTAS/VistaSeguimientoDatos.php?donde=$donde");