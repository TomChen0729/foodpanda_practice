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
      .deliverybutton{
        margin-top:90px;
        margin-left:7px;
        float:left;
        border:none;
        background-color:white;
        width:120px;
        height:45px;
        cursor: pointer;
        position: relative;
        border-radius: 5px;
      }
      .deliverybutton:hover{
        transform: scale(1.1);
        background-color: #FFECEC;
      }
      .deliverybutton::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px; /* 底线高度 */
        background-color: #ff6347; /* 底线颜色 */
        transform: scaleX(0); /* 初始时线的宽度为0，没有显示 */
        transform-origin: center; /* 从左侧开始变化 */
        transition: transform 0.3s ease; /* 添加动画效果 */
        }
        /* 当鼠标悬停在按钮上时，显示底线 */
        .deliverybutton:hover::before {
            transform: scaleX(1); /* 放大底线的宽度 */
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
      .svgc1{
        fill: #FF0080;
      }
      /*商店的表格設定*/
      .body{
        margin-top:100px;
      }
      .flexcontainer {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content:space-between;
        height: 150px;
        margin:10px 
      }
      .item{
        width:25%;
      }
    </style>
</head>
<body>
<header >
    <div>
<nav id="navbar" style="position:absolute;height:135px;box-shadow:0 -40px 50px #000;z-index:9;">
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
<nav></div><div class="container"><div style="position:absolute;z-index:10;">
<button class="deliverybutton">
    <svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.4729 5C14.0587 5 13.7229 5.33566 13.7229 5.74971C13.7229 6.16376 14.0587 6.49941 14.4729 6.49941H17.1729C17.2833 6.49941 17.3729 6.58896 17.3729 6.69941V9.38586C17.3729 9.42859 17.3592 9.4702 17.3338 9.50458L14.154 13.8153C14.1163 13.8664 14.0566 13.8965 13.9931 13.8965H10.3729C10.2624 13.8965 10.1729 13.807 10.1729 13.6965V9.69816C10.1729 9.28411 9.83708 8.94846 9.42287 8.94846H6.02287C5.01565 8.94846 4.19446 9.18295 3.55495 9.62085C2.91419 10.0596 2.51456 10.6624 2.28321 11.297C1.833 12.5318 1.99469 13.9438 2.25118 14.8503C2.34251 15.1731 2.63726 15.3959 2.97287 15.3959H3.57306C3.52524 15.6066 3.5 15.8259 3.5 16.0511C3.5 17.6797 4.82076 18.9999 6.45 18.9999C8.07924 18.9999 9.4 17.6797 9.4 16.0511C9.4 15.8259 9.37476 15.6066 9.32694 15.3959H14.3718C14.6736 15.3959 14.9574 15.2527 15.1365 15.0099L18.6875 10.196C18.8079 10.0328 18.8729 9.83526 18.8729 9.63243V5.94963C18.8729 5.42516 18.4475 5 17.9229 5H14.4729ZM7.74379 15.3959H5.15621C5.05631 15.5927 5 15.8153 5 16.0511C5 16.8516 5.64919 17.5005 6.45 17.5005C7.25081 17.5005 7.9 16.8516 7.9 16.0511C7.9 15.8153 7.84369 15.5927 7.74379 15.3959ZM8.67287 13.8565C8.67287 13.8786 8.65496 13.8965 8.63287 13.8965H3.57325C3.46237 13.2317 3.45914 12.4506 3.69253 11.8104C3.83701 11.4141 4.06488 11.0892 4.40266 10.8579C4.74169 10.6257 5.25009 10.4479 6.02287 10.4479H8.63287C8.65496 10.4479 8.67287 10.4658 8.67287 10.4879V13.8565Z"></path><path d="M4.52344 5.99961C4.10922 5.99961 3.77344 6.3354 3.77344 6.74961C3.77344 7.16382 4.10922 7.49961 4.52344 7.49961H9.42344C9.83765 7.49961 10.1734 7.16382 10.1734 6.74961C10.1734 6.3354 9.83765 5.99961 9.42344 5.99961H4.52344Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M16.0957 16.0512C16.0957 14.4225 17.4165 13.1023 19.0457 13.1023C20.6749 13.1023 21.9957 14.4225 21.9957 16.0512C21.9957 17.6798 20.6749 19 19.0457 19C17.4165 19 16.0957 17.6798 16.0957 16.0512ZM19.0457 14.6017C18.2449 14.6017 17.5957 15.2507 17.5957 16.0512C17.5957 16.8517 18.2449 17.5006 19.0457 17.5006C19.8465 17.5006 20.4957 16.8517 20.4957 16.0512C20.4957 15.2507 19.8465 14.6017 19.0457 14.6017Z"></path></svg>
    <span>
        <font>外送</font>
    </span>
</button>
<button class="deliverybutton">
 <svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.978 7.6715C11.3804 7.76979 11.6269 8.17567 11.5286 8.57805L10.4015 13.1922C10.1984 14.0233 10.5609 14.8897 11.2953 15.3287L12.4349 16.0098C13.5296 16.6641 14.4352 17.592 15.0627 18.7022L16.1529 20.631C16.3567 20.9916 16.2296 21.4492 15.869 21.653C15.5084 21.8568 15.0509 21.7297 14.8471 21.3691L13.7569 19.4403C13.2574 18.5566 12.5366 17.8181 11.6654 17.2974L10.5258 16.6162C9.22642 15.8396 8.5851 14.3067 8.94431 12.8362L10.0714 8.2221C10.1697 7.81972 10.5756 7.57321 10.978 7.6715Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.3325 8.36177C14.7402 8.43496 15.0114 8.8248 14.9382 9.23249L14.2 9.09997C14.9382 9.23249 14.9382 9.23239 14.9382 9.23249L14.9375 9.23651L14.9357 9.24613L14.9292 9.2815C14.9235 9.31205 14.9151 9.35628 14.9042 9.41253C14.8824 9.52499 14.8502 9.68571 14.8085 9.8813C14.7253 10.2717 14.6033 10.8048 14.4485 11.3723C14.2945 11.9371 14.1041 12.5502 13.882 13.0954C13.6695 13.6168 13.3926 14.1679 13.0302 14.5302C12.7373 14.8231 12.2625 14.8231 11.9696 14.5302C11.6767 14.2373 11.6767 13.7624 11.9696 13.4695C12.1072 13.3319 12.2928 13.0205 12.4929 12.5294C12.6833 12.0621 12.8554 11.5127 13.0014 10.9776C13.1466 10.445 13.2622 9.9407 13.3415 9.56861C13.381 9.38297 13.4114 9.2312 13.4317 9.12647C13.4419 9.07413 13.4496 9.0336 13.4546 9.00653L13.4602 8.97626L13.4615 8.96909L13.4618 8.96757C13.535 8.55993 13.9249 8.28859 14.3325 8.36177Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M13.2 5.8999C13.7523 5.8999 14.2 5.45219 14.2 4.8999C14.2 4.34762 13.7523 3.8999 13.2 3.8999C12.6477 3.8999 12.2 4.34762 12.2 4.8999C12.2 5.45219 12.6477 5.8999 13.2 5.8999ZM13.2 7.3999C14.5807 7.3999 15.7 6.28061 15.7 4.8999C15.7 3.51919 14.5807 2.3999 13.2 2.3999C11.8193 2.3999 10.7 3.51919 10.7 4.8999C10.7 6.28061 11.8193 7.3999 13.2 7.3999Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.7518 9.03582C8.43465 8.66945 7.3 10.1419 7.3 11.3C7.3 11.7142 6.96421 12.05 6.55 12.05C6.13579 12.05 5.8 11.7142 5.8 11.3C5.8 9.12931 7.85651 7.04201 11.0211 7.55986L11.0491 7.56444L14.3767 8.37112C14.7793 8.46871 15.0265 8.87416 14.9289 9.27671C14.8313 9.67926 14.4259 9.92649 14.0233 9.8289L10.7518 9.03582Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.9319 9.72425C14.9407 9.52054 14.95 9.30432 14.95 9.0999C14.95 8.68569 14.6142 8.3499 14.2 8.3499C13.7858 8.3499 13.45 8.68569 13.45 9.0999C13.45 9.26992 13.4422 9.45254 13.4332 9.66234C13.4322 9.68501 13.4312 9.708 13.4302 9.73132C13.4204 9.96302 13.4104 10.2211 13.4138 10.4846C13.4206 11.006 13.4791 11.6116 13.7361 12.1827C14.0036 12.7772 14.4656 13.2886 15.1906 13.638C15.8945 13.9773 16.8156 14.1499 18 14.1499C18.4142 14.1499 18.75 13.8141 18.75 13.3999C18.75 12.9857 18.4142 12.6499 18 12.6499C16.9444 12.6499 16.2705 12.4934 15.8419 12.2868C15.4344 12.0904 15.2264 11.8393 15.1039 11.5671C14.9709 11.2715 14.9194 10.9063 14.9137 10.4652C14.9109 10.2474 14.919 10.0264 14.9289 9.79504C14.9298 9.77164 14.9309 9.74803 14.9319 9.72425Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.95777 16.366C9.3355 16.536 9.50392 16.98 9.33394 17.3578L9.15059 17.7652C8.64057 18.8986 7.93609 19.934 7.06905 20.8244L6.43735 21.4732C6.14839 21.77 5.67356 21.7763 5.37679 21.4873C5.08002 21.1984 5.07368 20.7235 5.36265 20.4268L5.99434 19.778C6.73926 19.013 7.34452 18.1234 7.78271 17.1497L7.96606 16.7422C8.13604 16.3645 8.58004 16.1961 8.95777 16.366Z"></path></svg>   <span>
        <font>外帶自取</font>
    </span>
</button>
<button class="deliverybutton">
<svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M14 2C15.1046 2 16 2.89543 16 4V4.8C16 4.91046 16.0895 5 16.2 5H18C19.1046 5 20 5.89543 20 7V20C20 21.1046 19.1046 22 18 22H6C4.89543 22 4 21.1046 4 20V7C4 5.89543 4.89543 5 6 5H7.8C7.91046 5 8 4.91046 8 4.8V4C8 2.89543 8.89543 2 10 2H14ZM18.291 16.5H5.702L5.64885 16.5072C5.56422 16.5305 5.50203 16.608 5.5019 16.7L5.50011 20.3L5.50718 20.3532C5.52572 20.4209 5.57901 20.4743 5.64672 20.4929L5.7 20.5H18.2919L18.3451 20.4929C18.4298 20.4696 18.4919 20.392 18.4919 20.3L18.491 16.7L18.4839 16.6468C18.4605 16.5622 18.383 16.5 18.291 16.5ZM7.79936 6.50806H5.70806L5.65491 6.5152C5.57028 6.5385 5.50809 6.61605 5.50794 6.70806L5.50312 14.8L5.51018 14.8532C5.52871 14.9209 5.58201 14.9743 5.64972 14.9929L5.703 15H18.291L18.3442 14.9929C18.4288 14.9696 18.491 14.892 18.491 14.8L18.4919 6.70806L18.4848 6.65489C18.4615 6.57024 18.384 6.50806 18.2919 6.50806H16.1994L16.146 6.51526C16.0613 6.53865 15.9992 6.61625 15.9994 6.70829L16 7.25L15.9932 7.35177C15.9435 7.71785 15.6297 8 15.25 8L15.1482 7.99315C14.7822 7.94349 14.5 7.6297 14.5 7.25L14.4994 6.70782C14.4992 6.59745 14.4097 6.50806 14.2994 6.50806H9.69936L9.64596 6.51526C9.56134 6.53865 9.49925 6.61625 9.49936 6.70829L9.5 7.25L9.49315 7.35177C9.44349 7.71785 9.1297 8 8.75 8C8.33579 8 8 7.66421 8 7.25L7.99936 6.70782C7.99922 6.59745 7.90972 6.50806 7.79936 6.50806ZM14 3.5H10C9.75454 3.5 9.55039 3.67688 9.50806 3.91012L9.5 4V4.8C9.5 4.91046 9.58954 5 9.7 5H14.3C14.4105 5 14.5 4.91046 14.5 4.8V4C14.5 3.75454 14.3231 3.55039 14.0899 3.50806L14 3.5Z"></path></svg><span>
        <font>熊貓超市</font>
    </span>
</button>
<button class="deliverybutton">
<svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.94893 5.58892C5.90356 5.77993 5.73806 5.92311 5.54174 5.92311H3.3432C2.7624 5.92311 2.31755 6.43966 2.40371 7.01403L4.02568 17.8272C4.08369 18.2139 4.41591 18.5 4.80694 18.5H6.21627C6.41427 18.5 6.58248 18.6449 6.61185 18.8407L6.98483 21.3272C7.04283 21.7139 7.37503 22 7.76609 22H19.1373C19.5277 22 19.8595 21.715 19.9183 21.3291L21.598 10.3151C21.6691 9.84888 21.3082 9.42898 20.8368 9.42898H18.7119C18.4669 9.42898 18.2795 9.21082 18.3165 8.96868L18.6142 7.01633C18.7019 6.44124 18.2568 5.92311 17.675 5.92311H15.4494C15.2531 5.92311 15.0876 5.77993 15.0423 5.58892C14.5533 3.53085 12.7032 2 10.4956 2C8.28795 2 6.43785 3.53085 5.94893 5.58892ZM18.3611 10.929C18.1635 10.929 17.9955 11.0733 17.9657 11.2687L16.9652 17.8291C16.9064 18.2149 16.5746 18.5 16.1843 18.5H8.54201C8.29746 18.5 8.11016 18.7175 8.14643 18.9593L8.32643 20.1593C8.3558 20.3552 8.52401 20.5 8.72201 20.5H18.1838C18.3814 20.5 18.5494 20.3557 18.5792 20.1603L19.9168 11.3893C19.9537 11.1471 19.7663 10.929 19.5214 10.929H18.3611ZM13.3253 5.92311C13.4548 5.92311 13.5503 5.80165 13.5097 5.67865C13.0925 4.4133 11.9007 3.5 10.4956 3.5C9.09049 3.5 7.8987 4.4133 7.48147 5.67865C7.44091 5.80165 7.53641 5.92311 7.66592 5.92311H13.3253ZM5.76286 17C5.56486 17 5.39666 16.8551 5.36729 16.6593L5.14978 15.2093C5.11351 14.9675 5.30081 14.75 5.54536 14.75H15.4518C15.6968 14.75 15.8842 14.9681 15.8473 15.2103L15.6261 16.6603C15.5963 16.8557 15.4283 17 15.2307 17H5.76286ZM16.198 12.9103C16.1682 13.1056 16.0002 13.25 15.8026 13.25H5.20036C5.00236 13.25 4.83415 13.1051 4.80478 12.9093L4.05075 7.88244C4.01448 7.6406 4.20178 7.42311 4.44633 7.42311H16.5692C16.8141 7.42311 17.0015 7.64127 16.9646 7.88341L16.198 12.9103Z"></path></svg>
<span>
        <font>生鮮雜貨</font>
    </span>
</button>
<button class="deliverybutton">
    <svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.13514 3C9.35174 3 11.161 4.74406 11.2655 6.93478L11.2703 7.13514V9.08108C11.2703 10.5608 10.493 11.8591 9.32448 12.5897L9.32432 18.8108C9.32432 20.0199 8.34419 21 7.13514 21C5.97646 21 5.02802 20.0998 4.951 18.9607L4.94595 18.8108L4.94675 12.5903C3.83922 11.8982 3.08295 10.6964 3.00641 9.31322L3 9.08108V7.13514C3 4.85136 4.85136 3 7.13514 3ZM14.1892 4.45946V8.44865C14.1892 8.66359 14.3634 8.83784 14.5784 8.83784H15.7459C15.9609 8.83784 16.1351 8.66359 16.1351 8.44865V4.45946C16.1351 4.05644 16.4618 3.72973 16.8649 3.72973C17.2679 3.72973 17.5946 4.05644 17.5946 4.45946V8.44865C17.5946 8.66359 17.7688 8.83784 17.9838 8.83784H19.1514C19.3663 8.83784 19.5405 8.66359 19.5405 8.44865V4.45946C19.5405 4.05644 19.8673 3.72973 20.2703 3.72973C20.6733 3.72973 21 4.05644 21 4.45946V9.08108C21 10.5608 20.2227 11.8591 19.0542 12.5897L19.0541 18.8108C19.0541 20.0199 18.0739 21 16.8649 21C15.7062 21 14.7578 20.0998 14.6807 18.9607L14.6757 18.8108L14.6765 12.5903C13.5605 11.8929 12.8011 10.6779 12.7345 9.28143L12.7297 9.08108V4.45946C12.7297 4.05644 13.0564 3.72973 13.4595 3.72973C13.8625 3.72973 14.1892 4.05644 14.1892 4.45946ZM7.44244 13.2001C7.32068 13.2109 7.21824 13.2162 7.13514 13.2162C7.05225 13.2162 6.95011 13.2109 6.8287 13.2002C6.61456 13.1813 6.4257 13.3397 6.40688 13.5538C6.40589 13.5652 6.40539 13.5765 6.40539 13.5879L6.40541 18.8108C6.40541 19.2138 6.73212 19.5405 7.13514 19.5405C7.50457 19.5405 7.80988 19.266 7.8582 18.9098L7.86486 18.8108L7.86578 13.5879C7.86581 13.3729 7.6916 13.1987 7.47665 13.1986C7.46523 13.1986 7.45382 13.1991 7.44244 13.2001ZM17.2054 13.2162H16.5243C16.3094 13.2162 16.1351 13.3905 16.1351 13.6054V18.8108C16.1351 19.1467 16.362 19.4295 16.6709 19.5145L16.7658 19.5339L16.8649 19.5405C17.2343 19.5405 17.5396 19.266 17.5879 18.9098L17.5946 18.8108V13.6054C17.5946 13.3905 17.4203 13.2162 17.2054 13.2162ZM7.13514 4.45946C5.71213 4.45946 4.54858 5.57031 4.46434 6.97214L4.45946 7.13514V9.08108C4.45946 10.5588 5.6574 11.7568 7.13514 11.7568C8.55814 11.7568 9.72169 10.6459 9.80593 9.24408L9.81081 9.08108V7.13514C9.81081 5.6574 8.61287 4.45946 7.13514 4.45946ZM14.7944 10.776C15.2851 11.3747 16.0304 11.7568 16.8649 11.7568C17.7256 11.7568 18.4914 11.3503 18.9809 10.7189C19.0691 10.6051 19.0483 10.4414 18.9346 10.3532C18.8889 10.3178 18.8327 10.2986 18.7749 10.2985L15.0206 10.2981C14.8591 10.2981 14.7281 10.429 14.7281 10.5906C14.7281 10.6582 14.7515 10.7237 14.7944 10.776Z"></path></svg><span>
        <font>內用</font>
    </span>
</button></div></div>
</header>
<!--將商店的資料印出-->
<div class="body">
  <h2 class="container">快速到達</h2>
</div>
<div class="container">
  <div class="flexcontainer">
    <?php $result=mysqli_query($conn, "SELECT * FROM restaurants");
        while( $row=mysqli_fetch_assoc($result) ){
          echo "<div class=item><img src='{$row["img"]}'><p>{$row["rname"]}</p> </div>";
        }
    ?>
</div></div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="index.js"></script>
  

</body>
</html>