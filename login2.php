<?php
    include("connect.php");
    session_start();
    $password=$_POST["password"];

    $password1_hash=password_hash($password1,PASSWORD_DEFAULT);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password1 = $_POST['password'];
        $useremail = $_SESSION['useremail']; // 假設您使用了用戶名來查找用戶
    
        $sql = "SELECT * FROM users WHERE email = '$useremail'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        if ($result && mysqli_num_rows($result) == 1) {
            echo '<br>'.$password1;
            echo '<br>'.$row['password'];
            // 檢查密碼是否匹配
            if ($password1 == $row['password']) {
                $_SESSION['loggedin'] = true;
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];

                header("Location: index.php");
                exit;
            } else {
                function_alert('帳號密碼錯誤');
            }
        } else {
            function_alert('找不到用戶');
        }
    }
    /*if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql= "SELECT * FROM users WHERE password = $password1";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1 && $password1 == mysqli_fetch_assoc($result)["password"]){
            session_start();
            $_SESSION["loggedin"] = true;
            //$_SESSION["useremail"] = mysqli_fetch_assoc($result)["useremail"];
            $_SESSION["password"] = mysqli_fetch_assoc($result)["password"];
            $_SESSION["firstname"] = mysqli_fetch_assoc($result)["firstname"];
            $_SESSION["lastname"] = mysqli_fetch_assoc($result)["lastname"];
            echo '<script>window.location.href="index.php";</script>';
        }
        else{
            function_alert('帳號密碼錯誤');
        }
    }
    else{
        function_alert('網頁發生錯誤');
        echo '<script>window.location.href="login2.php";</script>';
    }*/

    /*function function_alert($message) { 
      
        // Display the alert box  
        echo "<script>alert('$message');
         window.location.href='index.php';
        </script>"; 
        return false;
    } */
?>