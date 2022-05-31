<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_borrowed') {
	$student_id = $_POST['student_id'];
	$c = 0;

	$query ="SELECT book_details.title,book_details.description,borrowed_books.due_date FROM book_details LEFT JOIN borrowed_books ON borrowed_books.book_qrcode = book_details.book_qrcode WHERE borrowed_books.status = 'Borrow'";
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
			echo '<tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="4" style="color:red;">No Result</td>';
			echo '<tr>';
	}
}

if ($method == 'borrow_books') {
	$student_id = $_POST['student_id'];
	$student_qr = $_POST['student_qr'];
	$book_qr = $_POST['book_qr'];
	$return_date = $_POST['return_date'];
	$verfication_borrower = $_POST['verfication_borrower'];

	$check ="SELECT book_qrcode, book_qty FROM book_details WHERE book_qrcode = '$book_qr'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$book_quantity = $j['book_qty'];

		$check2 = "SELECT borrowed_books.id,book_details.book_qty FROM borrowed_books LEFT JOIN book_details ON book_details.book_qrcode = borrowed_books.book_qrcode  WHERE borrowed_books.book_qrcode = '$book_qr' AND book_details.book_qty <= 0 AND borrowed_books.borrowers_id = '$student_qr' OR borrowed_books.status = 'Borrow'";
		$stmt2 = $conn->prepare($check2);
		$stmt2->execute();
		if ($stmt2->rowCount() > 0) {
			echo 'Not yet returned';
		}else{
			$query ="INSERT INTO borrowed_books (`borrowers_id`,`book_qrcode`,`borrowed_date`,`due_date`,`status`,`verify_by`) VALUES ('$student_id','$book_qr','$server_date_only','$return_date','Borrow','$verfication_borrower')";
			$stmt3 = $conn->prepare($query);
			if ($stmt3->execute()) {
				$query2 = "UPDATE book_details SET book_qty = book_qty - 1 WHERE book_qrcode = '$book_qr'";
				$stmt4 = $conn->prepare($query2);
				if ($stmt4->execute()) {
					echo 'success';
				}else{
					echo 'error';
				}
			}else{
				echo 'error';
			}
		}
		
	}
	}else{
		echo 'Book Not Exist';
	}


	
}

$conn = NULL;
?>