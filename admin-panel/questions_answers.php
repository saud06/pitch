<?php 
	include('includes/header.php');
	include('../config/config.php');
	session_start();

	if(!isset($_SESSION['logged_in_email']) && empty($_SESSION['logged_in_email'])){
        header('Location: index.php');
    } else{
    	$video_id = $_GET['video_id'];

    	if($_SESSION['logged_in_user_type'] === 'Administrator'){
    		$sql = "SELECT * FROM video WHERE video_id = '$video_id'";
			$result = $con->query($sql);

			if($result->num_rows > 0){
				$formdata = $result->fetch_assoc();
				$user_id = $formdata['user_id'];

				$sql2 = "SELECT * FROM user WHERE user_id = '$user_id' LIMIT 1";
				$result2 = $con->query($sql2);

				if($result2->num_rows > 0){
					$formdata2 = $result2->fetch_assoc();
				}
			}
    	}
    }
?>

<style type="text/css">
	.custom-link{
		color: inherit;
	}

	.custom-list{
		padding: 20px 10px;
	}

	.custom-link:hover{
		cursor: default;
		text-decoration: none;
		color: inherit;
	}

	.custom-list:hover{
		background: rgba(163, 164, 165, 0.2);
	}

	.loader {
	    display: none;
	    position: absolute;
	    top: 0; left: 0; right: 0; bottom: 0;
	    background: rgba(255,255,255,0.2) url('images/pre-loader.gif') center center no-repeat;
	    z-index: 1000;
	}
</style>

