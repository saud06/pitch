<!DOCTYPE html>
<html lang="en">
	<?php 
		include('includes/header.php'); 

		$sql = "SELECT * FROM post_type WHERE status = 'Active' ORDER BY RAND()";
        $result = $con->query($sql);
	?>

	<style type="text/css">
		.custom-link h4:hover{
			color: #ff5722;
		}
	</style>
    
    <body class="Category-page">
        <!-- Blog area start -->
        <div class="Category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-top-title">
                            <h1>Categories</h1>
                        </div>
                    </div>
                </div>
               
                <div class="row text-center">
					<?php 
						if($result->num_rows > 0){
							while($row = $result->fetch_assoc()){
								$post_type_id = $row['post_type_id'];
					?>
			            		<div class="col-lg-4 col-md-6">
			            			<a class="custom-link" href="overview.php?post_type_id=<?= $post_type_id; ?>">
					            		<div class="Category-item">
					            			<div class="Category-top">
					            				<img src="assets/img/1.png" alt="">
					            			</div>

					            			<br>

					            			<h4><?= $row['type_name']; ?></h4>

					            			<p></p>
					            		</div>
					            	</a>
			            		</div>
					<?php 
							}
						}
					?>
                </div>
            </div>
        </div>
        <!-- Blog area end -->

        <?php include('includes/footer.php') ?>
    </body>
</html>