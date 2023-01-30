<?php
include ('../Empleado.php');
include "../Contratista.php";
//Datos de Entrada Empleado Contratista
echo "Calcular Salario Empleado Contratista ";
echo "<br>";
$tipoEmpleado = "Contratista";
$identificacion = "123";
$nombre = "Angie Cepeda";
$cargo = "Secretaria";
$totalHorasTrabajadas = 160;
//Creamos el objeto
$objContratista = new Contratista($identificacion,$nombre,$cargo);
//modificamos atributos del empleado de Contrato
$objContratista->setvalorHora(4000);
$objContratista->setTotalHoras($totalHorasTrabajadas);
//imprimimos datos de entrada
echo "<br>id Empleado: " . $objContratista->getIdentificacion();
echo "<br>Nombree Empleado: " . $objContratista->getNombre();
echo "<br>Cargo Empleado: " . $objContratista->getCargo();
echo "<br>Valor de la Hora: $" . $objContratista->getValorHora();
echo "<br>Total Horas Trabajas en el Mes: " . $objContratista->getTotalHoras();
echo "<br> <br> RESULTADOS <BR><BR>";
//calculam os el salario del empleado de Contrato
$objContratista->calcularSalario(4000,$totalHorasTrabajadas);
//Mostramos resultados
echo "<br>id Empleado: " . $objContratista->getIdentificacion();
echo "<br>Nombree Empleado: " . $objContratista->getNombre();
echo "<br>Cargo Empleado: " . $objContratista->getCargo();
echo "<br>Salario Neto a recibir en el Mes: " . $objContratista->getSalario();
?>