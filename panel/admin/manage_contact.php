<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">View Contacts</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                     <div class="card">
                
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                         
                          
                           <th> Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Message</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        $stmt = $pdo->prepare('SELECT * FROM contactus ');
                        $stmt ->execute();
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                        <tr>
                            <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i;?></strong>
                          </td>
                         

                           <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['name'];?></strong>
                          </td>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['email'];?></strong>
                          </td>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['subject'];?></strong>
                          </td>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['message'];?></strong>
                          </td>


                           
                        
                         
                          
                          
                        </tr>

                      <?php $i++; } ?>
                                              </tbody>
                    </table>
                  </div>
                </div>
              </div>
                  </div>
                </div>
               
              </div>
            </div>
        </div>

<?php include ('include/footer.php'); ?>
