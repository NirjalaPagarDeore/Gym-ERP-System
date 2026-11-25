 <?php include('include/header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4">About Us</h1>
                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                <a href="" class="btn btn-light py-md-3 px-md-5">About</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


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
                    <h1 class="display-3 text-uppercase mb-0">Welcome to BofyTone Fitness</h1>
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
                        <div class="p-3 text-white small mb-">
                           
                            
                                <?php echo html_entity_decode($key_team['description']);?>
                            
                        </div>
                    </div>
                </div>
                    <div class="position-absolute start-0 bottom-0 w-100 rounded-bottom text-center p-4" style="background: rgba(34, 36, 41, .9);">
                        <h5 class=" text-light"><?php echo $key_team['name'];?></h5>
                        <p class=" text-secondary m-0">Trainer</p>
                    </div>
                </div>
            </div>
          <?php } ?>



        </div>
    </div>
    <!-- Team End -->


    <!-- Facts Start -->
    <div class="container-fluid bg-dark facts p-5" style="margin-bottom: 90px;">
        <div class="row gx-5 gy-4 py-5">
            <div class="col-lg-4 col-md-6">
                <div class="d-flex" style="padding-left:68px;">
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
                <div class="d-flex" style="padding-left:33px;">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-users fs-4 text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-secondary text-uppercase">Our Trainers</h5>
                        <h1 class="display-5 text-white mb-0" data-toggle="counter-up">12345</h1>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-3 col-md-6">
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
    

    <!-- Footer Start -->
 <?php include('include/footer.php'); ?>