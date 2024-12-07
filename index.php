<?php
include("connect.php");
session_start();
?>
<script>
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    } else {
      document.getElementById("location").value = "地理位置功能不可用";
    }
  }

  function successCallback(position) {
    var userLatitude = position.coords.latitude;
    var userLongitude = position.coords.longitude;
    console.log(userLatitude);
    console.log(userLongitude);
    // 呼叫地理編碼函數
    getAddressFromCoordinates(userLatitude, userLongitude);
  }

  function errorCallback(error) {
    document.getElementById("location").value = "無法獲取使用者位置：" + error.message;
  }

  function getAddressFromCoordinates(latitude, longitude) {
    var apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
        if (data.display_name) {
          var userAddress = data.display_name;
          document.getElementById("location").value = userAddress;
        } else {
          document.getElementById("location").value = "無法獲取地址資訊";
        }
      })
      .catch(error => {
        console.log("發生錯誤：" + error);
      });
  }
</script>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <title>foodpanda美食外送平台</title>
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
        margin-top: 10px;
        margin-right: 10px;
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
      
      .button1{
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 55px;
        background-color: white; 
        color: pink; 
        border: 1px solid #FF0080;
      }
      .button1:hover{
        transform: scale(1.2);
        background-color: #FFECEC;
      }
      .button2{
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 60px;
        height: 40px;
        background-color: #FF0080;
        border: 1px solid #FF0080;
        margin-right:10px;
      }
      .button2:hover{
        transform: scale(1.2);
        background-color: #FF0080;
      }
      a{
        text-decoration:none;
      }
      .button3{
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 80px;
        height :40px;
        background-color: white; 
        color: pink; 
        border: 0px;
        margin-right:10px;
      }
      .button3:hover{
        transform: scale(1.1);
        background-color: #FFECEC;
      }
      .button3c{
        text-align: center;
        transform: scale(1);
        font-size: 15px;
        border-radius: 8px;
        width: 150px;
        height :40px;
        background-color: white; 
        color: pink; 
        border: 0px;
      }
      .button3c:hover{
        transform: scale(1.1);
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
      #getLocationBtn{
        margin-left:-70px;
        margin-right:25px;
        border:none;
        background-color:white;
        border-radius: 50%;
        width:45px;
        height:45px;
      }
      #getLocationBtn:hover{
        transform:scale(1);
        background-color:#FFECEC;
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
    </style>
