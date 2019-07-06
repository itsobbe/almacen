<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaBackup
 *
 * @author owa_7
 */
include_once 'Caja.php';
class CajaBackup extends Caja{
    private $numLeja;
    private $estanteria;
    private $fechaBaja;
    private $fechaVuelta;
    public function __construct($codigo, $contenido, $material, $profundidad, $ancho, $alto, $color,$estanteria,$leja) {
        parent::__construct($codigo, $contenido, $material, $profundidad, $ancho, $alto, $color);
        $this->estanteria=$estanteria;
        $this->numLeja=$leja;
        
    }
    function getNumLeja() {
        return $this->numLeja;
    }
    function getFechaVuelta() {
        return $this->fechaVuelta;
    }

    function setFechaVuelta($fechaVuelta) {
        $this->fechaVuelta = $fechaVuelta;
    }

        function getEstanteria() {
        return $this->estanteria;
    }

    function setNumLeja($numLeja) {
        $this->numLeja = $numLeja;
    }

    function setEstanteria($estanteria) {
        $this->estanteria = $estanteria;
    }


    function getFechaBaja() {
        return $this->fechaBaja;
    }

    function setFechaBaja($fechaBaja) {
        $this->fechaBaja = $fechaBaja;
    }


}
