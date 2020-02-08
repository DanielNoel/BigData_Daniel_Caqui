<?php
  //Este archivo debe ser creado desde cero en la captura
  require('lib.php');

  $nombreTabla = 'usuarioss';
  $props['idusuario']= 'INT';
  $props['nombusuario']= 'VARCHAR(45)';
  $props['login']= 'VARCHAR(20)';
  $props['passw'] = 'VARCHAR(20)';
  $props['fecNac']= 'DATETIME';


  $conector = new ConectorBD();

  if ($conector->initConexion('bdExamen')=='OK') {
    $query = $conector->newTable($nombreTabla, $props);
    if ($conector->ejecutarQuery($query)) {
      echo "La tabla se creó exitosamente";
    }else {
      echo "Se produjo un error al crear la tabla";
    }
    $conector->cerrarConexion();
  }else {
    echo $conector->initConexion();
  }


 ?>
