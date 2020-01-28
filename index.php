
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
<body>
    <header class="site-header inicio">    
        <div class='contenedor contenido-header' id="myHeader">
            <div class="barra">   
                <a href=" index.php"><img src="imagenes/cmlogo.png" alt="Logo" height="85px" class="logo"></a>
                <h3>Bienvenido <?php echo $_SESSION["nombres"] ?> <a href="cerrar_cesion.php">Cerrar Sesion</a></h3>
                <nav class="navegacion">                                   
                                   
                </nav>   
            </div>         
        </div>
</form>	
<?php
require_once "config.inc.php";

function combo($db,$nombre,$valor,$tabla,$campos,$condicion,$orden,$modo,$espadre)
{
	$query = "SELECT ".$campos." from ".$tabla." order by ".$orden." ".$modo;
	$consulta=$db->query($query);
	if ($hayregistros=$consulta->fetch_array())
	{
		echo "<select name='".$nombre."' id='".$nombre."'>";
			if ($espadre==1)
			{
				echo "<option value=''>Selecciona...</option>";
				do
				{
					echo "<option value='".$hayregistros[0]."'";
					if ($hayregistros[0]==$valor) echo " selected";
					echo ">".$hayregistros[1]."</option>\r\n";
				}
				while ($hayregistros=$consulta->fetch_array());
			}
		echo "</select>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
	<title>Ejemplo de Combobox o Select Dependientes con PHP y Jquery | Martin Iglesias</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
	function llamada(combo,tabla,campos,referencia,valor,seleccionada)
	{
		$(combo).empty().append("<option value=''>Cargando...</option>");
		$.ajax({
			dataType: "json",
			type: "GET",
			url: "combobox.php",
			data: { tabla:tabla,campos:campos,referencia: referencia, valor: valor }
		})
		.done(function(json) {
			$(combo).empty().append("<option value=''>Selecciona...</option>");
			$.each(json, function (i, items) {
				if(items !== null) if (items["id"]==seleccionada) $("<option>").appendTo(combo).val(items["id"]).text(items["label"]).attr("selected","selected");
				else if(items !== null) $("<option>").appendTo(combo).val(items["id"]).text(items["label"]);
			});
		});
	}
	
	$(document).ready(function() 
	{
		/* COMBOBOX */
		$(".combobox select:not(#idnieto)").change(function()
		{
			var idpadre = $("#idpadre").find(':selected').val();
			var idhijo = $("#idhijo").find(':selected').val();
			
			if (idpadre!="")
			{
				/* combo al hijo */
				llamada("#idhijo","hijo","idhijo,hijo","idpadre",idpadre,idhijo);
				llamada("#idnieto","nieto","idnieto,nieto","idhijo",idhijo,"");
			}
		});
	});
	</script>
	<style>
	* {margin: 0;padding: 0;font-family:sans-serif;border:0;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;-ms-box-sizing: border-box;box-sizing: border-box;}
	body {padding:50px;text-align:center;}
	fieldset p {width:33.3%;float:left;text-align:center;padding:50px}
	select{padding:10px;border:1px solid #bbb;border-radius:5px;margin:5px 0;display:block;box-shadow:0 0 10px #ddd;width:100%}
	input {padding:10px 50px;margin:0 auto;}
	#resultados{margin:20px 0;padding:20px;border:10px solid #ddd;}
	</style>
</head>
<body>
<h1>Control de Asistencia</h1>

<form method="post" action="consulta.php" class="combobox">
	<fieldset>
		<p><label>Local:</label><?php combo($db,"idpadre","","padre","idpadre,padre",1,"padre","asc",1); ?></p>
		<p id="combo_1"><label>Departamento:</label><?php combo($db,"idhijo","","hijo","idhijo,hijo",1,"hijo","asc",0); ?></p>
		<p id="combo_2"><label>Empleado:</label><?php combo($db,"idnieto","","nieto","idnieto,nieto",1,"nieto","asc",0); ?></p>
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
		
		<input type="submit" name="submit" value="Mostrar resultados">
	</fieldset>
</form>

</body>
</html>
        
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
		
    </div>
</body>
</html>