<?php

include_once '../DAO/Operaciones.php';
include_once '../MODELOS/Caja.php';
include_once '../MODELOS/Ocupacion.php';


//puesto que es un simple delete, no necesitamos hacer todo un objeto para ello
$codigo=$_REQUEST["codigo"];

try{
    $resultado=Operaciones::ventaCaja($codigo);
    $msg="Salida realizada corrrectamente";
    header("Location:../VISTAS/VistaMensajeExito.php?mensaje=$msg");
} catch (ApplicationException $ex) {
        header("Location:../VISTAS/VistaErrores.php?error=$ex");
}
