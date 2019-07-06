<?php  //controlador que va a la funcion que devulve el array json del objeto caja segun el codigo
include "../DAO/Operaciones.php";

$request = $_POST['request']; // request //sobra, borrar de aui y de js
$search = $_POST['search']; //palabra que debe buscar escrita e el input codigo
$respuesta= Operaciones::datosSegunCodigoCaja($search); //recoge el array con datos json de operaciones
header("Location:../VISTAS/VistaSalidaCajaFormularioScript.php?cod=$respuesta"); //redireccion hacia la vista con el array json
