<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <title>註冊</title>
    <style>
      body{
        margin: 0px;
        padding: 0px;
      }
      /*標頭*/
      header{
        height:66px;
        float:center;
        background-color: white;
      }
      .headlogo{
        float:left;
        margin-top: 18px;
        margin-bottom: 18px;
      }
      .changelang{
        float:right;
        margin-top: 20px;
        margin-right: 40px;
      }
      .headhref:link{
        color:black;
        text-decoration:none;
        font-size: 17px;
      }
      .howtojoin{
        background-color:white;
        padding: 60px;
      }
      .stepimg{
        width:150px;
      }
      .joinform{
        border: 1px black solid;
        margin:50px;
        background-color:white;
        padding:20px;
        width:500px;
      }
      .titlelabel{
        width:400px;
        margin: 20px;
        margin-left:200px;
        margin-top:300px;
      }
      .image-container { /*圖片縮放*/
        display: inline-block;
        position: relative;
        overflow: hidden;
        border-radius:20px;
        width: 300px;
        height: 250px;
        margin-right:20px;
        margin-bottom:20px;
      }

      .image-container img {
        transition: transform 0.2s ease;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .image-container .image:hover{
        transform: scale(1.1);
      }
      
      .image-text{
        border:none;
        width:80px;
        height: 40px;
        background-color:white;
        position:absolute;
        left:10px;
        bottom:10px;
        border-radius:10px;
        text-align:center;
        line-height:40px;
        z-index: 7;
        cursor: pointer;
      }

      .iconhref{ /*小圖示*/
        display: inline-block;
        padding: 10px;
        background-color: #f2c1d7;
        border-radius: 50%; /* 設定圓形背景 */
        font-size: 16px;
        transition: background-size 0.3s ease; /* 添加背景大小的過渡效果 */
        background-size: 100% 100%; /* 設定背景大小為與文字相同 */
        background-repeat: no-repeat;
        background-position: center;
      }
      .iconhref:hover{
        background-color: rgba(242, 193, 215, 0.5);
        background-size: 150% 150%; /* 將背景放大1.5倍 */
      }
      .iconhref:link{
        color:black;
        text-decoration:none;
      }
      .contain-center{
        text-align: center;
      }
      .contents{
        display: flex;
      }
      
      #navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff; /* 這裡可以根據你的需要設置背景色 */
        z-index: 9999; /* 確保導覽列在其他元素的上面 */
        
      }
      
      /* 使用 Unicode 字符 U+2713 代表深紅色的打勾符號 */
      .custom-list {
        list-style-type: none; /* 取消預設的項目符號 */
        padding-left: 0px; /* 確保有適當的間距給項目符號 */
      }

      .custom-list li::before {
        content: '\2713'; /* 設置項目符號為深紅色的打勾符號 */
        color: #FF1493; /* 設置深紅色的顏色 */
        margin-right: 10px; /* 調整項目符號與文字之間的間距 */
      }

      .custom-list1 {
        list-style-type: none; /* 取消預設的項目符號 */
        padding-left: 0px; /* 確保有適當的間距給項目符號 */
        counter-reset: my-counter; /* 設置計數器初始值為 0 */
      }

      .custom-list1 li {
        counter-increment: my-counter; /* 每一個 <li> 增加計數器的值 */
      }

      .custom-list1 li::before {
        content: counter(my-counter) ". "; /* 使用計數器的值和 "." 作為項目符號 */
        color: #000; /* 設置黑色的顏色 */
        margin-right: 10px; /* 調整項目符號與文字之間的間距 */
      }

      .drop{ /*區塊五下拉選單樣式  弄到一半*/
        margin-left: 18px;
      }
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
        /*transform: scale(1.05);*/
        background-color: #BF0060;
      }
      .button1c1 {
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 336px;
        height: 48px;
        color: pink; 
        border: 1px solid lightgray;
        background-color: lightgray;
        cursor: not-allowed;
      }

      .button1c1.enabled {
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 336px;
        height: 48px;
        background-color: #e21b70; 
        color: pink; 
        border: 1px solid #e21b70;
      }
      .button1c1.enabled:hover{
        background-color: #BF0060;
      }
      .button1d{
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 336px;
        height: 48px;
        background-color: #000; 
        color: pink; 
        border: 1px solid #000;
      }
      .button1d:hover{
        /*transform: scale(1.05);*/
        background-color: #000;
      }
      .button1e{
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 336px;
        height: 48px;
        background-color: white; 
        color: pink; 
        border: 1px solid 	#E0E0E0;
      }
      .button1e:hover{
        /*transform: scale(1.05);*/
        background-color: #ECF5FF;
      }
      .button1f{
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 336px;
        height: 48px;
        background-color: 	#0080FF; 
        color: pink; 
        border: 1px solid 	#0080FF;
      }
      .button1f:hover{
        /*transform: scale(1.05);*/
        background-color: #2894FF;
      }
      .button2{
        align-items: center;
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 336px;
        height: 48px;
        background-color: white;
        border: 1px solid #FF0080;
        margin-right:10px;
      }
      .button2:hover{
        background-color: #FFECEC;
        border: #FFF;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      a{
        text-decoration:none;
      }
      .button3{
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        max-width: auto;
        height :40px;
        background-color: white; 
        color: pink; 
        border: 0px;
        margin-right:10px;
      }
      .button3:hover{
        /*transform: scale(1.1);*/
        background-color: #FFECEC;
      }
      .button4{
        transform: scale(1);
        font-size: 15px;
        border-radius: 50%;
        width: 45px;
        height :45px;
        background-color: white; 
        color: pink;
        border: 0px;
        padding:0px;
      }
      .button4:hover{
        transform: scale(1.1);
        background-color: #FFECEC;
      }
      .iconhref{ /*小圖示*/
        display: inline-block;
        padding: 10px;
        background-color: #f2c1d7;
        border-radius: 50%; /* 設定圓形背景 */
        font-size: 16px;
        transition: background-size 0.3s ease; /* 添加背景大小的過渡效果 */
        background-size: 100% 100%; /* 設定背景大小為與文字相同 */
        background-repeat: no-repeat;
        background-position: center;
      }
      .iconhref:hover{
        background-color: rgba(242, 193, 215, 0.5);
        background-size: 150% 150%; /* 將背景放大1.5倍 */
      }
      .iconhref:link{
        color:black;
        text-decoration:none;
      }
      #navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff; /* 這裡可以根據你的需要設置背景色 */
        z-index: 9999; /* 確保導覽列在其他元素的上面 */
        
      }

      /*內容*/

      .image-container { /*圖片縮放*/
        display: inline-block;
        position: relative;
        overflow: hidden;
        border-radius:20px;
        width: 300px;
        height: 250px;
        margin-right:20px;
        margin-bottom:20px;
      }

      .image-container img {
        transition: transform 0.2s ease;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .image-container .image:hover{
        transform: scale(1.1);
      }
      
      .image-text{
        border:none;
        width:80px;
        height: 40px;
        background-color:white;
        position:absolute;
        left:10px;
        bottom:10px;
        border-radius:10px;
        text-align:center;
        line-height:40px;
        z-index: 7;
        cursor: pointer;
      }
      .contents2{
        display:flex;
        background-color:#FF0080;
        border-radius:20px;
        padding:20px;
        height:350px;
      }
      .dlmain{
        color:white;
        margin:20px;
        width:650px;
      }
      .contain-center{
        text-align: center;
      }
      .contents{
        display: flex;
      }
      /* 使用 Unicode 字符 U+2713 代表深紅色的打勾符號 */
      .custom-list {
        list-style-type: none; /* 取消預設的項目符號 */
        padding-left: 0px; /* 確保有適當的間距給項目符號 */
      }

      .custom-list li::before {
        content: '\2713'; /* 設置項目符號為深紅色的打勾符號 */
        color: #FF1493; /* 設置深紅色的顏色 */
        margin-right: 10px; /* 調整項目符號與文字之間的間距 */
      }

      .custom-list1 {
        list-style-type: none; /* 取消預設的項目符號 */
        padding-left: 0px; /* 確保有適當的間距給項目符號 */
        counter-reset: my-counter; /* 設置計數器初始值為 0 */
      }

      .custom-list1 li {
        counter-increment: my-counter; /* 每一個 <li> 增加計數器的值 */
      }

      .custom-list1 li::before {
        content: counter(my-counter) ". "; /* 使用計數器的值和 "." 作為項目符號 */
        color: #000; /* 設置黑色的顏色 */
        margin-right: 10px; /* 調整項目符號與文字之間的間距 */
      }

      .drop{ /*區塊五下拉選單樣式*/
        margin-left: 18px;
      }      
      .svgc1{
        fill: #FF0080;
      }
      .center-div{
        margin-top: 100px;
        margin-left: 37%;
        text-align: left;
        max-width: 400px;
        padding: 32px;
        border: 1px #E0E0E0 solid;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .input-container {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
        margin-top: 25px;
      }

      .input-box {
        padding: 10px;
        border: 2px solid #ccc;
        position: relative;
        width: 336px;
        height: 48px;
        border-radius: 8px;
      }
      .input-box1 {
        padding: 10px;
        border: 2px solid #ccc;
        position: relative;
        width: 159px;
        height: 48px;
        border-radius: 8px;
      }
      .input-box2 {
        padding: 10px;
        border: 2px solid #ccc;
        position: relative;
        width: 159px;
        height: 48px;
        border-radius: 8px;
      }

      .placeholder-wrap {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        font-size: 12px;
        color: #ccc;
        pointer-events: none;
        z-index: 1;
        background-color: white;
        padding: 0 5px;
        transition: top 0.3s, font-size 0.3s;
      }
      .placeholder-wrap1 {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        font-size: 12px;
        color: #ccc;
        pointer-events: none;
        z-index: 1;
        background-color: white;
        padding: 0 5px;
        transition: top 0.3s, font-size 0.3s;
      }.placeholder-wrap2 {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        font-size: 12px;
        color: #ccc;
        pointer-events: none;
        z-index: 1;
        background-color: white;
        padding: 0 5px;
        transition: top 0.3s, font-size 0.3s;
      }.placeholder-wrap3 {
        position: absolute;
        top: 50%;
        left: 12px;
        transform: translateY(-50%);
        font-size: 12px;
        color: #ccc;
        pointer-events: none;
        z-index: 1;
        background-color: white;
        padding: 0 5px;
        transition: top 0.3s, font-size 0.3s;
      }
      .input-box:focus + .placeholder-wrap,
      .input-box:not(:placeholder-shown) + .placeholder-wrap {
        top: 50%;
        font-size: 10px;
        color: #ccc;
      }
      .password-indicator {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 5px;
        }
        .indicator-line {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .indicator-icon {
            font-size: 18px;
            margin-right: 5px;
            color: gray; /* 預設為灰色 */
            font-weight: bold; /* 預設為粗體 */
        }
        .valid {
            color: green;
            font-weight: bold; /* 設定粗體 */
        }
        .invalid {
            color: gray;
            font-weight: bold; /* 設定粗體 */
        }
        #password {
          width: 336px;
        }
        #strength-bar {
          max-width: 336px;
          height: 10px;
          margin-top: 10px;
          border-radius: 5px;
          background-color: gray;
          overflow: hidden;
        }
    </style>
