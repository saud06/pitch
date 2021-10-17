<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$answer_id = $_POST['hid_answer_id'];
		$video_id = $_POST['answer_video_id2'];
		$status = $_POST['answer_status'];

	  	$sql = "UPDATE answer SET status = '$status' WHERE answer_id = '$answer_id' LIMIT 1";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You have successfully updated the answer status.';

			header("Location: questions_answers.php?video_id=" . $video_id);
		}
	}
?>