<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_how_to_borrow') {
	$c = 0;
	$query = "SELECT * FROM how_to_borrow";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;

			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['description'].'</td>';
			echo '<tr>';
		}
	}else{
		echo '<tr>';
			echo '<td colspan="2" style="color:red;">No Result</td>';
		echo '</tr>';
	}
}



$conn = NULL;
?>