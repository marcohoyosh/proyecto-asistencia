<?php 
require_once 'conexion.php';

function getNietos(){
  $mysqli = getConn();
  $id = $_POST['idhijo'];
  $query = "SELECT * FROM nieto WHERE idhijo = $id";
  $result = $mysqli->query($query);
  $nietos = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $nietos .= "<option value='$row[idnieto]'>$row[nieto]</option>";
  }
  return $nietos;
}

echo getNietos();
