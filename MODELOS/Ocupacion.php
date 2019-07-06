<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ocupacion
 *
 * @author owa_7
 */
class Ocupacion {
    private $id;
    private $id_caja;
    private $id_estanteria;
    private $numLeja;
    
    function __construct($id_caja, $id_estanteria, $numLeja) {
        $this->id_caja = $id_caja;
        $this->id_estanteria = $id_estanteria;
        $this->numLeja = $numLeja;
    }

    function getId() {
        return $this->id;
    }

    function getId_caja() {
        return $this->id_caja;
    }

    function getId_estanteria() {
        return $this->id_estanteria;
    }

    function getNumLeja() {
        return $this->numLeja;
    }


    function setId_caja($id_caja) {
        $this->id_caja = $id_caja;
    }

    function setId_estanteria($id_estanteria) {
        $this->id_estanteria = $id_estanteria;
    }

    function setNumLeja($numLeja) {
        $this->numLeja = $numLeja;
    }


}
