<?php 
	include('../config/config.php');

	if(isset($_POST['video_id']) && !empty($_POST['video_id'])){
		$user_ip = $_POST['user_ip'];
		$video_id = $_POST['video_id'];

		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');

		$sql = "SELECT * FROM viewer_ip WHERE user_ip = '$user_ip' AND video_id = '$video_id' LIMIT 1";
		$result = $con->query($sql);

		if($result->num_rows == 0){
			$sql2 = "INSERT INTO viewer_ip (user_ip, creation_datetime, status, video_id) VALUES('$user_ip', '$creation_datetime', 'Active', '$video_id')";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				$sql3 = "UPDATE video SET no_of_views = no_of_views+1 WHERE video_id = '$video_id'";

				if(!$con->query($sql3)){
					die(mysqli_error($con));
				} else{
					echo json_encode(array("status" => TRUE));
				}
			}
		}
	}
?>