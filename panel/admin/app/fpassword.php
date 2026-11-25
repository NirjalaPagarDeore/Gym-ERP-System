<?php 

include '../../assets/constant/config.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';


if(isset($_POST['send'])){


function generateRandomNumber($min, $max) {
    return random_int($min, $max);
}

$newpass = generateRandomNumber(1000, 9999);

// print_r($_POST);exit;

	
	$email= $_POST['email'];
	

$hash = password_hash($newpass, PASSWORD_BCRYPT);

// print_r($hash); exit;

	$stmt = $pdo->prepare('UPDATE `login` SET password = ? WHERE email = ? ');

	$stmt->execute([$hash, $email]);


// $mail = new PHPMailer(true);


//        $mail->isSMTP();
//     $mail->Host       = 'smtp.gmail.com';
//     $mail->SMTPAuth   = true;
//     $mail->Username   = '';   // your Gmail
//     $mail->Password   = '';    // App Password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//     $mail->Port       = 587;

//     // Sender
//     $mail->setFrom('', 'Your App Name');

//     // Receiver
//     $mail->addAddress('');

//     $mail->isHTML(true);
//     $mail->Subject = 'Your OTP';
//     $mail->Body    = 'Your OTP is '.$newpass;

//     $mail->send();


	header('location:../../index.php');
	exit;
}




?>