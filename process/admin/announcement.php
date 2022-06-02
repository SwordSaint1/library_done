<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_announcement') {
	$datefrom = $_POST['datefrom'];
	$dateto = $_POST['dateto'];
	$c = 0;

	$query ="SELECT * FROM announcement WHERE (date_announce >='$datefrom' AND date_announce <= '$dateto')";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_announcement" onclick="get_announcement_details(&quot;'.$j['id'].'~!~'.$j['file_name'].'~!~'.$j['announcement_description'].'~!~'.$j['date_announce'].'~!~'.$j['image'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td><img src="../../process/admin/'.$j['image'].'" width="30px" height="30px"/></td>';
				echo '<td>'.$j['announcement_description'].'</td>';
				echo '<td>'.$j['date_announce'].'</td>';
			echo '</tr>';
			
			}
	}else{
			echo '<tr>';
				echo '<td colspan="4" style="color:red;">No Result!</td>';
			echo '</tr>';
	}
}

if ($method == 'delete_announcement') {
	$id = $_POST['id'];
	$query = "DELETE FROM announcement WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}
$conn = NULL;
?>