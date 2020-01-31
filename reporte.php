<?php    
    require_once 'conexion.php';

    $id = $_POST["nieto"];
    $fe1 = $_POST["fecha1"];
    $fe2 = $_POST["fecha2"];

    //Incluimos librería y archivo de conexión
	require 'Classes/PHPExcel.php';
	require 'conexion.php';
	
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
    
	
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'ID');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'NOMBRE');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'PRECIO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'EXISTENCIA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'TOTAL');

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
      
    if($MarcacionBreak == $fila["maringreso"] || $MarcacionBreak == $fila["marsalida"]){
      $MarcacionBreak = "No marcó inicio de Break";
    }
    if($MarcacionBreakSalida == $fila["maringreso"] || $MarcacionBreakSalida == $fila["marsalida"]){
      $MarcacionBreakSalida = "No marcó fin de Break";
    }
    
    
	
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$filasa, $fila['nieto']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$filasa, $fila['fecha']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$filasa, $fila['horingreso']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$filasa, $fila['horibi']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $fila['horibs']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $fila['horisalida']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $fila['maringreso']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $MarcacionBreak);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $MarcacionBreakSalida);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $fila["marsalida"]);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $fila["tardanza"]);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $fila["temprano"]);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $fila["worktime"]);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$filasa, $fila["tiempototal"]);

		
		$filasa++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$filasa = $filasa -1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:E".$fila);
	
	$filaGrafica = $fila+2;
	
	// definir origen de los valores
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Productos!$D$7:$D$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Productos!$B$7:$B$'.$fila);
?>