<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_lost') {
	$borrowers_id = $_POST['borrowers_id'];
	$book_title = $_POST['book_title'];
	$due_date = $_POST['due_date'];
	$c = 0;

	$query ="SELECT borrowed_books.id,borrowed_books.borrowers_id,borrowed_books.due_date,book_details.title,book_details.description,borrower_details.points,borrowed_books.book_qrcode,borrowed_books.status,borrowed_books.borrowers_id  FROM borrowed_books LEFT JOIN book_details ON book_details.book_qrcode = borrowed_books.book_qrcode LEFT JOIN borrower_details on borrower_details.borrowers_id = borrowed_books.borrowers_id WHERE borrowed_books.borrowers_id LIKE '$borrowers_id%' AND book_details.title LIKE '$book_title%' AND borrowed_books.due_date LIKE '$due_date%' AND borrowed_books.status = 'lost'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#lost_book" onclick="get_lost_details(&quot;'.$j['id'].'~!~'.$j['title'].'~!~'.$j['description'].'~!~'.$j['due_date'].'~!~'.$j['borrowers_id'].'~!~'.$j['points'].'~!~'.$j['book_qrcode'].'~!~'.$j['status'].'~!~'.$j['borrowers_id'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['borrowers_id'].'</td>';
				echo '<td>'.$j['title'].'</td>';
				echo '<td>'.$j['description'].'</td>';
				echo '<td>'.$j['due_date'].'</td>';
			echo '<tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="6" style="color:red;">No Result</td>';
			echo '<tr>';
	}
}

if ($method == 'replace_book') {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$due_date = $_POST['due_date'];
	$book_qrcode = $_POST['book_qrcode'];
	$status = $_POST['status'];
	$borrowers_id = $_POST['borrowers_id'];

	$query ="UPDATE borrowed_books SET status = 'Returned', returned_date = '$server_date_only', status_count = status_count - 1 WHERE id = '$id' AND book_qrcode = '$book_qrcode'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		$query2 = "UPDATE book_details SET book_qty = book_qty + 1 WHERE book_qrcode = '$book_qrcode'";
		$stmt2 = $conn->prepare($query2);
		if ($stmt2->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}else{
		echo 'error';
	}
}
$conn = NULL;
?>