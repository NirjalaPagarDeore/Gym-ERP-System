<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	 $cate_id       = $_POST['cate_id'];
    $name          = $_POST['name'];
    $short_content = $_POST['short_content'];
    $description   = $_POST['description'];

    // IMAGE UPLOAD
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
    }


    //  $icon = "";
    // if (!empty($_FILES['icon']['name'])) {
    //     $icon = time() . "_" . $_FILES['icon']['name'];
    //     move_uploaded_file($_FILES['icon']['tmp_name'], "../../assets/img/" . $icon);
    // }

    $stmt = $pdo->prepare("
        INSERT INTO service (name, photo, short_content, description)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->execute([
        $icon,
        $name,
        $photo,
        $short_content,
        $description
    ]);

   

	 $_SESSION['success'] = "service added Successfully";

	header('location:../manage_service.php');
	exit;
}


// Update code below

if (isset($_POST['update'])) {

    $id = $_POST['id'];

     $name          = $_POST['name'];
    $short_content = $_POST['short_content'];
    $description   = $_POST['description'];

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




            // icon upload


            // $icon = $_POST['old_icon']; // default → keep old image

            // if (!empty($_FILES['icon']['name'])) {

            //     $allowed = ['jpg','jpeg','png','webp'];
            //     $ext = strtolower(pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION));

            //     if (!in_array($ext, $allowed)) {
            //         die("Invalid image format");
            //     }

            //     $icon = time() . "_" . $_FILES['icon']['name'];
            //     move_uploaded_file($_FILES['icon']['tmp_name'], "../../assets/img/" . $icon);
            // }


        $sql = "UPDATE service SET name=?, short_content=?, description=?, photo=? WHERE id=?";
        $pdo->prepare($sql)->execute([$name, $short_content, $description, $photo, $id]);
   

    $_SESSION['success'] = "service Updated Successfully";

	header('location:../manage_service.php');
}

// print_r($_POST);exit;
if(isset($_POST['delete_id'])){


    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `service` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "service deleted Successfully";
    exit;
}

?>