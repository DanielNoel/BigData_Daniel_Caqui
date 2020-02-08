<?php

require('lib.php');

$idevento = "'" . $_POST['id'] . "'";
$data['fecInicio'] = "'" . $_POST['start_date'] . "'";
$data['hrInicio'] = "'" . $_POST['start_hour'] . "'";
$data['fecFin'] = "'" . $_POST['end_date'] . "'";
$data['hrFin'] = "'" . $_POST['end_hour'] . "'";

$con = new ConectorBD('localhost', 'root', 'daniel');
if ($con->initConexion('bdExamenn') == 'OK') {
    if ($con->actualizarRegistro('evento', $data, "idevento=".(intval($idevento)))) {
        $response['msg'] = "Se han actualizado los datos correctamente";
    } else {
        $response['msg'] = "Se ha producido un error en la actualización";
    }
} else {
    $response['msg'] = "Se presento el error en la conexión";
}
echo json_encode($response);
?>
