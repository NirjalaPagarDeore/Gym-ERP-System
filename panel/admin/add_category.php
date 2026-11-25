 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Add Category</h4>
            <a class="btn btn-primary text-white" href="manage_category.php"  style="margin-right: 20px;">View</a>
          </div>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/category.php" method="POST" id="categoryForm">
                        
                        <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter Plan Name" />
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
            name: {
                required: true,
                minlength: 2
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter category name",
                minlength: "Name must be at least 2 characters"
            },
            status: {
                required: "Please select a status"
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
