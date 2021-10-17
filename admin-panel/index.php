<?php 
	include('includes/header.php');
	session_start();

	if(isset($_SESSION['logged_in_email']) && !empty($_SESSION['logged_in_email'])){
        header('Location: admin_panel.php');
    }
?>

<style type="text/css">
	.card .card-body{
		padding: 0;
	}
	.footer{
		padding: 30px 1.45rem;
	}
	.custom-signin:hover{
		background-color: #ff5722;
		border-color: #ff5722;
	}
</style>

<body>
  	<div class="container-scroller">
	    <div class="container-fluid page-body-wrapper full-page-wrapper">
	      	<div class="content-wrapper d-flex align-items-center auth px-0">
		        <div class="row w-100 mx-0">
		          	<div class="col-lg-4 mx-auto">
		          		<div class="card">
				            <div class="card-body">
					            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
					              	<div class="brand-logo">
					                	<img src="images/logo.png" alt="logo">
					              	</div>

					              	<h4>Hello Administrator!</h4>

					              	<h6 class="font-weight-light">Sign in here to get started.</h6>

					              	<form id="login_form" action="login.php" method="POST" class="pt-3">
						                <div class="form-group">
						                  	<input style="margin-bottom: 5px;" type="email" name="login_email" id="login_email" class="form-control form-control-lg" placeholder="Insert Email...">

						                  	<span id="err_login_email"></span>
						                </div>

						                <div class="form-group">
						                  	<input style="margin-bottom: 5px;" type="password" name="login_password" id="login_password" class="form-control form-control-lg" placeholder="Insert Password...">
						                </div>

						                <div class="mt-3">
                                        	<input class="btn btn-block btn-inverse-warning btn-lg font-weight-medium auth-form-btn custom-signin" id="login_submit" type="submit" value="Login">

                                        	<span id="err_login_password"></span>
						                </div>
					              	</form>
					            </div>
					        </div>

					        <footer class="footer">
								<div class="d-sm-flex justify-content-center justify-content-sm-between">
							    	<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y') ?> <a style="color: #ff5722" href="http://www.pitchbrothers.de" target="_blank">Pitchblack</a>. All rights are reserved.</span>
							    	
							    	<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
							  	</div>
							</footer>
					    </div>
		          	</div>
		        </div>
	      	</div>
	    </div>
  	</div>
</body>

<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/js/vendor.bundle.addons.js"></script>
<script src="js/toastDemo.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		<?php 
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            	if($_SESSION['message'] == 'error'){
        ?>
                	showLoginFailedToast();
        <?php
                	$_SESSION['message'] = '';
            	}
            }
        ?>
	});

	$("#login_submit").on('click', function(e){
        var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        var login_email = $('#login_email').val().trim();
        $('#login_email').val(login_email);
        var login_password = $('#login_password').val().trim();
        $('#login_password').val(login_password);

        if(login_email == null || login_email == ""){
            $("#err_login_email").html('Please Insert Email.').css('color', 'red');
            return false;
        } else{
            $("#err_login_email").html('');
        }

        if (!login_email.match(email_regex) ){
            $('#err_login_email').html('Please Insert a Valid Email.').css('color', 'red');
            return false;
        } else{
            $("#err_login_email").html('');
        }

        if(login_password == null || login_password == ""){
            $("#err_login_password").html('Please Insert Password.').css('color', 'red');
            return false;
        } else{
            $("#err_login_password").html('');
        }

        if (login_password.length < 8){
            $('#err_login_password').html('Password Must Contain At Least 8 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_login_password").html('');
        }

        $('#login_form').submit();
    });
</script>