<?php
$fechaActual = date('d-m-Y H:i:s');
$solofecha = date('d-m-Y');
$calculando = substr($fechaActual , 11, 8);
$newDate = strtotime ("12-02-20 08:31:00");
$pdo=new PDO("mysql:host=localhost;dbname=insiteso_asistencia2;charset=utf8","insiteso_root","mysql");
$sql2 = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nieto.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario where marcaciones.mfecha = '$solofecha'  group by mfecha";

//$query = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2' group by fecha";
//$sql = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2'";
//$result = $mysqli->query($query);
//$result2 = $mysqli->query($query2);
  


  $sumatotal = "00:00:00";
  $subfecha = null; 
  foreach($pdo->query($sql2) as $fila) {
    $breaki = 0;
    $breaki2 = 0;
    $entrada = 0;
    $salida = 0;
    $Megafecha = $fila["marcacion"];
    $MarcacionDeIngreso = null;
    $MarcacionDeSalida = null;
    $MarcacionBreak = null;
    $MarcacionBreakSalida = null;
    $subfechita = $fila["marcacion"];
    //$subfecha = strtotime($subfechita);
    //hacer esta parte con substring, ya que php no detecta funcion date()
    $AñoMax = substr($subfechita, 0, 4);
    $AñoMaxf = intval($AñoMax);
    $AñoIx = substr($subfechita, 2, 2);
    $AñoI = intval($AñoIx);
    $DiaIx = substr($subfechita, 8, 2);
    $DiaI = intval($DiaIx);
    $MesIx = substr($subfechita, 5, 2);
    $MesI = intval($MesIx);
    $CodigoAño = 6;
    $CodigoMes = null;
    if($MesI==1){
      if($AñoMaxf%4==0){
        $CodigoMes= 6;
      }else{
        $CodigoMes = 0;
      }
      
    } else if($MesI==2){
      if($AñoMaxf%4==0){
        $CodigoMes= 2;
      }else{
        $CodigoMes = 3;
      }
    } else if ($MesI ==3){
      $CodigoMes =3;
    } else if($MesI == 4){
      $CodigoMes = 6;
    } else if($MesI ==5){
      $CodigoMes = 1;
    } else if($MesI ==6){
      $CodigoMes = 4;
    } else if($MesI ==7){
      $CodigoMes = 6;
    } else if($MesI ==8){
      $CodigoMes = 2;
    } else if($MesI ==9){
      $CodigoMes = 5;
    } else if($MesI ==10){
      $CodigoMes = 0;
    } else if($MesI ==11){
      $CodigoMes = 3;
    } else if($MesI ==12){
      $CodigoMes = 5;
    }
  
  $DiaDeSemana = $DiaI + $CodigoMes + $AñoI + ($AñoI/4) + $CodigoAño;
  $DiaDeSemana = $DiaDeSemana%7;
  $HoraEntrada = null;
  $HoraSalida = null; 
  $estado2 =false;
  $estado = false;
  $contador=0;
  $sql = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nieto.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario where marcaciones.marcacion = '$fechaActual' and fusion.diasemana = '$DiaDeSemana'";
    foreach($pdo->query($sql) as $fila2) {
      
      if($Megafecha == $fila2["marcacion"]){
        
          
          
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
          
          if($NumMarcacion-$NumMarcacion2 <= $entrada){
            $entrada = ($NumMarcacion-$NumMarcacion2);
            $MarcacionDeIngreso = $fila2["tiempo"];
          } else if ($NumMarcacion-$NumMarcacion2 > $entrada && !$estado2 && $contador ==0){
            $MarcacionDeIngreso = $fila2["tiempo"];
            
            $estado2 = true; 
          }
          $contador++;
          if($NumMarcacion-$NumMarcacion3 < $salida){
            $salida = ($NumMarcacion-$NumMarcacion3);
            $MarcacionDeSalida = $fila2["tiempo"];
          } 

          //Calculamos los breaks:
          $date1 = strtotime($fila2["tiempo"]);
          $date2 = strtotime("13:00:00");
          $date3 = strtotime("15:00:00");
          $Tiempomegasasa = round((($date1-$date2)),2);
          $Tiempomegasasa2 = round((($date1-$date3)),2);
          //$tiemposote = date("h:i:s", "$Tiempocargosasa");
          //$fechita1 = substr($fila2["tiempo"], 0,2);
          //$numfecha1 = intval($fechita1);
          //$fechita2 = substr($fila2["horibi"], 0,2);
          //$numfecha2 = 13;
          //$fechita3 = substr($fila2["horibs"], 0,2);
          //$numfecha3 = 15;

          if($breaki < 0) {
            $breaki = $breaki * (-1);
          }
          if($breaki2 < 0) {
            $breaki2 = $breaki2 * (-1);
          }
          
          if($Tiempomegasasa < $breaki){
            $breaki = ($Tiempomegasasa);
            $MarcacionBreak = $fila2["tiempo"];
            
          } 
          if($Tiempomegasasa2 <= $breaki2){
            $breaki2 = ($Tiempomegasasa2);
            $MarcacionBreakSalida = $fila2["tiempo"];
          }
          
          //fiajmos tiempos
          $HoraEntrada = $fila2["entrada"];
		  $HoraSalida = $fila2["salida"];

		  $Entradita = strtotime($HoraEntrada);
		  

        
        
        
    }
    /// aqui se fijan los valores del incio y fin del break (fijos)
    $InicioFijoBreak = "13:00:00";
    $FinFijoBreak = "15:00:00";
      
    
}
if($MarcacionBreak == $MarcacionDeIngreso || $MarcacionBreak == $MarcacionDeSalida ) {
  $MarcacionBreak = "No marcó inicio de Break";
}
if($MarcacionBreakSalida == $MarcacionDeIngreso || $MarcacionBreakSalida == $MarcacionDeSalida ) {
  $MarcacionBreakSalida = "No marcó fin de Break";
}
if($MarcacionBreak == null ) {
  $MarcacionBreak = "No marcó inicio de Break";
}
if($MarcacionBreakSalida == null ) {
  $MarcacionBreakSalida = "No marcó fin de Break";
}

	//$actualiza = substr($fechaActual , 11, 8);
	//$newDate = strtotime (substr($fechaActual , 11, 8));
	$entradita = strtotime ( '+30 minute' , $entradita );
if ($Entradita < $newDate ) {
		if($MarcacionDeIngreso ==null){
			$empleado = $fila['nieto'];
			$to = "rodrigo.mozo.01@gmail.com";
			$subject = "Alerta-de-Horario";
			$message = "Probable exceso de tardanza o aunsencia en dia laboral.
			\n Datos del empleado: \nNombre:" .$empleado. 
			"\nDia en el que se encuentra la incidencia :" .$fila['mfecha'];
		
			mail($to, $subject, $message);
		}    
	
  }
     
        

          
          
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Centro de alarmas abierto</h1>
	<?php echo $fechaActual; ?>
    <script>
		(function(){
			setInterval(
				function(){
					document.location.reload()
				},
			500)
		})()
	</script>  
</body>
</html>