<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Operaciones
 *
 * @author owa_7
 */
include_once 'conexion.php';
include_once '../MODELOS/Estanteria.php';
include_once '../MODELOS/Pasillo.php';
include_once '../ERRORES/ApplicationException.php';
include_once '../MODELOS/Caja.php';

class Operaciones {

    static function insertarEstanteriaV4($estanteria) {   //con clase error nueva
        $esta = 2; //para inicializala con algo y que sepa que está
        global $conexion;

        $todo_bien = true; //para comprobar que salio bien
        $conexion->autocommit(false); // Iniciamos la transacción asi no se hacen efectivos los cambios hasta que no confirmemos

        
        
        $orden = "INSERT INTO estanteria VALUES(null,?,?,?,?,?)";
        $resultado = $conexion->prepare($orden);
        $resultado->bind_param("siiii", $codigo, $capacidadLejas, $lejasOcupadas, $pasillo, $numero);

        $codigo = $estanteria->getCodigo();
        $capacidadLejas = (int) $estanteria->getCapacidadLejas();
        $lejasOcupadas = (int) $estanteria->getLejasOcupadas();
        $pasillo = (int) $estanteria->getPasillo();
        $numero = $estanteria->getNumero();

        $resultado->execute();
        $esta = $conexion->affected_rows;
        $error;
        $codigoError;
        if ($esta < 1) {
            $error = $conexion->error;
            $codigoError = $conexion->errno;
            $conexion->rollback(); //vuelta atrás al punto anterior
            $conexion->autocommit(true); //volvemos a poner el autocommit automatico
            throw new ApplicationException("Error en insertar estanteria: ", $codigoError, $error);
            $todo_bien = false;
        }

        $orden2 = "UPDATE pasillo SET numerosOcupados=numerosOcupados+1 WHERE id=?";
        $resultado = $conexion->prepare($orden2);
        $resultado->bind_param("i", $pasillo);
        $resultado->execute();
        $esta = $conexion->affected_rows;
        if ($esta < 1) {
            $error = $conexion->error;
            $codigoError = $conexion->errno;
            $conexion->rollback(); //vuelta atrás al punto anterior
            $conexion->autocommit(true); //volvemos a poner el autocommit automatico
            throw new ApplicationException("Error en insertar estanteria: ", $codigoError, $error);
            $todo_bien = false;
        }
        $conexion->commit();
        return $esta; //asi devuelve -1 aunque lo haga
    }

    static function getLejasOcupadas($id) {  //CREO no lo utilizo puedo borrarlo
        global $conexion;
        $lejasArray = Array();
        $contador = 0;

        $orden = "SELECT numLeja FROM ocupacion WHERE id_estanteria='" . $id . "'"; //saca lejas ocupadas de una estanteria
        $resultado = $conexion->query($orden);

        if ($resultado->num_rows > 0) {
            foreach ($resultado as $fila) {
                $lejasArray = $fila;
                $contador++;
            }
        }

        $orden2 = "SELECT capacidadLejas FROM estanteria WHERE id='" . $id . "'";
        $capacidad = $conexion->query($orden2);

        if ($resultado->num_rows < $capacidad) {
            return $capacidad - $resultado->num_rows;
        }
    }

