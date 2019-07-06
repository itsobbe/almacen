<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caja
 *
 * @author owa_7
 */
class Caja {

    private $id;
    private $codigo;
    private $contenido;
    private $material;
    private $profundidad;
    private $ancho;
    private $alto;
    private $color;
    private $fecha;

    function __construct($codigo, $contenido, $material, $profundidad, $ancho, $alto, $color) {
        $this->codigo = $codigo;
        $this->contenido = $contenido;
        $this->material = $material;
        $this->profundidad = $profundidad;
        $this->ancho = $ancho;
        $this->alto = $alto;
        $this->color = $color;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getMaterial() {
        return $this->material;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function getAncho() {
        return $this->ancho;
    }

    function getAlto() {
        return $this->alto;
    }
    function getFecha() {
        return $this->fecha;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function getColor() {
        return $this->color;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    function setAlto($alto) {
        $this->alto = $alto;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function getId() {
        return $this->id;
    }

    public function __toString() {
        
    }

}
