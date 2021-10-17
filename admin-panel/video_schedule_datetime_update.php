<?php 
	session_start();
	include('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$video_id = $_POST['reschedule_video_id'];
		$schedule_datetime = $_POST['reschedule_datetime'];

		$sql = "UPDATE video SET schedule_datetime = '$schedule_datetime' WHERE video_id = '$video_id'";
	    if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'success_schedule';

			header("Location: video.php");
		}
	}
?>