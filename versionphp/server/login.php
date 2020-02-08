<?php

require('./lib.php');

$con = new ConectorBD('localhost', 'root', 'daniel');

$response['conexion'] = $con->initConexion('bdExamenn');

if ($response['conexion'] == 'OK') {
   $resultado_consulta = $con->consultar(['usuario'], ['login', 'passw'], 'WHERE login="' . $_POST['username'] . '" AND passw="' . md5($_POST['passw']) . '"');

    if ($resultado_consulta->num_rows != 0) {
         $response['acceso'] = 'concedido'; 
        session_start();
     $_SESSION["username"] = $_POST['username'];
     
      } else
        $response['acceso'] = 'rechazado';
     
}

echo json_encode($response);

$con->cerrarConexion();
?>
