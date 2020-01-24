<?php session_start(); 

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=asistencia;charset=utf8","root","");
#lista de todos talleres 
$sql="SELECT * FROM nuevo";
?>
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
                            <th>Nombre</th><th>fecha</th><th>Horario de Entrada</th><th>Inicio de Break</th><th>Salida de Break</th><th>Horario de salida</th><th>Marcacion de ingreso</th><th>Marcacion de inicio de break</th><th>Marcacion de fin de break</th><th>Marcacion de salida</th><th>tardanza</th><th>temprano</th><th>worktime</th><th>Tiempo total</th>
                            </tr>
                        </thead>

                        <?php
                            foreach($pdo->query($sql) as $fila) { ?>
                                <tr>
                                <td><?php echo $fila["id"] ?></td>
                                <td><?php echo $fila["fecha"] ?></td>
                                <td><?php echo $fila["horingreso"] ?></td>
                                <td><?php echo $fila["horibi"] ?></td>
                                <td><?php echo $fila["horibs"] ?></td>
                                <td><?php echo $fila["horisalida"] ?></td>
                                <td><?php echo $fila["maringreso"] ?></td>
                                <td><?php echo $fila["maribi"] ?></td>
                                <td><?php echo $fila["maribs"] ?></td>
                                <td><?php echo $fila["marsalida"] ?></td>
                                <td><?php echo $fila["tardanza"] ?></td>
                                <td><?php echo $fila["temprano"] ?></td>
                                <td><?php echo $fila["worktime"] ?></td>
                                <td><?php echo $fila["tiempototal"] ?></td>
                                </tr>
                                <?php
                                }
                        ?>
                    </table>
                </div>
    </form>
    </div>
</body>
</html>