<?php


  class ConectorBD
  {
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'daniel';
    private $conexion;

   function initConexion($nombre_db){
      $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
      if ($this->conexion->connect_error) {
        return "Error:" . $this->conexion->connect_error;
      }else {
        return "OK";
      }
    }

    function newTable($nombre_tbl, $campos){
      $sql = 'CREATE TABLE '.$nombre_tbl.' (';
      $length_array = count($campos);
      $i = 1;
      foreach ($campos as $key => $value) {
        $sql .= $key.' '.$value;
        if ($i!= $length_array) {
          $sql .= ', ';
        }else {
          $sql .= ');';
        }
        $i++;
      }
      return $this->ejecutarQuery($sql);
    }

    function ejecutarQuery($query){
      return $this->conexion->query($query);
    }

    function cerrarConexion(){
      $this->conexion->close();
    }

    function nuevaRestriccion($tabla, $restriccion){
      $sql = 'ALTER TABLE '.$tabla.' '.$restriccion;
      return $this->ejecutarQuery($sql);
    }

    function nuevaRelacion($from_tbl, $to_tbl, $from_field, $to_field){
      $sql = 'ALTER TABLE '.$from_tbl.' ADD FOREIGN KEY ('.$from_field.') REFERENCES '.$to_tbl.'('.$to_field.');';
      return $this->ejecutarQuery($sql);
    }

         function insertData($tabla, $data){
      $sql = 'INSERT INTO '.$tabla.' (';
      $i = 1;
      foreach ($data as $key => $value) {
        $sql .= $key;
        if ($i<count($data)) {
          $sql .= ', ';
        }else $sql .= ')';
        $i++;
      }
      $sql .= ' VALUES (';
      $i = 1;
      foreach ($data as $key => $value) {
        $sql .= $value;
        if ($i<count($data)) {
          $sql .= ', ';
        }else $sql .= ');';
        $i++;
      }
      
      return $this->ejecutarQuery($sql);

    }

    function getConexion(){
      return $this->conexion;
    }

 function actualizarRegistro($tabla, $data, $condicion){
      $sql = 'UPDATE '.$tabla.' SET ';
      $i=1;
      foreach ($data as $key => $value) {
        $sql .= $key.'='.$value;
        if ($i<sizeof($data)) {
          $sql .= ', ';
        }else $sql .= ' WHERE '.$condicion.';';
        $i++;
      }
      //echo $sql;
       return $this->ejecutarQuery($sql);
      }
      
      function  eliminarRegistro($tabla,$condicion){
        $sql='DELETE FROM '.$tabla.' WHERE '.$condicion.";";
        return $this->ejecutarQuery($sql);
     
    }
     function consultar($tablas, $campos, $condicion = ""){
      $sql = "SELECT ";
     
     $keys = array_keys($campos); //array solo los indices
      $ultima_key = $keys[count($keys)-1];// el ult indice 
      // $ultima_key = end(array_keys($campos));
      foreach ($campos as $key => $value) {
        $sql .= $value;
        if ($key!=$ultima_key) {
          $sql.=", ";
        }else $sql .=" FROM ";
      }

       $keys = array_keys($tablas);
      $ultima_key = $keys[count($keys)-1];
      // $ultima_key = end(array_keys($tablas));
      foreach ($tablas as $key => $value) {
        $sql .= $value;
        if ($key!=$ultima_key) {
          $sql.=", ";
        }else $sql .= " ";
      }

      if ($condicion == "") {
        $sql .= ";";
      }else {
        $sql .= $condicion.";";
      }
//return $sql;
      return $this->ejecutarQuery($sql);
    }
  function getEventoUser($user_id){
      $sql = "SELECT e.hrInicio AS hora_inicio,
                e.fecInicio AS fecha_inicio,
                e.hrInicio AS hora_inicio,
                e.fecFin AS fecha_fin,
                e.hrFin AS hora_fin,
                e.titulo AS titulo,
                e.idevento as id
              FROM evento e
              JOIN usuario u ON u.idusuario = e.idusuario
               WHERE e.idusuario = ".$user_id.";";
     //  return $sql;        
    return $this->ejecutarQuery($sql);
    }

// $login="caqui.g@mail.com";
//     getIduser("ddd".$login);

function getIduser($login){
$sql="SELECT idusuario FROM usuario u WHERE u.login = '$login';";
      //  return $consulta;
return $this->ejecutarQuery($sql);
}

  // function getIdusers($login){
  // $consulta="SELECT idusuario FROM usuario WHERE login=".$login;
  // return $consulta;  

// return $this->ejecutarQuery($consulta);
// }
  }

 ?>
