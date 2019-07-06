<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../DAO/Operaciones.php';
$resultado= Operaciones::revisionSihayCajasBackUp();
if ($resultado) {
    header('Location:ControladorEstanteriaOptionDevolucion.php');
}else {
    $msg="No hay cajas disponibles para devolver";
    header("Location:../VISTAS/VistaErrores.php?error=$msg");
}