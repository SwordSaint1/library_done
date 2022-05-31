<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'register_user') {
	$full_name_accounts = $_POST['full_name_accounts'];
	$username_accounts = $_POST['username_accounts'];
	$password_accounts = $_POST['password_accounts'];
	$role_accounts = $_POST['role_accounts'];
	$c = 0;

	$check = "SELECT id FROM user_accounts WHERE username = '$username_accounts'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'Already Exist';
	}else{
		$query = "INSERT INTO user_accounts (`full_name`,`username`,`password`,`role`) VALUES ('$full_name_accounts', '$username_accounts','$password_accounts','$role_accounts')";
		$stmt2 = $conn->prepare($query);
		if ($stmt2->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
}

if ($method == 'fetch_user') {
	$full_name = $_POST['full_name'];
	$c = 0;
	$query = "SELECT * FROM user_accounts WHERE full_name LIKE '$full_name%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;

			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_accounts_user" onclick="get_user_details(&quot;'.$j['id'].'~!~'.$j['full_name'].'~!~'.$j['username'].'~!~'.$j['password'].'~!~'.$j['role'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['username'].'</td>';
				echo '<td>'.$j['full_name'].'</td>';
				echo '<td>'.$j['role'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="4" style="color:red;">No Result<td>';
			echo '</tr>';
	}
}

if ($method == 'update_users') {
	$id = $_POST['id'];
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	$query = "UPDATE user_accounts SET full_name = '$full_name', username = '$username', password = '$password', role = '$role' WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}
if ($method == 'delete_users') {
	$id = $_POST['id'];
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	$query = "DELETE FROM user_accounts WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

$conn = NULL;
?>