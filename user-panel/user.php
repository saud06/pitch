<?php include('includes/header.php') ?>

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
			              		<button type="button" class="btn btn-inverse-secondary btn-icon-text" title="Add User" data-toggle="modal" data-target="#addModal"><i class="ti-plus"></i>&nbsp; Add User</button>
			              	</h1>

							<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
			                    <div class="modal-dialog modal-lg" role="document">
			                      	<div class="modal-content">
				                        <div class="modal-header">
				                          	<h5 class="modal-title" id="addModalLabel">Add User</h5>

				                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            	<span aria-hidden="true">&times;</span>
				                          	</button>
				                        </div>

				                        <form class="cmxform" id="signupForm" method="get" action="#">
					                        <div class="modal-body" style="padding-bottom: 0">
							                    <fieldset>
							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="first_name">Firstname</label>
									                        <input id="first_name" class="form-control" name="first_name" type="text" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="surname">Surname</label>
								                        	<input id="surname" class="form-control" name="surname" type="text" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="confirm_password">Social Media</label>
								                        	<div class="form-inline repeater">
										                        <div data-repeater-list="group-a">
										                          	<div data-repeater-item class="d-flex mb-2">
											                            <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup1" placeholder="Add URL">

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
									                        <label for="job">Job</label>
								                        	<input id="job" class="form-control" name="job" type="text" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="email">Email</label>
								                        	<input id="email" class="form-control" name="email" type="email" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="phone">Phone</label>
								                        	<input id="text" class="form-control" name="phone" type="phone" placeholder="Insert...">
									                    </div>
							                      	</div>

							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="description">Description</label>
								                        	<textarea rows="1" id="description" class="form-control" name="description" placeholder="Insert..."></textarea>
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
									                        <label for="expertise_area">Expertise Area</label>
								                        	<input id="expertise_area" class="form-control" name="expertise_area" type="text" placeholder="Insert...">
									                    </div>

									                    <div class="form-group col">
									                        <label for="personal_interest">Personal Interest</label>
								                        	<input id="text" class="form-control" name="personal_interest" type="personal_interest" placeholder="Insert...">
									                    </div>
							                      	</div>

							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="type">Type</label>
								                        	<select class="form-control form-control-lg" name="type" id="type">
								                        		<option>Select...</option>
										                      	<option>1</option>
										                      	<option>2</option>
										                      	<option>3</option>
										                      	<option>4</option>
										                      	<option>5</option>
										                    </select>
									                    </div>

							                      		<div class="form-group col">
									                        <label for="status">Status</label>
								                        	<select class="form-control form-control-lg" name="status" id="status">
								                        		<option>Select...</option>
										                      	<option>1</option>
										                      	<option>2</option>
										                      	<option>3</option>
										                      	<option>4</option>
										                      	<option>5</option>
										                    </select>
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
					                          	<button type="submit" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

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
						                            <th>Phone</th>
						                            <th>Company</th>
						                            <th>Type</th>
						                            <th>Status</th>
						                            <th>Approval</th>
						                            <th>Actions</th>
						                        </tr>
					                      	</thead>

					                      	<tbody>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-success">Active</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input" checked>
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                            	<button type="button" class="btn btn-inverse-success btn-icon" title="View" data-toggle="modal" data-target="#viewModal"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;
						                              	
						                              	<button type="button" class="btn btn-inverse-info btn-icon" title="Edit" data-toggle="modal" data-target="#editModal"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;
						                              	
						                              	<button type="button" class="btn btn-inverse-danger btn-icon" title="Delete" data-toggle="modal" data-target="#deleteModal"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" title="Company" data-toggle="modal" data-target="#companyModal"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face6.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-warning">Pending</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input">
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face7.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-success">Active</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input" checked>
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face8.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-success">Active</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input">
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face9.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-danger">Inactive</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input" checked>
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-warning">Pending</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input">
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face6.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-success">Active</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input">
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face9.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-danger">Inactive</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input">
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face8.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-success">Active</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input">
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face4.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>john@gmail.com</td>
						                            <td>(02) 44335543</td>
						                            <td>Microsoft Corporation</td>
						                            <td>Standard</td>
						                            <td>
						                              	<label class="badge badge-warning">Pending</label>
						                            </td>
						                            <td>
						                            	<div class="form-check form-check-success">
								                            <label class="form-check-label">
								                            	<input type="checkbox" class="form-check-input">
								                            </label>
								                        </div>
						                            </td>
						                            <td>
						                              	<button type="button" class="btn btn-inverse-success btn-icon" data-toggle="tooltip" data-placement="bottom" title="View"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-info btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>&nbsp;

						                              	<button type="button" class="btn btn-inverse-primary btn-icon" data-toggle="tooltip" data-placement="bottom" title="Company"><i style="margin-left: -3px; margin-right: 0" class="ti-medall"></i></button>
						                            </td>
						                        </tr>
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

							                        <form class="cmxform" id="signupForm" method="get" action="#">
								                        <div class="modal-body" style="padding-bottom: 0">
										                    <fieldset>
										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="first_name">Firstname</label>
												                        <input id="first_name" class="form-control p-event" name="first_name" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="surname">Surname</label>
											                        	<input id="surname" class="form-control p-event" name="surname" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="confirm_password">Social Media</label>
											                        	<div class="template-demo">
														                    <button type="button" class="btn btn-social-icon btn-facebook"><i class="ti-facebook"></i></button>

														                    <button type="button" class="btn btn-social-icon btn-youtube"><i class="ti-youtube"></i></button>                                        
														                    <button type="button" class="btn btn-social-icon btn-twitter"><i class="ti-twitter-alt"></i></button>

														                    <button type="button" class="btn btn-social-icon btn-dribbble"><i class="ti-dribbble"></i></button>

														                    <button type="button" class="btn btn-social-icon btn-linkedin"><i class="ti-linkedin"></i></button>

														                    <button type="button" class="btn btn-social-icon btn-google"><i class="ti-google"></i></button>
														                </div>
														            </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="job">Job</label>
											                        	<input id="job" class="form-control p-event" name="job" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="email">Email</label>
											                        	<input id="email" class="form-control p-event" name="email" type="email">
												                    </div>

												                    <div class="form-group col">
												                        <label for="phone">Phone</label>
											                        	<input id="text" class="form-control p-event" name="phone" type="phone">
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="description">Description</label>
											                        	<textarea rows="1" id="description" class="form-control p-event" name="description"></textarea>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="older_address">Older Address</label>
											                        	<textarea rows="1" id="older_address" class="form-control p-event" name="older_address"></textarea>
												                    </div>
										                      	</div>

																<div class="row">
										                      		<div class="form-group col">
												                        <label for="rank">Rank</label>
											                        	<input id="rank" class="form-control p-event" name="rank" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="expertise_area">Expertise Area</label>
											                        	<input id="expertise_area" class="form-control p-event" name="expertise_area" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="personal_interest">Personal Interest</label>
											                        	<input id="text" class="form-control p-event" name="personal_interest" type="personal_interest">
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="type">Type</label>
											                        	<input id="text" class="form-control p-event" name="type" type="type">
												                    </div>

										                      		<div class="form-group col">
												                        <label for="status">Status</label>
											                        	<input id="text" class="form-control p-event" name="status" type="status">
												                    </div>

												                    <div class="form-group col">
												                    	<div class="row">
												                    		<div class="form-group col">
												                    			<label for="profile_picture">Profile Picture</label><br>
											                        			<img src="images/faces/face11.jpg" class="img-lg rounded" alt="Profile Picture"/>
												                    		</div>

												                    		<div class="form-group col">
														                        <label for="cover_photo">Cover Photo</label><br>
													                        	<img src="images/samples/300x300/2.jpg" class="img-lg rounded" alt="Cover Photo">
														                    </div>
												                    	</div>
												                    </div>
										                      	</div>
										                    </fieldset>
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>
								                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; Cancel</button>
								                        </div>
							                    	</form>
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

							                        <form class="cmxform" id="signupForm" method="get" action="#">
								                        <div class="modal-body" style="padding-bottom: 0">
										                    <fieldset>
										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="first_name">Firstname</label>
												                        <input id="first_name" class="form-control" name="first_name" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="surname">Surname</label>
											                        	<input id="surname" class="form-control" name="surname" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="confirm_password">Social Media</label>
											                        	<div class="form-inline repeater">
													                        <div data-repeater-list="group-a">
													                          	<div data-repeater-item class="d-flex mb-2">
														                            <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup1" placeholder="Add URL">

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
												                        <label for="job">Job</label>
											                        	<input id="job" class="form-control" name="job" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="email">Email</label>
											                        	<input id="email" class="form-control" name="email" type="email" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="phone">Phone</label>
											                        	<input id="text" class="form-control" name="phone" type="phone" placeholder="Insert...">
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="description">Description</label>
											                        	<textarea rows="1" id="description" class="form-control" name="description" placeholder="Insert..."></textarea>
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
												                        <label for="expertise_area">Expertise Area</label>
											                        	<input id="expertise_area" class="form-control" name="expertise_area" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="personal_interest">Personal Interest</label>
											                        	<input id="text" class="form-control" name="personal_interest" type="personal_interest" placeholder="Insert...">
												                    </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="type">Type</label>
											                        	<select class="form-control form-control-lg" name="type" id="type">
											                        		<option>Select...</option>
													                      	<option>1</option>
													                      	<option>2</option>
													                      	<option>3</option>
													                      	<option>4</option>
													                      	<option>5</option>
													                    </select>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="status">Status</label>
											                        	<select class="form-control form-control-lg" name="status" id="status">
											                        		<option>Select...</option>
													                      	<option>1</option>
													                      	<option>2</option>
													                      	<option>3</option>
													                      	<option>4</option>
													                      	<option>5</option>
													                    </select>
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
								                          	<button type="submit" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

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

						                        	<div class="modal-body">
							                          	<p>Do You Really Want to Delete This User?</p>
							                        </div>

							                        <div class="modal-footer">
							                          	<button type="submit" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

							                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
							                        </div>
						                      	</div>
						                    </div>
						                </div>

						                <div class="modal fade" id="companyModal" tabindex="-1" role="dialog" aria-labelledby="companyModalLabel" aria-hidden="true">
						                    <div class="modal-dialog modal-lg" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="companyModalLabel">View / Edit Company</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

							                        <form class="cmxform" id="signupForm" method="get" action="#">
								                        <div class="modal-body" style="padding-bottom: 0">
										                    <fieldset>
										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="company_name">Company Name</label>
												                        <input id="company_name" class="form-control" name="company_name" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="subtitle">Subtitle</label>
											                        	<input id="subtitle" class="form-control" name="subtitle" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="confirm_password">Headquarters</label>
											                        	<div class="form-inline repeater">
													                        <div data-repeater-list="group-a">
													                          	<div data-repeater-item class="d-flex mb-2">
														                            <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup1" placeholder="Add Headquarter">

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
												                        <label for="description">Description</label>
											                        	<textarea rows="1" id="description" class="form-control" name="description" placeholder="Insert..."></textarea>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="legal_form">Legal Form</label>
											                        	<textarea rows="1" id="legal_form" class="form-control" name="legal_form" placeholder="Insert..."></textarea>
												                    </div>
										                      	</div>

																<div class="row">
												                    <div class="form-group col">
												                        <label for="capital_requirements">Capital Requirements</label>
											                        	<input id="capital_requirements" class="form-control" name="capital_requirements" type="text" placeholder="Insert...">
												                    </div>

												                    <div class="form-group col">
												                        <label for="personal_interest">Date of Foundation</label>
											                        	<div id="datepicker-popup" class="input-group date datepicker">
													                        <input type="text" class="form-control">

													                        <span class="input-group-addon input-group-append border-left"></span>
													                    </div>
												                    </div>

												                    <div class="form-group col">
												                        <label for="category">Category</label>
											                        	<select class="form-control form-control-lg" name="category" id="category">
											                        		<option>Select...</option>
													                      	<option>1</option>
													                      	<option>2</option>
													                      	<option>3</option>
													                      	<option>4</option>
													                      	<option>5</option>
													                    </select>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="status">Status</label>
											                        	<select class="form-control form-control-lg" name="status" id="status">
											                        		<option>Select...</option>
													                      	<option>1</option>
													                      	<option>2</option>
													                      	<option>3</option>
													                      	<option>4</option>
													                      	<option>5</option>
													                    </select>
												                    </div>
										                      	</div>

										                      	<div class="row">
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
												                        <label for="status">Founders</label>
											                        	<div class="file-upload-wrapper">
														                    <div id="fileuploader">Upload</div>
														                </div>
												                    </div>
										                      	</div>
										                    </fieldset>
								                        </div>

								                        <div class="modal-footer">
								                          	<button type="submit" class="btn btn-inverse-success btn-fw"><i class="ti-upload btn-icon-prepend"></i> &nbsp; Submit</button>

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