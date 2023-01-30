<?php
    include ('../Empleado.php');
    include "../Planta.php";
    include("../controlador/empleadoController.php");
    $empleado = new EmpleadoController();
    
    
    $data = $empleado->read(1);

    for($n = 0; $n <count($data); $n++){
        $id_empleado =  $data[$n]['id'];
        $nombre_empleado = $data[$n]['nombre'];
        $apellido_empleado = $data[$n]['apellido'];
        $tipo_empleado = $data[$n]['tipo_empleado'];
        $salario_empleado = $data[$n]['salario_basico'];
    }
    echo "Calcular Salario Empleado";
    echo "<br>";
    
    //Datos de Entrada Empleado de Planta
    /* $tipoEmpleado = "Planta";
    $identificacion="456";
    $nombre="Faustino Asptrilla";
    $cargo = "Gerente"; */
    $SueldoBasico = 4500000;
    $valorExtras=345000;
    $deducciones=1098000;
    //Creamos el objeto
    $objPlanta = new Planta($id_empleado,$nombre_empleado,$tipo_empleado);
    //modificamos atributos del empleado de planta
    
    $objPlanta->setSueldoBasico($SueldoBasico);
    $objPlanta->setValorExtras($valorExtras);
    $objPlanta->setDeducciones($deducciones);
    //imprimimos datos de entrada
    echo "<br>id Empleado: " . $id_empleado;
    echo "<br>Nombree Empleado: " . $nombre_empleado;
    echo "<br>Cargo Empleado: " . $tipo_empleado;
    echo "<br>Sueldo Basico: $" . $salario_empleado;
    echo "<br>Valor Extras: $" . $objPlanta->getValorExtras();
    echo "<br>Total Deducciones: $" . $objPlanta->getDeducciones();
    echo "<br> <br> RESULTADOS <BR><BR>";
    //calculamos el salario del empleado de planta
    $objPlanta->calcularSalario();
    //Mostramos resultados
    echo "<br>id Empleado: " . $objPlanta->getIdentificacion();
    echo "<br>Nombree Empleado: " . $objPlanta->getNombre();
    echo "<br>Cargo Empleado: " . $objPlanta->getCargo();
    echo "<br>Salario Neto a Recibir: $" . $objPlanta->getSalario();
?>