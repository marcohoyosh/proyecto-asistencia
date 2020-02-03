<?php
  require_once 'conexion.php';

function getDatos(){
    $id = $_POST["idnieto"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
  $mysqli = getConn();
  $pdo=new PDO("mysql:host=localhost;dbname=asistencia2;charset=utf8","root","");
  $query = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nietdo.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario where marcaciones.id = '$id' and marcaciones.mfecha between '$fecha1' and '$fecha2' group by mfecha";
  $sql = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nietdo.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario where marcaciones.id = '$id' and marcaciones.mfecha between '$fecha1' and '$fecha2'";
  //$query = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2' group by fecha";
  //$sql = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2'";
  $result = $mysqli->query($query);
  //$result2 = $mysqli->query($query2);
    
    
  $listas ="";
  $breaki = 0;
  $breaki2 = 0;
  while($fila=mysqli_fetch_assoc($result)) { 
    $Megafecha = $fila["mfecha"];
    $MarcacionBreak = null;
    $MarcacionBreakSalida = null;
  
    foreach($pdo->query($sql) as $fila2) {
      
      if($Megafecha == $fila2["mfecha"]){
        
          $fechita1 = substr($fila2["tiempo"], 0,2);
          $numfecha1 = intval($fechita1);
          //$fechita2 = substr($fila2["horibi"], 0,2);
          $numfecha2 = 13;
          //$fechita3 = substr($fila2["horibs"], 0,2);
          $numfecha3 = 15;

          if($breaki < 0) {
            $breaki = $breaki * (-1);
          }
          if($breaki2 < 0) {
            $breaki2 = $breaki2 * (-1);
          }
          $estado = false;
          if($numfecha1-$numfecha2 < $breaki){
            $breaki = ($numfecha1-$numfecha2);
            $MarcacionBreak = $fila2["tiempo"];
            

          } else if ($numfecha1-$numfecha2 == 0 && !$estado){
            $MarcacionBreak = $fila2["tiempo"];
            $estado = true; 
          }
          if($numfecha1-$numfecha3 <= $breaki2){
            $breaki2 = ($numfecha1-$numfecha2);
            $MarcacionBreakSalida = $fila2["tiempo"];
          }
          
          
          //Ahora calculamos marcaciones de Ingreso y salida

          $Marcacion = substr($fila2["tiempo"], 0,2);
          $NumMarcacion = intval($Marcacion);
          $FechaMarcInicial = substr($fila2["entrada"], 0,2);
          $NumMarcacion2 = intval($FechaMarcInicial);
          $FechaMarcFinal = substr($fila2["salida"], 0,2);
          $numfecha3 = intval($FechaMarcFinal);

          if($entrada < 0) {
            $entrada = $entrada * (-1);
          }
          if($salida < 0) {
            $salida = $salida * (-1);
          }
          $estado = false;
          if($numfecha1-$numfecha2 < $breaki){
            $breaki = ($numfecha1-$numfecha2);
            $MarcacionBreak = $fila2["tiempo"];
            

          } else if ($numfecha1-$numfecha2 == 0 && !$estado){
            $MarcacionBreak = $fila2["tiempo"];
            $estado = true; 
          }
          if($numfecha1-$numfecha3 <= $breaki2){
            $breaki2 = ($numfecha1-$numfecha2);
            $MarcacionBreakSalida = $fila2["tiempo"];
          } 




        }
        
    }
    $InicioFijoBreak = "13:00:00";
    $FinFijoBreak = "15:00:00";
      
    if($MarcacionBreak == $fila["maringreso"] || $MarcacionBreak == $fila["marsalida"]){
      $MarcacionBreak = "No marcó inicio de Break";
    }
    if($MarcacionBreakSalida == $fila["maringreso"] || $MarcacionBreakSalida == $fila["marsalida"]){
      $MarcacionBreakSalida = "No marcó fin de Break";
    }

    if ($MarcacionBreak == null){     
      $empleado = $fila['nieto'];
      $to = "rodrigo.mozo.01@gmail.com";
      $subject = "Incorcondancia con el horario";
      $message = "Probable exceso de tardanza o aunsencia en dia laboral, datos del empleado: \nNombre:" .$empleado. 
      "\nDia en el que se encuentra la incidencia :" .$fila['fecha'];
 
      mail($to, $subject, $message);
    }
    
    


        $listas .= " <tr>
                                            
        <td> ".$fila['nieto']." </td>
        <td> ".$fila['fecha']." </td>
        <td> ".$fila['entrada']." </td>
        <td> ".$InicioFijoBreak." </td>
        <td> ".$FinFijoBreak." </td>
        <td> ".$fila["salida"]." </td>
        <td> ".$fila["maringreso"]." </td>
        <td> ".$MarcacionBreak." </td>
        <td> ".$MarcacionBreakSalida." </td>
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