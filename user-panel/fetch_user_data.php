<?php 
	include('../config/config.php');

	if(isset($_POST['user_id']) && !empty($_POST['user_id'])){
		$user_id = $_POST['user_id'];
		
		$sql = "SELECT * FROM user WHERE user_id = '$user_id' LIMIT 1";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$formdata = $result->fetch_assoc();

			echo json_encode($formdata);
		}
	}
?>