</head>
<body>
<header >
<nav id="navbar" style="box-shadow:0 -40px 50px #000;">
  <div class="container">
    <div class="headlogo">
    <a class="headhref" href="index.php">
              <img src="./images/f1.png" width="45px" height="45px">
              <img src="./images/f2.png">
            </a>
    </div>
    <div class="changelang">
    <?php //判斷登入情況
    if(empty($_SESSION["loggedin"])){
    echo '<a href="logANDregi.php">
    <button class="button1">
        <font color=#FF0080>登入</font>
    </button>
    </a>
    <a href="logANDregi.php">
    <button class="button2" style="margin-left: 18px">
        <font color=white>註冊</font>
    </button>
    </a>';
  }
    else{//這邊要補下拉式選單
      $sql = "SELECT * FROM users where email = '".$_SESSION['useremail']."'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      $fullname = $firstname . " " . $lastname;
      //$fullname = $firstname . " " . $lastname;
      echo '<button class="button3c">
      <font color=black>
      <svg aria-hidden="true" focusable="false" class="fl-interaction-primary" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="personal-icon"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.7588 13.9048C15.3933 13.9048 18.2013 16.1043 19.4623 19.9403C19.5378 20.1688 19.4983 20.4198 19.3573 20.6148C19.2163 20.8098 18.9903 20.9248 18.7498 20.9248H4.74978C4.50928 20.9248 4.28328 20.8098 4.14278 20.6148C4.00128 20.4198 3.96228 20.1688 4.03778 19.9403C5.27978 16.1613 8.16628 13.9048 11.7588 13.9048ZM11.7588 15.4048C9.26628 15.4048 7.24378 16.7018 6.04378 19.0153C5.94728 19.2013 6.08978 19.4248 6.29978 19.4248H17.2003C17.4103 19.4248 17.5528 19.2013 17.4563 19.0153C16.2583 16.7018 14.2418 15.4048 11.7588 15.4048ZM11.7676 3C14.5931 3 16.8926 5.299 16.8926 8.1245C16.8926 10.9505 14.5931 13.2495 11.7676 13.2495C8.94208 13.2495 6.64258 10.9505 6.64258 8.1245C6.64258 5.299 8.94208 3 11.7676 3ZM11.7676 4.5C9.76858 4.5 8.14258 6.126 8.14258 8.1245C8.14258 10.1235 9.76858 11.7495 11.7676 11.7495C13.7666 11.7495 15.3926 10.1235 15.3926 8.1245C15.3926 6.126 13.7666 4.5 11.7676 4.5Z"></path></svg>
      '.$fullname.'</font></button>';
      echo '<a href="logout.php">
            <button class="button2" style="margin-left: 18px">
                <font color=white>登出</font>
            </button>
            </a>';
    }
    ?>
    <a class="headhref" href="#" >
    <button class="button3">
    <svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM10.6635 19.3813C9.79267 18.1369 9.11658 16.9361 8.65036 15.75H5.50337C6.58707 17.6234 8.45784 18.9845 10.6635 19.3813ZM4.84335 14.25H8.17237C7.98964 13.4966 7.89523 12.7442 7.8931 11.9853C7.891 11.2379 7.97842 10.4952 8.15242 9.75H4.84335C4.62027 10.4603 4.5 11.2161 4.5 12C4.5 12.7839 4.62027 13.5397 4.84335 14.25ZM5.50337 8.25H8.61663C9.06884 7.07159 9.72906 5.8752 10.586 4.63309C8.41405 5.04747 6.57436 6.39858 5.50337 8.25ZM18.4966 15.75C17.4415 17.574 15.6402 18.9124 13.5102 19.3479C14.3698 18.1154 15.038 16.9255 15.5 15.75H18.4966ZM19.1566 14.25H15.978C16.1608 13.4966 16.2552 12.7442 16.2573 11.9853C16.2594 11.2379 16.172 10.4952 15.998 9.75H19.1566C19.3797 10.4603 19.5 11.2161 19.5 12C19.5 12.7839 19.3797 13.5397 19.1566 14.25ZM18.4966 8.25H15.5338C15.0859 7.08283 14.4339 5.89803 13.5888 4.66862C15.6845 5.12065 17.4545 6.44847 18.4966 8.25ZM12.0752 5.12312C12.8682 6.22942 13.4764 7.26325 13.9116 8.25H10.2388C10.674 7.26325 11.2822 6.22942 12.0752 5.12312ZM9.69994 9.75H14.4504C14.6591 10.5113 14.7593 11.2505 14.7573 11.981C14.7552 12.7258 14.6467 13.4775 14.4269 14.25H9.72354C9.50364 13.4775 9.39519 12.7258 9.3931 11.981C9.39105 11.2505 9.49129 10.5113 9.69994 9.75ZM10.2783 15.75H13.8721C13.4389 16.7093 12.8428 17.7109 12.0752 18.7788C11.3076 17.7109 10.7115 16.7093 10.2783 15.75Z"></path></svg>
        <font color=black>ZH</font>
    </button>
    </a>
    <a class="headhref" href="#" >
    <button class="button4">
      <svg aria-hidden="true" focusable="false" class="svgc1" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0021 2C14.5418 2 16.4241 3.6512 16.5538 6.15854H19.8491C20.4014 6.15854 20.8491 6.60625 20.8491 7.15854C20.8491 7.20585 20.8457 7.25311 20.8391 7.29996L19.1248 19.1414C19.0544 19.6341 18.6325 20 18.1348 20H5.86942C5.37176 20 4.94984 19.6341 4.87947 19.1414L3.16518 7.29996C3.08707 6.75322 3.46697 6.24669 4.0137 6.16859C4.06055 6.16189 4.10781 6.15854 4.15513 6.15854L7.36129 6.16397C7.49108 3.65663 9.46248 2 12.0021 2ZM17.5607 16.25H6.44235C6.22143 16.25 6.04235 16.4291 6.04235 16.65C6.04235 16.669 6.04369 16.6879 6.04638 16.7067L6.25397 18.1567C6.28217 18.3537 6.45092 18.5 6.64993 18.5H17.3533C17.5523 18.5 17.7211 18.3537 17.7492 18.1566L17.9567 16.7066C17.988 16.488 17.836 16.2853 17.6174 16.254C17.5986 16.2513 17.5797 16.25 17.5607 16.25ZM18.8109 7.65854H5.19233C4.97142 7.65854 4.79233 7.83762 4.79233 8.05854C4.79233 8.32251 4.79367 8.09637 4.79635 8.11511L5.71793 14.4066C5.74609 14.6036 5.91486 14.75 6.11391 14.75H17.8891C18.0882 14.75 18.2569 14.6036 18.2851 14.4066L19.2069 8.11513C19.2381 7.89643 19.0862 7.69381 18.8675 7.66256C18.8487 7.65988 18.8298 7.65854 18.8109 7.65854ZM12.0021 3.40323C10.4163 3.40323 9.15495 4.32251 8.91234 5.80175C8.88507 5.96802 8.98943 6.12701 9.15495 6.15854C9.17377 6.16212 9.19289 6.16392 9.21204 6.1639L14.7134 6.15847C14.8772 6.15843 15.0099 6.02566 15.0099 5.86189C15.0099 5.84361 14.9631 5.82209 15.0049 5.80742C14.655 4.32251 13.5918 3.40323 12.0021 3.40323Z">
      </path>
    </svg>
    </button>
    </a>
    </div>
    </div>
  </div>
