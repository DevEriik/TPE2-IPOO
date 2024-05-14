<?php 

/**
 * La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje
 */

class PasajeroEstandar extends Persona{

    //!ATRIBUTOS 
    private $numeroAsiento;
    private $numeroTicket; //*Numero del pasaje del viaje.

    //!CONSTRUCTOR
    public function __construct($nombre, $apellido, $tipo, $dni, $numeroAsiento, $numeroTicket){
        parent::__construct($nombre, $apellido, $tipo, $dni);
        $this->numeroAsiento = $numeroAsiento;
        $this->numeroTicket = $numeroTicket;
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function get_numeroAsiento(){
        return $this->numeroAsiento;
     }

     public function get_numeroTicket(){
        return $this->numeroTicket;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function set_numeroAsiento($numeroAsiento){
        $this->numeroAsiento = $numeroAsiento;
     }

     public function set_numeroTicket($numeroTicket){
        $this->numeroTicket = $numeroTicket;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        
        return "-----------[PASAJERO]----------\n" . 
        parent:: __toString() . 
        "Numero Asiento: " . $this->get_numeroAsiento() . "\n" . 
        "Numero Ticket: " . $this->get_numeroTicket() . "\n";

     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     /**
       * Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características 
       * del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza 
       * un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje 
       * tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros 
       * comunes el porcentaje de incremento es del 10 %.
       */

       public function darPorcentajeIncremento(){

        $porcentajeIncremento = 10;
            
        return $porcentajeIncremento;
       }
}