    //funcion debido a problema añadir id pasillo a estanteria, sacamos mediante fecthobject todo junto relacionado y devolvemos array de object
    static function getEstanteriasDisponiblesFetch() {
        global $conexion;
        $estanteriasDisponibles = Array();

        $orden = "SELECT e.id,e.codigo,e.numero,p.letra FROM estanteria e,pasillo p where e.capacidadLejas > e.lejasOcupadas AND e.pasillo=p.id"; //saca lejas ocupadas de una estanteria
        $resultado = $conexion->query($orden);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_object()) {
                $objeto = $row;
                $estanteriasDisponibles[] = $row;
            }
        }
        return $estanteriasDisponibles;
    }

    static function lejasDisponibles($id) {

        global $conexion;
        $ArrayLlenas;
        $ArrayDisponibles = Array();
        $capacidad = Array();
        //sacar las lejas ocupadas que tenemos segun el id
        $orden = "SELECT numLeja FROM ocupacion WHERE id_estanteria='" . $id . "'";
        $lejasLlenas = $conexion->query($orden);
        //metemos las lejas ocupadas que vienen en la fila en el array
        if ($lejasLlenas->num_rows > 0) {
            foreach ($lejasLlenas as $fila) {
                $ArrayLlenas[] = (int) $fila['numLeja'];
            }
        }
        //hacemos select para traer la capacidad que puede tener la estanteria segun id
        $orden = "SELECT capacidadLejas FROM estanteria WHERE id='" . $id . "'";
        $capacidadLimite = $conexion->query($orden);
        //metemos el resultado en la varibale capacidad, variable y no array porque solo trae un numero
        if ($capacidadLimite->num_rows > 0) {  //creo que es inutil
            foreach ($capacidadLimite as $fila) {
                $capacidad = (int) $fila['capacidadLejas'];
            }
        }
        //array que contiene las ocupadas en su posicion del array
        $nuevoArray = array();
        for ($i = 0; $i < count($ArrayLlenas); $i++) {
            $nuevoArray[$ArrayLlenas[$i]] = "$ArrayLlenas[$i]";
        }
        //segun la capacidad que tenga la estanteria preguntamos por las vacias, significa que esas lejas estan disponibles
        for ($i = 1; $i < $capacidad + 1; $i++) {
            if (empty($nuevoArray[$i])) {
                $ArrayDisponibles[] = $i; //i sera la posicion libre en a estanteria, guarddamos en el array
            }
        }
        return $ArrayDisponibles;
    }

    static function getPasillosDisponibles() {
        global $conexion;
        $arrayPasillos = Array();

        $orden = "SELECT p.id,p.letra FROM pasillo p, almacen a WHERE p.numerosOcupados < a.maximoNumeros";
        $resultado = $conexion->query($orden);


        if ($resultado->num_rows > 0) {
            foreach ($resultado as $fila) {
                $letra = $fila["letra"];
                $id = $fila["id"];

                $pasillo = new Pasillo($letra);
                $pasillo->setId($id);
                $arrayPasillos[] = $pasillo;
            }
        }
        return $arrayPasillos;
    }

    static function getNumerosDisponibles($idPasillo) {
        global $conexion;
        $numerosOcupados = Array();

        //numeros(numeros que ocupas las estanterias)que estan ocupados de un determinado pasillo
        $orden = "SELECT numero FROM estanteria  WHERE pasillo='" . $idPasillo . "'";

        $resultado = $conexion->query($orden);
        if ($resultado->num_rows > 0) {
            foreach ($resultado as $fila) {
                $numerosOcupados[] = (int) $fila["numero"];
            }
        }

        $orden = "SELECT maximoNumeros FROM almacen";
        $capacidad = $conexion->query($orden);
        $maximo = 0;
        if ($capacidad->num_rows > 0) {
            foreach ($capacidad as $maximoL) {
                $maximo = $maximoL["maximoNumeros"];
            }
        }

        //meto los numeros que estan ocupados en la posicion del array que ocupan realmente
        $nuevoArray = Array();
        for ($i = 0; $i < count($numerosOcupados); $i++) {
            $nuevoArray[$numerosOcupados[$i]] = "$numerosOcupados[$i]";
        }

        $ArrayDisponibles = Array();
        for ($i = 1; $i < $maximo + 1; $i++) {
            if (empty($nuevoArray[$i])) {
                $ArrayDisponibles[] = $i;
            }
        }
        return $ArrayDisponibles;
    }

    static function listarEstanteria() {
        global $conexion;
        $arrayEstanteria = array();

        //debido a que en pasillo de estanteria sta el id de pasillo y no la letra
        //necesitamos la letra por lo que unimos las dos tablas y sacamos la letra con fecth object
        $orden = "SELECT e.*,p.letra FROM estanteria e,pasillo p WHERE e.pasillo=p.id";
        $resultado = $conexion->query($orden);
        if ($resultado->num_rows > 0) { //si hay alguna fila
            while ($row = $resultado->fetch_object()) {
            $arrayEstanteria[] = $row;
          }
        }
        return $arrayEstanteria;
    }
    static function listarCaja() {
        global $conexion;
        $arrayCaja=array();

        
        $orden = "SELECT * FROM caja";
        $resultado = $conexion->query($orden);
        if ($resultado->num_rows > 0) { //si hay alguna fila
            foreach ($resultado as $value) {
            $codigo=$value["codigo"];
            $contenido=$value["contenido"];
            $material=$value["material"];
            $profundidad=$value["profundidad"];
            $ancho=$value["ancho"];
            $alto=$value["alto"];
            $color=$value["color"];
            $fecha=$value["fecha"];
            $obj=new Caja($codigo, $contenido, $material, $profundidad, $ancho, $alto, $color);
            $obj->setFecha($fecha);
            $arrayCaja[] = $obj;
          }
        }
        return $arrayCaja;
    }


    static function insertarCajaV4($caja, $ocupacion) {  //funciona 
        global $conexion;
        $todo_bien = true; //para comprobar que salió bien
        $conexion->autocommit(false); // Iniciamos la transacción asi no se hacen efectivos los cambios hasta que no confirmemos
        //insert a caja 
        $orden1 = "INSERT INTO caja VALUES(null,?,?,?,?,?,?,?,?)";
        $resultado = $conexion->prepare($orden1);
        $resultado->bind_param("sssdddss", $codigo, $contenido, $material, $profundidad, $alto, $ancho, $color, $fecha);
        //set a objeto fecha para registrar del dia que se inserta
        $caja->setFecha(date('Y-m-d'));
        //sacamos todos los datos del objeto caja
        $codigo = $caja->getCodigo();
        $contenido = $caja->getContenido();
        $material = $caja->getMaterial();
        $profundidad = $caja->getProfundidad();
        $ancho = $caja->getAncho();
        $alto = $caja->getAlto();
        $color = $caja->getColor();
        $fecha = $caja->getFecha();
        $resultado->execute();
        //si la orden devuelve un numero menor que 1 significa que no se ha hecho
        $error;
        $codigoError;
        if ($conexion->affected_rows < 1) {
            $error = $conexion->error; //guardamos el error producido
            $codigoError = $conexion->errno; //guardamos el cod error producido
            $conexion->rollback(); //vuelta atrás al punto anterior
            $conexion->autocommit(true); //volvemos a poner el autocommit automatico, no seria necesario pero es recomendable
            throw new ApplicationException("Error en insertar Caja: ", $codigoError, $error);
            $todo_bien = false; //ponemos la variable a false para indicar que no se ha realizado 
        }
        

        $orden2 = "INSERT INTO ocupacion VALUES(null,?,?,?)";
        $resultado = $conexion->prepare($orden2);
        $resultado->bind_param("iii", $idCajaUltimo, $idEstanteria, $leja);
        //sacamos el ultimo id que se ha metido en la tabla ( el de la caja de arriba si se realizó)
        $idCajaUltimo = $conexion->insert_id;
        //sacamos los datos de ocpacion
        $idEstanteria = $ocupacion->getId_estanteria();
        $leja = $ocupacion->getNumLeja();
        //insert a ocupacion
        $resultado->execute();


        //si el valor menor que 1 signifca que algo ha ido mal
        if ($conexion->affected_rows < 1) {
            $error = $conexion->error; //funciona
            $codigoError = $conexion->errno; //funciona
            $conexion->rollback(); //vuelta atrás al punto anterior
            $conexion->autocommit(true); //volvemos a poner el autocommit automatico, no seria necesario pero es recomendable
            throw new ApplicationException("Error en insertar Caja: ", $codigoError, $error);
            $todo_bien = false; //indicamos que ha ido mal
        }


        //actualizamos el valor de la columna lejasOcupadas donde toque añadiendo 1 
        $orden3 = "UPDATE estanteria SET lejasOcupadas=lejasOcupadas+1 WHERE id=?";
        $resultado = $conexion->prepare($orden3);
        $resultado->bind_param("i", $idEstanteria);
        $resultado->execute();
        //si menor que 1 algo ha ido mal
        if ($conexion->affected_rows < 1) {
            $error = $conexion->error; //funciona
            $codigoError = $conexion->errno; //funciona
            $conexion->rollback(); //vuelta atrás al punto anterior
            $conexion->autocommit(true); //volvemos a poner el autocommit automatico, no seria necesario pero es recomendable
            throw new ApplicationException("Error en insertar Caja: ", $codigoError, $error);
            $todo_bien = false; //lo indicamos con false
        }
        //usando where codigo=$codigo"; da fallo, no detecta bien.Con el metodo clasico va perfecto. Usar siempre metodo clasico!!
        $orden4="select * from caja_backup where codigo='" . $codigo . "'";
        $resultado=$conexion->query($orden4);
        if ($resultado->num_rows > 0) {
            $error="El código ya existe";
            $codigoError="1062";
            $conexion->rollback(); //vuelta atrás al punto anterior
            $conexion->autocommit(true); //volvemos a poner el autocommit automatico, no seria necesario pero es recomendable
            throw new ApplicationException("Error en insertar Caja: ", $codigoError, $error);
            $todo_bien=false;
        }

        $conexion->commit();
        // $conexion->autocommit(true); // no haria falta pero podriamos ponerlo para asegurarnos que vuelve a la normalidad

        return $todo_bien;
    }

    static function listarInventario() {
        $arrayInventario = Array();
        global $conexion;
        //select de todo para hacer fetch object
        $orden="SELECT DISTINCT *,e.id as estanteriaId,o.id as ocupacionId,c.id as cajaId,p.id as pasilloId,c.codigo as codigoCaja,e.codigo as estanteriaCodigo from estanteria e LEFT JOIN ocupacion o ON e.id=o.id_Estanteria LEFT JOIN caja c ON o.id_Caja=c.id LEFT JOIN pasillo p ON e.pasillo=p.id ORDER BY e.pasillo,e.numero ASC";
        $resultado = $conexion->query($orden);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_object()) {
                $arrayInventario[] = $row;
            }
        }
        return $arrayInventario;
    }
    static function datosSegunCodigoCaja($codigo){
        global $conexion;
        $query = "SELECT * FROM caja c,ocupacion o WHERE codigo like'".$codigo."%' AND c.id=o.id_caja LIMIT 3";  //liite 3 porque queda muy feo un autocomplete que cubre mucho la pantalla
        $result = $conexion->query($query);
 
        while($row = $result->fetch_array() ){
            //con la # tenia problemas, directamente ni aparecian las caja asi que guardo el color en una variable
          $color=$row['color'];
          //le quito la almohadilla al color y la guardo en el array (asi funciona)
          $color2= substr($color,1);
         $response[] = array("value"=>$row['id'],"label"=>$row['codigo'],"alto"=>$row['alto'],"ancho"=>$row['ancho'],"profundidad"=>$row['profundidad'],"contenido"=>$row['contenido'],"material"=>$row['material'],"color"=>$color2,"estanteria"=>$row['id_estanteria'],"leja"=>$row['numLeja']);
        }

        // encoding array to json format
       return json_encode($response);

    }
    static function ventaCaja($codigo){
        //meter consulta preparada
        global $conexion;
        $orden="DELETE FROM caja where codigo= '" . $codigo . "' ";
        $resultado=$conexion->query($orden);
        $filas=$conexion->affected_rows;
        if ($filas != 1) {
            throw new ApplicationException("Error en venta caja", 0,"La caja no ha podido ser vendida");
        }
        return $filas;
    }
    
     static function datosSegunCodigoCajaDevolucion($codigo){ //Es la que uso para autocomplete en devolucion
        global $conexion;
        $query = "SELECT * FROM caja_backup WHERE codigo like'".$codigo."%'";
        $result = $conexion->query($query);
 
        while($row = $result->fetch_array() ){
            //con la # tenia problemas, directamente ni aparecian las caja asi que guardo el color en una variable
          $color=$row['color'];
          //le quito la comilla al color y la guardo en el array
          $color2= substr($color,1);
         $response[] = array("value"=>$row['id'],"label"=>$row['codigo'],"alto"=>$row['alto'],"ancho"=>$row['ancho'],"profundidad"=>$row['profundidad'],"contenido"=>$row['contenido'],"material"=>$row['material'],"color"=>$color2,"estanteria"=>$row['codigoEstanteria'],"leja"=>$row['numLeja'],"fechaA"=>$row['fechaAlta']);
        }

        // encoding array to json format
       return json_encode($response);
//        exit;
    }
    

    static function devolucionCajaV2($cajaRetornada){
        //hacer la devolucion de caja mediante trigger php sobre caja backup
        //include_once ''; excepcion si quiero
        include_once '../MODELOS/CajaBackup.php';
        global $conexion;
         
        $cod=$cajaRetornada->getCodigo();

        include_once '../MODELOS/triggerDevolucionCaja.php';
        $conexion->autocommit(false);
        
        //vemos si hay algun registro en
        $orden="UPDATE caja_backup set fechaVuelta=curdate() WHERE codigo='".$cod."' AND fechaVuelta is null";

        //$orden="DELETE FROM caja_backup WHERE codigo='".$cod."'";
        $resultadoDelete=$conexion->query($orden);
        if ($conexion->affected_rows != 1) {
            $conexion->rollback();;
            $conexion->autocommit(true);
            throw new ApplicationException("Error en la devolucion: ", 0,"error en delete");
        }
        
        if ($resultadoDelete&&$resultadoBorrar&&$resultadoTrigger) {
            $conexion->commit();

        }else{
            $conexion->rollback();;
            $conexion->autocommit(true);
            throw new ApplicationException("Error", 0,"devolucion");
        }
    }
    
    static function registroUsuarioV2($nombre,$contraseña){  //probado y funciona
        global $conexion;
        $contraseñaEncriptada= password_hash($contraseña, PASSWORD_BCRYPT);
        $orden="INSERT INTO usuarios VALUES(null,?,?)";
        $resultado = $conexion->prepare($orden);
        $resultado->bind_param("ss", $nombre,$contraseñaEncriptada);
        $resultado->execute();
        if ($conexion->affected_rows != 1) {
            $error=$conexion->error;
            $codigoError=$conexion->errno;
            throw new ApplicationException("Error en registro de usuario ", $codigoError,$error);
        }
    }
    
    static function inicioSesion($nombre,$contraseña){
        global $conexion;
        
        $orden="SELECT contraseña FROM usuarios WHERE  nombre='".$nombre."'";
        $resultado=$conexion->query($orden);
        if ($resultado->num_rows < 1) {
            throw new ApplicationException("Error en login",0,"Usuario no existente");
        }else {
            foreach($resultado as $value){
             $contraseñaDB=$value["contraseña"];
            }
            $verify=password_verify($contraseña, $contraseñaDB);
            if (!$verify) {
                throw new ApplicationException("Error en login",1,"Contraseña incorrecta");
            }
        }

        return $verify;
        
    }
    
    static function revisionSiAlguienRegistrado(){
        global $conexion;
        $orden="SELECT * FROM usuarios";
        $resultado=$conexion->query($orden);
        if ($resultado->num_rows > 0) {
            return true;
        }else return false;
    }
    static function datosGenerales(){
        global $conexion;
        $orden="select * from almacen";
        $resultado=$conexion->query($orden);
        while($row=$resultado->fetch_object()){
            $datos=$row;
        }
        return $datos;
    }
    
    static function revisionSiHayEstanteria(){
        global $conexion;
        $orden="SELECT * FROM estanteria WHERE capacidadLejas > lejasOcupadas";
        $resultado=$conexion->query($orden);
        if ($resultado->num_rows) {
            return true;
        }else return false;
    }
    static function revisionSiHayCajas(){
        global $conexion;
        $orden="SELECT * FROM caja";
        $resultado=$conexion->query($orden);
        if ($resultado->num_rows) {
            return true;
        }else return false;
    }
    static function revisionSihayCajasBackUp(){
        global $conexion;
        $orden="SELECT * FROM caja_backup";
        $resultado=$conexion->query($orden);
        if ($resultado->num_rows) {
            return true;
        }else return false;
    }
    
    static function seguimientoDondeEsta($codigo){
        global $conexion;
        
        $orden="SELECT * FROM caja WHERE codigo='".$codigo."'";
        $resultado=$conexion->query($orden);
        if ($resultado->num_rows >0) {
            return 1;
        }
        
        $orden2="SELECT * FROM caja_backup WHERE codigo='".$codigo."'";
        $resultado2=$conexion->query($orden2);
        if ($resultado2->num_rows >0) {
            return 2;
        }
    }
    static function seguimientoDatos($donde,$codigo){
        global $conexion;
        $caja;
        $arrayDatos=array();
        
        if ($donde == 1) {
             $orden="SELECT * FROM caja where codigo='".$codigo."'";
             $resultado2=$conexion->query($orden);
             
             foreach($resultado2 as $fila){
                 $codigo=$fila["codigo"];
                 $contenido=$fila["contenido"];
                 $material=$fila["material"];
                 $profundidad=$fila["profundidad"];
                 $alto=$fila["alto"];
                 $ancho=$fila["ancho"];
                 $color=$fila["color"];
                 $caja=new caja($codigo,$contenido,$material,$profundidad,$alto,$ancho,$color);
                 $caja->setFecha($fila["fecha"]);
                 
             }
             $arrayDatos[]=$caja;
             
             
             
             //$orden2="SELECT * from o"
             return $caja;
        }else if ($donde == 2) {
            $orden="SELECT * FROM caja_backup where codigo='".$codigo."'";
            $resultado2=$conexion->query($orden);
            
            foreach($resultado2 as $fila){
                 $codigo=$fila["codigo"];
                 $contenido=$fila["contenido"];
                 $material=$fila["material"];
                 $profundidad=$fila["profundidad"];
                 $alto=$fila["alto"];
                 $ancho=$fila["ancho"];
                 $color=$fila["color"];
                 $caja=new caja_backup($codigo,$contenido,$material,$profundidad,$alto,$ancho,$color);
                 $caja->setFecha($fila["fecha"]);
                 
             }
             return $caja;
            
        }
       
    }
    
    static function seguimientoDatosV2($donde,$codigo){
        
        global $conexion;
        if ($donde == 1) {
            $orden="select *,c.codigo as codCaja from caja c,ocupacion o, estanteria e where c.id=o.id_caja AND o.id_estanteria=e.id AND c.codigo='".$codigo."'";
            $resultado=$conexion->query($orden);
         
         $datos;
         $datos=$resultado->fetch_object();
            return $datos;
        }else if ($donde == 2) {
            $orden="select * from caja_backup where codigo='".$codigo."' AND fechaBaja=(select MAX(fechaBaja) from caja_backup)";
            $resultado=$conexion->query($orden);
            $datos=$resultado->fetch_object();
          
            return $datos;
        }
    }
    
    static function contadorDevolucion($codigo){
        global $conexion;
        $orden="SELECT * from caja_backup where codigo='".$codigo."'";
        
        $resultado=$conexion->query($orden);
        $contador=$resultado->num_rows;
        return $contador;
    }
}
