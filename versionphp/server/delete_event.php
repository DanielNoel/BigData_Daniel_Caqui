<?php

require('lib.php');
$idevento = $_POST['id'];

$con = new ConectorBD('localhost', 'root', 'daniel');

if ($con->initConexion('bdExamenn') == 'OK') {
    if ($con->eliminarRegistro('evento', "idevento ='".$idevento."'")) {
        $response['msg'] = "Se eliminaron los registros exitosamente";
    } else {
        $response['msg'] = "Hubo un problema y los registros no fueron eliminados";
    }
} else {
    $response['msg'] = "Se presento el error en la conexión";
}
echo json_encode($response);
?>
 