<?php 
require_once 'conexion.php';

function getVideos(){
  $mysqli = getConn();
  $id = $_POST['idpadre'];
  $query = "SELECT * FROM hijo WHERE idpadre = $id";
  $result = $mysqli->query($query);
  $videos = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $videos .= "<option value='$row[idhijo]'>$row[hijo]</option>";
  }
  return $videos;
}

echo getVideos();
