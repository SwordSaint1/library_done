<?php 
include '../conn.php';
 
$method = $_POST['method'];

if ($method == 'fetch_lost') {
	$student_id = $_POST['student_id'];
	$c = 0;

	$query ="SELECT book_details.title,borrowed_books.borrowed_date,borrowed_books.due_date,
(SELECT sum(datediff('$server_date_only',borrowed_books.due_date) * 10) as penalty 
FROM book_details 
LEFT JOIN borrowed_books ON book_details.book_qrcode = borrowed_books.book_qrcode 
WHERE borrowed_books.status = 'Lost' GROUP BY borrowed_books.status LIMIT 1) as penalty
FROM book_details LEFT JOIN borrowed_books ON borrowed_books.book_qrcode = book_details.book_qrcode 
WHERE borrowed_books.status = 'Lost' AND borrowed_books.due_date < '$server_date_only' 
AND borrowed_books.borrowers_id = '$student_id'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;

			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['title'].'</td>';
				echo '<td>'.$j['borrowed_date'].'</td>';
				echo '<td>'.$j['due_date'].'</td>';
				echo '<td>'.$j['penalty'].'</td>';
				echo '<td>For Replacement</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="5" style="color:red;">No Result!</td>';
			echo '</tr>';
	}		
}

$conn = NULL;
?>