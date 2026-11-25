<?php
include '../assets/constant/config.php';

$data = json_decode(file_get_contents("php://input"), true);
$member_id = $data['member_id'];
$action = $data['action'];

$date = date('Y-m-d');
$now  = date('Y-m-d H:i:s');

if($action == "login"){

    $stmt = $pdo->prepare("
        INSERT INTO member_sessions (member_id, login_time, session_date)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE login_time = VALUES(login_time)
    ");
    $stmt->execute([$member_id, $now, $date]);

    echo json_encode([
        "login_time" => date("h:i A", strtotime($now))
    ]);
}

/* LOGOUT */
if($action == "logout"){

    // get login time
    $stmt = $pdo->prepare("
        SELECT login_time FROM member_sessions
        WHERE member_id=? AND session_date=?
    ");
    $stmt->execute([$member_id, $date]);
    $row = $stmt->fetch();

    // $logout = date("Y-m-d H:i:s", strtotime($row['login_time']." +90 minutes"));
    $logout = date("Y-m-d H:i:s");

    $stmt = $pdo->prepare("
        UPDATE member_sessions
        SET logout_time=?
        WHERE member_id=? AND session_date=?
    ");
    $stmt->execute([$logout, $member_id, $date]);

    echo json_encode([
        "logout_time" => date("h:i A", strtotime($logout))
    ]);
}
