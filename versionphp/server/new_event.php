<?php
 session_start();
require('lib.php');
$data['titulo'] = "'" . $_POST['titulo'] . "'";
$data['fecInicio'] = "'" . $_POST['start_date'] . "'";
$data['hrInicio'] = "'" . $_POST['start_hour'] . "'";
$data['fecFin'] = "'" . $_POST['end_date'] . "'";
$data['hrFin'] = "'" . $_POST['end_hour'] . "'";
if ($_POST['allDay'] == true) {
    $data['diaEntero'] = 0;
} else {
    $data['diaEntero'] = 1;
}
// $data['idusuario'] = 1;
 //$_SESSION['username']='caqui.g@mail.com';
$username= $_SESSION['username'];
//echo $username;
$con = new ConectorBD('localhost', 'root', 'daniel');

if ($con->initConexion('bdExamenn') == 'OK') {
    $res = $con->getIduser($username);
    foreach($res as $re) {
        $data['idusuario'] = $re['idusuario'];
    }


    if ($con->insertData('evento', $data)) {
        $response['msg'] = "exito en la inserción";
    } else {
        $response['msg'] = "Hubo un error y los datos no han sido cargados";
    }
} else {
    $response['msg'] = "No se pudo conectar a la base de datos";
}
  echo json_encode($response);
?>
