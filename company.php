<!DOCTYPE html>
<html lang="en">
    <?php 
        include('includes/header.php');

        if(!$_SESSION['logged_in_email']){
            header("Location: index.php");
        } else{
            $email = $_SESSION['logged_in_email'];

            $sql = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
            $result = $con->query($sql);

            if($result->num_rows > 0){
                $formdata = $result->fetch_assoc();
                $user_id = $formdata['user_id'];

                $sql2 = "SELECT * FROM company WHERE user_id = '$user_id' LIMIT 1";
                $result2 = $con->query($sql2);
                $formdata2 = $result2->fetch_assoc();
            }
        }
    ?>

    <style type="text/css">
        .button_outer{
            background: #ff6f00; 
            border-radius: 5px; 
            text-align: center; 
            height: 42px; 
            width: 127px; 
            display: inline-block; 
            transition: .2s; 
            position: relative; 
            overflow: hidden;
        }
        .btn_upload{
            padding: 9px 21px 9px;
            color: #fff; 
            text-align: center; 
            position: relative; 
            display: inline-block; 
            overflow: hidden; 
            z-index: 3; 
            white-space: nowrap;
        }
        .btn_upload input{
            position: absolute; 
            width: 100%; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            cursor: pointer; 
            opacity: 0;
        }
        .file_uploading{
            width: 100%; 
            height: 10px; 
            margin-top: 20px; 
            background: #ccc;
        }
        .file_uploading .btn_upload{
            display: none;
        }
        .processing_bar{
            position: absolute; 
            left: 0; 
            top: 0; 
            width: 0; 
            height: 100%; 
            border-radius: 30px; 
            background: #ff6f00; 
            transition: 3s;
        }
        .file_uploading .processing_bar{
            width: 100%;
        }
        .success_box{
            display: none; 
            width: 50px; 
            height: 50px; 
            position: relative;
        }
        .success_box:before{
            content: ''; 
            display: block; 
            width: 16px; 
            height: 28px; 
            border-bottom: 6px solid #fff; 
            border-right: 6px solid #fff; 
            -webkit-transform: rotate(45deg); 
            -moz-transform: rotate(45deg); 
            -ms-transform: rotate(45deg); 
            transform: rotate(45deg); 
            position: absolute; 
            left: 17px; 
            top: 8px;
        }
        .file_uploaded .success_box{
            display: inline-block;
        }
        .file_uploaded{
            margin-top: 0; 
            width: 50px; 
            background: #ff6f00; 
            height: 50px;
        }
        .uploaded_file_view{
            max-width: 300px; 
            margin: 8px auto; 
            text-align: center; 
            position: relative; 
            transition: .2s; 
            opacity: 0; 
            border: 2px 
            solid #ddd; 
            padding: 15px;
        }
        .file_remove{
            width: 30px; 
            height: 30px; 
            border-radius: 50%; 
            display: block; 
            position: absolute; 
            background: #aaa; 
            line-height: 30px; 
            color: #fff; 
            font-size: 12px; 
            cursor: pointer; 
            right: -15px; 
            top: -15px;
        }
        .file_remove:hover{
            background: #222; 
            transition: .2s;
        }
        .uploaded_file_view img{
            max-width: 100%;
        }
        .uploaded_file_view.show{
            opacity: 1;
        }
        .error_msg{
            text-align: center; 
            color: #f00;
        }
        .success_msg{
            text-align: center; 
            color: #01a33c;
        }
        .submit-btn{
            border: none; 
            color: #fff; 
            cursor: pointer; 
            background: #ff6f00; 
            border-radius: 5px; 
            height: 42px; 
            width: 127px; 
            display: none;
        }

        .custom-link{
            color: #ff6f00 !important;
        }
        .custom-link:hover{
            text-decoration: underline;
        }
    </style>

    <body class="Category-page" style="background: #12151e">
        <div class="profile-page-top-banner" style="<?php if($formdata2['logo']){ ?> background-image: url(backend/uploads/<?= $formdata2['logo']; ?>); <?php } else{ ?> background-image: url(assets/img/<?= 'profile-banner.jpg'; ?>); <?php } ?>">
        </div>

        <div class="profile-main-content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="profile-left-content">
                            <div class="text-center" style="color: #fff; font-size: 30px;">
                            	Grunders
                            </div>

                            <?php 
                                $founders = explode(',', $formdata2['founders']);

                                foreach ($founders as $key => $value) {
                            ?>
                                    <div class="mt-5 profile-img-company">
                                		<img style="height: 120px; border: 5px solid #ff5722" class="rounded-circle" src="<?= 'backend/uploads/' . $value; ?>" alt="">
                    
                                        <div class="profile-details-company">
                                        	<h4>Tobias Scholz <span>Art Derector</span></h4>
                    
                                        	<div class="contact-links-company">
                                        		<a href="#" style=""><i class="fa fa-facebook"></i></a>
                                                <a href="#" ><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        	</div>
                                        </div>
                                    </div>
                            <?php 
                                }
                            ?>
                            
                            <div class="pro-form-company">
                                <form action="">
                                    <div class="single-fildes">
                                        <label for="">Rechtform</label>
            
                                        <input style="outline: none; pointer-events: none;" type="text" placeholder="<?php if($formdata2['legal_form']){ echo $formdata2['legal_form']; } else{ echo 'Not Available'; } ?>">
                                    </div>
                                    <div class="single-fildes">
                                        <label for="">Branche</label>
            
                                        <input style="outline: none; pointer-events: none;" type="text" placeholder="<?php echo 'Not Available'; ?>">
                                    </div>
                                    <div class="single-fildes">
                                        <label for="">Firmensitz</label>
            
                                        <input style="outline: none; pointer-events: none;" type="text" placeholder="<?php if($formdata2['headquarters']){ echo $formdata2['headquarters']; } else{ echo 'Not Available'; } ?>">
                                    </div>
                                    <div class="single-fildes">
                                        <label for="">Grundungstadum</label>
            
                                        <input style="outline: none; pointer-events: none;" type="text" placeholder="<?php if($formdata2['date_of_foundation']){ echo $formdata2['date_of_foundation']; } else{ echo 'Not Available'; } ?>">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
              		<!-- Company right 8 columns starts -->
                    <div class="col-xl-8 rightcolumn">
                    	<div class="row p-l-row"> 
                        	<div class="col-xl-12 bg-dark-grey">
                        		<div class="video-upload-box-company">
		                      		<div class="video-upload-content-company">
                                        <form id="logo_form" action="backend/update_company_logo.php" method="POST" enctype="multipart/form-data">
    		                          		<h4 style=>Ladet euer Logo hoch</h4>

                                            <div class="button_outer">
                                                <div class="btn_upload">
                                                    <input type="file" id="company_logo" name="company_logo">

                                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp; Upload
                                                </div>

                                                <div class="processing_bar"></div>

                                                <div class="success_box"></div>
                                            </div>

                                            <div class="error_msg"></div>
                                            <div class="success_msg"></div>

                                            <span id="err_company_logo"></span><br>

                                            <input type="hidden" name="company_id" value="<?= $formdata2['company_id']; ?>">
                                            <input id="submit_btn" class="submit-btn" type="submit" value="Submit">
                                        </form>
		                      		</div>
		                      		
		                      		<div class="video-content-below">
		                      			<h4>Geox <span>Der Schuh der stmet</span></h4> 
		                      		</div>
		    					</div>

                            	<div class="video-detail">
              						<h5>Beschreibung</h5>
            
              						<p><?php if($formdata2['description']){ echo $formdata2['description']; } else{ echo 'Not Available'; } ?></p>
              					</div>
            
                            	<div class="btn-grp-company">
                                	<a href="#" class="company-btn">Nachricht schreiben</a>
                                	<a href="#" class="company-btn">Businessplan anfordern</a>
                            	</div>
            				</div>
                    	</div>
            
                    	<div class="row m-t-40">
                      		<div class="col-xl-12" style="padding: 0 20px">
                           		<div class="blog-top-title-company" style="">
                               		<h1 style="">Unser Pitch</span></h1>
                           		</div>
                      		</div>
                    	</div>
                    
                    	<div class="row">
                            <?php 
                                $user_id = $formdata2['user_id'];

                                $sql3 = "SELECT * FROM video WHERE user_id = '$user_id' AND status = 'Active' ORDER BY RAND()";
                                $result3 = $con->query($sql3);

                                if($result3->num_rows > 0){
                                    while($row = $result3->fetch_assoc()){
                                        $video_id = $row['video_id'];
                                        $video_url = explode(',', $row['video_url']);
                                        $video_height = explode(',', $row['video_height']);
                            ?>
                             			<div class="col-lg-6 col-md-6" style="padding: 20px">
                                 			<div class="sigle-blg-item">
                                                <a href="single-post.php?video_id=<?= $video_id; ?>"><div class="blog-img" style="background-image: url(backend/uploads/videos/<?= $row['thumbnail']; ?>)">
                                                </div></a>

                                     			<div class="blog-content">
                                                    <div class="blog-content-top-sec">
                                                        <p><img src="assets/img/vd-cam-icon.png" alt=""><?= $row['creation_datetime']; ?></p>
                                                        <div class="social-icons">
                                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                                        </div>
                                                    </div>

                                                    <div class="main-content-sec">
                                                        <h3><a class="custom-link" href="single-post.php?video_id=<?= $video_id; ?>"><?= $row['video_title']; ?></a></h3>
                                                    </div>

                                                    <div class="blog-activitis">
                                                        <a style="color: #fff"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span><?= $row['no_of_likes']; ?></span></a>
                                                        <a style="color: #fff"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i><span><?= $row['no_of_dislikes']; ?></span></a>
                                                        <a style="color: #fff"><i class="fa fa-eye" aria-hidden="true"></i><span><?= $row['no_of_views']; ?></span></a>
                                                    </div>
                                                </div>
                                 			</div>
                             			</div>
                            <?php 
                                    }
                                }
                            ?>
                  		</div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php') ?>
    </body>
