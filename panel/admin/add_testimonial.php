 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Add Testimonial</h4>
            <a class="btn btn-primary text-white" href="manage_testimonial.php"  style="margin-right: 20px;">View</a>
          </div>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/testimonial.php" method="POST" id="categoryForm" enctype="multipart/form-data">

                        <div class="row">
                         

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter Name" />
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
                          <label class="form-label">Designation</label>
                          <input type="text" class="form-control" name="role"  placeholder="Enter Designation" >
                        </div>
                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Feedback</label>
                          <textarea type="text" class="form-control" name="feedback" id="description"  placeholder="Enter Feedback" ></textarea>
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
$(document).ready(function() {

    $("#categoryForm").validate({
         ignore: [],
        rules: {
            cate_id: {
                required: true
            },
            name: {
                required: true,
                minlength: 2
            },
         photo: {
                required: true,
                extension: "jpg|jpeg|png|webp"
            },
            feedback: {
                required: true
            },
            role:{
                required: true
            }
        },

        messages: {
            cate_id: {
                required: "Please select a category"
            },
            name: {
                required: "Please enter name",
                minlength: "Name must be at least 2 characters"
            },
            photo: {
                required: "Please select an image",
                extension: "Only JPG, JPEG, PNG, or WEBP files are allowed"
            },
            feedback: {
                required: "Please enter feedback"
            },
            role: {
                required: "Please enter a role"
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
