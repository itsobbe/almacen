<?php

include_once '../DAO/Operaciones.php';

session_start();

$array= Operaciones::listarEstanteria();

//si array vacio significa que no hay estanterias 
if ($array != null) {
    $_SESSION["arrayEstanteria"]=$array;
    header("Location:../VISTAS/VistaListarEstanteria.php");
}else{
    $msg="No hay estanterías en la base de datos";
    header("Location:../VISTAS/VistaErrores.php?error=$msg");
}

