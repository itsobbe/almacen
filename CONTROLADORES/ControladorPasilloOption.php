<?php

include_once '../DAO/Operaciones.php';
session_start();

$pasillosDisponibles= Operaciones::getPasillosDisponibles();

$_SESSION["pasillosDisponibles"]=$pasillosDisponibles;

header("Location: ../VISTAS/registroEstanteria.php");
