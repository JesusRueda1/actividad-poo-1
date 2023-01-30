<?php
include ('../Empleado.php');
include "../Contratista.php";
include("../controlador/empleadoController.php");

$empleado = new EmpleadoController();

$data = $empleado->read(2);

for($n = 0; $n <count($data); $n++){
    $id_empleado =  $data[$n]['id'];
    $nombre_empleado = $data[$n]['nombre'];
    $apellido_empleado = $data[$n]['apellido'];
    $doc_empleado = $data[$n]['documento'];
    $tipo_empleado = $data[$n]['tipo_empleado'];
    $salario_empleado = $data[$n]['salario_basico'];
}

//Datos de Entrada Empleado Contratista
echo "Calcular Salario Empleado Contratista ";
echo "<br>";

/* $tipoEmpleado = "Contratista";
$identificacion = "123";
$nombre = "Angie Cepeda";
$cargo = "Secretaria"; */

$totalHorasTrabajadas = 160;
//Creamos el objeto
$objContratista = new Contratista($id_empleado,$nombre_empleado,$tipo_empleado);

//$objContratista = new Contratista($identificacion,$nombre,$cargo);
//modificamos atributos del empleado de Contrato
$objContratista->setvalorHora(4000);
$objContratista->setTotalHoras($totalHorasTrabajadas);
//imprimimos datos de entrada
echo "<br>id Empleado: " . $id_empleado;
echo "<br>Nombres Empleado: " . $nombre_empleado." ".$apellido_empleado;
echo "<br>Cargo Empleado: " . $tipo_empleado;
echo "<br>Valor de la Hora: $" . $objContratista->getValorHora();
echo "<br>Total Horas Trabajas en el Mes: " . $objContratista->getTotalHoras();
echo "<br> <br> RESULTADOS <BR><BR>";
//calculam os el salario del empleado de Contrato
$objContratista->calcularSalario(4000,$totalHorasTrabajadas);
//Mostramos resultados
echo "<br>id Empleado: " . $id_empleado;
echo "<br>Nombree Empleado: " . $nombre_empleado." ".$apellido_empleado;
echo "<br>Cargo Empleado: " . $tipo_empleado;
echo "<br>Salario Neto a recibir en el Mes: " . $objContratista->getSalario();
?>