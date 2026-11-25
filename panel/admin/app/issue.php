<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	$book_id = $_POST['book_id'];
	$student_id = $_POST['student_id'];
	$issue_date = $_POST['issue_date'];
	$days = $_POST['days'];
	$return_date= $_POST['return_date'];
	$status= $_POST['status'];
	$quantity= $_POST['quantity'];
	
$mysql_return_date = date("Y-m-d", strtotime($return_date));


	$stmt = $pdo->prepare('INSERT INTO `issue`( `book_id`, `student_id`, `issue_date`, `days`, `return_date`,`status`,`quantity`) VALUES (?,?,?,?,?,?,?)');

	$stmt->execute([$book_id, $student_id, $issue_date,$days, $mysql_return_date,$status,$quantity]);

	$book = $pdo->prepare('SELECT * FROM books WHERE id = ?');

	$book->execute([$book_id]);
	$book_fetch = $book->fetch();

	$old_quantity = $book_fetch['quantity'];

$new_qty = $old_quantity - $quantity ;
// print_r($new_qty);exit;
$book_update = $pdo->prepare('UPDATE `books` SET quantity = ? where id = ?');
$book_update->execute([$new_qty,$book_id]);


	 $_SESSION['success'] = "Issue Books added Successfully";

	header('location:../manage_issue.php');
	exit;
}


// Update code below

if(isset($_POST['update'])){
// print_r($_POST);exit;
	 $id = $_POST['id'];
	$book_id = $_POST['book_id'];
	$student_id = $_POST['student_id'];
	$issue_date = $_POST['issue_date'];
	$days = $_POST['days'];
	$return_date= $_POST['return_date'];
	$status= $_POST['status'];
	$quantity= $_POST['quantity'];
		$mysql_return_date = date("Y-m-d", strtotime($return_date));
    $stmt = $pdo->prepare("UPDATE `issue` SET  `book_id`=? ,  `student_id`=? ,  `issue_date`=? , `days`=? , `return_date` = ?, `status` = ?,`quantity` = ? WHERE id= ? ");
    $stmt->execute([$book_id,$student_id,$issue_date,$days,$mysql_return_date,$status,$quantity,$id]);





    $_SESSION['success'] = "Issue Books Updated Successfully";
    header('location:../manage_issue.php');

exit;
}

// status change

if(isset($_POST['change'])){
// print_r($_POST);exit;
	 $id = $_POST['id'];
	$return_date = $_POST['return_date'];
	
	$status= $_POST['status'];
	
    $stmt = $pdo->prepare("UPDATE `issue` SET `return_date` = ?, `status` = ? WHERE id = ? ");
    $stmt->execute([$return_date,$status,$id]);





    $_SESSION['success'] = "Issue Books Updated Successfully";
    header('location:../manage_issue.php');

exit;
}


if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `issue` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Issue Books deleted Successfully";
    exit;
}

?>