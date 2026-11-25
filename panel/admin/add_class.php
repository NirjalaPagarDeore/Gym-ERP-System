 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Add Class</h4>
            <a class="btn btn-primary text-white" href="manage_class.php"  style="margin-right: 20px;">View</a>
          </div>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/class.php" method="POST" id="categoryForm" enctype="multipart/form-data">

                        <div class="row">

                            

                                         <div class="mb-3 col-md-6">
                                          <label class="form-label">Category</label>
                                          <select class="form-select select2" name="cate_id" >
                                            <option value="">Select</option>

                                            <?php
                                            $stmt = $pdo->prepare("SELECT * FROM class_category WHERE delete_status = 0");
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
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control" name="title" placeholder="Enter Title">
                            </div>


                            <div class="mb-3 col-md-6">
                              <label class="form-label">From </label>
                              <input type="time" class="form-control" name="from_time" placeholder="Enter From Time">
                            </div>

                             <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">To</label>
                          <input type="time" class="form-control" name="to_time" placeholder="Enter To Time"   />
                        </div>

                         <div class="mb-3 col-md-6">
                                          <label class="form-label">Trainer</label>
                                          <select class="form-select select2" name="trainer" >
                                            <option value="">Select</option>

                                            <?php
                                            $stmt = $pdo->prepare("SELECT * FROM trainers WHERE delete_status = 0");
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
$('#to_time').timepicker({
    timeFormat: 'HH:mm'
});
</script>
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
      title: {
        required: true,
        minlength: 2
      },
       trainer: {
        required: true
       
      },
      from_time: {
        required: true
      },
       to_time: {
        required: true
      }
    },

    messages: {
      cate_id: {
        required: "Please select category"
      },
      title: {
        required: "Please enter  title",
        minlength: "title must be at least 2 characters"
      },

       trainer: {
        required: "Please enter  trainer name",
        minlength: "title must be at least 2 characters"
      },

       from_time: {
        required: "Please enter  from time"
      
      },
       to_time: {
        required: "Please enter  To time"
      
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



