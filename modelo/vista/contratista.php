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

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="planta.php">Planta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-1 d-flex justify-content-center mb-3">
        <div class="card d-flex border border-success shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 50rem;">
            <div class="card-body mb-3">
                <h4>Calcular Salario Empleado Contratista</h4>
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
                    <div class="row mt-4">
                        <div class="col-lg-6 ">
                            <label for="idEmpleado">Id Empleado</label> 
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-3" placeholder=<?php echo $id_empleado ?> disabled> 
                            <label for="idEmpleado">Nombres Empleado</label> 
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-3" placeholder="<?php echo $nombre_empleado . ' ' . $apellido_empleado ?>" disabled> 
                            <label for="idEmpleado">Cargo Empleado</label> 
                        </div>
                        <div class="col-lg-6">
                            <label for="idEmpleado">Valor de la Hora</label> 
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-3" placeholder=<?php echo $objContratista->getValorHora() ?> disabled> 
                            <label for="idEmpleado">Total Horas Trabajas en el Mes</label> 
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-3" placeholder=<?php echo $objContratista->getTotalHoras() ?> disabled> 
                        </div>
                        <div class="col-lg-12">
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-3" placeholder=<?php echo $tipo_empleado ?> disabled> 
                        </div>
                    </div>
                </div>
                <?php
                //calculam os el salario del empleado de Contrato
                $objContratista->calcularSalario(4000, $totalHorasTrabajadas); ?>
                <h4 class="mt-2 mb-1"> Resultados: </h4>
                
                <div class="form group">
                    <div class="row">
                        <div class="col-lg-6 mt-4">
    
                            <label for="idEmpleado">Id Empleado</label>
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-3" placeholder=<?php echo $id_empleado ?> disabled> 
                            <label for="idEmpleado">Nombres Empleado</label>
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-1" placeholder="<?php echo $nombre_empleado . ' ' . $apellido_empleado ?>" disabled> 
                        </div>
                        <div class="col-lg-6 mt-4">
    
                            <label for="idEmpleado">Cargo Empleado</label> 
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-3" placeholder=<?php echo $tipo_empleado ?> disabled> 
                            <label for="idEmpleado">Salario Neto a recibir en el Mes</label> 
                            <input style="border-color:green;" type="text" class="form-control mt-1 mb-1" placeholder=<?php echo $objContratista->getSalario() ?> disabled> 
                        </div>
                    </div>

                </div>
            </>
        </div>
    </div>
</body>
</html>