<?php 

include '../../assets/constant/config.php';



if(isset($_POST['update'])){
// print_r($_FILES['photo']);exit;

// Check uploaded file
if (!empty($_FILES['photo']['name'])) {

    $photo_name = time() . '_' . $_FILES['photo']['name'];
    $photo_tmp  = $_FILES['photo']['tmp_name'];
    $uploadPath = '../../assets/img/avatars/' . $photo_name;

    move_uploaded_file($photo_tmp, $uploadPath);

} else {
    // keep old photo if not uploaded
    $photo_name = $_POST['old_photo'];
}

	$name = $_POST['name'];
	$id = $_POST['id'];
	$email= $_POST['email'];
	// $password= $_POST['password'];
	$photo= $_POST['photo'];

$hash = password_hash($password, PASSWORD_BCRYPT);

// print_r($hash); exit;

	$stmt = $pdo->prepare(
    'UPDATE login 
     SET name = ?, email = ?, photo = ?
     WHERE id = ?'
);

$stmt->execute([$name, $email, $photo_name, $id]);

	$_SESSION['success'] = 'Profile Updated Successfully';

	header('location:../dashboard.php');
	exit;
}




?>