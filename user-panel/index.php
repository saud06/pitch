<?php 
	include('includes/header.php');
?>

<style type="text/css">
	.page-content {
		display:none;
	}
</style>

<body>
	<div class="preload">
		<div class="square-box-loader">
          	<div class="square-box-loader-container">
            	<div class="square-box-loader-corner-top"></div>
            	<div class="square-box-loader-corner-bottom"></div>
          	</div>

          	<div class="square-box-loader-square"></div>
        </div>
	</div>

  	<div class="container-scroller">
    	<?php 
    		include('includes/navbar.php'); 
    		include('../config/config.php');
    		
    		if(!isset($_SESSION['logged_in_email']) && empty($_SESSION['logged_in_email'])){
		        header('Location: ../');
		    } else{
		    	$email = $_SESSION['logged_in_email'];

		    	$sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
				if(!$con->query($sql)){
					die(mysqli_error($con));
				} else{
					$result = $con->query($sql);
					$formdata = $result->fetch_assoc();
					$user_id = $formdata['user_id'];

					$sql2 = "SELECT * FROM video WHERE user_id = '$user_id'";
					$result2 = $con->query($sql2);
					$formdata2 = $result2->fetch_assoc();

					$sql22 = "SELECT *, SUM(no_of_views) AS tot_views FROM video WHERE user_id = '$user_id'";
					$result22 = $con->query($sql22);
					$formdata22 = $result22->fetch_assoc();

					$sql222 = "SELECT *, SUM(no_of_views) AS tot_views FROM video WHERE DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND user_id = '$user_id'";
					$result222 = $con->query($sql222);
					$formdata222 = $result222->fetch_assoc();

					$sql2222 = "SELECT SUM(no_of_views) AS tot_views FROM video WHERE user_id = '$user_id' AND DATE(creation_datetime) = CURDATE()";
					$result2222 = $con->query($sql2222);
					$formdata2222 = $result2222->fetch_assoc();

					$sql22222 = "SELECT SUM(no_of_views) AS tot_views FROM video WHERE user_id = '$user_id' AND YEARWEEK(creation_datetime, 1) = YEARWEEK(CURDATE(), 1)";
					$result22222 = $con->query($sql22222);
					$formdata22222 = $result22222->fetch_assoc();

					$sql222222 = "SELECT SUM(no_of_views) AS tot_views FROM video WHERE user_id = '$user_id' AND DATE(creation_datetime) between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
					$result222222 = $con->query($sql222222);
					$formdata222222 = $result222222->fetch_assoc();

					$sql2222222 = "SELECT SUM(no_of_views) AS tot_views FROM video WHERE user_id = '$user_id' AND YEAR(creation_datetime) = YEAR(CURDATE())";
					$result2222222 = $con->query($sql2222222);
					$formdata2222222 = $result2222222->fetch_assoc();

					$sql3 = "SELECT * FROM comment WHERE video_user_id = '$user_id'";
					$result3 = $con->query($sql3);
					$formdata3 = $result3->fetch_assoc();

					$sql33 = "SELECT * FROM comment WHERE video_user_id = '$user_id' AND DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
					$result33 = $con->query($sql33);
					$formdata33 = $result33->fetch_assoc();

					$sql333 = "SELECT * FROM comment WHERE video_user_id = '$user_id' AND DATE(creation_datetime) = CURDATE()";
					$result333 = $con->query($sql333);
					$formdata333 = $result333->fetch_assoc();

					$sql3333 = "SELECT * FROM comment WHERE video_user_id = '$user_id' AND YEARWEEK(creation_datetime, 1) = YEARWEEK(CURDATE(), 1)";
					$result3333 = $con->query($sql3333);
					$formdata3333 = $result3333->fetch_assoc();

					$sql33333 = "SELECT * FROM comment WHERE video_user_id = '$user_id' AND DATE(creation_datetime) between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
					$result33333 = $con->query($sql33333);
					$formdata33333 = $result33333->fetch_assoc();

					$sql333333 = "SELECT * FROM comment WHERE video_user_id = '$user_id' AND YEAR(creation_datetime) = YEAR(CURDATE())";
					$result333333 = $con->query($sql333333);
					$formdata333333 = $result333333->fetch_assoc();

					$sql4 = "SELECT * FROM question WHERE video_user_id = '$user_id'";
					$result4 = $con->query($sql4);
					$formdata4 = $result4->fetch_assoc();

					$sql44 = "SELECT * FROM question WHERE video_user_id = '$user_id' AND DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
					$result44 = $con->query($sql44);
					$formdata44 = $result44->fetch_assoc();

					$sql444 = "SELECT * FROM question WHERE video_user_id = '$user_id' AND DATE(creation_datetime) = CURDATE()";
					$result444 = $con->query($sql444);
					$formdata444 = $result444->fetch_assoc();

					$sql4444 = "SELECT * FROM question WHERE video_user_id = '$user_id' AND YEARWEEK(creation_datetime, 1) = YEARWEEK(CURDATE(), 1)";
					$result4444 = $con->query($sql4444);
					$formdata4444 = $result4444->fetch_assoc();

					$sql44444 = "SELECT * FROM question WHERE video_user_id = '$user_id' AND DATE(creation_datetime) between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
					$result44444 = $con->query($sql44444);
					$formdata44444 = $result44444->fetch_assoc();

					$sql444444 = "SELECT * FROM question WHERE video_user_id = '$user_id' AND YEAR(creation_datetime) = YEAR(CURDATE())";
					$result444444 = $con->query($sql444444);
					$formdata444444 = $result444444->fetch_assoc();

					$sql5 = "SELECT * FROM answer WHERE video_user_id = '$user_id'";
					$result5 = $con->query($sql5);
					$formdata5 = $result5->fetch_assoc();

					$sql55 = "SELECT * FROM answer WHERE video_user_id = '$user_id' AND DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
					$result55 = $con->query($sql55);
					$formdata55 = $result55->fetch_assoc();

					$sql55 = "SELECT * FROM answer WHERE video_user_id = '$user_id' AND DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
					$result55 = $con->query($sql55);
					$formdata55 = $result55->fetch_assoc();

					$sql555 = "SELECT * FROM answer WHERE video_user_id = '$user_id' AND DATE(creation_datetime) = CURDATE()";
					$result555 = $con->query($sql555);
					$formdata555 = $result555->fetch_assoc();

					$sql5555 = "SELECT * FROM answer WHERE video_user_id = '$user_id' AND YEARWEEK(creation_datetime, 1) = YEARWEEK(CURDATE(), 1)";
					$result5555 = $con->query($sql5555);
					$formdata5555 = $result5555->fetch_assoc();

					$sql55555 = "SELECT * FROM answer WHERE video_user_id = '$user_id' AND DATE(creation_datetime) between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
					$result55555 = $con->query($sql55555);
					$formdata55555 = $result55555->fetch_assoc();

					$sql555555 = "SELECT * FROM answer WHERE video_user_id = '$user_id' AND YEAR(creation_datetime) = YEAR(CURDATE())";
					$result555555 = $con->query($sql555555);
					$formdata555555 = $result555555->fetch_assoc();
				}
		    }
    	?>

		<div class="container-fluid page-body-wrapper">
 			<?php include('includes/sidebar.php') ?>

	      	<div class="main-panel">
	        	<div class="content-wrapper">
	        		<div class="page-content">
		          		<div class="row">
				            <div class="col-md-12 grid-margin">
				              	<div class="row">
						            <div class="col-12 col-xl-12 mb-4 mb-xl-0">
						                <h4 class="font-weight-bold">Welcome,</h4>
						                <h4 class="font-weight-normal mb-0"><?= $_SESSION['logged_in_user']; ?></h4>
						            </div>
				              	</div>
				            </div>
		          		</div>

		          		<div class="row">
				            <div class="col-md-3 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
					                  	<p class="card-title text-md-center text-xl-left">Number of Views</p>

					                  	<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
					                    	<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $formdata22['tot_views']; ?></h3>

					                    	<i class="ti-eye icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					                  	</div>
					                 	
					                 	<p class="mb-0 mt-2 <?php if($formdata222['tot_views'] < 5){ echo 'text-danger'; } elseif($formdata222['tot_views'] >= 5 && $formdata222['tot_views'] <= 10){ echo 'text-warning'; } else{ echo 'text-success'; } ?>"><?= $formdata222['tot_views']; ?> <span class="text-body ml-1"><small>in last 30 days</small></span></p>
				                	</div>
				              	</div>
				            </div>

				            <div class="col-md-3 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
					                  	<p class="card-title text-md-center text-xl-left">Number of Comments</p>

					                  	<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
					                    	<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $result3->num_rows; ?></h3>

					                    	<i class="ti-comment-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					                  	</div>  
					                  	
					                  	<p class="mb-0 mt-2 <?php if($result33->num_rows < 5){ echo 'text-danger'; } elseif($result33->num_rows >= 5 && $result33->num_rows <= 10){ echo 'text-warning'; } else{ echo 'text-success'; } ?>"><?= $result33->num_rows; ?> <span class="text-body ml-1"><small>in last 30 days</small></span></p>
				                	</div>
				              	</div>
				            </div>

				            <div class="col-md-3 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
					                  	<p class="card-title text-md-center text-xl-left">Number of Questions</p>

					                  	<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
					                    	<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $result4->num_rows; ?></h3>

					                    	<i class="ti-help icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					                  	</div>  

					                  	<p class="mb-0 mt-2 <?php if($result44->num_rows < 5){ echo 'text-danger'; } elseif($result44->num_rows >= 5 && $result44->num_rows <= 10){ echo 'text-warning'; } else{ echo 'text-success'; } ?>"><?= $result44->num_rows; ?><span class="text-body ml-1"><small>in last 30 days</small></span></p>
				                	</div>
				              	</div>
				            </div>

				            <div class="col-md-3 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
					                  	<p class="card-title text-md-center text-xl-left">Number of Answers</p>

					                  	<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
					                    	<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $result5->num_rows; ?></h3>

					                    	<i class="ti-write icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					                  	</div>  
					                  	
					                  	<p class="mb-0 mt-2 <?php if($result5->num_rows < 5){ echo 'text-danger'; } elseif($result5->num_rows >= 5 && $result5->num_rows <= 10){ echo 'text-warning'; } else{ echo 'text-success'; } ?>"><?= $result55->num_rows; ?><span class="text-body ml-1"><small>in last 30 days</small></span></p>
				                	</div>
				              	</div>
				            </div>
				        </div>

		          		<div class="row">
				            <div class="col-md-12 grid-margin">
				              	<div style="background-color: #ff5722" class="card border-0 position-relative">
				                	<div class="card-body">
				                  		<p class="card-title text-white">Overview</p>

			                  			<div id="performanceOverview" class="carousel slide performance-overview-carousel position-static pt-2" data-ride="carousel">
						                    <div class="carousel-inner">
						                      	<div class="carousel-item active">
						                        	<div class="row">
						                          		<div class="col-md-3 item">
						                            		<div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
						                              			<div class="text-white mr-3">
						                                			<i class="ti-eye icon-lg ml-3"></i>
						                              			</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Views This Day</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?php if($formdata2222['tot_views']){ echo $formdata2222['tot_views']; } else{ echo 0; } ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
						                                			<i class="ti-comment-alt icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
					                                  					<h4 class="font-weight-light mr-2 mb-1">Comments This Day</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result333->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                           		</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-help icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Questions This Day</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result444->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-write icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Answers This Day</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result555->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>
							                        </div>
							                    </div>

						                      	<div class="carousel-item">
						                        	<div class="row">
						                          		<div class="col-md-3 item">
						                            		<div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
								                              	<div class="text-white mr-3">
								                                	<i class="ti-eye icon-lg ml-3"></i>
								                              	</div>
						                              
								                              	<div class="content text-white">
								                                	<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
								                                  		<h4 class="font-weight-light mr-2 mb-1">Views This Week</h4>
								                                	</div>

								                                	<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
								                                  		<h5 class="mb-0"><?php if($formdata22222['tot_views']){ echo $formdata22222['tot_views']; } else{ echo 0; } ?></h5>

								                                	</div>
								                              	</div>
						                            		</div>
						                          		</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-comment-alt icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Comments This Week</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result3333->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-help icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Questions This Week</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result4444->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-write icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Answers This Week</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result5555->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>
						                        	</div>
						                    	</div>

						                    	<div class="carousel-item">
						                        	<div class="row">
						                          		<div class="col-md-3 item">
						                            		<div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
								                              	<div class="text-white mr-3">
								                                	<i class="ti-eye icon-lg ml-3"></i>
								                              	</div>
						                              
								                              	<div class="content text-white">
								                                	<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
								                                  		<h4 class="font-weight-light mr-2 mb-1">Views This Month</h4>
								                                	</div>

								                                	<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
								                                  		<h5 class="mb-0"><?php if($formdata222222['tot_views']){ echo $formdata222222['tot_views']; } else{ echo 0; } ?></h5>
								                                	</div>
								                              	</div>
						                            		</div>
						                          		</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-comment-alt icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Comments This Month</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result33333->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-help icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Questions This Month</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result44444->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-write icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Answers This Month</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result55555->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>
						                        	</div>
						                    	</div>

						                    	<div class="carousel-item">
						                        	<div class="row">
						                          		<div class="col-md-3 item">
						                            		<div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
								                              	<div class="text-white mr-3">
								                                	<i class="ti-eye icon-lg ml-3"></i>
								                              	</div>
						                              
								                              	<div class="content text-white">
								                                	<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
								                                  		<h4 class="font-weight-light mr-2 mb-1">Views This Year</h4>
								                                	</div>

								                                	<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
								                                  		<h5 class="mb-0"><?php if($formdata2222222['tot_views']){ echo $formdata2222222['tot_views']; } else{ 0; } ?></h5>
								                                	</div>
								                              	</div>
						                            		</div>
						                          		</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-comment-alt icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Comments This Year</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result333333->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-help icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Questions This Year</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result444444->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>

							                          	<div class="col-md-3 item">
							                            	<div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
							                              		<div class="text-white mr-3">
							                                		<i class="ti-write icon-lg ml-3"></i>
							                              		</div>

							                              		<div class="content text-white">
							                                		<div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
							                                  			<h4 class="font-weight-light mr-2 mb-1">Answers This Year</h4>
							                                		</div>

							                                		<div class="col-8 col-md-7 d-flex align-items-center justify-content-between px-0 pb-2 mb-3">
							                                  			<h5 class="mb-0"><?= $result555555->num_rows; ?></h5>
							                                		</div>
							                              		</div>
							                            	</div>
							                          	</div>
						                        	</div>
						                    	</div>
						                	</div>

					                    	<a class="carousel-control-prev" href="#performanceOverview" role="button" data-slide="prev">
					                      		<span class="carousel-control-prev-icon" aria-hidden="true"></span>

					                      		<span class="sr-only">Previous</span>
					                    	</a>

					                    	<a class="carousel-control-next" href="#performanceOverview" role="button" data-slide="next">
					                      		<span class="carousel-control-next-icon" aria-hidden="true"></span>

					                      		<span class="sr-only">Next</span>
					                    	</a>
				                  		</div>
				                	</div>
				            	</div>
				        	</div>
		          		</div>

		          		<div class="row">
				            <div class="col-md-6 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
				                  		<p class="card-title">Views of My Videos</p>

						                <canvas id="areaChart"></canvas>
				                	</div>
				              	</div>
				            </div>

				            <div class="col-md-6 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
				                  		<p class="card-title">Per Day Views of My Videos</p>

				                  		<div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>

				                  		<canvas id="barChart"></canvas>
				               		</div>
				              	</div>
				            </div>
				        </div>

				        <div class="row">
			            	<div class="col-md-3 grid-margin stretch-card">
			              		<div class="card">
			                		<div class="card-body">
			                  			<p class="card-title mb-0">Age Group (%)</p>

					                  	<div class="table-responsive mb-3 mb-md-0">
	                              			<table class="table table-borderless report-table">
			                                    <tr>
			                                      	<td class="text-muted">Under 1 year</td>

			                                      	<td class="w-100 px-0">
			                                        	<div class="progress progress-md mx-4">
			                                          		<div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
			                                        	</div>
			                                      	</td>

			                                      	<td><h5 class="font-weight-bold mb-0">17</h5></td>
			                                    </tr>

			                                    <tr>
			                                      	<td class="text-muted">1 to 3 years</td>
			                                      	
			                                      	<td class="w-100 px-0">
			                                        	<div class="progress progress-md mx-4">
			                                          		<div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
			                                        	</div>
			                                      	</td>

			                                      	<td><h5 class="font-weight-bold mb-0">33</h5></td>
			                                    </tr>

	                                			<tr>
	                                  				<td class="text-muted">4 to 8 years</td>

	                                  				<td class="w-100 px-0">
	                                    				<div class="progress progress-md mx-4">
	                                      					<div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
	                                    				</div>
	                                  				</td>

	                                  				<td><h5 class="font-weight-bold mb-0">14</h5></td>
	                                			</tr>

	                                			<tr>
	                                  				<td class="text-muted">9 to 15 years</td>

	                                  				<td class="w-100 px-0">
	                                    				<div class="progress progress-md mx-4">
	                                      					<div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
	                                    				</div>
	                                  				</td>

	                                  				<td><h5 class="font-weight-bold mb-0">16</h5></td>
	                                			</tr>

			                                    <tr>
			                                      	<td class="text-muted">16 to 18 years</td>

			                                      	<td class="w-100 px-0">
			                                        	<div class="progress progress-md mx-4">
			                                          		<div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
			                                        	</div>
			                                      	</td>

			                                      	<td><h5 class="font-weight-bold mb-0">7</h5></td>
			                                    </tr>

			                                    <tr>
			                                      	<td class="text-muted">19 to above</td>

			                                      	<td class="w-100 px-0">
			                                        	<div class="progress progress-md mx-4">
			                                          		<div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
			                                        	</div>
			                                      	</td>

			                                      	<td><h5 class="font-weight-bold mb-0">13</h5></td>
			                                    </tr>
	                              			</table>
	                            		</div>
			                		</div>
			              		</div>
			            	</div>

			            	<div class="col-md-3 grid-margin stretch-card">
			              		<div class="card">
			                		<div class="card-body">
			                  			<p class="card-title mb-0">Origin of the viewers (%)</p><br>

					                  	<canvas id="north-america-chart-dark"></canvas>

							            <div id="north-america-legend-dark"></div>
			                		</div>
			              		</div>
			            	</div>
							
							<div class="col-md-6 grid-margin stretch-card">
			              		<div class="card">
			                		<div class="card-body">
			                  			<p class="card-title mb-0">Droupout rate (%)</p><br>

					                  	<canvas id="doughnutChart"></canvas>
			                		</div>
			              		</div>
			            	</div>
			            </div>

			          	<div class="row">
			            	<div class="col-md-8 stretch-card grid-margin grid-margin-md-0">
			              		<div class="card">
			                		<div class="card-body">
			                  			<p class="card-title mb-0">My Recent Videos</p>

					                  	<div class="table-responsive">
					                    	<table class="table table-borderless">
					                      		<thead>
							                        <tr>
							                          	<th class="pl-0 border-bottom">ID</th>
							                          	<th class="border-bottom">Category</th>
							                          	<th class="border-bottom">Likes</th>
							                          	<th class="border-bottom">Dislikes</th>
							                          	<th class="border-bottom">Shares</th>
							                        </tr>
							                    </thead>

					                      		<tbody>
					                      			<?php 
						                      			$sql8 = "SELECT * FROM video WHERE user_id = '$user_id' ORDER BY video_id DESC LIMIT 10";
												        $result8 = $con->query($sql8);

												        if($result8->num_rows > 0){
												        	$i = 0;

												            while($row = $result8->fetch_assoc()){
												            	$post_type_id = explode(',', $row['post_type_id']);
						                      		?>
										                        <tr>
										                          	<td class="font-weight-bold pl-0"><a style="color: #ff5722;">#<?= $row['video_id']; ?></a></td>
										                          	<td class="text-muted">
										                          		<?php 
										                          			foreach($post_type_id as $key => $value){
										                          				$sql9 = "SELECT type_name FROM post_type WHERE post_type_id = '$value' LIMIT 1";
												        						$result9 = $con->query($sql9);
												        						$formdata9 = $result9->fetch_assoc();

												        						if($key > 0) echo '; ';
												        						echo $formdata9['type_name'];
												        					}
										                          		?>
										                          	</td>
										                          	<td class="text-muted"><?= $row['no_of_likes']; ?></td>
										                          	<td class="text-muted"><?= $row['no_of_dislikes']; ?></td>
										                          	<td class="text-muted"><?= $row['no_of_shares']; ?></td>
										                        </tr>
													<?php 
																$i++;
															}
														}
													?>
							                    </tbody>
							                </table>
					                  	</div>
			                		</div>
			              		</div>
			            	</div>
				            
				            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
				              	<div class="card">
				                	<div class="card-body">
				                  		<p class="card-title">Recent Comments on My Videos</p>

				                  		<ul class="icon-data-list">
											<?php 
				                      			$sql9 = "SELECT c.*, v.video_id, u.first_name, u.surname FROM comment c JOIN video v ON c.video_id = v.video_id JOIN user u ON c.user_id = u.user_id WHERE c.video_user_id = '$user_id' ORDER BY c.comment_id DESC LIMIT 10";
										        $result9 = $con->query($sql9);

										        if($result9->num_rows > 0){
										        	$i = 0;

										            while($row = $result9->fetch_assoc()){
				                      		?>
								                    <li>
								                      	<p class="mb-1"><a style="color: #ff5722;"><?= $row['first_name'] . ' ' . $row['surname']; ?></a></p>
								                      	<p class="text-muted"><?= $row['details']; ?></p>

								                      	<small class="text-muted">On <?= $row['creation_datetime']; ?> &nbsp;&nbsp; In video <a style="color: #ff5722;">#<?= $row['video_id']; ?></a></small>
								                    </li>
								            <?php
								            			$i++; 
								            		}
								            	}
								            ?>
						                </ul>
				                	</div>
				              	</div>
				            </div>
		        		</div>
		        	</div>
				</div>

	        	<?php include('includes/footer.php') ?>
	      	</div>
		</div>
  	</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
			$(".preload").fadeOut(0, function() {
		        $(".page-content").fadeIn(1000);
		    });
		}, 1500);
	});
</script>