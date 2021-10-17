<?php 
	session_start();
	include('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$company_id = $_POST['company_id'];

		$logo = '';
		if($_FILES['company_logo']['name']){
			$logo = $_FILES['company_logo']['name'];
			$l_file_size = $_FILES['company_logo']['size'];
			$l_path = $_FILES['company_logo']['name'];
			$l_ext = pathinfo($l_path, PATHINFO_EXTENSION);

			if (($l_file_size > 2097152)){
			} else if($l_ext != 'jpg' && $l_ext != 'jpeg' && $l_ext != 'png'){
			} else{
				$l_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["company_logo"]["name"];
				move_uploaded_file($_FILES["company_logo"]["tmp_name"], $l_target_dir);
			}

			$logo = time() . '_' . $_FILES['company_logo']['name'];
		}

		$sql = "UPDATE company SET logo = '$logo' WHERE company_id = '$company_id'";

		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$_SESSION['success_message'] = 'You Have Successfully Updated Your Company Logo!';
			
			header("Location: ../company.php");
		}
	}
?>