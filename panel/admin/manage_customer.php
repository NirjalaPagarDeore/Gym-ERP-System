<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">View Members</h4>
            <a class="btn btn-primary text-white" href="add_customer.php"  style="margin-right: 20px;">Add</a>
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
                          <th>#</th>
                         
                        
                           <th> Name</th>
                            <th> Plan</th>
                          <th>Fee</th>
                           <th>Joining Date</th>
                           <th>Exp Date</th>
                           <th>Status</th>
                          <th>Print</th>
                          <th>Actions</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $i=1;
                        $stmt = $pdo->prepare('SELECT * FROM members WHERE delete_status = 0 ');
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
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php
                              $stmt1 = $pdo->prepare('SELECT * FROM plans WHERE delete_status = 0 and id=? ');
                        $stmt1 ->execute([$key['plan_id']]);
                        $cat1  =  $stmt1->fetch();

                             echo $cat1['plan_type'];?></strong>
                          </td>
                          

                          
                             <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['price'];?></strong>
                          </td>

                           <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo date('d-m-Y', strtotime($key['date'])) ;?></strong>
                          </td>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo date('d-m-Y', strtotime($key['exp_date'])) ;?></strong>
                          </td>
                           <td>
                            <?php if($key['status']==1) { ?>
                              <strong class="text-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key['id'];?>">Active</strong>

                           <?php  }else if($key['status']==0){?>

                             <strong class="text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $key['id'];?>">In-Active</strong>
                          <?php  } ?>
                          </td>

                           <td>

                            <a  href="reciept.php?id=<?php echo $key['id'];?>" 
                                  ><i class="bx bx-printer"></i> </a
                                >
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
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editCategory('<?php echo $key['id'];?>', 'edit_customer.php')"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a>

                                   <a class="dropdown-item" href="javascript:void(0);" onclick="editCategory('<?php echo $key['id'];?>', 'renew_plan.php')"><i class="bx bx-edit-alt me-1"></i> Renew Plan</a>

                                <a class="dropdown-item" href="javascript:void(0);"  onclick="deleteCategory('<?php echo $key['id'];?>', 'app/customer.php')"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                          
                        </tr>


                          <!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $key['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Status</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="app/customer.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $key['id'];?>">
       
       <div class="col-md-12">
  <select class="form-select" name="status">
    <option value="">Select</option>
    <option value="1" <?php if($key['status']== '1'){echo 'selected';}?>>Active</option>
    <option value="0" <?php if($key['status']== '0'){echo 'selected';}?>>Inactive</option>
   
  </select>
  
</div>
      </div>
      <div class="modal-footer">
       
        <button type="submit" name="save" class="btn btn-primary">Save</button>
      </div>
       </form>
    </div>
  </div>
</div>



                
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
