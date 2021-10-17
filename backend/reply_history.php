<?php 
	include('../config/config.php');

	if(isset($_POST['video_id']) && !empty($_POST['video_id'])){
		$video_id = $_POST['video_id'];
		$reply_id = $_POST['reply_id'];
		$user_ip = $_POST['user_ip'];
		$total_likes = $_POST['total_likes'];
		$total_dislikes = $_POST['total_dislikes'];
		$status_type = $_POST['status_type'];

		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');

		$sql = "SELECT * FROM history3 WHERE video_id = '$video_id' AND reply_id = '$reply_id' AND user_ip = '$user_ip' LIMIT 1";
	    $result = $con->query($sql);
	    $formdata = $result->fetch_assoc();

		if($result->num_rows == 0){
			if($status_type == 'like'){
				$like_status = 1;
				$dislike_status = 0;
				$total_likes += 1;
				$state = 'like';
			} else{
				$like_status = 0;
				$dislike_status = 1;
				$total_dislikes += 1;
				$state = 'dislike';
			}

			$sql2 = "INSERT INTO history3 (like_status, dislike_status, user_ip, creation_datetime, video_id, reply_id) VALUES('$like_status', '$dislike_status', '$user_ip', '$creation_datetime', '$video_id', '$reply_id')";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				$sql3 = "UPDATE reply SET no_of_likes = '$total_likes', no_of_dislikes = '$total_dislikes' WHERE video_id = '$video_id' AND reply_id = '$reply_id' LIMIT 1";
	    		if(!$con->query($sql3)){
					die(mysqli_error($con));
				} else{
					echo json_encode(array("status" => TRUE));
				}
			}
		} else{
			$like_status = $formdata['like_status'];
			$dislike_status = $formdata['dislike_status'];

			if($status_type == 'like' && $like_status == 1){
				$like_status = 0;
				$total_likes -= 1;
			} else if($status_type == 'like' && $dislike_status == 1){
				$like_status = 1;
				$dislike_status = 0;
				$total_likes += 1;
				$total_dislikes -= 1;
			} else if($status_type == 'dislike' && $dislike_status == 1){
				$dislike_status = 0;
				$total_dislikes -= 1;
			} else if($status_type == 'dislike' && $like_status == 1){
				$like_status = 0;
				$dislike_status = 1;
				$total_dislikes += 1;
				$total_likes -= 1;
			} 

			if($like_status == 0 && $dislike_status == 0){
				$sql2 = "DELETE FROM history3 WHERE video_id = '$video_id' AND reply_id = '$reply_id' AND user_ip = '$user_ip'";

				if(!$con->query($sql2)){
					die(mysqli_error($con));
				} else{
					$sql3 = "UPDATE reply SET no_of_likes = '$total_likes', no_of_dislikes = '$total_dislikes' WHERE video_id = '$video_id' AND reply_id = '$reply_id' LIMIT 1";
		    		if(!$con->query($sql3)){
						die(mysqli_error($con));
					} else{
						echo json_encode(array("status" => TRUE));
					}
				}
			} else{
				$sql2 = "UPDATE history3 SET like_status = '$like_status', dislike_status = '$dislike_status' WHERE video_id = '$video_id' AND reply_id = '$reply_id' AND user_ip = '$user_ip'";

				if(!$con->query($sql2)){
					die(mysqli_error($con));
				} else{
					$sql3 = "UPDATE reply SET no_of_likes = '$total_likes', no_of_dislikes = '$total_dislikes' WHERE video_id = '$video_id' AND reply_id = '$reply_id' LIMIT 1";
		    		if(!$con->query($sql3)){
						die(mysqli_error($con));
					} else{
						echo json_encode(array("status" => TRUE));
					}
				}
			}
		}
	}
?>