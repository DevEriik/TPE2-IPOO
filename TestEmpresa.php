<?php 

include_once 'Persona.php';
include_once 'PasajeroEstandar.php';
include_once 'PasajeroVIP.php';
include_once 'PasajeroNecesidadesEsp.php';
include_once 'Viaje.php';

$objPasajeroEstandar = new PasajeroEstandar("Erick", "Gonzalez", "DNI", "43372217", "23", "123");
// echo $objPasajeroEstandar->darPorcentajeIncremento(); //*FUNCIONAN AL 100%

$objPasajeroVIP = new PasajeroVIP("Milagros", "Argañaraz", "DNI", "43372272", "24", "124", "456", "301");
// echo $objPasajeroVIP->darPorcentajeIncremento(); //*FUNCIONAN AL 100%

$objPasajeroNecesidades = new PasajeroNecesidadesEsp("Edgardo", "Suarez", "DNI", "25436647", "14", "478", true, true, true);
// echo $objPasajeroNecesidades->darPorcentajeIncremento(); //*FUNCIONAN AL 100%

$colecPasajeros = [$objPasajeroEstandar, $objPasajeroVIP, $objPasajeroNecesidades];

$objViaje = new Viaje("1500", "200", "Bahia Blanca", "4", $colecPasajeros, new Persona("Juan", "Ramirez", "DNI", "18584657"));

// echo $objViaje->venderPasaje($objPasajeroNecesidades);//*FUNCIONA AL 100%
// echo $objViaje->hayPasajeDisponible(); //*FUNCIONA AL 100%

