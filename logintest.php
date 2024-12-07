<?php
    include("connect.php");
    session_start();
    $useremail=$_SESSION['useremail'];

    $password1_hash=password_hash($password1,PASSWORD_DEFAULT);
    
        $sql = "SELECT * FROM users WHERE email = '$useremail'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
            // 檢查密碼是否匹配
                $_SESSION['loggedin'] = true;
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                header("Location: index.php");
                exit;
?>