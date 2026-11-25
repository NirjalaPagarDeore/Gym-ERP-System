<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mb-4">Update Category</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/category.php" method="POST">
                        <?php 
// print_r($_POST);

                         $stmt = $pdo->prepare('SELECT * FROM category WHERE delete_status = 0 and id = ? ');
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
