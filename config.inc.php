<?php
$dbhost="localhost";
$dbname="asistencia";
$dbuser="root";
$dbpass="";

$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($db->connect_errno) {
	die ("<h1>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</h1>");
}
?>