
<?php include('include/header.php'); ?>


                     <?php 

                        $stmt_blog1 = $pdo->prepare('SELECT * FROM blog WHERE delete_status = 0 and id = ? ');
                        $stmt_blog1 ->execute([$_POST['id']]);
                        $cat_blog1  =  $stmt_blog1->fetch();
                        
                         
                         ?>

   <!-- Hero Start -->
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4">Blog Detail</h1>
                <a href="index.php" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                <a href="blog.php" class="btn btn-light py-md-3 px-md-5">Blog</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Blog Start -->
    <div class="container-fluid p-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="panel/assets/img/<?php echo $cat_blog1['photo'];?>" alt="">
                    <h1 class="text-uppercase mb-4"><?php echo $cat_blog1['name'];?></h1>
                    <p><?php echo $cat_blog1['description'];?></p>
                </div>
                <!-- Blog Detail End -->
                <?php 

                        $stmt_comment = $pdo->prepare('SELECT * FROM feedback WHERE delete_status = 0 and status = 0  ');
                        $stmt_comment ->execute();
                        $cat_comment  =  $stmt_comment->fetchAll();
                       
                         $count= count($cat_comment);
                         ?>
                <!-- Comment List Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4"><?php echo $count; ?> Comments</h3>
                    <?php 

                       
                        foreach ($cat_comment as $key_comment) {
                         
                         ?>
                    <div class="d-flex mb-4">
                        <img src="panel/assets/img/<?php echo $key_comment['photo'];?>" class="img-fluid rounded" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6><a href="#"><?php echo $key_comment['name'];?></a> <small><i><?php echo date('d-M-Y', strtotime($key_comment['date']));?></i></small></h6>
                            <p><?php echo $key_comment['comment'];?></p>
                           
                        </div>
                    </div>
                   <?php } ?>
                   
                </div>
                <!-- Comment List End -->

                
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">
            
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
                            <img class="img-fluid flex-shrink-0 rounded-start" src="panel/assets/img/<?php echo $key_blogr['photo'];?>" style="width: 75px;height:80px;" alt="">
                            <a href="#" onclick="editCategory('<?php echo $key_blogr['id'];?>', 'blog-detail.php')" style="color: #4e4846;height:80px;" class="d-flex align-items-center bg-light rounded-end h6 p-3 mb-0"><?php echo $key_blogr['name'];?>
                            </a>
                        </div>
                       <?php } ?>
                    </div>
                </div>
                <!-- Recent Post End -->

        
                <!-- Comment Form Start -->
                <div class="bg-dark rounded p-5">
                    <h3 class="text-light text-uppercase mb-4">Leave a comment</h3>
                    <form action="panel/admin/app/comment.php" method="POST" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="name" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" name="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="file" name="photo" class="form-control bg-white border-0" placeholder="Upload Your photo" >
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment" name="comment"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Leave Your Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
          
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
   <?php include('include/footer.php'); ?>