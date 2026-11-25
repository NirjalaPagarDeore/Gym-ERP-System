<!-- </?php include ('app/check_login.php'); ?> -->
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
               <!-- Card 1 -->
                 <?php 

                        $stmt = $pdo->prepare('SELECT * FROM members WHERE delete_status = 0 and status = 1 ');
                        $stmt ->execute();
                        $cat  =  $stmt->fetchAll();
                       
                         $count = count($cat);
                         ?>
                 <div class="col-md-6 col-xl-4">
                  <div class="card bg-primary text-white mb-3">
                    <div class="card-header"><i class="menu-icon tf-icons bx bx-book"></i></div>
                    <div class="card-body">
                      <h5 class="card-title text-white">Total Active Members</h5>
                      <p class="card-text text-right"><?php echo $count ; ?></p>
                     
                    </div>
                  </div>
                </div>
               <!-- card 1 end -->

              
                <!-- card 2 -->
              <?php 

                        $stmt4 = $pdo->prepare('SELECT * FROM service WHERE delete_status = 0 ');
                        $stmt4 ->execute();
                        $cat4  =  $stmt4->fetchAll();
                       
                         $count4 = count($cat4);
                         ?>
                   <div class="col-md-6 col-xl-4">
                  <div class="card bg-success text-white mb-3">
                    <div class="card-header"><i class="menu-icon tf-icons bx bx-note"></i></div>
                    <div class="card-body">
                      <h5 class="card-title text-white">Total Services</h5>
                      <p class="card-text text-right"><?php echo $count4 ; ?></p>
                    </div>
                  </div>
                </div>
                <!-- end card 2 -->

                 <!-- card 3 -->
              <?php 

                        $stmt4 = $pdo->prepare('SELECT * FROM testimonial WHERE delete_status = 0 ');
                        $stmt4 ->execute();
                        $cat4  =  $stmt4->fetchAll();
                       
                         $count4 = count($cat4);
                         ?>
                   <div class="col-md-6 col-xl-4">
                  <div class="card bg-danger text-white mb-3">
                    <div class="card-header"><i class="menu-icon tf-icons bx bx-note"></i></div>
                    <div class="card-body">
                      <h5 class="card-title text-white">Total Testimonials</h5>
                      <p class="card-text text-right"><?php echo $count4 ; ?></p>
                    </div>
                  </div>
                </div>
                <!-- end card 3 -->

                  <!-- card 4 -->
              <?php 

                        $stmt4 = $pdo->prepare('SELECT * FROM trainers WHERE delete_status = 0 ');
                        $stmt4 ->execute();
                        $cat4  =  $stmt4->fetchAll();
                       
                         $count4 = count($cat4);
                         ?>
                   <div class="col-md-6 col-xl-4">
                  <div class="card bg-secondary text-white mb-3">
                    <div class="card-header"><i class="menu-icon tf-icons bx bx-note"></i></div>
                    <div class="card-body">
                      <h5 class="card-title text-white">Total Trainers</h5>
                      <p class="card-text text-right"><?php echo $count4 ; ?></p>
                    </div>
                  </div>
                </div>
                <!-- end card 4 -->




                       <!-- card 5 -->
              <?php 

                        $stmt5 = $pdo->prepare('SELECT * FROM blog WHERE delete_status = 0 ');
                        $stmt5 ->execute();
                        $cat5  =  $stmt5->fetchAll();
                       
                         $count5 = count($cat5);
                         ?>
                   <div class="col-md-6 col-xl-4">
                  <div class="card bg-warning text-white mb-3">
                    <div class="card-header"><i class="menu-icon tf-icons bx bx-note"></i></div>
                    <div class="card-body">
                      <h5 class="card-title text-white">Total Blog</h5>
                      <p class="card-text text-right"><?php echo $count5 ; ?></p>
                    </div>
                  </div>
                </div>
                <!-- end card 5 -->




                       <!-- card 5 -->
              <?php 

                        $stmt6 = $pdo->prepare('SELECT * FROM contactus  ');
                        $stmt6 ->execute();
                        $cat6  =  $stmt6->fetchAll();
                       
                         $count6 = count($cat6);
                         ?>
                   <div class="col-md-6 col-xl-4">
                  <div class="card bg-primary text-white mb-3">
                    <div class="card-header"><i class="menu-icon tf-icons bx bx-note"></i></div>
                    <div class="card-body">
                      <h5 class="card-title text-white">Total Contact Us</h5>
                      <p class="card-text text-right"><?php echo $count6 ; ?></p>
                    </div>
                  </div>
                </div>
                <!-- end card 5 -->

              </div>
              </div>
              
            </div>
            <!-- / Content -->

          
             
             
    <!-- / Layout wrapper -->
    
    <h4 class="fw-bold mb-2">Upcoming Plan Expiry List</h4>
         <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                   
                
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                           <th>Name</th>
                           
                          <th>Contact</th>
                            <th>Expiry Date</th>
                             <th>Days Left To Expire plan</th>
                              <th>Renew Plan</th>
                    
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;

                        $stmt = $pdo->prepare('SELECT * FROM members
  WHERE exp_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 DAY)
  AND delete_status = 0
  ORDER BY exp_date ASC');
                        $stmt ->execute();
                        $members  =  $stmt->fetchAll();
                        // foreach ($cat as $key) {
                         foreach ($members as $row): 
  $daysLeft = (strtotime($row['exp_date']) - strtotime(date('Y-m-d'))) / 86400;
?>
<tr class="<?php echo ($daysLeft <= 3) ? 'table-warning' : ''; ?>">
  <td><?= $row['name']; ?></td>
  <td><?= $row['phone']; ?></td>
  <td><?= date('d M Y', strtotime($row['exp_date'])); ?></td>
  <td>
    <?php if ($daysLeft == 0): ?>
      <span class="badge bg-danger">Expires Today</span>
    <?php else: ?>
      <span class="badge bg-warning text-dark">
        <?= ceil($daysLeft); ?> days left
      </span>
    <?php endif; ?>
  </td>
  <td>
     <a class="dropdown-item" href="javascript:void(0);" onclick="editCategory('<?php echo $row['id'];?>', 'renew_plan.php')"><i class="bx bx-edit-alt me-1"></i> Renew Plan</a>
  </td>
</tr>
<?php endforeach; ?>
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
                  </div>
                </div>
               
           


    <?php include ('include/footer.php'); ?>
