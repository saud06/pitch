<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$company_name = $_POST['company_name'];
		$subtitle = $_POST['subtitle'];
		$headquarter_arr = [];
		foreach ($_POST['group-a'] as $key => $value){
			array_push($headquarter_arr, $value['headquarters']);
		}
		$headquarters = implode(',', $headquarter_arr);
		$branch = $_POST['branch'];
		$description = $_POST['description'];
		$legal_form = $_POST['legal_form'];
		$capital_requirements = $_POST['capital_requirements'];
		$date_of_foundation = $_POST['date_of_foundation'];
		$category_id = $_POST['category'];
		$status = $_POST['company_status'];
		$user_id = $_POST['user'];
		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');

		$sql = "SELECT * FROM company WHERE user_id = '$user_id' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows > 0){
		}
		
		$title_picture = '';
		if($_FILES['title_picture']['name']){
			$title_picture = $_FILES['title_picture']['name'];
			$t_file_size = $_FILES['title_picture']['size'];
			$t_path = $_FILES['title_picture']['name'];
			$t_ext = pathinfo($t_path, PATHINFO_EXTENSION);

			if (($t_file_size > 2097152)){
			} else if($t_ext != 'jpg' && $t_ext != 'jpeg' && $t_ext != 'png'){
			} else{
				$t_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["title_picture"]["name"];
				move_uploaded_file($_FILES["title_picture"]["tmp_name"], $t_target_dir);
			}

			$title_picture = time() . '_' . $_FILES['title_picture']['name'];
		}

		$logo = '';
		if($_FILES['logo']['name']){
			$logo = $_FILES['logo']['name'];
			$l_file_size = $_FILES['logo']['size'];
			$l_path = $_FILES['logo']['name'];
			$l_ext = pathinfo($l_path, PATHINFO_EXTENSION);

			if (($l_file_size > 2097152)){
			} else if($l_ext != 'jpg' && $l_ext != 'jpeg' && $l_ext != 'png'){
			} else{
				$l_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["logo"]["name"];
				move_uploaded_file($_FILES["logo"]["tmp_name"], $l_target_dir);
			}

			$logo = time() . '_' . $_FILES['logo']['name'];
		}

		$founders = '';
		$founder_arr = [];
		if($_FILES['founder']['name']){
			$f_file_count = count($_FILES['founder']['name']);
			$key = 0;

			if($_FILES['founder']['name'][0]){
				foreach($_FILES['founder']['name'] as $key => $value){
					$f_file_size = $_FILES['founder']['size'][$key];
					$f_path = $_FILES['founder']['name'][$key];
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
					foreach($_FILES['founder']['name'] as $key2 => $value){
						$f_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["founder"]["name"][$key2];
						move_uploaded_file($_FILES["founder"]["tmp_name"][$key2], $f_target_dir);

						array_push($founder_arr, (time() . '_' . $_FILES['founder']['name'][$key2]));
					}
				}

				$founders = implode(',', $founder_arr);
			}
		}

	  	$sql2 = "INSERT INTO company (company_name, subtitle, branch, description, founders, legal_form, headquarters, capital_requirements, date_of_foundation, logo, title_picture, creation_datetime, status, user_id, category_id) VALUES('$company_name', '$subtitle', '$branch', '$description', '$founders', '$legal_form', '$headquarters', '$capital_requirements', '$date_of_foundation', '$logo', '$title_picture', '$creation_datetime', '$status', '$user_id', '$category_id')";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Added the New Company: <strong>' . $company_name . '</strong>.';

			header("Location: company.php");
		}
	}
?>