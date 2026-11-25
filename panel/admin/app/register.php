<?php 

include '../../assets/constant/config.php';



if(isset($_POST['register'])){
// print_r($_POST);exit;

	$name = $_POST['name'];
	$email= $_POST['email'];
	$password= $_POST['password'];

$hash = password_hash($password, PASSWORD_BCRYPT);

// print_r($hash); exit;

	$stmt = $pdo->prepare('INSERT INTO `login`(`name`, `email`,`password`) VALUES (?,?,?)');

	$stmt->execute([$name, $email, $hash]);

	header('location:../../index.php');
	exit;
}




?>