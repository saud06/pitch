<?php 
	include('includes/header.php');
?>

<style type="text/css">
	.timeline .timeline-wrapper .timeline-panel .timeline-title{
		color: #fff;
	}
</style>

<body>
  	<div class="container-scroller">
		<?php 
			include('includes/navbar.php'); 
			include('../config/config.php');

			if(!isset($_SESSION['logged_in_email']) && empty($_SESSION['logged_in_email'])){
		        header('Location: index.php');
		    } else{
		    	$email = $_SESSION['logged_in_email'];

		    	$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
				if(!$con->query($sql)){
					die(mysqli_error($con));
				} else{
					$result = $con->query($sql);
					$formdata = $result->fetch_assoc();
					$user_id = $formdata['user_id'];
				}
		    }
		?>

    	<div class="container-fluid page-body-wrapper">
      		<?php include('includes/sidebar.php') ?>

      		<div class="main-panel">          
		        <div class="content-wrapper">
		        	<nav aria-label="breadcrumb">
	                  	<ol class="breadcrumb breadcrumb-custom">
		                    <li class="breadcrumb-item"><a href="#"><i class="ti-home menu-icon"></i> Home</a></li>
		                    <li class="breadcrumb-item active" aria-current="page"><span><i class="ti-pulse menu-icon"></i> History</span></li>
	                  	</ol>
	                </nav>

		          	<div class="row">
			            <div class="col-12">
			              	<div class="card">
				                <div class="card-body">
				                  	<h4 class="card-title">History</h4>

				                  	<div class="mt-5">
				                    	<div class="timeline">
				                    		<?php 
				                      			$sql2 = "SELECT h.*, v.video_id, v.video_title, v.creation_datetime AS v_creation_datetime, u.user_id, u.first_name, u.surname FROM history h JOIN video v ON h.video_id = v.video_id JOIN user u ON h.user_id = u.user_id WHERE h.video_user_id = '$user_id' GROUP BY h.video_id ORDER BY h.history_id DESC";
										        $result2 = $con->query($sql2);

										        if($result2->num_rows > 0){
										        	$i = 0;

										            while($row = $result2->fetch_assoc()){
										            	$history_id = $row['history_id'];
										            	$video_id = $row['video_id'];
										            	$user_id = $row['user_id'];
				                      		?>
														<!-- POST -->
							                      		<div class="timeline-wrapper timeline-wrapper-primary">
							                        		<div class="timeline-badge"></div>

									                        <div class="timeline-panel">
									                          	<div class="timeline-heading">
									                          		<small class="text-muted">
																		<i class="ti-angle-right mr-1"></i>
																		 Post
																	</small><br><br>

									                            	<h6 class="timeline-title">
									                            		<?= $row['video_title'] ?>
									                            	</h6>
									                          	</div>

									                          	<br>

									                          	<?php 
									                          		$sql3 = "SELECT SUM(likes) AS tot_likes, SUM(dislikes) AS tot_dislikes, SUM(comments) AS tot_comments, SUM(replies) AS tot_replies, SUM(questions) AS tot_questions, SUM(answers) AS tot_answers FROM history WHERE video_id = '$video_id'";
									                          		$result3 = $con->query($sql3);
									                          		$formdata2 = $result3->fetch_assoc();
									                          	?>

									                          	<div class="timeline-footer d-flex align-items-center flex-wrap">
									                              	<i class="ti-thumb-up text-muted mr-1"></i>
									                              	<span class="mr-3"><?= $formdata2['tot_likes']; ?></span>

									                              	<i class="ti-thumb-down text-muted mr-1"></i>
									                              	<span class="mr-3"><?= $formdata2['tot_dislikes']; ?></span>

									                              	<i class="ti-comment text-muted mr-1"></i>
									                              	<span class="mr-3"><?= $formdata2['tot_comments']; ?></span>

									                              	<i class="ti-comment-alt text-muted mr-1"></i>
									                              	<span class="mr-3"><?= $formdata2['tot_replies']; ?></span>

									                              	<i class="ti-help text-muted mr-1"></i>
									                              	<span class="mr-3"><?= $formdata2['tot_questions']; ?></span>

									                              	<i class="ti-align-left text-muted mr-1"></i>
									                              	<span><?= $formdata2['tot_answers']; ?></span>
									                          	</div>

									                          	<br>

									                          	<div class="timeline-footer d-flex align-items-center flex-wrap">
									                              	<span class="ml-md-auto font-weight-bold"><?= $row['v_creation_datetime']; ?></span>
									                          	</div>
									                        </div>
									                    </div>

							                      		<?php 
							                      			$sql4 = "SELECT * FROM history WHERE video_id = '$video_id' ORDER BY history_id DESC";
							                      			$result4 = $con->query($sql4);

							                      			if($result4->num_rows > 0){
													        	$j = 0;

													            while($row2 = $result4->fetch_assoc()){
							                      		?>
										                      		<!-- DISLIKE -->
										                      		<div class="timeline-wrapper timeline-inverted timeline-wrapper-<?php if($row2['dislikes'] == 1){ echo 'danger'; } else if($row2['likes'] == 1){ echo 'success'; } else if($row2['comments'] == 1){ echo 'info'; } else if($row2['replies'] == 1){ echo 'light'; } else if($row2['questions'] == 1){ echo 'warning'; } else if($row2['answers'] == 1){ echo 'secondary'; } ?>">
										                        		<div class="timeline-badge"></div>

												                        <div class="timeline-panel">
												                          	<div class="timeline-heading">
												                          		<small class="text-muted">
																					<i class="ti-angle-double-right mr-1"></i>

																					<?php 
																						if($row2['dislikes'] == 1){ echo 'Dislike'; } else if($row2['likes'] == 1){ echo 'Like'; } else if($row2['comments'] == 1){ echo 'Comment'; } else if($row2['replies'] == 1){ echo 'Reply'; } else if($row2['questions'] == 1){ echo 'Question'; } else if($row2['answers'] == 1){ echo 'Answer'; 
																						} 
																					?>
																				</small><br><br>

												                            	<h6 class="timeline-title">
												                            		<?= $row['video_title']; ?>
												                            	</h6>
												                          	</div>

												                          	<div class="timeline-body">
												                            	<p>
												                            		<a style="color: #ff5722;"><?= $row['first_name'] . ' ' . $row['surname']; ?></a>

												                            		<?php 
																						if($row2['dislikes'] == 1){ echo 'disliked'; } else if($row2['likes'] == 1){ echo 'liked'; } else if($row2['comments'] == 1){ echo 'commented on'; } else if($row2['replies'] == 1){ echo 'replied on'; } else if($row2['questions'] == 1){ echo 'added question on'; } else if($row2['answers'] == 1){ echo 'added answer on'; 
																						} 
																					?> this video!
												                            	</p>
												                          	</div>

												                          	<div class="timeline-footer d-flex align-items-center flex-wrap">
												                              	<span class="ml-md-auto font-weight-bold"><?= $row2['creation_datetime']; ?></span>
												                          	</div>
												                        </div>
												                    </div>
														<?php
																	$j++; 
																}
															}

									        			$i++;
									        		}
									        	}
									        ?>
				                    	</div>
				                  	</div>
				                </div>
			              	</div>
			            </div>
		          	</div>
		        </div>

        		<?php include('includes/footer.php') ?>
      		</div>
    	<div>
  	</div>
</body>