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
			$video_id = $formdata['video_id'];
			$schedule_datetime = $formdata['schedule_datetime'];

			if($schedule_datetime){
				date_default_timezone_set('Asia/Dhaka');
				$current_datetime_sec = strtotime(date('Y-m-d h:i:s a'));
				$schedule_datetime_sec = strtotime($schedule_datetime);

				if($current_datetime_sec > $schedule_datetime_sec){
					echo json_encode(array('data' => 'scheduled'));
				} else{
					echo json_encode(array('data' => $schedule_datetime, 'video_id' => $video_id));
				}
			} else{
				echo json_encode(array('data' => 'instant'));
			}
		}
	}
?>