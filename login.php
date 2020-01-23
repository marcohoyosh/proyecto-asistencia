<?php

#inicia sesion
session_start();

#entra si no existe la variable id guardada en la sesion
if(!isset($_SESSION["id"])){
    
    #entra si existe una cookie guardada con la id del usuario
    if(isset($_COOKIE["id_usuario"])){
        $id=$_COOKIE["id_usuario"];
        
        #crear pdo
        $pdo=new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8","root","");
    
        #construir comando
        $sql="SELECT * 
        FROM $tab_usuario 
        WHERE $id_usuario = '$id'";
    
        #ejecutar comando
        $resultado=$pdo->query($sql);
        $fila=$resultado->fetch();
    
        #se guardan las variables usuario, nombres, apellidos y email
        $_SESSION["id"]=$id;
        $_SESSION["usuario"]=$fila[$user_usuario];
        $_SESSION["nombres"]=$fila[$nom_usuario];
        $_SESSION["apellidos"]=$fila[$ape_usuario];
        $_SESSION["email"]=$fila[$email_usuario];
        $_SESSION["direccion"]=$fila[$dir_usuario];
        $_SESSION["fecha_nac"]=$fila[$fecha_nac_usuario];
    }
} else{
    if(isset($_SESSION["id"])){
        header("Location: ../index.php");
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
    <title>Sesion</title>
</head>
<body>
    <div class="contenido">
    <?php if(isset($_GET["m"])){ 
        if($_GET["m"]=="p"){ ?>
    <p style="color:red">El password es incorrecto</p>
    <?php } if($_GET["m"]=="u"){ ?>
    <p style="color:red">El nombre de usuario es incorrecto</p>
    <?php }} ?>
        <form action="procesar-login.php" method="post">
        
            <div class="Formulario">
                <h2 style="color:rgb(156, 28, 11);padding=0">Ingresa con tu cuenta</h2>
                    <div class="elemento">
                    
                    <p style="color:red">Nombre de usuario:</p>
                    <input type="text" name="u" id="" placeholder="nombre de usuario" autofocus required>
                    </div>
                    <div class="elemento">
                    <p style="color:red">Contraseña:</p>
                    <input type="password" name="p" id="" placeholder="contraseña" required>
                    </div>
                    <div class="elemento iniciada">
                    <input type="checkbox" name="s" value="1">
                    Mantener sesión iniciada
                    </div>
                    <button type="submit" class="elemento">Entrar</button>
                    
            </div>
                

        </form>
    </div>
</body>
</html>