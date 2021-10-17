<?php 
	include('../config/config.php');

	if(isset($_POST['company_id']) && !empty($_POST['company_id'])){
		$company_id = $_POST['company_id'];
		
		$sql = "SELECT cm.*, u.user_id, u.first_name, u.surname, ct.category_id, ct.category_name FROM company cm JOIN user u ON cm.user_id = u.user_id JOIN company_category ct ON cm.category_id = ct.category_id WHERE cm.company_id = '$company_id' LIMIT 1";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$formdata = $result->fetch_assoc();

			echo json_encode($formdata);
		}
	}
?>