<?php

@ $conexion = new mysqli('localhost', 'root', 'root', 'bd_almacen_obb');
$error = $conexion->connect_errno;
$conexion->set_charset("utf8");
if ($error != null) {
    echo "<p>Error $error conectando a la base de datos:
$conexion->connect_error</p>";
}
