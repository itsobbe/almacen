<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/Operaciones.php';

$resultado= Operaciones::revisionSiHayCajas();
if ($resultado) {
    header('Location:../VISTAS/VistaSalidaCaja.php');
}else {
    $msg="No hay cajas disponibles";
    header("Location:../VISTAS/VistaErrores.php?error=$msg");
}