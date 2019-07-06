
<?php
include_once '../DAO/Operaciones.php';
include_once '../MODELOS/Estanteria.php';
session_start();


  //OBTENEMOS LA VARIABLE Origen
$Origen = $_REQUEST["lejasDisponibles"];

$lejasDisponiblesArray= Operaciones::lejasDisponibles($Origen);

$_SESSION["lejasDisponiblesScript"]=$lejasDisponiblesArray;

header("Location:../VISTAS/VistaLejasLibresScript.php");

        

           

