<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$type_name = $_POST['type_name'];
		$status = $_POST['type_status'];
		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');

	  	$sql = "INSERT INTO post_type (type_name, creation_datetime, status) VALUES('$type_name', '$creation_datetime', '$status')";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Added the New Post Type: <strong>' . $type_name . '</strong>.';

			header("Location: video.php");
		}
	}
?>