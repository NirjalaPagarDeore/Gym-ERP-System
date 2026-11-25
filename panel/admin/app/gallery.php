<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;


    // IMAGE UPLOAD
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
    }



    $stmt = $pdo->prepare("
        INSERT INTO gallery (photo)
        VALUES (?)
    ");

    $stmt->execute([$photo]);

   

	 $_SESSION['success'] = "gallery added Successfully";

	header('location:../manage_gallery.php');
	exit;
}


// Update code below

if (isset($_POST['update'])) {

    $id = $_POST['id'];

    

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




           

        $sql = "UPDATE gallery SET photo=? WHERE id=?";
        $pdo->prepare($sql)->execute([$photo,$id]);
   

    $_SESSION['success'] = "gallery Updated Successfully";

	header('location:../manage_gallery.php');
}

// print_r($_POST);exit;
if(isset($_POST['delete_id'])){


    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `gallery` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "gallery deleted Successfully";
    exit;
}

?>