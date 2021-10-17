<?php
	session_start();
	include ('../config/config.php');

	if(isset($_POST) && !empty($_POST)){
		$first_name = $_POST['first_name'];
		$surname = $_POST['surname'];
		$social_media_arr = [];
		foreach ($_POST['group-a'] as $key => $value){
			array_push($social_media_arr, $value['social_media']);
		}
		$social_media = implode(',', $social_media_arr);
		$job = $_POST['job'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = md5($password);
		$dob = $_POST['dob'];
		$phone = $_POST['phone'];
		$description = $_POST['description'];
		$older_address = $_POST['older_address'];
		$rank = $_POST['rank'];
		$expertise_area = $_POST['expertise_area'];
		$personal_interest = $_POST['personal_interest'];
		$user_type = $_POST['user_type'];
		$status = $_POST['status'];
		date_default_timezone_set('Asia/Dhaka');
		$creation_datetime = date('Y-m-d h:i:s a');

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

		$cover_photo = '';
		if($_FILES['cover_photo']['name']){
			$cover_photo = $_FILES['cover_photo']['name'];
			$c_file_size = $_FILES['cover_photo']['size'];
			$c_path = $_FILES['cover_photo']['name'];
			$c_ext = pathinfo($c_path, PATHINFO_EXTENSION);

			if (($c_file_size > 2097152)){
			} else if($c_ext != 'jpg' && $c_ext != 'jpeg' && $c_ext != 'png'){
			} else{
				$c_target_dir = "../backend/uploads/" . time() . '_' . $_FILES["cover_photo"]["name"];
				move_uploaded_file($_FILES["cover_photo"]["tmp_name"], $c_target_dir);
			}

			$cover_photo = time() . '_' . $_FILES['cover_photo']['name'];
		}

	  	$sql2 = "INSERT INTO user (first_name, surname, dob, job, email, password, description, social_media, profile_picture, cover_photo, rank, expertise_area, phone, older_address, personal_interest, user_type, creation_datetime, status) VALUES('$first_name', '$surname', '$dob', '$job', '$email', '$password', '$description', '$social_media', '$profile_picture', '$cover_photo', '$rank', '$expertise_area', '$phone', '$older_address', '$personal_interest', '$user_type', '$creation_datetime', '$status')";

		if(!$con->query($sql2)){
			die(mysqli_error($con));
		} else{
			$_SESSION['message'] = 'You Have Successfully Added the New User: <strong>' . $first_name . ' ' . $surname . '</strong>.';

			header("Location: user.php");
		}
	}
?>