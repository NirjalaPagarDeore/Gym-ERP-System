<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	$name = $_POST['name'];
	
	$phone = $_POST['phone'];
	$salary = $_POST['salary'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$description = $_POST['description'];


	

	
// IMAGE UPLOAD
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
    }

	$stmt = $pdo->prepare('INSERT INTO `trainers`(`name`,`photo`, `phone`, `email`, `address`,`description`,`salary`) VALUES (?,?,?,?,?,?,?)');

	$stmt->execute([$name,$photo,$phone,$email,$address,$description,$salary]);

 $_SESSION['success'] = "Trainer added Successfully";
	header('location:../manage_trainer.php');
	exit;
}


// Update code below

if(isset($_POST['update'])){
 // print_r($_POST);exit;
	 $id = $_POST['id'];

	$name = $_POST['name'];
	$salary = $_POST['salary'];
	$phone = $_POST['phone'];
	
	$email = $_POST['email'];
	$address = $_POST['address'];
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



    $stmt = $pdo->prepare("UPDATE `trainers` SET `name`= ?,`phone`= ?,`email`= ?,`address`= ?,`description`= ?,`photo`= ?,`salary`= ? WHERE id= ? ");
    $stmt->execute([$name,$phone,$email,$address,$description,$photo,$salary,$id]);

     $_SESSION['success'] = "Trainer Updated Successfully";
    header('location:../manage_trainer.php');

exit;
}


if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];
// print_r($id);exit;
    $stmt = $pdo->prepare("UPDATE `trainers` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Trainer deleted Successfully";
    exit;
   
}




if(isset($_POST['save'])){

	// print_r($_POST);exit;

	$id= $_POST['id'];
	$assign = $_POST['assign'];

	$assigned_ids = implode(',', $assign);

	$stmt = $pdo->prepare("UPDATE `trainers` SET `assign`= ? WHERE id = ? ");
	$stmt->execute([$assigned_ids,$id]);


	header('location:../manage_trainer.php');


}
?>