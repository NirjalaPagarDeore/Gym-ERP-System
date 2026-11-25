<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	
    $name          = $_POST['name'];
   
    $comment   = $_POST['comment'];
     $email   = $_POST['email'];

    // IMAGE UPLOAD
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
    }


    $stmt = $pdo->prepare("
        INSERT INTO feedback (name, photo, comment, email)
        VALUES (?, ?, ?,?)
    ");

    $stmt->execute([
       
        $name,
        $photo,
      
        $comment,
        $email
    ]);

   

	 $_SESSION['success'] = "blog added Successfully";

	header('location:../../../blog.php');
	exit;
}


// Update code below

if(isset($_POST['save'])){

    // print_r($_POST);exit;

    $id= $_POST['id'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE `feedback` SET `status`= ? WHERE id = ? ");
    $stmt->execute([$status,$id]);


    header('location:../manage_comment.php');


}

// print_r($_POST);exit;
if(isset($_POST['delete_id'])){


    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `feedback` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "feedback deleted Successfully";
    exit;
}

?>