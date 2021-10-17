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
									                        <label for="user_id">User</label>
								                        	<select class="form-control form-control-lg" name="user_id" id="user_id">
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
											                    <div id="fileuploader2">Upload</div>
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

			              	<div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="addCatModalLabel" aria-hidden="true">
			                    <div class="modal-dialog" role="document">
			                      	<div class="modal-content">
				                        <div class="modal-header">
				                          	<h5 class="modal-title" id="addCatModalLabel">Add Category</h5>

				                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                            	<span aria-hidden="true">&times;</span>
				                          	</button>
				                        </div>

				                        <form class="cmxform" id="signupForm" method="get" action="#">
					                        <div class="modal-body" style="padding-bottom: 0">
							                    <fieldset>
							                      	<div class="row">
							                      		<div class="form-group col">
									                        <label for="company_name">Category Name</label>
									                        <input id="company_name" class="form-control" name="company_name" type="text" placeholder="Insert...">
									                    </div>
									                </div>
													
													<div class="row">
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
						                            <th width="5%">Logo</th>
						                            <th>User</th>
						                            <th>Company Name</th>
						                            <th>Subtitle</th>
						                            <th>Date of Creation</th>
						                            <th>Category</th>
						                            <th>Status</th>
						                            <th>Approval</th>
						                            <th>Actions</th>
						                        </tr>
					                      	</thead>

					                      	<tbody>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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
						                            	<button type="button" class="btn btn-inverse-success btn-icon" title="View" data-toggle="modal" data-target="#viewModal"><i style="margin-left: -3px; margin-right: 0" class="ti-clipboard"></i></button>&nbsp;
						                              	
						                              	<button type="button" class="btn btn-inverse-info btn-icon" title="Edit" data-toggle="modal" data-target="#editModal"><i style="margin-left: -3px; margin-right: 0" class="ti-pencil-alt"></i></button>&nbsp;
						                              	
						                              	<button type="button" class="btn btn-inverse-danger btn-icon" title="Delete" data-toggle="modal" data-target="#deleteModal"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
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

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
						                            </td>
						                        </tr>
						                        <tr>
						                            <td><img class="img-sm rounded-circle" src="images/faces/face5.jpg" alt="profile"></td>
						                            <td>John Doe</td>
						                            <td>Microsoft Corporation</td>
						                            <td>United we can achieve anything</td>
						                            <td>02/04/2019</td>
						                            <td>Technology</td>
						                            <td>
						                              	<label class="badge badge-warning">Pending</label>
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

						                              	<button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="tooltip" data-placement="bottom" title="Delete"><i style="margin-left: -3px; margin-right: 0" class="ti-trash"></i></button>
						                            </td>
						                        </tr>
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

							                        <form class="cmxform" id="signupForm" method="get" action="#">
								                        <div class="modal-body" style="padding-bottom: 0">
										                    <fieldset>
										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="company_name">Company Name</label>
												                        <input id="company_name" class="form-control p-event" name="company_name" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="subtitle">Subtitle</label>
											                        	<input id="subtitle" class="form-control p-event" name="subtitle" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="confirm_password">Headquarters</label>
											                        	<textarea rows="1" id="headquarters" class="form-control p-event" name="headquarters"></textarea>
														            </div>
										                      	</div>

										                      	<div class="row">
										                      		<div class="form-group col">
												                        <label for="description">Description</label>
											                        	<textarea rows="1" id="description" class="form-control p-event" name="description"></textarea>
												                    </div>

										                      		<div class="form-group col">
												                        <label for="legal_form">Legal Form</label>
											                        	<textarea rows="1" id="legal_form" class="form-control p-event" name="legal_form"></textarea>
												                    </div>
										                      	</div>

																<div class="row">
												                    <div class="form-group col">
												                        <label for="capital_requirements">Capital Requirements</label>
											                        	<input id="capital_requirements" class="form-control p-event" name="capital_requirements" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="date_of_foundation">Date of Foundation</label>
											                        	<input id="date_of_foundation" class="form-control p-event" name="date_of_foundation" type="text">
												                    </div>

												                    <div class="form-group col">
												                        <label for="category">Category</label>
											                        	<input id="category" class="form-control p-event" name="category" type="text">
												                    </div>

										                      		<div class="form-group col">
												                        <label for="status">Status</label>
											                        	<input id="status" class="form-control p-event" name="status" type="text">
												                    </div>
										                      	</div>

										                      	<div class="row">
										                    		<div class="form-group col">
												                    	<div class="row">
												                    		<div class="form-group col">
														                        <label for="user_id">User</label>
													                        	<input id="user_id" class="form-control p-event" name="user_id" type="text">
														                    </div>

												                    		<div class="form-group col">
												                    			<label for="profile_picture">Logo</label><br>
											                        			<img src="images/faces/face11.jpg" class="img-lg rounded" alt="Profile Picture"/>
												                    		</div>

												                    		<div class="form-group col">
														                        <label for="cover_photo">Title Picture</label><br>
													                        	<img src="images/samples/300x300/2.jpg" class="img-lg rounded" alt="Cover Photo">
														                    </div>

														                    <div class="form-group col">
														                        <label for="cover_photo">Founders</label><br>
													                        	<img src="images/samples/300x300/3.jpg" class="img-lg rounded" alt="Cover Photo">&nbsp;

													                        	<img src="images/samples/300x300/4.jpg" class="img-lg rounded" alt="Cover Photo">&nbsp;

													                        	<img src="images/samples/300x300/5.jpg" class="img-lg rounded" alt="Cover Photo">
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
							                          	<h5 class="modal-title" id="editModalLabel">Edit Company</h5>

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
												                        <label for="user_id">User</label>
											                        	<select class="form-control form-control-lg" name="user_id" id="user_id">
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

						                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
						                    <div class="modal-dialog" role="document">
						                      	<div class="modal-content">
							                        <div class="modal-header">
							                          	<h5 class="modal-title" id="deleteModalLabel">Delete Company</h5>

							                          	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                            	<span aria-hidden="true">&times;</span>
							                          	</button>
							                        </div>

						                        	<div class="modal-body">
							                          	<p>Do You Really Want to Delete This Company?</p>
							                        </div>

							                        <div class="modal-footer">
							                          	<button type="submit" class="btn btn-inverse-success btn-fw"><i class="ti-check btn-icon-prepend"></i> &nbsp; Yes</button>

							                          	<button type="button" class="btn btn-inverse-danger btn-fw" data-dismiss="modal"><i class="ti-close btn-icon-prepend"></i> &nbsp; No</button>
							                        </div>
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