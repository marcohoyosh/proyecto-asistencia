<?php
  require_once 'conexion.php';
  date_default_timezone_set('America/Lima');

function getResumen(){
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
  $SumaMin = "00:00:00";
  $TotalDias = null;  
  $sumatotal= null;  
  $listas ="";
  $sumatotal = "00:00:00";
  $subfecha = null; 
  $count = 0;
  $acumulador = null;
  date_default_timezone_set('America/Lima');
    $date1 = strtotime($fecha1);
    $date2 = strtotime($fecha2);
    //$diff = $date1->diff($date2);
    $TotalDias = round((($date2-$date1)/60/60/24),2);
  foreach($pdo->query($sql2) as $fila) {
    $count++;
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

$var1 = "No marcó inicio de Break";
$var2 = "No marcó fin de Break";
if (strncasecmp($var1, $MarcacionBreak,15) === 0 || strncasecmp($var2, $MarcacionBreakSalida,15) === 0) {    
  $empleado = $fila['nieto'];
  $to = "rodrigo.mozo.01@gmail.com";
  $subject = "Incorcondancia-Horario";
  $message = "Probable exceso de tardanza o aunsencia en dia laboral.
    \n Datos del empleado: \nNombre:" .$empleado. 
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
        $Tardanza = '00 horas 00 minutos';
        $work1 = $HoraEntrada;
        
      }

      //YY "/" mm "/" dd
     
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
        $Temprano = '00 horas 00 minutos';
        $work2 = $HoraSalida;
      }

      
        //date_default_timezone_set('America/Lima');
        //$totalSegundos = ($MarcacionBreak->getTimestamp() - $MarcacionBreakSalida->getTimestamp());
          

        date_default_timezone_set('America/Lima');
        $date1 = new DateTime($MarcacionDeIngreso);
        $date2 = new DateTime($MarcacionDeSalida);
        $diff = $date1->diff($date2);
        
        
        //$tiempo2 = date("i:s:00", "$Tiemposalidasa");
       
        $TiempoTotalf = $diff->format('%H horas %i minutos'); 
        $date1 = strtotime($MarcacionDeIngreso);
        $date2 = strtotime($MarcacionDeSalida);
        $Tiempocargosasa = round((($date2-$date1)/60),2);
        $min1 = $Tiempocargosasa%60;
        if($min1/10<1){
          $min1 = "0".$min1;
        }
        $horas1 =($Tiempocargosasa/60);
        if($horas1<10){
          $horas1 =substr(($Tiempocargosasa/60),0,1 );
          $probando1 = "0".$horas1 .":" . $min1 . ":00";
        }else{
          $horas1 =substr(($Tiempocargosasa/60),0,2) ;
          $probando1 = $horas1 .":" . $min1 . ":00";
        }
        
        
        //$tiemposote = date("h:i:s", "$Tiempocargosasa");
        $tiemposote = strtotime($probando1);
        //$Tiempousar = $diff->format('%H:%i:%s'); 
        date_default_timezone_set('America/Lima');
        $date1 = strtotime($MarcacionBreak);
        $date2 = strtotime($MarcacionBreakSalida);
        //$diff = $date1->diff($date2);
        $TiempoBreak = round((($date2-$date1)/60),2);
        $min = $TiempoBreak%60;
        if($min/10<1){
          $min = "0".$min;
        }
        $horas =($TiempoBreak/60);
        if($horas<10){
          $horas =substr(($TiempoBreak/60),0,1 );
          $probando2 = "0".$horas .":" . $min . ":00";
        }else{
          $horas =substr(($TiempoBreak/60),0,2) ;
          $probando2 = $horas .":" . $min . ":00";
        }
        
        
        
        //$tiempito = date("i:s:00", "$TiempoBreak");
        $tiempito = strtotime($probando2);
        $superfinal = round((($tiemposote-$tiempito)/60),2);
        $min = $superfinal%60;
        if($min/10<1){
          $min = "0".$min;
        }
        
        $horas =($superfinal/60);
        if($horas<10){
          $horas =substr(($superfinal/60),0,1 );
          $superfinal = "0".$horas .":" . $min . ":00";
        }else{
          $horas =substr(($superfinal/60),0,2) ;
          $superfinal = $horas .":" . $min . ":00";
        }
        

        

        

        //$cadena = (string)$TiempoBreak;
        //$hora = DateTime::createFromFormat('Hi', $cadena);
        //$hora->format('H:i:s');
        //$date3 = date_create($Tiempousar);
        //$date3->add($TiempoBreak); 
        //$date3->format('Y-m-d H:i:s');



        date_default_timezone_set('America/Lima');
        $date1 = strtotime($work1);
        $date2 = strtotime($work2);
        //$diff = $date1->diff($date2);
        // will output 2 days
        $Worktime = round((($date2-$date1)/60),2); 
        $min = $Worktime%60;
        if($min/10<1){
          $min = "0".$min;
        }
        $horas =($Worktime/60);
        if($horas<10){
          $horas =substr(($Worktime/60),0,1 );
          $probando2 = "0".$horas .":" . $min . ":00";
        }else{
          $horas =substr(($Worktime/60),0,2) ;
          $probando2 = $horas .":" . $min . ":00";
        }
        $Worktime = strtotime($probando2);
        $workfinal = round((($Worktime-$tiempito)/60),2);
        $min = $workfinal%60;
        if($min/10<1){
          $min = "0".$min;
        }
        $horas =($workfinal/60);
        if($horas<10){
          $horas =substr(($workfinal/60),0,1 );
          $probando = "0".$horas .":" . $min . ":00";
        }else{
          $horas =substr(($workfinal/60),0,2) ;
          $probando = $horas .":" . $min . ":00";
        }
          $workfinal = $probando;
        
        //desde aqui empieza para calcular la suma total (verificar bien)
        $Megafinal = strtotime($superfinal);
        //suma total esta inicializada afuera del foreach
        $sumatotal = strtotime($sumatotal);
        $sumatotal = round((($sumatotal+$Megafinal)/60),2);
        $sumatotal = date("i:s:00", "$sumatotal");
        
        //if($Ma)
        $var1 = "No marcó inicio de Break";
        $var2 = "No marcó fin de break";
        if (strncasecmp($var1, $MarcacionBreak,15) === 0) {
          $superfinal = "No calculable";
          $workfinal = "No calculable";

        }
        if(strncasecmp($var2, $MarcacionBreakSalida,15)=== 0){
          $superfinal = "No calculable";
          $workfinal = "No calculable";
        }
        if($HoraEntrada ==null){
          $HoraEntrada = "No calculable";
        }
        if($HoraSalida == null){
          $HoraSalida = "No calculable";
        }
        if($MarcacionDeIngreso== null){
          $MarcacionDeIngreso = "No calculable";
        }
        if($MarcacionDeSalida== null){
          $MarcacionDeSalida= "No calculable";
        }
        
        //$estafecha = strtotime($superfinal);
        //$prueba = strtotime("08:22:00");
        //$estafecha2 = round(($estafecha/60),2);
        //$SumaMin= round((($SumaMin+$estafecha)),2);
        
        //PROBANDO FUNCION:
        

        require_once('funciones.php');
        $SumaMin = suma_horas($SumaMin,$superfinal);
        $guardando = " <tr>  
                    <td> ".$SumaMin." </td>
        
        </tr>"; 

        
        

    
  }  

  return $guardando;
}
 echo getResumen();
  

?>