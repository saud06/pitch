<?php 
	include('../config/config.php');

	if(isset($_POST['status']) && !empty($_POST['status'])){
		$video_id = $_POST['video_id'];
		$status = $_POST['status'];

		$sql = "UPDATE video SET status = '$status' WHERE video_id = '$video_id'";
	    if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$sql2 = "SELECT status FROM video WHERE video_id = '$video_id'";
			$result2 = $con->query($sql2);
			$formdata = $result2->fetch_assoc();

			echo json_encode($formdata['status']);
		}
	}
?>