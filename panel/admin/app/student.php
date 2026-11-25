<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$course= $_POST['course'];
	$password= $_POST['password'];
	
	$hash = password_hash($password, PASSWORD_BCRYPT);


	


	$stmt = $pdo->prepare('INSERT INTO `login`(`name`, `email`, `phone`, `address`, `course`, `password`) VALUES (?,?,?,?,?,?)');

	$stmt->execute([$name,$email,$phone, $address,$course,$hash]);



	// $stmt1 = $pdo->prepare('INSERT INTO `login`(`name`, `email`,`password`) VALUES (?,?,?)');

	// $stmt1->execute([$name,$email,$hash]);

	 $_SESSION['success'] = "Student added Successfully";

	header('location:../manage_student.php');
	exit;
}


// Update code below

if(isset($_POST['update'])){

	 $id = $_POST['id'];
		$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$course= $_POST['course'];
	$password= $_POST['password'];
	
	$hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("UPDATE `login` SET  `name`=? , `email` = ?, `phone` = ?, `address`= ?,`course`= ?,`password`= ?  WHERE id= ? ");

    $stmt->execute([$name,$email,$phone,$address,$course,$hash,$id]);

    $_SESSION['success'] = "Student Updated Successfully";
    header('location:../manage_student.php');

exit;
}


if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `students` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Student deleted Successfully";
    exit;
}

?>