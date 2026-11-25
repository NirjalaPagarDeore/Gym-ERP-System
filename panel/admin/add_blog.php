 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Add Blog</h4>
            <a class="btn btn-primary text-white" href="manage_blog.php"  style="margin-right: 20px;">View Blogs</a>
          </div>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/blog.php" method="POST" id="categoryForm" enctype="multipart/form-data">

                        <div class="row">
                       

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Title</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter Title" />
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
                          <label class="form-label" for="basic-default-fullname">Date</label>
                          <input type="date" class="form-control" name="blog_date" />
                        </div>
                        
                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <textarea type="text" class="form-control" name="description" id="description"  placeholder="Enter Description" ></textarea>
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
document.getElementById("icon").addEventListener("change", function () {

    const file = this.files[0];
    const error = document.getElementById("icon");
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
            description: {
                required: true
            },
            short_content:{
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
            description: {
                required: "Please enter description"
            },
            short_content: {
                required: "Please enter a short_content"
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
