<?php
require 'config.inc.php';
$valores=array();
$query = $db->query("SELECT ".$_GET["campos"]." from ".$_GET["tabla"]." where ".$_GET["referencia"]."='".$_GET["valor"]."'");
if($registro=$query->fetch_array())
{
	do
	{
		$valores[]=array("id"=>$registro[0],"label"=>$registro[1]);
	}
	while($registro=$query->fetch_array());
}

echo json_encode($valores);
?>