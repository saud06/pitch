<?php 
	session_start();
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
		}
    }
?>

<style type="text/css">
	.custom-link:hover{
		color: inherit;
	}
	.custom-navicon{
        border: 1px solid #ddd;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 39px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .btn-outline-warning, .btn-warning{
    	color: #fff !important;
    	background-color: #ff5722 !important;
	    border-color: #ff5722 !important;
    }
    .btn-outline-warning:hover{
    	color: #fff !important;
    	background-color: #ff5722 !important;
    }
    .btn-outline-warning:not(:disabled):not(.disabled):active:focus, .btn-outline-warning:not(:disabled):not(.disabled).active:focus, .show > .btn-outline-warning.dropdown-toggle:focus{
    	box-shadow: none;
    	color: #fff !important;
    	background-color: #ff5722 !important;
    }
    .dropdown-item:hover{
    	color: #fff;
    }
    .custom-box:focus{
    	border-color: #ff5722 !important;
    }
</style>

<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    	<a class="navbar-brand brand-logo mr-5" href=".."><img src="images/logo.png" class="mr-2" alt="logo"/></a>

    	<a class="navbar-brand brand-logo-mini" href=".."><img src="images/logo.png" alt="logo"/></a>
  	</div>

  	<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    	<button class="navbar-toggler navbar-toggler align-self-center mr-lg-4" type="button" data-toggle="minimize">
	      	<span class="ti-layout-grid2"></span>
	    </button>
	    
	    <ul class="navbar-nav mr-lg-4">
	      	<li class="nav-item nav-profile dropdown" style="margin-left: 0">
	        	<a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
	          		<i class="fa fa-navicon custom-navicon" aria-hidden="true"></i> <span id="menu_spn">Erkunden <i class="fa fa-angle-down"></i></span>
	        	</a>

		        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown" style="left: 0; right: auto;">
		          	<a href="../category.php" class="dropdown-item custom-link">
		            	Videokategorien
		          	</a>
		          	<a href="../expert.php" class="dropdown-item custom-link">
		            	Experten Fragen
		          	</a>
		          	<a href="../idea.php" class="dropdown-item custom-link">
		            	Idee Des Tages
		          	</a>
		          	<a href="../overview.php" class="dropdown-item custom-link">
		            	Überblick
		          	</a>
		        </div>
	      	</li>
	    </ul>

	    <div id="search_lnk" class="input-group" style="width: 35%">
          <div class="input-group-prepend">
            <button class="btn btn-sm btn-outline-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Technologie</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Technologie</a>
              <a class="dropdown-item" href="#">Medizin</a>
              <a class="dropdown-item" href="#">Essen</a>
              <a class="dropdown-item" href="#">Tiere</a>

              <a class="dropdown-item" href="#">Lebensstil</a>
              <a class="dropdown-item" href="#">Sport</a>
              <a class="dropdown-item" href="#">Umwelt</a>
              <a class="dropdown-item" href="#">Wirtschaft</a>

              <a class="dropdown-item" href="#">Haus und Garten</a>
              <a class="dropdown-item" href="#">Beauty und Gesundheit</a>
              <a class="dropdown-item" href="#">Spiele</a>
              <a class="dropdown-item" href="#">Online Service</a>
            </div>
          </div>
          <input type="text" class="form-control custom-box" aria-label="Text input with dropdown button" placeholder="Wonach suchst du?">
          <div class="input-group-append">
            <button class="btn btn-sm btn-warning" type="button"><i class="ti-search"></i></button>
          </div>
        </div>

	    <ul class="navbar-nav navbar-nav-right">
			<li id="upload_lst" class="nav-item">
				<a href="../profile.php" id="upload_lnk" class="btn btn-warning">Hochladen</a>
			</li>

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

	      	<li class="nav-item dropdown">
	            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
	              	<i class="ti-bell mx-0"></i>
	            </a>

	            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
	              	<p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>

	              	<a class="dropdown-item preview-item">
		                <div class="preview-thumbnail">
		                  	<div class="preview-icon bg-success">
		                    	<i class="ti-info-alt mx-0"></i>
		                  	</div>
		                </div>

		                <div class="preview-item-content">
		                  	<h6 class="preview-subject font-weight-normal">Application Error</h6>

		                  	<p class="font-weight-light small-text mb-0 text-muted">
		                    	Just now
		                  	</p>
		                </div>
	              	</a>

	              	<a class="dropdown-item preview-item">
		                <div class="preview-thumbnail">
		                  	<div class="preview-icon bg-warning">
		                    	<i class="ti-settings mx-0"></i>
		                  	</div>
		                </div>

		                <div class="preview-item-content">
		                  	<h6 class="preview-subject font-weight-normal">Settings</h6>

		                  	<p class="font-weight-light small-text mb-0 text-muted">
		                    	Private message
		                  	</p>
		                </div>
	              	</a>

	              	<a class="dropdown-item preview-item">
		                <div class="preview-thumbnail">
		                  	<div class="preview-icon bg-info">
		                    	<i class="ti-user mx-0"></i>
		                  	</div>
		                </div>

	                	<div class="preview-item-content">
	                  		<h6 class="preview-subject font-weight-normal">New user registration</h6>

	                  		<p class="font-weight-light small-text mb-0 text-muted">
	                    		2 days ago
	                  		</p>
	                	</div>
	              	</a>
	            </div>
          	</li>

	      	<li class="nav-item nav-profile dropdown">
	        	<a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown2">
	          		<i class="fa fa-user custom-navicon" aria-hidden="true"></i> <span id="profile_spn">Profil <i class="fa fa-angle-down"></i></span>
	        	</a>

		        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown2">
					<a href="../backend/logout.php" class="dropdown-item custom-link">
		            	<i class="fa fa-sign-out" style="color: #ff5722;"></i> Ausloggen
		          	</a>

		          	<a href="profile.php" class="dropdown-item custom-link">
		            	<i class="fa fa-file-photo-o" style="color: #ff5722;"></i> Mein Profil
		          	</a>

		          	<a href="../company.php" class="dropdown-item custom-link">
		          		<i class="fa fa-users" style="color: #ff5722;"></i> Unternehmen
		          	</a>

		          	<a href="" class="dropdown-item custom-link">
		          		<i class="fa fa-line-chart" style="color: #ff5722;"></i>Analytics
		          	</a>
		        </div>
	      	</li>
	    </ul>

	    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
	      	<span class="ti-layout-grid2"></span>
	    </button>
  	</div>

  	<div id="search_lnk_toggle" style="padding: 0 8px; display: none;" class="input-group">
      <div class="input-group-prepend">
        <button class="btn btn-sm btn-outline-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Technologie</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Technologie</a>
          <a class="dropdown-item" href="#">Medizin</a>
          <a class="dropdown-item" href="#">Essen</a>
          <a class="dropdown-item" href="#">Tiere</a>

          <a class="dropdown-item" href="#">Lebensstil</a>
          <a class="dropdown-item" href="#">Sport</a>
          <a class="dropdown-item" href="#">Umwelt</a>
          <a class="dropdown-item" href="#">Wirtschaft</a>

          <a class="dropdown-item" href="#">Haus und Garten</a>
          <a class="dropdown-item" href="#">Beauty und Gesundheit</a>
          <a class="dropdown-item" href="#">Spiele</a>
          <a class="dropdown-item" href="#">Online Service</a>
        </div>
      </div>
      <input type="text" class="form-control custom-box" aria-label="Text input with dropdown button" placeholder="Wonach suchst du?">
      <div class="input-group-append">
        <button class="btn btn-sm btn-warning" type="button"><i class="ti-search"></i></button>
      </div>
    </div>
</nav>