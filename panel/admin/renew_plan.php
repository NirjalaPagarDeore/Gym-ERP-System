 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mb-4">Renew Plan</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/customer.php" method="POST" id="categoryForm" enctype="multipart/form-data">
                <?php 

                        $stmt = $pdo->prepare('SELECT * FROM members WHERE delete_status = 0 and id = ? ');
                        $stmt ->execute([$_POST['id']]);
                        $cat  =  $stmt->fetchAll();
                        foreach ($cat as $key) {
                         
                         ?>
                         <input type="hidden" name="id" value="<?php echo $key['id'];?>">
                           <div class="row">
                        

                       <div class="mb-3 col-md-12">
          <label class="form-label">Name</label>
           <input type="text" class="form-control" value="<?php echo $key['name'];?>" readonly>
         </div>
       
                 <div class="mb-3 col-md-12">
                    <label class="form-label">Plans</label>
                    <select class="form-select" name="plan_id" id="planSelect">
                      <option value="">Select</option>

                      <?php
                      $stmt = $pdo->prepare("SELECT * FROM plans WHERE delete_status = 0");
                      $stmt->execute();
                      $plans = $stmt->fetchAll();

                      foreach ($plans as $plan) {
                      ?>
                        <option 
                          value="<?php echo $plan['id']; ?>" data-plan="<?php echo $plan['plan_type']; ?>"
                          data-price="<?php echo $plan['price']; ?>" <?php if($plan['id']==$key['plan_id']){ echo 'selected'; } ?>>
                          <?php echo $plan['plan_type']; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>



                      
                     <div class="mb-3 col-md-12">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $key['price'];?>" id="price" readonly>
                    </div>


                     <div class="mb-3 col-md-12">
                          <label class="form-label" for="basic-default-fullname">Joining Date</label>
                          <input type="date" class="form-control" name="date" id="joinDate" value="<?php echo $key['date'];?>"  />
                        </div>

                         <div class="mb-3 col-md-12">
                          <label class="form-label" for="basic-default-fullname">Expiry Date</label>
                          <input type="date" class="form-control" name="exp_date" id="expDate" value="<?php echo $key['exp_date'];?>" readonly  />
                        </div>


                       </div>
                  
                        <button type="submit" name="plan_save" class="btn btn-primary">Save</button>
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
<script>
document.getElementById('planSelect').addEventListener('change', function () {
    let selectedOption = this.options[this.selectedIndex];
    let price = selectedOption.getAttribute('data-price') || '';
    document.getElementById('price').value = price;
});
</script>


<!-- below script is calcualte exp date  -->
<script>
document.getElementById('planSelect').addEventListener('change', calculateExpiry);
document.getElementById('joinDate').addEventListener('change', calculateExpiry);

function calculateExpiry() {
  const planSelect = document.getElementById('planSelect');
  const joinDateInput = document.getElementById('joinDate');
  const expDateInput = document.getElementById('expDate');

  const planType = planSelect.options[planSelect.selectedIndex]?.dataset.plan;
  const joinDateValue = joinDateInput.value;

  if (!planType || !joinDateValue) {
    expDateInput.value = '';
    return;
  }

  let joinDate = new Date(joinDateValue);

  if (planType === 'monthly') {
    joinDate.setMonth(joinDate.getMonth() + 1);
  } 
  else if (planType === 'quarterly') {
    joinDate.setMonth(joinDate.getMonth() + 3);
  } 
  else if (planType === 'yearly') {
    joinDate.setFullYear(joinDate.getFullYear() + 1);
  }

  // format YYYY-MM-DD
  const yyyy = joinDate.getFullYear();
  const mm = String(joinDate.getMonth() + 1).padStart(2, '0');
  const dd = String(joinDate.getDate()).padStart(2, '0');

  expDateInput.value = `${yyyy}-${mm}-${dd}`;
}
</script>