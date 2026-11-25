 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Add Member</h4>
            <a class="btn btn-primary text-white" href="manage_customer.php"  style="margin-right: 20px;">View</a>
          </div>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/customer.php" method="POST" id="categoryForm" enctype="multipart/form-data">

                        <div class="row">

                            <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Name</label>
                          <input type="text" class="form-control" name="name"  placeholder="Enter Member Name" />
                        </div>

                         <div class="mb-3 col-md-6">
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
        value="<?php echo $plan['id']; ?>" data-plan="<?php echo strtolower($plan['plan_type']); ?>"
        data-price="<?php echo $plan['price']; ?>">
        <?php echo $plan['plan_type']; ?>
      </option>
    <?php } ?>
  </select>
</div>

<div class="mb-3 col-md-6">
  <label class="form-label">Price</label>
  <input type="text" class="form-control" name="price" id="price" readonly>
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
                          <input type="text" class="form-control" name="phone"  placeholder="Enter Customer Contact" />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                          <input type="email" class="form-control" name="email"  placeholder="Enter Customer email" />
                        </div>


                        <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Address</label>
                          <textarea type="text" class="form-control" name="address"  placeholder="Enter Customer address" ></textarea>
                        </div>

                            <div class="mb-3 col-md-6">
                              <label class="form-label">Payment Mode</label>
                              <select class="form-select" name="payment_mode" >
                                <option value="">Select</option>
                                <option value="Cash">Cash</option>
                                <option value="UPI">UPI</option>
                                <option value="Unpaid">Unpaid</option>
                              </select>
                            </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Joining Date</label>
                          <input type="date" class="form-control" name="date" id="joinDate"  />
                        </div>

                         <div class="mb-3 col-md-6">
                          <label class="form-label" for="basic-default-fullname">Expiry Date</label>
                          <input type="date" class="form-control" name="exp_date" id="expDate" readonly  />
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
      plan_id: {
        required: true
      },
      price: {
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
      address: {
        required: true,
        minlength: 5
      },
      payment_mode: {
        required: true
      },
      date: {
        required: true
      },
      exp_date: {
        required: true
      },
      photo: {
       required: true
      }
    },

    messages: {
      name: {
        required: "Please enter member name",
        minlength: "Name must be at least 2 characters"
      },
      plan_id: {
        required: "Please select a plan"
      },
      price: {
        required: "Price is required"
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
      address: {
        required: "Please enter address",
        minlength: "Address must be at least 5 characters"
      },
      payment_mode: {
        required: "Please select payment mode"
      },
      date: {
        required: "Please select joining date"
      },
      exp_date: {
        required: "Expiry date is required"
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


<script>
document.getElementById('planSelect').addEventListener('change', function () {
    let selectedOption = this.options[this.selectedIndex];
    let price = selectedOption.getAttribute('data-price') || '';
    document.getElementById('price').value = price;
});
</script>

