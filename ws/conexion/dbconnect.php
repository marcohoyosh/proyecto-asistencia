<?php

$json = array(
    'msg' => 'Acceso Denegado.',
    'status' => 'Error'
);


try {
    $pdo = new PDO("mysql:host=localhost;dbname=asistencia2;charset=utf8", "root", "");
} catch (PDOException $message) {
    echo $message->getMessage();
}

