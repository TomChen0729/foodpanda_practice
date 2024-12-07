<?php
include("connect.php");
session_start();
?>
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
      /* 整個搜尋區塊的容器 */
  .search-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 576px;
    height: 64px; /* 設置整體高度為 64px */
    margin-top: 100px;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: white;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  }

  /* 左側的搜尋框區塊 */
  .left-box {
    width: 431.2px;
    display: flex;
    align-items: center;
    padding: 8px;
    border-right: 1px solid #ccc; /* 加入右側分隔線 */
  }

  /* 搜尋圖標的樣式 */
  .search-icon {
    padding: 0 8px;
  }

  /* 搜尋輸入框的樣式 */
  .search-input {
    border: none;
    outline: none;
    font-size: 16px;
    flex-grow: 1;
  }

  /* 右側的篩選區塊 */
  .right-box {
    width: 144.8px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px;
  }

  /* 篩選下拉選單的樣式 */
  .filter-dropdown {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  /* 灰色分隔線的樣式 */
  .divider {
    width: 1px;
    background-color: #ccc;
    height: 100%; /* 調整分隔線高度 */
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
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == ""){
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
<!--Content-->
<div class="container">
<div class="container" style="max-width: 576px; float: left">
    <!-- 整個搜尋區塊的容器 -->
  <div class="search-container">
    <!-- 左側的搜尋框區塊 -->
    <div class="left-box">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20.4989485,19.7847749 L19.7848083,20.4989151 L14.464571,15.1786777 C11.9860659,17.2743894 8.29591013,17.0430407 6.09855923,14.6541653 C3.90118417,12.2652635 3.97833814,8.56861232 6.27347523,6.27347523 C8.56861232,3.97833814 12.2652635,3.90118417 14.6541653,6.09855923 C17.04296,8.29583589 17.2743738,11.9858166 15.1782471,14.4650787 L20.4989485,19.7847749 Z M14.415008,13.8189639 C16.164669,11.7497903 15.9715459,8.66902636 13.9771779,6.83455387 C11.9828099,5.00008139 8.89667087,5.06449316 6.98058201,6.98058201 C5.06449316,8.89667087 5.00008139,11.9828099 6.83455387,13.9771779 C8.66902636,15.9715459 11.7497903,16.164669 13.8176685,14.4161071 L14.1437265,14.138492 L14.415008,13.8189639 Z"></path></svg>
      <input type="text" class="search-input" placeholder="搜尋餐廳、料理或菜餚">
    </div>
    <!-- 灰色分隔線 -->
    <div class="divider"></div>
    <!-- 右側的篩選區塊 -->
    <div class="right-box">
      <select class="filter-dropdown">
        <option value="all">全部</option>
        <option value="category1">分類1</option>
        <option value="category2">分類2</option>
        <option value="category3">分類3</option>
      </select>
    </div>
  </div>
</div>
</div>


<script src="js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("getLocationBtn").addEventListener("click", getLocation);

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
</body>
</html>