</head>
<body>
<header >
<nav id="navbar" style="box-shadow:0 -40px 50px #000;">
  <div class="container">
    <div class="headlogo">
    <a class="headhref" href="index.php">
              <img src="./images/f1.png" width="45px" height="45px">
              <img src="./images/f2.png"  style="margin-left:0px">
            </a>
    </div>
    <div class="changelang">
        <button class="button3">
            <a class="headhref" href="#" >
                <img src="./images/language.png" style="margin:0px;">
                <font color=black>ZH</font>
                <svg aria-hidden="true" focusable="false" fill="#e21b70" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.5303 8.44352C18.7966 8.70977 18.8208 9.12643 18.603 9.42006L18.5304 9.50418L12.3286 15.7069C12.1728 15.8628 11.9204 15.8632 11.764 15.708L5.47165 9.46235C5.17767 9.17055 5.1759 8.69568 5.4677 8.4017C5.73298 8.13445 6.14955 8.10869 6.44397 8.32545L6.52835 8.39775L11.7602 13.5894C11.9165 13.7446 12.169 13.7441 12.3248 13.5883L17.4696 8.44361C17.7359 8.17732 18.1525 8.15308 18.4462 8.37091L18.5303 8.44352Z"></path></svg>
            </a>
            
            
    </button>
    </div>
  </div>
  <nav>
