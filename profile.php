<!DOCTYPE html>
<html lang="en">
	<?php 
        include('includes/header.php');

        if(isset($_SESSION['logged_in_email']) && !empty($_SESSION['logged_in_email']) && !isset($_GET['user_id'])){
            $email = $_SESSION['logged_in_email'];

            $sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
            $result = $con->query($sql);
        } else if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
            $user_id = $_GET['user_id'];

            $sql = "SELECT * FROM user WHERE user_id = '$user_id' LIMIT 1";
            $result = $con->query($sql);
        } else{
            header('location: index.php');
        }

        if($result->num_rows > 0){
            $formdata = $result->fetch_assoc();
            $user_id = $formdata['user_id'];

            $sql2 = "SELECT * FROM company WHERE user_id = '$user_id' LIMIT 1";
            $result2 = $con->query($sql2);
            $formdata2 = $result2->fetch_assoc();
        }
    ?>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <style type="text/css">
        .select2.select2-container {
          width: 100% !important;
        }

        .select2.select2-container .select2-selection {
          border: none;
          border-bottom: 1px solid #fff !important;
          border-radius: 4px;
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          border-radius: 3px;
          height: 34px;
          margin-bottom: 15px;
          outline: none !important;
          transition: all 0.15s ease-in-out;
          background: none;
        }

        .select2.select2-container .select2-selection .select2-selection__rendered {
          color: #333;
          line-height: 32px;
          padding-right: 33px;
        }

        .select2.select2-container .select2-selection .select2-selection__arrow {
          background: #f8f8f8;
          border-left: 1px solid #ccc;
          -webkit-border-radius: 0 3px 3px 0;
          -moz-border-radius: 0 3px 3px 0;
          border-radius: 0 3px 3px 0;
          height: 32px;
          width: 33px;
        }

        .select2-selection.select2-selection--single{
            display: none;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
          background: #f8f8f8;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
          -webkit-border-radius: 0 3px 0 0;
          -moz-border-radius: 0 3px 0 0;
          border-radius: 0 3px 0 0;
        }

        .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
          border: 1px solid #34495e;
        }

        .select2.select2-container.select2-container--focus .select2-selection {
          border: 1px solid #34495e;
        }

        .select2.select2-container .select2-selection--multiple {
          height: auto;
          min-height: 34px;
        }

        .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
          margin-top: 0;
          height: 32px;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
          display: block;
          padding: 0 4px;
          line-height: 29px;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__choice {
          background-color: #f8f8f8;
          border: 1px solid #ccc;
          -webkit-border-radius: 3px;
          -moz-border-radius: 3px;
          border-radius: 3px;
          margin: 4px 4px 0 0;
          padding: 0 6px 0 22px;
          height: 24px;
          line-height: 24px;
          font-size: 12px;
          position: relative;
        }

        .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
          position: absolute;
          top: 0;
          left: 0;
          height: 22px;
          width: 22px;
          margin: 0;
          text-align: center;
          color: #e74c3c;
          font-weight: bold;
          font-size: 16px;
        }

        .select2-container .select2-dropdown {
          background: transparent;
          border: none;
          margin-top: -5px;
        }

        .select2-container .select2-dropdown .select2-search {
          padding: 0;
        }

        .select2-container .select2-dropdown .select2-search input {
          outline: none;
          border: 1px solid #34495e;
          border-bottom: none;
          padding: 4px 6px;
        }

        .select2-container .select2-dropdown .select2-results {
          padding: 0;
        }

        .select2-container .select2-dropdown .select2-results ul {
          background: #fff;
          border: 1px solid #34495e;
        }

        .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
          background-color: #3498db;
        }
    </style>

    <style type="text/css">
        .button_outer{
            background: #ff6f00; 
            border-radius: 5px; 
            text-align: center; 
            height: 42px; 
            width: 127px; 
            display: inline-block; 
            transition: .2s; 
            position: relative; 
            overflow: hidden;
        }
        .btn_upload{
            padding: 9px 21px 9px;
            color: #fff; 
            text-align: center; 
            position: relative; 
            display: inline-block; 
            overflow: hidden; 
            z-index: 3; 
            white-space: nowrap;
        }
        .btn_upload input{
            position: absolute; 
            width: 100%; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            cursor: pointer; 
            opacity: 0;
        }
        .file_uploading{
            width: 100%; 
            height: 10px; 
            margin-top: 20px; 
            background: #ccc;
        }
        .file_uploading .btn_upload{
            display: none;
        }
        .processing_bar{
            position: absolute; 
            left: 0; 
            top: 0; 
            width: 0; 
            height: 100%; 
            border-radius: 30px; 
            background: #ff6f00; 
            transition: 3s;
        }
        .file_uploading .processing_bar{
            width: 100%;
        }
        .success_box{
            display: none; 
            width: 50px; 
            height: 50px; 
            position: relative;
        }
        .success_box:before{
            content: ''; 
            display: block; 
            width: 16px; 
            height: 28px; 
            border-bottom: 6px solid #fff; 
            border-right: 6px solid #fff; 
            -webkit-transform: rotate(45deg); 
            -moz-transform: rotate(45deg); 
            -ms-transform: rotate(45deg); 
            transform: rotate(45deg); 
            position: absolute; 
            left: 17px; 
            top: 8px;
        }
        .file_uploaded .success_box{
            display: inline-block;
        }
        .file_uploaded{
            margin-top: 0; 
            width: 50px; 
            background: #ff6f00; 
            height: 50px;
        }
        .uploaded_file_view{
            max-width: 300px; 
            margin: 8px auto; 
            text-align: center; 
            position: relative; 
            transition: .2s; 
            opacity: 0; 
            border: 2px 
            solid #ddd; 
            padding: 15px;
        }
        .file_remove{
            width: 30px; 
            height: 30px; 
            border-radius: 50%; 
            display: block; 
            position: absolute; 
            background: #aaa; 
            line-height: 30px; 
            color: #fff; 
            font-size: 12px; 
            cursor: pointer; 
            right: -15px; 
            top: -15px;
        }
        .file_remove:hover{
            background: #222; 
            transition: .2s;
        }
        .uploaded_file_view img{
            max-width: 100%;
        }
        .uploaded_file_view.show{
            opacity: 1;
        }
        .error_msg{
            text-align: center; 
            color: #f00;
        }
        .success_msg{
            text-align: center; 
            color: #01a33c;
        }

        .xdsoft_datetimepicker .xdsoft_datepicker {
			width: 220px !important;
		}

		#notification-container {
	      position: absolute;
	      top: 120px;
	      transition: top 0.2s ease-in-out, opacity 1s;
	    }
	    #notification-container.hidden {
	      opacity: 0;
	      height: 0;
	      overflow: hidden;
	      transition: none;
	      visibility: hidden;
	    }
	    #notification-container.fadeout {
	      width: 100% !important;
	      animation-name: fadeout;
	      animation-delay: 5s;
	      animation-duration: .7s;
	      animation-fill-mode: forwards;
	    }
	    .notification {
	      width: 270px;
	      color: #fff;
	      font-weight: 600;
	      font-size: 15px;
	      border-radius: 5px;
	      box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.5);
	      padding: 20px;
	      margin: 0 auto;
	      position: relative;
	      text-align: center;
	    }
	    .notification p {
	      margin: 0;
	    }
	    .notification--error {
	      background-color:  rgba(255, 87, 34, .5);
	      z-index: -1;
	      border: 1px solid #ff5722;
	    }
	    #progress {
	      height: 6px;
	      position: absolute;
	      left: 0;
	      right: 0;
	      bottom: 0;
	    }
	    #indicator {
	      height: 100%;
	      width: 0%;
	      background-color: rgba(255, 255, 255, 0.5);
	    }
	    #indicator.progress {
	      animation-name: progress;
	      animation-delay: .35s;
	      animation-duration: 5s;
	      animation-timing-function: linear;
	      animation-fill-mode: forwards;
	    }
	    @keyframes fadeout {
	      0% {
	        opacity: 1;
	      }
	      100% {
	        opacity: 0;
	      }
	    }
	    @keyframes progress {
	      0% {
	        width: 0%;
	      }
	      90% {
	        width: 100%;
	      }
	      100% {
	        width: 100%;
	      }
	    }

        .custom-link{
            color: #ff6f00 !important;
        }
        .custom-link:hover{
            text-decoration: underline;
        }
    </style>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css">

    <body class="Category-page" style="background: #12151e">
    	<div id="notification-container" class="hidden">
		    <div class="notification notification--error" id="notification" role="alert" aria-live="assertive">
		        <div class="icon-placeholder" aria-label="warning"></div>

		        <p id="success_message"></p>

		        <div id="progress">
		            <div id="indicator"></div>
		        </div>
		    </div>
		</div>

        <div class="profile-page-top-banner" style="<?php if($formdata['cover_photo']){ ?> background-image: url(backend/uploads/<?= $formdata['cover_photo']; ?>); <?php } else{ ?> background-image: url(assets/img/<?= 'profile-banner.jpg'; ?>); <?php } ?>">
        </div>

        <div class="profile-main-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="profile-left-content">
                            <div class="profile-img">
                                <img class="rounded-circle" style="height: 170px; border: 5px solid #ff5722" src="<?php if($formdata['profile_picture']){ echo 'backend/uploads/' . $formdata['profile_picture']; } else{ echo 'assets/img/no_image_available.jpg'; } ?>" alt="Profile Picture">

                                <div class="pro-details">
                                    <div class="profile-details">
                                        <h4><?= $formdata['first_name'] . ' ' . $formdata['surname']; ?><span><?= $formdata['job']; ?></span></h4>

                                        <div class="contact-links">
                                            <?php 
                                                if($formdata['social_media']){
                                                    $social_media = explode(',', $formdata['social_media']);
                                                    foreach($social_media as $key => $value){
                                            ?>
                                                        <a target="_blank" href="<?= $value; ?>"><i class="<?php if(strpos($value, 'facebook') !== false){ echo 'fa fa-facebook'; } elseif(strpos($value, 'twitter') !== false){ echo 'fa fa-twitter'; } elseif(strpos($value, 'youtube') !== false){ echo 'fa fa-youtube-play'; } elseif(strpos($value, 'linkedin') !== false){ echo 'fa fa-linkedin'; } elseif(strpos($value, 'instagram') !== false){ echo 'fa fa-instagram'; } ?>"></i></a>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                        		</div>
                            </div>

                            <br><br>
                            
                            <div class="pro-form">
                                <div class="single-fildes">
                                    <label for="email">Email</label>

                                    <input style="outline: none; pointer-events: none;" type="text" placeholder="<?= $formdata['email']; ?>">
                                </div>

                                <div class="single-fildes">
                                    <label for="rank">Business</label>

                                    <input style="outline: none; pointer-events: none;" type="text" placeholder="<?php if($formdata['rank']){ echo $formdata['rank']; } else{ echo 'Not Available'; } ?>">
                                </div>

                                <div class="single-fildes">
                                    <label for="job">Job</label>

                                    <input style="outline: none; pointer-events: none;" type="text" placeholder="<?php if($formdata['job']){ echo $formdata['job']; } else{ echo 'Not Available'; } ?>">
                                </div>

                                <div class="single-fildes">
                                    <label for="company_name">Company Name</label>

                                    <input style="outline: none; pointer-events: none;" type="text" placeholder="<?php if($formdata2['company_name']){ echo $formdata2['company_name']; } else{ echo 'Not Available'; } ?>">
                                </div>
                                
                                <div class="about-me-content">
                                    <h4>About Me</h4>

                                    <p><?php if($formdata['description']){ echo $formdata['description']; } else{ echo 'Not Available'; } ?></p>
                                </div>
                                
                                <?php 
                                  if(!isset($_SESSION['logged_in_email']) && empty($_SESSION['logged_in_email'])){
                                ?>
                                    <div class="action-button">
                                        <a href="#">Contact Me</a>
                                        <a href="#">Write Message Here</a>
                                    </div>
                                <?php
                                  }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9">
                        <?php 
                            if(isset($_SESSION['logged_in_email']) && !empty($_SESSION['logged_in_email'])){
                        ?>
                                <div class="video-upload-box">
                                    <div class="video-upload-content">
                                        <span><img src="assets/img/camera-img.png" alt=""></span>

                                        <h3>Have Any Video for Upload?<span>Click Below.</span></h3>

                                        <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Upload</a>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-section-style dialog-reg4" role="document">
                                      	<div class="modal-content">
                                        	<div class="modal-header" style="padding-top: 5px; padding-bottom: 5px">
                                          		<button style="outline: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            		<span aria-hidden="true">&times;</span>
                                          		</button>
                                        	</div>

                                        	<div class="modal-body">
                                          		<div class="upload-video-btn">
                                            		<a style="top: -79px; cursor: default;" href="#">Upload Video</a>
                                          		</div>

                                          		<form id="video_form" action="backend/video.php" method="POST" enctype="multipart/form-data">
        	                                  		<div class="modal-body-area">
        	                                    		<div class="container">
        	                                      			<div class="row">
        	                                        			<div class="col-lg-6">
        	                                          				<div class="modal-body-content">
        	                                            				<div style="margin-bottom: 5px" class="video-upload-content">
        	                                              					<span>
        	                                              						<img src="assets/img/camera-img.png" alt="">
        	                                              					</span>

        	                                              					<h3>Choose Video to Upload</h3>

        		                                                            <div class="button_outer">
        		                                                                <div class="btn_upload">
        		                                                                    <input type="file" id="video" name="video">

        		                                                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Upload
        		                                                                </div>

        		                                                                <div class="processing_bar"></div>

        		                                                                <div class="success_box"></div>
        		                                                            </div>

        	                                                            	<div class="error_msg"></div>
        	                                                            	<div class="success_msg"></div>

        		                                                            <div class="uploaded_file_view" id="uploaded_view">
        		                                                                <!-- <span class="file_remove">X</span> -->
        		                                                            </div>
        	                                            				</div>

        		                                                        <span id="err_video"></span>
        	                                          				</div> 
        	                                        			</div>

        			                                            <div class="col-lg-6">
        			                                              	<div class="icon-content">
        			                                                	<div class="icon-text">
        			                                                   		<li style="margin-bottom: 28px">
        			                                                   			<div class="image-area">
        			                                                   				<img src="assets/img/icon-1.png" alt="">
        			                                                   			</div>

        			                                                   			<span>Allowed File Types:&emsp; .mp4</span>
        		                                                   			</li>

        			                                                   		<p class="community">Read Our <a href="#">Community Guidelines</a> Regarding Appropriate  Content and Conduct.</p>
        			                                                	</div>
        			                                              	</div>
        			                                            </div>
        	                                     			</div>
        	                                    		</div>
        	                                  		</div>

        	                                      	<br>
        	                                      
        	                                      	<div class="modal-from-area">
        	                                        	<div class="container">
        	                                  				<div class="row">
        	                                            		<div class="col-lg-12">
        	                                            			<div class="row">
        	                                              				<div class="col-md-6">
        	                                                				<label for="video_title">Title <span style="color: red">*</span></label>

        	                                                				<input type="text" style="margin-bottom: 5px; padding: 0 0 9px 0;" class="input-box" name="video_title" id="video_title" placeholder="Insert...">

        	                                                				<span id="err_video_title"></span>
        	                                              				</div>

        	                                              				<div class="col-md-6">
        	                                                				<label for="video_tag">Tag(s) <span>(Separate Multiple Tags by Comma)</span></label>

        	                                                				<input type="text" style="margin-bottom: 5px; padding: 0 0 9px 0;" class="input-box" name="video_tag" id="video_tag" placeholder="Insert...">
        	                                              				</div>
        	                                            			</div>

        			                                                <div class="row">
        			                                                  	<div class="col-md-6">
        			                                                    	<label for="video_description">Description <span style="color: red">*</span></label>

        		                                                    		<textarea name="video_description" id="video_description" style="margin-bottom: 5px; padding: 0 0 9px 0;" class="input-box" cols="30" rows="6" placeholder="Insert..."></textarea>

        		                                                    		<span id="err_description"></span>
        		                                                  		</div>

        		                                                  		<div class="col-md-6">
        		                                                    		<label for="video_type">Type <span style="color: red">*</span></label>
        		                                                      
        		                                                    		<div class="select-area">
                                                                                <span id="err_video_type"></span>

                                                                                <?php 
                                                                                    $sql3 = "SELECT * FROM post_type";
                                                                                    $result3 = $con->query($sql3);
                                                                                ?>

                                                                                <select class="js-select2-multi" multiple name="video_type[]" id="video_type">
                                                                                    <?php 
                                                                                        while($row = $result3->fetch_assoc()){
                                                                                    ?>
                                                                                            <option value="<?= $row['post_type_id'] ?>"><?= $row['type_name']; ?></option>
                                                                                    <?php 
                                                                                        }
                                                                                    ?>
                                                                                </select>
        		                                                    		</div>
        		                                                      
        		                                                    		<div class="label-area">
        		                                                      			<label class="containere">
        		                                                      				Submit Instantly

        		                                                        			<input type="radio" checked="checked" name="submission_status" value="Instant">

        		                                                        			<span class="checkmark"></span>
        		                                                      			</label>

        		                                                      			&emsp;

        		                                                      			<label class="containere">
        		                                                      				Schedule

        		                                                        			<input type="radio" name="submission_status" value="Scheduled">

        		                                                        			<span class="checkmark"></span>
        		                                                      			</label>

        		                                                        		<input type="text" style="margin-bottom: 5px; padding: 0 0 9px 0; max-width: 250px; float: right; display: none;" class="input-box" name="schedule_datetime" id="datetimepicker" placeholder="Insert datetime *">
        		                                                    		</div>

        		                                                    		<span style="float: right;" id="err_schedule_datetime"></span>
        		                                                     
        		                                                    		<div class="submit-btn">
        		                                                      			<input style="padding: 11px; font-weight: 500; font-size: 16px; width: 20%" type="submit" value="Submit">
        		                                                    		</div> 
        		                                                 		</div>
        			                                                </div>
        	                                            		</div>
        	                                          		</div>
        	                                        	</div>
        	                                      	</div> 
        	                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php 
                            }
                        ?>

                        <div class="item-tab-block">
                            <div class="item-tab-block-main">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  	<li class="nav-item">
                                    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Recent Video</a>
                                  	</li>

                                  	<li class="nav-item">
                                    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Popular Video</a>
                                  	</li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                  	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                      	<div class="row">
											<?php 
									            $sql3 = "SELECT * FROM video WHERE user_id = '$user_id' AND status = 'Active' ORDER BY RAND()";
									            $result3 = $con->query($sql3);

									            if($result3->num_rows > 0){
									            	$i = 0;
									                while($row = $result3->fetch_assoc()){
                                                        $video_id = $row['video_id'];
										    ?>
			                                          	<div class="col-lg-6" style="margin-bottom: 20px">
                                                            <div class="sigle-blg-item">
    			                                          		<?php
    			                                          		    $video_url = explode(',', $row['video_url']);
    			                                          		    $video_height = explode(',', $row['video_height']);
    			                                              	?>

    			                                              	<!-- <video controls crossorigin playsinline poster="backend/uploads/videos/<?= $row['thumbnail']; ?>" id="player<?= $i; ?>">
    			                                              		<?php 
    			                                              			foreach($video_url as $key => $value){
    			                                              		?>
    			                                              				<source src="backend/uploads/videos/<?= $value; ?>" type="video/mp4" size="<?= $video_height[$key] ?>">
    			                                              		<?php 
    			                                              			}
    			                                              		?>
    															</video> -->

                                                                <a href="single-post.php?video_id=<?= $video_id; ?>"><div class="blog-img" style="background-image: url(backend/uploads/videos/<?= $row['thumbnail']; ?>)"></div></a>

                                                                <div class="blog-content">
                                                                    <div class="blog-content-top-sec">
                                                                        <p><img src="assets/img/vd-cam-icon.png" alt=""><?= $row['creation_datetime']; ?></p>
                                                                        <div class="social-icons">
                                                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                                                        </div>
                                                                    </div>

                                                                    <div class="main-content-sec">
                                                                        <h3><a class="custom-link" href="single-post.php?video_id=<?= $video_id; ?>"><?= $row['video_title']; ?></a></h3>
                                                                    </div>

                                                                    <div class="blog-activitis">
                                                                        <a style="color: #fff"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span><?= $row['no_of_likes']; ?></span></a>
                                                                        <a style="color: #fff"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i><span><?= $row['no_of_dislikes']; ?></span></a>
                                                                        <a style="color: #fff"><i class="fa fa-eye" aria-hidden="true"></i><span><?= $row['no_of_views']; ?></span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
			                                          	</div>
			                                <?php
			                                			$i++;
			                                		} 
			                                	}
			                                ?>
                                  		</div>
                              		</div>

                              		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                   		<div class="row">
                                          	
                                  		</div>
                          			</div>
                        		</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <?php include('includes/footer.php') ?>
</html>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
        $(".js-select2-multi").select2({ maximumSelectionLength: 2 });

        <?php 
            if(isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])){
                $success_message = $_SESSION['success_message'];
            } else{
                $success_message = '';
            }
        ?>

        if('<?= $success_message ?>'){
            var notificationContainer = document.getElementById('notification-container');
            var indicator = document.getElementById('indicator');
            notificationContainer.style.width = document.body.clientWidth + 'px';

            $('#success_message').html("<?= $success_message ?>");

            hideNotification();

            notificationContainer.style.top = null;
            notificationContainer.style.display = null;
            notificationContainer.classList.remove('hidden');
            notificationContainer.classList.add('fadeout');
            indicator.classList.add('progress');
            notificationContainer.addEventListener('animationend', function() {
                hideNotification();
            }, false);

            window.addEventListener('resize', function() {
                notificationContainer.style.width = document.body.clientWidth + 'px';
            });

            function hideNotification() {
                notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                notificationContainer.classList.add('hidden');
                notificationContainer.classList.remove('fadeout');
                indicator.classList.remove('progress');
            }

            <?= $_SESSION['success_message'] = ''; ?>
        }
    });

  	var btnUpload = $("#video");
    var btnOuter = $(".button_outer");

  	btnUpload.on("change", function(e){
    	var ext = btnUpload.val().split('.').pop().toLowerCase();
    	
    	if($.inArray(ext, ['mp4']) == -1){
      		$(".error_msg").text("Invalid video format! MP4 only.");
    	} else{
    		$(".error_msg").text("");

      		btnOuter.addClass("file_uploading");
  			
  			setTimeout(function(){
        		btnOuter.addClass("file_uploaded");
      		}, 3000);

      		var uploadedFile = URL.createObjectURL(e.target.files[0]);

	      	setTimeout(function(){
	        	$("#uploaded_view").append('<img src="assets/img/video-play-button.png" />').addClass("show");

	        	$(".success_msg").text("Your video is ready for upload.");
	      	}, 3500);
    	}
  	});

  	$(".file_remove").on("click", function(e){
    	$("#uploaded_view").removeClass("show");
    	$("#uploaded_view").find("img").remove();
    	btnOuter.removeClass("file_uploading");
    	btnOuter.removeClass("file_uploaded");
  	});

  	$('input[name=submission_status]').on('change', function(){
  		if($(this).val() == 'Scheduled'){
  			$('input[name=schedule_datetime]').css('display', 'block');
  		} else{
  			$('input[name=schedule_datetime]').css('display', 'none');
  		}
  	});

  	$('#video_form').on('submit', function(e){
      	var video = $('#video').val();
      	var video_title = $('#video_title').val().trim();
        $('#video_title').val(video_title);
        var video_tag = $('#video_tag').val().trim();
        $('#video_tag').val(video_tag);
        var video_description = $('#video_description').val();
        var video_type = $('#video_type').val();
        var schedule_datetime = $('#datetimepicker').val();

        if(video == null || video == ""){
            $("#err_video").html('Please Upload Video.').css('color', 'red');
            return false;
        } else{
            $("#err_video").html('');
        }

        if(video_title == null || video_title == ""){
            $("#err_video_title").html('Please Insert Title.').css('color', 'red');
            return false;
        } else{
            $("#err_video_title").html('');
        }

        if(video_description == null || video_description == ""){
            $("#err_description").html('Please Insert Description.').css('color', 'red');
            return false;
        } else{
            $("#err_description").html('');
        }

        if(video_type == null || video_type == ""){
            $("#err_video_type").html('Please Select At Least One Type.').css('color', 'red');
            return false;
        } else{
            $("#err_video_type").html('');
        }

        if($('input[name=submission_status]:checked').val() == 'Scheduled'){
        	if(schedule_datetime == null || schedule_datetime == ""){
	            $("#err_schedule_datetime").html('Please Insert Datetime.').css('color', 'red');
	            return false;
	        } else{
	            $("#err_schedule_datetime").html('');
	        }
        }

        $('form#video_form').submit();
  	});
</script>