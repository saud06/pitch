<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$comment_id = $_POST['dlt_comment_id'];
		$video_id = $_POST['comment_video_id'];

	  	$sql = "DELETE FROM comment WHERE comment_id = '$comment_id'";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$sql2 = "DELETE FROM reply WHERE comment_id = '$comment_id'";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				$_SESSION['message'] = 'You have successfully deleted the comment and all of its replies.';

				header("Location: comments_replies.php?video_id=" . $video_id);
			}
		}
	}
?>