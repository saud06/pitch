<?php 
	session_start();
	include('../config/config.php');
	include_once('../assets/plugin/getid3/getid3.php');
	
	if(isset($_POST) && !empty($_POST)){
		$video_id = $_POST['video_id'];

		$video_url = '';
		if($_FILES['video_url']['name']){
			$video = $_FILES['video_url']['name'];
			$v_file_size = $_FILES['video_url']['size'];
			$v_path = $_FILES['video_url']['name'];
			$v_ext = pathinfo($v_path, PATHINFO_EXTENSION);

			if (($v_file_size > 268435456)){ //256 MB
			} else if($v_ext != 'mp4'){
			} else{
				$v_target_dir = "../backend/uploads/videos/" . time() . '_' . $_FILES["video_url"]["name"];
				move_uploaded_file($_FILES["video_url"]["tmp_name"], $v_target_dir);
			}

			$video_url = time() . '_' . $_FILES['video_url']['name'];
		}

		$getID3 = new getID3;
		$video_file = $getID3->analyze('../backend/uploads/videos/' . $video_url);
		$length = $video_file['playtime_string'];
		$width = $video_file['video']['resolution_x']; 
		$height = $video_file['video']['resolution_y'];
		$size = $video_file['filesize'];

		$sql = "SELECT * FROM video WHERE video_id = '$video_id' LIMIT 1";
	    $result = $con->query($sql);
		if($result->num_rows > 0){
	        $formdata = $result->fetch_assoc();
	        $video_title = $formdata['video_title'];
	        $old_video_url = $formdata['video_url'];
	        $old_width = $formdata['video_width'];
	        $old_height = $formdata['video_height'];
	        $old_size = $formdata['video_size'];
	    }
	    
	    $old_height_arr = explode(',', $old_height);
	    if(in_array($height, $old_height_arr)){
	    	$_SESSION['message'] = 'error';

			header("Location: video.php");
	    } else{
		    $new_video_url = $old_video_url . ',' . $video_url;
		    $new_width = $old_width . ',' . $width;
		    $new_height = $old_height . ',' . $height;
		    $new_size = $old_size . ',' . $size;

			$sql2 = "UPDATE video SET video_url = '$new_video_url', video_width = '$new_width', video_height = '$new_height', video_size = '$new_size' WHERE video_id = '$video_id'";

			if(!$con->query($sql2)){
				die(mysqli_error($con));
			} else{
				$_SESSION['message'] = 'success';

				header("Location: video.php");
			}
		}
	}
?>