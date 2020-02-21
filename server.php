<?php		
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	$conn =new mysqli('localhost', 'root', '' , 'asistencia2');

	$sql = $conn->prepare("SELECT * FROM nieto WHERE nieto LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["nieto"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>