<?php 

include '../../assets/constant/config.php';
session_start();


if(isset($_POST['submit'])){
// print_r($_POST);exit;

	
    $name          = $_POST['name'];
   
    $description   = $_POST['description'];
     $blog_date   = $_POST['blog_date'];

    // IMAGE UPLOAD
    $photo = "";
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . "_" . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "../../assets/img/" . $photo);
    }


    $stmt = $pdo->prepare("
        INSERT INTO blog (name, photo, description, blog_date)
        VALUES (?, ?, ?,?)
    ");

    $stmt->execute([
       
        $name,
        $photo,
      
        $description,
        $blog_date
    ]);

   

	 $_SESSION['success'] = "blog added Successfully";

	header('location:../manage_blog.php');
	exit;
}


// Update code below

if (isset($_POST['update'])) {

    $id = $_POST['id'];

     $name          = $_POST['name'];
   
    $description   = $_POST['description'];
     $blog_date   = $_POST['blog_date'];
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




            

        $sql = "UPDATE blog SET name=?, description=?, photo=?, blog_date=? WHERE id=?";
        $pdo->prepare($sql)->execute([$name, $description, $photo, $blog_date, $id]);
   

    $_SESSION['success'] = "blog Updated Successfully";

	header('location:../manage_blog.php');
}

// print_r($_POST);exit;
if(isset($_POST['delete_id'])){


    $id = $_POST['delete_id'];

    $stmt = $pdo->prepare("UPDATE `blog` SET `delete_status`='1' WHERE id= ? ");
    $stmt->execute([$id]);

   $_SESSION['error'] = "blog deleted Successfully";
    exit;
}

?>