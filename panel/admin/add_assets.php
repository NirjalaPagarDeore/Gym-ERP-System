 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Add Assets</h4>
            <a class="btn btn-primary text-white" href="manage_assets.php"  style="margin-right: 20px;">View</a>
          </div>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/assets.php" method="POST" id="categoryForm" enctype="multipart/form-data">

                        <div class="row">

                            

                                         <div class="mb-3 col-md-6">
                                          <label class="form-label">Category</label>
                                          <select class="form-select select2" name="cate_id" >
                                            <option value="">Select</option>

                                            <?php
                                            $stmt = $pdo->prepare("SELECT * FROM category WHERE delete_status = 0");
                                            $stmt->execute();
                                            $plans = $stmt->fetchAll();

                                            foreach ($plans as $plan) {
                                            ?>
                                              <option 
                                                value="<?php echo $plan['id']; ?>">
                                                <?php echo $plan['name']; ?>
                                              </option>
                                            <?php } ?>
                                          </select>
                                        </div>


                                        <div class="mb-3 col-md-6">
                                          <label class="form-label" for="basic-default-fullname">Name</label>
                                          <input type="text" class="form-control" name="name"  placeholder="Enter Assets Name" />
                                        </div>

                            <div class="mb-3 col-md-6">
                              <label class="form-label">Price</label>
                              <input type="number" class="form-control" name="price" placeholder="Enter Assets price">
                            </div>


                            <div class="mb-3 col-md-6">
                              <label class="form-label">Vendor</label>
                              <input type="text" class="form-control" name="vendor_name" placeholder="Enter Vendor name">
                            </div>

                             <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Vendor Phone</label>
                          <input type="text" class="form-control" name="vendor_phone" value=""  />
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
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <textarea type="text" class="form-control" name="description"  placeholder="Enter Customer address" ></textarea>
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
      cate_id: {
        required: true
      },
      name: {
        required: true,
        minlength: 2
      },
      price: {
        required: true,
        number: true,
        min: 1
      },
      vendor_name: {
        required: true,
        minlength: 2
      },
      vendor_phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10
      },
      description: {
        required: true,
        minlength: 5
      },
      photo: {
         required: true,
        extension: "jpg|jpeg|png|webp"
      }
    },

    messages: {
      cate_id: {
        required: "Please select category"
      },
      name: {
        required: "Please enter asset name",
        minlength: "Asset name must be at least 2 characters"
      },
      price: {
        required: "Please enter price",
        number: "Please enter valid price",
        min: "Price must be greater than 0"
      },
      vendor_name: {
        required: "Please enter vendor name",
        minlength: "Vendor name must be at least 2 characters"
      },
      vendor_phone: {
        required: "Please enter vendor phone",
        digits: "Only numbers allowed",
        minlength: "Phone number must be 10 digits",
        maxlength: "Phone number must be 10 digits"
      },
      description: {
        required: "Please enter description",
        minlength: "Description must be at least 5 characters"
      },
      photo: {
        required: "Only jpg, jpeg, png, webp files allowed"
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



