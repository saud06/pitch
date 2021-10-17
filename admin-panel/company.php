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
		                    <li class="breadcrumb-item active" aria-current="page"><span><i class="ti-medall menu-icon"></i> Company</span></li>
	                  	</ol>
	                </nav>

		          	<div class="card">
			            <div class="card-body">
			              	<h1 style="color: #ff5722" class="display-4">
			              		Company List &nbsp;
			              		<button type="button" class="btn btn-inverse-secondary btn-icon-text" title="Add Company Category" data-toggle="modal" data-target="#addComModal"><i class="ti-plus"></i>&nbsp; Add Company</button> &nbsp;

			              		<button type="button" class="btn btn-inverse-secondary btn-icon-text" title="Add Company Category" data-toggle="modal" data-target="#addCatModal"><i class="ti-plus"></i>&nbsp; Add Category</button>
			              	</h1>

			              	<div class="modal fade" id="addComModal" tabindex="-1" role="dialog" aria-labelledby="addComModalLabel" aria-hidden="true">
			                    <div class="modal-dialog modal-lg" role="document">
			                      	<div class="modal-content">
				                        <div class="modal-header">
				                          	<h5 class="modal-title" id="addComModalLabel">Add Company</h5>

				                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            	<span aria-hidden="true">&times;</span>
				                          	</button>
				                        </div>

				                        <form class="cmxform" id="company_add_form" method="POST" action="company_add.php" enctype="multipart/form-data">
					                        <div class="modal-body" style="padding-bottom: 0">
							                    <fieldset>
							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="company_name">Company Name <span style="color: red">*</span></label>
									                        <input style="margin-bottom: 5px;" id="company_name" class="form-control" name="company_name" type="text" placeholder="Insert...">

									                        <span id="err_company_name"></span>
									                    </div>

									                    <div class="form-group col">
									                        <label for="subtitle">Subtitle <span style="color: red">*</span></label>
								                        	<input style="margin-bottom: 5px;" id="subtitle" class="form-control" name="subtitle" type="text" placeholder="Insert...">

								                        	<span id="err_subtitle"></span>
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
									                        <label for="branch">Branch</label>
								                        	<input style="margin-bottom: 5px;" id="branch" class="form-control" name="branch" type="text" placeholder="Insert...">

								                        	<span id="err_subtitle"></span>
									                    </div>

							                      		<div class="form-group col">
									                        <label for="description">Description <span style="color: red">*</span></label>
								                        	<textarea style="margin-bottom: 5px;" rows="1" id="description" class="form-control" name="description" placeholder="Insert..."></textarea>

								                        	<span id="err_description"></span>
									                    </div>

							                      		<div class="form-group col">
									                        <label for="legal_form">Legal Form <span style="color: red">*</span></label>
								                        	<textarea style="margin-bottom: 5px;" rows="1" id="legal_form" class="form-control" name="legal_form" placeholder="Insert..."></textarea>

								                        	<span id="err_legal_form"></span>
									                    </div>
							                      	</div>

													<div class="row">
									                    <div class="form-group col">
									                        <label for="capital_requirements">Capital Requirements</label>
								                        	<input id="capital_requirements" class="form-control" name="capital_requirements" type="text" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="personal_interest">Date of Foundation <span style="color: red">*</span></label>
								                        	<div style="margin-bottom: 5px;" id="datepicker-popup" class="input-group date datepicker">
										                        <input type="text" class="form-control" name="date_of_foundation" id="date_of_foundation" placeholder="Insert...">

										                        <span class="input-group-addon input-group-append border-left"></span>
										                    </div>

										                    <span id="err_date_of_foundation"></span>
									                    </div>

									                    <div class="form-group col">
									                        <label for="category">Category <span style="color: red">*</span></label>
								                        	
															<?php 
																$sql = "SELECT * FROM company_category WHERE status = 'Active'";
															    $result = $con->query($sql);
															?>

								                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="category" id="category">
								                        		<option value="">Select...</option>
								                        		<?php 
								                        			if($result->num_rows > 0){
																		while($row = $result->fetch_assoc()){
								                        		?>
								                        					<option value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
								                        		<?php 
								                        				}
								                        			}
								                        		?>
										                    </select>

										                    <span id="err_category"></span>
									                    </div>

							                      		<div class="form-group col">
									                        <label for="status">Status <span style="color: red">*</span></label>
								                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="company_status" id="company_status">
								                        		<option value="">Select...</option>
										                      	<option value="Active">Active</option>
										                      	<option value="Pending">Pending</option>
										                      	<option value="Inactive">Inactive</option>
										                    </select>

										                    <span id="err_company_status"></span>
									                    </div>
							                      	</div>

							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="user">User <span style="color: red">*</span></label>
								                        	
								                        	<?php 
																$sql2 = "SELECT * FROM user WHERE user_id != 1";
															    $result2 = $con->query($sql2);
															?>

								                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="user" id="user">
								                        		<option value="">Select...</option>
								                        		<?php 
								                        			if($result2->num_rows > 0){
																		while($row2 = $result2->fetch_assoc()){
								                        		?>
								                        					<option value="<?= $row2['user_id']; ?>"><?= $row2['first_name'] . ' ' . $row2['surname']; ?></option>
								                        		<?php 
								                        				}
								                        			}
								                        		?>
										                    </select>

										                    <span id="err_user"></span>
									                    </div>

									                    <div class="form-group col">
									                    	<div class="row">
									                    		<div class="form-group col">
									                    			<label for="title_picture">Title Picture</label><br>
								                        			<input type="file" class="dropify" id="title_picture" name="title_picture">
									                    		</div>

									                    		<div class="form-group col">
											                        <label for="logo">Company Logo</label><br>
										                        	<input type="file" class="dropify" id="logo" name="logo">
											                    </div>
									                    	</div>
									                    </div>

									                    <div class="form-group col">
									                        <label for="status">Founder <span class="text-muted">(Add One or Multiple)</span></label>
								                        	<input type="file" id="founder" class="form-control" name="founder[]" multiple>
									                    </div>
							                      	</div>
							                    </fieldset>
					                        </div>

					                        <div class="modal-footer">
					                          	<button type="submit" id="company_add_btn" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

					                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; Cancel</button>
					                        </div>
				                    	</form>
			                      	</div>
			                    </div>
			                </div>

			              	<div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="addCatModalLabel" aria-hidden="true">
			                    <div class="modal-dialog" role="document">
			                      	<div class="modal-content">
				                        <div class="modal-header">
				                          	<h5 class="modal-title" id="addCatModalLabel">Add Category</h5>

				                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            	<span aria-hidden="true">&times;</span>
				                          	</button>
				                        </div>

				                        <form class="cmxform" id="company_category_add_form" method="POST" action="company_category_add.php" enctype="multipart/form-data">
					                        <div class="modal-body" style="padding-bottom: 0">
							                    <fieldset>
							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="company_category_name">Category Name <span style="color: red">*</span></label>
									                        <input style="margin-bottom: 5px" id="company_category_name" class="form-control" name="company_category_name" type="text" placeholder="Insert...">

									                        <span id="err_company_category_name"></span>
									                    </div>
									                </div>
													
													<div class="row">
									                    <div class="form-group col">
									                        <label for="company_category_status">Status <span style="color: red">*</span></label>
								                        	<select style="margin-bottom: 5px" class="form-control form-control-lg" name="company_category_status" id="company_category_status">
								                        		<option value="">Select...</option>
										                      	<option value="Active">Active</option>
										                      	<option value="Inactive">Inactive</option>
										                    </select>

										                    <span id="err_company_category_status"></span>
									                    </div>
							                      	</div>
							                    </fieldset>
					                        </div>

					                        <div class="modal-footer">
					                          	<button type="submit" id="company_category_add_btn" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

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
						                            <th width="5%">Logo</th>
						                            <th>User</th>
						                            <th>Company Name</th>
						                            <th>Date of Creation</th>
						                            <th>Category</th>
						                            <th>Status</th>
						                            <th>Approval</th>
						                            <th>Actions</th>
						                        </tr>
					                      	</thead>

					                      	<tbody>
					                      		<?php 
					                      			$sql = "SELECT * FROM company ORDER BY company_id DESC";
											        $result = $con->query($sql);

											        if($result->num_rows > 0){
											        	$i = 0;

											            while($row = $result->fetch_assoc()){
											            	$company_id = $row['company_id'];
											            	$company_name = $row['company_name'];
											            	$user_id = $row['user_id'];
											            	$category_id = $row['category_id'];
											            	$status = $row['status'];

											            	$sql2 = "SELECT * FROM user WHERE user_id = '$user_id' LIMIT 1";
											        		$result2 = $con->query($sql2);
											        		$row2 = $result2->fetch_assoc();

											        		$sql3 = "SELECT * FROM company_category WHERE category_id = '$category_id' LIMIT 1";
											        		$result3 = $con->query($sql3);
											        		$row3 = $result3->fetch_assoc();
					                      		?>

									                        <tr>
									                            <td><img class="img-sm rounded-circle" src="<?php if($row['logo']){ echo '../backend/uploads/' . $row['logo']; } else{ echo 'images/faces/no_image_available.jpg'; } ?>" alt="profile"></td>
									                            <td><?= $row2['first_name'] . ' ' . $row2['surname']; ?></td>
									                            <td><?= $company_name; ?></td>
									                            <td><?= $row['date_of_foundation']; ?></td>
									                            <td><?= $row3['category_name']; ?></td>
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
											                            	<input type="checkbox" id="approval<?= $i; ?>" class="form-check-input" onchange="approval('<?= $company_id; ?>', '<?= $company_name; ?>', '<?= $i; ?>')" <?php if($status == 'Active'){ echo 'checked'; } ?>>
											                            </label>
											                        </div>
									                            </td>
									                            <td>
									                            	<button type="button" class="btn btn-inverse-success btn-icon" title="View" onclick="view_modal('<?= $company_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;
									                              	
									                              	<button type="button" class="btn btn-inverse-info btn-icon" title="Edit" onclick="edit_modal('<?= $company_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;
									                              	
									                              	<button type="button" class="btn btn-inverse-danger btn-icon" title="Delete" onclick="delete_modal('<?= $company_id; ?>')"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
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
							                          	<h5 class="modal-title" id="viewModalLabel">View Company</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>
							                        
							                        <div class="modal-body" style="padding-bottom: 0">
									                    <fieldset>
									                      	<div class="row">
									                      		<div class="form-group col">
											                        <label for="view_company_name">Company Name</label>
											                        <input id="view_company_name" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_subtitle">Subtitle</label>
										                        	<input id="view_subtitle" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_headquarters">Headquarters</label>
										                        	<div id="view_headquarters" class="template-demo">
													                </div>
													            </div>
									                      	</div>

									                      	<div class="row">
																<div class="form-group col">
											                        <label for="view_branch">Branch</label>
										                        	<input id="view_branch" class="form-control p-event" type="text">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_description">Description</label>
										                        	<textarea rows="1" id="view_description" class="form-control p-event"></textarea>
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_legal_form">Legal Form</label>
										                        	<textarea rows="1" id="view_legal_form" class="form-control p-event"></textarea>
											                    </div>
									                      	</div>

															<div class="row">
											                    <div class="form-group col">
											                        <label for="view_capital_requirements">Capital Requirements</label>
										                        	<input id="view_capital_requirements" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_date_of_foundation">Date of Foundation</label>
										                        	<input id="view_date_of_foundation" class="form-control p-event" type="text">
											                    </div>

											                    <div class="form-group col">
											                        <label for="view_category">Category</label>
										                        	<input id="view_category" class="form-control p-event" type="text">
											                    </div>

									                      		<div class="form-group col">
											                        <label for="view_status">Status</label>
										                        	<input id="view_status" class="form-control p-event" type="text">
											                    </div>
									                      	</div>

									                      	<div class="row">
									                    		<div class="form-group col">
											                    	<div class="row">
											                    		<div class="form-group col">
													                        <label for="view_user">User</label>
												                        	<input id="view_user" class="form-control p-event" type="text">
													                    </div>

											                    		<div class="form-group col">
											                    			<label for="view_logo">Logo</label><br>
										                        			<img id="view_logo" src="images/faces/no_image_available.jpg" class="img-lg rounded" alt="Logo"/>
											                    		</div>

											                    		<div class="form-group col">
													                        <label for="title_picture">Title Picture</label><br>
												                        	<img id="view_title_picture" src="images/faces/no_image_available.jpg" class="img-lg rounded" alt="Title Picture"/>
													                    </div>

													                    <div class="form-group col">
													                        <label for="view_founders">Founders</label><br>
												                        	<div id="view_founders"></div>
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
							                          	<h5 class="modal-title" id="editModalLabel">Edit Company</h5>

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

											                        	<span id="err_upd_subtitle"></span>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="upd_description">Description <span style="color: red">*</span></label>
											                        	<textarea style="margin-bottom: 5px;" rows="1" id="upd_description" class="form-control" name="upd_description" placeholder="Insert..."></textarea>

											                        	<span id="err_upd_description"></span>
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
																			$sql = "SELECT * FROM company_category WHERE status = 'Active'";
																		    $result = $con->query($sql);
																		?>

											                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_category" id="upd_category">
											                        		<option value="">Select...</option>
											                        		<?php 
											                        			if($result->num_rows > 0){
																					while($row = $result->fetch_assoc()){
											                        		?>
											                        					<option value="<?= $row['category_id']; ?>"><?= $row['category_name']; ?></option>
											                        		<?php 
											                        				}
											                        			}
											                        		?>
													                    </select>

													                    <span id="err_upd_category"></span>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="upd_status">Status <span style="color: red">*</span></label>
											                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_company_status" id="upd_company_status">
											                        		<option value="">Select...</option>
													                      	<option value="Active">Active</option>
													                      	<option value="Pending">Pending</option>
													                      	<option value="Inactive">Inactive</option>
													                    </select>

													                    <span id="err_upd_company_status"></span>
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="upd_user">User <span style="color: red">*</span></label>
											                        	
											                        	<?php 
																			$sql2 = "SELECT * FROM user WHERE user_id != 1";
																		    $result2 = $con->query($sql2);
																		?>

											                        	<select style="margin-bottom: 5px;" class="form-control form-control-lg" name="upd_user" id="upd_user">
											                        		<option value="">Select...</option>
											                        		<?php 
											                        			if($result2->num_rows > 0){
																					while($row2 = $result2->fetch_assoc()){
											                        		?>
											                        					<option value="<?= $row2['user_id']; ?>"><?= $row2['first_name'] . ' ' . $row2['surname']; ?></option>
											                        		<?php 
											                        				}
											                        			}
											                        		?>
													                    </select>

													                    <span id="err_upd_user"></span>
												                    </div>

												                    <div class="form-group col">
												                    	<div class="row">
												                    		<div class="form-group col">
												                    			<label for="upd_title_picture">Title Picture</label><br>
											                        			<input type="file" class="dropify" id="upd_title_picture" name="upd_title_picture">
												                    		</div>

												                    		<div class="form-group col">
														                        <label for="upd_logo">Company Logo</label><br>
													                        	<input type="file" class="dropify" id="upd_logo" name="upd_logo">
														                    </div>
												                    	</div>
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

						                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
						                    <div class="modal-dialog" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="deleteModalLabel">Delete Company</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

						                        	<form class="cmxform" id="company_delete_form" method="POST" action="company_delete.php" enctype="multipart/form-data">
							                        	<div class="modal-body">
								                          	<p>Do You Really Want to Delete This Company?</p>

								                          	<input type="hidden" name="dlt_company_id" id="dlt_company_id">
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" id="company_dlt_btn" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

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

	function approval(company_id, company_name, counter){
		var status = '';
    	if($('#approval' + counter).is(":checked") == true){
    		status = 'Active';
    	} else{
    		status = 'Inactive';
    	}

        $.ajax({
            url: "company_status_update.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	company_id: company_id,
                status: status
            },
            success: function (response) {
            	showUpdateCompanyStatusToast(company_name);

                if(response == 'Active'){
                	$('#badge' + counter).removeClass().addClass('badge badge-success').html('Active');
                } else{
                	$('#badge' + counter).removeClass().addClass('badge badge-danger').html('Inactive');
                }
            }
        });
    }

    function view_modal(company_id){
    	$.ajax({
            url: "fetch_company_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	company_id: company_id
            },
            success: function (response) {
            	$('#view_company_name').val(response.company_name);
            	$('#view_subtitle').val(response.subtitle);

            	var headquarters_arr = response.headquarters.split(',');
            	var headquarters = '';
            	for(i=0; i<headquarters_arr.length; i++){
            		if(headquarters_arr[i]) headquarters += (i+1) + '. ' + headquarters_arr[i] + '<br>';
            	}
            	$('#view_headquarters').html(headquarters);

            	$('#view_branch').val(response.branch);
            	$('#view_description').val(response.description);
            	$('#view_legal_form').val(response.legal_form);
            	$('#view_capital_requirements').val(response.capital_requirements);
            	$('#view_date_of_foundation').val(response.date_of_foundation);
            	$('#view_category').val(response.category_name);
            	$('#view_status').val(response.status);
            	$('#view_user').val(response.first_name + ' ' + response.surname);
            	if(response.logo) $('#view_logo').attr('src', '../backend/uploads/' + response.logo);
            	if(response.title_picture) $('#view_title_picture').attr('src', '../backend/uploads/' + response.title_picture);

            	var founders_arr = response.founders.split(',');
            	var founders = '';
            	for(j=0; j<founders_arr.length; j++){
            		var src = '';
            		if(founders_arr[j]){
            			src = '../backend/uploads/' + founders_arr[j];
            		} else{
            			src = 'images/faces/no_image_available.jpg';
            		}

            		if(founders_arr[j]) founders += '<img src="' + src + '" class="img-lg rounded" alt="Founder Picture"/>&nbsp;';
            	}
            	$('#view_founders').html(founders);

            	$('#viewModal').modal('show');
            }
        });
    }

    function edit_modal(company_id){
    	$.ajax({
            url: "fetch_company_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	company_id: company_id
            },
            success: function (response) {
            	$('#upd_company_id').val(response.company_id);
            	$('#upd_company_name').val(response.company_name);
            	$('#upd_subtitle').val(response.subtitle);
            	$('#upd_branch').val(response.branch);
            	$('#upd_description').val(response.description);
            	$('#upd_legal_form').val(response.legal_form);
            	$('#upd_capital_requirements').val(response.capital_requirements);
            	$('#upd_date_of_foundation').val(response.date_of_foundation);
            	$('#upd_category').val(response.category_id);
            	$('#upd_company_status').val(response.status);
            	$('#upd_user').val(response.user_id);

            	$('#editModal').modal('show');
            }
        });
    }

    function delete_modal(company_id){
    	$.ajax({
            url: "fetch_company_data.php",
            type: "POST",
            dataType: "JSON",
            data : {
            	company_id: company_id
            },
            success: function (response) {
            	$('#dlt_company_id').val(response.company_id);

            	$('#deleteModal').modal('show');
            }
        });
    }

	$("#company_category_add_btn").on('click', function(e){
        var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;

        var company_category_name = $('#company_category_name').val().trim();
        $('#company_category_name').val(company_category_name);
        var company_category_status = $('#company_category_status').val().trim();

        if(company_category_name == null || company_category_name == ""){
            $("#err_company_category_name").html('Please Insert Category Name.').css('color', 'red');
            return false;
        } else{
            $("#err_company_category_name").html('');
        }

        if (!company_category_name.match(name_regex)){
            $('#err_company_category_name').html('Please Insert a Valid Category Name.').css('color', 'red');
            return false;
        } else{
            $("#err_company_category_name").html('');
        }

        if (company_category_name.length < 3){
            $('#err_company_category_name').html('Category Name Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_company_category_name").html('');
        }

        if(company_category_status == null || company_category_status == ""){
            $("#err_company_category_status").html('Please Select Status.').css('color', 'red');
            return false;
        } else{
            $("#err_company_category_status").html('');
        }

        $('#company_category_add_form').submit();
    });

    $("#company_add_btn").on('click', function(e){
        var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;
        var foundation_date_regex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

        var company_name = $('#company_name').val().trim();
        $('#company_name').val(company_name);
        var subtitle = $('#subtitle').val().trim();
        $('#subtitle').val(subtitle);
        var description = $('#description').val().trim();
        $('#description').val(description);
        var legal_form = $('#legal_form').val().trim();
        $('#legal_form').val(legal_form);
        var date_of_foundation = $('#date_of_foundation').val().trim();
        $('#date_of_foundation').val(date_of_foundation);
        var category = $('#category').val().trim();
        var company_status = $('#company_status').val().trim();
        var user = $('#user').val().trim();

        if(company_name == null || company_name == ""){
            $("#err_company_name").html('Please Insert Company Name.').css('color', 'red');
            return false;
        } else{
            $("#err_company_name").html('');
        }

        if (!company_name.match(name_regex)){
            $('#err_company_name').html('Please Insert a Valid Company Name.').css('color', 'red');
            return false;
        } else{
            $("#err_company_name").html('');
        }

        if (company_name.length < 3){
            $('#err_company_name').html('Company Name Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_company_name").html('');
        }

        if(subtitle == null || subtitle == ""){
            $("#err_subtitle").html('Please Insert Subtitle.').css('color', 'red');
            return false;
        } else{
            $("#err_subtitle").html('');
        }

        if (!subtitle.match(name_regex)){
            $('#err_subtitle').html('Please Insert a Valid Title.').css('color', 'red');
            return false;
        } else{
            $("#err_subtitle").html('');
        }

        if (subtitle.length < 3){
            $('#err_subtitle').html('Subtitle Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_subtitle").html('');
        }

        if(description == null || description == ""){
            $("#err_description").html('Please Insert Description.').css('color', 'red');
            return false;
        } else{
            $("#err_description").html('');
        }

        if (!description.match(name_regex)){
            $('#err_description').html('Please Insert a Valid Description.').css('color', 'red');
            return false;
        } else{
            $("#err_description").html('');
        }

        if (description.length < 3){
            $('#err_description').html('Description Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_description").html('');
        }

        if(legal_form == null || legal_form == ""){
            $("#err_legal_form").html('Please Insert Legal Form.').css('color', 'red');
            return false;
        } else{
            $("#err_legal_form").html('');
        }

        if (!legal_form.match(name_regex)){
            $('#err_legal_form').html('Please Insert a Valid Legal Form.').css('color', 'red');
            return false;
        } else{
            $("#err_legal_form").html('');
        }

        if (legal_form.length < 3){
            $('#err_legal_form').html('Legal Form Must Contain At Least 3 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_legal_form").html('');
        }

        if(date_of_foundation == null || date_of_foundation == ""){
            $("#err_date_of_foundation").html('Please Insert Date of Foundation.').css('color', 'red');
            return false;
        } else{
            $("#err_date_of_foundation").html('');
        }

        if (!date_of_foundation.match(foundation_date_regex) ){
            $('#err_date_of_foundation').html('Please Insert a Valid Date.').css('color', 'red');
            return false;
        } else{
            $("#err_date_of_foundation").html('');
        }

        if(category == null || category == ""){
            $("#err_category").html('Please Select Category.').css('color', 'red');
            return false;
        } else{
            $("#err_category").html('');
        }

        if(company_status == null || company_status == ""){
            $("#err_company_status").html('Please Select Status.').css('color', 'red');
            return false;
        } else{
            $("#err_company_status").html('');
        }

        if(user == null || user == ""){
            $("#err_user").html('Please Select User.').css('color', 'red');
            return false;
        } else{
            $("#err_user").html('');
        }

        if($('#title_picture').val()){
            var t_ext = $('#title_picture').val().split('.').pop().toLowerCase();
            var t_size = ($('#title_picture')[0].files[0].size);

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

        if($('#logo').val()){
            var l_ext = $('#logo').val().split('.').pop().toLowerCase();
            var l_size = ($('#logo')[0].files[0].size);

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

        var files = $('#founder').prop("files");
        
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

        $('#company_add_form').submit();
    });

	$("#company_upd_btn").on('click', function(e){
        var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;
        var foundation_date_regex = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

        var upd_company_name = $('#upd_company_name').val().trim();
        $('#upd_company_name').val(upd_company_name);
        var subtitle = $('#subtitle').val().trim();
        $('#subtitle').val(subtitle);
        var description = $('#description').val().trim();
        $('#description').val(description);
        var legal_form = $('#legal_form').val().trim();
        $('#legal_form').val(legal_form);
        var date_of_foundation = $('#date_of_foundation').val().trim();
        $('#date_of_foundation').val(date_of_foundation);
        var category = $('#category').val().trim();
        var company_status = $('#company_status').val().trim();
        var user = $('#user').val().trim();

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

        if(upd_company_status == null || upd_company_status == ""){
            $("#err_upd_company_status").html('Please Select Status.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_company_status").html('');
        }

        if(upd_user == null || upd_user == ""){
            $("#err_upd_user").html('Please Select User.').css('color', 'red');
            return false;
        } else{
            $("#err_upd_user").html('');
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