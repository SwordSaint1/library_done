<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'register_borrowers') {
	$borrowers_id = $_POST['borrowers_id'];
	$full_name = $_POST['full_name'];
	$gender = $_POST['gender'];
	$contact_no = $_POST['contact_no'];
	$course = $_POST['course'];
	$c = 0;

	$check = "SELECT id FROM borrower_details WHERE borrowers_id = '$borrowers_id'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'Borrower ID Already Used';
	}else{
		$query = "INSERT INTO borrower_details (`borrowers_id`,`full_name`,`gender`,`contact_no`,`course_year`) VALUES ('$borrowers_id', '$full_name','$gender','$contact_no','$course')";
		$stmt2 = $conn->prepare($query);
		if ($stmt2->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
}


if ($method == 'fetch_borrower_user') {
	$full_name = $_POST['full_name'];
	$c = 0;

	$query ="SELECT * FROM borrower_details WHERE full_name LIKE '$full_name%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr  style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_borrower" onclick="get_borrower_details(&quot;'.$j['id'].'~!~'.$j['borrowers_id'].'~!~'.$j['full_name'].'~!~'.$j['gender'].'~!~'.$j['contact_no'].'~!~'.$j['course_year'].'~!~'.$j['points'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['borrowers_id'].'</td>';
				echo '<td>'.$j['full_name'].'</td>';
				echo '<td>'.$j['gender'].'</td>';
				echo '<td>'.$j['contact_no'].'</td>';
				echo '<td>'.$j['course_year'].'</td>';
				echo '<td>'.$j['points'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="7" style="color:red;">No Result<td>';
			echo '</tr>';
	}
}



if ($method == 'fetch_borrower_user_penalty') {
	$full_name = $_POST['full_name'];
	$c = 0;
	
	$query = "SELECT sum(datediff('$server_date_only',borrowed_books.due_date) * 10) as penalty,borrower_details.points,borrower_details.full_name,borrower_details.borrowers_id,
		borrower_details.gender,borrower_details.contact_no,borrower_details.course_year,borrower_details.id FROM borrowed_books LEFT JOIN borrower_details ON borrower_details.borrowers_id = borrowed_books.borrowers_id WHERE borrowed_books.status = 'Borrow' AND borrower_details.full_name LIKE '$full_name%' GROUP BY borrowed_books.borrowers_id";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;

			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['borrowers_id'].'</td>';
				echo '<td>'.$j['full_name'].'</td>';
				echo '<td>'.$j['gender'].'</td>';
				echo '<td>'.$j['contact_no'].'</td>';
				echo '<td>'.$j['course_year'].'</td>';
				echo '<td>'.$j['penalty'].'</td>';
				echo '<td>'.$j['points'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="8" style="color:red;">No Result<td>';
			echo '</tr>';
	}
}

if ($method == 'update_borrower_details') {
	$id = $_POST['id'];
	$borrowers_id = $_POST['borrowers_id'];
	$full_name = $_POST['full_name'];
	$gender = $_POST['gender'];
	$contact_no = $_POST['contact_no'];
	$course_year = $_POST['course_year'];

	
	$query = "UPDATE borrower_details SET borrowers_id = '$borrowers_id', full_name ='$full_name', gender = '$gender', contact_no = '$contact_no', course_year = '$course_year' WHERE id = '$id'";
		$stmt = $conn->prepare($query);
		if ($stmt->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}	
}

if ($method == 'delete_borrower_details') {
	$id = $_POST['id'];
	$borrowers_id = $_POST['borrowers_id'];
	$full_name = $_POST['full_name'];
	$gender = $_POST['gender'];
	$contact_no = $_POST['contact_no'];
	$course_year = $_POST['course_year'];
	$query = "DELETE FROM borrower_details WHERE id ='$id'";
		$stmt = $conn->prepare($query);
		if ($stmt->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}	
}
$conn = NULL;
?>