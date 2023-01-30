<?php
include('../Empleado.php');
include "../Contratista.php";
include("../controlador/empleadoController.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Contratista</title>
</head>

<body >
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Calculardora</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Planta</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card d-flex border border-primary" style="width: 50rem;">
            <div class="card-body ">
                <h4><?php
                        echo "Calcular Salario Empleado Contratista : ";
                        echo "<br>";
                        
                ?></h4> 
               
                <?php
                $empleado = new EmpleadoController();

                $data = $empleado->read(2);

                for ($n = 0; $n < count($data); $n++) {
                    $id_empleado =  $data[$n]['id'];
                    $nombre_empleado = $data[$n]['nombre'];
                    $apellido_empleado = $data[$n]['apellido'];
                    $doc_empleado = $data[$n]['documento'];
                    $tipo_empleado = $data[$n]['tipo_empleado'];
                    $salario_empleado = $data[$n]['salario_basico'];
                }

                //Datos de Entrada Empleado Contratista

                /* $tipoEmpleado = "Contratista";
            $identificacion = "123";
            $nombre = "Angie Cepeda";
            $cargo = "Secretaria"; */

                $totalHorasTrabajadas = 160;
                //Creamos el objeto
                $objContratista = new Contratista($id_empleado, $nombre_empleado, $tipo_empleado);

                //$objContratista = new Contratista($identificacion,$nombre,$cargo);
                //modificamos atributos del empleado de Contrato
                $objContratista->setvalorHora(4000);
                $objContratista->setTotalHoras($totalHorasTrabajadas);
                //imprimimos datos de entrada
                ?>
                <div class="form group"> 
                    <label for="">Id Empleado</label>
                <?php
                echo $id_empleado;
                echo "<br> <br>Nombres Empleado: " . $nombre_empleado . " " . $apellido_empleado;
                echo "<br> <br>Cargo Empleado: " . $tipo_empleado;
                echo "<br> <br>Valor de la Hora: $" . $objContratista->getValorHora();
                echo "<br> <br>Total Horas Trabajas en el Mes: " . $objContratista->getTotalHoras();
                ?>
                </div>
                <?php
                //calculam os el salario del empleado de Contrato
                $objContratista->calcularSalario(4000, $totalHorasTrabajadas);?>
                                <h4><?php
                        echo " <br> Resultados: <br>";
                        
                ?></h4>
                <?php

                //Mostramos resultados
                echo "<br><br>Id Empleado: " . $id_empleado;
                echo "<br><br>Nombres Empleado: " . $nombre_empleado . " " . $apellido_empleado;
                echo "<br><br>Cargo Empleado: " . $tipo_empleado;
                echo "<br><br>Salario Neto a recibir en el Mes: " . $objContratista->getSalario();
                ?>
            </div>
        </div>
    </div>

</body>

</html>