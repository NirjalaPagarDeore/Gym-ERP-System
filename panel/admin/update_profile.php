<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

           <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">
                 Update Profile
              </h4>

              <?php 
                       
                        $profile = $pdo->prepare('SELECT * FROM login WHERE id = ? ');
                        $profile ->execute([$_SESSION['user_id']]);
                        $updateprofile  =  $profile->fetch();

                        ?>

              <div class="row">
                <div class="col-md-12">
                 <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                     <form id="formAccountSettings" action="app/profile.php" method="POST" enctype="multipart/form-data" >

                      <input type="hidden" name="id" value="<?php echo $updateprofile['id'] ; ?>">
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="../assets/img/avatars/<?php echo $updateprofile['photo'] ; ?>"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="hidden" name="old_photo" value="<?= $updateprofile['photo'] ?>">
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              name= "photo"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                   

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                     
                        
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label"> Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              value="<?php echo $updateprofile['name'] ; ?>"
                              autofocus
                            />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="email"
                              value="<?php echo $updateprofile['email']; ?>"
                              placeholder="john.doe@example.com"
                            />
                          </div>

                          
                        
                   
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="update" class="btn btn-primary me-2">Save changes</button>
                        
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                </div>
              </div>
            </div>
        </div>

<?php include ('include/footer.php'); ?>
