
<?php include('include/header.php'); ?>

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase">Best Gym Center</h5>
                            <h1 class="display-2 text-white text-uppercase mb-md-4">Build Your Body Strong With Bodytone</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Become A Member</a>
                            <a href="contact.php" class="btn btn-light py-md-3 px-md-5">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase">Best Gym Center</h5>
                            <h1 class="display-2 text-white text-uppercase mb-md-4">Grow Your Strength With Our Trainers</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Become A Member</a>
                            <a href="contact.php" class="btn btn-light py-md-3 px-md-5">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid p-5">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                    <h5 class="text-primary text-uppercase">About Us</h5>
                    <h1 class="display-3 text-uppercase mb-0">Welcome to Bodytone</h1>
                </div>
                
                <p class="mb-4">Bodytone Fitness is a modern and well-equipped fitness center dedicated to helping individuals achieve a healthier and stronger lifestyle. Our goal is to provide a motivating, safe, and supportive environment where members of all fitness levels can train with confidence.</p>
                <div class="rounded bg-dark p-5">
                    <ul class="nav nav-pills justify-content-between mb-3">
                        <li class="nav-item w-50">
                            <a class="nav-link text-uppercase text-center w-100 active" data-bs-toggle="pill" href="#pills-1">About Us</a>
                        </li>
                        <li class="nav-item w-50">
                                <a class="nav-link text-uppercase text-center w-100" data-bs-toggle="pill" href="#pills-2">Why Choose Us</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-1">
                            <p class="text-secondary mb-0">At Bodytone Fitness, we believe that fitness is not just about lifting weights, but about building discipline, confidence, and long-term healthy habits. Our experienced and certified trainers focus on personalized training approaches, ensuring every member receives proper guidance, motivation, and support throughout their fitness journey.

