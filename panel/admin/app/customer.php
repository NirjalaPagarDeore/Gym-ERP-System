<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	$name = $_POST['name'];
	$plan_id = $_POST['plan_id'];
	$phone = $_POST['phone'];
	$price = $_POST['price'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$payment_mode = $_POST['payment_mode'];
	$date = $_POST['date'];
	$exp_date = $_POST['exp_date'];

	
// IMAGE UPLOAD
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
    }

	$stmt = $pdo->prepare('INSERT INTO `members`(`name`,`plan_id`, `price`,`photo`, `phone`, `email`, `address`,`payment_mode`,`date`,`exp_date`) VALUES (?,?,?,?,?,?,?,?,?,?)');

	$stmt->execute([$name,$plan_id,$price,$photo,$phone,$email,$address,$payment_mode,$date,$exp_date]);

 $_SESSION['success'] = "Customer added Successfully";
	header('location:../manage_customer.php');
	exit;
}


// Update code below

if(isset($_POST['update'])){
 // print_r($_POST);exit;
	 $id = $_POST['id'];

	$name = $_POST['name'];
	$plan_id = $_POST['plan_id'];
	$phone = $_POST['phone'];
	$price = $_POST['price'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$payment_mode = $_POST['payment_mode'];
	$date = $_POST['date'];

		 $photo = $_POST['old_photo']; // default → keep old image

if (!empty($_FILES['photo']['name'])) {

    $allowed = ['jpg','jpeg','png','webp'];
    $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("Invalid image format");
    }

    $photo = time() . "_" . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
}



    $stmt = $pdo->prepare("UPDATE `members` SET `name`= ?,`plan_id`= ?,`phone`= ?,`email`= ?,`address`= ?,`price`= ?,`photo`= ?,`payment_mode`= ?,`date`= ? WHERE id= ? ");
    $stmt->execute([$name,$plan_id,$phone,$email,$address,$price, $photo,$payment_mode,$date,$id]);

     $_SESSION['success'] = "Customer Updated Successfully";
    header('location:../manage_customer.php');

exit;
}



// plan renew 


if(isset($_POST['plan_save'])){
 // print_r($_POST);exit;
	 $id = $_POST['id'];

	
	$plan_id = $_POST['plan_id'];
	
	$price = $_POST['price'];
	
	$date = $_POST['date'];
	$exp_date = $_POST['exp_date'];


    $stmt = $pdo->prepare("UPDATE `members` SET `plan_id`= ?,`price`= ?,`date`= ?,`exp_date`= ? WHERE id= ? ");
    $stmt->execute([$plan_id,$price,$date,$exp_date,$id]);

     $_SESSION['success'] = "Plan Renew Successfully";
    header('location:../manage_customer.php');

exit;
}


if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];
// print_r($id);exit;
    $stmt = $pdo->prepare("UPDATE `members` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Members deleted Successfully";
    exit;
   
}




if(isset($_POST['save'])){

	// print_r($_POST);exit;

	$id= $_POST['id'];
	$status = $_POST['status'];

	$stmt = $pdo->prepare("UPDATE `members` SET `status`= ? WHERE id = ? ");
	$stmt->execute([$status,$id]);


	header('location:../manage_customer.php');


}
?>