<nav>
</header>
<div style="position: relative;">
<div style="background-color:#F5F5F5;z-index:1;">
<div class="container"><!--區塊一(地址[選擇外帶自取OR外帶])-->
  <div class="contents">
    <div class="main" style="width:54%;margin-top:200px;">
      <h1>從美食到生鮮雜貨 上萬種商品 馬上點馬上到</h1  >
      <div style="background-color:white;width:100%;height:80px;border-radius:20px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
      <input type="text" class="" id="location" name="" placeholder="輸入你欲送達的地址" style="padding:15px;margin:12.5px;border-radius:15px;width:80%;border: 1px gray solid;">
      <button id="getLocationBtn" onclick="getLocation()">
        <svg aria-hidden="true" focusable="false" fill="#FF0080" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="locate-me"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C12.4142 2 12.75 2.33579 12.75 2.75L12.7506 3.67925C12.7507 3.88008 12.8998 4.04968 13.0989 4.07562C13.1524 4.08259 13.1986 4.08909 13.2375 4.09514C16.6725 4.62856 19.3848 7.34731 19.9084 10.7855C19.9135 10.8188 19.9189 10.8575 19.9247 10.9019C19.9506 11.1011 20.1204 11.2502 20.3214 11.2502L21.25 11.25C21.6642 11.25 22 11.5858 22 12C22 12.4142 21.6642 12.75 21.25 12.75L20.3212 12.7506C20.1205 12.7507 19.951 12.8995 19.9249 13.0985C19.9211 13.1273 19.9175 13.1532 19.9141 13.1762C19.4013 16.6567 16.647 19.4078 13.1649 19.9158C13.145 19.9187 13.1228 19.9218 13.0984 19.925C12.8995 19.9511 12.7507 20.1206 12.7506 20.3213L12.75 21.25C12.75 21.6642 12.4142 22 12 22C11.5858 22 11.25 21.6642 11.25 21.25L11.2502 20.3213C11.2502 20.1203 11.1011 19.9505 10.9018 19.9246C10.8535 19.9183 10.8115 19.9124 10.7758 19.9069C7.33814 19.379 4.62167 16.6629 4.09327 13.2254C4.08776 13.1896 4.08184 13.1474 4.07552 13.0989C4.04958 12.8997 3.87997 12.7507 3.67912 12.7506L2.75 12.75C2.33579 12.75 2 12.4142 2 12C2 11.5858 2.33579 11.25 2.75 11.25L3.67818 11.2502C3.87895 11.2502 4.04865 11.1015 4.07487 10.9024C4.07777 10.8805 4.08053 10.8604 4.08317 10.8422C4.58738 7.36412 7.32923 4.61075 10.8016 4.08916C10.8307 4.08479 10.8642 4.08013 10.902 4.07519C11.1012 4.04909 11.2502 3.87936 11.2502 3.67848L11.25 2.75C11.25 2.33579 11.5858 2 12 2ZM12 5.5C8.41015 5.5 5.5 8.41015 5.5 12C5.5 15.5899 8.41015 18.5 12 18.5C15.5899 18.5 18.5 15.5899 18.5 12C18.5 8.41015 15.5899 5.5 12 5.5ZM12 8C14.2091 8 16 9.79086 16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8ZM12 9.5C10.6193 9.5 9.5 10.6193 9.5 12C9.5 13.3807 10.6193 14.5 12 14.5C13.3807 14.5 14.5 13.3807 14.5 12C14.5 10.6193 13.3807 9.5 12 9.5Z"></path></svg>
      </button>
      <a href="rest.php"><button class="button" style="background-color:#FF0080;padding:15px;border-radius:15px;border:none;color:white; margin-right: 1px"><font color=white>尋找美食</font></button></a>
    </div>
    </div>
    <div class="side" style="width:40%;">
      <img src="https://images.deliveryhero.io/image/foodpanda/homepage/refresh-hero-home-tw.png?width=1920" style="width:900px;">
    </div>
  </div>
