<?php session_start(); ?>
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
       <div>
    <form action="rangotienda.php" method="post">
    
    <input type="hidden" name="id_u" value="<?php echo $_SESSION['id'] ?>"> 
        <table class="jorge" caption="juan">
            
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
                <td>
                    <button type="submit" class="boton">Consultar</button>
                </td>
            </tr>
        </table>
        
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