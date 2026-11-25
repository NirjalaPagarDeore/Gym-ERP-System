 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mb-4">Edit Customer</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">   
                    
                    <div class="card-body">
                      <form action="app/assets.php" method="POST" id="categoryForm" enctype="multipart/form-data">
                <?php 

                        $stmt = $pdo->prepare('SELECT * FROM assets WHERE delete_status = 0 and id = ? ');
                        $stmt ->execute([$_POST['id']]);
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                         <input type="hidden" name="id" value="<?php echo $key['id'];?>">
                           <div class="row">
                        

                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" name="name"  value="<?php echo $key['name'];?>" />
                        </div>


                                          <div class="mb-3 col-md-6">
  <label class="form-label">Category</label>
  <select class="form-select" name="cate_id" >
    <option value="">Select</option>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM category WHERE delete_status = 0");
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
  <label class="form-label">Price</label>
  <input type="text" class="form-control" name="price" value="<?php echo $key['price'];?>" >
</div>


                        <div class="mb-3 col-md-6">
                          <label class="form-label" >Image</label>
                          <img src="../assets/img/<?php echo $key['photo'];?>" style ="height: 50px; width: 50px; margin-bottom: 4;">
                           <!-- Hidden field for old image -->
                    <input type="hidden" name="old_photo" value="<?php echo $key['photo']; ?>">
                          <input type="file" class="form-control" name="photo"  />
                        </div>

                      
                          <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Vendor Phone</label>
                          <input type="text" class="form-control" name="vendor_phone" value="<?php echo $key['vendor_phone']; ?>"  />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Vendor</label>
                          <input type="text" class="form-control" name="vendor_name" value="<?php echo $key['vendor_name']; ?>"  />
                        </div>


                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <textarea type="text" class="form-control" name="description" ><?php echo $key['description']; ?></textarea>
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
