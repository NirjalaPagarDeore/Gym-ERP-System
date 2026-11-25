<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Manage Assets</h4>
            <a class="btn btn-primary text-white" href="add_assets.php"  style="margin-right: 20px;">Add</a>
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
                            <th>Category</th>
                          <th>Name</th>
                            <th>Vendor</th>
                    
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;

                        $stmt = $pdo->prepare('SELECT * FROM assets WHERE delete_status = 0 ');
                        $stmt ->execute();
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                        <tr>

                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $i;?></strong>
                          </td>

                           <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>

                             <?php 

                        $stmt_cate = $pdo->prepare('SELECT * FROM category WHERE delete_status = 0 and id = ? ');
                        $stmt_cate ->execute([$key['cate_id']]);
                        $cat_cate  =  $stmt_cate->fetch();
                        


                             echo $cat_cate['name']; ?></strong>
                          </td>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['name'];?></strong>
                          </td>

                             <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $key['vendor_name'];?></strong>
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
                                <a class="dropdown-item" href="javascript:void(0);" onclick="editCategory('<?php echo $key['id'];?>', 'edit_assets.php')"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <a class="dropdown-item" href="#"  onclick="deleteCategory('<?php echo $key['id'];?>', 'app/assets.php')"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
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
