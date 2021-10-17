<?php 
	include('../config/config.php');

	if(isset($_POST['video_id']) && !empty($_POST['video_id'])){
		$video_id = $_POST['video_id'];
		
		$sql = "SELECT v.*, u.user_id, u.first_name, u.surname, p.post_type_id, p.type_name FROM video v JOIN user u ON v.user_id = u.user_id JOIN post_type p ON v.post_type_id = p.post_type_id WHERE v.video_id = '$video_id' LIMIT 1";
		if(!$con->query($sql)){
			die(mysqli_error($con));
		} else{
			$result = $con->query($sql);
			$formdata = $result->fetch_assoc();

			$data_array = array(
				'video_id' => $formdata['video_id'],
				'video_title' => $formdata['video_title'],
				'tag' => $formdata['tag'],
				'length' => $formdata['length'],
				'subtitle' => $formdata['subtitle'],
				'description' => $formdata['description'],
				'no_of_likes' => $formdata['no_of_likes'],
				'no_of_dislikes' => $formdata['no_of_dislikes'],
				'no_of_views' => $formdata['no_of_views'],
				'no_of_shares' => $formdata['no_of_shares'],
				'upload_date' => $formdata['upload_date'],
				'age_limit' => $formdata['age_limit'],
				'is_post_of_week' => $formdata['is_post_of_week'],
				'is_post_of_month' => $formdata['is_post_of_month'],
				'is_post_of_year' => $formdata['is_post_of_year'],
				'user_id' => $formdata['user_id'],
				'first_name' => $formdata['first_name'],
				'surname' => $formdata['surname'],
				'post_type_id' => $formdata['post_type_id'],
				'type_name' => $formdata['type_name'],
				'status' => $formdata['status'],
				'video_url' => $formdata['video_url'],
				'video_width' => $formdata['video_width'],
				'video_height' => $formdata['video_height'],
				'video_size' => $formdata['video_size']
			);

			echo json_encode($data_array);
		}
	}
?>