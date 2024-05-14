<?php 
/**
 * La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, 
 * asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.
 */
class PasajeroNecesidadesEsp extends PasajeroEstandar{

    //!ATRIBUTOS
    private $sillaDeRuedas; //*Atributo booleano.
    private $asistDeEmbarque; //*Atributo booleano.
    private $comidasEsp;

    //!CONSTRUCTOR
    public function __construct($nombre, $apellido, $tipo, $dni, $numeroAsiento, $numeroTicket, $sillaDeRuedas, $asistDeEmbarque, $comidasEsp){
        parent:: __construct($nombre, $apellido, $tipo, $dni, $numeroAsiento, $numeroTicket);
            $this->sillaDeRuedas = $sillaDeRuedas;
            $this->asistDeEmbarque = $asistDeEmbarque;
            $this->comidasEsp = $comidasEsp;
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function get_sillaDeRuedas(){
        return $this->sillaDeRuedas;
     }

     public function get_asistDeEmbarque(){
        return $this->asistDeEmbarque;
     }

     public function get_comidasEsp(){
        return $this->comidasEsp;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */ 

     public function set_sillaDeRuedas($sillaDeRuedas){
        $this->sillaDeRuedas = $sillaDeRuedas;
     }

     public function set_asistDeEmbarque($asistDeEmbarque){
        $this->asistDeEmbarque = $asistDeEmbarque;
     }

     public function set_comidasEsp($comidasEsp){
        $this->comidasEsp = $comidasEsp;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        return parent:: __toString() . 
              "--------[NECESIDADES ESPECIALES]--------\n".
        "Silla de ruedas: " . $this->get_sillaDeRuedas() . "\n".
        "Asistencia de embarque: " . $this->get_asistDeEmbarque(). "\n" .
        "Comidas especiales: " . $this->get_comidasEsp() . "\n";
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     /**
      * Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje 
      * tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
      */

      public function darPorcentajeIncremento(){

        $porcentajeIncremento = 0;

            if ($this->get_sillaDeRuedas() == true && $this->get_asistDeEmbarque() == true && $this->get_comidasEsp() == true) {
                
                $porcentajeIncremento = 20 + parent::darPorcentajeIncremento(); //TODO: Se suma el 20 + el parent:: darPorcentajeIncremento() que da un resultado de 30
            }else {
                
                $porcentajeIncremento = 5 + parent::darPorcentajeIncremento(); //TODO: Se suma el 5 + el parent:: darPorcentajeIncremento() que da un resultado de 15
            }
            
        return $porcentajeIncremento;
      }

}