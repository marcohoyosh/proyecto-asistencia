<?php    

    $id = $_POST["nieto"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];

    //Incluimos librería y archivo de conexión
	require 'Classes/PHPExcel.php';
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Insite Soluciones")->setDescription("Reporte de Asistencia");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Reporte");
	
	
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NOMBRE');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'FECHA');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'HORARIO DE ENTRADA');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'INICIO DE BREAK');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'SALIDA DE BREAK');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'HORARIO DE SALIDA');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'MARCACION DE INGRESO');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'MARCACION DE INICIO DE BREAK');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'MARCACION DE FIN DE BREAK');
    $objPHPExcel->getActiveSheet()->setCellValue('J1', 'MARCACION DE SALIDA');
    $objPHPExcel->getActiveSheet()->setCellValue('K1', 'TARDANZA');
    $objPHPExcel->getActiveSheet()->setCellValue('L1', 'TEMPRANO');
    $objPHPExcel->getActiveSheet()->setCellValue('M1', 'WORKTIME');
    $objPHPExcel->getActiveSheet()->setCellValue('N1', 'TIEMPO TOTAL');
    
	
	


  
    $pdo=new PDO("mysql:host=localhost;dbname=asistencia2;charset=utf8","root","");
    $sql2 = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nieto.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario where marcaciones.id = '$id' and marcaciones.mfecha between '$fecha1' and '$fecha2' group by mfecha";
    
    //$query = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2' group by fecha";
    //$sql = "SELECT * FROM nuevo inner join nieto on nieto.idnieto=nuevo.idempleado inner join marcaciones on marcaciones.mfecha = nuevo.fecha where nuevo.idempleado = '$id' and marcaciones.id = '$id' and nuevo.fecha between '$fecha1' and '$fecha2'";
    //$result = $mysqli->query($query);
    //$result2 = $mysqli->query($query2);
      
      
    $listas ="";
    $filasa = 2;
    $subfecha = null; 
    foreach($pdo->query($sql2) as $fila) {
      $breaki = 0;
      $breaki2 = 0;
      $entrada = 0;
      $salida = 0;
      $Megafecha = $fila["mfecha"];
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
    $sql = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nieto.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario where marcaciones.id = '$id' and marcaciones.mfecha BETWEEN '$fecha1' and '$fecha2' and fusion.diasemana = '$DiaDeSemana'";
      foreach($pdo->query($sql) as $fila2) {
        
        if($Megafecha == $fila2["mfecha"]){
          
            
            
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
            
            if($numfecha1-$numfecha2 < $breaki){
              $breaki = ($numfecha1-$numfecha2);
              $MarcacionBreak = $fila2["tiempo"];
              
  
            } else if ($numfecha1-$numfecha2 == 0 && !$estado){
              $MarcacionBreak = $fila2["tiempo"];
              $breaki = ($numfecha1-$numfecha2);
              $estado = true; 
            }
            if($numfecha1-$numfecha3 <= $breaki2){
              $breaki2 = ($numfecha1-$numfecha3);
              $MarcacionBreakSalida = $fila2["tiempo"];
            }
            
            //fiajmos tiempos
            $HoraEntrada = $fila2["entrada"];
            $HoraSalida = $fila2["salida"];
          
          
          
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
  
  if ($MarcacionBreak == null){     
    $empleado = $fila['nieto'];
    $to = "rodrigo.mozo.01@gmail.com";
    $subject = "Incorcondancia con el horario";
    $message = "Probable exceso de tardanza o aunsencia en dia laboral, datos del empleado: \nNombre:" .$empleado. 
    "\nDia en el que se encuentra la incidencia :" .$fila['mfecha'];
  
    mail($to, $subject, $message);
  }
        $MarcI = strtotime($MarcacionDeIngreso);
        $HI = strtotime($HoraEntrada);
          
        if($MarcI > $HI){
          date_default_timezone_set('America/Lima');
          $date1 = new DateTime($HoraEntrada);
          $date2 = new DateTime($MarcacionDeIngreso);
          $diff = $date1->diff($date2);
          // will output 2 days
          $Tardanza = $diff->format('%H horas %i minutos').PHP_EOL; 
          $work1= $MarcacionDeIngreso;
        }else{
          $Tardanza = "00:00:00";
          $work1 = $HoraEntrada;
        }
       
        $MarcS = strtotime($MarcacionDeSalida);
        $HS = strtotime($HoraSalida);
          
        if($HoraSalida > $MarcacionDeSalida){
          date_default_timezone_set('America/Lima');
          $date1 = new DateTime($HoraSalida);
          $date2 = new DateTime($MarcacionDeSalida);
          $diff = $date1->diff($date2);
          // will output 2 days
          $Temprano = $diff->format('%H horas %i minutos').PHP_EOL; 
          $work2 = $MarcacionDeSalida;
        } else {
          $Temprano = "00:00:00";
          $work2 = $HoraSalida;
        }
  
          date_default_timezone_set('America/Lima');
          $date1 = new DateTime($MarcacionDeIngreso);
          $date2 = new DateTime($MarcacionDeSalida);
          $diff = $date1->diff($date2);
          // will output 2 days
          $TiempoTotal = $diff->format('%H horas %i minutos').PHP_EOL; 
  
  
          date_default_timezone_set('America/Lima');
          $date1 = new DateTime($work1);
          $date2 = new DateTime($work2);
          $diff = $date1->diff($date2);
          // will output 2 days
          $Worktime = $diff->format('%H horas %i minutos').PHP_EOL; 
  
        
                                              
          $objPHPExcel->getActiveSheet()->setCellValue('A'.$filasa, $fila['nieto']);
		      $objPHPExcel->getActiveSheet()->setCellValue('B'.$filasa, $fila['mfecha']);
		      $objPHPExcel->getActiveSheet()->setCellValue('C'.$filasa, $HoraEntrada);
		      $objPHPExcel->getActiveSheet()->setCellValue('D'.$filasa, $InicioFijoBreak);
          $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $FinFijoBreak);
          $objPHPExcel->getActiveSheet()->setCellValue('F'.$filasa, $HoraSalida);
          $objPHPExcel->getActiveSheet()->setCellValue('G'.$filasa, $MarcacionDeIngreso);
          $objPHPExcel->getActiveSheet()->setCellValue('H'.$filasa, $MarcacionBreak);
          $objPHPExcel->getActiveSheet()->setCellValue('I'.$filasa, $MarcacionBreakSalida);
          $objPHPExcel->getActiveSheet()->setCellValue('J'.$filasa, $MarcacionDeSalida);
          $objPHPExcel->getActiveSheet()->setCellValue('K'.$filasa, $Tardanza);
          $objPHPExcel->getActiveSheet()->setCellValue('L'.$filasa, $Temprano);
          $objPHPExcel->getActiveSheet()->setCellValue('M'.$filasa, $Worktime);
          $objPHPExcel->getActiveSheet()->setCellValue('N'.$filasa, $TiempoTotal);

		
		$filasa++; //Sumamos 1 para pasar a la siguiente fila
    }  
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte.xlsx"');
	header('Cache-Control: max-age=0');
  
  $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$writer->save('php://output');
?>