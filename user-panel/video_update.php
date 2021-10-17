<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$video_id = $_POST['upd_video_id'];
		$video_title = $_POST['upd_video_title'];
		$subtitle = $_POST['upd_subtitle'];
		$description = $_POST['upd_description'];
		$tag = $_POST['upd_tag'];
		$no_of_likes = $_POST['upd_no_of_likes'];
		$no_of_dislikes = $_POST['upd_no_of_dislikes'];
		$no_of_views = $_POST['upd_no_of_views'];
		$no_of_shares = $_POST['upd_no_of_shares'];
		$upload_date = $_POST['upd_upload_date'];

		if (isset($_POST['upd_post_of_week']) && $_POST['upd_post_of_week'] == 1){
			$is_post_of_week = $_POST['upd_post_of_week'];
		} else{
			$is_post_of_week = 0;
		}
		if (isset($_POST['upd_post_of_month']) && $_POST['upd_post_of_month'] == 1){
			$is_post_of_month = $_POST['upd_post_of_month'];
		} else{
			$is_post_of_month = 0;
		}
		if (isset($_POST['upd_post_of_year']) && $_POST['upd_post_of_year'] == 1){
			$is_post_of_year = $_POST['upd_post_of_year'];
		} else{
			$is_post_of_year = 0;
		}

		$age_limit = $_POST['upd_age_limit'];
		$user_id = $_POST['upd_user'];
		$post_type_id = $_POST['upd_post_type'];
		// $post_criteria = $_POST['upd_post_criteria'];
		$post_criteria_id = 0;
		$status = $_POST['upd_status'];
		
		$thumbnail = '';
		if($_FILES['upd_thumbnail']['name']){
			$thumbnail = $_FILES['upd_thumbnail']['name'];
			$t_file_size = $_FILES['upd_thumbnail']['size'];
			$t_path = $_FILES['upd_thumbnail']['name'];
			$t_ext = pathinfo($t_path, PATHINFO_EXTENSION);

			if (($t_file_size > 2097152)){
			} else if($t_ext != 'jpg' && $t_ext != 'jpeg' && $t_ext != 'png'){
			} else{
				$t_target_dir = "../backend/uploads/videos/" . time() . '_' . $_FILES["upd_thumbnail"]["name"];
				move_uploaded_file($_FILES["upd_thumbnail"]["tmp_name"], $t_target_dir);
			}

			$thumbnail = time() . '_' . $_FILES['upd_thumbnail']['name'];
		}

	  	$sql = "UPDATE video SET video_title = '$video_title', subtitle = '$subtitle', description = '$description', thumbnail = '$thumbnail', tag = '$tag', no_of_likes = '$no_of_likes', no_of_dislikes = '$no_of_dislikes', no_of_views = '$no_of_views', no_of_shares = '$no_of_shares', age_limit = '$age_limit', upload_date = '$upload_date', is_post_of_week = '$is_post_of_week', is_post_of_month = '$is_post_of_month', is_post_of_year = '$is_post_of_year', status = '$status', user_id = '$user_id', post_type_id = '$post_type_id', post_criteria_id = '$post_criteria_id' WHERE video_id = '$video_id'";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Updated Video Information: <strong>' . $video_title . '</strong>.';

			header("Location: video.php");
		}
	}
?>