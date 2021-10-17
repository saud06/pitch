<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$answer_id = $_POST['dlt_answer_id'];
		$video_id = $_POST['answer_video_id'];

	  	$sql = "DELETE FROM answer WHERE answer_id = '$answer_id'";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You have successfully deleted the answer.';

			header("Location: questions_answers.php?video_id=" . $video_id);
		}
	}
?>