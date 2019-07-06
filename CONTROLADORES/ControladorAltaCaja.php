<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../DAO/Operaciones.php';
include_once '../MODELOS/Caja.php';
include_once '../MODELOS/Ocupacion.php';

//debido a que queremos que los codigos de las caja empiecen por CA mas los 3 digitos que introduzcan
$codigo = "CA" . $_REQUEST["codigo"];
$contenido = $_REQUEST["contenido"];
$material = $_REQUEST["material"];
$profundidad = $_REQUEST["profundidad"];
$alto = $_REQUEST["ancho"];
$ancho = $_REQUEST["alto"];
$color = $_REQUEST["color"];
$estanteria = $_REQUEST["estanteriasDisponibles"];
$leja = $_REQUEST["lejasDisponibles"];

//creamos objetos necesarios para pasarlos
$caja = new Caja($codigo, $contenido, $material, $profundidad, $ancho, $alto, $color);
$ocupacion = new Ocupacion(null, $estanteria, $leja);

try {
    $resultado = Operaciones::insertarCajaV4($caja, $ocupacion);
    $msg = "Inserción realizada con éxito";
    header("Location:../VISTAS/VistaMensajeExito.php?mensaje=$msg");
} catch (ApplicationException $ex) {
    header("Location:../VISTAS/VistaErrores.php?error=$ex");
}



