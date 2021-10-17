<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$reply_id = $_POST['hid_reply_id'];
		$video_id = $_POST['reply_video_id2'];
		$status = $_POST['reply_status'];

	  	$sql = "UPDATE reply SET status = '$status' WHERE reply_id = '$reply_id' LIMIT 1";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Updated the Reply Status.';

			header("Location: comments_replies.php?video_id=" . $video_id);
		}
	}
?>