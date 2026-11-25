 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Add Trainer</h4>
            <a class="btn btn-primary text-white" href="manage_trainer.php"  style="margin-right: 20px;">View</a>
          </div>
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/trainer.php" method="POST" id="categoryForm" enctype="multipart/form-data">

                        <div class="row">

                            <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter Trainer Name" />
                        </div>



                            <div class="mb-3 col-md-6">
                              <label class="form-label">Image</label>
                              <input type="file"
                                     class="form-control"
                                     name="photo"
                                     id="photo"
                                     accept=".jpg,.jpeg,.png,.webp">
                              <span id="photoError" class="text-danger"></span>
                            </div>
                        
                        
                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Phone</label>
                          <input type="text" class="form-control" name="phone"  placeholder="Enter Trainer Contact" />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                          <input type="email" class="form-control" name="email"  placeholder="Enter Trainer email" />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Salary</label>
                          <input type="number" class="form-control" name="salary"  placeholder="Enter Trainer Salary" />
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Address</label>
                          <textarea type="text" class="form-control" name="address"  placeholder="Enter Trainer address" ></textarea>
                        </div>

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter description" ></textarea>
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
document.getElementById("photo").addEventListener("change", function () {

    const file = this.files[0];
    const error = document.getElementById("photoError");
    error.innerText = "";

    if (!file) return;

    const allowed = ["jpg", "jpeg", "png", "webp"];
    const ext = file.name.split(".").pop().toLowerCase();

    if (!allowed.includes(ext)) {
        error.innerText = "Only JPG, JPEG, PNG, WEBP images are allowed";
        this.value = ""; // reset file input
    }
});
</script>


<script>
$(document).ready(function () {

  $("#categoryForm").validate({

    rules: {
      name: {
        required: true,
        minlength: 2
      },
      photo: {
        required: true
       
      },
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10
      },
      email: {
        required: true,
        email: true
      },
      salary: {
        required: true,
        number: true,
        min: 1
      },
      address: {
        required: true,
        minlength: 5
      }
    },

    messages: {
      name: {
        required: "Please enter trainer name",
        minlength: "Name must be at least 2 characters"
      },
      photo: {
        required: "Only jpg, jpeg, png, webp files allowed"
      },
      phone: {
        required: "Please enter phone number",
        digits: "Only numbers allowed",
        minlength: "Phone number must be 10 digits",
        maxlength: "Phone number must be 10 digits"
      },
      email: {
        required: "Please enter email",
        email: "Please enter valid email"
      },
      salary: {
        required: "Please enter salary",
        number: "Please enter valid amount",
        min: "Salary must be greater than 0"
      },
      address: {
        required: "Please enter address",
        minlength: "Address must be at least 5 characters"
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



