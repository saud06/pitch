<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$question_id = $_POST['dlt_question_id'];
		$video_id = $_POST['question_video_id'];

	  	$sql = "DELETE FROM question WHERE question_id = '$question_id'";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$sql2 = "DELETE FROM answer WHERE question_id = '$question_id'";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				$_SESSION['message'] = 'You have successfully deleted the question and all of its answers.';

				header("Location: questions_answers.php?video_id=" . $video_id);
			}
		}
	}
?>