<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$comment_id = $_POST['hid_comment_id'];
		$video_id = $_POST['comment_video_id2'];
		$status = $_POST['comment_status'];

	  	$sql = "UPDATE comment SET status = '$status' WHERE comment_id = '$comment_id' LIMIT 1";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$sql2 = "UPDATE reply SET status = '$status' WHERE comment_id = '$comment_id'";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				$_SESSION['message'] = 'You Have Successfully Updated the Comment Status.';

				header("Location: comments_replies.php?video_id=" . $video_id);
			}
		}
	}
?>