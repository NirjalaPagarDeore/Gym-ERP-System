 
<?php include ('include/header.php'); ?>

<?php include ('include/sidebar.php'); ?>

   <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold mb-3">Add Sale </h4>

              <!-- Basic Layout -->
              <div class="row mt-1">
                <div class="col-xl">
                  <div class="card mb-4">
                    
                    <div class="card-body">
                      <form action="app/sale.php" method="POST" id="categoryForm">

                        <div class="row">
                       


                             <div class="mb-3 col-md-6">
  <label class="form-label">Name</label>
  
  <input type="text" class="form-control" name="name" >
</div>


      <div class="mb-3 col-md-6">
  <label class="form-label">Phone</label>
  
  <input type="text" class="form-control" name="phone" >
</div>

 <div class="mb-3 col-md-6">
  <label class="form-label">Address</label>
  
  <input type="text" class="form-control" name="address" >
</div>


<div class="mb-3 col-md-6">
  <label class="form-label">Remark</label>
  
  <input type="text" class="form-control" name="remark" >
</div>
                  

                   <div class="mb-3 col-md-6">
  <label class="form-label"> Date</label>
  <input type="date" class="form-control" id="date" name="date"
         >
</div>

<!-- PRODUCT ROWS CONTAINER -->
<div id="productRows">

  <!-- FIRST VISIBLE ROW -->
  <div class="row product-row">


  <div class="mb-3 col-md-2">
  <label class="form-label">Product</label>
  <select class="form-select productSelect" name="cate_id[]" required>
    <option value="">Select</option>
    <?php
      $stmt_cate = $pdo->prepare("SELECT * FROM product WHERE delete_status=0 AND status=1");
      $stmt_cate->execute();
      foreach ($stmt_cate->fetchAll() as $cat_p): ?>
        <option value="<?php echo $cat_p['id']; ?>"><?php echo $cat_p['name']; ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div class="mb-3 col-md-2">
  <label class="form-label">Type</label>
  <select class="form-select typeSelect" name="type[]" required>
    <option value="">Select Product First</option>
  </select>
</div>
  <div class="mb-3 col-md-1">
  <label class="form-label">Stock</label>
  <input type="number" class="form-control stockField" name="stock[]" readonly>
</div>
    <div class="mb-3 col-md-1">
      <label class="form-label">Qty</label>
      <input type="number" class="form-control qty" name="qty[]" min="1" required>
    </div>
   <div class="mb-3 col-md-2">
  <label class="form-label">Rate</label>
  <input type="number" class="form-control rateField" name="rate[]" readonly>
</div>
    

     <div class="mb-3 col-md-2">
      <label class="form-label">Total</label>
      <input type="number" class="form-control total" name="total[]"  required>
    </div>
     

    <div class="mb-3 col-md-1 d-flex align-items-end">
      <button type="button" class="btn btn-success" id="addRow">+</button>
    </div>

  </div>
</div>

<!-- HIDDEN TEMPLATE ROW -->
<div class="row product-row d-none" id="rowTemplate">
<div class="mb-3 col-md-2">
  <label class="form-label">Product</label>
  <select class="form-select productSelect" name="cate_id[]" required>
    <option value="">Select</option>
    <?php
      $stmt_cate = $pdo->prepare("SELECT * FROM product WHERE delete_status=0 AND status=1");
      $stmt_cate->execute();
      foreach ($stmt_cate->fetchAll() as $cat_p): ?>
        <option value="<?php echo $cat_p['id']; ?>"><?php echo $cat_p['name']; ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div class="mb-3 col-md-2">
  <label class="form-label">Type</label>
  <select class="form-select typeSelect" name="type[]" required>
    <option value="">Select Product First</option>
  </select>
</div>

 <div class="mb-3 col-md-1">
  <label class="form-label">Stock</label>
  <input type="number" class="form-control stockField" name="stock[]" readonly>
</div>
    <div class="mb-3 col-md-1">
      <label class="form-label">Qty</label>
      <input type="number" class="form-control qty" name="qty[]" min="1" required>
    </div>
   <div class="mb-3 col-md-2">
  <label class="form-label">Rate</label>
  <input type="number" class="form-control rateField" name="rate[]" readonly>
</div>
    

     <div class="mb-3 col-md-2">
      <label class="form-label">Total</label>
      <input type="number" class="form-control total" name="total[]"  required>
    </div>

  <div class="mb-3 col-md-2 d-flex align-items-end">
    <button type="button" class="btn btn-danger removeRow">−</button>
  </div>

</div>


                  <div class="row align-items-center mb-2">
  <div class="col-md-8"><strong>Discount(%)</strong></div>
  <div class="col-md-3"><input type="text" name="discount" id="discount" class="form-control"></div>
</div>

