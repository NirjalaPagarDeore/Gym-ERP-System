<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mb-4">Update Plans</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/plans.php" method="POST">
                        <?php 
// print_r($_POST);

                         $stmt = $pdo->prepare('SELECT * FROM plans WHERE delete_status = 0 and id = ? ');
                        $stmt ->execute([$_POST['id']]);
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         ?>

                         <div class="row">
                          <input type="hidden" class="form-control" name="id" value="<?php echo $key['id'];?>" >
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" name="name" value="<?php echo $key['name'];?>" id="basic-default-fullname" placeholder="Enter Name" />
                        </div>


                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="plan_type">Plan Type</label>
                            <select class="form-control" id="plan_type" name="plan_type" required>
                              <option value="">Select Plan Type</option>
                              <option value="monthly" <?php if($key['plan_type']=='monthly'){ echo 'selected';}?>>Monthly</option>
                              <option value="quarterly" <?php if($key['plan_type']=='quarterly'){ echo 'selected';}?>>Quarterly</option>
                              <option value="yearly" <?php if($key['plan_type']=='yearly'){ echo 'selected';}?>>Yearly</option>
                            </select>
                        </div>



                         <div class="mb-3 col-md-6">
                           <label class="form-label" for="duration">Duration (in months)</label>
                             <input type="number"  class="form-control"  id="duration"  name="duration" value="<?php echo $key['duration'];?>" placeholder="e.g. 1, 3, 12" >
                        </div>

                         <div class="mb-3 col-md-6">
                           <label class="form-label" for="duration">Price</label>
                             <input type="number"  class="form-control" name="price" value="<?php echo $key['price'];?>" placeholder="Enter plan price" >
                        </div>



                         <div class="mb-3 col-md-6">
                           <label class="form-label" for="status">Status</label>
                             
                            <select class="form-control" id="status" name="status">
                              <option value="1" <?php if($key['status']=='1'){ echo 'selected';}?>>Active</option>
                              <option value="0" <?php if($key['status']=='0'){ echo 'selected';}?>>Inactive</option>
                            </select>
                        </div>
                       
                       </div>
                  
                        <button type="submit" name="update" class="btn btn-primary">Save</button>
                      </form>
                    <?php } ?>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
        </div>

<?php include ('include/footer.php'); ?>
