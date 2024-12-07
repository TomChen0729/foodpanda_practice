<?php
include("connect.php");
session_start();
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'lu24309044@gmail.com';
$mail->Password = 'hgvwmsvenrnvobdr';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('lu24309044@gmail.com', 'lu24309044');
$mail->addAddress($_SESSION['useremail'],'');
$mail->addReplyTo('lu24309044@gmail.com', 'lu24309044');

$userExists = checkIfUserExists($_SESSION['useremail']); // 假設有一個函式可以檢查使用者是否已註冊

if($userExists) {//註冊過，執行登入動作(用SQL抓出帳號密碼並自動填入登入訊息)
    /*echo "<script>
    window.location.href='logincheck.php';
   </script>";*/
    $mail->isHTML(true);
    $mail->Subject = 'Verification Email';
    $mail->Body = '
        <html lang="zh-Hant">
        <head>
        <meta charset="UTF-8">
        <style>
        .button1c{
            transform: scale(1);
            font-size: 15px;
            border-radius: 8px;
            width: 336px;
            height: 48px;
            background-color: #e21b70; 
            color: pink; 
            border: 1px solid #e21b70;
          }
          .button1c:hover{
            background-color: #BF0060;
          }
        </style>
        </head>
        <a href="http://localhost:80/TomChen/logintest.php">
        <button class="button1c" style="margin-bottom: 20px"><font color=white><strong>驗證email</strong></font></button>
        </a>';
    
        if ($mail->send()) {
            echo '郵件發送成功。';
        } else {
            echo '無法發送郵件。錯誤：' . $mail->ErrorInfo;
        }
} 
else {//未註冊，導向註冊畫面register.php
    $mail->isHTML(true);
    $mail->Subject = 'Verification Email';
    $mail->Body = '
        <head>

        <style>
        .button1c{
            transform: scale(1);
            font-size: 15px;
            border-radius: 8px;
            width: 336px;
            height: 48px;
            background-color: #e21b70; 
            color: pink; 
            border: 1px solid #e21b70;
          }
          .button1c:hover{
            background-color: #BF0060;
          }
          body{
            background-image:url("./images/verifymail1.png");
            background-size: cover; /* 調整背景圖片大小以填滿整個區域 */
            background-repeat: no-repeat; /* 避免背景圖片重複 */
            background-position: center center; /* 將背景圖片置中 */
        }
        </style>
        </head>
        <body>
        <a href="http://localhost:80/TomChen/register.php"><button class="button1c" style="margin-bottom: 20px"><font color=white><strong>驗證email</strong></font></button></a>
        </body>';
        if ($mail->send()) {
            echo '郵件發送成功。';
        } else {
            echo '無法發送郵件。錯誤：' . $mail->ErrorInfo;
        }
}

function checkIfUserExists($email) { //檢查是否註冊過
    include("connect.php");

    // 防止 SQL 注入
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $_SESSION['useremail']);

    // 執行查詢
    $stmt->execute();
    $result = $stmt->get_result();

    // 如果有符合的紀錄，使用者已存在
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }

}


/*$mail->isHTML(true);
$mail->Subject = 'test';
$mail->Body = '這是使用 Gmail 和 PHPMailer 從 PHP 發送的測試郵件。';
$mail->Body = '
<head>
<style>
.button1c{
    transform: scale(1);
    font-size: 15px;
    border-radius: 8px;
    width: 336px;
    height: 48px;
    background-color: #e21b70; 
    color: pink; 
    border: 1px solid #e21b70;
  }
  .button1c:hover{
    background-color: #BF0060;
  }
</style>
</head>
<a href="#"><button class="button1c" style="margin-bottom: 20px"><font color=white><strong>驗證email</strong></font></button></a>';

if ($mail->send()) {
    echo '郵件發送成功。';
} else {
    echo '無法發送郵件。錯誤：' . $mail->ErrorInfo;
}*/
?>