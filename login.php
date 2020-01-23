<?php 
session_start();
#te regresa a index si es que ya iniciaste sesion con tu usuario
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
                <h2>Ingresar con tu cuenta</h2>
                    <div class="elemento">
                    Nombre de usuario:<br>
                    <input type="text" name="u" id="" placeholder="nombre de usuario" autofocus required>
                    </div>
                    <div class="elemento">
                    Contraseña:<br>
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