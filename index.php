<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                    <input type="date" name="cumpleanios" step="1" min="2013-01-01" max="2020-12-31" value="">

                </td>
                <td>
                    <input type="date" name="cumpleanios" step="1" min="2013-01-01" max="2020-12-31" value="">

                </td>
                
            </tr>
            
        </table>
        <div class="botones_adopcion">
            <button type="submit">Adoptar seleccionados</button>
            <button type="submit" name="b">Regresar a inicio</button>
        </div>
    </form>
    </div>
</body>
</html>