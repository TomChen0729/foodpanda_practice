<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<body>
    <?php
        include("connect.php");
        //login SQL
        echo '<div class="center-div" style="margin-top:80px;">';
        echo 
        '<form method="post" name="regiform" action="login2.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="60" data-testid="icon-login-password-fp"><g fill="none" fill-rule="evenodd"><path fill="#FBE7EF" d="M76.474 31.538C78.32 17.966 60.794 5.674 49.585 3.4c-11.14-2.273-28.983-.818-40.866 13.713C-3.2 31.611-1.071 50.297 4.32 55.625c5.392 5.327 10.78 5.252 19.121.248 8.336-5.01 21.638-7.034 37.068-8.066 15.47-.994 15.965-16.269 15.965-16.269"></path><path fill="#D70F64" d="M38.46 12.775c-.586-4.421-4.655-7.54-9.07-6.952-4.414.587-7.528 4.662-6.941 9.082l2.146 16.174 16.011-2.131-2.146-16.173zM17.753 15.53c-.93-7.013 4.01-13.478 11.014-14.41a12.716 12.716 0 019.475 2.53 12.751 12.751 0 014.914 8.5l2.77 20.876-25.403 3.38-2.77-20.876z"></path><path fill="#D70F64" d="M20.132 55.43l32.473-4.322a4.371 4.371 0 003.753-4.91l-3.455-26.044a4.245 4.245 0 00-4.766-3.653l-32.715 4.353a4.249 4.249 0 00-3.648 4.773l3.455 26.044a4.367 4.367 0 004.903 3.758"></path><path fill="#5D93CF" d="M41.167 11.769c-.587-4.421-4.656-7.54-9.07-6.952-4.414.587-7.528 4.661-6.942 9.082l2.146 16.174 16.011-2.131-2.145-16.173zM20.46 14.524C19.53 7.51 24.47 1.046 31.473.114a12.716 12.716 0 019.476 2.53 12.751 12.751 0 014.913 8.5l2.77 20.876-25.403 3.38-2.77-20.876z"></path><path fill="#93B7DF" d="M21.922 52.66l32.473-4.321a4.371 4.371 0 003.752-4.91l-3.455-26.044a4.245 4.245 0 00-4.766-3.654l-32.715 4.354a4.249 4.249 0 00-3.648 4.773L17.02 48.9a4.367 4.367 0 004.903 3.759"></path><path fill="#276FBF" d="M32.295 29.65a4.19 4.19 0 013.586-4.716 4.186 4.186 0 014.71 3.59 4.192 4.192 0 01-1.52 3.825l1.749 8.208-5.714.775-.37-8.418a4.188 4.188 0 01-2.44-3.264"></path><path fill="#5D93CF" d="M62.519 35.961l.623-1.684-4.938-1.585-1.346.486-1.37-.44-.002-.001-2.53-.812a.253.253 0 00-.32.164l-.203.635-3.735-1.207a.263.263 0 01-.17-.33l.184-.573a.207.207 0 00-.133-.26l-2.102-.675a.512.512 0 00-.446.064l-2.32 1.576-.794.538a.544.544 0 00.138.969l22.034 7.239.951-2.973-3.521-1.13z"></path><path fill="#276FBF" d="M63.341 37.787l-.23.719-20.194-6.649.793-.538z"></path><path fill="#5D93CF" d="M76.244 41c-1.281 4.003-5.56 6.207-9.555 4.924-3.997-1.282-6.198-5.567-4.917-9.569 1.28-4.002 5.559-6.207 9.555-4.924 3.996 1.283 6.198 5.567 4.917 9.57"></path><path fill="#276FBF" d="M74.752 40.47a6.052 6.052 0 01-7.613 3.923 6.064 6.064 0 01-3.917-7.623 6.052 6.052 0 017.613-3.923 6.064 6.064 0 013.917 7.624"></path><path fill="#FBE7EF" d="M72.704 39.538a1.133 1.133 0 11-2.158-.692 1.133 1.133 0 112.158.692"></path></g></svg>
        <h4 style="margin-top: 20px"><strong>歡迎回來！</strong></h4>
            <p style="margin-top: 20px"><font size=3 color=gray>請輸入密碼登入。我們也可以將登入連結寄到你的email信箱。</font></p>
            <p style="margin-top: 20px">'.$_SESSION['useremail'].'</p>
            <div class="input-container">
                <input type="password" class="input-box" value="" name="password" id="password1" onkeyup="updatePasswordIndicator()" oninput="checkPasswordStrength()" required>
                <div class="placeholder-wrap2">密碼</div>
            </div>
            <div style="margin-bottom: 20px">
            <a href="#" ><font color=#FF0080><strong>忘記密碼?</strong></font></a>
            </div>
            <div>
                <button class="button1c1" type="submit" value="登入" id="submitButton" style="margin-bottom: 20px" disabled>
                <font color=white><strong>使用密碼登入</strong></font>
                </button>
            </div>
        </form>';
        echo '<a href="javascript:void(0)"><button class="button2" type="submit" value="登入連結" id="sendButton" style="margin-bottom: 20px" onclick="sentemail();">
              <font color=#FF0080><strong>將登入連結寄給我</strong></font>
              </button></a>';
        echo '</div>';
        echo '<script>
              var xmlHTTP;
              function $_xmlHttpRequest()
                    {   
                        if(window.ActiveXObject)
                        {
                            xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        else if(window.XMLHttpRequest)
                        {
                            xmlHTTP=new XMLHttpRequest();
                        }
                    }
              function sentemail(){
                   var useremail = "<?php echo $usermail; ?>";
                        $_xmlHttpRequest();
                        xmlHTTP.open("GET","emailtest.php?useremail"+useremail,true);
                        xmlHTTP.onreadystatechange = function() {
                              if (xmlHTTP.readyState === 4 && xmlHTTP.status === 200) {
                                  var response = xmlHTTP.responseText;
                                  alert(response);
                              }
                          };
                        xmlHTTP.send();
                      }
                    </script>';
    ?>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
  const password1 = document.getElementById('password1');
  const password1Placeholder = document.querySelector('.placeholder-wrap2');
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

  const submitButton = document.getElementById('submitButton');

  password1.addEventListener('input', () => {
    if (password1.value.trim() !== '') {
      submitButton.classList.add('enabled');
      submitButton.removeAttribute('disabled');
    } else {
      submitButton.classList.remove('enabled');
      submitButton.setAttribute('disabled', 'true');
    }
  });
</script>
</body>
</html>