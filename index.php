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
<h1>Combobox o Select Dependientes con PHP, Json y Jquery</h1>
<p>
<strong>Nota:</strong> Para nuestro ejemplo, utilizamos 3 selects. Cada uno har&aacute; recargar a su hijo mediante json</p>
</p>
<div id="resultados">
<?php
if (isset($_POST)) print_r($_POST);
?>
</div>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="combobox">
	<fieldset>
		<p><label>Padre:</label><?php combo($db,"idpadre","","padre","idpadre,padre",1,"padre","asc",1); ?></p>
		<p id="combo_1"><label>Hijo:</label><?php combo($db,"idhijo","","hijo","idhijo,hijo",1,"hijo","asc",0); ?></p>
		<p id="combo_2"><label>Nieto:</label><?php combo($db,"idnieto","","nieto","idnieto,nieto",1,"nieto","asc",0); ?></p>
		<input type="submit" name="submit" value="Mostrar resultados">
	</fieldset>
</form>

</body>
</html>