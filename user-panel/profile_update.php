<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$user_id = $_POST['upd_user_id'];
		$first_name = $_POST['upd_first_name'];
		$surname = $_POST['upd_surname'];
		$social_media_arr = [];
		foreach ($_POST['group-a'] as $key => $value){
			array_push($social_media_arr, $value['social_media']);
		}
		$social_media = implode(',', $social_media_arr);
		$job = $_POST['upd_job'];
		$email = $_POST['upd_email'];
		$password = $_POST['upd_password'];
		if($password) $password = md5($password);
		$dob = $_POST['upd_dob'];
		$phone = $_POST['upd_phone'];
		$description = $_POST['upd_description'];
		$older_address = $_POST['upd_older_address'];
		$rank = $_POST['upd_rank'];
		$expertise_area = $_POST['upd_expertise_area'];
		$personal_interest = $_POST['upd_personal_interest'];

		$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows > 0){
		}
		
		$profile_picture = '';
		if($_FILES['upd_profile_picture']['name']){
			$profile_picture = $_FILES['upd_profile_picture']['name'];
			$p_file_size = $_FILES['upd_profile_picture']['size'];
			$p_path = $_FILES['upd_profile_picture']['name'];
			$p_ext = pathinfo($p_path, PATHINFO_EXTENSION);

			if (($p_file_size > 2097152)){
			} else if($p_ext != 'jpg' && $p_ext != 'jpeg' && $p_ext != 'png'){
			} else{
				$p_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["upd_profile_picture"]["name"];
				move_uploaded_file($_FILES["upd_profile_picture"]["tmp_name"], $p_target_dir);
			}

			$profile_picture = time() . '_' . $_FILES['upd_profile_picture']['name'];
		}

		$cover_photo = '';
		if($_FILES['upd_cover_photo']['name']){
			$cover_photo = $_FILES['upd_cover_photo']['name'];
			$c_file_size = $_FILES['upd_cover_photo']['size'];
			$c_path = $_FILES['upd_cover_photo']['name'];
			$c_ext = pathinfo($c_path, PATHINFO_EXTENSION);

			if (($c_file_size > 2097152)){
			} else if($c_ext != 'jpg' && $c_ext != 'jpeg' && $c_ext != 'png'){
			} else{
				$c_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["upd_cover_photo"]["name"];
				move_uploaded_file($_FILES["upd_cover_photo"]["tmp_name"], $c_target_dir);
			}

			$cover_photo = time() . '_' . $_FILES['upd_cover_photo']['name'];
		}

	  	if($password){
	  		$sql2 = "UPDATE user SET first_name = '$first_name', surname = '$surname', dob = '$dob', job = '$job', email = '$email', password = '$password', description = '$description', social_media = '$social_media', profile_picture = '$profile_picture', cover_photo = '$cover_photo', rank = '$rank', expertise_area = '$expertise_area', phone = '$phone', older_address = '$older_address', personal_interest = '$personal_interest' WHERE user_id = '$user_id'";
	  	} else{
	  		$sql2 = "UPDATE user SET first_name = '$first_name', surname = '$surname', dob = '$dob', job = '$job', email = '$email', description = '$description', social_media = '$social_media', profile_picture = '$profile_picture', cover_photo = '$cover_photo', rank = '$rank', expertise_area = '$expertise_area', phone = '$phone', older_address = '$older_address', personal_interest = '$personal_interest' WHERE user_id = '$user_id'";
	  	}

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Updated Profile Information.';

			header("Location: profile.php");
		}
	}
?>