<div class="row align-items-center mb-2">
  <div class="col-md-8"><strong>Tax</strong></div>
  <div class="col-md-3">
   <select class="form-select" name="tax" id="tax" required>
    <option value="">Select</option>
    <?php
      $stmt_tax = $pdo->prepare("SELECT * FROM tax  ");
      $stmt_tax->execute();
      foreach ($stmt_tax->fetchAll() as $tax): ?>
       <option value="<?= $tax['id']; ?>" data-value="<?= $tax['value']; ?>">
  <?= $tax['name'] ?> (<?= $tax['value'] ?>%)
</option>
    <?php endforeach; ?>
  </select>
</div>
</div>

<div class="row align-items-center mb-2">
  <div class="col-md-8"><strong>Final Total</strong></div>
  <div class="col-md-3"><input type="text" class="form-control" id="final_total" name="final_total"></div>
</div>



<div class="row mb-2">
  <div class="col-md-8"><strong>Paid Amount</strong></div>
  <div class="col-md-3"><input type="number" id="paid_amount" name="paid_amount" class="form-control"></div>
</div>

<div class="row mb-2">
  <div class="col-md-8"><strong>Balance</strong></div>
  <div class="col-md-3"><input type="text" id="balance" name="balance" class="form-control" readonly></div>
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
$(document).on('change', '.productSelect', function() {
    var productId = $(this).val();
    var typeSelect = $(this).closest('.product-row').find('.typeSelect');

    typeSelect.html('<option>Loading...</option>');

    $.ajax({
        url: 'getTypes.php',
        type: 'POST',
        data: {product_id: productId},
        success: function(response) {
            typeSelect.html(response);
        }
    });
});



$(document).on('change', '.typeSelect', function() {
    var typeId = $(this).val();
    var row = $(this).closest('.product-row');

    $.ajax({
        url: 'getTypes.php',
        type: 'POST',
        data: {type_id: typeId},
        dataType: 'json',
        success: function(res) {
            row.find('.stockField').val(res.stock);
            row.find('.rateField').val(res.rate);
        }
    });
});
</script>
<script>

$(document).on('input', '.qty, .rateField', function() {
    let row = $(this).closest('.product-row');
    let qty = parseFloat(row.find('.qty').val()) || 0;
    let rate = parseFloat(row.find('.rateField').val()) || 0;

    let total = qty * rate;
    row.find('.total').val(total.toFixed(2));

    calculateFinal();
});

// Check stock
$(document).on('input', '.qty', function() {
    let row = $(this).closest('.product-row');
    let qty = parseInt($(this).val()) || 0;
    let stock = parseInt(row.find('.stockField').val()) || 0;

    if (qty > stock) {
        alert("Qty cannot be more than stock!");
        $(this).val(stock);
        qty = stock;
    }

    row.find('.total').val((qty * parseFloat(row.find('.rateField').val() || 0)).toFixed(2));
    calculateFinal();
});

// Trigger discount input
$(document).on("input", "#discount", function(){
    calculateFinal();
});

// Trigger paid input
$(document).on("input", "#paid_amount", function(){
    calculateFinal();
});

// Trigger tax dropdown
$(document).on("change", "#tax", function(){
    calculateFinal();
});


function calculateFinal() {
    let sum = 0;

    // SUM TOTALS
    $(".total").each(function() {
        let v = parseFloat($(this).val());
        if (!isNaN(v)) sum += v;
    });

    // DISCOUNT
    let discount = parseFloat($("#discount").val()) || 0;
    let afterDiscount = sum - ((sum * discount) / 100);

    // TAX (from data-value)
    let taxValue = parseFloat($("#tax option:selected").data("value")) || 0;
    let finalAmount = afterDiscount + ((afterDiscount * taxValue) / 100);

    $("#final_total").val(finalAmount.toFixed(2));

    // PAID + BALANCE
    let paid = parseFloat($("#paid_amount").val()) || 0;
    $("#balance").val((finalAmount - paid).toFixed(2));
}

</script>

<script>
document.getElementById("addRow").addEventListener("click", function () {
    let template = document.getElementById("rowTemplate");
    let clone = template.cloneNode(true);

    clone.classList.remove("d-none");
    clone.removeAttribute("id");

    document.getElementById("productRows").appendChild(clone);
});

document.addEventListener("click", function (e) {
    if (e.target.classList.contains("removeRow")) {
        e.target.closest(".product-row").remove();
    }
});
</script>



<script>
$(document).ready(function() {

    $("#categoryForm").validate({
        rules: {
            
            name: {
                required: true
              
            },
            phone: {
                required: true,
               minlength:10,
               maxlength:10,
               digits:true
            },

            address: {
                required: true,
                minlength: 2
            }
           
        },

        messages: {
            address: {
                required: "Please enter a address"
            },
            name: {
                required: "Please enter name",
                minlength: "Name must be at least 2 characters"
            },
            phone: {
                required: "Please enter phone",
                number: "Please enter a valid number"
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