</div>
</div>  
<div style="margin-top:-10px;background-image:url('./images/bkimg.jpg');height:800px;background-repeat:no-repeat;background-size:cover;background-position: center;z-index:-1;"><!--區塊二(店家加盟表單導向按鈕)-->
  <div style="background-color:white;width:100%;height:200px;">
    <div class="container">
      <br><br><br><br><br>
      <h2>想加入FoodPanda嗎?</h2>
    </div>
  </div>
</div>
<div style="height:200px;background:white;margin-top:-200px;">

</div>
<div>
  <div class="container">
    <div style="z-index:6;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;width:650px;padding:25px;margin-top:-350px;background:white;border-radius:20px;margin-bottom:25px;">
      <h4>
      與foodpanda合作，讓更多人享受你的餐點跟商品吧！
      </h4>
      <p>想讓上百萬新顧客試試你的美食或生鮮雜貨商品嗎？讓我們來幫忙吧！<br><br>
      該怎麼做呢？我們會協助你上傳菜單或商品清單、幫你處理訂單、訂單確認後我們將請外送夥伴前往你的商店去取件，再將餐點或商品外送給顧客們。<br><br>
      還等什麼？一起和我們開始這個外送的旅程吧！</p>
      <a class="btn btn-primary" href="join.php" role="button" style="background-color:#FF0080;border:none;padding:10px;"target="_blank">立即加入</a>
    </div>
    
  </div>
  </div>


<div style="background:white;z-index:4;padding-top:50px;"><!--區塊三(提供送餐服務地區)-->
  <div class="container">
    <h2>
      我們有在您的城市提供送餐服務!
    </h2>
  </div>
  <div class="container">
    <div style="display:flex;flex-wrap:wrap;align-content:space-around;">
    <?php
    $sql = "SELECT * FROM city";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
      echo '<div class="image-container"><a href="#">
      <img src="'.$row['plink'].'" class="image">
      <button class="image-text">'.$row['cname'].'</button></a>
      </div>';
    }
    
    ?>
    </div>
  </div>  
