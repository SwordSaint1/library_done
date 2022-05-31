<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_search_book') {
	$title = $_POST['title'];
    $category = $_POST['category'];
    $c = 0;

    $query = "SELECT * FROM book_details WHERE title LIKE '$title%' AND category LIKE '$category%'";
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
    			echo '<td>'.$j['book_qty'].'</td>';
                echo '<td>'.$j['location'].'</td>';
                echo '<td>'.$j['shelf'].'</td>';
    		echo '</tr>';
    	}
    }else{
    		echo '<tr>';
    			echo '<td colspan="8" style="color:red;">No Result</td>';
    		echo '</tr>';
    }
}
$conn = NULL;
?>