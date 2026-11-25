<?php include('include/header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4">Blog</h1>
                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                <a href="" class="btn btn-light py-md-3 px-md-5">Blog</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Blog Start -->
    <div class="container-fluid p-5">
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-8">
                <div class="row g-5">
                     <?php 

                        $stmt_blog = $pdo->prepare('SELECT * FROM blog WHERE delete_status = 0 ');
                        $stmt_blog ->execute();
                        $cat_blog  =  $stmt_blog->fetchAll();
                        foreach ($cat_blog as $key_blog) {
                         
                         ?>
                    <div class="col-md-12">
                        <div class="blog-item">
                            <div class="position-relative overflow-hidden rounded-top">
                                <img class="img-fluid" src="panel/assets/img/<?php echo $key_blog['photo'];?>" alt="" style="width:100%; height:400px;">
                            </div>
                            <div class="bg-dark d-flex align-items-center rounded-bottom p-4">
                                <div class="flex-shrink-0 text-center text-secondary border-end border-secondary pe-3 me-3">
                                    <span class="text-white"><?php echo date('d', strtotime($key_blog['blog_date']));?></span>
                                    <h6 class="mb-0 text-white" ><?php echo date('M', strtotime($key_blog['blog_date']));?></h6>
                                    <span class="text-white"><?php echo date('Y', strtotime($key_blog['blog_date']));?></span>
                                </div>
                                <a class="h5 text-white" style="color: #4e4846;"  href="#" onclick="editCategory('<?php echo $key_blog['id'];?>', 'blog-detail.php')"><?php echo $key_blog['name'];?></h4></a>
                            </div>
                        </div>
                    </div>
                        <?php } ?>
                 
            
                </div>
            </div>
            <!-- Blog list End -->

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Search Form Start -->
               
                <!-- Search Form End -->

       

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4">Recent Post</h3>
                    <div class="bg-dark rounded p-4">
                        <?php 

                        $stmt_blogr = $pdo->prepare('SELECT * FROM blog WHERE delete_status = 0 order by id desc limit 3 ');
                        $stmt_blogr ->execute();
                        $cat_blogr  =  $stmt_blogr->fetchAll();
                        foreach ($cat_blogr as $key_blogr) {
                         
                         ?>
                        <div class="d-flex overflow-hidden mb-3">
                            <img class="img-fluid flex-shrink-0 rounded-start" src="panel/assets/img/<?php echo $key_blogr['photo'];?>" style="width: 75px;" alt="">
                            <a href="#" onclick="editCategory('<?php echo $key_blogr['id'];?>', 'blog-detail.php')" style="color: #4e4846;" class="d-flex align-items-center bg-light rounded-end h5 p-3 mb-0"><?php echo $key_blogr['name'];?>
                            </a>
                        </div>
                      <?php } ?>
                    </div>
                </div>
                <!-- Recent Post End -->

     
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
 <?php include('include/footer.php'); ?>