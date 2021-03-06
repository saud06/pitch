<!DOCTYPE html>
<html lang="en">
	<?php 
        include('includes/header.php');

        $user_ip = $_SERVER['REMOTE_ADDR'];

        if(isset($_SESSION['logged_in_email']) && !empty($_SESSION['logged_in_email'])){
            $email = $_SESSION['logged_in_email'];

            $sql0 = "SELECT * FROM user WHERE email = '$email' AND status = 'Active' LIMIT 1";
            $result0 = $con->query($sql0);
            $formdata0 = $result0->fetch_assoc();
            $session_user_id = $formdata0['user_id'];
        } else{
            $session_user_id = 0;
        }

        $video_id = $_GET['video_id'];
        $sql = "SELECT * FROM video WHERE video_id = '$video_id' AND status = 'Active' LIMIT 1";
        $result = $con->query($sql);

        if($result->num_rows > 0){
            $formdata = $result->fetch_assoc();
            $post_type_id = $formdata['post_type_id'];

            $sql2 = "SELECT * FROM post_type WHERE post_type_id IN ('$post_type_id') AND status = 'Active' LIMIT 1";
            $result2 = $con->query($sql2);
            $formdata2 = $result2->fetch_assoc();

            $user_id = $formdata['user_id'];

            $sql3 = "SELECT * FROM user WHERE user_id = '$user_id' AND status = 'Active' LIMIT 1";
            $result3 = $con->query($sql3);
            $formdata3 = $result3->fetch_assoc();
        } 
    ?>

    <style type="text/css">
        .custom-link:hover{
            text-decoration: underline;
        }
    </style>

    <body class="post-page">
        <!-- Blog area start -->
        <div class="post-area">
         	<div class="post-title text-center">
                <h1><?= $formdata2['type_name']; ?></h1>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2"></div>

            		<div class="col-lg-8">
            			<div class="post-top-video">
                            <video controls crossorigin playsinline poster="backend/uploads/videos/<?= $formdata['thumbnail']; ?>" id="player0">
                                <?php 
                                    $video_url = explode(',', $formdata['video_url']);
                                    $video_height = explode(',', $formdata['video_height']);
                                    foreach($video_url as $key => $value){
                                ?>
                                        <source src="backend/uploads/videos/<?= $value; ?>" type="video/mp4" size="<?= $video_height[$key] ?>">
                                <?php 
                                    }
                                ?>
                            </video>

            				<h2 style="margin-top: 10px;"><?= $formdata['video_title']; ?></h2>
            			</div>
            		</div>

                    <div class="col-lg-2"></div>

            		<div class="col-lg-12">
            			<div id="likedislike" class="likedislike">
            				<div class="views-like">
	            				<div id="view" class="view">
	            					<p>Views <span>(<?= $formdata['no_of_views']; ?>)</span></p>
	            				</div>
	            			</div>

	            			<div class="linke">
                                <?php 
                                    $video_like_no = $formdata['no_of_likes'];
                                    $video_dislike_no = $formdata['no_of_dislikes'];

                                    $sql00 = "SELECT * FROM history WHERE likes = 1 AND video_id = '$video_id' AND user_ip = '$user_ip'";
                                    $result00 = $con->query($sql00);
                                    $formdata00 = $result00->fetch_assoc();
                                    
                                    if($result00->num_rows == 0){
                                        $like_color = '#fff';
                                    } else{
                                        $like_color = '#ff6f00';
                                    }

                                    $sql000 = "SELECT * FROM history WHERE dislikes = 1 AND video_id = '$video_id' AND user_ip = '$user_ip'";
                                    $result000 = $con->query($sql000);
                                    $formdata000 = $result000->fetch_assoc();
                                    
                                    if($result000->num_rows == 0){
                                        $dislike_color = '#fff';
                                    } else{
                                        $dislike_color = '#ff6f00';
                                    }
                                ?>

                                <a id="video_like_no" href="javascript:video_like_dislike(<?= $video_like_no; ?>, <?= $video_dislike_no; ?>, 'like')"><i class="fa fa-thumbs-up" aria-hidden="true" style="<?= 'color: ' . $like_color; ?>"></i><?= $video_like_no; ?></a>

                                <a id="video_dislike_no" href="javascript:video_like_dislike(<?= $video_like_no; ?>, <?= $video_dislike_no; ?>, 'dislike')"><i class="fa fa-thumbs-down" aria-hidden="true" style="<?= 'color: ' . $dislike_color; ?>"></i><?= $video_dislike_no; ?></a>
	            			</div>
            			</div>
            		</div>

            		<div class="col-lg-12">
            			<div class="authority">
            				<div class="author-dtls">
	            				<div class="author">
	            					<img src="<?php if($formdata3['profile_picture']){ echo 'backend/uploads/' . $formdata3['profile_picture']; } else{ echo 'assets/img/no_image_available.jpg'; } ?>" alt="Profile Picture">

	            					<div class="pro-text">
	            						<h4><?= $formdata3['first_name'] . ' ' . $formdata3['surname']; ?></h4>

	            						<?php if($formdata3['job']){ echo '<p>' . $formdata3['job'] . '</p>'; } ?>
	            					</div>
	            				</div>
	            			</div>

	            			<div class="author-text-right">
	            				<div class="action-button">
	            					<a href="#">View More Videos</a>
	            				</div>
	            			</div>
            			</div>
            		</div>

            		<div class="col-lg-12">
            			<div class="post-dtls-text">
            				<p><?= $formdata3['description']; ?></p>
            			</div>
            		</div>
           		 </div>

           		 <div class="row comment-sec">
           		 	<div class="col-lg-6">
           		 		<div class="recent-comment">
           		 			<div class="comment-title">
           		 				<h4>Comments</h4>
           		 			</div>
           		 		</div>

           		 		<div id="comments" class="all-comments">
                            <div class="posted-comment">
                                <div class="main-comment" style="display: block;">
                                    <?php 
                                        $sql4 = "SELECT * FROM comment WHERE video_id = '$video_id' AND status = 'Active'";
                                        $result4 = $con->query($sql4);
                                    
                                        if($result4->num_rows > 0){
                                            $i = 0;
                                    
                                            while($row = $result4->fetch_assoc()){
                                                $comment_id = $row['comment_id'];
                                                $user_id1 = $row['user_id'];
                                                $comment_like_no = $row['no_of_likes'];
                                                $comment_dislike_no = $row['no_of_dislikes'];
                                    
                                                $sql5 = "SELECT * FROM user WHERE user_id = '$user_id1' AND status = 'Active'";
                                                $result5 = $con->query($sql5);
                                                $formdata5 = $result5->fetch_assoc();

                                                $sql8 = "SELECT * FROM history2 WHERE video_id = '$video_id' AND comment_id = '$comment_id' AND user_ip = '$user_ip'";
                                                $result8 = $con->query($sql8);
                                                $formdata8 = $result8->fetch_assoc();
                                                
                                                if($result8->num_rows == 0){
                                                    $like_color = '#fff';
                                                    $dislike_color = '#fff';
                                                } else{
                                                    if($formdata8['like_status']){
                                                        $like_color = '#ff6f00';
                                                        $dislike_color = '#fff';
                                                    } else{
                                                        $like_color = '#fff';
                                                        $dislike_color = '#ff6f00';
                                                    }
                                                }
                                    ?>
                                                <a <?php if($user_id1 != 0){ ?> href="profile.php?user_id=<?= $user_id1; ?>" <?php } ?>><img src="<?php if($formdata5){ echo 'backend/uploads/' . $formdata5['profile_picture']; } else{ echo 'assets/img/no_image_available.jpg'; } ?>" alt="User"><span><?php if($formdata5){ echo $formdata5['first_name'] . ' ' . $formdata5['surname']; } else{ echo 'Annonymous'; } ?></span></a>

                                                <p class="text-muted">?? &nbsp;<?= $row['creation_datetime']; ?></p>
									
                                                <div class="main-comment-text">
                                                    <p><?= $row['details']; ?></p>

                                                    <ul class="c-list">
                                                        <li><a id="comment_like_no<?= $i; ?>" href="javascript:comment_like_dislike(<?= $i; ?>, <?= $comment_like_no; ?>, <?= $comment_dislike_no; ?>, <?= $comment_id; ?>, 'like')"><i class="fa fa-thumbs-up" aria-hidden="true" style="<?= 'color: ' . $like_color; ?>"></i><?= $comment_like_no; ?></a></li>
                                                        <li><a id="comment_dislike_no<?= $i; ?>" href="javascript:comment_like_dislike(<?= $i; ?>, <?= $comment_like_no; ?>, <?= $comment_dislike_no; ?>, <?= $comment_id; ?>, 'dislike')"><i class="fa fa-thumbs-down" aria-hidden="true" style="<?= 'color: ' . $dislike_color; ?>"></i><?= $comment_dislike_no; ?></a></li>
                                                        <li><a href="javascript:reply('<?= $i; ?>')">Reply</a></li>
                                                    </ul>
                                                </div>

                                                <div class="reply-ccomment">
                                                    <?php 
                                                        $sql6 = "SELECT * FROM reply WHERE video_id = '$video_id' AND comment_id = '$comment_id' AND status = 'Active'";
                                                        $result6 = $con->query($sql6);
                                                    
                                                        if($result6->num_rows > 0){
                                                            $j = 0;
                                                    
                                                            while($row2 = $result6->fetch_assoc()){
                                                                $reply_id = $row2['reply_id'];
                                                                $user_id2 = $row2['user_id'];
                                                                $reply_like_no = $row2['no_of_likes'];
                                                                $reply_dislike_no = $row2['no_of_dislikes'];

                                                                $sql7 = "SELECT * FROM user WHERE user_id = '$user_id2' AND status = 'Active'";
                                                                $result7 = $con->query($sql7);
                                                                $formdata7 = $result7->fetch_assoc();

                                                                $sql9 = "SELECT * FROM history3 WHERE video_id = '$video_id' AND reply_id = '$reply_id' AND user_ip = '$user_ip'";
                                                                $result9 = $con->query($sql9);
                                                                $formdata9 = $result9->fetch_assoc();
                                                                
                                                                if($result9->num_rows == 0){
                                                                    $like_color2 = '#fff';
                                                                    $dislike_color2 = '#fff';
                                                                } else{
                                                                    if($formdata9['like_status']){
                                                                        $like_color2 = '#ff6f00';
                                                                        $dislike_color2 = '#fff';
                                                                    } else{
                                                                        $like_color2 = '#fff';
                                                                        $dislike_color2 = '#ff6f00';
                                                                    }
                                                                }
                                                    ?>
                                                                <br>

                                                            	<a <?php if($user_id2 != 0){ ?> href="profile.php?user_id=<?= $user_id2; ?>" <?php } ?>><img src="<?php if($formdata7){ echo 'backend/uploads/' . $formdata7['profile_picture']; } else{ echo 'assets/img/no_image_available'; } ?>" alt=""><span><?php if($formdata7){ echo $formdata7['first_name'] . ' ' . $formdata7['surname']; } else{ echo 'Annonymous'; } ?></span></a>

                                                                <p class="text-muted">?? &nbsp;<?= $row2['creation_datetime']; ?></p>

                                                                <div class="reply-profile">
                                                                    <p><?= $row2['details']; ?></p>

                                                                    <ul class="c-list" style="margin-left: 3.1rem; margin-bottom: 1rem">
                                                                        <li><a id="reply_like_no<?= $i . $j; ?>" href="javascript:reply_like_dislike('<?= $i . $j; ?>', <?= $reply_like_no; ?>, <?= $reply_dislike_no; ?>, <?= $reply_id; ?>, 'like')"><i class="fa fa-thumbs-up" aria-hidden="true" style="<?= 'color: ' . $like_color2; ?>"></i><?= $reply_like_no; ?></a></li>
                                                                        <li><a id="reply_dislike_no<?= $i . $j; ?>" href="javascript:reply_like_dislike('<?= $i . $j; ?>', <?= $reply_like_no; ?>, <?= $reply_dislike_no; ?>, <?= $reply_id; ?>, 'dislike')"><i class="fa fa-thumbs-down" aria-hidden="true" style="<?= 'color: ' . $dislike_color2; ?>"></i><?= $reply_dislike_no; ?></a></li>
                                                                    </ul>
                                                                </div>

                                                    <?php 
                                                                $j++;
                                                            }
                                                        }
                                                    ?>

                                                    <div id="reply<?= $i; ?>" class="comment-box" style="display: none;">
                                                        <div class="reply-box">
                                                            <input id="reply_details<?= $i; ?>" class="custom-reply-input" type="text" placeholder="Write a replay here...">

                                                            <button title="Add Reply" type="button" class="custom-send-button" onclick="add_reply(<?= $i ?>, <?= $video_id ?>, <?= $comment_id ?>)">
                                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                    <?php 
                                                $i++;
                                            }
                                        }
                                    ?>

                                    <div class="comment-box">
                                        <div class="reply-box">
                                            <input id="comment" class="custom-comment-input" type="text" placeholder="Write a comment here...">

                                            <button title="Add Comment" type="button" class="custom-send-button" onclick="add_comment(<?= $video_id ?>)">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
           		 	</div>

           		 	<div class="col-lg-6">
           		 		<div class="message-box">
           		 			<h4>Questions</h4>

                            <div id="qas" class="all-comments">
                                <div class="posted-comment">
                                    <div class="main-comment" style="display: block;">
                                        <?php 
                                            $sql14 = "SELECT * FROM video WHERE video_id = '$video_id' AND user_id = '$session_user_id' AND status = 'Active'";
                                            $result14 = $con->query($sql14);

                                            $sql10 = "SELECT * FROM question WHERE video_id = '$video_id' AND status = 'Active'";
                                            $result10 = $con->query($sql10);
                                        
                                            if($result10->num_rows > 0){
                                                $i = 0;
                                        
                                                while($row = $result10->fetch_assoc()){
                                                    $question_id = $row['question_id'];
                                                    $user_id3 = $row['user_id'];
                                        
                                                    $sql11 = "SELECT * FROM user WHERE user_id = '$user_id3' AND status = 'Active'";
                                                    $result11 = $con->query($sql11);
                                                    $formdata11 = $result11->fetch_assoc();
                                        ?>
                                                    <a <?php if($user_id3 != 0){ ?> href="profile.php?user_id=<?= $user_id3; ?>" <?php } ?>><img src="<?php if($formdata11){ echo 'backend/uploads/' . $formdata11['profile_picture']; } else{ echo 'assets/img/no_image_available.jpg'; } ?>" alt="User"><span><?php if($formdata11){ echo $formdata11['first_name'] . ' ' . $formdata11['surname']; } else{ echo 'Annonymous'; } ?></span></a>

                                                    <p class="text-muted">?? &nbsp;<?= $row['creation_datetime']; ?> &emsp;<i>(Question)</i></p>

                                                    <div class="main-comment-text">
                                                        <p><?= $row['details']; ?></p>

                                                        <?php 
                                                            if($result14->num_rows > 0){
                                                                $sql15 = "SELECT * FROM answer WHERE video_id = '$video_id' AND question_id = '$question_id' AND video_user_id = '$session_user_id' AND status = 'Active'";
                                                                $result15 = $con->query($sql15);

                                                                if($result15->num_rows == 0){
                                                        ?>
                                                                    <ul class="c-list">
                                                                        <li><i><a class="text-muted custom-link" href="javascript:answer(<?= $i ?>, <?= $question_id ?>)">Answer to this question</a></i></li>
                                                                    </ul>
                                                        <?php 
                                                                }
                                                            }
                                                        ?>
                                                    </div>

                                                    <?php 
                                                        if($result14->num_rows > 0){
                                                            if($result15->num_rows == 0){
                                                                echo '<br><br><br>';
                                                            } else{
                                                                echo '<br><br>';
                                                            }
                                                        } else{
                                                            echo '<br><br>';
                                                        }

                                                        $sql12 = "SELECT * FROM answer WHERE video_id = '$video_id' AND question_id = '$question_id' AND status = 'Active' LIMIT 1";
                                                        $result12 = $con->query($sql12);
                                                    
                                                        if($result12->num_rows > 0){
                                                            $j = 0;
                                                    
                                                            while($row2 = $result12->fetch_assoc()){
                                                                $question_id = $row2['question_id'];
                                                                $user_id4 = $row2['user_id'];
                                                    
                                                                $sql13 = "SELECT * FROM user WHERE user_id = '$user_id4' AND status = 'Active'";
                                                                $result13 = $con->query($sql13);
                                                                $formdata13 = $result13->fetch_assoc();
                                                    ?>
                                                                <a <?php if($user_id4 != 0){ ?> href="profile.php?user_id=<?= $user_id4; ?>" <?php } ?>><img src="<?php if($formdata13){ echo 'backend/uploads/' . $formdata13['profile_picture']; } else{ echo 'assets/img/no_image_available.jpg'; } ?>" alt="User"><span><?php if($formdata13){ echo $formdata13['first_name'] . ' ' . $formdata13['surname']; } else{ echo 'Annonymous'; } ?></span></a>

                                                                <p class="text-muted">?? &nbsp;<?= $row2['creation_datetime']; ?> &emsp;<i>(Answer)</i></p>

                                                                <div class="main-comment-text">
                                                                    <p><?= $row2['details']; ?></p>
                                                                </div><br>
                                                    <?php 
                                                                $j++;
                                                            }
                                                        }
                                                    ?>

                                                    <hr style="margin-top: 0;">
                                        <?php 
                                                    $i++;
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>

       		 				<div id="qa_box" style="<?php if($result14->num_rows > 0){ echo 'display: none'; } ?>">
                                <?php 
                                    if($result14->num_rows > 0){
                                        $placeholder = 'Write your answer here...';
                                        $details = 'answer_details';
                                        $qa_type = 'answer';
                                    } else{
                                        $placeholder = 'Write your question here...';
                                        $details = 'question_details';
                                        $qa_type = 'question';
                                    }
                                ?>

                                <textarea id="<?= $details; ?>" cols="30" rows="10" placeholder="<?= $placeholder; ?>"></textarea>
                                <input type="hidden" id="question_id">

           		 				<input style="cursor: pointer;" type="button" value="Send" onclick="add_qa('<?= $qa_type; ?>')">
                            </div>
           		 		</div>
           		 	</div>
           		 </div>
             </div>
         </div>
         <!-- Blog area end -->

         <?php include('includes/footer.php') ?>
    </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        var user_ip = '<?= $user_ip ?>';
        var video_id = '<?= $video_id ?>';

        $.ajax({
            url: "backend/add_view.php",
            type: "POST",
            dataType: "JSON",
            data : {
                user_ip: user_ip,
                video_id: video_id
            },
            success: function (response) {
                if(response.status == true){
                    $("#view").load(" #view > *");
                }
            }
        });
    });

    function video_like_dislike(total_likes, total_dislikes, status_type){
        var video_id = '<?= $video_id ?>';
        var video_user_id = '<?= $user_id ?>';
        var user_id = '<?= $session_user_id ?>';
        var user_ip = '<?= $user_ip; ?>';

        $.ajax({
            url: "backend/video_history.php",
            type: "POST",
            dataType: "JSON",
            data : {
                video_id: video_id,
                video_user_id: video_user_id,
                user_id: user_id,
                user_ip: user_ip,
                total_likes: total_likes,
                total_dislikes: total_dislikes,
                status_type: status_type
            },
            success: function (response) {
                if(response.status == true){
                    $("#likedislike").load(" #likedislike > *");
                }
            }
        });
    }

    function reply(counter){
        $('#reply' + counter).css('display', 'block');
    }

    function comment_like_dislike(counter, total_likes, total_dislikes, comment_id, status_type){
        var video_id = '<?= $video_id ?>';
        var user_ip = '<?= $user_ip; ?>';

        $.ajax({
            url: "backend/comment_history.php",
            type: "POST",
            dataType: "JSON",
            data : {
                video_id: video_id,
                comment_id: comment_id,
                user_ip: user_ip,
                total_likes: total_likes,
                total_dislikes: total_dislikes,
                status_type: status_type
            },
            success: function (response) {
                if(response.status == true){
                    $("#comments").load(" #comments > *");
                }
            }
        });
    }

    function reply_like_dislike(counter, total_likes, total_dislikes, reply_id, status_type){
        var video_id = '<?= $video_id ?>';
        var user_ip = '<?= $user_ip; ?>';

        $.ajax({
            url: "backend/reply_history.php",
            type: "POST",
            dataType: "JSON",
            data : {
                video_id: video_id,
                reply_id: reply_id,
                user_ip: user_ip,
                total_likes: total_likes,
                total_dislikes: total_dislikes,
                status_type: status_type
            },
            success: function (response) {
                if(response.status == true){
                    $("#comments").load(" #comments > *");
                }
            }
        });
    }

    function add_comment(video_id){
        var video_user_id = '<?= $user_id; ?>';
        var user_id = '<?= $session_user_id; ?>';
        var comment_details = $('#comment').val();

        if(comment_details){
            $.ajax({
                url: "backend/add_comment.php",
                type: "POST",
                dataType: "JSON",
                data : {
                    video_id: video_id,
                    video_user_id: video_user_id,
                    user_id: user_id,
                    comment_details: comment_details
                },
                success: function (response) {
                    if(response.status == true){
                        $("#comments").load(" #comments > *");
                    }
                }
            });
        }
    }

    function add_reply(counter, video_id, comment_id){
        var video_user_id = '<?= $user_id; ?>';
        var user_id = '<?= $session_user_id; ?>';
        var reply_details = $('#reply_details' + counter).val();

        if(reply_details){
            $.ajax({
                url: "backend/add_reply.php",
                type: "POST",
                dataType: "JSON",
                data : {
                    video_id: video_id,
                    comment_id: comment_id,
                    video_user_id: video_user_id,
                    user_id: user_id,
                    reply_details: reply_details
                },
                success: function (response) {
                    if(response.status == true){
                        $("#comments").load(" #comments > *");
                    }
                }
            });
        }
    }

    function answer(counter, question_id){
        $('#qa_box').css('display', 'block');
        $('#question_id').val(question_id);
    }

    function add_qa(qa_type){
        if(qa_type == 'question'){
            var question_details = $('#question_details').val();

            if(question_details){
                var video_id = '<?= $video_id; ?>';
                var video_user_id = '<?= $user_id; ?>';
                var user_id = '<?= $session_user_id; ?>';

                $.ajax({
                    url: "backend/add_question.php",
                    type: "POST",
                    dataType: "JSON",
                    data : {
                        video_id: video_id,
                        video_user_id: video_user_id,
                        user_id: user_id,
                        question_details: question_details
                    },
                    success: function (response) {
                        if(response.status == true){
                            $('#question_details').val('');
                            $("#qas").load(" #qas > *");
                        }
                    }
                });
            }
        } else{
            var answer_details = $('#answer_details').val();
            
            if(answer_details){
                var video_id = '<?= $video_id; ?>';
                var question_id = $('#question_id').val();
                var video_user_id = '<?= $user_id; ?>';
                var user_id = '<?= $session_user_id; ?>';

                $.ajax({
                    url: "backend/add_answer.php",
                    type: "POST",
                    dataType: "JSON",
                    data : {
                        video_id: video_id,
                        question_id: question_id,
                        video_user_id: video_user_id,
                        user_id: user_id,
                        answer_details: answer_details
                    },
                    success: function (response) {
                        if(response.status == true){
                            $('#answer_details').val('');
                            $("#qas").load(" #qas > *");
                        }
                    }
                });
            }
        }
    }
</script>