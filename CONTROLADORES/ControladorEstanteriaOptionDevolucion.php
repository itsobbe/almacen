<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//este escript nos consigue las estanterias que tienen al menos una leja disponible: recibe un array de estanterias llamando a
// una funcion que nos manda un array de estanterias, la guardamos en session y redirigimos hacia el formulario de alta caja

//include debido a que usamos la funcion estatica de la clase operaciones
include_once '../DAO/Operaciones.php';
session_start();
//llamamos a la funcion que nos trae las estanterias que tienen alguna leja disponible  
//la guardamos en una variables ( nos trae un array de estanterias)
$estanteriasDisponibles= Operaciones::getEstanteriasDisponiblesFetch();

//guardamos el array de esntanterias disponibles por sesion
$_SESSION["estanteriasDisponibles"]=$estanteriasDisponibles;

//redirigimos hacia el formulario alta caja
header("Location:../VISTAS/VistaDevolucionCaja.php");