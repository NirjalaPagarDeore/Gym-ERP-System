<?php 

include '../../assets/constant/config.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submit'])){
// print_r($_POST);exit;

	$name = $_POST['name'];
	$email = $_POST['email'];
	// $phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	


	$stmt = $pdo->prepare('INSERT INTO `contactus`(`name`,`email`,`subject`,`message`) VALUES (?,?,?,?)');

	$stmt->execute([$name,$email,$subject,$message]);



// email sending table fetch
	$st_email = $pdo->prepare('SELECT * FROM `emailsending` ');

	$st_email->execute();

	$emails = $st_email->fetch();

	$host = $emails['host'];

	$username = $emails['username'];

	$password = $emails['password'];
	$port = $emails['port'];

	$mail = new PHPMailer(true);
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = $host ;   // or smtp-relay.brevo.com
    $mail->SMTPAuth   = true;
    $mail->Username   = $username;   // SMTP email
    $mail->Password   = $password ;     // App password / SMTP key
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $port ;

    // Email details
    $mail->setFrom($username, 'Contact us');
    $mail->addAddress('sopoxim863@alibto.com');

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
   $mail->Body = "
    <h3>New Message</h3>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Message:</strong> {$message}</p>
";

    $mail->send();
    // echo "Email sent successfully!";




 // $_SESSION['success'] = "Category added Successfully";
	header('location:../../../index.php');
	exit;
}


// Update code below






?>