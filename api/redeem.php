<?php
require_once "../config/conn.php";
session_start();

if (!isset($_SESSION['User'])) {
    $user_id = "Guest";
} else {
    $sql = "SELECT * FROM users WHERE email = '$_SESSION[User]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    $currentPoints = $row['total_points'] - $row['redeemed_points'];


    if ($currentPoints < 80) {
        echo "Not enough points";
    } else {

        $sql = "INSERT INTO `points`(`user_id`, `points`,  `totalBottles`, `created_at`) VALUES ('$row[user_id]','$currentPoints', '$row[bottleBeforeRedeem]',now())";
        if ($conn->query($sql)) {
            $sql = "UPDATE users SET redeemed_points = redeemed_points + '$currentPoints' , bottleBeforeRedeem = 0 WHERE email = '$_SESSION[User]'";
            $conn->query($sql);
            echo "success";
        } else {
            echo "Points not redeemed";
        }
    }
}
