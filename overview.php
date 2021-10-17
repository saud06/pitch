<!DOCTYPE html>
<html lang="en">
	<?php
        include('includes/header.php'); 

        if(isset($_GET['post_type_id']) && !empty($_GET['post_type_id'])){
            $post_type_id = $_GET['post_type_id'];

            $sql = "SELECT * FROM post_type WHERE post_type_id = '$post_type_id' LIMIT 1";
            $result = $con->query($sql);
        } else{
            $sql = "SELECT * FROM post_type ORDER BY RAND()";
            $result = $con->query($sql);
        }
    ?>

    <body class="Category-page">
        <?php 
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $post_type_id = $row['post_type_id'];
        ?>
                    <div class="tread-overview-area">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 nopadding">
                                    <div class="tread-title">
                                        <h2><?= $row['type_name']; ?></h2>
                                    </div>
                                </div>
                            </div>

                            <div class="row tread-overview">
                                <div class="col-lg-12 nopadding">
                                    <div class="overview_slide owl-carousel">
                                        <?php 
                                            $sql2 = "SELECT * FROM video WHERE post_type_id IN ('$post_type_id') AND status = 'Active' ORDER BY RAND()";
                                            $result2 = $con->query($sql2);
                                            if($result2->num_rows > 0){
                                                while($row2 = $result2->fetch_assoc()){
                                                    $video_id = $row2['video_id'];
                                                    $video_url = explode(',', $row2['video_url']);
                                                    $video_height = explode(',', $row2['video_height']);
                                        ?>
                                                    <div class="sigle-blg-item">
                                                        <a href="single-post.php?video_id=<?= $video_id; ?>"><div class="blog-img blog-bg-1" style="background-image: url(backend/uploads/videos/<?= $row2['thumbnail']; ?>)">
                                                        </div></a>

                                                        <div class="blog-content">
                                                            <div class="blog-content-top-sec">
                                                                <p><img src="assets/img/vd-cam-icon.png" alt=""><?= $row2['creation_datetime']; ?></p>
                                                                <div class="social-icons">
                                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                                </div>
                                                            </div>

                                                            <div class="main-content-sec">
                                                                <h3><a class="custom-link" href="single-post.php?video_id=<?= $video_id; ?>"><?= $row2['video_title']; ?></a></h3>
                                                            </div>

                                                            <div class="blog-activitis">
                                                                <a style="color: #fff"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span><?= $row2['no_of_likes']; ?></span></a>
                                                                <a style="color: #fff"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i><span><?= $row2['no_of_dislikes']; ?></span></a>
                                                                <a style="color: #fff"><i class="fa fa-eye" aria-hidden="true"></i><span><?= $row2['no_of_views']; ?></span></a>
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
        <?php 
                }
            } 
        ?>

        <?php include('includes/footer.php') ?>
    </body>
</html>