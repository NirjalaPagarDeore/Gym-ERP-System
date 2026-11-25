<?php 
include '../assets/constant/config.php';
// print_r($_GET['id']);

$stmt = $pdo->prepare(" SELECT * FROM `members` WHERE id = ? ");
$stmt->execute([$_GET['id']]);

$row = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment Receipt</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
    }
    .receipt {
      max-width: 600px;
      margin: 40px auto;
      background: #fff;
      padding: 20px;
      border: 1px solid #ddd;
    }
    .receipt-header {
      text-align: center;
      border-bottom: 2px solid #000;
      margin-bottom: 20px;
    }
    .receipt-header h2 {
      margin: 0;
    }
    .details {
      width: 100%;
      border-collapse: collapse;
    }
    .details td {
      padding: 8px;
    }
    .details tr td:first-child {
      font-weight: bold;
      width: 40%;
    }
    .total {
      text-align: right;
      font-size: 18px;
      font-weight: bold;
      margin-top: 15px;
    }
    .footer {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
    }
    .paid {
      color: green;
      font-weight: bold;
      font-size: 20px;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="receipt">

  <div class="receipt-header">
    <h2>GYM PAYMENT RECEIPT</h2>
    <p>Fitness Center</p>
  </div>

  <table class="details">
    <tr>
      <td>Receipt No</td>
      <td>#REC-00<?php echo $row['id'];  ?></td>
    </tr>
    <tr>
      <td>Member Name</td>
      <td><?php echo $row['name'];  ?></td>
    </tr>
    <tr>
      <td>Membership Plan</td>
      <td><?php

        $stmtt = $pdo->prepare(" SELECT * FROM `plans` WHERE id = ? ");
        $stmtt->execute([$row['plan_id']]);

        $rowt = $stmtt->fetch();

       echo $rowt['plan_type'];  ?></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><?php echo $row['phone'];  ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $row['email'];  ?></td>
    </tr>
    <tr>
      <td>Payment Date</td>
      <td><?php echo $row['date'];  ?></td>
    </tr>
  </table>

  <div class="total">
    Total Paid: ₹ <?php echo $row['price'];  ?>
  </div>

  <div class="paid">
    PAYMENT SUCCESSFUL
  </div>

  <div class="footer">
    Thank you for choosing our gym 💪<br>
    This is a system generated receipt.
  </div>

</div>

</body>
</html>
