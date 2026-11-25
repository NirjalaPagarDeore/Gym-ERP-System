<?php 

 require '../../assets/constant/config.php';
// print_r($_POST);exit;
if(isset($_POST['submit'])) {

   

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $remark = $_POST['remark'];
    $date = $_POST['date'];
    $discount = $_POST['discount'];
    $tax = $_POST['tax'];
    $final_total = $_POST['final_total'];
    $paid_amount = $_POST['paid_amount'];
    $balance = $_POST['balance'];

    $pdo->prepare("
        INSERT INTO sale 
        (name, phone, address, remark, date, discount, tax, final_total, paid_amount, balance)
        VALUES (?,?,?,?,?,?,?,?,?,?)
    ")->execute([
        $name, $phone, $address, $remark, $date, $discount, $tax, $final_total, $paid_amount, $balance
    ]);

    $issue_id = $pdo->lastInsertId();

    // ITEM ARRAYS
    $productArr = $_POST['cate_id'];
    $typeArr = $_POST['type'];
    $qtyArr = $_POST['qty'];
    $rateArr = $_POST['rate'];
    $totalArr = $_POST['total'];

    for($i = 0; $i < count($productArr); $i++){
        $product_id = $productArr[$i];
        $type = $typeArr[$i];
        $qty = $qtyArr[$i];
        $rate = $rateArr[$i];
        $total = $totalArr[$i];

        // Insert item
        $pdo->prepare("
            INSERT INTO sale_items(sale_id, product_id, type, qty, rate, total) 
            VALUES (?,?,?,?,?,?)
        ")->execute([
            $issue_id, $product_id, $type, $qty, $rate, $total
        ]);

        // echo $_POST['type'][$i];  exit;

        // Decrease stock from product_price
        $pdo->prepare("
            UPDATE product_price 
            SET stock = stock - ?
            WHERE product_id = ? 
            AND weight = ?
        ")->execute([
            $qty, $product_id, $type
        ]);


       $del= $pdo->prepare("delete from sale_items where product_id = ? AND type = ''");
       $del->execute([$product_id]);

    }

   $_SESSION['success'] = "Dada added Successfully";

    header('location:../manage_sale.php');

    exit;
}


// delete record


if(isset($_POST['delete_id'])){


    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `sale` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Data deleted Successfully";
    exit;
} 




?>