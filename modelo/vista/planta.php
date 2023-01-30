<?php
include ('../Empleado.php');
include "../Planta.php";
echo "Calcular Salario Empleado";
echo "<br>";
//Datos de Entrada Empleado de Planta
$tipoEmpleado = "Planta";
$identificacion="456";
$nombre="Faustino Asptrilla";
$cargo = "Gerente";
$SueldoBasico = 4500000;
$valorExtras=345000;
$deducciones=1098000;
//Creamos el objeto
$objPlanta = new Planta($identificacion,$nombre,$cargo);
//modificamos atributos del empleado de planta
$objPlanta->setSueldoBasico($SueldoBasico);
$objPlanta->setValorExtras($valorExtras);
$objPlanta->setDeducciones($deducciones);
//imprimimos datos de entrada
echo "<br>id Empleado: " . $objPlanta->getIdentificacion();
echo "<br>Nombree Empleado: " . $objPlanta->getNombre();
echo "<br>Cargo Empleado: " . $objPlanta->getCargo();
echo "<br>Sueldo Basico: $" . $objPlanta->getSueldoBasico();
echo "<br>Valor Extras: $" . $objPlanta->getValorExtras();
echo "<br>Total Deducciones: $" . $objPlanta->getDeducciones();
echo "<br> <br> RESULTADOS <BR><BR>";
//calculam os el salario del empleado de planta
$objPlanta->calcularSalario();
//Mostramos resultados
echo "<br>id Empleado: " . $objPlanta->getIdentificacion();
echo "<br>Nombree Empleado: " . $objPlanta->getNombre();
echo "<br>Cargo Empleado: " . $objPlanta->getCargo();
echo "<br>Salario Neto a Recibir: $" . $objPlanta->getSalario();
?>