</div>
</div>
<div class="container"><!--區塊四(下載連結區)-->
    <div style="margin-top:50px;">
      <h2>
      下載foodpanda App!
      </h2>
    </div>
    <div class="contents2">
      <div class="dlmain">
        <h2>你最喜愛的美食與生鮮雜貨都在foodpanda app</h2>
        <div style="width:475px;">
        <div style="float:left;width:100px;height:100px;border:1px solid #fff;padding:10px;border-radius:10px;">
          <img src="https://images.deliveryhero.io/image/foodpanda/homepage/twhomepagercode.png"style="width:80px;height:80px;">
       </div>
       <div style="float:right;width:350px;">
        <p>手指輕點，從美食到生鮮雜貨，上萬種商品馬上點馬上到－立即下載</p>
      </div>
      <br><br>
        <div style="display:flex;width:400px;margin:30px;margin-top:80px;justify-content:space-around;">
          <a href="https://bhpz.adj.st/?adj_t=f6igys&adj_deep_link=foodpanda%3A%2F%2F%3F&adj_campaign=tw_homepage_ios&wssid=1691092746833.477851243956261000.ghed1f29mt"><img src="./images/appstore.png" style="width: 125px;height:40px;"></a>
          <a href="https://bhpz.adj.st/?adj_t=dfv9zs&adj_deep_link=foodpanda%3A%2F%2F%3F&adj_campaign=tw_homepage_android&wssid=1691092746833.477851243956261000.ghed1f29mt"><img src="./images/playstore.png" style="width:125px;height:40px;"></a>
          <a href="https://bhpz.adj.st/?adj_t=h8w5e0t&adj_deep_link=foodpanda%3A%2F%2F%3F&adj_campaign=tw_homepage_huawei&wssid=1691092746833.477851243956261000.ghed1f29mt"><img src="./images/huawei-Badge-Black.png" style="width:125px;height:40px;"></a>
        </div>
       </div>
      </div>
      <div class="dlside">
        <img src="https://images.deliveryhero.io/image/foodpanda/home-foodpanda-apps.png?width=1400&height=1113" style="margin-top:-100px;margin-bottom:-80px;height:500px;">
      </div>
    </div>
</div>
<div style="background-image:url('./images/bkimg1.jpg');height:800px;background-repeat:no-repeat;background-size:cover;background-position: center;z-index:-1;"><!--區塊三(在外享用午餐)-->
  <div style="background-color:white;width:100%;height:200px;">
    <div class="container">
      <br><br><br><br>
      <h2>在外享用午餐</h2>
    </div>
  </div>
</div>
<div style="height:200px;background:white;margin-top:-200px;">

</div>
<div>
  <div class="container">
    <div style="z-index:6;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;width:650px;padding:25px;margin-top:-350px;background:white;border-radius:20px;margin-bottom:25px;">
      <h4>
      foodpanda【企業優惠方案】
      </h4>
      <p>你的專屬管家上線囉－從在家工作的三餐、會議餐點到下午茶、生日聚會，線上訂馬上到，交給我們就對囉！</p>
      <a class="btn btn-primary" href="more.php" role="button" style="background-color:#FF0080;border:none;padding:10px;"target="_blank">了解更多</a>
    </div>
    
  </div>
  </div>
<br>
<br>
<br>
<br>
<br>
<div class="container"><!--段落一(foodpanda外送美味)-->
    <h4><strong>foodpanda外送美味：</strong></h4><br>
    <ul class="custom-list">
      <li>全台超過上萬間人氣店家－從美食到生鮮雜貨通通有，馬上點！</li>
      <li>專業的外送夥伴，將在最短的時間內將你愛的餐點與生鮮雜貨外送給你。</li>
      <li>最親切有禮的客服，在家吃用餐也像VIP</li>
    </ul>
</div>
<br>
<div class="container"><!--段落二(從美食到生鮮雜貨－在台灣，線上訂超簡單)-->
<h4><strong>從美食到生鮮雜貨－在台灣，線上訂超簡單</strong></h4><br>
    <ul class="custom-list1">
      <li>輸入您想送達的地址，可能是家裡或公司</li>
      <li>點擊「顯示餐廳」 或「顯示商店」 ，找到附近可以外送的餐點或生鮮雜貨。</li>
      <li>選擇你想訂購的餐廳或商店</li>
      <li>將菜單上的餐點或產品加入購物車</li>
      <li>按下「結帳」</li>
      <li>再次確認並填入送達地址細節，可能是家裡或公司</li>
      <li>付款成功後就可以期待訂單送到你手上囉</li>
    </ul>