With state-of-the-art equipment, structured workout programs, and a strong focus on hygiene and safety, Bodytone Fitness has become a trusted destination for those who are serious about improving their physical and mental well-being.</p>
                        </div>
                        <div class="tab-pane fade" id="pills-2">
                            <p class="text-secondary mb-0">Choosing Bodytone Fitness means choosing a gym that truly understands your fitness goals and supports you at every step. We focus on providing a complete fitness experience by combining expert guidance, modern equipment, and a motivating environment. Our certified trainers work closely with members to design personalized workout programs that deliver real and sustainable results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Programe Start -->
    <div class="container-fluid programe position-relative px-5 mt-5" style="margin-bottom: 135px;">
         <div class="text-center">
            <h5 class="text-primary text-uppercase">Services</h5>
            <h1 class=" text-uppercase mb-3">Our Best Services</h1>
        </div> 
        <div class="row g-5 gb-5">
               <?php 
                        
                        $stmt_service = $pdo->prepare('SELECT * FROM service WHERE delete_status = 0 ');
                        $stmt_service ->execute();
                        $cat_service  =  $stmt_service->fetchAll();
                        foreach ($cat_service as $key_service) {
                         
                         ?>
            <div class="col-lg-4 col-md-6">
                <div class="bg-light rounded text-center p-5">
                    <!-- <i class="flaticon-six-pack display-1 text-primary"></i> -->
                       <img src="panel/assets/img/<?php echo $key_service['photo'];?>" class="w-50 h-80" >
                    <h3 class=" my-4"><?php echo $key_service['name'];?></h3>
                    <p><?php echo $key_service['short_content'];?></p>
                    <a class="text-uppercase" href="#" onclick="editCategory('<?php echo $key_service['id'];?>', 'service-detail.php')">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
       <?php } ?>
            <div class="col-lg-12 col-md-6 text-center">
                <!-- <h1 class="text-uppercase text-light mb-4">30% Discount For This Summer</h1> -->
                <!-- <a href="" class="btn btn-primary py-3 px-5">Become A Member</a> -->
            </div>
        </div>
    </div>
    <!-- Programe Start -->


    <!-- Class Timetable Start -->
    <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <h5 class="text-primary text-uppercase">Class Schedule</h5>
            <h1 class="display-7 text-uppercase mb-0">Working Hours</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase rounded-pill mb-5">
                 <?php 
                        $i=1; 
                        $stmt_cate = $pdo->prepare('SELECT * FROM class_category WHERE delete_status = 0 ');
                        $stmt_cate ->execute();
                        $cat_cate  =  $stmt_cate->fetchAll();
                        foreach ($cat_cate as $key_cate) {
                         
                         ?>
                <li class="nav-item">
                    <a class="nav-link rounded-pill text-white <?php if($i == 1){ echo 'active'; } ?>" data-bs-toggle="pill" href="#day<?php echo $key_cate['id'];?>"><?php echo $key_cate['name'];?></a>
                </li>
           <?php $i++; } ?>
            </ul>
            <div class="tab-content">
                <?php 
                        $j=1; 
                        $stmt_cate = $pdo->prepare('SELECT * FROM class_category WHERE delete_status = 0 ');
                        $stmt_cate ->execute();
                        $cat_cate  =  $stmt_cate->fetchAll();
                        foreach ($cat_cate as $key_cate) {
                         
                         ?>
                <div id="day<?php echo $key_cate['id'];?>" class="tab-pane fade <?php if($j == 1){ echo 'show active'; } ?> p-0">
                    <div class="row g-5">
                         <?php 
                        
                        $stmt_class = $pdo->prepare('SELECT * FROM class WHERE delete_status = 0 and cate_id=? ');
                        $stmt_class ->execute([$key_cate['id']]);
                        $cat_class  =  $stmt_class->fetchAll();
                        foreach ($cat_class as $key_class) {
                         
                         ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="bg-dark rounded text-center py-5 px-3">
                                <h6 class="text-uppercase text-light mb-3"><?= date('h:i A', strtotime($key_class['from_time'])) ?>
                                    -
                                    <?= date('h:i A', strtotime($key_class['to_time'])) ?></h6>
                                <h5 class=" text-primary"><?php echo $key_class['title'];?></h5>
                                <p class=" text-secondary mb-0"><?php
                                        $stmt_trainer = $pdo->prepare('SELECT * FROM trainers WHERE delete_status = 0 and id=? ');
                        $stmt_trainer ->execute([$key_class['trainer']]);
                        $cat_trainer  =  $stmt_trainer->fetch();
                                     echo $cat_trainer['name'];?></p>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
               <?php $j++; } ?>
            </div>
        </div>
    </div>
    <!-- Class Timetable Start -->
    

    <!-- Facts Start -->
    <div class="container-fluid bg-dark facts p-5 my-5">
        <div class="row gx-5 gy-4 py-5">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-star fs-4 text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-secondary text-uppercase">Experience</h5>
                        <h1 class="display-5 text-white mb-0" data-toggle="counter-up">12345</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="d-flex">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-users fs-4 text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-secondary text-uppercase">Our Trainers</h5>
                        <h1 class="display-5 text-white mb-0" data-toggle="counter-up">12345</h1>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-4 col-md-6">
                <div class="d-flex">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-mug-hot fs-4 text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-secondary text-uppercase">Happy Clients</h5>
                        <h1 class="display-5 text-white mb-0" data-toggle="counter-up">12345</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Team Start -->
    <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <h5 class="text-primary text-uppercase">The Team</h5>
            <h1 class="display-7 text-uppercase mb-0">Expert Trainers</h1>
        </div>
        <div class="row g-5">
                      <?php 
                        
                        $stmt_team = $pdo->prepare('SELECT * FROM trainers WHERE delete_status = 0 ');
                        $stmt_team ->execute();
                        $cat_team  =  $stmt_team->fetchAll();
                        foreach ($cat_team as $key_team) {
                         
                         ?>
            <div class="col-lg-4 col-md-6">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded">
                    <img class="img-fluid w-100" src="panel/assets/img/<?php echo $key_team['photo'];?>" alt="">

                    <div class="team-overlay d-flex align-items-center justify-content-center text-center">
                        <div class="p-3 text-white small mb-0">
                           
                            
                                <?php echo html_entity_decode($key_team['description']);?>
                           
                        </div>
                    </div>
                </div>
                    <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" style="background: rgba(34, 36, 41, .9);">
                        <h5 class="text-light"><?php echo $key_team['name'];?></h5>
                        <p class="text-secondary m-0">Trainer</p>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
    </div>
    <!-- Team End -->
    

    <!-- Testimonial Start -->
    <div class="container-fluid p-0 my-5">
        <div class="row g-0">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="img/testimonial.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 bg-dark p-5">
                <div class="mb-5">
                    <h5 class="text-primary text-uppercase">Testimonial</h5>
                    <h1 class="display-3 text-uppercase text-light mb-0">Our Client Say</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                     <?php 
                        
                        $stmt_testi = $pdo->prepare('SELECT * FROM testimonial WHERE delete_status = 0 ');
                        $stmt_testi ->execute();
                        $cat_testi  =  $stmt_testi->fetchAll();
                        foreach ($cat_testi as $key_testi) {
                         
                         ?>
                    <div class="testimonial-item text-white">
                        <i class="fa fa-quote-left text-primary me-3"></i><?php echo html_entity_decode($key_testi['feedback']);?>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="panel/assets/img/<?php echo $key_testi['photo'];?>" alt="">
                            <div class="ps-4">
                                <h5 class=" text-light"><?php echo $key_testi['name'];?></h5>
                                <span class=" text-secondary"><?php echo $key_testi['role'];?></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <h5 class="text-primary text-uppercase">Our Blog</h5>
            <h1 class="display-3 text-uppercase mb-0">Latest Blog Post</h1>
        </div>
        <div class="row g-5">
             <?php 

                        $stmt_blog = $pdo->prepare('SELECT * FROM blog WHERE delete_status = 0 ');
                        $stmt_blog ->execute();
                        $cat_blog  =  $stmt_blog->fetchAll();
                        foreach ($cat_blog as $key_blog) {
                         
                         ?>
            <div class="col-lg-4">
                <div class="blog-item">
                    <div class="position-relative overflow-hidden rounded-top">
                        <img class="img-fluid" src="panel/assets/img/<?php echo $key_blog['photo'];?>" alt="">
                    </div>
                    <div class="bg-dark d-flex align-items-center rounded-bottom p-4">
                        <div class="flex-shrink-0 text-center text-secondary border-end border-secondary pe-3 me-3">
                            <span><?php echo date('d', strtotime($key_blog['blog_date']));?></span>
                            <h6 class="text-light text-uppercase mb-0"><?php echo date('M', strtotime($key_blog['blog_date']));?></h6>
                            <span><?php echo date('Y', strtotime($key_blog['blog_date']));?></span>
                        </div>
                        <a class="h5 text-light" href="#" onclick="editCategory('<?php echo $key_blog['id'];?>', 'blog-detail.php')"><?php echo $key_blog['name'];?></h4></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Blog End -->
    
<?php include('include/footer.php'); ?>