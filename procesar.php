<?php
$idnieto = $_GET["nieto"];
$fecha1 = $_GET["fecha1"];
$fecha2 = $_GET["fecha2"];

header("Location: index.php?i='$idnieto'&f='$fecha1'&g='$fecha2'&w");
?>