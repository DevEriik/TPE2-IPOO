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