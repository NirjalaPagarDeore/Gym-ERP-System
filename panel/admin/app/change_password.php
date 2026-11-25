<?php
session_start();
include '../../assets/constant/config.php';

if (isset($_POST['submit'])) {

    $old_pw     = $_POST['old_pw'];
    $new_pw     = $_POST['new_pw'];
    $confirm_pw = $_POST['confirm_pw'];
    $user_id    = $_SESSION['user_id']; // logged-in user id

    // 1️⃣ Check new & confirm password
    if ($new_pw !== $confirm_pw) {
        die('New password and confirm password do not match');
    }

    // 2️⃣ Fetch old password from DB
    $stmt = $pdo->prepare("SELECT password FROM login WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die('User not found');
    }

    // 3️⃣ Verify old password
    if (!password_verify($old_pw, $user['password'])) {
        die('Old password is incorrect');
    }

    // 4️⃣ Hash new password
    $new_hash = password_hash($new_pw, PASSWORD_BCRYPT);

    // 5️⃣ Update password
    $update = $pdo->prepare("UPDATE login SET password = ? WHERE id = ?");
    $update->execute([$new_hash, $user_id]);

     $_SESSION['success'] = "Password Change Successfully";

    header('location:../dashboard.php');
}
