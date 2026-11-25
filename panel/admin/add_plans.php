 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Add Plan</h4>
            <a class="btn btn-primary text-white" href="manage_plans.php"  style="margin-right: 20px;">View</a>
          </div>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/plans.php" method="POST" id="categoryForm">
                        
                        <div class="row">
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter Plan Name" />
                        </div>



                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="plan_type">Plan Type</label>
                            <select class="form-control" id="plan_type" name="plan_type" required>
                              <option value="">Select Plan Type</option>
                              <option value="monthly">Monthly</option>
                              <option value="quarterly">Quarterly</option>
                              <option value="yearly">Yearly</option>
                            </select>
                        </div>



                         <div class="mb-3 col-md-6">
                           <label class="form-label" for="duration">Duration (in months)</label>
                             <input type="number"  class="form-control"  id="duration"  name="duration" placeholder="e.g. 1, 3, 12" >
                        </div>

                         <div class="mb-3 col-md-6">
                           <label class="form-label" for="duration">Price</label>
                             <input type="number"  class="form-control" name="price" placeholder="Enter plan price" >
                        </div>



                         <div class="mb-3 col-md-6">
                           <label class="form-label" for="status">Status</label>
                             
                            <select class="form-control" id="status" name="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
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
$(document).ready(function () {

  $("#categoryForm").validate({

    rules: {
      name: {
        required: true,
        minlength: 2
      },
      plan_type: {
        required: true
      },
      duration: {
        required: true,
        number: true,
        min: 1
      },
      price: {
        required: true,
        number: true,
        min: 1
      },
      status: {
        required: true
      }
    },

    messages: {
      name: {
        required: "Please enter plan name",
        minlength: "Plan name must be at least 2 characters"
      },
      plan_type: {
        required: "Please select plan type"
      },
      duration: {
        required: "Please enter duration",
        number: "Please enter valid number",
        min: "Duration must be at least 1 month"
      },
      price: {
        required: "Please enter price",
        number: "Please enter valid price",
        min: "Price must be greater than 0"
      },
      status: {
        required: "Please select status"
      }
    },

    errorElement: "span",
    errorClass: "text-danger",

    highlight: function (element) {
      $(element).addClass("is-invalid");
    },

    unhighlight: function (element) {
      $(element).removeClass("is-invalid");
    }

  });

});
</script>

