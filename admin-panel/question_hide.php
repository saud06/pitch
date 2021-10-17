<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$question_id = $_POST['hid_question_id'];
		$video_id = $_POST['question_video_id2'];
		$status = $_POST['question_status'];

	  	$sql = "UPDATE question SET status = '$status' WHERE question_id = '$question_id' LIMIT 1";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$sql2 = "UPDATE answer SET status = '$status' WHERE question_id = '$question_id'";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				$_SESSION['message'] = 'You have successfully updated the question and all of its answers status.';

				header("Location: questions_answers.php?video_id=" . $video_id);
			}
		}
	}
?>