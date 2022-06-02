<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_report') {
	$title = $_POST['title'];
	$c = 0;
	
	$query = "SELECT book_details.acquisition_no,book_details.title,book_details.description,book_details.author,book_details.date_publish,book_details.category,book_details.book_type,book_details.book_qty AS existing,book_details.location,book_details.shelf, borrowed_books.status,borrowed_books.status_count
	,(book_details.book_qty + sum(borrowed_books.status_count)) AS total_quantity FROM book_details LEFT JOIN borrowed_books ON borrowed_books.book_qrcode = book_details.book_qrcode GROUP BY book_details.book_qrcode,borrowed_books.status";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['acquisition_no'].'</td>';
				echo '<td>'.$j['title'].'</td>';
				echo '<td>'.$j['description'].'</td>';
				echo '<td>'.$j['author'].'</td>';
				echo '<td>'.$j['date_publish'].'</td>';
				echo '<td>'.$j['category'].'</td>';
				echo '<td>'.$j['book_type'].'</td>';
				echo '<td>'.$j['location'].'</td>';
				echo '<td>'.$j['shelf'].'</td>';
				echo '<td>'.$j['existing'].'</td>';
				echo '<td>'.$j['status'].'</td>';
				echo '<td>'.$j['status_count'].'</td>';
				echo '<td>'.$j['total_quantity'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="14" style="color:red;">No Result!</td>';
			echo '<tr>';
	}
}

$conn = NULL;
?>