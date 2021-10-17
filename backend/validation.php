<?php 
	include('../config/config.php');

	if(isset($_POST['email']) && !empty($_POST['email'])){
		$email = $_POST['email'];

		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows > 0){
			echo json_encode(array("status" => TRUE));
		}
	}

	if(isset($_POST['upd_user_id']) && !empty($_POST['upd_user_id'])){
		$user_id = $_POST['upd_user_id'];
		$email = $_POST['upd_email'];

		$sql = "SELECT * FROM user WHERE email = '$email' AND user_id != '$user_id'";
	    $result = $con->query($sql);
		if($result->num_rows > 0){
			echo json_encode(array("status" => TRUE));
		}
	}

	else if(isset($_POST['login_email']) && !empty($_POST['login_email'])){
		$email = $_POST['login_email'];
		$password = $_POST['login_password'];
		$password = md5($password);

		$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows == 0){
			echo json_encode(array("status" => FALSE));
		} else {
			$formdata = $result->fetch_assoc();
			echo json_encode(array("status" => $formdata['status']));
		}
	}

	else if(isset($_POST['logged_in_email'])){
		$email = $_POST['logged_in_email'];

		$sql = "SELECT * FROM user WHERE email = '$email' AND status = 'Active' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows == 0){
			echo json_encode(array("status" => FALSE));
		}
	}
?>