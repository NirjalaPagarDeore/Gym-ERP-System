<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	
    $name          = $_POST['name'];
    $role = $_POST['role'];
    $feedback   = $_POST['feedback'];

    // IMAGE UPLOAD
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
    }

    $stmt = $pdo->prepare("
        INSERT INTO testimonial (name, photo, role, feedback)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->execute([
     
        $name,
        $photo,
        $role,
        $feedback
    ]);

   

	 $_SESSION['success'] = "Testimonial added Successfully";

	header('location:../manage_testimonial.php');
	exit;
}


// Update code below

if (isset($_POST['update'])) {

    $id = $_POST['id'];

     $name          = $_POST['name'];
    $role = $_POST['role'];
    $feedback   = $_POST['feedback'];

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


        $sql = "UPDATE testimonial SET name=?, role=?, feedback=?, photo=? WHERE id=?";
        $pdo->prepare($sql)->execute([$name, $role, $feedback, $photo, $id]);
   

    $_SESSION['success'] = "Testimonial Updated Successfully";

	header('location:../manage_testimonial.php');
}

// print_r($_POST);exit;
if(isset($_POST['delete_id'])){


    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `testimonial` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "Testimonial deleted Successfully";
    exit;
}

?>