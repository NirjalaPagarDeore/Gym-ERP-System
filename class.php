 <?php include('include/header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4">Classes</h1>
                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                <a href="" class="btn btn-light py-md-3 px-md-5">Classes</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Class Timetable Start -->
    <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <h5 class="text-primary text-uppercase">Class Schedule</h5>
            <h1 class="display-3 text-uppercase mb-0">Working Hours</h1>
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
                <div id="day<?php echo $key_cate['id'];?>" class="tab-pane fade p-0 <?php if($j == 1){ echo 'show active'; } ?>">
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
                                <p class=" text-secondary mb-0">
                                    <?php
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
    

    <!-- Footer Start -->
 <?php include('include/footer.php'); ?>