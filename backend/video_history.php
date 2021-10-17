<?php 
	include('../config/config.php');

	if(isset($_POST['video_id']) && !empty($_POST['video_id'])){
		$video_id = $_POST['video_id'];
		$video_user_id = $_POST['video_user_id'];
		$user_id = $_POST['user_id'];
		$user_ip = $_POST['user_ip'];
		$total_likes = $_POST['total_likes'];
		$total_dislikes = $_POST['total_dislikes'];
		$status_type = $_POST['status_type'];

		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');

		$sql = "SELECT * FROM history WHERE ((likes = 1 AND dislikes = 0) OR (likes = 0 AND dislikes = 1)) AND video_id = '$video_id' AND user_ip = '$user_ip' LIMIT 1";
	    $result = $con->query($sql);

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

			$sql2 = "INSERT INTO history (likes, dislikes, comments, replies, questions, answers, user_ip, creation_datetime, video_id, video_user_id, user_id) VALUES('$like_status', '$dislike_status', 0, 0, 0, 0, '$user_ip', '$creation_datetime', '$video_id', '$video_user_id', '$user_id')";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				$sql3 = "UPDATE video SET no_of_likes = '$total_likes', no_of_dislikes = '$total_dislikes' WHERE video_id = '$video_id' LIMIT 1";
	    		if(!$con->query($sql3)){
					die(mysqli_error($con));
				} else{
					echo json_encode(array("status" => TRUE));
				}
			}
		} else{
			$formdata = $result->fetch_assoc();

			$like_status = $formdata['likes'];
			$dislike_status = $formdata['dislikes'];
			$comment_status = $formdata['comments'];
			$reply_status = $formdata['replies'];
			$question_status = $formdata['questions'];
			$answer_status = $formdata['answers'];

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

			if($like_status == 0 && $dislike_status == 0 && $comment_status == 0 && $reply_status == 0 && $question_status == 0 && $answer_status == 0){
				$sql2 = "DELETE FROM history WHERE comments = 0 AND replies = 0 AND questions = 0 AND answers = 0 AND video_id = '$video_id' AND user_ip = '$user_ip'";

				if(!$con->query($sql2)){
					die(mysqli_error($con));
				} else{
					$sql3 = "UPDATE video SET no_of_likes = '$total_likes', no_of_dislikes = '$total_dislikes' WHERE video_id = '$video_id' LIMIT 1";
		    		if(!$con->query($sql3)){
						die(mysqli_error($con));
					} else{
						echo json_encode(array("status" => TRUE));
					}
				}
			} else{
				$sql2 = "UPDATE history SET likes = '$like_status', dislikes = '$dislike_status' WHERE comments = 0 AND replies = 0 AND questions = 0 AND answers = 0 AND video_id = '$video_id' AND user_ip = '$user_ip'";

				if(!$con->query($sql2)){
					die(mysqli_error($con));
				} else{
					$sql3 = "UPDATE video SET no_of_likes = '$total_likes', no_of_dislikes = '$total_dislikes' WHERE video_id = '$video_id' LIMIT 1";
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