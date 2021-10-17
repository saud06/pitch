<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$reply_id = $_POST['dlt_reply_id'];
		$video_id = $_POST['reply_video_id'];

	  	$sql = "DELETE FROM reply WHERE reply_id = '$reply_id'";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You have successfully deleted the reply.';

			header("Location: comments_replies.php?video_id=" . $video_id);
		}
	}
?>