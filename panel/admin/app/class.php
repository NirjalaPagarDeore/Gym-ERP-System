<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	$name = $_POST['title'];
	$cate_id = $_POST['cate_id'];

	$from_time = $_POST['from_time'];
	$to_time = $_POST['to_time'];
	$trainer = $_POST['trainer'];
	

	$stmt = $pdo->prepare('INSERT INTO `class`(`title`,`cate_id`, `from_time`,`trainer`,`to_time`) VALUES (?,?,?,?,?)');

	$stmt->execute([$name,$cate_id,$from_time,$trainer,$to_time]);

 $_SESSION['success'] = "Class added Successfully";
	header('location:../manage_class.php');
	exit;
}


// Update code below

if(isset($_POST['update'])){
 // print_r($_POST);exit;
	 $id = $_POST['id'];

	$name = $_POST['title'];
	$cate_id = $_POST['cate_id'];
	$from_time = $_POST['from_time'];
	$to_time = $_POST['to_time'];
	$trainer = $_POST['trainer'];



    $stmt = $pdo->prepare("UPDATE `class` SET `title`= ?,`cate_id`= ?,`from_time`= ?,`to_time`= ?,`trainer`= ? WHERE id= ? ");
    $stmt->execute([$name,$cate_id,$from_time,$to_time,$trainer,$id]);

     $_SESSION['success'] = "Class Updated Successfully";
    header('location:../manage_class.php');

exit;
}


if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];
// print_r($id);exit;
    $stmt = $pdo->prepare("UPDATE `class` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Class deleted Successfully";
    exit;
   
}



?>