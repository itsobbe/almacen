<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../MODELOS/Estanteria.php';
include_once '../DAO/Operaciones.php';



//debido a que quermos que las estanterias siempre empiecen por ES
$codigo="ES".$_REQUEST["codigo"];
$lejasCapacidad=$_REQUEST["capacidadLejas"];
$pasillo=(int)$_REQUEST["pasillosDisponibles"];

$numero=$_REQUEST["numerosDisponibles"];

$estanteria=new Estanteria($codigo, $lejasCapacidad,0,$pasillo, $numero);

try {
    $resultado= Operaciones::insertarEstanteriaV4($estanteria);
    $msg="Inserción realizada con éxito";
    header("Location:../VISTAS/VistaMensajeExito.php?mensaje=$msg");
} catch (ApplicationException $ex) {
    header("Location:../VISTAS/VistaErrores.php?error=$ex");
    exit;
}

//header("Location: ..\VISTAS\VistaEstanteria.php?filas=$resultado"); 


