 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Edit Student</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/student.php" method="POST" id="categoryForm">
                        <?php 

                        $stmt = $pdo->prepare('SELECT * FROM login WHERE delete_status = 0  and id = ? ');
                        $stmt ->execute([$_POST['id']]);
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                        <div class="row">
                        
 <input type="hidden" class="form-control" name="id" value="<?php echo $key['id'];?>" >
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" name="name" value="<?php echo $key['name'];?>"  placeholder="Enter Name" />
                        </div>

                          <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                          <input type="email" class="form-control" name="email" value="<?php echo $key['email'];?>"  placeholder="Enter Email" />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Phone</label>
                          <input type="text" class="form-control" name="phone" value="<?php echo $key['phone'];?>" placeholder="Enter phone" />
                        </div>

                          <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Address</label>
                          <input type="text" class="form-control" name="address" value="<?php echo $key['address'];?>"  placeholder="Enter address" />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Course</label>
                          <input type="text" class="form-control" name="course" value="<?php echo $key['course'];?>"  placeholder="Enter Name" />
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Password</label>
                          <input type="password" class="form-control" name="password" value="<?php echo $key['password'];?>"  placeholder="Enter Name" />
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

<script>
$(document).ready(function() {

    $("#categoryForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            address: {
                required: true,
                minlength: 5
            },
            course: {
                required: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },

        messages: {
            name: {
                required: "Please enter name",
                minlength: "Name must be at least 2 characters"
            },
            email: {
                required: "Please enter email",
                email: "Enter a valid email"
            },
            phone: {
                required: "Please enter phone number",
                digits: "Only numbers allowed",
                minlength: "Phone must be 10 digits",
                maxlength: "Phone must be 10 digits"
            },
            address: {
                required: "Please enter address",
                minlength: "Address must be at least 5 characters"
            },
            course: {
                required: "Please enter course"
            },
            password: {
                required: "Please enter password",
                minlength: "Password must be at least 6 characters"
            }
        },

        errorClass: "text-danger",
        errorElement: "span",

        highlight: function(element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element) {
            $(element).removeClass("is-invalid");
        }
    });

});
</script>

