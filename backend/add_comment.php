<?php 
	include('../config/config.php');

	if(isset($_POST['video_id']) && !empty($_POST['video_id'])){
		$user_ip = $_SERVER['REMOTE_ADDR'];

		$video_id = $_POST['video_id'];
		$video_user_id = $_POST['video_user_id'];
		$user_id = $_POST['user_id'];
		$details = $_POST['comment_details'];

		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');

		$sql = "INSERT INTO comment (details, no_of_likes, no_of_dislikes, creation_datetime, status, video_id, video_user_id, user_id) VALUES('$details', 0, 0, '$creation_datetime', 'Active', '$video_id', '$video_user_id', '$user_id')";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$sql2 = "INSERT INTO history (likes, dislikes, comments, replies, questions, answers, user_ip, creation_datetime, status, video_id, video_user_id, user_id) VALUES(0, 0, 1, 0, 0, 0, '$user_ip', '$creation_datetime', 'Active', '$video_id', '$video_user_id', '$user_id')";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				echo json_encode(array("status" => TRUE));
			}
		}
	}
?>