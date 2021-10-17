<?php 
	include('../config/config.php');

	if(isset($_POST['type']) && !empty($_POST['type'])){
		$video_id = $_POST['video_id'];
		$status = $_POST['status'];
		$type = $_POST['type'];

		if($type == 'week'){
			$sql = "UPDATE video SET is_post_of_week = '$status' WHERE video_id = '$video_id'";
		} elseif($type == 'month'){
			$sql = "UPDATE video SET is_post_of_month = '$status' WHERE video_id = '$video_id'";
		} else{
			$sql = "UPDATE video SET is_post_of_year = '$status' WHERE video_id = '$video_id'";
		}
	    
	    if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			echo json_encode(array("status" => TRUE));
		}
	}
?>