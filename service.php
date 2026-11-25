 <?php include('include/header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4">service</h1>
                <a href="index.php" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                <a href="service.php" class="btn btn-light py-md-3 px-md-5">service</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Class Timetable Start -->
    <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <!-- <h5 class="text-primary text-uppercase">Class Schedule</h5> -->
            <h1 class="display-3 text-uppercase mb-0">Our Services</h1>
        </div>
        <div class="tab-class text-center">
            
            <div class="tab-content">
               
                    <div class="row">
                         <?php 
                        
                        $stmt_service = $pdo->prepare('SELECT * FROM service WHERE delete_status = 0 ');
                        $stmt_service ->execute();
                        $cat_service  =  $stmt_service->fetchAll();
                        foreach ($cat_service as $key_service) {
                         
                         ?>
                         <div class="col-md-4 mb-3">
                           
                                 <div class="card">
                                 <img src="panel/assets/img/<?php echo $key_service['photo'];?>" class="img">
                                  <div class="card-body">
                                    <h5 class="card-title"><?php echo $key_service['name'];?></h5>
                                    <p class="card-text"><?php echo $key_service['short_content'];?></p>
                                     <a class="text-uppercase" href="#" onclick="editCategory('<?php echo $key_service['id'];?>', 'service-detail.php')">Read More <i class="bi bi-arrow-right"></i></a>
                                  </div>
                                </div>
                            
                        </div>
                       
                       <?php } ?>
                        
                        
                       
                    </div>
                
             
            </div>
        </div>
    </div>
    <!-- Class Timetable Start -->
    

    <!-- Footer Start -->
 <?php include('include/footer.php'); ?>