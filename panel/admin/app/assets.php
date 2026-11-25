<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	$name = $_POST['name'];
	$cate_id = $_POST['cate_id'];

	$price = $_POST['price'];
	$vendor_name = $_POST['vendor_name'];
	$vendor_phone = $_POST['vendor_phone'];

	$description = $_POST['description'];



	
// IMAGE UPLOAD
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
    }

	$stmt = $pdo->prepare('INSERT INTO `assets`(`name`,`cate_id`, `price`,`photo`, `description`,`vendor_name`,`vendor_phone`) VALUES (?,?,?,?,?,?,?)');

	$stmt->execute([$name,$cate_id,$price,$photo,$description,$vendor_name,$vendor_phone]);

 $_SESSION['success'] = "Assets added Successfully";
	header('location:../manage_assets.php');
	exit;
}


// Update code below

if(isset($_POST['update'])){
 // print_r($_POST);exit;
	 $id = $_POST['id'];

	$name = $_POST['name'];
	$cate_id = $_POST['cate_id'];
	$vendor_name = $_POST['vendor_name'];
	$vendor_phone = $_POST['vendor_phone'];
	$price = $_POST['price'];
	
	$description = $_POST['description'];


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



    $stmt = $pdo->prepare("UPDATE `assets` SET `name`= ?,`cate_id`= ?,`vendor_name`= ?,`vendor_phone`= ?,`description`= ?,`price`= ?,`photo`= ? WHERE id= ? ");
    $stmt->execute([$name,$cate_id,$vendor_name,$vendor_phone,$description,$price, $photo,$id]);

     $_SESSION['success'] = "Assets Updated Successfully";
    header('location:../manage_assets.php');

exit;
}


if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];
// print_r($id);exit;
    $stmt = $pdo->prepare("UPDATE `assets` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Assets deleted Successfully";
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