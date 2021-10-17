<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$company_id = $_POST['upd_company_id'];
		$company_name = $_POST['upd_company_name'];
		$subtitle = $_POST['upd_subtitle'];
		$headquarter_arr = [];
		foreach ($_POST['group-a'] as $key => $value){
			array_push($headquarter_arr, $value['headquarters']);
		}
		$headquarters = implode(',', $headquarter_arr);
		$branch = $_POST['upd_branch'];
		$description = $_POST['upd_description'];
		$legal_form = $_POST['upd_legal_form'];
		$capital_requirements = $_POST['upd_capital_requirements'];
		$date_of_foundation = $_POST['upd_date_of_foundation'];
		$category_id = $_POST['upd_category'];

		$sql = "SELECT * FROM company WHERE user_id = '$user_id' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows > 0){
		}
		
		$title_picture = '';
		if($_FILES['upd_title_picture']['name']){
			$title_picture = $_FILES['upd_title_picture']['name'];
			$t_file_size = $_FILES['upd_title_picture']['size'];
			$t_path = $_FILES['upd_title_picture']['name'];
			$t_ext = pathinfo($t_path, PATHINFO_EXTENSION);

			if (($t_file_size > 2097152)){
			} else if($t_ext != 'jpg' && $t_ext != 'jpeg' && $t_ext != 'png'){
			} else{
				$t_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["upd_title_picture"]["name"];
				move_uploaded_file($_FILES["upd_title_picture"]["tmp_name"], $t_target_dir);
			}

			$title_picture = time() . '_' . $_FILES['upd_title_picture']['name'];
		}

		$logo = '';
		if($_FILES['upd_logo']['name']){
			$logo = $_FILES['upd_logo']['name'];
			$l_file_size = $_FILES['upd_logo']['size'];
			$l_path = $_FILES['upd_logo']['name'];
			$l_ext = pathinfo($l_path, PATHINFO_EXTENSION);

			if (($l_file_size > 2097152)){
			} else if($l_ext != 'jpg' && $l_ext != 'jpeg' && $l_ext != 'png'){
			} else{
				$l_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["upd_logo"]["name"];
				move_uploaded_file($_FILES["upd_logo"]["tmp_name"], $l_target_dir);
			}

			$logo = time() . '_' . $_FILES['upd_logo']['name'];
		}

		$founders = '';
		$founder_arr = [];
		if($_FILES['upd_founder']['name']){
			$f_file_count = count($_FILES['upd_founder']['name']);
			$key = 0;

			if($_FILES['upd_founder']['name'][0]){
				foreach($_FILES['upd_founder']['name'] as $key => $value){
					$f_file_size = $_FILES['upd_founder']['size'][$key];
					$f_path = $_FILES['upd_founder']['name'][$key];
					$f_ext = pathinfo($f_path, PATHINFO_EXTENSION);

					if (($f_file_size > 2097152)){
						break;
					}
					if($f_ext != 'jpg' && $f_ext != 'jpeg' && $f_ext != 'png'){
						break;
					}
				}

				if(($key + 1) != $f_file_count){
				} else{
					foreach($_FILES['upd_founder']['name'] as $key2 => $value){
						$f_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["upd_founder"]["name"][$key2];
						move_uploaded_file($_FILES["upd_founder"]["tmp_name"][$key2], $f_target_dir);

						array_push($founder_arr, (time() . '_' . $_FILES['upd_founder']['name'][$key2]));
					}
				}

				$founders = implode(',', $founder_arr);
			}
		}

	  	$sql2 = "UPDATE company SET company_name = '$company_name', subtitle = '$subtitle', branch = '$branch', description = '$description', founders = '$founders', legal_form = '$legal_form', headquarters = '$headquarters', capital_requirements = '$capital_requirements', date_of_foundation = '$date_of_foundation', logo = '$logo', title_picture = '$title_picture', category_id = '$category_id' WHERE company_id = '$company_id'";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Updated Company Details: <strong>' . $company_name . '</strong>.';

			header("Location: profile.php");
		}
	}
?>