<?php 
	include('../config/config.php');

	if(isset($_POST['video_id']) && !empty($_POST['video_id'])){
		$video_id = $_POST['video_id'];
		
		$sql = "SELECT * FROM video WHERE video_id = '$video_id' LIMIT 1";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$formdata = $result->fetch_assoc();
			$video_urls = explode(',', $formdata['video_url']);

			if(count($video_urls) >= 3){
				echo json_encode(array("status" => TRUE));
			} else{
				echo json_encode(array("status" => FALSE));
			}
		}
	}
?>