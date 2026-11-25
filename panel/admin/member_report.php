 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-2
              "> Member Report</h4>
              <p style="padding-left: 20px;">Members registered between the selected dates will be displayed.</p>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="#" method="POST" id="categoryForm">
                        
                        <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">From Date</label>
                          <input type="date" class="form-control" name="form_date"  placeholder="Enter Name" />
                        </div>  
                       <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">To Date</label>
                          <input type="date" class="form-control" name="to_date"  placeholder="Enter Name" />
                        </div>
                       </div>
                  
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>

               <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                     <div class="card">
                
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                         
                          <th>Plan Type</th>
                         <th>Phone</th>
                          <th>Payment Mode</th>
                         <th>Joining Date</th>
                         <th>Exp Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $total= 0 ;
                        if(isset($_POST['submit'])){

                            // print_r($_POST); exit;

                             $stmt = $pdo->prepare('SELECT * FROM members WHERE date BETWEEN ? AND ? AND delete_status = 0 ; ');
                        $stmt ->execute([$_POST['form_date'],$_POST['to_date']]);
                        }else{

                           $stmt = $pdo->prepare('SELECT * FROM members WHERE delete_status = 0 ');
                        $stmt ->execute();  
                        }
                       
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['name'];?></strong>
                          </td>

                           <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php
                              $stmt_plan = $pdo->prepare('SELECT * FROM plans WHERE id = ? AND delete_status = 0 ; ');
                        $stmt_plan ->execute([$key['plan_id']]);

                        $roe= $stmt_plan -> fetch();


                             echo $roe['plan_type'];?></strong>
                          </td>
                       
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['phone'];?></strong>
                          </td>
                           <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['payment_mode'];?></strong>
                          </td>

                           <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo date('d-m-Y', strtotime($key['date'])) ;?></strong>
                          </td>

                           <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo date('d-m-Y', strtotime($key['exp_date'])) ;?></strong>
                          </td>
                        
                        </tr>

                        
                      <?php  } ?>
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


