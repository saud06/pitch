<?php 
	session_start();
	include('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$first_name = $_POST['first_name'];
		$surname = $_POST['surname'];
		$email = $_POST['registration_email'];
		$password = $_POST['registration_password'];
		$password = md5($password);
		$dob = $_POST['byear'] . '-' . $_POST['bmonth'] . '-' . $_POST['bdate'];
		$job = $_POST['job'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$acceptance = $_POST['acceptance'];
		$user_type = $_POST['user_type'];

		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows > 0){
		}

		$profile_picture = '';
		if($_FILES['profile_picture']['name']){
			$profile_picture = $_FILES['profile_picture']['name'];
			$p_file_size = $_FILES['profile_picture']['size'];
			$p_path = $_FILES['profile_picture']['name'];
			$p_ext = pathinfo($p_path, PATHINFO_EXTENSION);

			if (($p_file_size > 2097152)){
			} else if($p_ext != 'jpg' && $p_ext != 'jpeg' && $p_ext != 'png'){
			} else{
				$p_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["profile_picture"]["name"];
				move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $p_target_dir);
			}

			$profile_picture = time() . '_' . $_FILES['profile_picture']['name'];
		}

		$founder = $_POST['founder'];
		$owner = $_POST['owner'];

		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');
		$status = 'Pending';

		$sql2 = "INSERT INTO user (first_name, surname, dob, job, email, password, description, social_media, profile_picture, cover_photo, rank, expertise_area, phone, older_address, personal_interest, user_type, creation_datetime, status) VALUES('$first_name', '$surname', '$dob', '$job', '$email', '$password', '', '', '$profile_picture', '', '', '', '$phone', '', '', '$user_type', '$creation_datetime', '$status')";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$user = mysqli_insert_id($con);

			$_SESSION['logged_in_user'] = $first_name . ' ' . $surname;
		  	$_SESSION['logged_in_email'] = $email;
		  	$_SESSION['logged_in_user_type'] = $user_type;

			if($owner == 'Yes'){
				$company_name = $_POST['company_name'];
				$branch = $_POST['branch'];
				$category = $_POST['category'];
				$description = $_POST['description'];
				$founded_on = $_POST['fyear'] . '-' . $_POST['fmonth'] . '-' . $_POST['fdate'];

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

				$founder_picture1 = '';
				if($_FILES['founder_picture1']['name']){
					$founder_picture1 = $_FILES['founder_picture1']['name'];
					$f_file_size1 = $_FILES['founder_picture1']['size'];
					$f_path1 = $_FILES['founder_picture1']['name'];
					$f_ext1 = pathinfo($f_path1, PATHINFO_EXTENSION);

					if (($f_file_size1 > 2097152)){
					} else if($f_ext1 != 'jpg' && $f_ext1 != 'jpeg' && $f_ext1 != 'png'){
					} else{
						$f_target_dir1 = "../backend/uploads/" . time() . '_' . $_FILES["founder_picture1"]["name"];
						move_uploaded_file($_FILES["founder_picture1"]["tmp_name"], $f_target_dir1);
					}

					$founder_picture1 = time() . '_' . $_FILES['founder_picture1']['name'];
				}

				$founder_picture2 = '';
				if($_FILES['founder_picture2']['name']){
					$founder_picture2 = $_FILES['founder_picture2']['name'];
					$f_file_size2 = $_FILES['founder_picture2']['size'];
					$f_path2 = $_FILES['founder_picture2']['name'];
					$f_ext2 = pathinfo($f_path2, PATHINFO_EXTENSION);

					if (($f_file_size2 > 2097152)){
					} else if($f_ext2 != 'jpg' && $f_ext2 != 'jpeg' && $f_ext2 != 'png'){
					} else{
						$f_target_dir2 = "../backend/uploads/" . time() . '_' . $_FILES["founder_picture2"]["name"];
						move_uploaded_file($_FILES["founder_picture2"]["tmp_name"], $f_target_dir2);
					}

					$founder_picture2 = time() . '_' . $_FILES['founder_picture2']['name'];
				}

				$founder_picture3 = '';
				if($_FILES['founder_picture3']['name']){	
					$founder_picture3 = $_FILES['founder_picture3']['name'];
					$f_file_size3 = $_FILES['founder_picture3']['size'];
					$f_path3 = $_FILES['founder_picture3']['name'];
					$f_ext3 = pathinfo($f_path3, PATHINFO_EXTENSION);

					if (($f_file_size3 > 2097152)){
					} else if($f_ext3 != 'jpg' && $f_ext3 != 'jpeg' && $f_ext3 != 'png'){
					} else{
						$f_target_dir3 = "../backend/uploads/" . time() . '_' . $_FILES["founder_picture3"]["name"];
						move_uploaded_file($_FILES["founder_picture3"]["tmp_name"], $f_target_dir3);
					}

					$founder_picture3 = time() . '_' . $_FILES['founder_picture3']['name'];
				}

				$founders = $founder_picture1 . ',' . $founder_picture2 . ',' . $founder_picture3;

				$sql3 = "INSERT INTO company (company_name, subtitle, branch, description, founders, legal_form, headquarters, capital_requirements, date_of_foundation, logo, title_picture, creation_datetime, status, user_id, category_id) VALUES('$company_name', '', '$branch', '$description', '$founders', '', '', '', '$founded_on', '$logo', '', '$creation_datetime', '$status', '$user', '$category')";

				if(!$con->query($sql3)){
					die(mysqli_error($con));
				} else{
					$_SESSION['success_message'] = 'You Have Successfully Registered to Pithblack!';

					if($_POST['post'] == 'Yes'){
						header("Location: ../profile.php");
					} else{
						header("Location: ../index.php");
					}
				}
			} else{
				$_SESSION['success_message'] = 'You Have Successfully Registered to Pithblack!';

				if($_POST['post'] == 'Yes'){
					header("Location: ../profile.php");
				} else{
					header("Location: ../index.php");
				}
			}
		}
	}
?>