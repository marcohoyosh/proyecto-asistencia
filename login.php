<?php 
session_start();
    

    #entra si no existe la variable id guardada en la sesion
    if(!isset($_SESSION["id"])){
        
        #entra si existe una cookie guardada con la id del usuario
        if(isset($_COOKIE["id"])){
            $id=$_COOKIE["id"];
            
            #crear pdo
            $pdo=new PDO("mysql:host=localhost;dbname=asistencia;charset=utf8","root","");
        
            #construir comando
            $sql="SELECT * 
            FROM usuarios 
            WHERE Id = '$id'";
        
            #ejecutar comando
            $resultado=$pdo->query($sql);
            $fila=$resultado->fetch();
        
            #se guardan las variables usuario, nombres, apellidos y email
            $_SESSION["id"]=$fila["Id"];
            $_SESSION["nombres"]=$fila["Nombres"];
            $_SESSION["apellidos"]=$fila["Apellidos"];
            $_SESSION["correo"]=$fila["Correo"];
            $_SESSION["contraseña"]=$fila["Contraseña"];
        }
    } 

    if(isset($_SESSION["id"])){
        header("Location: index.php");
        exit();
} 
 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="hojaestilos.css">
    <title>Asistencia</title>
</head>
<body >
    
    <div class="contenido">
    <?php if(isset($_GET["m"])){ 
        if($_GET["m"]=="p"){ ?>
    <p style="color:red">El password es incorrecto</p>
    <?php } if($_GET["m"]=="u"){ ?>
    <p style="color:red">El nombre de usuario es incorrecto</p>
    <?php }} ?>
        <form action="procesar-login.php" method="post">
        
            <div class="Formulario">
                <img src="imagenes/logo.png">
                <h3 style=>Inicia sesión</h3>
                    <div class="elemento">
                    
                    <p style="color:black">Nombre de usuario:</p>
                    <input type="text" name="u" id="" placeholder="Nombre de usuario" autofocus required>
                    </div>
                    <div class="elemento">
                    <p style="color:black">Contraseña:</p>
                    <input type="password" name="p" id="" placeholder="Contraseña" required>
                    </div>
                    <div class="elemento iniciada">
                    <input type="checkbox" name="s" value="1">
                    <label for="s">Mantener sesión iniciada</label>                    
                    </div>
                    <button type="submit" class="elemento">Entrar</button>
                    
            </div>
            <div>
                
            </div>
                

        </form>
    </div>
</body>
</html>