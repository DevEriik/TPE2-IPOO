<?php 

/**
 * La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero.
 */
class PasajeroVIP extends PasajeroEstandar{

    //!ATRIBUTOS
    private $numeroViajeFrecuente;
    private $cantMillasPasajero;

    //!CONSTRUCTOR 
    public function __construct($nombre, $apellido, $tipo, $dni, $numeroAsiento, $numeroTicket, $numeroViajeFrecuente, $cantMillasPasajero){
        parent::__construct($nombre, $apellido, $tipo, $dni, $numeroAsiento, $numeroTicket);
            $this->numeroViajeFrecuente = $numeroViajeFrecuente;
            $this->cantMillasPasajero = $cantMillasPasajero;        
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function get_numeroViajeFrecuente(){
        return $this->numeroViajeFrecuente;
     }

     public function get_cantMillasPasajero(){
        return $this->cantMillasPasajero;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function set_numeroViajeFrecuente($numeroViajeFrecuente){
        $this->numeroViajeFrecuente = $numeroViajeFrecuente;
     }

     public function set_cantMillasPasajero($cantMillasPasajero){
        $this->cantMillasPasajero = $cantMillasPasajero;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        return parent:: __toString() . 
                "----------[VIP]----------\n" .
        "Numero de viaje frecuente: " . $this->get_numeroViajeFrecuente() . "\n" . 
        "Cantidad Millas Pasajero: " . $this->get_cantMillasPasajero() . " KM\n";
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     /**
      * Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza 
      * un incremento del 30%.
      */

      public function darPorcentajeIncremento(){

        $porcentajeIncremento = 0;

            if ($this->get_cantMillasPasajero() > 300) {
                $porcentajeIncremento = 20 + parent:: darPorcentajeIncremento(); //TODO: Se suma el 20 + el parent:: darPorcentajeIncremento() que da un resultado de 30
            }else {
                $porcentajeIncremento = 25 + parent:: darPorcentajeIncremento();//TODO: Se suma el 25 + el parent:: darPorcentajeIncremento() que da un resultado de 35
            }

        return $porcentajeIncremento;
      }

}