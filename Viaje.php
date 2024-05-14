<?php 

class Viaje{
    // !ATRIBUTOS
    private $costoViaje;
    private $codigoDeViaje;
    private $destino;
    private $cantMaxPasajero; //Cantidad Maxima de pasajeros. 
    private $col_PasajerosViaje; // Coleccion de personas. 
    private $objResponsableVia; //Responsable del viaje (CHOFER)

    // !CONSTRUCTOR 
    public function __construct($costoViaje, $codigoDeViaje, $destino, $cantMaxPasajero, $col_PasajerosViaje, $objResponsableVia){
        $this->costoViaje = $costoViaje;
        $this->codigoDeViaje = $codigoDeViaje;
        $this->destino = $destino;
        $this->cantMaxPasajero = $cantMaxPasajero;
        $this->col_PasajerosViaje = $col_PasajerosViaje;
        $this->objResponsableVia = $objResponsableVia;
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function getCostoViaje(){
        return $this->costoViaje;
     }

     public function getCodigoDeViaje(){
        return $this->codigoDeViaje;
     }

     public function getDestino(){
        return $this->destino;
     }

     public function getCantMaxPasajero(){
        return $this->cantMaxPasajero;
     }

     public function getCol_PasajerosDelViaje(){
        return $this->col_PasajerosViaje;
     }

     public function getObjResponsableVia(){
         return $this->objResponsableVia;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function setNewCostoViaje($nuevoCosto){
        $this->costoViaje = $nuevoCosto;
     }

     public function setNewCodigoDeViaje($nuevoCodigoViaje){
        $this->codigoDeViaje = $nuevoCodigoViaje;
     }

     public function setNewDestino($nuevoDestino){
        $this->destino = $nuevoDestino;
     }

     public function setNewCantMaxPasajeros($nuevaCantMaxPasajeros){
        $this->cantMaxPasajero = $nuevaCantMaxPasajeros;
     }

     public function setNewPasajerosDelViaje($nuevoPasajerosDelViaje){
        $this->col_PasajerosViaje = $nuevoPasajerosDelViaje;
     }

     public function setNewObjResponsable($nuevoRespon){
         $this->objResponsableVia = $nuevoRespon;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */
    
     public function __toString(){
        return "+++++++++++++INFO VIAJE+++++++++++++++++++++++++\n".
               "Costo del viaje: $" . $this->getCostoViaje() . "\n" .
               "Codigo de viaje: " .$this->getCodigoDeViaje() . "\n" . 
               "Destino: " . $this->getDestino() . "\n" . 
               "Cantidad maxima de pasajeros: " .$this->getCantMaxPasajero() . "\n" . 
               "Pasajeros del viaje: \n" . $this->ConvertirEnString($this->getCol_PasajerosDelViaje()) . "\n" . 
               "Responsable del viaje: \n" . $this->getObjResponsableVia() . "\n";
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     public function verificarPasajero($dniPasajero){
         $existe = false;
         $colPasajero = $this->getCol_PasajerosDelViaje();
         $i = 0;
            while ($i < count($colPasajero) && $existe == false) {
               $dniPas =  $colPasajero[$i]->getDni();
               
                  if ($dniPas == $dniPasajero) {
                     $existe = true;
                  }
                  
               $i++;
            }
         return $existe;
      }

      public function setNewPasajero($objPasajero){
         $col_actual = $this->getCol_PasajerosDelViaje();
         array_push($col_actual, $objPasajero);
         $this->setNewPasajerosDelViaje($col_actual);
      }

      public function obtenerPasajero($dniPas){
         $colec_pasajeros = $this->getCol_PasajerosDelViaje();
         $i = 0;
         $pasajero = null;
            while ($i < count($colec_pasajeros)) {
               $dniPasajero = $colec_pasajeros[$i]->getDni();

                  if ($dniPas == $dniPasajero) {

                     $pasajero = $colec_pasajeros[$i];
                  }

               $i++;
            }
         return $pasajero;
      }

      //TODO:Funcion creada para poder convertir la coleccion de pasajeros y pasarla por le __toString.
      public function ConvertirEnString($array){
         $string = "";
         
            foreach ($array as $elem) {
               
               $string = $string . $elem . "\n";
            }
         return $string;
      }

      /**
        * implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros 
        * ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
        */

        public function venderPasaje($objPasajero){

         $colecPasajeros = $this->getCol_PasajerosDelViaje();
         $cantPasajeros = count($this->getCol_PasajerosDelViaje());
         $costoFinal = 0;
         $costoViaje = $this->getCostoViaje();
            if ($cantPasajeros < $this->getCantMaxPasajero()) {

               array_push($colecPasajeros, $objPasajero);
               $this->setNewCantMaxPasajeros($cantPasajeros + 1);
               $porcentaje = $objPasajero->darPorcentajeIncremento();
               $costoFinal =   $costoViaje + (($costoViaje * $porcentaje) / 100);
               $this->setNewCostoViaje($costoFinal);
            } 
         return $costoFinal;
        }

      /**
       * Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima 
       * de pasajeros y falso caso contrario
       */

       public function hayPasajeDisponible(){

         $cantPasajero = count($this->getCol_PasajerosDelViaje());
         $hayDisponibilidad = false;

            if ($cantPasajero < $this->getCantMaxPasajero()) {
               $hayDisponibilidad = true;
            }
         return $hayDisponibilidad;
       }























}