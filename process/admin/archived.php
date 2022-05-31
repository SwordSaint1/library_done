<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_archived') {
	$title = $_POST['title'];
	$c = 0;

	$query ="SELECT * FROM archived_books WHERE title LIKE '$title%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;

			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#archived_book_details" onclick="get_archived_book_details(&quot;'.$j['id'].'~!~'.$j['title'].'~!~'.$j['description'].'~!~'.$j['author'].'~!~'.$j['date_publish'].'~!~'.$j['category'].'~!~'.$j['book_type'].'~!~'.$j['book_qty'].'~!~'.$j['acquisition_no'].'~!~'.$j['location'].'~!~'.$j['shelf'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['acquisition_no'].'</td>';
				echo '<td>'.$j['title'].'</td>';
				echo '<td>'.$j['description'].'</td>';
				echo '<td>'.$j['author'].'</td>';
				echo '<td>'.$j['date_publish'].'</td>';
				echo '<td>'.$j['category'].'</td>';
				echo '<td>'.$j['book_type'].'</td>';
				echo '<td>'.$j['book_qty'].'</td>';
				echo '<td>'.$j['location'].'</td>';
				echo '<td>'.$j['shelf'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="11" style="color:red;">No Result</td>';
			echo '</tr>';
	}
}

if ($method == 'return_to_masterlist') {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$author = $_POST['author'];
	$date_publish = $_POST['date_publish'];
	$category = $_POST['category'];
	$book_type = $_POST['book_type'];
	$book_qty = $_POST['book_qty'];
	$acquisition_no = $_POST['acquisition_no'];
	$location = $_POST['location'];
	$shelf = $_POST['shelf'];
	
	$query = "INSERT INTO book_details (`title`,`description`,`author`,`date_publish`,`category`,`book_type`,`book_qrcode`,`book_qty`,`location`,`shelf`,`acquisition_no`)SELECT title,description,author,date_publish,category,book_type,book_qrcode,book_qty,location,shelf,acquisition_no FROM archived_books WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		$query2 = "DELETE FROM archived_books WHERE id = '$id'";
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