<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  	<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    	<a class="navbar-brand brand-logo mr-5" href=".."><img src="images/logo.png" class="mr-2" alt="logo"/></a>

    	<a class="navbar-brand brand-logo-mini" href=".."><img src="images/logo.png" alt="logo"/></a>
  	</div>

  	<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    	<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
	      	<span class="ti-layout-grid2"></span>
	    </button>

	    <ul class="navbar-nav mr-lg-2">
	      	<li class="nav-item nav-search d-none d-lg-block">
	        	<div class="input-group">
	          		<div class="input-group-prepend hover-cursor" id="navbar-search-icon">
	            		<span class="input-group-text" id="search">
	              			<i class="ti-search"></i>
	            		</span>
	          		</div>

	          		<input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
	        	</div>
	      	</li>
	    </ul>

	    <ul class="navbar-nav navbar-nav-right">
	      	<li class="nav-item dropdown">
	      		<a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
	          		<i class="ti-email mx-0"></i>

	          		<span class="count"></span>
	        	</a>

	       		<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
	          		<p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>

		          	<a class="dropdown-item preview-item">
	           			<div class="preview-thumbnail">
	                		<img src="images/faces/face4.jpg" alt="image" class="profile-pic">
	            		</div>

	            		<div class="preview-item-content flex-grow">
	              			<h6 class="preview-subject ellipsis font-weight-normal">David Grey</h6>

	              			<p class="font-weight-light small-text text-muted mb-0">The meeting is cancelled</p>
	            		</div>
	          		</a>

	          		<a class="dropdown-item preview-item">
	        			<div class="preview-thumbnail">
	                		<img src="images/faces/face2.jpg" alt="image" class="profile-pic">
	            		</div>

	            		<div class="preview-item-content flex-grow">
	              			<h6 class="preview-subject ellipsis font-weight-normal">Tim Cook</h6>

	              			<p class="font-weight-light small-text text-muted mb-0">New product launch</p>
	            		</div>
	          		</a>

		          	<a class="dropdown-item preview-item">
		            	<div class="preview-thumbnail">
		                	<img src="images/faces/face3.jpg" alt="image" class="profile-pic">
		            	</div>

		            	<div class="preview-item-content flex-grow">
		              		<h6 class="preview-subject ellipsis font-weight-normal">Johnson</h6>

		              		<p class="font-weight-light small-text text-muted mb-0">Upcoming board meeting</p>
		            	</div>
		          	</a>
	        	</div>
	      	</li>

	      	<li class="nav-item nav-settings d-none d-lg-flex">
	        	<a class="nav-link" href="logout.php">
	          		<i class="ti-power-off text-muted"></i>
	        	</a>
	      	</li>
	    </ul>

	    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
	      	<span class="ti-layout-grid2"></span>
	    </button>
  	</div>
</nav>