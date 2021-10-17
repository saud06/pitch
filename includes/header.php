<?php 
    session_start();
    include('config/config.php');
?>

<style type="text/css">
    .nice-select{
        margin-bottom: 5px;
    }

    .avatar-upload {
      position: relative;
      max-width: 205px;
      margin: 20px auto;
    }
    .avatar-upload .avatar-edit {
      position: absolute;
      right: 12px;
      z-index: 1;
      top: 10px;
    }
    .avatar-upload .avatar-edit input {
      display: none;
    }
    .avatar-upload .avatar-edit input + label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #FFFFFF;
      border: 1px solid transparent;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
      background: #f1f1f1;
      border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit input + label:after {
      content: "\f030";
      font-family: 'FontAwesome';
      color: #757575;
      position: absolute;
      top: 8px;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }
    .avatar-upload .avatar-preview {
      width: 192px;
      height: 192px;
      position: relative;
      border-radius: 100%;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
      width: 100%;
      height: 100%;
      border-radius: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    #notification-container0 {
      position: absolute;
      top: 120px;
      transition: top 0.2s ease-in-out, opacity 1s;
    }
    #notification-container1 {
      position: absolute;
      top: -20px;
      transition: top 0.2s ease-in-out, opacity 1s;
    }
    #notification-container, #notification-container2 {
      position: absolute;
      top: -40px;
      transition: top 0.2s ease-in-out, opacity 1s;
    }
    #notification-container.hidden, #notification-container0.hidden, #notification-container1.hidden, #notification-container2.hidden {
      opacity: 0;
      height: 0;
      overflow: hidden;
      transition: none;
      visibility: hidden;
    }
    #notification-container.fadeout, #notification-container0.fadeout, #notification-container1.fadeout, #notification-container2.fadeout {
      width: 100% !important;
      animation-name: fadeout;
      animation-delay: 5s;
      animation-duration: .7s;
      animation-fill-mode: forwards;
    }
    .notification {
      width: 250px;
      color: #fff;
      font-weight: 600;
      font-size: 15px;
      border-radius: 5px;
      box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.5);
      padding: 20px;
      margin: 0 auto;
      position: relative;
      text-align: center;
    }
    .notification p {
      margin: 0;
    }
    .notification--error {
      background-color:  rgba(255, 87, 34, .5);
      z-index: -1;
      border: 1px solid #ff5722;
    }
    #progress, #progress0, #progress1, #progress2 {
      height: 6px;
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
    }
    #indicator, #indicator0, #indicator1, #indicator2 {
      height: 100%;
      width: 0%;
      background-color: rgba(255, 255, 255, 0.5);
    }
    #indicator.progress, #indicator0.progress, #indicator1.progress, #indicator2.progress {
      animation-name: progress;
      animation-delay: .35s;
      animation-duration: 5s;
      animation-timing-function: linear;
      animation-fill-mode: forwards;
    }
    @keyframes fadeout {
      0% {
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }
    @keyframes progress {
      0% {
        width: 0%;
      }
      90% {
        width: 100%;
      }
      100% {
        width: 100%;
      }
    }

    input:-internal-autofill-previewed, input:-internal-autofill-selected, textarea:-internal-autofill-previewed, textarea:-internal-autofill-selected, select:-internal-autofill-previewed, select:-internal-autofill-selected {
       background-color: #181925 !important; 
       background-image: none !important; 
       color: #fff !important;
    }

    .plyr__control{
      background: #ff6f00 !important;
    }
    .plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true]{
      background: #ff6f00 !important;
    }
    .plyr--full-ui input[type=range]{
      color: #ff6f00 !important;
    }
    .plyr__control.plyr__tab-focus {
        box-shadow: 0 0 0 5px rgba(255, 159, 24, .5) !important;
        outline: 0;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pitchback</title>
   
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> 
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/meanmenu.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/default.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.2/plyr.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="assets/plugin/plyr/plyr.css"> -->
</head>

<!-- Header bar section start -->
<div class="off-canvas-section">
    <div class="off-canvas-blk">
        <div class="menu-list">
            <p style="padding: 7px" class="community">Erkunden</p>
            <ul>
                <li><a href="main.php">Main</a></li>
                <li><a href="category.php">Videokategorien</a></li>
                <li><a href="expert.php">Experten fragen</a></li>
                <li><a href="idea.php">Idee des Tages</a></li>
                <li><a href="overview.php">Überblick</a></li>
            </ul>
        </div>
        
        <div class="search-bar-inp-can">
            <div class="select-options-can">
                <select name="" id="">
                    <option value="">Technologie</option>
                    <option value="">Medizin</option>
                    <option value="">Essen</option>
                    <option value="">Tiere</option>
                    <option value="">Lebensstil</option>
                    <option value="">Sport</option>
                    <option value="">Umwelt</option>
                    <option value="">Wirtschaft</option>
                    <option value="">Haus und Garten</option>
                    <option value="">Beauty und Gesundheit</option>
                    <option value="">Spiele</option>
                    <option value="">Online Service</option>
                </select>
            </div>

            <div class="search-bar-can">
                <input type="text" placeholder="Wonach suchst du?">
                <button type="submit"><span class="search-icon"><img src="assets/img/serch-icon.png" alt=""></span></button>
            </div>
        </div>
    </div>
</div>

<div class="header-bar-section">
    <span class="menu-open"><i class="fa fa-navicon"></i></span>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-1 col-lg-1 col-md-2 col-3">
                <div class="site-logo" style="margin-bottom: 10px">
                    <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
                </div>
            </div> 

            <style type="text/css">
                .header-top-menu{
                    margin-top: 23px;
                }
                .header-top-menu ul li ul li a{
                    color: #000;
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
            </style>

            <div class="col-xl-2 col-lg-3 col-md-3 col-9 npd hdm">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" style="padding-bottom: 6px" data-toggle="dropdown"><span><i class="fa fa-navicon custom-navicon" aria-hidden="true"></i></span> Erkunden <i class="fa fa-angle-down"></i></a>

                            <ul class="dropdown-menu">
                                <li><a href="category.php">Videokategorien</a></li>
                                <li><a href="expert.php">Experten fragen</a></li>
                                <li><a href="idea.php">Idee des Tages</a></li>
                                <li><a href="overview.php">Überblick</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>   
              
            <div class="col-xl-6 col-lg-4 col-md-7 hdm">
                <div class="search-bar-inp">
                    <div class="select-options">
                        <select name="" id="">
                            <option value="">Technologie</option>
  							<option value="">Medizin</option>
  							<option value="">Essen</option>
  							<option value="">Tiere</option>
  							<option value="">Lebensstil</option>
  							<option value="">Sport</option>
  							<option value="">Umwelt</option>
  							<option value="">Wirtschaft</option>
  							<option value="">Haus und Garten</option>
  							<option value="">Beauty und Gesundheit</option>
  							<option value="">Spiele</option>
  							<option value="">Online Service</option>
                        </select>
                    </div>

                    <div class="search-bar">
                        <input type="text" placeholder="Wonach suchst du?">
                        <button type="submit"><span class="search-icon"><img src="assets/img/serch-icon.png" alt=""></span></button>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-11 col-md-10  col-12">
                <div class="header-right-content">
                    <li><a id="upload_link" href="#">Hochladen</a></li>
                    <li><a title="Botschaft" href=""><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                    <li><a title="Benachrichtigung" href=""><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" style="padding-bottom: 6px" data-toggle="dropdown"><span><i class="fa fa-user" aria-hidden="true"></i></span>
                            <?php 
                                if(isset($_SESSION['logged_in_email']) && !empty($_SESSION['logged_in_email'])){
                            ?>
                                    Profil <i class="fa fa-angle-down"></i>
                            <?php 
                                } else{
                            ?>
                                    Zugriff <i class="fa fa-angle-down"></i>
                            <?php
                                }
                            ?>
                        </a>

                        <ul class="dropdown-menu">
                            <li style="display: block; width: auto;">
                                <?php 
                                    if(isset($_SESSION['logged_in_email']) && !empty($_SESSION['logged_in_email'])){
                                ?>
                                        <a style="background: none; padding: 12px 8px; border-radius: 0; margin-right: 0; color: #000" id="logout_link" href="#"><i style="color: #000" class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Ausloggen</a>
                                <?php 
                                    } else{
                                ?>
                                        <a style="background: none; padding: 12px 8px; border-radius: 0; margin-right: 0; color: #000" href="" data-toggle="modal" data-target="#exampleModal2"><i style="color: #000" class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; Einloggen</a>
                                <?php
                                    }
                                ?>
                            </li>
                            <?php 
                                if(!isset($_SESSION['logged_in_email']) && empty($_SESSION['logged_in_email'])){
                            ?>
                                    <li style="display: block; width: auto;"><a style="color: #000" href="" data-toggle="modal" data-target="#exampleModal3"><i style="color: #000" class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Registrieren</a></li>
                            <?php 
                                }
                                if(isset($_SESSION['logged_in_email']) && !empty($_SESSION['logged_in_email'])){
                            ?>
                                    <li style="display: block; width: auto;"><a style="color: #000" id="profile_link" href="#"><i style="color: #000" class="fa fa-file-photo-o" aria-hidden="true"></i>&nbsp; Mein Profil</a></li>
                                    <li style="display: block; width: auto;"><a style="color: #000" id="company_link" href="#"><i style="color: #000" class="fa fa-users" aria-hidden="true"></i>&nbsp; Unternehmen</a></li>
                                    <li style="display: block; width: auto;"><a style="color: #000" id="user_panel_link" href="#"><i style="color: #000" class="fa fa-line-chart" aria-hidden="true"></i>&nbsp; Analytics</a></li>
                            <?php 
                                }
                            ?>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header bar section end -->

<div id="notification-container0" class="hidden">
    <div class="notification notification--error" id="notification0" role="alert" aria-live="assertive">
        <div class="icon-placeholder" aria-label="warning"></div>

        <p id="success_message"></p>

        <div id="progress0">
            <div id="indicator0"></div>
        </div>
    </div>
</div>

<form id="login_form" action="backend/login.php" method="POST" enctype="multipart/form-data">
    <!-- Login popup start -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog dialog-width dialog-login" role="document">
            <div class="modal-content"> 
                <div class="modal-header" style="padding-top: 5px; padding-bottom: 5px">
                    <button type="button" style="outline: none;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>   

                <div class="modal-body" style="padding-top: 0;">
                    <div class="upload-video-btn">
                        <a style="top: -79px; cursor: default;" href="#">Login To PitchBrothers</a>

                        <div id="notification-container1" class="hidden">
                            <div class="notification notification--error" id="notification1" role="alert" aria-live="assertive">
                                <div class="icon-placeholder" aria-label="warning"></div>

                                <p id="message1"></p>

                                <div id="progress1">
                                    <div id="indicator1"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-from-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-12 b-text-style">
                                                <label for="login_email">Email <span style="color: red">*</span></label>
                                                
                                                <input style="margin-bottom: 5px; padding: 0 0 9px 0;" class="input-box" type="text" name="login_email" id="login_email" placeholder="Insert...">

                                                <span id="err_login_email"></span>
                                            </div>

                                            <div class="col-md-12 b-text-style">
                                                <label for="login_password">Password <span style="color: red">*</span></label>
                                                
                                                <input style="margin-bottom: 5px; padding: 0 0 9px 0;" class="input-box" type="password" name="login_password" id="login_password" placeholder="Insert...">

                                                <span id="err_login_password"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn facebook-btn"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Contnue with Facebook</button>
                                        </div>

                                        <div class="col-md-6">
                                            <button type="button" class="btn google-btn"><i class="fa fa-google"></i>&nbsp;&nbsp;Contnue with Google</button>    
                                        </div> 
                                    </div>
                                  
                                    <div class="col-md-12 popup-content">
                                        <div class="label-area" style="text-align: center;">
                                            <label class="containere"> 
                                                <input type="checkbox" name="remember">

                                                <span class="checkmark" style="border-radius: 0"></span>
                                                Remember Me?
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="community popup-content2">Read Our <a href="#">Community Guidelines</a> Regarding Appropriate Content and Conduct.</p>
                                    </div>

                                    <div class="submit-btn text-center">
                                        <input id="login_submit" type="submit" value="Login">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login popup end -->
</form>

<form id="registration_form" action="backend/registration.php" method="POST" enctype="multipart/form-data">
    <!-- Registration PopUp Start -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-section-style dialog-reg1" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button style="outline: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="upload-video-btn">
                        <a style="top: -100px; cursor: default;" href="#">Registration</a>

                        <div id="notification-container" class="hidden">
                            <div class="notification notification--error" id="notification" role="alert" aria-live="assertive">
                                <div class="icon-placeholder" aria-label="warning"></div>

                                <p id="message"></p>

                                <div id="progress">
                                    <div id="indicator"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                    <div class="modal-from-area">
                        <div class="container">                                 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6 b-text-style">
                                                    <label for="first_name">First Name <span style="color: red">*</span></label>

                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="text" name="first_name" id="first_name" class="input-box" placeholder="Insert...">

                                                    <span id="err_first_name"></span>
                                                </div>

                                                <div class="col-md-6 b-text-style">
                                                    <label for="surname">Surname <span style="color: red">*</span></label>

                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="text" name="surname" id="surname" class="input-box" placeholder="Insert...">

                                                    <span id="err_surname"></span>
                                                </div>                                                          
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 b-text-style">
                                                    <label for="email">Email <span style="color: red">*</span></label>
                                                    
                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="text" name="registration_email" id="registration_email" class="input-box" placeholder="Insert...">

                                                    <span id="err_registration_email"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 b-text-style">
                                                    <label for="password">Password <span style="color: red">*</span></label>

                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="password" name="registration_password" id="registration_password" placeholder="Insert..." class="input-box">

                                                    <span id="err_registration_password"></span>
                                                </div>

                                                <div class="col-md-6 b-text-style">
                                                    <label for="cpassword">Confirm Password <span style="color: red">*</span></label>

                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="password" name="cpassword" id="cpassword" class="input-box" placeholder="Insert...">

                                                    <span id="err_cpassword"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 b-text-style">
                                                    <label for="birthday">Birthday <span style="color: red">*</span></label>
                                                </div>

                                                <div class="col-md-2 b-text-style" style="padding-top: 1%">
                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="text" name="bdate" id="bdate" placeholder="DD" class="input-box">
                                                </div>

                                                <div class="col-md-2 b-text-style" style="padding-top: 1%">
                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="text" name="bmonth" id="bmonth" placeholder="MM" class="input-box">
                                                </div>

                                                <div class="col-md-3 b-text-style" style="padding-top: 1%">
                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="text" name="byear" id="byear" placeholder="YYYY" class="input-box">
                                                </div>

                                                <div class="col-md-5"></div>

                                                <div class="col-md-12 b-text-style" style="padding-top: 1%">
                                                    <span id="err_birthday"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 b-text-style">
                                                    <label for="">Job</label>

                                                    <div class="select-area">
                                                        <select name="job" id="job">
                                                            <option value="">Select...</option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                            <option value="D">D</option>
                                                            <option value="E">E</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-6 b-text-style">
                                                    <label for="phone">Phone</label>

                                                    <input style="margin-bottom: 0; padding: 0 0 9px 0;" type="text" name="phone" id="phone" class="input-box" placeholder="Insert...">
                                                </div>

                                                <div class="col-md-6 b-text-style">
                                                    <label for="city">City</label>

                                                    <input style="margin-bottom: 0; padding: 0 0 9px 0;" type="text" name="city" id="city" class="input-box" placeholder="Insert...">
                                                </div>
                                            </div>
                            
                                            <div class="row">   
                                                <div class="col-md-12 popup-content">
                                                    <div class="label-area" style="margin-bottom: 2px">
                                                        <label class="containere"> 
                                                            <input type="checkbox" name="acceptance" id="acceptance" value="1">

                                                            <span class="checkmark" style="border-radius: 0"></span>
                                                            I Accept AGB Community etc.
                                                        </label> 
                                                    </div>

                                                    <span id="err_acceptance"></span> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row"> 
                                                <div class="col-md-12 b-text-style" style="text-align: center;">
                                                    <label for="profile_picture">Profile Picture</label>
                                                </div>

                                                <div class="col-lg-12" style="text-align: center;">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type="file" name="profile_picture" id="profile_picture">

                                                            <label title="Upload" for="profile_picture"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreviewPP" style="background-image: url(assets/img/1902270.png);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12" style="text-align: center;">
                                                    <label for="user_type">You are a Founder or Spectator?</label> 
                                                </div>
                                            </div> 

                                            <div class="row"> 
                                                <div class="col-md-6 radio-button-style" style="text-align: right;">
                                                    <label class="containere">Founder
                                                        <input type="radio" checked="checked" name="user_type" value="Founder">

                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="col-md-6 radio-button-style" style="text-align: left;">
                                                    <label class="containere">Spectator
                                                        <input type="radio" name="user_type" value="Spectator">

                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 custom-next-btn">
                                                    <div class="next-btn next-button-style">
                                                        <a class="custom-next-button-right text-center" href="" data-toggle="modal" onclick="open_modal()"> Next <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></i></a>
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
            </div>
        </div>
    </div>
    <!-- Registration PopUp End -->

    <!-- You Are the Only Founder PopUp Start -->
    <div class="modal fade modal-over-modal-show" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-section-style dialog-reg2" role="document">
            <div class="modal-content content-reg">
                <div class="modal-header">
                    <button style="outline: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="upload-video-btn">
                        <a style="top: -100px; cursor: default;" href="#">Registration</a>
                    </div>
              
                    <div class="modal-from-area" style="margin-top: 10vw;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <label for="">You are the only Founder?</label> 
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-md-2 column-in-center" style="text-align: center;">
                                    <label class="containere">Yes    
                                        <input type="radio" checked="checked" name="founder" value="Yes">

                                        <span class="checkmark"></span>
                                    </label>
                                  
                                    &emsp;

                                    <label class="containere">No
                                      <input type="radio" name="founder" value="No">
                                      <span class="checkmark"></span>
                                    </label>
                                </div> 
                            </div>

                            <br><br>

                            <div class="row">
                                <div class="col-lg-2 column-in-center">
                                    <div class="next-btn-custom next-button-style">
                                        <a class="custom-next-button-center text-center" href="" data-toggle="modal" onclick="modal_open()"> Next <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- You Are the Only Founder PopUp End -->

    <!-- Do You want to create a company page? PopUp Start -->
    <div class="modal fade modal-over-modal-show" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-section-style dialog-reg2" role="document">
            <div class="modal-content content-reg">
                <div class="modal-header">
                    <button style="outline: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="upload-video-btn">
                        <a style="top: -100px; cursor: default;" href="#">Registration</a>
                    </div>                                          
                      
                    <div class="modal-from-area" style="margin-top: 10vw;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <label for="">You own a Company?</label> 
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-md-2 column-in-center" style="text-align: center;">
                                    <label class="containere">Yes
                                        <input type="radio" checked="checked" name="owner" value="Yes">
                                        <span class="checkmark"></span>
                                    </label>
                          
                                    &emsp;

                                    <label class="containere">No
                                        <input type="radio" name="owner" value="No">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div> 

                            <br><br>

                            <div class="row">
                                <div class="col-lg-2 column-in-center">
                                    <div class="next-btn-custom next-button-style">
                                        <a class="custom-next-button-center text-center" href="" data-toggle="modal" onclick="modal6_open()"> Next <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Do You want to create a company page? PopUp End -->

    <!-- Company page PopUp Start -->
    <div class="modal fade modal-over-modal-show" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-section-style dialog-reg3" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button style="outline: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="upload-video-btn">
                        <a style="top: -100px; cursor: default;" href="#">Registration</a>

                        <div id="notification-container2" class="hidden">
                            <div class="notification notification--error" id="notification2" role="alert" aria-live="assertive">
                                <div class="icon-placeholder" aria-label="warning"></div>

                                <p id="message2"></p>

                                <div id="progress2">
                                    <div id="indicator2"></div>
                                </div>
                            </div>
                        </div>
                    </div>                                          
                      
                    <div class="modal-from-area">
                        <div class="container">                                 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 b-text-style">
                                                    <label for="company_name">Name of Your Company <span style="color: red">*</span></label>

                                                    <input style="margin-bottom: 5px; padding: 0 0 9px 0;" type="text" name="company_name" id="company_name" placeholder="Insert..." class="input-box">

                                                    <span id="err_company_name"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 b-text-style">
                                                    <label for="branch">Branch</label>

                                                    <div class="select-area">
                                                        <select name="branch" id="branch">
                                                            <option value="">Select...</option>
                                                            <option value="1">A</option>
                                                            <option value="2">B</option>
                                                            <option value="3">C</option>
                                                            <option value="4">D</option>
                                                            <option value="5">E</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 b-text-style">
                                                    <label for="category">Category <span style="color: red">*</span></label>

                                                    <div class="select-area">
                                                        <select name="category" id="category">
                                                            <option value="">Select...</option>
                                                            <option value="1">A</option>
                                                            <option value="2">B</option>
                                                            <option value="3">C</option>
                                                            <option value="4">D</option>
                                                            <option value="5">E</option>
                                                        </select>

                                                        <span id="err_category"></span>
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-12 b-text-style">
                                                    <label for="description">Description</label>

                                                    <input style="margin-bottom: 0; padding: 0 0 9px 0;" type="text" name="description" id="description" class="input-box" placeholder="Insert...">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 b-text-style">
                                                    <label for="date_of_foundation">Founded On</label>
                                                </div>

                                                <div class="col-md-2 b-text-style" style="padding-top: 1%">
                                                    <input style="margin-bottom: 0; padding: 0 0 9px 0;" type="text" name="fdate" id="fdate" placeholder="DD" class="input-box">
                                                </div>

                                                <div class="col-md-2 b-text-style" style="padding-top: 1%">
                                                    <input style="margin-bottom: 0; padding: 0 0 9px 0;" type="text" name="fmonth" id="fmonth" placeholder="MM" class="input-box">
                                                </div>

                                                <div class="col-md-3 b-text-style" style="padding-top: 1%">
                                                    <input style="margin-bottom: 0; padding: 0 0 9px 0;" type="text" name="fyear" id="fyear" placeholder="YYYY" class="input-box">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 b-text-style">
                                                    <label for="">Founders</label>
                                                </div>

                                                <div class="col-md-3 b-text-style">
                                                    <div class="avatar-upload" style="margin: 0">
                                                        <div class="avatar-edit" style="right: 99px; top: 0">
                                                            <input type="file" name="founder_picture1" id="founder_picture1">

                                                            <label title="Upload" for="founder_picture1"></label>
                                                        </div>
                                                        <div class="avatar-preview" style="width: 85px; height: 85px">
                                                            <div id="imagePreviewFP1" style="background-image: url(assets/img/1902270.png);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 b-text-style">
                                                    <div class="avatar-upload" style="margin: 0">
                                                        <div class="avatar-edit" style="right: 99px; top: 0">
                                                            <input type="file" name="founder_picture2" id="founder_picture2">

                                                            <label title="Upload" for="founder_picture2"></label>
                                                        </div>
                                                        <div class="avatar-preview" style="width: 85px; height: 85px">
                                                            <div id="imagePreviewFP2" style="background-image: url(assets/img/1902270.png);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 b-text-style">
                                                    <div class="avatar-upload" style="margin: 0">
                                                        <div class="avatar-edit" style="right: 99px; top: 0">
                                                            <input type="file" name="founder_picture3" id="founder_picture3">

                                                            <label title="Upload" for="founder_picture3"></label>
                                                        </div>
                                                        <div class="avatar-preview" style="width: 85px; height: 85px">
                                                            <div id="imagePreviewFP3" style="background-image: url(assets/img/1902270.png);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3"></div>

                                                <div class="col-md-12 b-text-style">
                                                    <span style="color: #ff6f00;">You Can Upload More Founders Images from Your User Panel.</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row"> 
                                                <div class="col-md-12 b-text-style" style="text-align: center;">
                                                    <label for="logo">Logo</label>
                                                </div>

                                                <div class="col-lg-12" style="text-align: center;">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type="file" name="logo" id="logo">

                                                            <label title="Upload" for="logo"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreviewTP" style="background-image: url(assets/img/title-icon.png);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="row">
                                                <div class="col-lg-12 custom-next-btn">
                                                    <div class="next-btn next-button-style">
                                                        <a class="custom-next-button-right text-center" href="" data-toggle="modal" onclick="modal7_open()"> Let's Go <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></i></a>
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
            </div>
        </div>
    </div>
    <!-- Company page PopUp End -->

    <!-- Post Your Idea Directly Page PopUp Start -->
    <div class="modal fade modal-over-modal-show" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-section-style dialog-reg2" role="document">
            <div class="modal-content content-reg">
                <div class="modal-header">
                    <button style="outline: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="upload-video-btn">
                        <a style="top: -100px; cursor: default;" href="#">Registration</a>
                    </div>                                          
                      
                    <div class="modal-from-area" style="margin-top: 10vw;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <label for="">Post your Idea directly?</label> 
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col-md-2 column-in-center" style="text-align: center;">
                                    <label class="containere">Yes
                                        <input type="radio" checked="checked" name="post" value="Yes">
                                        <span class="checkmark"></span>
                                    </label>
                          
                                    &emsp;

                                    <label class="containere">No
                                        <input type="radio" name="post" value="No">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> 
                            </div>
                      
                            <br><br>

                            <div class="row">
                                <div class="col-lg-2 column-in-center">
                                    <div class="next-btn-custom next-button-style">
                                        <a class="custom-next-button-center text-center" href="" data-toggle="modal" onclick="modal8_open()"> Next <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Your Idea Directly Page PopUp End -->
</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        <?php 
            if(isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])){
                $success_message = $_SESSION['success_message'];
            } else{
                $success_message = '';
            }
        ?>

        if('<?= $success_message ?>'){
            var notificationContainer = document.getElementById('notification-container0');
            var indicator = document.getElementById('indicator0');
            notificationContainer.style.width = document.body.clientWidth + 'px';

            $('#success_message').html("<?= $success_message ?>");

            hideNotification();

            notificationContainer.style.top = null;
            notificationContainer.style.display = null;
            notificationContainer.classList.remove('hidden');
            notificationContainer.classList.add('fadeout');
            indicator.classList.add('progress');
            notificationContainer.addEventListener('animationend', function() {
                hideNotification();
            }, false);

            window.addEventListener('resize', function() {
                notificationContainer.style.width = document.body.clientWidth + 'px';
            });

            function hideNotification() {
                notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                notificationContainer.classList.add('hidden');
                notificationContainer.classList.remove('fadeout');
                indicator.classList.remove('progress');
            }

            <?= $_SESSION['success_message'] = ''; ?>
        }
    });

    function readURLPP(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewPP').css('background-image', 'url('+e.target.result +')');
                $('#imagePreviewPP').hide();
                $('#imagePreviewPP').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLTP(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewTP').css('background-image', 'url('+e.target.result +')');
                $('#imagePreviewTP').hide();
                $('#imagePreviewTP').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLFP1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewFP1').css('background-image', 'url('+e.target.result +')');
                $('#imagePreviewFP1').hide();
                $('#imagePreviewFP1').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLFP2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewFP2').css('background-image', 'url('+e.target.result +')');
                $('#imagePreviewFP2').hide();
                $('#imagePreviewFP2').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLFP3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreviewFP3').css('background-image', 'url('+e.target.result +')');
                $('#imagePreviewFP3').hide();
                $('#imagePreviewFP3').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function(){
        $("#profile_picture").change(function() {
            readURLPP(this);
        });

        $("#logo").change(function() {
            readURLTP(this);
        });

        $("#founder_picture1").change(function() {
            readURLFP1(this);
        });

        $("#founder_picture2").change(function() {
            readURLFP2(this);
        });

        $("#founder_picture3").change(function() {
            readURLFP3(this);
        });
    });

    var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;
    var phone_regex = /^[0-9]+$/;
    var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var birthday_regex = /^[-+]?\d+$/;

    $(document).ready(function(){
        <?php 
            if(isset($_SESSION['logged_in_email']) && !empty($_SESSION['logged_in_email'])){
                $logged_in_email = $_SESSION['logged_in_email'];
            } else{
                $logged_in_email = '';
            }
        ?>

        $('#upload_link').on('click', function(e){
            var notificationContainer = document.getElementById('notification-container0');
            var indicator = document.getElementById('indicator0');
            notificationContainer.style.width = document.body.clientWidth + 'px';

            if('<?= $logged_in_email ?>'){
                var flag = true;
                if($('#login_email').val()){
                    $.ajax({
                        url: "backend/validation.php",
                        type: "POST",
                        dataType: "JSON",
                        async: false,
                        data : {
                            logged_in_email: '<?= $logged_in_email ?>'
                        },
                        success: function (response) {
                            if(response.status == false){
                                flag = false;

                                $('#success_message').html('This User is not Verified Yet! Please Try Again.');

                                hideNotification();

                                notificationContainer.style.top = null;
                                notificationContainer.style.display = null;
                                notificationContainer.classList.remove('hidden');
                                notificationContainer.classList.add('fadeout');
                                indicator.classList.add('progress');
                                notificationContainer.addEventListener('animationend', function() {
                                    hideNotification();
                                }, false);

                                window.addEventListener('resize', function() {
                                    notificationContainer.style.width = document.body.clientWidth + 'px';
                                });

                                function hideNotification() {
                                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                                    notificationContainer.classList.add('hidden');
                                    notificationContainer.classList.remove('fadeout');
                                    indicator.classList.remove('progress');
                                };
                            }
                        }
                    });
                }

                if(flag){
                    $(this).prop("href", "profile.php");
                }
            } else {
                $('#success_message').html("Restricted! Please Login to Continue.");

                hideNotification();

                notificationContainer.style.top = null;
                notificationContainer.style.display = null;
                notificationContainer.classList.remove('hidden');
                notificationContainer.classList.add('fadeout');
                indicator.classList.add('progress');
                notificationContainer.addEventListener('animationend', function() {
                    hideNotification();
                }, false);

                window.addEventListener('resize', function() {
                    notificationContainer.style.width = document.body.clientWidth + 'px';
                });

                function hideNotification() {
                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                    notificationContainer.classList.add('hidden');
                    notificationContainer.classList.remove('fadeout');
                    indicator.classList.remove('progress');
                }
            }
        });

        $('#profile_link').on('click', function(e){
            var notificationContainer = document.getElementById('notification-container0');
            var indicator = document.getElementById('indicator0');
            notificationContainer.style.width = document.body.clientWidth + 'px';

            if('<?= $logged_in_email ?>'){
                var flag = true;
                if($('#login_email').val()){
                    $.ajax({
                        url: "backend/validation.php",
                        type: "POST",
                        dataType: "JSON",
                        async: false,
                        data : {
                            logged_in_email: '<?= $logged_in_email ?>'
                        },
                        success: function (response) {
                            if(response.status == false){
                                flag = false;

                                $('#success_message').html('This User is not Verified Yet! Please Try Again.');

                                hideNotification();

                                notificationContainer.style.top = null;
                                notificationContainer.style.display = null;
                                notificationContainer.classList.remove('hidden');
                                notificationContainer.classList.add('fadeout');
                                indicator.classList.add('progress');
                                notificationContainer.addEventListener('animationend', function() {
                                    hideNotification();
                                }, false);

                                window.addEventListener('resize', function() {
                                    notificationContainer.style.width = document.body.clientWidth + 'px';
                                });

                                function hideNotification() {
                                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                                    notificationContainer.classList.add('hidden');
                                    notificationContainer.classList.remove('fadeout');
                                    indicator.classList.remove('progress');
                                };
                            }
                        }
                    });
                }

                if(flag){
                    $(this).prop("href", "profile.php");
                }
            }
        });

        $('#company_link').on('click', function(e){
            var notificationContainer = document.getElementById('notification-container0');
            var indicator = document.getElementById('indicator0');
            notificationContainer.style.width = document.body.clientWidth + 'px';

            if('<?= $logged_in_email ?>'){
                var flag = true;
                if($('#login_email').val()){
                    $.ajax({
                        url: "backend/validation.php",
                        type: "POST",
                        dataType: "JSON",
                        async: false,
                        data : {
                            logged_in_email: '<?= $logged_in_email ?>'
                        },
                        success: function (response) {
                            if(response.status == false){
                                flag = false;

                                $('#success_message').html('This User is not Verified Yet! Please Try Again.');

                                hideNotification();

                                notificationContainer.style.top = null;
                                notificationContainer.style.display = null;
                                notificationContainer.classList.remove('hidden');
                                notificationContainer.classList.add('fadeout');
                                indicator.classList.add('progress');
                                notificationContainer.addEventListener('animationend', function() {
                                    hideNotification();
                                }, false);

                                window.addEventListener('resize', function() {
                                    notificationContainer.style.width = document.body.clientWidth + 'px';
                                });

                                function hideNotification() {
                                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                                    notificationContainer.classList.add('hidden');
                                    notificationContainer.classList.remove('fadeout');
                                    indicator.classList.remove('progress');
                                };
                            }
                        }
                    });
                }

                if(flag){
                    $(this).prop("href", "company.php");
                }
            }
        });

        $('#user_panel_link').on('click', function(e){
            var notificationContainer = document.getElementById('notification-container0');
            var indicator = document.getElementById('indicator0');
            notificationContainer.style.width = document.body.clientWidth + 'px';

            if('<?= $logged_in_email ?>'){
                var flag = true;
                if($('#login_email').val()){
                    $.ajax({
                        url: "backend/validation.php",
                        type: "POST",
                        dataType: "JSON",
                        async: false,
                        data : {
                            logged_in_email: '<?= $logged_in_email ?>'
                        },
                        success: function (response) {
                            if(response.status == false){
                                flag = false;

                                $('#success_message').html('This User is not Verified Yet! Please Try Again.');

                                hideNotification();

                                notificationContainer.style.top = null;
                                notificationContainer.style.display = null;
                                notificationContainer.classList.remove('hidden');
                                notificationContainer.classList.add('fadeout');
                                indicator.classList.add('progress');
                                notificationContainer.addEventListener('animationend', function() {
                                    hideNotification();
                                }, false);

                                window.addEventListener('resize', function() {
                                    notificationContainer.style.width = document.body.clientWidth + 'px';
                                });

                                function hideNotification() {
                                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                                    notificationContainer.classList.add('hidden');
                                    notificationContainer.classList.remove('fadeout');
                                    indicator.classList.remove('progress');
                                };
                            }
                        }
                    });
                }

                if(flag){
                    $(this).prop("href", "user-panel");
                }
            }
        });

        $('#logout_link').on('click', function(e){
            $(this).prop("href", "backend/logout.php");
        });

        $("#login_submit").on('click', function(e){
            e.preventDefault();

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

            var notificationContainer = document.getElementById('notification-container1');
            var indicator = document.getElementById('indicator1');
            notificationContainer.style.width = document.body.clientWidth + 'px';

            var flag = true;
            if($('#login_email').val()){
                $.ajax({
                    url: "backend/validation.php",
                    type: "POST",
                    dataType: "JSON",
                    async: false,
                    data : {
                        login_email: login_email,
                        login_password: login_password
                    },
                    success: function (response) {
                        if(response.status == false){
                            flag = false;

                            $('#message1').html('Invalid Email or Password! Please Ty Again.');

                            hideNotification();

                            notificationContainer.style.top = null;
                            notificationContainer.style.display = null;
                            notificationContainer.classList.remove('hidden');
                            notificationContainer.classList.add('fadeout');
                            indicator.classList.add('progress');
                            notificationContainer.addEventListener('animationend', function() {
                                hideNotification();
                            }, false);

                            window.addEventListener('resize', function() {
                                notificationContainer.style.width = document.body.clientWidth + 'px';
                            });

                            function hideNotification() {
                                notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                                notificationContainer.classList.add('hidden');
                                notificationContainer.classList.remove('fadeout');
                                indicator.classList.remove('progress');
                            };
                        } else if(response.status == 'Pending'){
                            flag = false;

                            $('#message1').html('This User is not Verified Yet! Please Try Again.');

                            hideNotification();

                            notificationContainer.style.top = null;
                            notificationContainer.style.display = null;
                            notificationContainer.classList.remove('hidden');
                            notificationContainer.classList.add('fadeout');
                            indicator.classList.add('progress');
                            notificationContainer.addEventListener('animationend', function() {
                                hideNotification();
                            }, false);

                            window.addEventListener('resize', function() {
                                notificationContainer.style.width = document.body.clientWidth + 'px';
                            });

                            function hideNotification() {
                                notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                                notificationContainer.classList.add('hidden');
                                notificationContainer.classList.remove('fadeout');
                                indicator.classList.remove('progress');
                            };
                        }
                    }
                });
            }

            if(flag){
                $('#login_form').submit();
            }
        });
    });

    function open_modal(){
        var first_name = $('#first_name').val().trim();
        $('#first_name').val(first_name);
        var surname = $('#surname').val().trim();
        $('#surname').val(surname);
        var registration_email = $('#registration_email').val().trim();
        $('#registration_email').val(registration_email);
        var registration_password = $('#registration_password').val().trim();
        $('#registration_password').val(registration_password);
        var cpassword = $('#cpassword').val().trim();
        $('#cpassword').val(cpassword);
        var bdate = $('#bdate').val().trim();
        $('#bdate').val(bdate);
        var bmonth = $('#bmonth').val().trim();
        $('#bmonth').val(bmonth);
        var byear = $('#byear').val().trim();
        $('#byear').val(byear);
        var phone = $('#phone').val().trim();
        $('#phone').val(phone);

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
            $("#err_surname").html('Please Insert Surname.').css('color', 'red');
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

        if(registration_email == null || registration_email == ""){
            $("#err_registration_email").html('Please Insert Email.').css('color', 'red');
            return false;
        } else{
            $("#err_registration_email").html('');
        }

        if (!registration_email.match(email_regex) ){
            $('#err_registration_email').html('Please Insert a Valid Email.').css('color', 'red');
            return false;
        } else{
            $("#err_registration_email").html('');
        }

        if(registration_password == null || registration_password == ""){
            $("#err_registration_password").html('Please Insert Password.').css('color', 'red');
            return false;
        } else{
            $("#err_registration_password").html('');
        }

        if (registration_password.length < 8){
            $('#err_registration_password').html('Password Must Contain At Least 8 Characters.').css('color', 'red');  
            return false;
        } else{
            $("#err_registration_password").html('');
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

        if (registration_password !== cpassword){
            $('#err_cpassword').html('Password And Confirm Password Mismatched.').css('color', 'red');  
            return false;
        } else{
            $("#err_cpassword").html('');
        }

        if(bdate == null || bdate == ""){
            $("#err_birthday").html('Please Insert Full Birth Date.').css('color', 'red');
            return false;
        } else{
            $("#err_birthday").html('');
        }

        if (!bdate.match(birthday_regex)) {
            $('#err_birthday').html('Please Insert a Valid Birth Date.').css('color', 'red');  
            return false;
        } else{
            $("#err_birthday").html('');
        }

        if(bmonth == null || bmonth == ""){
            $("#err_birthday").html('Please Insert Full Birth Date.').css('color', 'red');
            return false;
        } else{
            $("#err_birthday").html('');
        }

        if (!bmonth.match(birthday_regex)) {
            $('#err_birthday').html('Please Insert a Valid Birth Date.').css('color', 'red');  
            return false;
        } else{
            $("#err_birthday").html('');
        }

        if(byear == null || byear == ""){
            $("#err_birthday").html('Please Insert Full Birth Date.').css('color', 'red');
            return false;
        } else{
            $("#err_birthday").html('');
        }

        if (!byear.match(birthday_regex)) {
            $('#err_birthday').html('Please Insert a Valid Birth Date.').css('color', 'red');  
            return false;
        } else{
            $("#err_birthday").html('');
        }

        if(!$('#acceptance').is(':checked')){
            $('#err_acceptance').html('Please Accept AGB Community etc.').css('color', 'red');  
            return false;
        } else{
            $("#err_acceptance").html('');
        }

        var notificationContainer = document.getElementById('notification-container');
        var indicator = document.getElementById('indicator');
        notificationContainer.style.width = document.body.clientWidth + 'px';

        var flag = true;
        if($('#registration_email').val()){
            $.ajax({
                url: "backend/validation.php",
                type: "POST",
                dataType: "JSON",
                data : {
                    email: registration_email
                },
                async: false,
                success: function (response) {
                    if(response.status == true){
                        flag = false;

                        $('#message').html('Email Address Exists! Please Try With Another One.');

                        hideNotification();

                        notificationContainer.style.top = null;
                        notificationContainer.style.display = null;
                        notificationContainer.classList.remove('hidden');
                        notificationContainer.classList.add('fadeout');
                        indicator.classList.add('progress');
                        notificationContainer.addEventListener('animationend', function() {
                            hideNotification();
                        }, false);

                        window.addEventListener('resize', function() {
                            notificationContainer.style.width = document.body.clientWidth + 'px';
                        });

                        function hideNotification() {
                            notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                            notificationContainer.classList.add('hidden');
                            notificationContainer.classList.remove('fadeout');
                            indicator.classList.remove('progress');
                        };
                    }
                }
            });
        }

        var flag2 = true;
        if($('#profile_picture').val()){
            var p_ext = $('#profile_picture').val().split('.').pop().toLowerCase();
            var p_size = ($('#profile_picture')[0].files[0].size);

            if(($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1) || (p_size > 2097152)){
                flag2 = false;

                if($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1)
                    $('#message').html('Profile Picture Format is Invalid! Must be in .png, .jpg or .jpeg Format.');
                else
                    $('#message').html('Profile Picture Size Limit Exceeds! Size Must be Below 2 MB.');

                hideNotification();

                notificationContainer.style.top = null;
                notificationContainer.style.display = null;
                notificationContainer.classList.remove('hidden');
                notificationContainer.classList.add('fadeout');
                indicator.classList.add('progress');
                notificationContainer.addEventListener('animationend', function() {
                    hideNotification();
                }, false);

                window.addEventListener('resize', function() {
                    notificationContainer.style.width = document.body.clientWidth + 'px';
                });

                function hideNotification() {
                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                    notificationContainer.classList.add('hidden');
                    notificationContainer.classList.remove('fadeout');
                    indicator.classList.remove('progress');
                };
            } 
        }

        if(flag && flag2){
            $("#exampleModal3 .close").click();
        
            if($("input[name='user_type']:checked").val() == 'Founder'){
                $('#exampleModal4').modal('show');
            }
        }
    }

    function modal_open(){
        $("#exampleModal4 .close").click();
     
        if($("input[name='founder']:checked").val() == 'Yes') 
            $('#exampleModal5').modal('show');
        else
            $('#exampleModal6').modal('show');
    }

    function modal6_open(){
        $("#exampleModal5 .close").click();
     
        if($("input[name='owner']:checked").val() == 'Yes')   
            $('#exampleModal6').modal('show');
        else
            $('#exampleModal7').modal('show');
    }

    function modal7_open(){
        var name_regex = /^[a-z0-9\040\.\-\,\/]+$/i;
        var company_name = $('#company_name').val().trim();
        $('#company_name').val(company_name);

        var category = $('#category').val().trim();
        $('#category').val(category);
        
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

        if(category == null || category == ""){
            $("#err_category").html('Please Select Category.').css('color', 'red');
            return false;
        } else{
            $("#err_category").html('');
        }

        var notificationContainer = document.getElementById('notification-container2');
        var indicator = document.getElementById('indicator2');
        notificationContainer.style.width = document.body.clientWidth + 'px';

        var flag = true;
        if($('#founder_picture1').val()){
            var p_ext = $('#founder_picture1').val().split('.').pop().toLowerCase();
            var p_size = ($('#founder_picture1')[0].files[0].size);

            if(($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1) || (p_size > 2097152)){
                flag = false;

                if($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1)
                    $('#message2').html('Founder Picture Format is Invalid! Must be in .png, .jpg or .jpeg Format.');
                else
                    $('#message2').html('Founder Picture Size Limit Exceeds! Size Must be Below 2 MB.');

                hideNotification();

                notificationContainer.style.top = null;
                notificationContainer.style.display = null;
                notificationContainer.classList.remove('hidden');
                notificationContainer.classList.add('fadeout');
                indicator.classList.add('progress');
                notificationContainer.addEventListener('animationend', function() {
                    hideNotification();
                }, false);

                window.addEventListener('resize', function() {
                    notificationContainer.style.width = document.body.clientWidth + 'px';
                });

                function hideNotification() {
                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                    notificationContainer.classList.add('hidden');
                    notificationContainer.classList.remove('fadeout');
                    indicator.classList.remove('progress');
                };
            } 
        }

        var flag2 = true;
        if($('#founder_picture2').val()){
            var p_ext = $('#founder_picture2').val().split('.').pop().toLowerCase();
            var p_size = ($('#founder_picture2')[0].files[0].size);

            if(($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1) || (p_size > 2097152)){
                flag2 = false;

                if($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1)
                    $('#message2').html('Founder Picture Format is Invalid! Must be in .png, .jpg or .jpeg Format.');
                else
                    $('#message2').html('Founder Picture Size Limit Exceeds! Size Must be Below 2 MB.');

                hideNotification();

                notificationContainer.style.top = null;
                notificationContainer.style.display = null;
                notificationContainer.classList.remove('hidden');
                notificationContainer.classList.add('fadeout');
                indicator.classList.add('progress');
                notificationContainer.addEventListener('animationend', function() {
                    hideNotification();
                }, false);

                window.addEventListener('resize', function() {
                    notificationContainer.style.width = document.body.clientWidth + 'px';
                });

                function hideNotification() {
                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                    notificationContainer.classList.add('hidden');
                    notificationContainer.classList.remove('fadeout');
                    indicator.classList.remove('progress');
                };
            } 
        }

        var flag3 = true;
        if($('#founder_picture3').val()){
            var p_ext = $('#founder_picture3').val().split('.').pop().toLowerCase();
            var p_size = ($('#founder_picture3')[0].files[0].size);

            if(($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1) || (p_size > 2097152)){
                flag3 = false;

                if($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1)
                    $('#message2').html('Founder Picture Format is Invalid! Must be in .png, .jpg or .jpeg Format.');
                else
                    $('#message2').html('Founder Picture Size Limit Exceeds! Size Must be Below 2 MB.');

                hideNotification();

                notificationContainer.style.top = null;
                notificationContainer.style.display = null;
                notificationContainer.classList.remove('hidden');
                notificationContainer.classList.add('fadeout');
                indicator.classList.add('progress');
                notificationContainer.addEventListener('animationend', function() {
                    hideNotification();
                }, false);

                window.addEventListener('resize', function() {
                    notificationContainer.style.width = document.body.clientWidth + 'px';
                });

                function hideNotification() {
                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                    notificationContainer.classList.add('hidden');
                    notificationContainer.classList.remove('fadeout');
                    indicator.classList.remove('progress');
                };
            } 
        }

        var flag4 = true;
        if($('#logo').val()){
            var p_ext = $('#logo').val().split('.').pop().toLowerCase();
            var p_size = ($('#logo')[0].files[0].size);

            if(($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1) || (p_size > 2097152)){
                flag4 = false;

                if($.inArray(p_ext, ['png', 'jpg', 'jpeg']) == -1)
                    $('#message2').html('Logo Format is Invalid! Must be in .png, .jpg or .jpeg Format.');
                else
                    $('#message2').html('Logo Size Limit Exceeds! Size Must be Below 2 MB.');

                hideNotification();

                notificationContainer.style.top = null;
                notificationContainer.style.display = null;
                notificationContainer.classList.remove('hidden');
                notificationContainer.classList.add('fadeout');
                indicator.classList.add('progress');
                notificationContainer.addEventListener('animationend', function() {
                    hideNotification();
                }, false);

                window.addEventListener('resize', function() {
                    notificationContainer.style.width = document.body.clientWidth + 'px';
                });

                function hideNotification() {
                    notificationContainer.style.top = notificationContainer.offsetHeight * -1 + 'px';
                    notificationContainer.classList.add('hidden');
                    notificationContainer.classList.remove('fadeout');
                    indicator.classList.remove('progress');
                };
            } 
        }

        if(flag && flag2 && flag3 && flag4){
            $("#exampleModal6 .close").click();
            $('#exampleModal7').modal('show');
        }
    }

    function modal8_open(){
        $("#exampleModal7 .close").click();

        $('form#registration_form').submit();
    }
</script>