</html>

<script type="text/javascript">
    var btnUpload = $("#company_logo");
    var btnOuter = $(".button_outer");

    btnUpload.on("change", function(e){
        var ext = btnUpload.val().split('.').pop().toLowerCase();
        
        if($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1){
            $(".error_msg").text("Invalid Image Format.");
        } else{
            $(".error_msg").text("");
            $("#err_company_logo").html("");

            btnOuter.addClass("file_uploading");
            
            setTimeout(function(){
                btnOuter.addClass("file_uploaded");
            }, 3000);

            var uploadedFile = URL.createObjectURL(e.target.files[0]);

            setTimeout(function(){
                $(".success_msg").text("Your Image is Ready for Upload.");
                $("#submit_btn").css("display", "inline-block");
            }, 3500);
        }
    });

    $(".file_remove").on("click", function(e){
        $("#uploaded_view").removeClass("show");
        $("#uploaded_view").find("img").remove();
        btnOuter.removeClass("file_uploading");
        btnOuter.removeClass("file_uploaded");
    });

    $('#logo_form').on('submit', function(e){
        var logo = $('#company_logo').val();

        if(logo == null || logo == ""){
            $("#err_company_logo").html('Please Upload Logo.').css('color', 'red');
            return false;
        } else{
            $("#err_company_logo").html('');
        }

        $('form#logo_form').submit();
    });
</script>