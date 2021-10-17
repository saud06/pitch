<?php 
	include('../config/config.php');

	if(isset($_POST['status']) && !empty($_POST['status'])){
		$company_id = $_POST['company_id'];
		$status = $_POST['status'];

		$sql = "UPDATE company SET status = '$status' WHERE company_id = '$company_id'";
	    if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$sql2 = "SELECT status FROM company WHERE company_id = '$company_id'";
			$result2 = $con->query($sql2);
			$formdata = $result2->fetch_assoc();

			echo json_encode($formdata['status']);
		}
	}
?>