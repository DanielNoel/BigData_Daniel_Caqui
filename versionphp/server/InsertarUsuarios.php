<?php

//Conexion
  require('lib.php');

//Proceso de ingreso

$con = new ConectorBD();
  if ($con->initConexion('bdExamen')=='OK') {
    $conexion = $con->getConexion();

    $insert = $conexion->prepare('INSERT INTO usuario(idusuario, nombusuario, login, passw, fecNac) VALUES (?,?,?,?,?)');
    $insert->bind_param("issss", $idusario, $nombusuario, $login, $passw, $fecnac);

    $idusuario = 1;
    $nombusuario = 'Daniel Caqui';
    $login = 'caqui.g@mail.com';
    $passw=md5('12');
    $fecnac = '1994-12-12';
    $insert->execute();
    
        $idusuario = 2;
    $nombusuario = 'Noel Mejia';
    $login = 'mejia.g@mail.com';
     $passw=md5('12');
    $fecnac = '1998-10-14';
    $insert->execute();
  
    $idusuario = 3;
    $nombusuario = 'Miguel Grau';
    $login = 'miguel.g@mail.com';
     $passw=md5('12');
    $fecnac = '1993-10-14';
    $insert->execute();

    echo "Se insertaron los registros exitosamente";

    $con->cerrarConexion();

  }else {
    echo "Se presentó un error en la conexión";
  }





?>