 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mb-4">Edit Class</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">   
                    
                    <div class="card-body">
                      <form action="app/class.php" method="POST" id="categoryForm" enctype="multipart/form-data">
                <?php 

                        $stmt = $pdo->prepare('SELECT * FROM class WHERE delete_status = 0 and id = ? ');
                        $stmt ->execute([$_POST['id']]);
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                         <input type="hidden" name="id" value="<?php echo $key['id'];?>">
                           <div class="row">
                        

                                          <div class="mb-3 col-md-6">
                                              <label class="form-label">Category</label>
                                              <select class="form-select" name="cate_id" >
                                                <option value="">Select</option>

                                                <?php
                                                $stmt = $pdo->prepare("SELECT * FROM class_category WHERE delete_status = 0");
                                                $stmt->execute();
                                                $plans = $stmt->fetchAll();

                                                foreach ($plans as $plan) {
                                                ?>
                                                  <option 
                                                    value="<?php echo $plan['id']; ?>"  <?php if($plan['id']==$key['cate_id']){ echo 'selected'; } ?>>
                                                    <?php echo $plan['name']; ?>
                                                  </option>
                                                <?php } ?>
                                              </select>
                                            </div>



                      
                     

                      
                          <div class="mb-3 col-md-6">
                              <label class="form-label">Title</label>
                              <input type="text" class="form-control" name="title" placeholder="Enter Title" value=" <?php echo $key['title']; ?>">
                            </div>


                            <div class="mb-3 col-md-6">
                              <label class="form-label">From </label>
                              <input type="time" class="form-control" name="from_time" placeholder="Enter From Time" value="<?php echo $key['from_time']; ?>">
                            </div>

                             <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">To</label>
                          <input type="time" class="form-control" name="to_time" value="<?php echo $key['to_time']; ?>"   />
                        </div>


                                   <div class="mb-3 col-md-6">
                                              <label class="form-label">Trainer</label>
                                              <select class="form-select" name="trainer" >
                                                <option value="">Select</option>

                                                <?php
                                                $stmt3 = $pdo->prepare("SELECT * FROM trainers WHERE delete_status = 0");
                                                $stmt3->execute();
                                                $plans3 = $stmt3->fetchAll();

                                                foreach ($plans3 as $plan3) {
                                                ?>
                                                  <option 
                                                    value="<?php echo $plan3['id']; ?>"  <?php if($plan3['id']==$key['trainer']){ echo 'selected'; } ?>>
                                                    <?php echo $plan3['name']; ?>
                                                  </option>
                                                <?php } ?>
                                              </select>
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
            cate_id: {
                required: true
            },
            name: {
                required: true,
                minlength: 2
            },
            cost: {                     // FIXED
                required: true,
                number: true
            },
            description: {
                required: true
            },
            status: {
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
            cost: {
                required: "Please enter cost",
                number: "Please enter a valid number"
            },
            description: {
                required: "Please enter description"
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
