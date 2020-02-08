<?php
 require('lib.php');
  session_start();
  if (isset($_SESSION['username'])) {  //Comprobar si una variable está definida

    $con = new ConectorBD('localhost', 'root', 'daniel');
    if ($con->initConexion('bdExamenn')=='OK') {
      $resultado = $con->consultar(['usuario u'], ['e.hrInicio','e.fecInicio','e.fecFin','e.hrFin', 'e.titulo','e.idusuario'], "JOIN evento e ON e.idusuario=u.idusuario  WHERE u.login='".$_SESSION['username']."'");
      //echo $resultado;
      $fila = $resultado->fetch_assoc();
     // echo $fila;
     // echo json_encode($fila);

      $response['titulo']=$fila['titulo'];
    
      $resultado = $con->getEventoUser($fila['idusuario']);
           
            $i=0;
      while ($fila = $resultado->fetch_assoc()) {
        $response['eventos'][$i]['id'] = $fila['id'];
        $response['eventos'][$i]['title'] = $fila['titulo'];
        $response['eventos'][$i]['start'] = $fila['fecha_inicio'].' '.$fila['hora_inicio'];
        $response['eventos'][$i]['end'] = $fila['fecha_fin'].' '.$fila['hora_fin'];

              $i++;
      }
      
      $response['msg'] = "OK";

    }else {
      $response['msg'] = "No se pudo conectar a la Base de Datos";
    }
  }else {
    $response['msg'] = "No se ha iniciado una sesiónn";
  }

  echo json_encode($response);

 ?>
