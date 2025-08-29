<?php
require("../config/conn.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["User"];

    // Get user details
    $sq = "SELECT * FROM users WHERE email = '$user_id'";
    $result = $conn->query($sq);
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];
    $streak_count = $row['streak_count'];
    $last_scanned_date = $row['last_scanned_date'];


    $barcode = $_POST["barcode"];

    // Check if product already scanned by the user
    $sql = "SELECT bottle_code FROM scans WHERE bottle_code = '$barcode' AND user_id = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo json_encode(array("error" => "Product already scanned"));
    } else {

        $name = $_POST["name"];
        $points = $_POST["points"];
        $quantity = $_POST["quantity"];
        $co2Saved = $_POST["co2Saved"];

        // Insert new scan
        $sql = "INSERT INTO `scans`(`user_id`, `bottle_code`, `bottle_name`, `points_earned`, `quantity`, `scanned_at`, `status`) 
                VALUES ('$user_id','$barcode','$name',$points,$quantity,NOW(),'Complete')";
        if ($conn->query($sql)) {

            // --- STREAK LOGIC ---
            $today = date("Y-m-d");
            if ($last_scanned_date == $today) {
                // Already scanned today → streak remains same
                $new_streak = $streak_count;
            } else {
                $yesterday = date('Y-m-d', strtotime("-1 day"));
                if ($last_scanned_date == $yesterday) {
                    // Continue streak
                    $new_streak = $streak_count + 1;
                } else {
                    // Missed a day → reset streak
                    $new_streak = 1;
                }
            }



            // Update user stats
            $sql = "UPDATE `users` 
                    SET `total_points` = `total_points` + $points, 
                        `carbonFree` = `carbonFree` + $co2Saved,
                        `streak_count` = $new_streak,
                        `last_scanned_date` = '$today',
                        `bottleBeforeRedeem` = `bottleBeforeRedeem` + 1
                    WHERE `user_id` = $user_id";
            $conn->query($sql);

            echo "Product scanned successfully";
        } else {
            echo json_encode(array("error" => "Product not scanned"));
        }
    }
}
