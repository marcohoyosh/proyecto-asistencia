<?php 
session_start();

if(!isset($_SESSION["id"])){
	header("Location: index.php");
	exit();
}
	$breaki = 0;
    $breaki2 = 0;
    $entrada = 0;
    $salida = 0;
    
    $MarcacionDeIngreso = null;
    $MarcacionDeSalida = null;
    $MarcacionBreak = null;
    $MarcacionBreakSalida = null;
	$pdo=new PDO("mysql:host=localhost;dbname=asistencia2;charset=utf8","root","");
	$sql = "SELECT * FROM marcaciones inner join nieto on marcaciones.id = nieto.idnieto inner join fusion on fusion.idturno = nieto.idturno inner join horario on fusion.idhorario = horario.idhorario ";
    foreach($pdo->query($sql) as $fila2) {
        
          
          

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



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Asistencia</title>
    
</head>
<style>
	* {margin: 0;padding: 0;font-family:sans-serif;border:0;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;-ms-box-sizing: border-box;box-sizing: border-box;}
	body {padding:0px;text-align:;}
	fieldset p {width:33.3%;float:left;text-align:center;padding:50px}
	select{padding:10px;border:1px solid #bbb;border-radius:5px;margin:5px 0;display:block;box-shadow:0 0 10px #ddd;width:100%}
	input {padding:10px 50px;margin:0 auto;}
	#resultados{margin:20px 0;padding:20px;border:10px solid #ddd;}
</style>


    
<body>
<header class="site-header inicio">    
        <div class='contenedor contenido-header' id="myHeader">
            <div class="barra">
				<div class="log">   
					<img src="imagenes/cmlogo.png" alt="Logo" height="85px" class="logo">
				</div>
				<div class="logoo">
					<p> ¡ Bienvenido <?php echo $_SESSION["nombres"] ?> !  <a href="cerrar_cesion.php">Cerrar Sesion</a></p>
				</div>
                <nav class="navegacion">                                   
				             
                </nav>   
            </div>         
        </div>
	</header>
		<div class="achicar">
				<div class="titulo">
					<h1>Control de Asistencia</h1>
				</div>
				
				<fieldset>

				<form action="reporte.php" method="POST">
					
						<div class="container">
								<div class="page-header text-left">
								</div>
								
								<div class="col-md-4">
									<p>Local
									<select id="lista_reproduccion" name="lista_reproduccion" class="form-control">
									</select>
									</p>
								</div>
								<div class="col-md-4">
									<p>Departamento
									<select id="videos" name="video" class="form-control">
									</select>
								</p>
								</div>
								<div class="col-md-4">
									<p>Empleados
									<select id="nietos" name="nieto" class="form-control">
									</select>
									</p>
								</div>
								
										<input type="date" id="fecha1" name="fecha1" step="1" min="2013-01-01" max="2020-12-31" >

									
										<input type="date" id="fecha2" name="fecha2" step="1" min="2013-01-01" max="2020-12-31" >

									
								<div class="row">
									
									<div class="container">
										
										<button type="submit" id="enviar" type="submit" class="btn" value ="enviar" name ="enviar">Enviar</button> 
										<button type="submit" id="reporte" type="submit" class="btn"  value ="reporte" name ="reporte">Reporte</button> 
								
									</div>
									
								</div>							
							
						</div>
					</form>
				</fieldset>

		</div>	
			<input type="hidden" name="id_u" value="<?php echo $_SESSION['id'] ?>"> 
				<table>
				<thead>
									<tr>
									<th>Nombre</th><th>Fecha</th><th>Horario Entrada</th><th>Inicio Refrigerio</th><th>Salida Refrigerio</th><th>Horario Salida</th><th>Marcacion Ingreso</th><th>Marcacion de inicio Refrigerio</th><th>Marcacion de fin Refrigerio</th><th>Marcacion Salida</th><th>Tardanza</th><th>Salida temprana</th><th>Worktime</th><th>Tiempo total</th>
									
									</tr>
								</thead>
			 			<tbody id="resultSearch">
	 
						
						</tbody>
				</table>

				
				
			
				
		
			
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<script type="text/javascript" src="index.js"></script>
						
</body>
</html>