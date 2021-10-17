<?php 
	include('includes/header.php');
?>

<style type="text/css">
	.template-demo > .btn{
		margin-top: 0 !important;
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

					$sql2 = "SELECT * FROM company WHERE user_id = '$user_id' LIMIT 1";
					$result2 = $con->query($sql2);
					
					$company_name = 'Not Available';
					if($result2->num_rows > 0){
						$formdata2 = $result2->fetch_assoc();
						$company_name = $formdata2['company_name'];
						$founders = $formdata2['founders'];
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
		                    <li class="breadcrumb-item"><a href=".."><i class="ti-home menu-icon"></i> Home</a></li>
		                    <li class="breadcrumb-item active" aria-current="page"><span><i class="ti-id-badge menu-icon"></i> Profile</span></li>
	                  	</ol>
	                </nav>

		          	<div class="row">
			            <div class="col-12">
			              	<div class="card">
				                <div class="card-body">
				                  	<div class="row">
					                    <div class="col-lg-12">
					                      	<div class="border-bottom text-center pb-4">
					                        	<img class="img-lg rounded-circle mb-3" src="<?php if($formdata['profile_picture']){ echo '../backend/uploads/' . $formdata['profile_picture']; } else{ echo 'images/faces/no_image_available.jpg'; } ?>" alt="Profile Picture">

						                        <div class="mb-3">
						                          	<h3><?= $formdata['first_name'] . ' ' . $formdata['surname']; ?></h3>
						                        </div>

						                        <p class="w-75 mx-auto mb-3"><?= $formdata['job']; ?></p>

						                        <div class="d-flex justify-content-center">
						                          	<button type="button" class="btn btn-inverse-secondary btn-icon-text mr-3" onclick="profile_modal('<?= $formdata['user_id']; ?>')"><i class="ti-id-badge"></i> &nbsp; Update Profile</button>

						                          	<button type="button" class="btn btn-inverse-secondary btn-icon-text" onclick="company_modal('<?= $formdata['user_id']; ?>')"><i class="ti-medall"></i> &nbsp; Update Company Details</button>
						                        </div>
						                    </div>

							                <div class="modal fade" id="editProModal" tabindex="-1" role="dialog" aria-labelledby="editProModalLabel" aria-hidden="true">
							                    <div class="modal-dialog modal-lg" role="document">
							                      	<div class="modal-content">
								                        <div class="modal-header">
								                          	<h5 class="modal-title" id="editProModalLabel">Update Pofile</h5>

								                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                            	<span aria-hidden="true">&times;</span>
								                          	</button>
								                        </div>

								                        <form class="cmxform" id="profile_update_form" method="POST" action="profile_update.php" enctype="multipart/form-data">
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
												                        	<div id="datepicker-popup" style="margin-bottom: 5px;" class="input-group date datepicker">
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
											                    			<label for="upd_profile_picture">Profile Picture</label><br>
										                        			<input type="file" class="dropify" id="upd_profile_picture" name="upd_profile_picture">
											                    		</div>

											                    		<div class="form-group col">
													                        <label for="upd_cover_photo">Cover Photo</label><br>
												                        	<input type="file" class="dropify" id="upd_cover_photo" name="upd_cover_photo">
													                    </div>
											                      	</div>

											                      	<input type="hidden" name="upd_user_id" id="upd_user_id">
											                    </fieldset>
									                        </div>

									                        <div class="modal-footer">
									                          	<button type="submit" id="profile_upd_btn" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

									                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; Cancel</button>
									                        </div>
								                    	</form>
							                      	</div>
							                    </div>
							                </div>

							                <div class="modal fade" id="editComModal" tabindex="-1" role="dialog" aria-labelledby="editComModalLabel" aria-hidden="true">
							                    <div class="modal-dialog modal-lg" role="document">
							                      	<div class="modal-content">
								                        <div class="modal-header">
								                          	<h5 class="modal-title" id="editComModalLabel">Update Company Details</h5>

								                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                            	<span aria-hidden="true">&times;</span>
								                          	</button>
								                        </div>

								                        <form class="cmxform" id="company_update_form" method="POST" action="company_update.php" enctype="multipart/form-data">
									                        <div class="modal-body" style="padding-bottom: 0">
											                    <fieldset>
											                      	<div class="row">
											                      		<div class="form-group col">
													                        <label for="upd_company_name">Company Name <span style="color: red">*</span></label>
													                        <input style="margin-bottom: 5px;" id="upd_company_name" class="form-control" name="upd_company_name" type="text" placeholder="Insert...">

													                        <span id="err_upd_company_name"></span>
													                    </div>

													                    <div class="form-group col">
													                        <label for="upd_subtitle">Subtitle <span style="color: red">*</span></label>
												                        	<input style="margin-bottom: 5px;" id="upd_subtitle" class="form-control" name="upd_subtitle" type="text" placeholder="Insert...">

												                        	<span id="err_upd_subtitle"></span>
													                    </div>

													                    <div class="form-group col">
													                        <label for="confirm_password">Headquarters</label>
												                        	<div class="form-inline repeater">
														                        <div data-repeater-list="group-a">
														                          	<div data-repeater-item class="d-flex mb-2">
															                            <input type="text" class="form-control form-control-sm" name="headquarters" placeholder="Insert Headquarter...">

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
													                        <label for="upd_branch">Branch</label>
												                        	<input style="margin-bottom: 5px;" id="upd_branch" class="form-control" name="upd_branch" type="text" placeholder="Insert...">
													                    </div>

											                      		<div class="form-group col">
													                        <label for="upd_description2">Description <span style="color: red">*</span></label>
												                        	<textarea style="margin-bottom: 5px;" rows="1" id="upd_description2" class="form-control" name="upd_description2" placeholder="Insert..."></textarea>

												                        	<span id="err_upd_description2"></span>
													                    </div>

											                      		<div class="form-group col">
													                        <label for="upd_legal_form">Legal Form <span style="color: red">*</span></label>
												                        	<textarea style="margin-bottom: 5px;" rows="1" id="upd_legal_form" class="form-control" name="upd_legal_form" placeholder="Insert..."></textarea>

												                        	<span id="err_upd_legal_form"></span>
													                    </div>
											                      	</div>

																	<div class="row">
													                    <div class="form-group col">
													                        <label for="upd_capital_requirements">Capital Requirements</label>
												                        	<input id="upd_capital_requirements" class="form-control" name="upd_capital_requirements" type="text" placeholder="Insert...">
													                    </div>

													                    <div class="form-group col">
													                        <label for="upd_date_of_foundation">Date of Foundation <span style="color: red">*</span></label>
												                        	<div style="margin-bottom: 5px;" id="datepicker-popup2" class="input-group date datepicker">
														                        <input type="text" class="form-control" name="upd_date_of_foundation" id="upd_date_of_foundation" placeholder="Insert...">

														                        <span class="input-group-addon input-group-append border-left"></span>
														                    </div>

														                    <span id="err_upd_date_of_foundation"></span>
													                    </div>

													                    <div class="form-group col">
													                        <label for="upd_category">Category <span style="color: red">*</span></label>
												                        	
																			<?php 
																				$sql3 = "SELECT * FROM company_category WHERE status = 'Active'";
																			    $result3 = $con->query($sql3);
																			?>

												                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_category" id="upd_category">
												                        		<option value="">Select...</option>
												                        		<?php 
												                        			if($result3->num_rows > 0){
																						while($row = $result3->fetch_assoc()){
												                        		?>
												                        					<option value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
												                        		<?php 
												                        				}
												                        			}
												                        		?>
														                    </select>

														                    <span id="err_upd_category"></span>
													                    </div>
											                      	</div>

											                      	<div class="row">
											                    		<div class="form-group col">
											                    			<label for="upd_title_picture">Title Picture</label><br>
										                        			<input type="file" class="dropify" id="upd_title_picture" name="upd_title_picture">
											                    		</div>

											                    		<div class="form-group col">
													                        <label for="upd_logo">Company Logo</label><br>
												                        	<input type="file" class="dropify" id="upd_logo" name="upd_logo">
													                    </div>

													                    <div class="form-group col">
													                        <label for="upd_founder">Founder <span class="text-muted">(Add One or Multiple)</span></label>
												                        	<input type="file" id="upd_founder" class="form-control" name="upd_founder[]" multiple>
													                    </div>
											                      	</div>

											                      	<input type="hidden" name="upd_company_id" id="upd_company_id">
											                    </fieldset>
									                        </div>

									                        <div class="modal-footer">
									                          	<button type="submit" id="company_upd_btn" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

									                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; Cancel</button>
									                        </div>
								                    	</form>
							                      	</div>
							                    </div>
							                </div>

						                    <div class="border-bottom py-4">
						                        <p>Social Media</p>

						                        <div class="template-demo">
								                    <?php 
								                    	$social_media = explode(',', $formdata['social_media']);

								                    	foreach($social_media as $key => $value){
								                    		if(strpos($value, 'facebook') !== false){
															    echo '<a href="' . $value . '" target="_blank"><button type="button" class="btn btn-social-icon btn-facebook"><i class="ti-facebook"></i></button></a> &nbsp; ';
															} else if(strpos($value, 'youtube') !== false){
															    echo '<a href="' . $value . '" target="_blank"><button type="button" class="btn btn-social-icon btn-youtube"><i class="ti-youtube"></i></button></a> &nbsp; ';
															} else if(strpos($value, 'twitter') !== false){
															    echo '<a href="' . $value . '" target="_blank"><button type="button" class="btn btn-social-icon btn-twitter"><i class="ti-twitter"></i></button></a> &nbsp; ';
															} else if(strpos($value, 'linkedin') !== false){
															    echo '<a href="' . $value . '" target="_blank"><button type="button" class="btn btn-social-icon btn-linkedin"><i class="ti-linkedin"></i></button></a> &nbsp; ';
															} 
								                    	}
								                    ?>
								                </div>
						                    </div>

						                    <div class="py-4">
						                        <p class="clearfix">
						                          	<span class="float-left">
						                            	Status
						                          	</span>
						                          	<span class="float-right text-muted">
						                            	<a href="#" style="cursor: default; text-decoration: none; color: #ff5722;"><?= $formdata['status']; ?></a>
						                          	</span>
						                        </p>

						                        <p class="clearfix">
						                          	<span class="float-left">
						                            	Type
						                          	</span>
						                          	<span class="float-right text-muted">
						                            	<a href="#" style="cursor: default; text-decoration: none; color: #ff5722;"><?= $formdata['user_type']; ?></a>
						                          	</span>
						                        </p>

						                        <p class="clearfix">
						                          	<span class="float-left">
						                            	Email
						                          	</span>
						                          	<span class="float-right text-muted">
						                            	<a href="#" style="cursor: default; text-decoration: none; color: #ff5722;"><?= $formdata['email']; ?></a>
						                          	</span>
						                        </p>

						                        <p class="clearfix">
						                          	<span class="float-left">
						                            	Joining Date
						                          	</span>
						                          	<span class="float-right text-muted">
						                            	<a href="#" style="cursor: default; text-decoration: none; color: #ff5722;"><?= date('Y-m-d', strtotime($formdata['creation_datetime'])); ?></a>
						                          	</span>
						                        </p>

						                        <p class="clearfix">
						                          	<span class="float-left">
						                            	Cover Photo
						                          	</span>
						                          	<span class="float-right text-muted">
					                            		<img class="img-sm rounded-circle" src="<?php if($row['cover_photo']){ echo '../backend/uploads/' . $row['cover_photo']; } else{ echo 'images/faces/no_image_available.jpg'; } ?>" alt="Cover Photo">
						                          	</span>
						                        </p>

						                        <p class="clearfix">
						                          	<span class="float-left">
						                            	Company Name
						                          	</span>
						                          	<span class="float-right text-muted">
						                            	<a href="#" style="cursor: default; text-decoration: none; color: #ff5722;"><?= $formdata2['company_name']; ?></a>
						                          	</span>
						                        </p>

						                        <p class="clearfix">
						                          	<span class="float-left">
						                            	Founders
						                          	</span>
						                          	<span class="float-right text-muted">
						                          		<?php 
						                          			$founders_arr = explode(',', $founders);
						                          			foreach($founders_arr as $key => $value){
						                          		?>
							                            		<img class="img-sm rounded-circle" src="<?php if($value){ echo '../backend/uploads/' . $value; } else{ echo 'images/faces/no_image_available.jpg'; } ?>" alt="Founder"> &nbsp; 
							                           	<?php 
							                           		}
							                           	?>
						                          	</span>
						                        </p>
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

	function profile_modal(user_id){
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

            	$('#editProModal').modal('show');
            }
        });
    }

    function company_modal(user_id){
    	$.ajax({
            url: "fetch_company_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	user_id: user_id
            },
            success: function (response) {
            	$('#upd_company_id').val(response.company_id);
            	$('#upd_company_name').val(response.company_name);
            	$('#upd_subtitle').val(response.subtitle);
            	$('#upd_branch').val(response.branch);
            	$('#upd_description2').val(response.description);
            	$('#upd_legal_form').val(response.legal_form);
            	$('#upd_capital_requirements').val(response.capital_requirements);
            	$('#upd_date_of_foundation').val(response.date_of_foundation);
            	$('#upd_category').val(response.category_id);
            	$('#upd_company_status').val(response.status);
            	$('#upd_user').val(response.user_id);

            	$('#editComModal').modal('show');
            }
        });
    }

    $("#profile_upd_btn").on('click', function(e){
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

        $('#profile_update_form').submit();
    });

	$("#company_upd_btn").on('click', function(e){
        var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;
        var foundation_date_regex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

        var upd_company_name = $('#upd_company_name').val().trim();
        $('#upd_company_name').val(upd_company_name);
        var upd_subtitle = $('#upd_subtitle').val().trim();
        $('#upd_subtitle').val(upd_subtitle);
        var upd_description = $('#upd_description2').val().trim();
        $('#upd_description2').val(upd_description);
        var upd_legal_form = $('#upd_legal_form').val().trim();
        $('#upd_legal_form').val(upd_legal_form);
        var upd_date_of_foundation = $('#upd_date_of_foundation').val().trim();
        $('#upd_date_of_foundation').val(upd_date_of_foundation);
        var category = $('#upd_category').val().trim();

        if(upd_company_name == null || upd_company_name == ""){
            $("#err_upd_company_name").html('Please Insert Company Name.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_company_name").html('');
        }

        if (!upd_company_name.match(name_regex)){
            $('#err_upd_company_name').html('Please Insert a Valid Company Name.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_company_name").html('');
        }

        if (upd_company_name.length < 3){
            $('#err_upd_company_name').html('Company Name Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_upd_company_name").html('');
        }

        if(upd_subtitle == null || upd_subtitle == ""){
            $("#err_upd_subtitle").html('Please Insert Subtitle.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_subtitle").html('');
        }

        if (!upd_subtitle.match(name_regex)){
            $('#err_upd_subtitle').html('Please Insert a Valid Title.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_subtitle").html('');
        }

        if (upd_subtitle.length < 3){
            $('#err_upd_subtitle').html('Subtitle Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_upd_subtitle").html('');
        }

        if(upd_description == null || upd_description == ""){
            $("#err_upd_description").html('Please Insert Description.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_description").html('');
        }

        if (!upd_description.match(name_regex)){
            $('#err_upd_description').html('Please Insert a Valid Description.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_description").html('');
        }

        if (upd_description.length < 3){
            $('#err_upd_description').html('Description Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_upd_description").html('');
        }

        if(upd_legal_form == null || upd_legal_form == ""){
            $("#err_upd_legal_form").html('Please Insert Legal Form.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_legal_form").html('');
        }

        if (!upd_legal_form.match(name_regex)){
            $('#err_upd_legal_form').html('Please Insert a Valid Legal Form.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_legal_form").html('');
        }

        if (upd_legal_form.length < 3){
            $('#err_upd_legal_form').html('Legal Form Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_upd_legal_form").html('');
        }

        if(upd_date_of_foundation == null || upd_date_of_foundation == ""){
            $("#err_upd_date_of_foundation").html('Please Insert Date of Foundation.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_date_of_foundation").html('');
        }

        if (!upd_date_of_foundation.match(foundation_date_regex) ){
            $('#err_upd_date_of_foundation').html('Please Insert a Valid Date.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_date_of_foundation").html('');
        }

        if(upd_category == null || upd_category == ""){
            $("#err_upd_category").html('Please Select Category.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_category").html('');
        }

        if($('#upd_title_picture').val()){
            var t_ext = $('#upd_title_picture').val().split('.').pop().toLowerCase();
            var t_size = ($('#upd_title_picture')[0].files[0].size);

            if(($.inArray(t_ext, ['png', 'jpg', 'jpeg']) == -1) || (t_size > 2097152)){
                if($.inArray(t_ext, ['png', 'jpg', 'jpeg']) == -1){
                    var message = 'Title picture format is invalid! Must be in .png, .jpg or .jpeg format.';
                    showInvalidImageToast(message);
                } else{
                    var message = 'Title picture size limit exceeds! Size must be below 2 MB.';
                    showInvalidImageToast(message);
                }

                return false;
            } 
        }

        if($('#upd_logo').val()){
            var l_ext = $('#upd_logo').val().split('.').pop().toLowerCase();
            var l_size = ($('#upd_logo')[0].files[0].size);

            if(($.inArray(l_ext, ['png', 'jpg', 'jpeg']) == -1) || (l_size > 2097152)){
                if($.inArray(l_ext, ['png', 'jpg', 'jpeg']) == -1){
                    var message = 'Logo format is invalid! Must be in .png, .jpg or .jpeg format.';
                    showInvalidImageToast(message);
                } else{
                    var message = 'Logo size limit exceeds! Size must be below 2 MB.';
                    showInvalidImageToast(message);
                }

                return false;
            } 
        }

        var files = $('#upd_founder').prop("files");
        
        $.map(files, function(val){ 
        	var f_ext = val.name.split('.').pop().toLowerCase();
            var f_size = val.size;

        	if(($.inArray(f_ext, ['png', 'jpg', 'jpeg']) == -1) || (f_size > 2097152)){
                if($.inArray(f_ext, ['png', 'jpg', 'jpeg']) == -1){
                    var message = 'Founder image format is invalid! Must be in .png, .jpg or .jpeg format.';
                    showInvalidImageToast(message);
                } else{
                    var message = 'Founder image size limit exceeds! Size must be below 2 MB.';
                    showInvalidImageToast(message);
                }

                return false;
            }
        });

        $('#company_update_form').submit();
    });
</script>