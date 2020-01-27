<?php 
$nameSeach=$_POST[nameSearch];
$message-"";
require("Connection.php");
$sql=mysqli_query($connection,"SELECT * FROM user
WHERE Name like ´%nameSeach%´
or AGE LIKE '%nameSearch%'");

while($result = mysqli_fetch_array($sql)){
        $id=$result['IdUser';]
        $name=$result['IdUser';]
        $age=$result['IdUser';]
        $message.='
        <tr>
        <td>'. $id. '</td>
        <td>'. $name. '</td>
        <td>'. $age. '</td>

        </tr>

        ';

}
        echo $message;
?>