<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_returned') {
	$borrowers_id = $_POST['borrowers_id'];
	$book_title = $_POST['book_title'];
	$date_returned = $_POST['date_returned'];
	$c = 0;

	$query ="SELECT borrowed_books.returned_date,borrowed_books.id,borrowed_books.borrowers_id,borrowed_books.due_date,book_details.title,book_details.description,borrower_details.points  FROM borrowed_books LEFT JOIN book_details ON book_details.book_qrcode = borrowed_books.book_qrcode LEFT JOIN borrower_details on borrower_details.borrowers_id = borrowed_books.borrowers_id WHERE borrowed_books.borrowers_id LIKE '$borrowers_id%' AND book_details.title LIKE '$book_title%' AND borrowed_books.returned_date LIKE '$date_returned%' AND borrowed_books.status = 'Returned'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['borrowers_id'].'</td>';
				echo '<td>'.$j['title'].'</td>';
				echo '<td>'.$j['description'].'</td>';
				echo '<td>'.$j['due_date'].'</td>';
				echo '<td>'.$j['returned_date'].'</td>';
			echo '<tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="6" style="color:red;">No Result</td>';
			echo '<tr>';
	}
}

$conn = NULL;
?>