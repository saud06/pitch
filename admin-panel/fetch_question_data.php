<?php 
	include('../config/config.php');

	if(isset($_POST['question_id']) && !empty($_POST['question_id'])){
		$question_id = $_POST['question_id'];
		
		$sql = "SELECT * FROM question WHERE question_id = '$question_id' LIMIT 1";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$formdata = $result->fetch_assoc();

			echo json_encode($formdata);
		}
	}
?>