<?php 
if(isset($_POST)) {
    $nameSearch=$_POST["nameSearch"];
            $message-"";
            require("connection.php");
            $sql=mysqli_query($connection,"SELECT * FROM nuevo n inner join nieto ni ni.idnieto=n.idempleado where nieto like %$nameSearch%'");

            while($result = mysqli_fetch_array($sql)){
                    $idempelado=$result['idempleado'];
                    $fecha=$result['fecha'];
                    $horingreso=$result['horingreso'];
                    $horibi=$result['horibi'];
                    $horibs=$result['horibs'];
                    $horisalida=$result['horisalida'];
                    $maringreso=$result['maringreso'];
                    $maribi=$result['maribi'];
                    $maribs=$result['maribs'];
                    $marsalida=$result['marsalida'];
                    $tardanza=$result['tardanza'];
                    $temprano=$result['temprano'];
                    $worktime=$result['worktime'];
                    $tiempototal=$result['tiempototal'];
                    $message.= '
                    <tr>
                    <td>'. $idempleado. '</td>
                    <td>'. $fecha. '</td>
                    <td>'. $horingreso. '</td>
                    <td>'. $horibi. '</td>
                    <td>'. $horibs. '</td>
                    <td>'. $horisalida. '</td>
                    <td>'. $maringreso. '</td>
                    <td>'. $maribi. '</td>
                    <td>'. $maribs. '</td>
                    <td>'. $marsalida. '</td>
                    <td>'. $tardanza. '</td>
                    <td>'. $temprano. '</td>
                    <td>'. $worktime. '</td>
                    <td>'. $tiempototal. '</td>
                    

                    </tr>

                    ';

            }
                    echo $message;
            }
?>