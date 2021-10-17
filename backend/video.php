<?php 
	session_start();
	include('../config/config.php');
	include_once('../assets/plugin/getid3/getid3.php');

	$logged_in_email = $_SESSION['logged_in_email'];

	if(isset($_POST) && !empty($_POST)){
		$video_url = '';
		if($_FILES['video']['name']){
			$video = $_FILES['video']['name'];
			$v_file_size = $_FILES['video']['size'];
			$v_path = $_FILES['video']['name'];
			$v_ext = pathinfo($v_path, PATHINFO_EXTENSION);

			if (($v_file_size > 268435456)){ //256 MB
			} else if($v_ext != 'mp4'){
			} else{
				$temp_value = rand();
				$v_target_dir = "../backend/uploads/videos/" . $temp_value . '_' . $_FILES["video"]["name"];
				move_uploaded_file($_FILES["video"]["tmp_name"], $v_target_dir);
			}

			$video_url = $temp_value . '_' . $_FILES['video']['name'];
		}

		$getID3 = new getID3;
		$video_file = $getID3->analyze('uploads/videos/' . $video_url);
		$length = $video_file['playtime_string'];
		$width = $video_file['video']['resolution_x']; 
		$height = $video_file['video']['resolution_y'];
		$size = 'Size: ' . $video_file['filesize'];

		$video_title = $_POST['video_title'];
		$tag = $_POST['video_tag'];
		$description = $_POST['video_description'];
		
		$post_type_id = $_POST['video_type'];
		$post_type_id = implode(',', $post_type_id);

		$submission_status = $_POST['submission_status'];
		$schedule_datetime = $_POST['schedule_datetime'];

		date_default_timezone_set('Asia/Dhaka');
		$upload_date = date('Y-m-d');
		$creation_datetime = date('Y-m-d h:i:s a');
		$status = 'Pending';

		$sql = "SELECT * FROM user WHERE email = '$logged_in_email' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows > 0){
            $formdata = $result->fetch_assoc();
            $user_id = $formdata['user_id'];
        }

		$sql2 = "INSERT INTO video (video_title, subtitle, description, thumbnail, video_url, video_width, video_height, video_size, tag, no_of_likes, no_of_dislikes, no_of_views, no_of_shares, length, age_limit, upload_date,  is_post_of_week, is_post_of_month, is_post_of_year, submission_status, schedule_datetime, creation_datetime, status, user_id, post_type_id, post_criteria_id) VALUES('$video_title', '', '$description', '', '$video_url', '$width', '$height', '$size', '$tag', 0, 0, 0, 0, '$length', 0, '$upload_date', 0, 0, 0, '$submission_status', '$schedule_datetime', '$creation_datetime', '$status', '$user_id', '$post_type_id', 0)";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['success_message'] = 'Video Upload is Successfull And Under Review! It Will be Published Once Approved By The Admin.';

			header("Location: ../profile.php");
		}
	}
?>