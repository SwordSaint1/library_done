<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_borrowed') {
	$borrowers_id = $_POST['borrowers_id'];
	$book_title = $_POST['book_title'];
	$due_date = $_POST['due_date'];
	$c = 0;

	$query ="SELECT borrowed_books.id,borrowed_books.borrowers_id,borrowed_books.due_date,book_details.title,book_details.description,borrower_details.points,borrowed_books.book_qrcode  FROM borrowed_books LEFT JOIN book_details ON book_details.book_qrcode = borrowed_books.book_qrcode LEFT JOIN borrower_details on borrower_details.borrowers_id = borrowed_books.borrowers_id WHERE borrowed_books.borrowers_id LIKE '$borrowers_id%' AND book_details.title LIKE '$book_title%' AND borrowed_books.due_date LIKE '$due_date%' AND borrowed_books.status = 'Borrow'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#return_book" onclick="get_details(&quot;'.$j['id'].'~!~'.$j['title'].'~!~'.$j['description'].'~!~'.$j['due_date'].'~!~'.$j['borrowers_id'].'~!~'.$j['points'].'~!~'.$j['book_qrcode'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['borrowers_id'].'</td>';
				echo '<td>'.$j['title'].'</td>';
				echo '<td>'.$j['description'].'</td>';
				echo '<td>'.$j['due_date'].'</td>';
			echo '<tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="5" style="color:red;">No Result</td>';
			echo '<tr>';
	}
}

if ($method == 'recieve_book') {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$due_date = $_POST['due_date'];
	$borrowers_id = $_POST['borrowers_id'];
	$acknowledge_by = $_POST['acknowledge_by'];
	$recieved_date = $_POST['recieved_date'];
	$status_points = $_POST['status_points'];
	$points = $_POST['points'];
	$book_qrcode = $_POST['book_qrcode'];
	$check ="SELECT id FROM borrowed_books WHERE id = '$id' AND status = 'Borrow' AND borrowers_id = '$borrowers_id'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		$query ="UPDATE borrowed_books SET acknowledge_by = '$acknowledge_by', returned_date = '$recieved_date', status = 'Returned', status_count = status_count - 1 WHERE id = '$id' AND due_date = '$due_date'";
		$stmt2 = $conn->prepare($query);
		if ($stmt2->execute()) {

			if ($status_points == 'ontime') {
				$points = "UPDATE borrower_details SET points = points + 5 WHERE borrowers_id = '$borrowers_id'";
				$stmt3 = $conn->prepare($points);
				if ($stmt3->execute()) {
					$return_qty = "UPDATE book_details SET book_qty = book_qty + 1 WHERE book_qrcode = '$book_qrcode'";
					$stmt6 = $conn->prepare($return_qty);
					if ($stmt6->execute()) {
						echo 'success';
					}else{
						echo 'error';
					}
				}else{
					echo 'error';
				}
			}
			elseif($status_points == 'overdue' && $points <= 3){
				$penalty = "UPDATE borrower_details SET points = 0 WHERE borrowers_id = '$borrowers_id'";
				$stmt4 = $conn->prepare($penalty);
				if ($stmt4->execute()) {
					$return_qty3 = "UPDATE book_details SET book_qty = book_qty + 1 WHERE book_qrcode = '$book_qrcode'";
					$stmt8 = $conn->prepare($return_qty3);
					if ($stmt8->execute()) {
						echo 'success';
					}else{
						echo 'error';
					}
				}else{
					echo 'error';
				}
			}elseif($status_points == 'lost'){
				$lost = "UPDATE borrowed_books SET status = 'lost',returned_date = NULL, status_count = 1 WHERE id = '$id'";
				$stmt9 = $conn->prepare($lost);
				if ($stmt9->execute()) {
					echo 'success';
				}else{
					echo 'error';
				}
			}
			else{
				$penalty2 = "UPDATE borrower_details SET points = points - 3 WHERE borrowers_id = '$borrowers_id'";
				$stmt5 = $conn->prepare($penalty2);
				if ($stmt5->execute()) {
					$return_qty2 = "UPDATE book_details SET book_qty = book_qty + 1 WHERE book_qrcode = '$book_qrcode'";
					$stmt7 = $conn->prepare($return_qty2);
					if ($stmt7->execute()) {
						echo 'success';
					}else{
						echo 'error';
					}
				}else{
					echo 'error';
				}
			}

		}
		else{
			echo 'error';
		}
	}else{	
			echo 'Student QR-Code Unmatched';
		}
}

$conn = NULL;
?>