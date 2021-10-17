<?php 
	include('includes/header.php');
?>

<style type="text/css">
	.template-demo > .btn{
		margin-top: 0 !important;
	}
	.btn.btn-social-icon{
		width: 42px;
		height: 42px;
	}
	.p-event{
		pointer-events: none;
	}
	.note-editor.note-frame{
		margin-bottom: 5px;
		border: 1px solid #424351;
	}
	.note-editor.note-frame .note-editing-area .note-editable{
		background-color: transparent;
		color: #fff;
	}
	.note-editor.note-frame .note-statusbar{
		background-color: transparent;
	}
	.card-header{
		border: 1px solid #424351;
	}
	.table td img, .jsgrid .jsgrid-table td img{
		width: 120px;
		height: 90px;
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
		                    <li class="breadcrumb-item active" aria-current="page"><span><i class="ti-video-camera menu-icon"></i> Video</span></li>
	                  	</ol>
	                </nav>

		          	<div class="card">
			            <div class="card-body">
			              	<h1 style="color: #ff5722" class="display-4">
			              		My Video
			              	</h1>

			              	<br>

			              	<div class="row">
				                <div class="col-12">
				                  	<div class="table-responsive">
					                    <table id="order-listing" class="table">
					                      	<thead>
						                        <tr>
						                            <td width="5%">Thumbnail</td>
						                            <td>User</td>
						                            <th>Title</th>
						                            <th>Statistics</th>
						                            <th>Length</th>
						                            <th>Upload Date</th>
						                            <th>Position</th>
						                            <th>Status</th>
						                            <th>Approval</th>
						                            <th>Actions</th>
						                        </tr>
					                      	</thead>

					                      	<tbody>
												<?php 
					                      			$sql = "SELECT * FROM video WHERE user_id = '$user_id' ORDER BY video_id DESC";
											        $result = $con->query($sql);

											        if($result->num_rows > 0){
											        	$i = 0;

											            while($row = $result->fetch_assoc()){
											            	$video_id = $row['video_id'];
											            	$user_id = $row['user_id'];
											            	$video_title = $row['video_title'];
											            	$status = $row['status'];

											            	$sql2 = "SELECT * FROM user WHERE user_id = '$user_id' LIMIT 1";
											        		$result2 = $con->query($sql2);
											        		$row2 = $result2->fetch_assoc();
					                      		?>

									                        <tr>
								                            	<td><img class="img-sm rounded" src="<?php if($row['thumbnail']){ echo '../backend/uploads/videos/' . $row['thumbnail']; } else{ echo 'images/faces/no_image_available.jpg'; } ?>" alt="Thumbnail"></td>
									                            <td><?= $row2['first_name'] . ' ' . $row2['surname']; ?></td>
									                            <td><?= $row['video_title']; ?></td>
									                            <td>
									                            	Number of Likes &nbsp; <div class="badge badge-pill badge-outline-info"><?= $row['no_of_likes']; ?></div><br><br>
									                            	Number of Dislikes &nbsp; <div class="badge badge-pill badge-outline-info"><?= $row['no_of_dislikes']; ?></div><br><br>
									                            	Number of Views &nbsp; <div class="badge badge-pill badge-outline-info"><?= $row['no_of_views']; ?></div><br><br>
									                            	Number of Shares &nbsp; <div class="badge badge-pill badge-outline-info"><?= $row['no_of_shares']; ?></div><br><br>
									                            </td>
									                            <td><?= $row['length']; ?></td>
									                            <td><?= $row['upload_date']; ?></td>
									                            <td>
									                            	<div class="form-check form-check-primary">
											                            <label class="form-check-label">
											                              	<input type="checkbox" id="week_post<?= $i; ?>" class="form-check-input" onchange="post('<?= $video_id; ?>', '<?= $video_title; ?>', '<?= $i; ?>', 'week')" <?php if($row['is_post_of_week'] == 1){ echo 'checked'; } ?>>
											                            	Post of the Week
											                            </label>
											                        </div>

											                        <div class="form-check form-check-primary">
											                            <label class="form-check-label">
											                              	<input type="checkbox" id="month_post<?= $i; ?>" class="form-check-input" onchange="post('<?= $video_id; ?>', '<?= $video_title; ?>', '<?= $i; ?>', 'month')" <?php if($row['is_post_of_month'] == 1){ echo 'checked'; } ?>>
											                            	Post of the Month
											                            </label>
											                        </div>

											                        <div class="form-check form-check-primary">
											                            <label class="form-check-label">
											                              	<input type="checkbox" id="year_post<?= $i; ?>" class="form-check-input" onchange="post('<?= $video_id; ?>', '<?= $video_title; ?>', '<?= $i; ?>', 'year')" <?php if($row['is_post_of_year'] == 1){ echo 'checked'; } ?>>
											                            	Post of the year
											                            </label>
											                        </div>
									                            </td>
									                            <td>
									                              	<?php 
									                            		if($status == 'Active'){
									                            	?>
									                              			<label id="badge<?= $i; ?>" class="badge badge-success"><?= $status; ?></label>
									                              	<?php 
									                              		} elseif($status == 'Pending'){
									                              	?>
									                              			<label id="badge<?= $i; ?>" class="badge badge-warning"><?= $status; ?></label>
									                              	<?php 
									                              		} else{
									                              	?>
									                              			<label id="badge<?= $i; ?>" class="badge badge-danger"><?= $status; ?></label>
									                              	<?php 
									                              		}
									                              	?>
									                            </td>
									                            <td>
									                            	<div class="form-check form-check-success">
											                            <label class="form-check-label">
											                            	<input type="checkbox" id="approval<?= $i; ?>" class="form-check-input" onchange="approval('<?= $video_id; ?>', '<?= $video_title; ?>', '<?= $i; ?>')" <?php if($status == 'Active'){ echo 'checked'; } ?>>
											                            </label>
											                        </div> 
									                            </td>
									                            <td>
									                            	<button type="button" class="btn btn-inverse-success btn-icon" title="View" onclick="view_modal('<?= $video_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;
									                              	
									                              	<button type="button" class="btn btn-inverse-primary btn-icon" title="Edit" onclick="edit_modal('<?= $video_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;
									                              	
									                              	<button type="button" class="btn btn-inverse-danger btn-icon" title="Delete" onclick="delete_modal('<?= $video_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>

																	<br><br>

									                              	<button type="button" class="btn btn-outline-info btn-icon" title="Video URLs" onclick="url_modal('<?= $video_id; ?>')">
											                        	<i style="margin-left: -3px; margin-right: 0" class="ti-link btn-icon-append"></i>
											                        </button>&nbsp;

											                        <button type="button" class="btn btn-outline-warning btn-icon" title="Reschedule" onclick="reschedule_modal('<?= $video_id; ?>')">
											                        	<i style="margin-left: -3px; margin-right: 0" class="ti-time btn-icon-prepend"></i>
											                        </button>&nbsp;

									                              	<a href="questions_answers.php?video_id=<?= $video_id; ?>"><button type="button" class="btn btn-outline-secondary btn-icon" title="Questions & Answers"><i style="margin-left: -3px; margin-right: 0" class="ti-help"></i></button></a>&nbsp;
									                              	
									                              	<a href="comments_replies.php?video_id=<?= $video_id; ?>"><button type="button" class="btn btn-outline-secondary btn-icon" title="Comments & Replies"><i style="margin-left: -3px; margin-right: 0" class="ti-comments"></i></button></a>
									                            </td>
									                        </tr>
									            <?php
									            			$i++;
									            		} 
									            	}
									            ?>
					                      	</tbody>
					                    </table>

					                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
						                    <div class="modal-dialog modal-lg" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="viewModalLabel">View Video</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>
							                        
							                        <div class="modal-body" style="padding-bottom: 0">
									                    <fieldset>
									                      	<div class="row">
									                      		<div class="form-group col">
											                        <label for="view_video_title">Video Title</label>
											                        <input id="view_video_title" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_subtitle">Subtitle</label>
										                        	<input id="view_subtitle" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_tag">Tag</label>
										                        	<input id="view_tag" class="form-control p-event" type="text">
											                    </div>
									                      	</div>

									                      	<div class="row">
									                      		<div class="form-group col">
											                        <label for="description">Description</label>

										                        	<div id="view_description">
													                </div>
											                    </div>
									                      	</div>

															<div class="row">
																<div class="form-group col">
											                        <label for="view_length">Length</label>
										                        	<input id="view_length" class="form-control p-event" type="text">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_no_of_likes">Number of Likes</label>
										                        	<input id="view_no_of_likes" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_no_of_dislikes">Number of Dislikes</label>
										                        	<input id="view_no_of_dislikes" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_no_of_views">Number of Views</label>
										                        	<input id="view_no_of_views" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_no_of_shares">Number of Shares</label>
										                        	<input id="view_no_of_shares" class="form-control p-event" type="text">
											                    </div>
									                      	</div>

									                      	<div class="row">
																<div class="form-group col">
											                        <label for="view_video_resolution">Video Resolution</label>
										                        	<input id="view_video_resolution" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_video_size">Video Size</label>
										                        	<input id="view_video_size" class="form-control p-event" type="text">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_upload_date">Upload Date</label>
												                    <input type="text" class="form-control p-event" id="view_upload_date">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_age_limit">Age Limit</label>
										                        	<input id="view_age_limit" class="form-control p-event" type="text">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_post_of_the_week">Post of the Week</label>
										                        	<div class="form-check form-check-primary">
							                            				<label class="form-check-label">
							                              					<input id="view_post_of_week" type="checkbox" class="form-check-input p-event" disabled>
							                            				</label>
							                        				</div>
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_post_of_the_month">Post of the Month</label>
										                        	<div class="form-check form-check-primary">
							                            				<label class="form-check-label">
							                              					<input id="view_post_of_month" type="checkbox" class="form-check-input p-event" disabled>
							                            				</label>
							                        				</div>
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_post_of_the_year">Post of the year</label>
										                        	<div class="form-check form-check-primary">
							                            				<label class="form-check-label">
							                              					<input id="view_post_of_year" type="checkbox" class="form-check-input p-event" disabled>
							                            				</label>
							                        				</div>
											                    </div>
									                      	</div>

									                      	<div class="row">
																<div class="form-group col">
											                        <label for="view_user">User</label>
										                        	<input id="view_user" class="form-control p-event" type="text">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_post_type">Post Type</label>
										                        	<input id="view_post_type" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_post_criteria">Post Criteria</label>
										                        	<input id="view_post_criteria" class="form-control p-event" type="text">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_status">Status</label>
										                        	<input id="view_status" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
									                    			<label for="thumbnail">Thumbnail</label><br>
								                        			<img id="view_thumbnail" src="images/faces/no_image_available.jpg" class="img-lg rounded" alt="Thumbnail"/>
									                    		</div>
									                      	</div>
									                    </fieldset>
							                        </div>
						                      	</div>
						                    </div>
						                </div>

						                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
						                    <div class="modal-dialog modal-lg" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="editModalLabel">Edit Video</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

							                        <form class="cmxform" id="video_update_form" method="POST" action="video_update.php" enctype="multipart/form-data">
								                        <div class="modal-body" style="padding-bottom: 0">
										                    <fieldset>
										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_video_title">Video Title <span style="color: red;">*</span></label>
												                        <input style="margin-bottom: 5px;" id="upd_video_title" class="form-control" name="upd_video_title" type="text" placeholder="Insert...">

												                        <span id="err_upd_video_title"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_subtitle">Subtitle</label>
											                        	<input id="upd_subtitle" class="form-control" name="upd_subtitle" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_tag">Tag(s) <span class="text-muted">(Separate multiple tags by comma)</span></label>
											                        	<input id="upd_tag" class="form-control" name="upd_tag" type="text" placeholder="Insert...">
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_description">Description <span style="color: red;">*</span></label>

											                        	<div id="summernoteExample2">
														                </div>

														                <span id="err_upd_description"></span>
												                    </div>
										                      	</div>

																<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_no_of_likes">Number of Likes <span style="color: red;">*</span></label>
											                        	<input style="margin-bottom: 5px;" id="upd_no_of_likes" class="form-control" name="upd_no_of_likes" type="number" placeholder="Insert...">

											                        	<span id="err_upd_no_of_likes"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_no_of_dislikes">Number of Dislikes <span style="color: red;">*</span></label>
											                        	<input style="margin-bottom: 5px;" id="upd_no_of_dislikes" class="form-control" name="upd_no_of_dislikes" type="number" placeholder="Insert...">

											                        	<span id="err_upd_no_of_dislikes"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_no_of_views">Number of Views <span style="color: red;">*</span></label>
											                        	<input style="margin-bottom: 5px;" id="upd_no_of_views" class="form-control" name="upd_no_of_views" type="number" placeholder="Insert...">

											                        	<span id="err_upd_no_of_views"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_no_of_shares">Number of Shares <span style="color: red;">*</span></label>
											                        	<input style="margin-bottom: 5px;" id="upd_no_of_shares" class="form-control" name="upd_no_of_shares" type="number" placeholder="Insert...">

											                        	<span id="err_upd_no_of_shares"></span>
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_upload_date">Upload Date <span style="color: red;">*</span></label>
											                        	<div style="margin-bottom: 5px;" id="datepicker-popup" class="input-group date datepicker">
													                        <input type="text" class="form-control" name="upd_upload_date" id="upd_upload_date" placeholder="Insert...">

													                        <span class="input-group-addon input-group-append border-left"></span>
													                    </div>

													                    <span id="err_upd_upload_date"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_age_limit">Age Limit <span style="color: red;">*</span></label>
											                        	<input style="margin-bottom: 5px;" name="upd_age_limit" id="upd_age_limit" class="form-control" type="number">

											                        	<span id="err_upd_age_limit"></span>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="upd_post_of_week">Post of the Week</label>
											                        	<div class="form-check form-check-primary">
								                            				<label class="form-check-label">
								                              					<input name="upd_post_of_week" id="upd_post_of_week" type="checkbox" class="form-check-input" value="1">
								                            				</label>
								                        				</div>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_post_of_month">Post of the Month</label>
											                        	<div class="form-check form-check-primary">
								                            				<label class="form-check-label">
								                              					<input name="upd_post_of_month" id="upd_post_of_month" type="checkbox" class="form-check-input" value="1">
								                            				</label>
								                        				</div>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_post_of_year">Post of the year</label>
											                        	<div class="form-check form-check-primary">
								                            				<label class="form-check-label">
								                              					<input name="upd_post_of_year" id="upd_post_of_year" type="checkbox" class="form-check-input" value="1">
								                            				</label>
								                        				</div>
												                    </div>
										                      	</div>

										                      	<div class="row">
																	<div class="form-group col">
												                        <label for="view_user">User <span style="color: red;">*</span></label>
											                        	
											                        	<?php 
																			$sql = "SELECT * FROM user WHERE user_id != 1 AND status = 'Active'";
																		    $result = $con->query($sql);
																		?>

											                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_user" id="upd_user">
											                        		<option value="">Select...</option>
											                        		<?php 
											                        			if($result->num_rows > 0){
																					while($row = $result->fetch_assoc()){
											                        		?>
											                        					<option value="<?= $row['user_id']; ?>"><?= $row['first_name'] . ' ' . $row['surname']; ?></option>
											                        		<?php 
											                        				}
											                        			}
											                        		?>
													                    </select>

													                    <span id="err_upd_user"></span>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="upd_post_type">Post Type <span style="color: red;">*</span></label>

												                        <?php 
																			$sql2 = "SELECT * FROM post_type WHERE status = 'Active'";
																		    $result2 = $con->query($sql2);
																		?>

											                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_post_type" id="upd_post_type">
											                        		<option value="">Select...</option>
											                        		<?php 
											                        			if($result2->num_rows > 0){
																					while($row2 = $result2->fetch_assoc()){
											                        		?>
											                        					<option value="<?= $row2['post_type_id']; ?>"><?= $row2['type_name']; ?></option>
											                        		<?php 
											                        				}
											                        			}
											                        		?>
													                    </select>

													                    <span id="err_upd_post_type"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_post_criteria">Post Criteria</label>
											                        	<select class="form-control form-control-lg" name="upd_post_criteria" id="upd_post_criteria">
											                        		<option value="">Select...</option>
													                    </select>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="status">Status <span style="color: red;">*</span></label>
											                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_status" id="upd_status">
											                        		<option value="">Select...</option>
													                      	<option value="Active">Active</option>
													                      	<option value="Pending">Pending</option>
													                      	<option value="Inactive">Inactive</option>
													                    </select>

													                    <span id="err_upd_status"></span>
												                    </div>

												                    <div class="form-group col">
										                    			<label for="upd_thumbnail">Thumbnail</label><br>
									                        			<input type="file" class="dropify" id="upd_thumbnail" name="upd_thumbnail">
												                    </div>
										                      	</div>

										                      	<input type="hidden" name="upd_description" id="upd_description">
										                      	<input type="hidden" name="upd_video_id" id="upd_video_id">
										                    </fieldset>
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" id="video_upd_btn" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

								                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; Cancel</button>
								                        </div>
							                    	</form>
						                      	</div>
						                    </div>
						                </div>

						                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
						                    <div class="modal-dialog" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="deleteModalLabel">Delete Video</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

						                        	<form class="cmxform" id="video_delete_form" method="POST" action="video_delete.php" enctype="multipart/form-data">
							                        	<div class="modal-body">
								                          	<p>Do You Really Want to Delete This Video?</p>

								                          	<input type="hidden" name="dlt_video_id" id="dlt_video_id">
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" id="video_dlt_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

								                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
								                        </div>
								                    </form>
						                      	</div>
						                    </div>
						                </div>

						                <div class="modal fade" id="urlModal" tabindex="-1" role="dialog" aria-labelledby="urlModalLabel" aria-hidden="true">
						                    <div class="modal-dialog modal-lg" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="urlModalLabel">Video URLs</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

							                        <form class="cmxform" id="video_update_form2" method="POST" action="video_update2.php" enctype="multipart/form-data">
								                        <div class="modal-body" style="padding-bottom: 0">
										                    <fieldset>
										                      	<div class="row">
										                      		<div class="form-group col"></div>

																	<div class="form-group col">
										                    			<label for="video_url">Video</label><br>
									                        			<input type="file" class="dropify" id="video_url" name="video_url">

									                        			<br>

									                        			<span id="err_video_url"></span>

									                        			<input type="hidden" name="video_id" id="video_id">
												                    </div>

												                    <div class="form-group col"></div>
										                      	</div>

										                      	<div class="row">
																	<div class="form-group col">
																		<label for="urls">URLs</label><br>

																		<div class="table-responsive">
														                    <table class="table table-hover table-bordered">
														                      	<thead>
															                        <tr>
															                          	<th>URL</th>
															                          	<th>Resolution</th>
															                          	<th>Size</th>
															                          	<th>Action</th>
															                        </tr>
														                      	</thead>
														                      	<tbody id="url_records">
														                      	</tbody>
														                    </table>
													                  	</div>
																	</div>
																</div>
										                    </fieldset>
								                        </div>

								                        <div class="modal-footer">
									                        <button type="submit" id="video_upd_btn2" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

									                        <button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; Cancel</button>
								                        </div>
							                    	</form>
						                      	</div>
						                    </div>
						                </div>

						                <div class="modal fade" id="deleteURLModal" tabindex="-1" role="dialog" aria-labelledby="deleteURLModalLabel" aria-hidden="true">
						                    <div class="modal-dialog" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="deleteURLModalLabel">Delete URL</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

						                        	<form class="cmxform" id="url_delete_form" method="POST" action="url_delete.php" enctype="multipart/form-data">
							                        	<div class="modal-body">
								                          	<p>Do You Really Want to Delete This URL?</p>

								                          	<input type="hidden" name="dlt_video_id2" id="dlt_video_id2">
								                          	<input type="hidden" name="dlt_video_url" id="dlt_video_url">
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" id="video_dlt_btn2" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

								                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
								                        </div>
								                    </form>
						                      	</div>
						                    </div>
						                </div>

						                <div class="modal fade" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
						                    <div class="modal-dialog" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="rescheduleModalLabel">Reschedule Datetime</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

						                        	<form class="cmxform" id="reschedule_form" method="POST" action="video_schedule_datetime_update.php" enctype="multipart/form-data">
								                        <div class="modal-body" style="padding-bottom: 0">
										                    <fieldset>
										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="reschedule_datetime">Datetime <span style="color: red;">*</span></label>
												                        <input style="margin-bottom: 5px;" id="reschedule_datetime" class="form-control" name="reschedule_datetime" type="text" placeholder="Insert...">

												                        <span id="err_reschedule_datetime"></span>
												                    </div>
												                </div>

												                <input type="hidden" name="reschedule_video_id" id="reschedule_video_id">
										                    </fieldset>
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" id="reschedule_add_btn" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

								                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; Cancel</button>
								                        </div>
							                    	</form>
						                      	</div>
						                    </div>
						                </div>
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
		<?php 
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            	if($_SESSION['message'] == 'error'){
        ?>
                	showInvalidImageToast('The video in the same resolution already exists! Please try another resolution.');
        <?php
        		} else if($_SESSION['message'] == 'success'){
        ?>
        			showAddUserToast('You have successfully added a new URL to the video.');
        <?php 
        		} else if($_SESSION['message'] == 'success_schedule'){
        ?>
        			showAddUserToast('You have successfully rescheduled datetime for the video.');
        <?php
        		} else{
        ?>
        			showAddUserToast('You have successfully deleted a URL from the video.');
        <?php
        		}

                $_SESSION['message'] = '';
            }
        ?>
	});

	function post(video_id, video_title, counter, type){
		var status;
    	
		if(type == 'week'){
	    	if($('#week_post' + counter).is(":checked") == true){
	    		status = 1;
	    	} else{
	    		status = 0;
	    	}
	    } else if(type == 'month'){
	    	if($('#month_post' + counter).is(":checked") == true){
	    		status = 1;
	    	} else{
	    		status = 0;
	    	}
	    } else{
	    	if($('#year_post' + counter).is(":checked") == true){
	    		status = 1;
	    	} else{
	    		status = 0;
	    	}
	    } 

        $.ajax({
            url: "video_status_update2.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	video_id: video_id,
                status: status,
                type: type
            },
            success: function (response) {
            	showUpdateVideoStatusToast(video_title);
            }
        });
    }

	function approval(video_id, video_title, counter){
		var status = '';
    	if($('#approval' + counter).is(":checked") == true){
    		status = 'Active';
    	} else{
    		status = 'Inactive';
    	}

        $.ajax({
            url: "video_status_update.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	video_id: video_id,
                status: status
            },
            success: function (response) {
            	showUpdateVideoStatusToast(video_title);

                if(response == 'Active'){
                	$('#badge' + counter).removeClass().addClass('badge badge-success').html('Active');
                } else{
                	$('#badge' + counter).removeClass().addClass('badge badge-danger').html('Inactive');
                }
            }
        });
    }

    function view_modal(video_id){
    	$.ajax({
            url: "fetch_video_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	video_id: video_id
            },
            success: function (response) {
            	$('#view_video_title').val(response.video_title);
            	$('#view_subtitle').val(response.subtitle);
            	$('#view_description').html(response.description);
            	$('#view_tag').val(response.tag);
            	$('#view_length').val(response.length);
            	$('#view_no_of_likes').val(response.no_of_likes);
            	$('#view_no_of_dislikes').val(response.no_of_dislikes);
            	$('#view_no_of_views').val(response.no_of_views);
            	$('#view_no_of_shares').val(response.no_of_shares);
            	$('#view_video_resolution').val(response.video_width + ' X ' + response.video_height);
            	$('#view_video_size').val((response.video_size / 1048576).toFixed(2) + ' MB');
            	$('#view_upload_date').val(response.upload_date);
            	$('#view_age_limit').val(response.age_limit);

            	if(response.is_post_of_week == 1) $('#view_post_of_week').prop('checked', true);
            	else $('#view_post_of_week').prop('checked', false);
            	if(response.is_post_of_month == 1) $('#view_post_of_month').prop('checked', true);
            	else $('#view_post_of_month').prop('checked', false);
            	if(response.is_post_of_year == 1) $('#view_post_of_year').prop('checked', true);
            	else $('#view_post_of_year').prop('checked', false);

            	$('#view_user').val(response.first_name + ' ' + response.surname);
            	$('#view_post_type').val(response.type_name);
            	$('#view_status').val(response.status);
            	if(response.thumbnail) $('#view_thumbnail').attr('src', '../backend/uploads/videos/' + response.thumbnail);

            	$('#viewModal').modal('show');
            }
        });
    }

    function edit_modal(video_id){
    	$.ajax({
            url: "fetch_video_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	video_id: video_id
            },
            success: function (response) {
            	$('#upd_video_id').val(response.video_id);
            	$('#upd_video_title').val(response.video_title);
            	$('#upd_tag').val(response.tag);
            	$('#upd_subtitle').val(response.subtitle);
            	$("#summernoteExample2").summernote('code', response.description);
            	$('#upd_no_of_likes').val(response.no_of_likes);
            	$('#upd_no_of_dislikes').val(response.no_of_dislikes);
            	$('#upd_no_of_views').val(response.no_of_views);
            	$('#upd_no_of_shares').val(response.no_of_shares);
            	$('#upd_upload_date').val(response.upload_date);
            	$('#upd_age_limit').val(response.age_limit);

            	if(response.is_post_of_week == 1) $('#upd_post_of_week').prop('checked', true);
            	else $('#upd_post_of_week').prop('checked', false);
            	if(response.is_post_of_month == 1) $('#upd_post_of_month').prop('checked', true);
            	else $('#upd_post_of_month').prop('checked', false);
            	if(response.is_post_of_year == 1) $('#upd_post_of_year').prop('checked', true);
            	else $('#upd_post_of_year').prop('checked', false);

            	$('#upd_user').val(response.user_id);
            	$('#upd_post_type').val(response.post_type_id);
            	$('#upd_status').val(response.status);

            	$('#editModal').modal('show');
            }
        });
    }

    function delete_modal(video_id){
    	$.ajax({
            url: "fetch_video_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	video_id: video_id
            },
            success: function (response) {
            	$('#dlt_video_id').val(response.video_id);

            	$('#deleteModal').modal('show');
            }
        });
    }

    function delete_url_modal(video_id, pos){
    	$.ajax({
            url: "fetch_video_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	video_id: video_id
            },
            success: function (response) {
            	$('#dlt_video_id2').val(response.video_id);
            	$('#dlt_video_url').val(pos);

            	var video_url_arr = response.video_url.split(',');
            	if(video_url_arr.length == 1){
            		showErrorVideoToast('Minimum URL Number Exceeds! The Video Must Have At Least One URL Available.');
            	} else{
            		$('#deleteURLModal').modal('show');
            	}
            }
        });
    }

    function url_modal(video_id){
    	$.ajax({
            url: "fetch_video_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	video_id: video_id
            },
            success: function (response) {
            	var video_urls = response.video_url;
            	var video_urls_arr = video_urls.split(',');

            	var video_widths = response.video_width;
            	var video_widths_arr = video_widths.split(',');

            	var video_heights = response.video_height;
            	var video_heights_arr = video_heights.split(',');

            	var video_sizes = response.video_size;
            	var video_sizes_arr = video_sizes.split(',');

            	$('#url_records').empty();
        		var trHTML = '';

            	for(i=0; i<video_urls_arr.length; i++){
            		trHTML += '<tr>';
		            	trHTML += '<td>' + video_urls_arr[i] + '</td>';
		            	trHTML += '<td>' + video_widths_arr[i] + ' X ' + video_heights_arr[i] + '</td>';
		            	trHTML += '<td>' + (video_sizes_arr[i] / 1048576).toFixed(2) + ' MB'  + '</td>';
		            	trHTML += '<td><button type="button" class="btn btn-inverse-danger btn-icon" title="Delete" onclick="delete_url_modal(' + video_id + ',' + i + ')"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button></td>';
		            trHTML += '</tr>';
            	}

            	$('#url_records').append(trHTML);
            	$('#video_id').val(response.video_id);
            	$('#urlModal').modal('show');
            }
        });
    }

    function reschedule_modal(video_id){
    	$.ajax({
            url: "check_video_schedule.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	video_id: video_id
            },
            success: function (response) {
            	if(response.data == 'instant'){
            		showScheduleInfoToast('The Video Had Been Published Instantly! You Cannot Schedule Datetime For This Video.');
            	} else if(response.data == 'scheduled'){
            		showScheduleInfoToast('The Video Was Published On A Scheduled Datetime Already! You Cannot Reschedule Datetime For This Video.');
            	} else{
            		$('#reschedule_datetime').val(response.data);
            		$('#reschedule_video_id').val(response.video_id);

            		$('#rescheduleModal').modal('show');
            	}
            }
        });
    }

    $("#video_upd_btn").on('click', function(e){
        var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;
        var upload_date_regex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

        var upd_video_title = $('#upd_video_title').val().trim();
        $('#upd_video_title').val(upd_video_title);
        var upd_subtitle = $('#upd_subtitle').val().trim();
        $('#upd_subtitle').val(upd_subtitle);
        var upd_upload_date = $('#upd_upload_date').val().trim();
        $('#upd_upload_date').val(upd_upload_date);
        var upd_no_of_likes = $('#upd_no_of_likes').val().trim();
        var upd_no_of_dislikes = $('#upd_no_of_dislikes').val().trim();
        var upd_no_of_views = $('#upd_no_of_views').val().trim();
        var upd_no_of_shares = $('#upd_no_of_shares').val().trim();
        var upd_age_limit = $('#upd_age_limit').val().trim();
        var upd_user = $('#upd_user').val().trim();
        var upd_post_type = $('#upd_post_type').val().trim();
        var upd_post_criteria = $('#upd_post_criteria').val().trim();
        var upd_status = $('#upd_status').val().trim();

        if(upd_video_title == null || upd_video_title == ""){
            $("#err_upd_video_title").html('Please Insert Video Title.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_video_title").html('');
        }

        if (!upd_video_title.match(name_regex)){
            $('#err_upd_video_title').html('Please Insert a Valid Video Title.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_video_title").html('');
        }

        if (upd_video_title.length < 3){
            $('#err_upd_video_title').html('Video Title Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_upd_video_title").html('');
        }

        if($('#summernoteExample2').summernote('isEmpty')){
            $("#err_upd_description").html('Please Insert Description.').css('color', 'red');
            return false;
        } else{
        	$('#upd_description').val($("#summernoteExample2").summernote('code'));
            $("#err_upd_description").html('');
        }

        if(upd_no_of_likes == null || upd_no_of_likes == ""){
            $("#err_upd_no_of_likes").html('Please Insert Number of Likes.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_no_of_likes").html('');
        }

        if(upd_no_of_dislikes == null || upd_no_of_dislikes == ""){
            $("#err_upd_no_of_dislikes").html('Please Insert Number of Dislikes.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_no_of_dislikes").html('');
        }

        if(upd_no_of_views == null || upd_no_of_views == ""){
            $("#err_upd_no_of_views").html('Please Insert Number of Views.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_no_of_views").html('');
        }

        if(upd_no_of_shares == null || upd_no_of_shares == ""){
            $("#err_upd_no_of_shares").html('Please Insert Number of Shares.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_no_of_shares").html('');
        }

        if(upd_upload_date == null || upd_upload_date == ""){
            $("#err_upd_upload_date").html('Please Insert Upload Date.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_upload_date").html('');
        }

        if (!upd_upload_date.match(upload_date_regex) ){
            $('#err_upd_upload_date').html('Please Insert a Valid Date.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_upload_date").html('');
        }

        if(upd_age_limit == null || upd_age_limit == ""){
            $("#err_upd_age_limit").html('Please Insert Age Limit.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_age_limit").html('');
        }

        if(upd_user == null || upd_user == ""){
            $("#err_upd_user").html('Please Select User.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_user").html('');
        }

        if(upd_post_type == null || upd_post_type == ""){
            $("#err_upd_post_type").html('Please Select Post Type.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_post_type").html('');
        }

        if(upd_status == null || upd_status == ""){
            $("#err_upd_status").html('Please Select Status.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_status").html('');
        }

        if($('#upd_thumbnail').val()){
            var t_ext = $('#upd_thumbnail').val().split('.').pop().toLowerCase();
            var t_size = ($('#upd_thumbnail')[0].files[0].size);

            if(($.inArray(t_ext, ['png', 'jpg', 'jpeg']) == -1) || (t_size > 2097152)){
                if($.inArray(t_ext, ['png', 'jpg', 'jpeg']) == -1){
                    var message = 'Thumbnail Format is Invalid! Must be in .png, .jpg or .jpeg Format.';
                    showInvalidImageToast(message);
                } else{
                    var message = 'Thumbnail Size Limit Exceeds! Size Must be Below 2 MB.';
                    showInvalidImageToast(message);
                }

                return false;
            } 
        }

        $('#company_update_form').submit();
    });

	$("#video_upd_btn2").on('click', function(e){
		var video_id = $('#video_id').val();
		var video_url = $('#video_url').val();

        if(video_url == null || video_url == ""){
            $("#err_video_url").html('Please Choose a Video.').css('color', 'red');
            return false;
        } else{
            var t_ext = $('#video_url').val().split('.').pop().toLowerCase();
            var t_size = ($('#video_url')[0].files[0].size);

            if(($.inArray(t_ext, ['mp4']) == -1) || (t_size > 268435456)){ //256 MB
                if($.inArray(t_ext, ['mp4']) == -1){
					$("#err_video_url").html('Video Format is Invalid! Must be in .mp4 Format.').css('color', 'red');
                } else{
                    $("#err_video_url").html('Video Size Limit Exceeds! Size Must be Below 256 MB.').css('color', 'red');
                }

                return false;
            } else{
            	$("#err_video_url").html('');

            	var flag = 0;

            	$.ajax({
		            url: "check_video_status.php",
		            type: "POST",
		            dataType: "JSON",
		            async: false,
		            data : {
		            	video_id: video_id
		            },
		            success: function (response) {
		            	if(response.status == true){
		            		showErrorVideoToast('Maximum URL Number Exceeds! The Video has Already 3 URLs. You Can Delete Existing One to Add a New One.');

		            		flag = 1;
		            	}
		            }
		        });

		        if(flag == 1) return false;
            }
        }

        $('#video_update_form2').submit();
	});

	$("#reschedule_add_btn").on('click', function(e){
        var reschedule_datetime = $('#reschedule_datetime').val().trim();
        $('#reschedule_datetime').val(reschedule_datetime);

        if(reschedule_datetime == null || reschedule_datetime == ""){
            $("#err_reschedule_datetime").html('Please Insert Type Name.').css('color', 'red');
            return false;
        } else{
            $("#err_reschedule_datetime").html('');
        }

        $('#reschedule_form').submit();
    });
</script>