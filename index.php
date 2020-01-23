<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>supervision</title>
</head>
<body>
    <div>
    <form action="../Funciones/procesar_adopcion.php" method="post">
    <input type="hidden" name="id_u" value="<?php echo $_SESSION['id'] ?>"> 
        <table>
            <tr>
                <td>
                    <select>
                        <option value="volvo">ATE</option>
                        <option value="saab">LA MOLINA</option>
                        <option value="mercedes">SANTA ANITA</option>
                        <option value="audi">SJL</option>
                    </select>
                </td>
                <td>
                    <input type="date" name="fecha1" step="1" min="2013-01-01" max="2020-12-31" step="7" value="">

                </td>
                <td>
                    <input type="date" name="fecha" step="1" min="2013-01-01" max="2020-12-31" value="fecha1">

                </td>
                
            </tr>
            
        </table>
        <div class="botones">
            <button type="submit" class="boton">Consultar</button>
        </div>
        <div id="main-container">

		<table class="2">
			<thead>
				<tr>
                <th>Nombre</th><th>Tardanzas</th><th>Antes</th><th>Incompletas</th><th>Otros motivos</th><th>Total</th><th>Ausencias no pagadas</th>
				</tr>
			</thead>

			<tr>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			</tr>
		</table>
	</div>
    </form>
    </div>
</body>
</html>