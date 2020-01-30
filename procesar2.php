<?php



require_once 'conexion.php';

function getDatos(){
    $id = $_POST["idnieto"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
  $mysqli = getConn();
  $pdo=new PDO("mysql:host=localhost;dbname=asistencia2;charset=utf8","root","");
  $query = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2' group by fecha";
  $sql = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2'";
  $result = $mysqli->query($query);
  //$result2 = $mysqli->query($query2);
    
    
  $listas ="";
  $breaki = 0;
  $breaki2 = 0;
  while($fila=mysqli_fetch_assoc($result)) { 
    $Megafecha = $fila["fecha"];
    $MarcacionBreak = null;
    $MarcacionBreakSalida = null;
    foreach($pdo->query($sql) as $fila2) {
      
      if($Megafecha == $fila2["mfecha"]){
        
          $fechita1 = substr($fila2["tiempo"], 0,2);
          $numfecha1 = intval($fechita1);
          $fechita2 = substr($fila2["horibi"], 0,2);
          $numfecha2 = intval($fechita2);
          $fechita3 = substr($fila2["horibs"], 0,2);
          $numfecha3 = intval($fechita3);

          if($breaki < 0) {
            $breaki = $breaki * (-1);
          }
          if($breaki2 < 0) {
            $breaki2 = $breaki2 * (-1);
          }

          if($numfecha1-$numfecha2 < $breaki){
            $breaki = ($numfecha1-$numfecha2);
            $MarcacionBreak = $fila2["tiempo"];
          } 
          if($numfecha1-$numfecha3 <= $breaki2){
            $breaki2 = ($numfecha1-$numfecha2);
            $MarcacionBreakSalida = $fila2["tiempo"];
          }
          
          
        }
        
    }
      
    if($MarcacionBreak == $fila["maringreso"] || $MarcacionBreak == $fila["marsalida"]){
      $MarcacionBreak = "No marcó inicio de Break";
    }
    if($MarcacionBreakSalida == $fila["maringreso"] || $MarcacionBreakSalida == $fila["marsalida"]){
      $MarcacionBreakSalida = "No marcó fin de Break";
    }
        $listas .= " <tr>
                                            
        <td> ".$fila['nieto']." </td>
        <td> ".$fila['fecha']." </td>
        <td> ".$fila['horingreso']." </td>
        <td> ".$fila['horibi']." </td>
        <td> ".$fila["horibs"]." </td>
        <td> ".$fila["horisalida"]." </td>
        <td> ".$fila["maringreso"]." </td>
        <td> ".$MarcacionBreak." </td>
        <td> ".$MarcacionBreakSalida." </td>
        <td> ".$fila["marsalida"]." </td>
        <td> ".$fila["tardanza"]." </td>
        <td> ".$fila["temprano"]." </td>
        <td> ".$fila["worktime"]." </td>
        <td> ".$fila["tiempototal"]." </td>
        <td> ".$fila["id"]." </td>
        <td> ".$fila["marcacion"]." </td>
        
        
   
    </tr>";
  }  

  return $listas;
}

echo getDatos();
?>