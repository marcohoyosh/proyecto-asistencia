<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
 $update_field='';
 if(isset($input['nombre'])) {
 $update_field.= "nombre='".$input['nombre']."'";
 } else if(isset($input['autor'])) {
 $update_field.= "autor='".$input['autor']."'";
 } else if(isset($input['isbn'])) {
 $update_field.= "isbn='".$input['isbn']."'";
 } else if(isset($input['categoria'])) {
 $update_field.= "categoria='".$input['categoria']."'";
 }
 if($update_field && $input['id']) {
     $id = $input['id'];
 $sql_query = "UPDATE libro SET $update_field WHERE id= '$id';
 mysqli_query($conn, $sql_query) or die("database error:".
mysqli_error($conn));
 }
}
?>
