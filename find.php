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

//$userExists = checkIfUserExists($_SESSION['useremail']); // 假設有一個函式可以檢查使用者是否已註冊


$sql="SELECT password from users where email = '".$_SESSION['useremail']."'";
$result = mysqli_query($conn,$sql);
$uspassword = mysqli_fetch_assoc($result);
$mail->isHTML(true);
$mail->Subject = 'Verification Email';
$mail->Body = '您的密碼為"'.$uspassword['password'].'"';
    
if ($mail->send()) {    
    echo '郵件發送成功。'; 
    header("refresh:3; url=logincheck.php");    
} 
else {
    echo '無法發送郵件。錯誤：' . $mail->ErrorInfo;     
}




?>