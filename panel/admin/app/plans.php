<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	$name = $_POST['name'];
	$plan_type = $_POST['plan_type'];
	$duration = $_POST['duration'];
	$price = $_POST['price'];
	$status = $_POST['status'];
	


	$stmt = $pdo->prepare('INSERT INTO `plans`(`name`,`plan_type`, `duration`, `price`, `status`) VALUES (?,?,?,?,?)');

	$stmt->execute([$name,$plan_type,$duration,$price,$status]);

 $_SESSION['success'] = "Plan added Successfully";
	header('location:../manage_plans.php');
	exit;
}


// Update code below

if(isset($_POST['update'])){

	 $id = $_POST['id'];
	 $name = $_POST['name'];
		$plan_type = $_POST['plan_type'];
	$duration = $_POST['duration'];
	$price = $_POST['price'];
	$status = $_POST['status'];


    $stmt = $pdo->prepare("UPDATE `plans` SET `name`= ?,`plan_type`= ?,`duration`= ?,`price`= ?,`status`= ? WHERE id= ? ");
    $stmt->execute([$name,$plan_type,$duration,$price,$status,$id]);

    header('location:../manage_plans.php');

exit;
}


if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `plans` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   
    exit;
}

?>