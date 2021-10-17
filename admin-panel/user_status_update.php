<?php 
	include('../config/config.php');

	if(isset($_POST['status']) && !empty($_POST['status'])){
		$user_id = $_POST['user_id'];
		$status = $_POST['status'];

		$sql = "UPDATE user SET status = '$status' WHERE user_id = '$user_id'";
	    if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$sql2 = "SELECT status FROM user WHERE user_id = '$user_id'";
			$result2 = $con->query($sql2);
			$formdata = $result2->fetch_assoc();

			echo json_encode($formdata['status']);
		}
	}
?>