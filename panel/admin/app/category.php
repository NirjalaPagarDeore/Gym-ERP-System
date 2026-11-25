<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	
    $name          = $_POST['name'];


    $stmt = $pdo->prepare("
        INSERT INTO category (name)
        VALUES (?)
    ");

    $stmt->execute([$name]);

   

	 $_SESSION['success'] = "Category added Successfully";

	header('location:../manage_category.php');
	exit;
}


// Update code below

if (isset($_POST['update'])) {

    $id = $_POST['id'];

     $name  = $_POST['name'];


        $sql = "UPDATE category SET name=? WHERE id=?";
        $pdo->prepare($sql)->execute([$name, $id]);
   

    $_SESSION['success'] = "Category Updated Successfully";

	header('location:../manage_category.php');
}

// print_r($_POST);exit;
if(isset($_POST['delete_id'])){


    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `category` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Category deleted Successfully";
    exit;
}

?>