</div>
<br>
<div class="container"><!--區塊五([點此看更多那邊]下拉式選單)-->
<a class="drop" >點此看更多</a>
</div>
<div class=""><!--區塊六(FOODPANDA官方連接區)-->
</div>
<div class=""><!--區塊七(雜七雜八區[有客服中心那邊])-->
</div>
<div class="container">
<hr>
</div>
&nbsp;
<div class="container"><!--區塊八(各地區特色美食)-->
    <?php
      $sql="SELECT *
      FROM citydelivery
      INNER JOIN citydeFK ON citydelivery.coid = citydefk.coid ORDER BY citydelivery.coid ASC";
      $result=mysqli_query($conn,$sql);
      $rowcoid=0;
      while($row = mysqli_fetch_array($result)){
        if($row[3] != $rowcoid){
        echo '<h4><strong><font color=black size=4>' . $row['coname'] . '</font></strong></h4>';
      }
        echo '<p style="text-align: justify">';
        echo '<a class="headhref" href="' . $row['flink'] . '"><font color=gray>' . $row['fname'] . '</font></a> &nbsp';
        echo '</p>';
        $rowcoid=$row[3];
      }
    ?>
</div>
&nbsp;
<br>
<div class="container">
<hr>
</div>
<div class="container"><!--區塊九(熱門餐廳)-->
<h4><strong>熱門餐廳</strong></h4>
<p>
<?php
  $sql="SELECT * FROM rest2 ORDER BY rid ASC";
  $result=mysqli_query($conn,$sql);
  $total_rows = mysqli_num_rows($result); // 總筆數
  $count = 0; // 計數器，用於判斷是否為最後一筆資料

  while ($row = mysqli_fetch_array($result)) {
    $count++; // 每處理一筆資料，計數器加1

    // 輸出每筆資料
    echo '<a class="headhref" href="' . $row['rlink'] . '"><font color=gray>' . $row['rname'] . '</font></a>';

    // 如果不是最後一筆資料，就輸出 " | "
    if ($count < $total_rows) {
        echo " &nbsp; | &nbsp; ";
    }
  }
?>
</p>
</div>
&nbsp;
<br>
<div class="container">
<hr>
</div>
<div class="container"><!--區塊十(熱門料理)-->
  <h4><strong>熱門料理</strong></h4>
  <?php
      $sql="SELECT *
      FROM cf
      INNER JOIN cffk ON cf.cid = cffk.cid ORDER BY cf.cid ASC";
      $result=mysqli_query($conn,$sql);
      $rowcid=0;
      while($row = mysqli_fetch_array($result)){
        if($row[4] != $rowcid){
        echo '<h5><font color=black>' . $row['cname'] . '</font></h5>';}
        echo '<a class="headhref" href="' . $row['cflink'] . '"><font color=gray>' . $row['cfname'] . '</font></a> &nbsp';
        $rowcid=$row[4];
      }
    ?>
  <table>
  
  </ul>
  </table>
  <p>&nbsp;</p>
</div>
<br>
<div class="container">
<hr>
</div>
<div class="contain-center" style="float: center; margin-bottom: 120px"><!--區塊十一(導向各國網站)-->
<br>
&nbsp;
<p>
<?php
$sql="SELECT * FROM country ORDER BY cid ASC";
$result=mysqli_query($conn,$sql); 
$total_rows = mysqli_num_rows($result); // 總筆數
$count = 0; // 計數器，用於判斷是否為最後一筆資料

while ($row = mysqli_fetch_array($result)) {
    $count++; // 每處理一筆資料，計數器加1

    // 輸出每筆資料
    echo '<a class="headhref" href="' . $row['clink'] . '"><font color=gray>' . $row['cname'] . '</font></a>';

    // 如果不是最後一筆資料，就輸出 " | "
    if ($count < $total_rows) {
        echo " &nbsp; | &nbsp; ";
    }
}
?>
</p>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="index.js"></script>

</body>
</html>