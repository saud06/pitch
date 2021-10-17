<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
	  	$email = $_POST['login_email'];
		$password = $_POST['login_password'];
		$password = md5($password);

	  	$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND user_type = 'Administrator' LIMIT 1";
	  	$result = $con->query($sql);

	  	if($result->num_rows > 0){
	  		$row = $result->fetch_assoc();

		  	$_SESSION['logged_in_user'] = $row['first_name'] . ' ' . $row['surname'];
		  	$_SESSION['logged_in_email'] = $row['email'];
		  	$_SESSION['logged_in_user_type'] = $row['user_type'];
	    
	    	$_SESSION['message'] = 'success';
	    	header("Location: admin_panel.php");
	  	} else{
	  		$_SESSION['message'] = 'error';
	    	header("Location: index.php");
	  	}
	}

	else{
	  	session_destroy();
		header("Location: ../index.php");
	}
?>