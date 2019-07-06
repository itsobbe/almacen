<?php


include_once '../DAO/Operaciones.php';
include_once '../MODELOS/CajaBackup.php';

$codigo=$_REQUEST["codigo"];
$contenido=$_REQUEST["contenido"];
$material=$_REQUEST["material"];
$profundidad=$_REQUEST["profundidad"];
$ancho=$_REQUEST["ancho"];
$alto=$_REQUEST["alto"];
$color=$_REQUEST["color"];
$fecha=$_REQUEST["fechaAlta"];
$estanteria=$_REQUEST["estanteriasDisponibles"];
$leja=$_REQUEST["lejasDisponibles"];//;


$objCajaBackup=new CajaBackup($codigo, $contenido, $material, $profundidad, $ancho, $alto, $color,$estanteria,$leja);
$objCajaBackup->setFecha($fecha);

//$objCajaBackup=new CajaBackup('CA123','ere','sdsd',3,3,3,'0000','ES123',1);
//$objCajaBackup->setFecha('2018-11-30');


try{
    $resultado= Operaciones::devolucionCajaV2($objCajaBackup);
    $msg="Devolucion realizada correctamente"; 
    header("Location:../VISTAS/VistaMensajeExito.php?mensaje=$msg");
} catch (ApplicationException $ex) {
    header("Location:../VISTAS/VistaErrores.php?error=$ex");
}