</header>
    <?php
      include("connect.php");
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $lastname=$_POST["lastname"];
        $firstname=$_POST["firstname"];
        $password=$_POST["password"];

        //檢查是否有重複註冊
        $check="SELECT * FROM users where email = '".$_SESSION['useremail']."'";
        if(mysqli_num_rows(mysqli_query($conn,$check)) == 0){
          $sql="INSERT INTO users (lastname,firstname,password,email)
            VALUES('".$lastname."','".$firstname."','".$password."','".$_SESSION['useremail']."')";
          if(mysqli_query($conn,$sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href = 'index.php'>未成功跳轉頁面請點擊此</a>";
            echo "<script>window.location.href='index.php';
            </script>"; 
            //header("refresh:3; url=index.php");
          }
          else{
            echo "錯誤!!!".mysqli_error($conn);
          }
        }
        else{
          echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
          echo "<a href='register.php'>未成功跳轉頁面請點擊此</a>";
          echo "<script>window.location.href='register.php';
            </script>"; 
          //header("refresh:3;url=register.php",true);
          exit;
        }
      }

      function function_alert($message) { 
      
        // Display the alert box  
        echo "<script>alert('錯誤');
         window.location.href='index.php';
        </script>"; 
        
        return false;
    } 
    ?>
    <div class="center-div" style="margin-top:80px;">
    <form method="post" name="regiform" onsubmit="return validateForm()">
    <svg xmlns="http://www.w3.org/2000/svg" width="76" height="60" data-testid="icon-create-account-fp"><g fill="none" fill-rule="evenodd"><path fill="#FBE7EF" d="M75.696 28.442C77.522 15.132 60.176 3.077 49.08.847 38.054-1.383 20.393.045 8.63 14.295-3.166 28.513-1.061 46.838 4.276 52.063c5.337 5.225 10.67 5.15 18.927.244 8.25-4.913 21.417-6.9 36.69-7.91 15.312-.975 15.803-15.955 15.803-15.955"></path><path fill="#D70F64" d="M50.6 59.479H23.671c-2.247 0-4.069-1.808-4.069-4.037V4.616c0-2.23 1.822-4.038 4.07-4.038h26.926c2.247 0 4.069 1.808 4.069 4.038v50.826c0 2.23-1.822 4.037-4.069 4.037"></path><path fill="#5D93CF" d="M51.856 59.479H24.929c-2.247 0-4.069-1.808-4.069-4.037V4.616c0-2.23 1.822-4.038 4.069-4.038h26.927c2.247 0 4.069 1.808 4.069 4.038v50.826c0 2.23-1.822 4.037-4.07 4.037"></path><path fill="#FFF" d="M51.677 52.123H24.562c-.585 0-1.06-.471-1.06-1.052V7.968c0-.58.475-1.052 1.06-1.052h27.115c.585 0 1.06.471 1.06 1.052v43.103c0 .58-.475 1.052-1.06 1.052"></path><path fill="#BED3EB" d="M34.563 56.295h6.878v-1.063h-6.878zM36.861 4.513h6.878V3.449h-6.878zM35.262 4.038c0 .37-.302.67-.675.67a.673.673 0 01-.675-.67c0-.37.302-.67.675-.67.373 0 .675.3.675.67"></path><path fill="#93B7DF" d="M46.7 27.648c0 4.679-3.822 8.472-8.537 8.472-4.716 0-8.538-3.793-8.538-8.472 0-4.678 3.822-8.47 8.538-8.47 4.715 0 8.537 3.792 8.537 8.47"></path><path fill="#5D93CF" d="M40.511 24.343a2.34 2.34 0 01-2.348 2.33 2.34 2.34 0 01-2.349-2.33 2.34 2.34 0 012.349-2.33 2.34 2.34 0 012.348 2.33m1.584 8.942H34.23V31.09c0-2.155 1.76-3.902 3.933-3.902 2.171 0 3.932 1.747 3.932 3.902v2.195z"></path><path fill="#D70F64" d="M38.163 38.642a2.532 2.532 0 01-2.543-2.522 2.532 2.532 0 012.543-2.523 2.532 2.532 0 012.542 2.523 2.532 2.532 0 01-2.542 2.522z"></path><path fill="#FFF" d="M36.808 35.811h1.043v-1.035h.623v1.035h1.043v.618h-1.043v1.034h-.623v-1.034h-1.043z"></path></g></svg>
        <h4><strong>讓我們開始吧！</strong></h4>
        <?php
          echo '<p><font color=#8E8E8E>首先，用'.$_SESSION["useremail"].'建立你的foodpanda帳號。</font></p>';
        ?>
        <div class="input-container"> 
          <input type="text" class="input-box1" value="" name="lastname" id="emailInput" required>
          <div class="placeholder-wrap">姓</div>
        </div>
        <div class="input-container" style="margin-left: 5px">
          <input type="text" class="input-box2" value="" name="firstname" id="emailInput1" required>
          <div class="placeholder-wrap1">名</div>
        </div>
        <div class="input-container">
          <input type="password" class="input-box" value="" name="password" id="password1" onkeyup="updatePasswordIndicator()" oninput="checkPasswordStrength()" required>
          <div class="placeholder-wrap2">密碼</div>
        </div>
        <div class="input-container">
          <input type="password" class="input-box" value="" name="password_check" id="emailInput2" required>
          <div class="placeholder-wrap3">密碼確認</div>
        </div>

        <p><font color=gray size=2>密碼強度</font></p>
        <div id="strength-bar"></div>
        
        <div class="password-indicator">
            <div class="indicator-line">
                <span class="indicator-icon invalid" id="length-indicator">X</span>
                <span id="length-text">至少需要8個字</span>
            </div>
            <div class="indicator-line">
                <span class="indicator-icon invalid" id="letter-indicator">X</span>
                <span id="letter-text">至少需要一個大or小寫字母(a-z)</span>
            </div>
            <div class="indicator-line">
                <span class="indicator-icon invalid" id="number-indicator">X</span>
                <span id="number-text">至少需要一個數字(0-9)</span>
            </div>
        </div>
        <div>
          <button class="button1c1" type="submit" value="註冊" id="submitButton" style="margin-bottom: 20px" disabled>
          <font color=white><strong>建立帳戶</strong></font>
          </button>
        </div>

    </form>
    
  </p>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
  const emailInput = document.getElementById('emailInput');
  const emailInput1 = document.getElementById('emailInput1');
  const password1 = document.getElementById('password1');
  const emailInput2 = document.getElementById('emailInput2');

  const placeholderWrap = document.querySelector('.placeholder-wrap');
  const emailInput1Placeholder = document.querySelector('.placeholder-wrap1');
  const password1Placeholder = document.querySelector('.placeholder-wrap2');
  const emailInput2Placeholder = document.querySelector('.placeholder-wrap3');

  //1
  emailInput.addEventListener('focus', () => {
    placeholderWrap.style.top = '0';
    placeholderWrap.style.fontSize = '10px';
    placeholderWrap.style.color = '#000';
  });

  emailInput.addEventListener('blur', () => {
    if (!emailInput.value.trim()) {
      placeholderWrap.style.top = '50%';
      placeholderWrap.style.fontSize = '12px';
      placeholderWrap.style.color = '#ccc';
    }
  });

  emailInput.addEventListener('input', () => {
    if (emailInput === document.activeElement) return; // Avoid interfering with focus event
    if (emailInput.value.trim() !== '') {
      placeholderWrap.style.top = '0';
      placeholderWrap.style.fontSize = '10px';
      placeholderWrap.style.color = '#000';
    } else {
      placeholderWrap.style.top = '50%';
      placeholderWrap.style.fontSize = '12px';
      placeholderWrap.style.color = '#ccc';
    }
  });
