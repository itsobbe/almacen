<?php

include_once '../DAO/Operaciones.php';

$nombre=$_POST["nombre"];
//$nombre="oualid";
$contraseña=$_POST["password"];

try{
    $resultado= Operaciones::inicioSesion($nombre,$contraseña);
    header("Location:../VISTAS/inicio.php");
} catch (ApplicationException $ex) {
    header("Location:../VISTAS/VistaLoginResultadoError.php?error='".$ex."'&id=2");
}
