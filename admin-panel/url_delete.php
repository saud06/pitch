<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$video_id = $_POST['dlt_video_id2'];
		$video_url_no = $_POST['dlt_video_url'];

	  	$sql = "SELECT * FROM video WHERE video_id = '$video_id' LIMIT 1";
	    $result = $con->query($sql);
	    $formdata = $result->fetch_assoc();

	    $video = $formdata['video_title'];
	    
	    $video_url_arr = explode(',', $formdata['video_url']);
	    unset($video_url_arr[$video_url_no]);
	    $video_url = implode(',', $video_url_arr);

	    $video_width_arr = explode(',', $formdata['video_width']);
	    unset($video_width_arr[$video_url_no]);
	    $video_width = implode(',', $video_width_arr);

	    $video_height_arr = explode(',', $formdata['video_height']);
	    unset($video_height_arr[$video_url_no]);
	    $video_height = implode(',', $video_height_arr);

	    $video_size_arr = explode(',', $formdata['video_size']);
	    unset($video_size_arr[$video_url_no]);
	    $video_size = implode(',', $video_size_arr);

	  	$sql2 = "UPDATE video SET video_url = '$video_url', video_width = '$video_width', video_height = '$video_height', video_size = '$video_size' WHERE video_id = '$video_id'";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'success2';

			header("Location: video.php");
		}
	}
?>