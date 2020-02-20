<?php 
session_start();

if(!isset($_SESSION["id"])){
	header("Location: login.php");
	exit();
}




?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Asistencia</title>
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.13.0/css/mdb.min.css" rel="stylesheet">
</head>



    
<body>

<header>    

<!--Navbar -->
<nav class=" navbar navbar-expand-lg navbar-dark info-color" style="background-color: #737373 !important">
  <a class="navbar-brand" href="#"><img src="imagenes/cmlogo.png" alt="Logo" width="180" class="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> Perfil</a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="cerrar_cesion.php">Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
    
	</header>


<!-- Frame Modal Bottom -->
<div class="modal fade bottom" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-frame modal-bottom" role="document">


    <div class="modal-content">
      <div class="modal-body">
        <div class="row d-flex justify-content-center align-items-center">


		  <h3 class="modal-title w-100 text-center" style="font-size:24px; font-weight:bold;font-family:Poppins" id="myModalLabel"> ¡ Bienvenido   <?php echo $_SESSION["nombres"] ?>  ! </h3>

          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Frame Modal Bottom -->


<!-- Material form contact -->
<div class="card pt-0">

    <h2 class="card-header info-color white-text text-center py-4" style="font-family:Poppins">
    

<strong>Control de Asistencia</strong>

</h1>
    </h2>

    <!--Card content-->
    <div class="container-fluid card-body px-lg-5 pt-0">

        <!-- Form -->
        <form id="form1" action="reporte.php" method="POST" class="text-center" style="color: #757575;" action="#!">
			<div class="row col-md-12">

            <!-- Local -->
            <div class="container col-md-3 md-form mt-3">
			<label >Local</label>
			<br>
			<br>
			<select id="lista_reproduccion" name="lista_reproduccion" class="form-control col-lg-10">
			</select>
            </div>

 			<!-- Departamento -->
 			<div class="col-md-3 md-form mt-3">
			<label >Departamento</label>
			<br>
			<br>
			<select id="videos" name="video" class="form-control col-lg-10">
			</select>
            </div>

			 <!-- Empleados -->
			 <div class="col-md-3 md-form mt-3">
			<label >Empleados</label>
			<br>
			<br>
			<select id="nietos" name="nieto" class="form-control col-lg-10">
			</select>
            </div>

            <!-- Fechas -->
            <div class="row col-md-3 md-form mt-3">
			<label class="text-center">Rango de Fecha</label>
		
			<div class="col-md-6">

			<div class="md-form pt-3">
			
 			 <input placeholder="Desde:" type="date" id="fecha1" name="fecha1" step="1" class="form-control datepicker">
			</div>
			</div>

			<div class="col-md-6">

			<div class="md-form pt-3">
		
			<input placeholder="Hasta:" type="date" id="fecha2" name="fecha2" step="1" class="form-control datepicker">
			</div>
			</div>
			</div>
            </div>




			<div class="row botones">
			
			<div class="container col-md-12 " style="margin:15px 10px 15px 10px !important;font-family:Poppins">
										
										<button type="submit" id="enviar" type="submit"  value ="enviar" name ="enviar" class="btn btn-secondary btn-rounded waves-effect" style="border-radius:30px">Consultar</button>

										<button type="submit"  id="reportecito" type="submit"  value ="reportecito" name ="reportecito" class="btn btn-danger btn-rounded waves-effect" style="border-radius:30px">Reporte</button>

										 <a target="_blank" class="btn btn-warning btn-rounded waves-effect" style="border-radius:30px" href="alarma.php">Centro de alarmas</a>
										
										<?php if($_SESSION["rol"]==1) { ?>
									<input type="submit" class="btn btn-success btn-rounded waves-effect" style="border-radius:30px"	 value="ReporteIdoneo" id="ReporteIdoneo" name="ReporteIdoneo" />
											
										<?php } ?>
									</div>

			</div>


			</div>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form contact -->



<table class="table"  style="display: flex !important;align-items: center !important;justify-content: center !important;">
  <thead class="black white-text font-weight-bold ">
    <tr style="background-color: #737373 !important;">
	<th style="display: inline" scope="col">Nombre</th>
	<th  style="display: inline"  scope="col">Fecha</th>
	<th  style="display: inline"  scope="col">Horario Entrada</th>
	<th  style="display: inline"  scope="col">Inicio Refrigerio</th>
	<th  style="display: inline"  scope="col">Salida Refrigerio</th>
	<th  style="display: inline"  scope="col">Horario Salida</th>
	<th  style="display: inline"  scope="col">Marcacion Ingreso</th>
	<th  style="display: inline"  scope="col">Marcacion de inicio Refrigerio</th>
	<th  style="display: inline"  scope="col">Marcacion de fin Refrigerio</th>
	<th  style="display: inline"  scope="col">Marcacion Salida</th>
	<th  style="display: inline"  scope="col">Tardanza</th>
	<th  style="display: inline"  scope="col">Salida temprana</th>
	<th  style="display: inline"  scope="col">Worktime</th>
	<th  style="display: inline"  scope="col">Tiempo total</th>
											
    </tr>
  </thead>
  <tbody id="resultSearch">
	 
						
	 </tbody>
</table>








			<input type="hidden" name="id_u" value="<?php echo $_SESSION['id'] ?>"> 
			<table>
				<thead>
					
					<tr>
						<th>Tiempo Laborado</th>
						<th colspan="3">Tiempo no Laborado</th>					
					</tr>
					<tr>
					
						<td>total</td>	
						<td>Tardanzas</td>
						<td>Temprano</td>
						<td>No marcadas</td>
					</tr>							
					
					
				</thead>
				<tbody id="resumen">
	 
						
				</tbody>					
			</table>



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

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.13.0/js/mdb.min.js"></script>
</html>