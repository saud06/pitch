<?php 
	include('../config/config.php');

	if(isset($_POST['question_id']) && !empty($_POST['question_id'])){
		$question_id = $_POST['question_id'];
		$video_id = $_POST['video_id'];
		
		$sql = "SELECT a.*, u.first_name, u.surname, u.profile_picture FROM answer a JOIN user u ON a.user_id = u.user_id WHERE a.video_id = '$video_id' AND a.question_id = '$question_id'";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$arr0 = []; $arr1 = []; $arr2 = []; $arr3 = []; $arr4 = []; $arr5 = []; $arr6 = []; $arr7 = []; $arr8 = [];
			while($row = $result->fetch_assoc()){
				array_push($arr0, $row['answer_id']);
				array_push($arr1, $row['details']);
				array_push($arr2, $row['creation_datetime']);
				array_push($arr3, $row['status']);
				array_push($arr4, $row['video_id']);
				array_push($arr5, $row['question_id']);
				array_push($arr6, $row['first_name']);
				array_push($arr7, $row['surname']);
				array_push($arr8, $row['profile_picture']);
			}

			echo json_encode(
				array(
					'answer_id' => $arr0,
					'details' => $arr1,
					'creation_datetime' => $arr2,
					'status' => $arr3,
					'video_id' => $arr4,
					'question_id' => $arr5,
					'first_name' => $arr6,
					'surname' => $arr7,
					'profile_picture' => $arr8,
				)
			);
		}
	}
?>