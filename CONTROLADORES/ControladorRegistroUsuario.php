<?php

include_once '../DAO/Operaciones.php';

$nombre=$_POST["nombreUsuario"];
$contraseña=$_POST["contraseñaUsuario"]; //cuidado ñ



 try{
     $resultado= Operaciones::registroUsuarioV2($nombre,$contraseña);
     $mensaje="Inserción realizada con éxito";
     header("Location: ../VISTAS/inicio.php");
 } catch (ApplicationException $ex) {
     header("Location: ../VISTAS/VistaLoginResultadoError.php?id=1&error=$ex");
 }