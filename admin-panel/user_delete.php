<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$user_id = $_POST['dlt_user_id'];

	  	$sql = "SELECT * FROM user WHERE user_id = '$user_id' LIMIT 1";
	    $result = $con->query($sql);
	    $formdata = $result->fetch_assoc();
	    $user = $formdata['first_name'] . ' ' . $formdata['surname'];

	  	$sql2 = "DELETE FROM user WHERE user_id = '$user_id'";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Deleted the User: <strong>' . $user . '</strong>.';

			header("Location: user.php");
		}
	}
?>