<body>
  	<div class="container-scroller">
  		<?php include('includes/navbar.php') ?>

	    <div class="container-fluid page-body-wrapper">
	      	<?php include('includes/sidebar.php') ?>
	      
	      	<div class="main-panel">
		        <div class="content-wrapper">
		        	<nav aria-label="breadcrumb">
	                  	<ol class="breadcrumb breadcrumb-custom">
		                    <li class="breadcrumb-item"><a href="#"><i class="ti-home menu-icon"></i> Home</a></li>
		                    <li class="breadcrumb-item"><a href="video.php"><i class="ti-video-camera menu-icon"></i> Video</a></li>
		                    <li class="breadcrumb-item active" aria-current="page"><span><i class="ti-help menu-icon"></i> Question & Answers</span></li>
	                  	</ol>
	                </nav>

	                <div class="row">
						<div class="col-md-6 grid-margin">
							<div class="card d-flex align-items-center">
								<div class="card-body">
									<div class="d-flex flex-row align-items-center">
										<i style="color: #ff5722;" class="ti-help icon-md"></i>

										<div class="ml-3">
											<h3 class="text-youtube">Questions</h3>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 grid-margin">
							<div class="card d-flex align-items-center">
								<div class="card-body">
									<div class="d-flex flex-row align-items-center">
										<i style="color: #ff5722;" class="ti-align-left icon-md"></i>

										<div class="ml-3">
											<h3 class="text-youtube">Answers</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
			        </div>

					<div class="row">
				        <div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">
										Video ID: <?= $video_id; ?><br><br>
										Video Title: <?= $formdata['video_title']; ?>
									</h4>

									<?php 
		                      			$sql3 = "SELECT q.*, u.first_name, u.surname, u.profile_picture FROM question q JOIN user u ON q.user_id = u.user_id WHERE q.video_id = '$video_id'";
								        $result3 = $con->query($sql3);

								        if($result3->num_rows > 0){
								        	$i = 0;

								            while($row = $result3->fetch_assoc()){
								            	$question_id = $row['question_id'];
								            	$video_id = $row['video_id'];
								            	$status = $row['status'];
		                      		?>

												<a href="#" class="custom-link">
													<div style="align-items: stretch !important; <?php if($status == 'Inactive') echo 'opacity: 0.2'; ?>" class="d-flex align-items-center pb-3 border-bottom custom-list">
														<img class="img-sm rounded-circle" src="<?php if($row['profile_picture']){ echo '../backend/uploads/' . $row['profile_picture']; } else{ echo 'images/faces/no_image_available.jpg'; } ?>" alt="User Image">

														<div class="ml-3">
															<h6 class="mb-1"><?= $row['first_name'] . ' ' . $row['surname']; ?></h6>

															<small class="text-muted mb-0">
																<i class="ti-timer mr-1"></i><?= $row['creation_datetime']; ?> &nbsp; 

																<button type="button" style="height: 25px; padding: 0" class="btn btn-warning btn-sm" title="Hide" onclick="hide_question_modal('<?= $question_id; ?>', '<?= $status; ?>')"><i class="ti-na font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; 

																<button type="button" style="height: 25px; padding: 0" class="btn btn-danger btn-sm" title="Delete" onclick="delete_question_modal('<?= $question_id; ?>')"><i class="ti-trash font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; 

																<button type="button" style="height: 25px; padding: 0" class="btn btn-primary btn-sm" title="Answers" onclick="answer('<?= $question_id; ?>', '<?= $video_id; ?>')"><i class="ti-comment-alt font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; 

																<?php if($status == 'Inactive') echo '<i>( Hidden )</i>'; ?>
															</small>

															<p style="margin-top: 10px" class="text-muted mb-1"><?= $row['details']; ?></p>
														</div>
													</div>
												</a>
									<?php 
											}
										}
									?>
								</div>
							</div>
						</div>

						<div class="modal fade" id="hideCommModal" tabindex="-1" role="dialog" aria-labelledby="hideCommModalLabel" aria-hidden="true">
		                    <div class="modal-dialog" role="document">
		                      	<div class="modal-content">
			                        <div class="modal-header">
			                          	<h5 class="modal-title" id="hideCommModalLabel"><span class="title-text"></span> Question</h5>

			                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            	<span aria-hidden="true">&times;</span>
			                          	</button>
			                        </div>

		                        	<form class="cmxform" id="question_hide_form" method="POST" action="question_hide.php" enctype="multipart/form-data">
			                        	<div class="modal-body">
				                          	<p>Do You Really Want to <span class="title-text"></span> This Question?</p>

				                          	<input type="hidden" name="hid_question_id" id="hid_question_id">
				                          	<input type="hidden" name="question_video_id2" id="question_video_id2">
				                          	<input type="hidden" name="question_status" id="question_status">
				                        </div>

				                        <div class="modal-footer">
				                          	<button type="submit" id="video_question_hide_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

				                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
				                        </div>
				                    </form>
		                      	</div>
		                    </div>
		                </div>

		                <div class="modal fade" id="deleteCommModal" tabindex="-1" role="dialog" aria-labelledby="deleteCommModalLabel" aria-hidden="true">
		                    <div class="modal-dialog" role="document">
		                      	<div class="modal-content">
			                        <div class="modal-header">
			                          	<h5 class="modal-title" id="deleteCommModalLabel">Delete Question</h5>

			                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            	<span aria-hidden="true">&times;</span>
			                          	</button>
			                        </div>

		                        	<form class="cmxform" id="question_delete_form" method="POST" action="question_delete.php" enctype="multipart/form-data">
			                        	<div class="modal-body">
				                          	<p>Do You Really Want to Delete This Question?</p>

				                          	<input type="hidden" name="dlt_question_id" id="dlt_question_id">
				                          	<input type="hidden" name="question_video_id" id="question_video_id">
				                        </div>

				                        <div class="modal-footer">
				                          	<button type="submit" id="video_question_delete_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

				                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
				                        </div>
				                    </form>
		                      	</div>
		                    </div>
		                </div>

						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<?php 
									$sql4 = "SELECT * FROM answer WHERE video_id = '$video_id'";
								    $result4 = $con->query($sql4);
								    $answer_number = $result4->num_rows;
								?>

								<div id="card_body" class="card-body" style="<?php if($answer_number > 0){ ?> background: url('images/comment_icon.png') center center no-repeat; <?php }?>">
									<h4 class="card-title">
										Video ID: <?= $video_id; ?><br><br>
										Video Title: <?= $formdata['video_title']; ?>
									</h4>

									<div id="loader"></div>

									<div id="answers">
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="hideRepModal" tabindex="-1" role="dialog" aria-labelledby="hideRepModalLabel" aria-hidden="true">
		                    <div class="modal-dialog" role="document">
		                      	<div class="modal-content">
			                        <div class="modal-header">
			                          	<h5 class="modal-title" id="hideRepModalLabel"><span class="title-text2"></span> Answer</h5>

			                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            	<span aria-hidden="true">&times;</span>
			                          	</button>
			                        </div>

		                        	<form class="cmxform" id="answer_hide_form" method="POST" action="answer_hide.php" enctype="multipart/form-data">
			                        	<div class="modal-body">
				                          	<p>Do You Really Want to <span class="title-text2"></span> This Answer?</p>

				                          	<input type="hidden" name="hid_answer_id" id="hid_answer_id">
				                          	<input type="hidden" name="answer_video_id2" id="answer_video_id2">
				                          	<input type="hidden" name="answer_status" id="answer_status">
				                        </div>

				                        <div class="modal-footer">
				                          	<button type="submit" id="video_answer_hide_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

				                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
				                        </div>
				                    </form>
		                      	</div>
		                    </div>
		                </div>

		                <div class="modal fade" id="deleteRepModal" tabindex="-1" role="dialog" aria-labelledby="deleteRepModalLabel" aria-hidden="true">
		                    <div class="modal-dialog" role="document">
		                      	<div class="modal-content">
			                        <div class="modal-header">
			                          	<h5 class="modal-title" id="deleteRepModalLabel">Delete Answer</h5>

			                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            	<span aria-hidden="true">&times;</span>
			                          	</button>
			                        </div>

		                        	<form class="cmxform" id="answer_delete_form" method="POST" action="answer_delete.php" enctype="multipart/form-data">
			                        	<div class="modal-body">
				                          	<p>Do You Really Want to Delete This Answer?</p>

				                          	<input type="hidden" name="dlt_answer_id" id="dlt_answer_id">
				                          	<input type="hidden" name="answer_video_id" id="answer_video_id">
				                        </div>

				                        <div class="modal-footer">
				                          	<button type="submit" id="video_answer_delete_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

				                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
				                        </div>
				                    </form>
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
		<?php 
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
        ?>
                showAddUserToast('<?= $_SESSION['message'] ?>');
        <?php
                $_SESSION['message'] = '';
            }
        ?>
	});

	function answer(question_id, video_id){
		$('#card_body').css('background', 'none');

		var loader = '<div class="loader"></div>';
        $('#loader').html(loader);

        setTimeout( function() { $('.loader').show(); }, 0 );
		setTimeout( function() { $('.loader').hide(); }, 2000 );

		$.ajax({
            url: "fetch_answer_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	question_id: question_id,
            	video_id: video_id
            },
            success: function (response) {
            	var answers = '';
            	for(i=0; i<response.answer_id.length; i++){
            		var src = '';
            		if(response.profile_picture[i]){ 
            			src += '../backend/uploads/' + response.profile_picture[i]; 
            		} else{ 
            			src += 'images/faces/no_image_available.jpg'; 
            		}

            		var opacity = '';
            		if(response.status[i] == 'Inactive') opacity = 'opacity: 0.2';

	            	answers += '<div style="align-items: stretch !important; cursor: default; ' + opacity + '" class="d-flex align-items-center pb-3 border-bottom custom-list">';

						answers += '<img class="img-sm rounded-circle" src="' + src + '" alt="User Image">';

						answers += '<div class="ml-3">';
							answers += '<h6 class="mb-1">' + response.first_name[i] + ' ' + response.surname[i] + '</h6>';

							answers += '<small class="text-muted mb-0">';
								answers += '<i class="ti-timer mr-1"></i>' + response.creation_datetime[i] + ' &nbsp; ';

								var answer_status = '';
								if(response.status == 'Active') answer_status = 1;
								else answer_status = 0;

								answers += '<button type="button" style="height: 25px; padding: 0" class="btn btn-warning btn-sm" title="Hide" onclick="hide_answer_modal('+ response.answer_id[i] +', ' + answer_status + ')"><i class="ti-na font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; ';

								answers += '<button type="button" style="height: 25px; padding: 0" class="btn btn-danger btn-sm" title="Delete" onclick="delete_answer_modal('+ response.answer_id[i] +')"><i class="ti-trash font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button>';
							answers += '</small>';

							answers += '<p style="margin-top: 10px" class="text-muted mb-1">' + response.details[i] + '</p>';
						answers += '</div>';
					answers += '</div>';
				}

				$('#answers').html(answers);
            }
        });
		
		setTimeout( function() { $('#answers').hide(); }, 0 );
		setTimeout( function() { $('#answers').show(); }, 2000 );
	}

	function hide_question_modal(question_id, status){
    	$.ajax({
            url: "fetch_question_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	question_id: question_id
            },
            success: function (response) {
            	$('#hid_question_id').val(response.question_id);
            	$('#question_video_id2').val(response.video_id);

    			var status = '';
    			if(response.status == 'Active'){ 
    				status = 'Inactive';
    				$('.title-text').html('Hide');
    			} else{ 
    				status = 'Active';
    				$('.title-text').html('Show');
    			}

            	$('#question_status').val(status);

            	$('#hideCommModal').modal('show');
            }
        });
    }

	function delete_question_modal(question_id){
    	$.ajax({
            url: "fetch_question_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	question_id: question_id
            },
            success: function (response) {
            	$('#dlt_question_id').val(response.question_id);
            	$('#question_video_id').val(response.video_id);

            	$('#deleteCommModal').modal('show');
            }
        });
    }

    function hide_answer_modal(answer_id, status){
    	if(status == 1) status = 'Active';
    	else status = 'Inactive';

    	$.ajax({
            url: "fetch_answer_data2.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	answer_id: answer_id
            },
            success: function (response) {
            	$('#hid_answer_id').val(response.answer_id);
            	$('#answer_video_id2').val(response.video_id);

    			var status = '';
    			if(response.status == 'Active'){ 
    				status = 'Inactive';
    				$('.title-text2').html('Hide');
    			} else{ 
    				status = 'Active';
    				$('.title-text2').html('Show');
    			}

            	$('#answer_status').val(status);

            	$('#hideRepModal').modal('show');
            }
        });
    }

    function delete_answer_modal(answer_id){
    	$.ajax({
            url: "fetch_answer_data2.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	answer_id: answer_id
            },
            success: function (response) {
            	$('#dlt_answer_id').val(response.answer_id);
            	$('#answer_video_id').val(response.video_id);

            	$('#deleteRepModal').modal('show');
            }
        });
    }
</script>