//2
emailInput1.addEventListener('focus', () => {
  emailInput1Placeholder.style.top = '0';
  emailInput1Placeholder.style.fontSize = '10px';
  emailInput1Placeholder.style.color = '#000';
  });

  emailInput1.addEventListener('blur', () => {
    if (!emailInput1.value.trim()) {
      emailInput1Placeholder.style.top = '50%';
      emailInput1Placeholder.style.fontSize = '12px';
      emailInput1Placeholder.style.color = '#ccc';
    }
  });

  emailInput1.addEventListener('input', () => {
    if (emailInput1 === document.activeElement) return; // Avoid interfering with focus event
    if (emailInput1.value.trim() !== '') {
      emailInput1Placeholder.style.top = '0';
      emailInput1Placeholder.style.fontSize = '10px';
      emailInput1Placeholder.style.color = '#000';
    } else {
      emailInput1Placeholder.style.top = '50%';
      emailInput1Placeholder.style.fontSize = '12px';
      emailInput1Placeholder.style.color = '#ccc';
    }
  });
//3
password1.addEventListener('focus', () => {
  password1Placeholder.style.top = '0';
  password1Placeholder.style.fontSize = '10px';
  password1Placeholder.style.color = '#000';
  });

  password1.addEventListener('blur', () => {
    if (!password1.value.trim()) {
      password1Placeholder.style.top = '50%';
      password1Placeholder.style.fontSize = '12px';
      password1Placeholder.style.color = '#ccc';
    }
  });

  password1.addEventListener('input', () => {
    if (password1 === document.activeElement) return; // Avoid interfering with focus event
    if (password1.value.trim() !== '') {
      password1Placeholder.style.top = '0';
      password1Placeholder.style.fontSize = '10px';
      password1Placeholder.style.color = '#000';
    } else {
      password1Placeholder.style.top = '50%';
      password1Placeholder.style.fontSize = '12px';
      password1Placeholder.style.color = '#ccc';
    }
  });
  //4
  emailInput2.addEventListener('focus', () => {
    emailInput2Placeholder.style.top = '0';
    emailInput2Placeholder.style.fontSize = '10px';
    emailInput2Placeholder.style.color = '#000';
  });

  emailInput2.addEventListener('blur', () => {
    if (!emailInput2.value.trim()) {
      emailInput2Placeholder.style.top = '50%';
      emailInput2Placeholder.style.fontSize = '12px';
      emailInput2Placeholder.style.color = '#ccc';
    }
  });

  emailInput2.addEventListener('input', () => {
    if (emailInput2 === document.activeElement) return; // Avoid interfering with focus event
    if (emailInput2.value.trim() !== '') {
      emailInput2Placeholder.style.top = '0';
      emailInput2Placeholder.style.fontSize = '10px';
      emailInput2Placeholder.style.color = '#000';
    } else {
      emailInput2Placeholder.style.top = '50%';
      emailInput2Placeholder.style.fontSize = '12px';
      emailInput2Placeholder.style.color = '#ccc';
    }
  });

  const submitButton = document.getElementById('submitButton');

  emailInput.addEventListener('input', () => {
    if (emailInput.value.trim() !== '') {
      submitButton.classList.add('enabled');
      submitButton.removeAttribute('disabled');
    } else {
      submitButton.classList.remove('enabled');
      submitButton.setAttribute('disabled', 'true');
    }
  });

