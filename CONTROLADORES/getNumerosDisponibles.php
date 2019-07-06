<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/Operaciones.php';
include_once '../DAO/../MODELOS/Pasillo.php';

session_start();

$letraPasillo=$_REQUEST["numerosDisponibles"];

$pasillosDis= Operaciones::getNumerosDisponibles($letraPasillo);

$_SESSION["disponiblesPasillos"]=$pasillosDis;
header("Location:../VISTAS/VistaNumerosLibresScript.php");
