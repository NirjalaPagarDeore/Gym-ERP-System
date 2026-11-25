 <?php include('include/header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid bg-primary p-5 bg-hero mb-5">
        <div class="row py-5">
            <div class="col-12 text-center">
                <h1 class="display-2 text-uppercase text-white mb-md-4">Gallery</h1>
                <a href="index.php" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                <a href="gallery.php" class="btn btn-light py-md-3 px-md-5">Gallery</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Class Timetable Start -->
    <div class="container-fluid p-5">
        <div class="mb-5 text-center">
            <!-- <h5 class="text-primary text-uppercase">Class Schedule</h5> -->
            <h1 class="display-3 text-uppercase mb-0">Our Gallery</h1>
        </div>
        <div class="tab-class text-center">
            
            <div class="tab-content">
               
                    <div class="row">
                         <?php 
                        $i=1;
                        $stmt_gal = $pdo->prepare('SELECT * FROM gallery WHERE delete_status = 0 ');
                        $stmt_gal ->execute();
                        $cat_gal  =  $stmt_gal->fetchAll();
                        foreach ($cat_gal as $key_gal) {
                         
                         ?>
                        <div class="col-md-4 mb-3" >
                           
                                <img src="panel/assets/img/<?php echo $key_gal['photo'];?>" class="img" >
                            
                        </div>
                       
                        <?php } ?>
                        
                       
                    </div>
                
            
            </div>
        </div>
    </div>
    <!-- Class Timetable Start -->
    

    <!-- Footer Start -->
 <?php include('include/footer.php'); ?>