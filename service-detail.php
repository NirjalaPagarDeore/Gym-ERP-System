
<?php include('include/header.php'); ?>

  <?php 

                        $stmt_service = $pdo->prepare('SELECT * FROM service WHERE delete_status = 0 and id = ? ');
                        $stmt_service ->execute([$_POST['id']]);
                        $cat_service  =  $stmt_service->fetch();
                        
                         
                         ?>
    <!-- Hero Start -->
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4"><?php echo $cat_service['name'];?></h1>
                <a href="index.php" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                <a href="service.php" class="btn btn-light py-md-3 px-md-5">Service</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Service Start -->
    <div class="container-fluid p-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-100 rounded mb-5" src="panel/assets/img/<?php echo $cat_service['photo'];?>" alt="">
                    <h1 class="text-uppercase mb-4"><?php echo $cat_service['name'];?></h1>
                    <p><?php echo $cat_service['description'];?></p>
                </div>
                <!-- Blog Detail End -->

                
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">
              

           

              <!-- Recent Post Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4">Our Services</h3>
                    <div class="bg-dark rounded p-4">
                         <?php 

                        $stmt_ser = $pdo->prepare('SELECT * FROM service WHERE delete_status = 0 ');
                        $stmt_ser ->execute();
                        $cat_ser  =  $stmt_ser->fetchAll();
                        foreach ($cat_ser as $key_ser) {
                         
                         ?>
                        <div class="d-flex overflow-hidden mb-3">
                           
                            <a href="#" onclick="editCategory('<?php echo $key_ser['id'];?>', 'service-detail.php')" style="color: #4e4846;" class="d-flex align-items-center bg-light rounded-end h5 p-3 mb-0"><?php echo $key_ser['name'];?>
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
    <!-- Service End -->


    <!-- Footer Start -->
   <?php include('include/footer.php'); ?>