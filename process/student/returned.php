<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_returned_books') {
	$student_id = $_POST['student_id'];
	$c = 0;
	$query = "SELECT book_details.title,book_details.description,borrowed_books.due_date,borrowed_books.returned_date,borrowed_books.acknowledge_by FROM book_details LEFT JOIN borrowed_books ON borrowed_books.book_qrcode = book_details.book_qrcode WHERE borrowed_books.status = 'Returned' AND borrowed_books.borrowers_id = '$student_id'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;

			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['title'].'</td>';	
				echo '<td>'.$j['description'].'</td>';
				echo '<td>'.$j['due_date'].'</td>';
				echo '<td>'.$j['returned_date'].'</td>';
				echo '<td>'.$j['acknowledge_by'].'</td>';
			echo '<tr>';
		}
	}else{
		echo '<tr>';
			echo '<td colspan="6" style="color:red;">No Result</td>';
		echo '</tr>';
	}
}



$conn = NULL;
?>