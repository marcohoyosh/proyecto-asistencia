<?php 
session_start();
    

    #entra si no existe la variable id guardada en la sesion
    if(!isset($_SESSION["id"])){
        
        #entra si existe una cookie guardada con la id del usuario
        if(isset($_COOKIE["id"])){
            $id=$_COOKIE["id"];
            
            #crear pdo
            $pdo=new PDO("mysql:host=localhost;dbname=insiteso_asistencia2;charset=utf8","insiteso_root","mysql");
        
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
            <form action="procesar-login.php" method="post">
        
            <div class="logom">
                <img src="imagenes/cm2.png">
            </div>

                <div class="iconos">


                         <img src="imagenes/golden.png" class="lol"> 

                    
                        <img src="imagenes/lenacarbon.png" class="lol">  

                    
                        <img src="imagenes/retablo.png" class="lol">                
                    
                    
                        <img src="imagenes/tinajas.png" class="lol">                 
                    
                    
                        <img src="imagenes/cviche.png" class="lol">   
                        
                        
                        <img src="imagenes/lenasazon.png" class="lol">
                    
                
                </div>
                
            <div class="Formulario">                                          
                        <img src="imagenes/logo.png">
                    <div class="titulo">
                        <span>Control de asistencia</span>
                    </div>
                        <div class="elemento">
                        
                                    <div class="name">
                                    <!--<span>Nombre de usuario:</span>-->
                                    </div>
                                <input type="text" name="u" id="" placeholder="Nombre de usuario" autofocus required>
                                </div>
                                <?php if(isset($_GET["m"])){ 
                                    if($_GET["m"]=="u"){ ?>
                                    <div class="alerta">
                                    <span>Usuario inválido</span>
                                    </div>                                    
                                    <?php }} ?>
                                <div class="elemento">
                                <div class="name">
                                    <!--<span>Contraseña:</span>-->
                                    </div>
                                <input type="password" name="p" id="" placeholder="Contraseña" required>
                                </div>
                                <?php if(isset($_GET["m"])){
                                if($_GET["m"]=="p"){ ?>
                                    <div class="alerta">
                                    <span>Contraseña incorrecta</span>
                                    </div>
                                    <?php }} ?>
                                <div class="elemento iniciada">
                                <input type="checkbox" name="s" value="1">
                                <label for="s">Mantener sesión iniciada</label>                    
                                </div>
                                <button type="submit" class="elemento">Entrar</button>
                                
                                
                        
                        </div>
                                
                    
                </div>
                
             

        </form>
    </div>
</body>
</html>