<?php 
	include('../config/config.php');

	if(isset($_POST['comment_id']) && !empty($_POST['comment_id'])){
		$comment_id = $_POST['comment_id'];
		
		$sql = "SELECT * FROM comment WHERE comment_id = '$comment_id' LIMIT 1";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$formdata = $result->fetch_assoc();

			echo json_encode($formdata);
		}
	}
?>