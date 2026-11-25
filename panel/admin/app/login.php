<?php 

include '../../assets/constant/config.php';
session_start();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

// $hash = password_hash('admin', PASSWORD_BCRYPT);

// print_r($hash);exit;
    $stmt = $pdo->prepare("SELECT * FROM login WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user){
        // verify hashed password
         // print_r($user);exit;
        if(password_verify($password, $user['password'])){
           

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['photo'] = $user['photo'];

            	if($_SESSION['user_id']==1){

            	 $_SESSION['success'] = "Login Successfully";
            	  header("Location: ../dashboard.php");
            	}else{
            		$_SESSION['success'] = "Login Successfully";
            	  header("Location: ../manage_issue.php");

            	}
           
            exit;

        } else {
              $_SESSION['error'] = "Invalid email or password!";
        header("Location: ../../index.php");
        exit;
        }
    } else {
         $_SESSION['error'] = " email not found!";
        header("Location: ../../index.php");
    }
}




?>