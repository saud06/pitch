<?php 
	include('includes/header.php');
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
  		<?php 
			include('includes/navbar.php');
			include('../config/config.php');

			if(!isset($_SESSION['logged_in_email']) && empty($_SESSION['logged_in_email'])){
		        header('Location: index.php');
		    } else{
		    	$video_id = $_GET['video_id'];

		    	if($_SESSION['logged_in_user_type'] !== 'Administrator'){
		    		$email = $_SESSION['logged_in_email'];

		    		$sql2 = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
					if(!$con->query($sql2)){
						die(mysqli_error($con));
					} else{
						$result2 = $con->query($sql2);
						$formdata2 = $result2->fetch_assoc();
						$user_id = $formdata2['user_id'];

						$sql = "SELECT * FROM video WHERE video_id = '$video_id' AND user_id = '$user_id'";
						$result = $con->query($sql);

						if($result->num_rows == 0){
							header('Location: video.php');
						} else{
							$formdata = $result->fetch_assoc();
						}
					}
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
		                    <li class="breadcrumb-item"><a href="video.php"><i class="ti-video-camera menu-icon"></i> Video</a></li>
		                    <li class="breadcrumb-item active" aria-current="page"><span><i class="ti-comments menu-icon"></i> Comments & Replies</span></li>
	                  	</ol>
	                </nav>

	                <div class="row">
						<div class="col-md-6 grid-margin">
							<div class="card d-flex align-items-center">
								<div class="card-body">
									<div class="d-flex flex-row align-items-center">
										<i style="color: #ff5722;" class="ti-comment icon-md"></i>

										<div class="ml-3">
											<h3 class="text-youtube">Comments</h3>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 grid-margin">
							<div class="card d-flex align-items-center">
								<div class="card-body">
									<div class="d-flex flex-row align-items-center">
										<i style="color: #ff5722;" class="ti-comment-alt icon-md"></i>

										<div class="ml-3">
											<h3 class="text-youtube">Replies</h3>
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
		                      			$sql3 = "SELECT c.*, u.first_name, u.surname, u.profile_picture FROM comment c JOIN user u ON c.user_id = u.user_id WHERE c.video_id = '$video_id'";
								        $result3 = $con->query($sql3);

								        if($result3->num_rows > 0){
								        	$i = 0;

								            while($row = $result3->fetch_assoc()){
								            	$comment_id = $row['comment_id'];
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

																<button type="button" style="height: 25px; padding: 0" class="btn btn-warning btn-sm" title="Hide" onclick="hide_comment_modal('<?= $comment_id; ?>', '<?= $status; ?>')"><i class="ti-na font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; 

																<button type="button" style="height: 25px; padding: 0" class="btn btn-danger btn-sm" title="Delete" onclick="delete_comment_modal('<?= $comment_id; ?>')"><i class="ti-trash font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; 

																<button type="button" style="height: 25px; padding: 0" class="btn btn-primary btn-sm" title="Replies" onclick="reply('<?= $comment_id; ?>', '<?= $video_id; ?>')"><i class="ti-comment-alt font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; 

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
			                          	<h5 class="modal-title" id="hideCommModalLabel"><span class="title-text"></span> Comment</h5>

			                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            	<span aria-hidden="true">&times;</span>
			                          	</button>
			                        </div>

		                        	<form class="cmxform" id="comment_hide_form" method="POST" action="comment_hide.php" enctype="multipart/form-data">
			                        	<div class="modal-body">
				                          	<p>Do You Really Want to <span class="title-text"></span> This Comment?</p>

				                          	<input type="hidden" name="hid_comment_id" id="hid_comment_id">
				                          	<input type="hidden" name="comment_video_id2" id="comment_video_id2">
				                          	<input type="hidden" name="comment_status" id="comment_status">
				                        </div>

				                        <div class="modal-footer">
				                          	<button type="submit" id="video_comment_hide_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

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
			                          	<h5 class="modal-title" id="deleteCommModalLabel">Delete Comment</h5>

			                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            	<span aria-hidden="true">&times;</span>
			                          	</button>
			                        </div>

		                        	<form class="cmxform" id="comment_delete_form" method="POST" action="comment_delete.php" enctype="multipart/form-data">
			                        	<div class="modal-body">
				                          	<p>Do You Really Want to Delete This Comment?</p>

				                          	<input type="hidden" name="dlt_comment_id" id="dlt_comment_id">
				                          	<input type="hidden" name="comment_video_id" id="comment_video_id">
				                        </div>

				                        <div class="modal-footer">
				                          	<button type="submit" id="video_comment_delete_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

				                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
				                        </div>
				                    </form>
		                      	</div>
		                    </div>
		                </div>

						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<?php 
									$sql4 = "SELECT * FROM reply WHERE video_id = '$video_id'";
								    $result4 = $con->query($sql4);
								    $reply_number = $result4->num_rows;
								?>

								<div id="card_body" class="card-body" style="<?php if($reply_number > 0){ ?> background: url('images/comment_icon.png') center center no-repeat; <?php }?>">
									<h4 class="card-title">
										Video ID: <?= $video_id; ?><br><br>
										Video Title: <?= $formdata['video_title']; ?>
									</h4>

									<div id="loader"></div>

									<div id="replies">
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="hideRepModal" tabindex="-1" role="dialog" aria-labelledby="hideRepModalLabel" aria-hidden="true">
		                    <div class="modal-dialog" role="document">
		                      	<div class="modal-content">
			                        <div class="modal-header">
			                          	<h5 class="modal-title" id="hideRepModalLabel"><span class="title-text2"></span> Reply</h5>

			                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            	<span aria-hidden="true">&times;</span>
			                          	</button>
			                        </div>

		                        	<form class="cmxform" id="reply_hide_form" method="POST" action="reply_hide.php" enctype="multipart/form-data">
			                        	<div class="modal-body">
				                          	<p>Do You Really Want to <span class="title-text2"></span> This Reply?</p>

				                          	<input type="hidden" name="hid_reply_id" id="hid_reply_id">
				                          	<input type="hidden" name="reply_video_id2" id="reply_video_id2">
				                          	<input type="hidden" name="reply_status" id="reply_status">
				                        </div>

				                        <div class="modal-footer">
				                          	<button type="submit" id="video_reply_hide_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

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
			                          	<h5 class="modal-title" id="deleteRepModalLabel">Delete Reply</h5>

			                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                            	<span aria-hidden="true">&times;</span>
			                          	</button>
			                        </div>

		                        	<form class="cmxform" id="reply_delete_form" method="POST" action="reply_delete.php" enctype="multipart/form-data">
			                        	<div class="modal-body">
				                          	<p>Do You Really Want to Delete This Reply?</p>

				                          	<input type="hidden" name="dlt_reply_id" id="dlt_reply_id">
				                          	<input type="hidden" name="reply_video_id" id="reply_video_id">
				                        </div>

				                        <div class="modal-footer">
				                          	<button type="submit" id="video_reply_delete_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

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

	function reply(comment_id, video_id){
		$('#card_body').css('background', 'none');

		var loader = '<div class="loader"></div>';
        $('#loader').html(loader);

        setTimeout( function() { $('.loader').show(); }, 0 );
		setTimeout( function() { $('.loader').hide(); }, 2000 );

		$.ajax({
            url: "fetch_reply_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	comment_id: comment_id,
            	video_id: video_id
            },
            success: function (response) {
            	var replies = '';
            	for(i=0; i<response.reply_id.length; i++){
            		var src = '';
            		if(response.profile_picture[i]){ 
            			src += '../backend/uploads/' + response.profile_picture[i]; 
            		} else{ 
            			src += 'images/faces/no_image_available.jpg'; 
            		}

            		var opacity = '';
            		if(response.status[i] == 'Inactive') opacity = 'opacity: 0.2';

	            	replies += '<div style="align-items: stretch !important; cursor: default; ' + opacity + '" class="d-flex align-items-center pb-3 border-bottom custom-list">';

						replies += '<img class="img-sm rounded-circle" src="' + src + '" alt="User Image">';

						replies += '<div class="ml-3">';
							replies += '<h6 class="mb-1">' + response.first_name[i] + ' ' + response.surname[i] + '</h6>';

							replies += '<small class="text-muted mb-0">';
								replies += '<i class="ti-timer mr-1"></i>' + response.creation_datetime[i] + ' &nbsp; ';

								var reply_status = '';
								if(response.status == 'Active') reply_status = 1;
								else reply_status = 0;

								replies += '<button type="button" style="height: 25px; padding: 0" class="btn btn-warning btn-sm" title="Hide" onclick="hide_reply_modal('+ response.reply_id[i] +', ' + reply_status + ')"><i class="ti-na font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; ';

								replies += '<button type="button" style="height: 25px; padding: 0" class="btn btn-danger btn-sm" title="Delete" onclick="delete_reply_modal('+ response.reply_id[i] +')"><i class="ti-trash font-weight-bold ml-auto px-1 py-1 mdi-24px"></i></button> &nbsp; ';

								if(response.status == 'Inactive') replies += '<i>( Hidden )</i>';
							replies += '</small>';

							replies += '<p style="margin-top: 10px" class="text-muted mb-1">' + response.details[i] + '</p>';
						replies += '</div>';
					replies += '</div>';
				}

				$('#replies').html(replies);
            }
        });
		
		setTimeout( function() { $('#replies').hide(); }, 0 );
		setTimeout( function() { $('#replies').show(); }, 2000 );
	}

	function hide_comment_modal(comment_id, status){
    	$.ajax({
            url: "fetch_comment_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	comment_id: comment_id
            },
            success: function (response) {
            	$('#hid_comment_id').val(response.comment_id);
            	$('#comment_video_id2').val(response.video_id);

    			var status = '';
    			if(response.status == 'Active'){ 
    				status = 'Inactive';
    				$('.title-text').html('Hide');
    			} else{ 
    				status = 'Active';
    				$('.title-text').html('Show');
    			}

            	$('#comment_status').val(status);

            	$('#hideCommModal').modal('show');
            }
        });
    }

	function delete_comment_modal(comment_id){
    	$.ajax({
            url: "fetch_comment_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	comment_id: comment_id
            },
            success: function (response) {
            	$('#dlt_comment_id').val(response.comment_id);
            	$('#comment_video_id').val(response.video_id);

            	$('#deleteCommModal').modal('show');
            }
        });
    }

    function hide_reply_modal(reply_id, status){
    	if(status == 1) status = 'Active';
    	else status = 'Inactive';

    	$.ajax({
            url: "fetch_reply_data2.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	reply_id: reply_id
            },
            success: function (response) {
            	$('#hid_reply_id').val(response.reply_id);
            	$('#reply_video_id2').val(response.video_id);

    			var status = '';
    			if(response.status == 'Active'){ 
    				status = 'Inactive';
    				$('.title-text2').html('Hide');
    			} else{ 
    				status = 'Active';
    				$('.title-text2').html('Show');
    			}

            	$('#reply_status').val(status);

            	$('#hideRepModal').modal('show');
            }
        });
    }

    function delete_reply_modal(reply_id){
    	$.ajax({
            url: "fetch_reply_data2.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	reply_id: reply_id
            },
            success: function (response) {
            	$('#dlt_reply_id').val(response.reply_id);
            	$('#reply_video_id').val(response.video_id);

            	$('#deleteRepModal').modal('show');
            }
        });
    }
</script>