//!MENU DE OPCIONES 
do {

        echo "\n\n\n------------[EMPRESA DE VIAJES]----------------\n";
                    echo "1. Verificar si se encuentra un pasajero. \n";
                    echo "2. Obtener información de un pasajero. \n";
                    echo "3. Verificar si hay pasajes disponible. \n";
                    echo "4. Vender Pasaje. \n";
                    echo "5. Salir. \n";
        echo "---------------------------------------------\n\n\n";    

    $opcion = readline("Ingrese una opcion: ");
        switch ($opcion) {
            case '1':
                $dniPasajero = readline("Ingrese el DNI del pasajero: \n");
        
                    if ($objViaje->verificarPasajero($dniPasajero) == true) {
                        echo "\n\n\n-----------[PASAJERO ENCONTRADO]-----------\n";
                        echo "El pasajero se encuentra en el viaje. \n";
                        echo "-------------------------------------------\n\n\n";

                    }else {
                        echo "\n\n\n-----------[PASAJERO NO ENCONTRADO]-----------\n";
                        echo "El pasajero no se encuentra en el viaje. \n";
                        echo "-------------------------------------------\n\n\n";
                    }
                break;
            case '2':
                $dniPasajero = readline("Ingrese el DNI del pasajero: \n");
    
                    if ($objViaje->verificarPasajero($dniPasajero) == true) {
                        
                        $pasajeroEncontrado = $objViaje->obtenerPasajero($dniPasajero);
                        echo "\n\n\n-----------------------------------------\n";
                        echo $pasajeroEncontrado;
                        echo "\n-----------------------------------------\n\n\n";

                    }else{
                        echo "\n\n\n---------[NO TENEMOS INFORMACION DEL PASAJERO INGRESADO]-------- \n\n\n";
                    }
                    
                break;
            case '3':
                if ($objViaje->hayPasajeDisponible() == true) {
                    echo "\n\n\n-----------[PASAJES DISPONIBLE]-----------\n";
                    echo "El viaje tiene pasajes disponible. \n";
                    echo "-------------------------------------------\n\n\n";
                }else {
                    echo "\n\n\n-----------[PASAJES NO DISPONIBLE]-----------\n";
                    echo "El viaje no tiene pasaje disponible. \n";
                    echo "-------------------------------------------\n\n\n";
                }
                break;
            case '4':
                if ($objViaje->hayPasajeDisponible() == true) {
                    echo "\n\n\n[INGRESE EL TIPO DE PASAJE QUE QUIERE ADQUIRIR] \n";
                    echo "1. Estandar. \n";
                    echo "2. VIP. \n";
                    echo "3. Necesidades Especiales. \n";
                    echo "4. Cancelar. \n";
                    $tipoPasaje = readline("Ingrese una opcion: ");

                        do {
                            switch ($tipoPasaje) {
                                case '1':
                                    $randomAsiento = random_int(1, 1000);
                                    $randomTicket = random_int(1, 1000);
                                    $nombrePasajero = readline("Ingrese el nombre del pasajero: \n");
                                    $apellidoPasajero = readline("Ingrese el apellido del pasajero: \n");
                                    $tipoIdentidad = readline("Ingrese el tipo de identidad del pasajero: \n");
                                    $dniPasajero = readline("Ingrese el DNI del pasajero: \n");
                                        if ($objViaje->verificarPasajero($dniPasajero) == false) {

                                            $objNuevoPasajeroEstandar = new PasajeroEstandar($nombrePasajero, $apellidoPasajero, $tipoIdentidad, $dniPasajero, $randomAsiento, $randomTicket);
                                            $objViaje->setNewPasajero($objNuevoPasajeroEstandar);
                                            echo "\n\n\n---------------------------------------------\n";
                                            echo "EL PASAJERO SE CARGO CON EXITO";
                                            echo "\n---------------------------------------------\n\n\n";
                                            
                                            
                                        }else{
                                            echo "\n\n\n---------------------------------------------\n";
                                            echo "El pasajero ya tiene un viaje activo";
                                            echo "\n---------------------------------------------\n\n\n";
                                        }
                                    break;
                                case '2':
                                    $randomAsiento = random_int(1, 1000);
                                    $randomTicket = random_int(1, 1000);
                                    $nombrePasajero = readline("Ingrese el nombre del pasajero: \n");
                                    $apellidoPasajero = readline("Ingrese el apellido del pasajero: \n");
                                    $tipoIdentidad = readline("Ingrese el tipo de identidad del pasajero: \n");
                                    $dniPasajero = readline("Ingrese el DNI del pasajero: \n");
                                    $randomViajeFrencuente = random_int(1, 10000);
                                    $randomCantMillas = random_int(1, 10000);
                                        if ($objViaje->verificarPasajero($dniPasajero) == false) {

                                            $objNuevoPasajeroVIP = new PasajeroVIP($nombrePasajero, $apellidoPasajero, $tipoIdentidad, $dniPasajero, $randomAsiento, $randomTicket, $randomViajeFrencuente, $randomCantMillas);
                                            $objViaje->setNewPasajero($objNuevoPasajeroVIP);
                                            echo "\n\n\n---------------------------------------------\n";
                                            echo "EL PASAJERO SE CARGO CON EXITO";
                                            echo "\n---------------------------------------------\n\n\n";
                                            
                                        }else{
                                            echo "\n\n\n---------------------------------------------\n";
                                            echo "El pasajero ya tiene un viaje activo";
                                            echo "\n---------------------------------------------\n\n\n";
                                        }
                                    break;
                                case '3':
                                    $randomAsiento = random_int(1, 1000);
                                    $randomTicket = random_int(1, 1000);
                                    $nombrePasajero = readline("Ingrese el nombre del pasajero: ");
                                    $apellidoPasajero = readline("Ingrese el apellido del pasajero: ");
                                    $tipoIdentidad = readline("Ingrese el tipo de identidad del pasajero: ");
                                    $dniPasajero = readline("Ingrese el DNI del pasajero: ");
                                    $requiereSillaDeRueda = strtolower(readline("Ingrese si requiere silla de rueda (Si/No): \n")); 
                                    $requiereAsistEmbarque = strtolower(readline("Ingrese si requiere asistencia de embarque (Si/No): \n")); 
                                    $requiereComidaEsp = strtolower(readline("Ingrese si requiere comida especial (Si/No): \n")); 
                                    /**
                                     * *Aca paso los si/no a true o false. 
                                     */
                                        if ($requiereSillaDeRueda == "si") {
                                            $requiereSillaDeRueda = true;
                                        }elseif ($requiereSillaDeRueda == "no") {
                                            $requiereSillaDeRueda = false;
                                        }

                                        if ($requiereAsistEmbarque == "si") {
                                            $requiereAsistEmbarque = true;
                                        }elseif ($requiereAsistEmbarque == "no") {
                                            $requiereAsistEmbarque = false;
                                        }

                                        if ($requiereComidaEsp == "si") {
                                            $requiereComidaEsp = true;
                                        }elseif ($requiereComidaEsp == "no") {
                                            $requiereComidaEsp = false;
                                        }

                                            if ($objViaje->verificarPasajero($dniPasajero) == false) {

                                                $objNuevoPasajeroNecesEsp = new PasajeroNecesidadesEsp($nombrePasajero, $apellidoPasajero, $tipoIdentidad, $dniPasajero, $randomAsiento, $randomTicket, $requiereSillaDeRueda, $requiereAsistEmbarque, $requiereComidaEsp);
                                                $objViaje->setNewPasajero($objNuevoPasajeroNecesEsp);
                                                echo "\n\n\n---------------------------------------------\n";
                                                echo "EL PASAJERO SE CARGO CON EXITO";
                                                echo "\n---------------------------------------------\n\n\n";
                                                
                                            }else {
                                                echo "\n\n\n---------------------------------------------\n";
                                                echo "El pasajero ya tiene un viaje activo";
                                                echo "\n---------------------------------------------\n\n\n";
                                            }
                                    break;
                                case '4':
                                    echo "\n\n\n---------------------------------------------\n";
                                    echo "CANCELANDO...";
                                    echo "\n---------------------------------------------\n\n\n";
                                    break;
                                default:
                                    echo "\n\n\n---------------------------------------------\n";
                                    echo "LA OPCION INGRESADA ES INVALIDA";
                                    echo "\n---------------------------------------------\n\n\n";
                                    break;
                            }
                            break;
                        } while ($tipoPasaje != 4);
                    
                }else{
                    echo "\n\n\n---------------------------------------------\n";
                    echo "EL VIAJE NO TIENE PASAJE DISPONIBLE";
                    echo "\n---------------------------------------------\n\n\n";
                }
                break;
            case '5':
                echo "\n\n\n---------------------------------------------\n";
                echo "SALIENDO...";
                echo "\n---------------------------------------------\n\n\n";
                break;
            default:
                echo "\n\n\n---------------------------------------------\n";
                echo "LA OPCION INGRESADA ES INVALIDA";
                echo "\n---------------------------------------------\n\n\n";
            break;
                
        }
} while ($opcion != 5);