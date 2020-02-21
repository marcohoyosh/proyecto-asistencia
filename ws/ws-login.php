<?php

include('./conexion/dbconnect.php');

$user = htmlspecialchars(trim($_POST['user']));
$pass = htmlspecialchars(trim($_POST['pass']));

if (!empty($user) && !empty($pass)) {
    $query = $pdo->prepare("SELECT * FROM administradores WHERE Nombres = '" . $user . "' and Contraseña = '" . $pass . "' LIMIT 1;");
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($data[0])) {
        session_start();
        
        $_SESSION['id'] = @$data[0]['Id'];
        $_SESSION['nombres'] = @$data[0]['Nombres'];
        $_SESSION['apellidos'] = @$data[0]['Apellidos'];
        $_SESSION['correo'] = @$data[0]['Correo'];
        $_SESSION['contraseña'] = @$data[0]['Contraseña'];
        $_SESSION['rol'] = @$data[0]['Rol'];

        $json['status'] = 'Ok';
        $json['msg'] = 'Bienvenido.';
    } else {
        $json['msg'] = 'El usuario o contraseña es incorrecta.';
    }
    // si usuario existe enviar en un session el rol ejm: $_SESSION['Rol']
} else {
    if (empty($user)) {
        $json['msg'] = 'Ingrese un usuario.';
    } else if (empty($pass)) {
        $json['msg'] = 'Ingrese un password.';
    } else {
        $json['msg'] = 'Los campos son obligatorios.';
    }
}

header('Content-Type: application/json');
echo json_encode($json);
