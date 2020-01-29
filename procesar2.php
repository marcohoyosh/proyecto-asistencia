<?php



require_once 'conexion.php';

function getDatos(){
    $id = $_POST["idnieto"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
  $mysqli = getConn();
  $query = "SELECT * FROM marcaciones inner join nieto on nieto.idnieto=marcaciones.id inner join nuevo on marcaciones.id = nuevo.idempleado where nuevo.idempleado = '$id' and nuevo.fecha between '$fecha1' and '$fecha2' group by nuevo.fecha" ;
  
  $result = $mysqli->query($query);
    $x = $fila['id'];
    $y = $fila['fecha'];
    $query2 = "SELECT * FROM marcaciones inner join nuevo on nuevo.idempleado=marcaciones.id where nuevo.idempleado = '$x' and nuevo.fecha = '$y' ";
    $result2 = $mysqli->query($query2);
    while($fila2=mysqli_fetch_assoc($result2)) {
      $fechita1 = substr($fila2["marcacion"], 11,2);
      $numfecha1 = intval($fechita1);
      $fechita2 = substr($fila2["horibi"], 0,2);;
      $numfecha2 = intval($fechita2);
      
          
      $breaki = 0;
      if($breaki < 0){
        $breaki * -1;
      }

      if($numfecha1-$numfecha2 < $breaki){
        $breaki = $numfecha1;
      } else if($numfecha1-$numfecha2 = $breaki){
        $breaki = $breaki;
      }
      if($fechita1 == $breaki){
        break;
      }
    }
  $listas ="";
  while($fila=mysqli_fetch_assoc($result)) { 
    
        $listas .= " <tr>
                                            
        <td> ".$fila['nieto']." </td>
        <td> ".$fila['fecha']." </td>
        <td> ".$fila['horingreso']." </td>
        <td> ".$fila['horibi']." </td>
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