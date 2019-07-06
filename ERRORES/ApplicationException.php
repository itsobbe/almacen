<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InsertarCajaException
 *
 * @author owa_7
 */
class ApplicationException extends Exception{
    

    private $mensajeTecnico;
//    private $valorError;
    public function __construct($message,$code=0,$mensajeTecnico) { //he borrado $valor 
        
        parent::__construct($message,$code);
        $this->mensajeTecnico=$mensajeTecnico;
//        $this->valorError=$valor;
    }
    public function __toString() {
        global $mensajeTecnico;

        return __CLASS__.":[".$this->code."]: ".$this->message.": ".$this->mensajeTecnico;
    }
}
