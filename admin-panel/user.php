<?php 
	include('includes/header.php');
	include('../config/config.php');
	session_start();

	if(!isset($_SESSION['logged_in_email']) && empty($_SESSION['logged_in_email'])){
        header('Location: index.php');
    }
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
		                    <li class="breadcrumb-item active" aria-current="page"><span><i class="ti-user menu-icon"></i> User</span></li>
	                  	</ol>
	                </nav>

		          	<div class="card">
			            <div class="card-body">
			              	<h1 style="color: #ff5722" class="display-4">
			              		User List &nbsp;
			              		<button type="button" class="btn btn-inverse-secondary btn-icon-text" title="Add User" data-toggle="modal" data-target="#userAddModal"><i class="ti-plus"></i>&nbsp; Add User</button>
			              	</h1>

							<div class="modal fade" id="userAddModal" tabindex="-1" role="dialog" aria-labelledby="userAddModalLabel" aria-hidden="true">
			                    <div class="modal-dialog modal-lg" role="document">
			                      	<div class="modal-content">
				                        <div class="modal-header">
				                          	<h5 class="modal-title" id="userAddModalLabel">Add User</h5>

				                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            	<span aria-hidden="true">&times;</span>
				                          	</button>
				                        </div>

				                        <form class="cmxform" id="user_add_form" method="POST" action="user_add.php" enctype="multipart/form-data">
					                        <div class="modal-body" style="padding-bottom: 0">
							                    <fieldset>
							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="first_name">First Name <span style="color: red;">*</span></label>
									                        <input style="margin-bottom: 5px;" id="first_name" class="form-control" name="first_name" type="text" placeholder="Insert...">

									                        <span id="err_first_name"></span>
									                    </div>

									                    <div class="form-group col">
									                        <label for="surname">Surname <span style="color: red;">*</span></label>
								                        	<input style="margin-bottom: 5px;" id="surname" class="form-control" name="surname" type="text" placeholder="Insert...">

								                        	<span id="err_surname"></span>
									                    </div>

									                    <div class="form-group col">
									                        <label for="confirm_password">Social Media</label>
								                        	<div class="form-inline repeater">
										                        <div data-repeater-list="group-a">
										                          	<div data-repeater-item class="d-flex mb-2">
											                            <input type="text" class="form-control form-control-sm" name="social_media" placeholder="Insert URL...">

										                            	<button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
										                              		<i class="ti-trash"></i>
										                            	</button>
										                          	</div>
										                        </div>

										                        <button data-repeater-create type="button" class="btn btn-sm icon-btn ml-2 mb-2" style="background-color: #ff5722">
										                          	<i class="ti-plus" style="color: #fff"></i>
										                        </button>
										                    </div>
											            </div>
							                      	</div>

							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="password">Password <span style="color: red;">*</span></label>
									                        <input style="margin-bottom: 5px;" id="password" class="form-control" name="password" type="password" placeholder="Insert...">

									                        <span id="err_password"></span>
									                    </div>

									                    <div class="form-group col">
									                        <label for="cpassword">Confirm Password <span style="color: red;">*</span></label>
								                        	<input style="margin-bottom: 5px;" id="cpassword" class="form-control" name="cpassword" type="password" placeholder="Insert...">

								                        	<span id="err_cpassword"></span>
									                    </div>

									                    <div class="form-group col">
									                        <label for="dob">Birth Date <span style="color: red;">*</span></label>
								                        	<div id="datepicker-popup" style="margin-bottom: 5px;" class="input-group date datepicker">
										                        <input type="text" class="form-control" name="dob" id="dob" placeholder="Insert...">

										                        <span class="input-group-addon input-group-append border-left"></span>
										                    </div>

										                    <span id="err_dob"></span>
									                    </div>
							                      	</div>

							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="job">Job</label>
								                        	<input id="job" class="form-control" name="job" type="text" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="email">Email <span style="color: red;">*</span></label>
								                        	<input style="margin-bottom: 5px;" id="email" class="form-control" name="email" type="text" placeholder="Insert...">

								                        	<span id="err_email"></span>
									                    </div>

									                    <div class="form-group col">
									                        <label for="phone">Phone</label>
								                        	<input id="phone" class="form-control" name="phone" type="text" placeholder="Insert...">
									                    </div>
							                      	</div>

							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="description">Description <span style="color: red;">*</span></label>
								                        	<textarea style="margin-bottom: 5px;" rows="1" id="description" class="form-control" name="description" placeholder="Insert..."></textarea>

								                        	<span id="err_description"></span>
									                    </div>

							                      		<div class="form-group col">
									                        <label for="older_address">Older Address</label>
								                        	<textarea rows="1" id="older_address" class="form-control" name="older_address" placeholder="Insert..."></textarea>
									                    </div>
							                      	</div>

													<div class="row">
							                      		<div class="form-group col">
									                        <label for="rank">Rank</label>
								                        	<input id="rank" class="form-control" name="rank" type="text" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="expertise_area">Expertise Area <span class="text-muted">(For multiple areas, separate them by comma)</span></label>
								                        	<input id="expertise_area" class="form-control" name="expertise_area" type="text" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="personal_interest">Personal Interest <span class="text-muted">(For multiple interests, separate them by comma)</span></label>
								                        	<input id="personal_interest" class="form-control" name="personal_interest" type="text" placeholder="Insert...">
									                    </div>
							                      	</div>

							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="type">Type <span style="color: red;">*</span></label>
								                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="user_type" id="user_type">
								                        		<option value="">Select...</option>
										                      	<option value="Founder">Founder</option>
										                      	<option value="Spectator">Spectator</option>
										                    </select>

										                    <span id="err_user_type"></span>
									                    </div>

							                      		<div class="form-group col">
									                        <label for="status">Status <span style="color: red;">*</span></label>
								                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="status" id="status">
								                        		<option value="">Select...</option>
										                      	<option value="Active">Active</option>
										                      	<option value="Pending">Pending</option>
										                      	<option value="Inactive">Inactive</option>
										                    </select>

										                    <span id="err_status"></span>
									                    </div>

									                    <div class="form-group col">
									                    	<div class="row">
									                    		<div class="form-group col">
									                    			<label for="profile_picture">Profile Picture</label><br>
								                        			<input type="file" class="dropify" id="profile_picture" name="profile_picture">
									                    		</div>

									                    		<div class="form-group col">
											                        <label for="cover_photo">Cover Photo</label><br>
										                        	<input type="file" class="dropify" id="cover_photo" name="cover_photo">
											                    </div>
									                    	</div>
									                    </div>
							                      	</div>
							                    </fieldset>
					                        </div>

					                        <div class="modal-footer">
					                          	<button type="submit" id="user_add_btn" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

					                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; Cancel</button>
					                        </div>
				                    	</form>
			                      	</div>
			                    </div>
			                </div>

			              	<br>

			              	<div class="row">
				                <div class="col-12">
				                  	<div class="table-responsive">
					                    <table id="order-listing" class="table">
					                      	<thead>
						                        <tr>
						                            <td width="5%">Profile Picture</td>
						                            <th>Name</th>
						                            <th>Email</th>
						                            <th>Company</th>
						                            <th>Type</th>
						                            <th>Status</th>
						                            <th>Approval</th>
						                            <th>Actions</th>
						                        </tr>
					                      	</thead>

					                      	<tbody>
					                      		<?php 
					                      			$sql = "SELECT * FROM user WHERE user_id != 1 ORDER BY user_id DESC";
											        $result = $con->query($sql);

											        if($result->num_rows > 0){
											        	$i = 0;

											            while($row = $result->fetch_assoc()){
											            	$user_id = $row['user_id'];
											            	$user = $row['first_name'] . ' ' . $row['surname'];
											            	$status = $row['status'];

											            	$sql2 = "SELECT * FROM company WHERE user_id = '$user_id' LIMIT 1";
											        		$result2 = $con->query($sql2);
											        		$row2 = $result2->fetch_assoc();
					                      		?>
									                        <tr>
									                            <td><img class="img-sm rounded-circle" src="<?php if($row['profile_picture']){ echo '../backend/uploads/' . $row['profile_picture']; } else{ echo 'images/faces/no_image_available.jpg'; } ?>" alt="Profile Picture"></td>
									                            <td><?= $user; ?></td>
									                            <td><?= $row['email']; ?></td>
									                            <td><?php if($row2['company_name']){ echo $row2['company_name']; } else{ echo '-'; } ?></td>
									                            <td><?= $row['user_type']; ?></td>
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
											                            	<input type="checkbox" id="approval<?= $i; ?>" class="form-check-input" onchange="approval('<?= $user_id; ?>', '<?= $user; ?>', '<?= $i; ?>')" <?php if($status == 'Active'){ echo 'checked'; } ?>>
											                            </label>
											                        </div>
									                            </td>
									                            <td>
									                            	<button type="button" class="btn btn-inverse-success btn-icon" title="View" onclick="view_modal('<?= $user_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;
									                              	
									                              	<button type="button" class="btn btn-inverse-info btn-icon" title="Edit" onclick="edit_modal('<?= $user_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;
									                              	
									                              	<button type="button" class="btn btn-inverse-danger btn-icon" title="Delete" onclick="delete_modal('<?= $user_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
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
							                          	<h5 class="modal-title" id="viewModalLabel">View User</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

							                        <div class="modal-body" style="padding-bottom: 0">
									                    <fieldset>
									                      	<div class="row">
									                      		<div class="form-group col">
											                        <label for="view_first_name">Firstname</label>
											                        <input id="view_first_name" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_surname">Surname</label>
										                        	<input id="view_surname" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_social_media">Social Media</label>
										                        	<div id="view_social_media" class="template-demo">
													                </div>
													            </div>
									                      	</div>

									                      	<div class="row">
									                      		<div class="form-group col">
											                        <label for="view_dob">Birth Date</label>
												                    <input type="text" class="form-control p-event" id="view_dob">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_job">Job</label>
										                        	<input id="view_job" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_email">Email</label>
										                        	<input id="view_email" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_phone">Phone</label>
										                        	<input id="view_phone" class="form-control p-event" type="phone">
											                    </div>
									                      	</div>

									                      	<div class="row">
									                      		<div class="form-group col">
											                        <label for="view_description">Description</label>
										                        	<textarea rows="1" id="view_description" class="form-control p-event"></textarea>
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_older_address">Older Address</label>
										                        	<textarea rows="1" id="view_older_address" class="form-control p-event"></textarea>
											                    </div>
									                      	</div>

															<div class="row">
									                      		<div class="form-group col">
											                        <label for="view_rank">Rank</label>
										                        	<input id="view_rank" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_expertise_area">Expertise Area</label>
										                        	<input id="view_expertise_area" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_personal_interest">Personal Interest</label>
										                        	<input id="view_personal_interest" class="form-control p-event" type="text">
											                    </div>
									                      	</div>

									                      	<div class="row">
									                      		<div class="form-group col">
											                        <label for="view_type">Type</label>
										                        	<input id="view_type" class="form-control p-event" type="text">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_status">Status</label>
										                        	<input id="view_status" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                    	<div class="row">
											                    		<div class="form-group col">
											                    			<label for="profile_picture">Profile Picture</label><br>
										                        			<img id="view_profile_picture" src="images/faces/no_image_available.jpg" class="img-lg rounded" alt="Profile Picture"/>
											                    		</div>

											                    		<div class="form-group col">
													                        <label for="cover_photo">Cover Photo</label><br>
												                        	<img id="view_cover_photo" src="images/samples/300x300/no_image_available.jpg" class="img-lg rounded" alt="Cover Photo">
													                    </div>
											                    	</div>
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
							                          	<h5 class="modal-title" id="editModalLabel">Edit User</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

							                        <form class="cmxform" id="user_update_form" method="POST" action="user_update.php" enctype="multipart/form-data">
								                        <div class="modal-body" style="padding-bottom: 0">
										                    <fieldset>
										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_first_name">First Name <span style="color: red;">*</span></label>
												                        <input style="margin-bottom: 5px;" id="upd_first_name" class="form-control" name="upd_first_name" type="text" placeholder="Insert...">

												                        <span id="err_upd_first_name"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_surname">Surname <span style="color: red;">*</span></label>
											                        	<input style="margin-bottom: 5px;" id="upd_surname" class="form-control" name="upd_surname" type="text" placeholder="Insert...">

											                        	<span id="err_upd_surname"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_social_media">Social Media</label>
											                        	<div id="upd_social_media" class="form-inline repeater">
													                        <div data-repeater-list="group-a">
													                          	<div data-repeater-item class="d-flex mb-2">
														                            <input type="text" class="form-control form-control-sm" name="social_media" placeholder="Insert URL...">

													                            	<button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2" >
													                              		<i class="ti-trash"></i>
													                            	</button>
													                          	</div>
													                        </div>

													                        <button data-repeater-create type="button" class="btn btn-sm icon-btn ml-2 mb-2" style="background-color: #ff5722">
													                          	<i class="ti-plus" style="color: #fff"></i>
													                        </button>
													                    </div>
														            </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_password">Password</label>
												                        <input style="margin-bottom: 5px;" id="upd_password" class="form-control" name="upd_password" type="password" placeholder="Insert...">

																		<span id="err_upd_password"></span>	
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_cpassword">Confirm Password</label>
											                        	<input style="margin-bottom: 5px;" id="upd_cpassword" class="form-control" name="upd_cpassword" type="password" placeholder="Insert...">

																		<span id="err_upd_cpassword"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_dob">Birth Date <span style="color: red;">*</span></label>
											                        	<div id="datepicker-popup2" style="margin-bottom: 5px;" class="input-group date datepicker">
													                        <input type="text" class="form-control" name="upd_dob" id="upd_dob" placeholder="Insert...">

													                        <span class="input-group-addon input-group-append border-left"></span>
													                    </div>

													                    <span id="err_upd_dob"></span>
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_job">Job</label>
											                        	<input id="upd_job" class="form-control" name="upd_job" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_email">Email <span style="color: red;">*</span></label>
											                        	<input style="margin-bottom: 5px;" id="upd_email" class="form-control" name="upd_email" type="text" placeholder="Insert...">

											                        	<span id="err_upd_email"></span>
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_phone">Phone</label>
											                        	<input id="upd_phone" class="form-control" name="upd_phone" type="text" placeholder="Insert...">
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_description">Description <span style="color: red;">*</span></label>
											                        	<textarea style="margin-bottom: 5px;" rows="1" id="upd_description" class="form-control" name="upd_description" placeholder="Insert..."></textarea>

											                        	<span id="err_upd_description"></span>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="upd_older_address">Older Address</label>
											                        	<textarea rows="1" id="upd_older_address" class="form-control" name="upd_older_address" placeholder="Insert..."></textarea>
												                    </div>
										                      	</div>

																<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_rank">Rank</label>
											                        	<input id="upd_rank" class="form-control" name="upd_rank" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_expertise_area">Expertise Area <span class="text-muted">(For multiple areas, separate them by comma)</span></label>
											                        	<input id="upd_expertise_area" class="form-control" name="upd_expertise_area" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="upd_personal_interest">Personal Interest <span class="text-muted">(For multiple interests, separate them by comma)</span></label>
											                        	<input id="upd_personal_interest" class="form-control" name="upd_personal_interest" type="text" placeholder="Insert...">
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_type">Type <span style="color: red;">*</span></label>
											                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_user_type" id="upd_user_type">
											                        		<option value="">Select...</option>
													                      	<option value="Founder">Founder</option>
													                      	<option value="Spectator">Spectator</option>
													                    </select>

													                    <span id="err_upd_user_type"></span>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="upd_status">Status <span style="color: red;">*</span></label>
											                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_status" id="upd_status">
											                        		<option value="">Select...</option>
													                      	<option value="Active">Active</option>
													                      	<option value="Pending">Pending</option>
													                      	<option value="Inactive">Inactive</option>
													                    </select>

													                    <span id="err_upd_status"></span>
												                    </div>

												                    <div class="form-group col">
												                    	<div class="row">
												                    		<div class="form-group col">
												                    			<label for="upd_profile_picture">Profile Picture</label><br>
											                        			<input type="file" class="dropify" id="upd_profile_picture" name="upd_profile_picture">
												                    		</div>

												                    		<div class="form-group col">
														                        <label for="upd_cover_photo">Cover Photo</label><br>
													                        	<input type="file" class="dropify" id="upd_cover_photo" name="upd_cover_photo">
														                    </div>
												                    	</div>
												                    </div>
										                      	</div>

										                      	<input type="hidden" name="upd_user_id" id="upd_user_id">
										                    </fieldset>
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" id="user_upd_btn" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

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
							                          	<h5 class="modal-title" id="deleteModalLabel">Delete User</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

						                        	<form class="cmxform" id="user_delete_form" method="POST" action="user_delete.php" enctype="multipart/form-data">
							                        	<div class="modal-body">
								                          	<p>Do You Really Want to Delete This User?</p>

								                          	<input type="hidden" name="dlt_user_id" id="dlt_user_id">
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" id="user_dlt_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

								                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
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
        ?>
                showAddUserToast('<?= $_SESSION['message'] ?>');
        <?php
                $_SESSION['message'] = '';
            }
        ?>
	});

	function approval(user_id, user, counter){
		var status = '';
    	if($('#approval' + counter).is(":checked") == true){
    		status = 'Active';
    	} else{
    		status = 'Inactive';
    	}

        $.ajax({
            url: "user_status_update.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	user_id: user_id,
                status: status
            },
            success: function (response) {
            	showUpdateStatusToast(user);

                if(response == 'Active'){
                	$('#badge' + counter).removeClass().addClass('badge badge-success').html('Active');
                } else{
                	$('#badge' + counter).removeClass().addClass('badge badge-danger').html('Inactive');
                }
            }
        });
    }

    function view_modal(user_id){
    	$.ajax({
            url: "fetch_user_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	user_id: user_id
            },
            success: function (response) {
            	$('#view_first_name').val(response.first_name);
            	$('#view_surname').val(response.surname);

            	var social_media_arr = response.social_media.split(',');
            	var social_media = '';
            	for(i=0; i<social_media_arr.length; i++){
            		if(social_media_arr[i].indexOf('facebook') != -1){
            			social_media += '<a style="margin-right: 10px;" href="' + social_media_arr[i] + '" target="_blank"><button type="button" class="btn btn-social-icon btn-facebook"><i class="ti-facebook"></i></button><a>';
            		} else if(social_media_arr[i].indexOf('youtube') != -1){
            			social_media += '<a style="margin-right: 10px;" href="' + social_media_arr[i] + '" target="_blank"><button type="button" class="btn btn-social-icon btn-youtube"><i class="ti-youtube"></i></button><a>';
            		} else if(social_media_arr[i].indexOf('twitter') != -1){
            			social_media += '<a style="margin-right: 10px;" href="' + social_media_arr[i] + '" target="_blank"><button type="button" class="btn btn-social-icon btn-twitter"><i class="ti-twitter-alt"></i></button><a>';
            		} else if(social_media_arr[i].indexOf('linkedin') != -1){
            			social_media += '<a style="margin-right: 10px;" href="' + social_media_arr[i] + '" target="_blank"><button type="button" class="btn btn-social-icon btn-linkedin"><i class="ti-linkedin"></i></button><a>';
            		}
            	}

            	$('#view_social_media').html(social_media);
            	$('#view_dob').val(response.dob);
            	$('#view_job').val(response.job);
            	$('#view_email').val(response.email);
            	$('#view_phone').val(response.phone);
            	$('#view_description').val(response.description);
            	$('#view_older_address').val(response.older_address);
            	$('#view_rank').val(response.rank);
            	$('#view_expertise_area').val(response.expertise_area);
            	$('#view_personal_interest').val(response.personal_interest);
            	$('#view_type').val(response.user_type);
            	$('#view_status').val(response.status);
            	if(response.profile_picture) $('#view_profile_picture').attr('src', '../backend/uploads/' + response.profile_picture);
            	if(response.cover_photo) $('#view_cover_photo').attr('src', '../backend/uploads/' + response.cover_photo);

            	$('#viewModal').modal('show');
            }
        });
    }

    function edit_modal(user_id){
    	$.ajax({
            url: "fetch_user_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	user_id: user_id
            },
            success: function (response) {
            	$('#upd_user_id').val(response.user_id);
            	$('#upd_first_name').val(response.first_name);
            	$('#upd_surname').val(response.surname);
            	$('#upd_dob').val(response.dob);
            	$('#upd_job').val(response.job);
            	$('#upd_email').val(response.email);
            	$('#upd_phone').val(response.phone);
            	$('#upd_description').val(response.description);
            	$('#upd_older_address').val(response.older_address);
            	$('#upd_rank').val(response.rank);
            	$('#upd_expertise_area').val(response.expertise_area);
            	$('#upd_personal_interest').val(response.personal_interest);
            	$('#upd_user_type').val(response.user_type);
            	$('#upd_status').val(response.status);

            	$('#editModal').modal('show');
            }
        });
    }

    function delete_modal(user_id){
    	$.ajax({
            url: "fetch_user_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	user_id: user_id
            },
            success: function (response) {
            	$('#dlt_user_id').val(response.user_id);

            	$('#deleteModal').modal('show');
            }
        });
    }

	$("#user_add_btn").on('click', function(e){
        var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;
    	var phone_regex = /^[0-9]+$/;
    	var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    	var birthday_regex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

        var first_name = $('#first_name').val().trim();
        $('#first_name').val(first_name);
        var surname = $('#surname').val().trim();
        $('#surname').val(surname);
        var email = $('#email').val().trim();
        $('#email').val(email);
        var password = $('#password').val().trim();
        $('#password').val(password);
        var cpassword = $('#cpassword').val().trim();
        $('#cpassword').val(cpassword);
        var dob = $('#dob').val().trim();
        $('#dob').val(dob);
        var description = $('#description').val().trim();
        $('#description').val(description);
        var user_type = $('#user_type').val().trim();
        var status = $('#status').val().trim();

        if(first_name == null || first_name == ""){
            $("#err_first_name").html('Please Insert First Name.').css('color', 'red');
            return false;
        } else{
            $("#err_first_name").html('');
        }

        if (!first_name.match(name_regex)){
            $('#err_first_name').html('Please Insert a Valid First Name.').css('color', 'red');
            return false;
        } else{
            $("#err_first_name").html('');
        }

        if (first_name.length < 3){
            $('#err_first_name').html('First Name Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_first_name").html('');
        }

        if(surname == null || surname == ""){
            $("#err_surname").html('Please Insert Password.').css('color', 'red');
            return false;
        } else{
            $("#err_surname").html('');
        }

        if (!surname.match(name_regex)){
            $('#err_surname').html('Please Insert a Valid Surname.').css('color', 'red');
            return false;
        } else{
            $("#err_surname").html('');
        }

        if (surname.length < 3){
            $('#err_surname').html('Surname Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_surname").html('');
        }

        if(password == null || password == ""){
            $("#err_password").html('Please Insert Password.').css('color', 'red');
            return false;
        } else{
            $("#err_password").html('');
        }

        if (password.length < 8){
            $('#err_password').html('Password Must Contain At Least 8 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_password").html('');
        }

        if(cpassword == null || cpassword == ""){
            $("#err_cpassword").html('Please Confirm Password.').css('color', 'red');
            return false;
        } else{
            $("#err_cpassword").html('');
        }

        if (cpassword.length < 8){
            $('#err_cpassword').html('Password Must Contain At Least 8 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_cpassword").html('');
        }

        if (password !== cpassword){
            $('#err_cpassword').html('Password And Confirm Password Mismatched.').css('color', 'red');  
            return false;
        } else{
            $("#err_cpassword").html('');
        }

        if(dob == null || dob == ""){
            $("#err_dob").html('Please Insert Birth Date.').css('color', 'red');
            return false;
        } else{
            $("#err_dob").html('');
        }

        if (!dob.match(birthday_regex) ){
            $('#err_dob').html('Please Insert a Valid Date.').css('color', 'red');
            return false;
        } else{
            $("#err_dob").html('');
        }

        if(email == null || email == ""){
            $("#err_email").html('Please Insert Email.').css('color', 'red');
            return false;
        } else{
            $("#err_email").html('');
        }

        if (!email.match(email_regex) ){
            $('#err_email').html('Please Insert a Valid Email.').css('color', 'red');
            return false;
        } else{
            $("#err_email").html('');
        }

        var flag = true;
        if($('#email').val()){
            $.ajax({
                url: "../backend/validation.php",
                type: "POST",
                dataType: "JSON",
                data : {
                    email: email
                },
                async: false,
                success: function (response) {
                    if(response.status == true){
                    	showInvalidEmailToast();

                    	flag = false;
                    }
                }
            });
        }
        if(!flag){
        	return false;
        }

        if(description == null || description == ""){
            $("#err_description").html('Please Insert Description.').css('color', 'red');
            return false;
        } else{
            $("#err_description").html('');
        }

        if(user_type == null || user_type == ""){
            $("#err_user_type").html('Please Select Type.').css('color', 'red');
            return false;
        } else{
            $("#err_user_type").html('');
        }

        if(status == null || status == ""){
            $("#err_status").html('Please Select Status.').css('color', 'red');
            return false;
        } else{
            $("#err_status").html('');
        }

        if($('#profile_picture').val()){
            var p_ext = $('#profile_picture').val().split('.').pop().toLowerCase();
            var p_size = ($('#profile_picture')[0].files[0].size);

            if(($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1) || (p_size > 2097152)){
                if($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1){
                    var message = 'Profile picture format is invalid! Must be in .png, .jpg or .jpeg format.';
                    showInvalidImageToast(message);
                } else{
                    var message = 'Profile picture size limit exceeds! Size must be below 2 MB.';
                    showInvalidImageToast(message);
                }

                return false;
            } 
        }

        if($('#cover_photo').val()){
            var c_ext = $('#cover_photo').val().split('.').pop().toLowerCase();
            var c_size = ($('#cover_photo')[0].files[0].size);

            if(($.inArray(c_ext, ['png', 'jpg', 'jpeg']) == -1) || (c_size > 2097152)){
                if($.inArray(c_ext, ['png', 'jpg', 'jpeg']) == -1){
                    var message = 'Cover photo format is invalid! Must be in .png, .jpg or .jpeg format.';
                    showInvalidImageToast(message);
                } else{
                    var message = 'Cover photo size limit exceeds! Size must be below 2 MB.';
                    showInvalidImageToast(message);
                }

                return false;
            } 
        }

        $('#user_add_form').submit();
    });

	$("#user_upd_btn").on('click', function(e){
        var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;
    	var phone_regex = /^[0-9]+$/;
    	var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    	var birthday_regex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

        var upd_user_id = $('#upd_user_id').val();
        var upd_first_name = $('#upd_first_name').val().trim();
        $('#upd_first_name').val(upd_first_name);
        var upd_surname = $('#upd_surname').val().trim();
        $('#upd_surname').val(upd_surname);
        var upd_email = $('#upd_email').val().trim();
        $('#upd_email').val(upd_email);
        var upd_password = $('#upd_password').val().trim();
        $('#upd_password').val(upd_password);
        var upd_cpassword = $('#upd_cpassword').val().trim();
        $('#upd_cpassword').val(upd_cpassword);
        var upd_dob = $('#upd_dob').val().trim();
        $('#upd_dob').val(upd_dob);
        var upd_description = $('#upd_description').val().trim();
        $('#upd_description').val(upd_description);
        var upd_user_type = $('#upd_user_type').val().trim();
        var upd_status = $('#upd_status').val().trim();

        if(upd_first_name == null || upd_first_name == ""){
            $("#err_upd_first_name").html('Please Insert First Name.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_first_name").html('');
        }

        if (!upd_first_name.match(name_regex)){
            $('#err_upd_first_name').html('Please Insert a Valid First Name.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_first_name").html('');
        }

        if (upd_first_name.length < 3){
            $('#err_upd_first_name').html('First Name Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_upd_first_name").html('');
        }

        if(upd_surname == null || upd_surname == ""){
            $("#err_upd_surname").html('Please Insert Password.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_surname").html('');
        }

        if (!upd_surname.match(name_regex)){
            $('#err_upd_surname').html('Please Insert a Valid Surname.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_surname").html('');
        }

        if (upd_surname.length < 3){
            $('#err_upd_surname').html('Surname Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_upd_surname").html('');
        }

        if(upd_password){
	        if (upd_password.length < 8){
	            $('#err_upd_password').html('Password Must Contain At Least 8 Characters.').css('color', 'red');  
	            return false;
	        } else{
	            $("#err_upd_password").html('');
	        }
	    }

        if(upd_cpassword){
	        if (upd_cpassword.length < 8){
	            $('#err_upd_cpassword').html('Password Must Contain At Least 8 Characters.').css('color', 'red');  
	            return false;
	        } else{
	            $("#err_upd_cpassword").html('');
	        }
	    }

        if (upd_password !== upd_cpassword){
            $('#err_upd_cpassword').html('Password And Confirm Password Mismatched.').css('color', 'red');  
            return false;
        } else{
            $("#err_upd_cpassword").html('');
        }

        if(upd_dob == null || upd_dob == ""){
            $("#err_upd_dob").html('Please Insert Birth Date.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_dob").html('');
        }

        if (!upd_dob.match(birthday_regex) ){
            $('#err_upd_dob').html('Please Insert a Valid Date.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_dob").html('');
        }

        if(upd_email == null || upd_email == ""){
            $("#err_upd_email").html('Please Insert Email.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_email").html('');
        }

        if (!upd_email.match(email_regex) ){
            $('#err_upd_email').html('Please Insert a Valid Email.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_email").html('');
        }

        var flag = true;
        if($('#upd_email').val()){
            $.ajax({
                url: "../backend/validation.php",
                type: "POST",
                dataType: "JSON",
                data : {
                	upd_user_id: upd_user_id,
                    upd_email: upd_email
                },
                async: false,
                success: function (response) {
                    if(response.status == true){
                    	showInvalidEmailToast();

                    	flag = false;
                    }
                }
            });
        }
        if(!flag){
        	return false;
        }

        if(upd_description == null || upd_description == ""){
            $("#err_upd_description").html('Please Insert Description.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_description").html('');
        }

        if(upd_user_type == null || upd_user_type == ""){
            $("#err_upd_user_type").html('Please Select Type.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_user_type").html('');
        }

        if(upd_status == null || upd_status == ""){
            $("#err_upd_status").html('Please Select Status.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_status").html('');
        }

        if($('#upd_profile_picture').val()){
            var p_ext = $('#upd_profile_picture').val().split('.').pop().toLowerCase();
            var p_size = ($('#upd_profile_picture')[0].files[0].size);

            if(($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1) || (p_size > 2097152)){
                if($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1){
                    var message = 'Profile Picture Format is Invalid! Must be in .png, .jpg or .jpeg Format.';
                    showInvalidImageToast(message);
                } else{
                    var message = 'Profile Picture Size Limit Exceeds! Size Must be Below 2 MB.';
                    showInvalidImageToast(message);
                }

                return false;
            } 
        }

        if($('#upd_cover_photo').val()){
            var c_ext = $('#upd_cover_photo').val().split('.').pop().toLowerCase();
            var c_size = ($('#upd_cover_photo')[0].files[0].size);

            if(($.inArray(c_ext, ['png', 'jpg', 'jpeg']) == -1) || (c_size > 2097152)){
                if($.inArray(c_ext, ['png', 'jpg', 'jpeg']) == -1){
                    var message = 'Cover Photo Format is Invalid! Must be in .png, .jpg or .jpeg Format.';
                    showInvalidImageToast(message);
                } else{
                    var message = 'Cover Photo Size Limit Exceeds! Size Must be Below 2 MB.';
                    showInvalidImageToast(message);
                }

                return false;
            } 
        }

        $('#user_update_form').submit();
    });
</script>