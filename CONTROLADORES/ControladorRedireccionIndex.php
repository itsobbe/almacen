<?php

include_once '../DAO/Operaciones.php';

$resultado= Operaciones::revisionSiAlguienRegistrado();
if ($resultado) {
    header("Location:../VISTAS/VistaLogin.php");
}else header("Location:../VISTAS/VistaSignin.php");