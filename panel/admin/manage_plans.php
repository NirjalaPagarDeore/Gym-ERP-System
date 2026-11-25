<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Manage Plan</h4>
            <a class="btn btn-primary text-white" href="add_plans.php"  style="margin-right: 20px;">Add</a>
          </div>

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
                          <th>Plan Name</th>
                         <th>Type</th>
                       <th>Duration</th>
                       <th>Price</th>
                       <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $stmt = $pdo->prepare('SELECT * FROM plans WHERE delete_status = 0 ');
                        $stmt ->execute();
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['name'];?></strong>
                          </td>

                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['plan_type'];?></strong>
                          </td>

                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['duration'];?></strong>
                          </td>

                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['price'];?></strong>
                          </td>

                          <td>
                            <?php if($key['status']==1) { ?>
                              <strong class="text-success">Active</strong>

                           <?php  }else if($key['status']==0){?>

                             <strong class="text-danger">In-Active</strong>
                          <?php  } ?>
                          </td>

                       
                       
                          <td>
                            <div class="">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editCategory('<?php echo $key['id'];?>', 'edit_plans.php')"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="#"  onclick="deleteCategory('<?php echo $key['id'];?>', 'app/plans.php')"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
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
