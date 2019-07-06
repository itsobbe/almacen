<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pasillo
 *
 * @author owa_7
 */
class Pasillo {
    private $id;
    private $letra;
    private $numerosOcupados;
    
    
    function __construct($letra) {
        $this->letra = $letra;
    }
    
    function getId() {
        return $this->id;
    }

    function getLetra() {
        return $this->letra;
    }

    function getNumerosOcupados() {
        return $this->numerosOcupados;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLetra($letra) {
        $this->letra = $letra;
    }

    function setNumerosOcupados($numerosOcupados) {
        $this->numerosOcupados = $numerosOcupados;
    }



    
    
    
}
