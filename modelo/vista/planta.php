<?php
    include ('../Empleado.php');
    include "../Planta.php";
    include("../controlador/empleadoController.php");
    $empleado = new EmpleadoController();
    $data = $empleado->read(1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Planta</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/POO%20ACT-1/modelo/vista/contratista.php">Contratista</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-1 d-flex justify-content-center">
    <div class="card d-flex border border-primary" style="width: 50rem;">
        <div class="card-body">
        <?php
    for($n = 0; $n <count($data); $n++){
        $id_empleado =  $data[$n]['id'];
        $nombre_empleado = $data[$n]['nombre'];
        $apellido_empleado = $data[$n]['apellido'];
        $doc_empleado = $data[$n]['documento'];
        $tipo_empleado = $data[$n]['tipo_empleado'];
        $salario_empleado = $data[$n]['salario_basico'];
    }?>
    <h4>Calcular Salario Empleado</h4>
    <?php
    //Datos de Entrada Empleado de Planta
    /* $tipoEmpleado = "Planta";
    $identificacion="456";
    $nombre="Faustino Asptrilla";
    $cargo = "Gerente"; */
    $SueldoBasico = $salario_empleado;
    $valorExtras=345000;
    $deducciones=105000;
    //Creamos el objeto
    $objPlanta = new Planta($id_empleado,$nombre_empleado,$tipo_empleado);
    //modificamos atributos del empleado de planta
    
    $objPlanta->setSueldoBasico($SueldoBasico);
    $objPlanta->setValorExtras($valorExtras);
    $objPlanta->setDeducciones($deducciones);
    ?>

    <div class="form-group">
        <label for="">Id Empleado</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $id_empleado ?>" disabled><br>
        <label for="">Nombres Empleado</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $nombre_empleado .' ' .$apellido_empleado ?>" disabled><br>
        <label for="">Cargo Empleado</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $tipo_empleado ?>" disabled><br>
        <label for="">Sueldo Basico</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $salario_empleado ?>" disabled><br>
        <label for="">Valor Extras</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $objPlanta->getValorExtras() ?>" disabled><br>
        <label for="">Total Deducciones</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $objPlanta->getDeducciones() ?>" disabled><br>

    </div>
    <?php $objPlanta->calcularSalario();?>
    <h4>Resultados</h4>
    <label for="">Id Empleado</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $id_empleado ?>" disabled><br>
        <label for="">Nombres Empleado</label><br>
        <input  style="border-color:blue;"type="text" class="form-control" placeholder="<?php echo $nombre_empleado .' ' .$apellido_empleado ?>" disabled><br>
        <label for="">Cargo Empleado</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $tipo_empleado ?>" disabled><br>
        <label for="">Salrio Neto a Recibir</label><br>
        <input style="border-color:blue;" type="text" class="form-control" placeholder="<?php echo $objPlanta->getSalario()?>" disabled><br>
        </div>
    </div>
    </div>
<br>
</body>
</html>
