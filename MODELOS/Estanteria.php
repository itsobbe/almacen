<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estanteria
 *
 * @author owa_7
 */
class Estanteria {
    private $id;
    private $codigo;
    private $capacidadLejas;
    private $lejasOcupadas;
    private $pasillo;
    private $numero;
//    private $lejas=Array();  //revisar!!
    
    function __construct($codigo, $capacidadLejas, $lejasOcupadas,$pasillo, $numero) { //quietado  cp,
        $this->codigo = $codigo;
        $this->capacidadLejas = $capacidadLejas;
        $this->pasillo = $pasillo;
        $this->numero = $numero;
        //$this->lejas=Array($capacidadLejas);
        $this->lejasOcupadas=$lejasOcupadas;
    }
    function setId($id) {
        $this->id = $id;
    }

        function getCodigo() {
        return $this->codigo;
    }

    function getCapacidadLejas() {
        return $this->capacidadLejas;
    }

    function getLejasOcupadas() {
        return $this->lejasOcupadas;
    }

    function getPasillo() {
        return $this->pasillo;
    }

    function getNumero() {
        return $this->numero;
    }

    function getLejas() {
        return $this->lejas;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCapacidadLejas($capacidaLejas) {
        $this->capacidaLejas = $capacidaLejas;
    }

    function setLejasOcupadas($lejasOcupadas) {
        $this->lejasOcupadas = $lejasOcupadas;
    }

    function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setLejas($lejas) {
        $this->lejas = $lejas;
    }

    function getId() {
        return $this->id;
    }


}
