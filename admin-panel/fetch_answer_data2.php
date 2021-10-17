<?php 
	include('../config/config.php');

	if(isset($_POST['answer_id']) && !empty($_POST['answer_id'])){
		$answer_id = $_POST['answer_id'];
		
		$sql = "SELECT * FROM answer WHERE answer_id = '$answer_id' LIMIT 1";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$formdata = $result->fetch_assoc();

			echo json_encode($formdata);
		}
	}
?>