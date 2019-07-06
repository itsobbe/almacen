<?php
//borramos el trigger al mismo empezar
$borrar="DROP TRIGGER IF EXISTS triggerDevolucionCaja";
$resultadoBorrar=$conexion->query($borrar);

//puesto que en operacion el objeto se llama cajaRetornada y haré un include, debo usar ese nombre para sacar los datos


$codigo=$cajaRetornada->getCodigo();
$contenido=$cajaRetornada->getContenido();
$material=$cajaRetornada->getMaterial();
$profundidad=$cajaRetornada->getProfundidad();
$ancho=$cajaRetornada->getAncho();
$alto=$cajaRetornada->getAlto();
$color=$cajaRetornada->getColor();
$fecha=$cajaRetornada->getFecha();
$estanteria=$cajaRetornada->getEstanteria();
$leja=$cajaRetornada->getNumLeja();

$ordenTrigger="CREATE TRIGGER triggerDevolucionCaja AFTER UPDATE ON caja_backup "
        . "FOR EACH ROW "
        . "BEGIN "
        . "INSERT INTO caja VALUES("."null".","."'".$codigo."'".","."'".$contenido."'".","."'".$material."'".","."".$profundidad."".","."".$ancho."".","."".$alto."".","."'".$color."'".","."'".$fecha."');"
        . "INSERT INTO ocupacion VALUES("."null".","."(SELECT id FROM caja WHERE codigo='".$codigo."')".","."".$estanteria."".","."".$leja.");"
        . "UPDATE estanteria SET lejasOcupadas=lejasOcupadas+1 WHERE id='".$estanteria."';"
        . "END;";

$resultadoTrigger=$conexion->query($ordenTrigger);

