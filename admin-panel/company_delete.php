<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$company_id = $_POST['dlt_company_id'];

	  	$sql = "SELECT * FROM company WHERE company_id = '$company_id' LIMIT 1";
	    $result = $con->query($sql);
	    $formdata = $result->fetch_assoc();
	    $company = $formdata['company_name'];

	  	$sql2 = "DELETE FROM company WHERE company_id = '$company_id'";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Deleted the Company: <strong>' . $company . '</strong>.';

			header("Location: company.php");
		}
	}
?>