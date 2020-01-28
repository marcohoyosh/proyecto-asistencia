
<?php session_start(); 

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=asistencia2;charset=utf8","root","");
#lista de todos talleres 
$sql="SELECT * FROM nuevo n inner join nieto ni on ni.idnieto=n.idempleado";

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
	body {padding:50px;text-align:center;}
	fieldset p {width:33.3%;float:left;text-align:center;padding:50px}
	select{padding:10px;border:1px solid #bbb;border-radius:5px;margin:5px 0;display:block;box-shadow:0 0 10px #ddd;width:100%}
	input {padding:10px 50px;margin:0 auto;}
	#resultados{margin:20px 0;padding:20px;border:10px solid #ddd;}
</style>


    <header class="site-header inicio">    
        <div class='contenedor contenido-header' id="myHeader">
            <div class="barra">   
                <a href=" index.php"><img src="imagenes/cmlogo.png" alt="Logo" height="85px" class="logo"></a>
                <h3>Bienvenido <?php echo $_SESSION["nombres"] ?> <a href="cerrar_cesion.php">Cerrar Sesion</a></h3>
                <nav class="navegacion">                                   
                                   
                </nav>   
            </div>         
        </div>
	</header>
<body>
		<h1>Control de Asistencia</h1>

		<fieldset>

		
			
			<div class="container">
					<div class="page-header text-left">
					<h1>Combobox (select) dinámicos <small>Con Php, Mysql y Jquery (Ajax)</small></h1>
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
					<table class="jorge" caption="juan">
					
					<tr>  
						
			
						<td>
							<input type="date" name="fecha1" step="1" min="2013-01-01" max="2020-12-31" step="7" value="">

						</td>
						<td>
							<input type="date" name="fecha" step="1" min="2013-01-01" max="2020-12-31" value="fecha1">

						</td>
					</tr>
					</table>
					<div class="row">
						
						<div class="col-md-4">
							<p><br><button id="enviar" type="submit" class="btn btn-default btn-block">Enviar</button></p>
						</div>
					
						</div>
						<div class="row">
							<div class="col-md-4">
								<p><b>El resultado es: </b></p><p id="resultado1"></p>
							</div>
						</div>
					</div>

				
				
				
			</div>
		</fieldset>

				
			<input type="hidden" name="id_u" value="<?php echo $_SESSION['id'] ?>"> 
				<table>
				<thead>
									<tr>
									<th>Nombre</th><th>fecha</th><th>Horario de Entrada</th><th>Inicio de Break</th><th>Salida de Break</th><th>Horario de salida</th><th>Marcacion de ingreso</th><th>Marcacion de inicio de break</th><th>Marcacion de fin de break</th><th>Marcacion de salida</th><th>tardanza</th><th>temprano</th><th>worktime</th><th>Tiempo total</th>
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