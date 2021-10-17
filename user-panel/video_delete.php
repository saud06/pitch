<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$video_id = $_POST['dlt_video_id'];

	  	$sql = "SELECT * FROM video WHERE video_id = '$video_id' LIMIT 1";
	    $result = $con->query($sql);
	    $formdata = $result->fetch_assoc();
	    $video = $formdata['video_title'];

	  	$sql2 = "DELETE FROM video WHERE video_id = '$video_id'";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Deleted the Video: <strong>' . $video . '</strong>.';

			header("Location: video.php");
		}
	}
?>