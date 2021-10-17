<?php 
	include('../config/config.php');

	if(isset($_POST['reply_id']) && !empty($_POST['reply_id'])){
		$reply_id = $_POST['reply_id'];
		
		$sql = "SELECT * FROM reply WHERE reply_id = '$reply_id' LIMIT 1";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$formdata = $result->fetch_assoc();

			echo json_encode($formdata);
		}
	}
?>