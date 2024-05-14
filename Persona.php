<?php

class Persona{
    // !ATRIBUTOS
    private $nombre;
    private $apellido;
    private $tipo;
    private $dni;

    // !CONSTRUCTOR 
    public function __construct($nombre, $apellido, $tipo, $dni){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipo = $tipo;
        $this->dni = $dni;
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function getNombre(){
        return $this->nombre;
     }

     public function getApellido(){
        return $this->apellido;
     }

     public function getTipo(){
        return $this->tipo;
     }

     public function getDni(){
         return $this->dni;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function setNewNombre($nuevoNombre){
        $this->nombre = $nuevoNombre;
     }

     public function setNewApellido($nuevoApellido){
        $this->apellido = $nuevoApellido;
     }

     public function setNewTipo($tipo){
        $this->tipo = $tipo;
     }

     public function setNewDni($dni){
         $this->dni = $dni;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        return
                  "Nombre: " .$this->getNombre(). "\n" . 
                  "Apellido: " . $this->getApellido() . "\n" . 
                  "Tipo: " .$this->getTipo() . "\n" . 
                  "Numero DNI: " . $this->getDni() . "\n";
    }
}