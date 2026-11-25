 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Change Password</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/change_password.php" method="POST" id="categoryForm">
                        
                        <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Old Password</label>
                          <input type="password" class="form-control" name="old_pw"  placeholder="Enter Old Password" />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">New Psssword</label>
                          <input type="password" class="form-control" name="new_pw"  placeholder="Enter New Password" />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Confirm Psssword</label>
                          <input type="password" class="form-control" name="confirm_pw"  placeholder="Enter Confirm Password" />
                        </div>
                      
                       </div>
                  
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                      </form>
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
            old_pw: {
                required: true
              
            },
            new_pw: {
                required: true
            },
            confirm_pw: {
                required: true
            }
        },
        messages: {
            old_pw: {
                required: "Please enter  old password"
               
            },
           new_pw: {
                required: "Please enter  new password"
               
            },
             confirm_pw: {
                required: "Please enter  confirm  password"
               
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
