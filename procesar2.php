<?php



require_once 'conexion.php';

function getDatos(){
    $id = $_POST["idnieto"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
  $mysqli = getConn();
  $query = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado where nuevo.idempleado = '$id' and nuevo.fecha between '$fecha1' and '$fecha2'";
  $result = $mysqli->query($query);
  $listas ="";
  while($fila=mysqli_fetch_assoc($result)) { 
        $listas .= " <tr>
                                            
        <td> ".$fila['nieto']." </td>
        <td> ".$fila['fecha']." </td>
        <td> ".$fila['horingreso']." </td>
        <td> ".$fila["horibi"]." </td>
        <td> ".$fila["horibs"]." </td>
        <td> ".$fila["horisalida"]." </td>
        <td> ".$fila["maringreso"]." </td>
        <td> ".$fila["maribi"]." </td>
        <td> ".$fila["maribs"]." </td>
        <td> ".$fila["marsalida"]." </td>
        <td> ".$fila["tardanza"]." </td>
        <td> ".$fila["temprano"]." </td>
        <td> ".$fila["worktime"]." </td>
        <td> ".$fila["tiempototal"]." </td>
        
    </tr>";
  }
  
  return $listas;
}

echo getDatos();
?>