<?php 
	include('includes/header.php');
	include('../config/config.php');
	session_start();

	if(!isset($_SESSION['logged_in_email']) && empty($_SESSION['logged_in_email'])){
        header('Location: index.php');
    } else{
    	$sql = "SELECT * FROM user";
		$result = $con->query($sql);
		$formdata = $result->fetch_assoc();

		$sql2 = "SELECT * FROM video";
		$result2 = $con->query($sql2);
		$formdata2 = $result2->fetch_assoc();

		$sql22 = "SELECT *, SUM(no_of_views) AS tot_views FROM video";
		$result22 = $con->query($sql22);
		$formdata22 = $result22->fetch_assoc();

		$sql222 = "SELECT *, SUM(no_of_views) AS tot_views FROM video WHERE DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
		$result222 = $con->query($sql222);
		$formdata222 = $result222->fetch_assoc();

		$sql2222 = "SELECT SUM(no_of_views) AS tot_views FROM video WHERE DATE(creation_datetime) = CURDATE()";
		$result2222 = $con->query($sql2222);
		$formdata2222 = $result2222->fetch_assoc();

		$sql22222 = "SELECT SUM(no_of_views) AS tot_views FROM video WHERE YEARWEEK(creation_datetime, 1) = YEARWEEK(CURDATE(), 1)";
		$result22222 = $con->query($sql22222);
		$formdata22222 = $result22222->fetch_assoc();

		$sql222222 = "SELECT SUM(no_of_views) AS tot_views FROM video WHERE DATE(creation_datetime) between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
		$result222222 = $con->query($sql222222);
		$formdata222222 = $result222222->fetch_assoc();

		$sql2222222 = "SELECT SUM(no_of_views) AS tot_views FROM video WHERE YEAR(creation_datetime) = YEAR(CURDATE())";
		$result2222222 = $con->query($sql2222222);
		$formdata2222222 = $result2222222->fetch_assoc();

		$sql3 = "SELECT * FROM company";
		$result3 = $con->query($sql3);
		$formdata3 = $result3->fetch_assoc();

		$sql4 = "SELECT * FROM post_type";
		$result4 = $con->query($sql4);
		$formdata4 = $result4->fetch_assoc();

		$sql5 = "SELECT * FROM comment";
		$result5 = $con->query($sql5);
		$formdata5 = $result5->fetch_assoc();

		$sql55 = "SELECT * FROM comment WHERE DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
		$result55 = $con->query($sql55);
		$formdata55 = $result55->fetch_assoc();

		$sql555 = "SELECT * FROM comment WHERE DATE(creation_datetime) = CURDATE()";
		$result555 = $con->query($sql555);
		$formdata555 = $result555->fetch_assoc();

		$sql5555 = "SELECT * FROM comment WHERE YEARWEEK(creation_datetime, 1) = YEARWEEK(CURDATE(), 1)";
		$result5555 = $con->query($sql5555);
		$formdata5555 = $result5555->fetch_assoc();

		$sql55555 = "SELECT * FROM comment WHERE DATE(creation_datetime) between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
		$result55555 = $con->query($sql55555);
		$formdata55555 = $result55555->fetch_assoc();

		$sql555555 = "SELECT * FROM comment WHERE YEAR(creation_datetime) = YEAR(CURDATE())";
		$result555555 = $con->query($sql555555);
		$formdata555555 = $result555555->fetch_assoc();

		$sql6 = "SELECT * FROM question";
		$result6 = $con->query($sql6);
		$formdata6 = $result6->fetch_assoc();

		$sql66 = "SELECT * FROM question WHERE DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
		$result66 = $con->query($sql66);
		$formdata66 = $result66->fetch_assoc();

		$sql666 = "SELECT * FROM question WHERE DATE(creation_datetime) = CURDATE()";
		$result666 = $con->query($sql666);
		$formdata666 = $result666->fetch_assoc();

		$sql6666 = "SELECT * FROM question WHERE YEARWEEK(creation_datetime, 1) = YEARWEEK(CURDATE(), 1)";
		$result6666 = $con->query($sql6666);
		$formdata6666 = $result6666->fetch_assoc();

		$sql66666 = "SELECT * FROM question WHERE DATE(creation_datetime) between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
		$result66666 = $con->query($sql66666);
		$formdata66666 = $result66666->fetch_assoc();

		$sql666666 = "SELECT * FROM question WHERE YEAR(creation_datetime) = YEAR(CURDATE())";
		$result666666 = $con->query($sql666666);
		$formdata666666 = $result666666->fetch_assoc();

		$sql7 = "SELECT * FROM answer";
		$result7 = $con->query($sql7);
		$formdata7 = $result7->fetch_assoc();

		$sql77 = "SELECT * FROM answer WHERE DATE(creation_datetime) >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
		$result77 = $con->query($sql77);
		$formdata77 = $result77->fetch_assoc();

		$sql777 = "SELECT * FROM answer WHERE DATE(creation_datetime) = CURDATE()";
		$result777 = $con->query($sql777);
		$formdata777 = $result777->fetch_assoc();

		$sql7777 = "SELECT * FROM answer WHERE YEARWEEK(creation_datetime, 1) = YEARWEEK(CURDATE(), 1)";
		$result7777 = $con->query($sql7777);
		$formdata7777 = $result7777->fetch_assoc();

		$sql77777 = "SELECT * FROM answer WHERE DATE(creation_datetime) between DATE_FORMAT(NOW(),'%Y-%m-01') and LAST_DAY(NOW())";
		$result77777 = $con->query($sql77777);
		$formdata77777 = $result77777->fetch_assoc();

		$sql777777 = "SELECT * FROM answer WHERE YEAR(creation_datetime) = YEAR(CURDATE())";
		$result777777 = $con->query($sql777777);
		$formdata777777 = $result777777->fetch_assoc();
    }
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
    	<?php include('includes/navbar.php') ?>

		<div class="container-fluid page-body-wrapper">
 			<?php include('includes/sidebar.php') ?>

	      	<div class="main-panel">
	        	<div class="content-wrapper">
	        		<div class="page-content">
		          		<div class="row">
				            <div class="col-md-12 grid-margin">
				              	<div class="row">
						            <div class="col-12 col-xl-5 mb-4 mb-xl-0">
						                <h4 class="font-weight-bold">Welcome,</h4>
						                <h4 class="font-weight-normal mb-0"><?= $_SESSION['logged_in_user']; ?></h4>
						            </div>

					                <div class="col-12 col-xl-7">
					                  	<div class="d-flex align-items-center justify-content-between flex-wrap">
						                    <div class="border-right pr-4 mb-3 mb-xl-0">
						                      	<p class="text-muted">Total Uploads</p>
						                      	<h4 class="mb-0 font-weight-bold"><?= $result2->num_rows; ?></h4>
						                    </div>

						                    <div class="border-right pr-4 mb-3 mb-xl-0">
						                      	<p class="text-muted">Total Users</p>
						                      	<h4 class="mb-0 font-weight-bold"><?= $result2->num_rows; ?></h4>
						                    </div>

						                    <div class="border-right pr-4 mb-3 mb-xl-0">
						                      	<p class="text-muted">Total Companies</p>
						                      	<h4 class="mb-0 font-weight-bold"><?= $result3->num_rows; ?></h4>
						                    </div>

						                    <div class="pr-3 mb-3 mb-xl-0">
						                      	<p class="text-muted">Total Categories</p>
						                      	<h4 class="mb-0 font-weight-bold"><?= $result4->num_rows; ?></h4>
						                    </div>

						                    <div class="mb-3 mb-xl-0">
						                      	<a href="video.php"><button style="background-color: #ff5722; border-color: #ff5722" class="btn btn-warning rounded-0 text-white">All Uploads</button></a>
						                    </div>
					                  	</div>
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
					                    	<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $result5->num_rows; ?></h3>

					                    	<i class="ti-comment-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					                  	</div>  
					                  	
					                  	<p class="mb-0 mt-2 <?php if($result55->num_rows < 5){ echo 'text-danger'; } elseif($result55->num_rows >= 5 && $result55->num_rows <= 10){ echo 'text-warning'; } else{ echo 'text-success'; } ?>"><?= $result55->num_rows; ?> <span class="text-body ml-1"><small>in last 30 days</small></span></p>
				                	</div>
				              	</div>
				            </div>

				            <div class="col-md-3 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
					                  	<p class="card-title text-md-center text-xl-left">Number of Questions</p>

					                  	<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
					                    	<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $result6->num_rows; ?></h3>

					                    	<i class="ti-help icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					                  	</div>  

					                  	<p class="mb-0 mt-2 <?php if($result66->num_rows < 5){ echo 'text-danger'; } elseif($result66->num_rows >= 5 && $result66->num_rows <= 10){ echo 'text-warning'; } else{ echo 'text-success'; } ?>"><?= $result66->num_rows; ?> <span class="text-body ml-1"><small>in last 30 days</small></span></p>
				                	</div>
				              	</div>
				            </div>

				            <div class="col-md-3 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
					                  	<p class="card-title text-md-center text-xl-left">Number of Answers</p>

					                  	<div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
					                    	<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= $result7->num_rows; ?></h3>

					                    	<i class="ti-write icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
					                  	</div>  
					                  	
					                  	<p class="mb-0 mt-2 <?php if($result77->num_rows < 5){ echo 'text-danger'; } elseif($result77->num_rows >= 5 && $result77->num_rows <= 10){ echo 'text-warning'; } else{ echo 'text-success'; } ?>"><?= $result77->num_rows; ?> <span class="text-body ml-1"><small>in last 30 days</small></span></p>
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
							                                  			<h5 class="mb-0"><?= $result555->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result666->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result777->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result5555->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result6666->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result5555->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result6666->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result7777->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result55555->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result66666->num_rows; ?></h5>
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
							                                  			<h5 class="mb-0"><?= $result77777->num_rows; ?></h5>
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
				                  		<p class="card-title">Site Visitors</p>

						                <canvas id="areaChart"></canvas>
				                	</div>
				              	</div>
				            </div>

				            <div class="col-md-6 grid-margin stretch-card">
				              	<div class="card">
				                	<div class="card-body">
				                  		<p class="card-title">Site Visitors Per Day</p>

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
			                  			<p class="card-title mb-0">Origin of the spectators (%)</p><br>

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
			            	<div class="col-md-7 stretch-card grid-margin grid-margin-md-0">
			              		<div class="card">
			                		<div class="card-body">
			                  			<p class="card-title mb-0">Top Videos</p>

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
						                      			$sql8 = "SELECT * FROM video ORDER BY no_of_likes DESC LIMIT 10";
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
				            
				            <div class="col-md-5 stretch-card grid-margin grid-margin-md-0">
				              	<div class="card">
				                	<div class="card-body">
				                  		<p class="card-title">Recent Comments</p>

				                  		<ul class="icon-data-list">
											<?php 
				                      			$sql9 = "SELECT c.*, v.video_id, u.first_name, u.surname FROM comment c JOIN video v ON c.video_id = v.video_id JOIN user u ON c.user_id = u.user_id ORDER BY c.comment_id DESC LIMIT 10";
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

		<?php 
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            	if($_SESSION['message'] == 'success'){
        ?>
                	showLoginSuccessToast('<?= $_SESSION['logged_in_user_type']; ?>');
        <?php
                	$_SESSION['message'] = '';
            	}
            }
        ?>
	});
</script>