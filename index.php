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
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Asistencia</title>
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
<link rel="stylesheet" href="index.css">

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
<nav class=" navbar navbar-expand-lg navbar-dark info-color" style="background-color: #33b5e5  !important">
  <a class="navbar-brand" href="#"><img src="imagenes/cmlogo.png" alt="Logo" width="150" class="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>  <?php echo $_SESSION["nombres"] ?> </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="cerrar_cesion.php"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
    
	</header>

<br>
<br>
<!-- Frame Modal Bottom -->
<div class="modal fade bottom" id="frameModalBottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-frame and then add class .modal-bottom (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-frame modal-bottom" role="document">


    <div class="modal-content">
      <div class="modal-body">
        <div class="row d-flex justify-content-center align-items-center">


		  <h3 class="modal-title w-100 text-center" style="font-size:24px; font-weight: none;font-family:Arial;" id="myModalLabel"> ¡ Bienvenido a ISC Control! </h3>

          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Frame Modal Bottom -->


<!-- Material form contact -->
<div class="card pt-0">

    <!--<h2 class="card-header info-color white-text text-center py-4" style="font-family: Arial; font-size: 20px;">
    

<strong>Control de Asistencia</strong>

</h1>
	</h2>
-->

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
 			 <div class="container col-md-3 md-form mt-3">
			<label >Departamento</label>
			<br>
			<br>
			<select id="videos" name="video" class="form-control col-lg-10">
			</select>
            </div>

			 <!-- Empleados -->
			  <div class="container col-md-3 md-form mt-3">
			<label >Empleados</label>
			<br>
			<br>
			<select id="nietos" name="nieto" class="form-control col-lg-10">
			</select>
            </div>

            <!-- Fechas -->
            <div class="row col-md-3 md-form mt-3">
			
			<div class="col-md-12 pb-2">
			<label class="pl-2" >Rango de Fecha</label>
			</div>
			
			<div class="container col-md-6  col-lg-6">

			<div class="md-form pt-3">
			
 			 <input placeholder="Desde:" type="date" id="fecha1" name="fecha1" step="1" class="form-control datepicker">
			</div>
			</div>

			<div class="container col-md-6 col-lg-6">

			<div class="md-form pt-3 ">
		
			<input placeholder="Hasta:" type="date" id="fecha2" name="fecha2" step="1" class="form-control datepicker">
			</div>
			</div>
			</div>
            </div>




			<div class="row botones">
			
			<div class="container col-md-12 " style="margin:15px 0px 20px 0px !important;font-family:Poppins">
			
										<button type="submit" id="enviar" type="submit"  value ="enviar" name ="enviar" class="btn btn-outline-secondary btn-rounded waves-effect col-md-2" style="border-radius:30px;font-family: Arial;">Consultar</button>
										<a target="_blank" class="btn btn-outline-danger btn-rounded waves-effect col-md-2" style="border-radius:30px;font-family: Arial;" href="alarma.php">Centro de alarmas</a>
										<button type="submit"  id="reportecito" type="submit"  value ="reportecito" name ="reportecito" class="btn btn-outline-info btn-rounded waves-effect col-md-2" style="border-radius:30px;font-family: Arial;">Reporte</button>

										 
										
										<?php if($_SESSION["rol"]==1) { ?>
											<button type="submit"  id="reportecito" type="submit"   value="ReporteIdoneo" id="ReporteIdoneo" name="ReporteIdoneo"  class="btn btn-outline-success btn-rounded waves-effect col-md-2"  style="border-radius:30px;font-family: Arial;">Reporte Idóneo</button>
											
										<?php } ?>
									</div>

			</div>


			</div>

        </form>
        <!-- Form -->

    </div>

</div>
<style>
	</style>
<div class=" container p-5  "   style="overflow-x:auto;">
<table class="table "  style="max-height:1px">
  <thead class="white-text text-center blue " id = "cabecera">
    <tr class="  p-0 m-0 " >
		<th class=" font-weight-bold h4" >TIEMPO LABORADO</th>
		<th class=" font-weight-bold h4" colspan="3">TIEMPO NO LABORADO</th>	
    </tr>

	<tr class="p-0 m-0 ">
						<td class=" font-weight-bold">Total</td>	
						<td class=" font-weight-bold">Tardanzas</td>
						<td class=" font-weight-bold">Salidas Tempranas</td>
						<td class=" font-weight-bold">No marcadas</td>
    </tr>
  </thead>

  <tbody  colspan="3" id="resumen" class="text-center white-text" >
	
					
  </tbody>
</table>
</div>


<div class="container table-responsive pl-4" style="overflow-x:auto;">
<table class="w3-table-all"  >
  <thead>
    <tr class="w3-red">
	<th scope="col">Nombre</th>
	<th   scope="col">Fecha</th>
	<th   scope="col">Horario Entrada</th>
	<th   scope="col">Inicio Refrigerio</th>
	<th   scope="col">Salida Refrigerio</th>
	<th   scope="col">Horario Salida</th>
	<th   scope="col">Marcacion Ingreso</th>
	<th   scope="col">Inicio Refrigerio</th>
	<th   scope="col">Fin Refrigerio</th>
	<th   scope="col">Marcacion Salida</th>
	<th   scope="col">Tardanza</th>
	<th   scope="col">Salida temprana</th>
	<th   scope="col">Worktime</th>
	<th   scope="col">Tiempo total</th>
											
    </tr>
  </thead>
  <tbody id="resultSearch" class="white-text" >
											
						
	 </tbody>
</table>
</div>


			
				
		
			
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