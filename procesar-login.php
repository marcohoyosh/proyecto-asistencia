<?php

#verifica se se entro por post o si se entro con boton regresar
if($_SERVER['REQUEST_METHOD']!='POST' || isset($_POST["b"])){
    header("Location: index.php");
    exit();
}

#crear pdo
$pdo=new PDO("mysql:host=localhost;dbname=asistencia3;charset=utf8","root","");

#leer datos de post
$usuario=$_POST["u"];
$password=$_POST["p"];
$regresar=$_POST["b"];

#construir comando
$sql="SELECT * FROM administradores
WHERE Nombres = '$usuario'";

#ejecutar comando
$resultado=$pdo->query($sql);
$fila=$resultado->fetchAll();

#verifica si hay un usuario con el nombre de usuario proporcionado
if(count($fila)!=0){
    if($fila[0]["Contraseña"]==$password){
        #login satisfactorio
        #se inicia la sesion y se guardan las variables id, usuario, nombres, apellidos y email
        session_start();
        $_SESSION["id"]=$fila[0]["Id"];
        $_SESSION["nombres"]=$fila[0]["Nombres"];
        $_SESSION["apellidos"]=$fila[0]["Apellidos"];
        $_SESSION["correo"]=$fila[0]["Correo"];
        $_SESSION["contraseña"]=$fila[0]["Contraseña"];
        $_SESSION["rol"]=$fila[0]["Rol"];

        #entra si desea crear la cookie
        if(isset($_POST["s"])){
            #verificar que no exista la cookie
            if(!isset($_COOKIE["id"])){
                #crear cookie id_usuario con valor del id de usuario proporcionado, duracion un mes
                setcookie("id",$fila[0]["Id"], time()+(60*60*24*30));
            }
        }
        #regresar a index
        header("Location: index.php");
    }else{
        #si el pass es diferente regresar a login con m=p
        header("Location: login.php?m=p");
        exit();
    }
    
}else{
    #si no hay usuario regresar a login con variable m=u
    header("Location: login.php?m=u");
    exit();
}

?>