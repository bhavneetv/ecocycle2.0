
<?php

require("../config/conn.php");

if ($conn->connect_error) {


    echo " Lost";
} else {

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    

    $role = $_POST['userType'];
    $pass = md5($_POST['password']);
   

    $check_u = "SELECT email FROM users WHERE email = '$email'";
    $response = $conn->query($check_u);
    if ($response->num_rows > 0) {
        
        echo '<script>alert("User Already Exist")</script>';
        header("Location:login.php");
        exit();
    } else {
        $value_add = "INSERT INTO users(full_name, email, password, role , address)
            VALUE(
            '$name',
            '$email',
            '$pass',
            '$role',
            '$address'
            )";

        if ($conn->query($value_add)) {
            echo '<script>alert("Account created successfully")</script>';

            setcookie("user",  $email, time() + 60 * 60 * 24, "/");
           
            setcookie("login_time", time(), time() + (86400 * 30), "/"); // 30 days
            header("Location:../login.php");
            exit();
        }

    }
}




?>