</script>


<script>//密碼驗證API
    // 驗證密碼長度及包含特定字符
    function validateForm() {
        var x = document.forms["regiform"]["password1"].value;
        var y = document.forms["regiform"]["password_check"].value;
        
        // 檢查密碼長度是否小於 8
        if (x.length < 8) {
            alert("密碼長度不足");
            return false;
        }
        
        // 檢查兩次輸入的密碼是否相同
        if (x != y) {
            alert("請確認密碼是否輸入正確");
            return false;
        }
        
        // 檢查是否包含至少一個數字
        if (!/\d/.test(x)) {
            alert("密碼需包含至少一個數字");
            return false;
        }
        
        // 檢查是否包含至少一個大or小寫字母
        if (!/[a-zA-Z]/.test(x)) {
            alert("密碼需包含至少一個大or小英文字母");
            return false;
        }
    }
</script>


<script>//註冊密碼條件API
  function updatePasswordIndicator() {
            var password1 = document.getElementById("password1").value;
            var lengthIndicator = document.getElementById("length-indicator");
            var letterIndicator = document.getElementById("letter-indicator");
            var numberIndicator = document.getElementById("number-indicator");

            lengthIndicator.textContent = password1.length >= 8 ? "✓" : "X";
            letterIndicator.textContent = /[a-zA-Z]/.test(password1) ? "✓" : "X";
            numberIndicator.textContent = /\d/.test(password1) ? "✓" : "X";
            
            lengthIndicator.className = password1.length >= 8 ? "indicator-icon valid" : "indicator-icon invalid";
            letterIndicator.className = /[a-zA-Z]/.test(password1) ? "indicator-icon valid" : "indicator-icon invalid";
            numberIndicator.className = /\d/.test(password1) ? "indicator-icon valid" : "indicator-icon invalid";
        }
</script>

<script>
    function checkPasswordStrength() {
      const passwordInput = document.getElementById("password1");
      const strengthBar = document.getElementById("strength-bar");
      const strengthText = document.getElementById("strength-text");
      const password1 = passwordInput.value;
      const strength = calculatePasswordStrength(password1);
      const strengthPercentage = (strength / 4) * 150;//調整長度

      strengthBar.style.width = strengthPercentage + "%";

      if (strength === 0) {
        strengthBar.style.backgroundColor = "gray";
        strengthBar.style.width = "336px";
      } 
      else if (strength === 1) {
        strengthBar.style.backgroundColor = "orange";
      } 
      else if (strength === 2) {
        strengthBar.style.backgroundColor = "yellow";
      } 
      else {
        strengthBar.style.backgroundColor = "green";
      }
    }

    function calculatePasswordStrength(password1) {
      let strength = 0;

      if (password1.length >= 8) {
        strength++;
      }

      if (password1.match(/[a-z]/)) {
        strength++;
      }

      if (password1.match(/[A-Z]/)) {
        strength++;
      }

      if (password1.match(/[0-9]/)) {
        strength++;
      }

      return strength;
    }
  </script>
</body>
</html>