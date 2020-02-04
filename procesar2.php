<?php
  require_once 'conexion.php';

function getDatos(){
    $id = $_POST["idnieto"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
  $mysqli = getConn();
  $pdo=new PDO("mysql:host=localhost;dbname=asistencia2;charset=utf8","root","");
  $sql2 = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nieto.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario where marcaciones.id = '$id' and marcaciones.mfecha between '$fecha1' and '$fecha2' group by mfecha";
  
  //$query = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2' group by fecha";
  //$sql = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2'";
  //$result = $mysqli->query($query);
  //$result2 = $mysqli->query($query2);
    
    
  $listas ="";
  $breaki = 0;
  $breaki2 = 0;
  $entrada = 0;
  $salida = 0;
  $subfecha = null; 
  foreach($pdo->query($sql2) as $fila) {
    $Megafecha = $fila["mfecha"];
    $MarcacionDeIngreso = null;
    $MarcacionDeSalida = null;
    $MarcacionBreak = null;
    $MarcacionBreakSalida = null;
    $subfechita = $fila["marcacion"];
    //$subfecha = strtotime($subfechita);
    //hacer esta parte con substring, ya que php no detecta funcion date()
    $AñoIx = substr($subfechita, 2, 2);
    $AñoI = intval($AñoIx);
    $DiaIx = substr($subfechita, 8, 2);
    $DiaI = intval($DiaIx);
    $MesIx = substr($subfechita, 5, 2);
    $MesI = intval($MesIx);
    $CodigoAño = 6;
    $CodigoMes = null;
    switch ($MesI) {
      case 0:
          $CodigoMes = 0;
          break;
      case 1:
          $CodigoMes = 3;
          break;
      case 2:
          $CodigoMes = 3;
          break;
      case 3:
          $CodigoMes = 6;
          break;
      case 4:
          $CodigoMes = 1;
          break;
      case 5:
          $CodigoMes = 4;
          break;
      case 6 :
          $CodigoMes = 6;
          break;
      case 7 :
          $CodigoMes = 2;
          break;
      case 8 :
          $CodigoMes = 5;
          break;
      case 9:
          $CodigoMes = 0;
          break;
      case 10:
          $CodigoMes = 3;
          break;
      case 11:
          $CodigoMes = 5;
          break;
  }
  $DiaDeSemana = $DiaI + $CodigoMes + $AñoI + ($AñoI/4) + $CodigoAño;
  $DiaDeSemana = $DiaDeSemana%7;
  $HoraEntrada = null;
  $HoraSalida = null; 
  $sql = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nieto.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario where marcaciones.id = '$id' and marcaciones.mfecha BETWEEN '$fecha1' and '$fecha2' and fusion.diasemana = '$DiaDeSemana'";
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
            $breaki2 = ($numfecha1-$numfecha3);
            $MarcacionBreakSalida = $fila2["tiempo"];
          }
          
          
          //Ahora calculamos marcaciones de Ingreso y salida

          $Marcacion = substr($fila2["tiempo"], 0,2);
          $NumMarcacion = intval($Marcacion);
          $FechaMarcInicial = substr($fila2["entrada"], 0,2);
          $NumMarcacion2 = intval($FechaMarcInicial);
          $FechaMarcFinal = substr($fila2["salida"], 0,2);
          $NumMarcacion3 = intval($FechaMarcFinal);

          if($salida < 0) {
            $salida = $salida * (-1);
          }
          
          if($NumMarcacion-$NumMarcacion2 < $entrada){
            $entrada = ($NumMarcacion-$NumMarcacion2);
            $MarcacionDeIngreso = $fila2["tiempo"];
            
          if($NumMarcacion-$NumMarcacion3 < $salida){
            $salida = ($NumMarcacion-$NumMarcacion3);
            $MarcacionDeSalida = $fila2["tiempo"];
          } 


          $HoraEntrada = $fila2["entrada"];
          $HoraSalida = $fila2["salida"];

        }
        
    }
    /// aqui se fijan los valores del incio y fin del break (fijos)
    $InicioFijoBreak = "13:00:00";
    $FinFijoBreak = "15:00:00";
      
    if($MarcacionBreak == $MarcacionDeIngreso || $MarcacionBreak == $MarcacionDeSalida ) {
      $MarcacionBreak = "No marcó inicio de Break";
    }
    if($MarcacionBreakSalida == $MarcacionDeIngreso || $MarcacionBreakSalida == $MarcacionDeSalida ) {
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

}
    
    
    


        $listas .= " <tr>
                                            
        <td> ".$fila['nieto']." </td>
        <td> ".$fila['mfecha']." </td>
        <td> ".$HoraEntrada." </td>
        <td> ".$InicioFijoBreak." </td>
        <td> ".$FinFijoBreak." </td>
        <td> ".$HoraSalida." </td>
        <td> ".$MarcacionDeIngreso." </td>
        <td> ".$MarcacionBreak." </td>
        <td> ".$MarcacionBreakSalida." </td>
        <td> ".$MarcacionDeSalida." </td>
        <td> ".$MarcacionDeSalida." </td>
        <td> ".$MarcacionDeSalida." </td>
        <td> ".$MarcacionDeSalida." </td>
        <td> ".$AñoI." </td>
        
        
   
    </tr>";
  }  

  return $listas;
}

echo getDatos();

  

?>