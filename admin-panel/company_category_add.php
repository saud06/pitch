<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$category_name = $_POST['company_category_name'];
		$status = $_POST['company_category_status'];
		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');

	  	$sql = "INSERT INTO company_category (category_name, creation_datetime, status) VALUES('$category_name', '$creation_datetime', '$status')";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Added the New Company Category: <strong>' . $category_name . '</strong>.';

			header("Location: company.php");
		}
	}
?>