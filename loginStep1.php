<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <title>將你最喜歡餐廳的美味餐點快速送到您手上－foodpanda</title>
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

      .input-box:focus + .placeholder-wrap,
      .input-box:not(:placeholder-shown) + .placeholder-wrap {
        top: 0;
        font-size: 10px;
        color: #000;
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

<div class="center-div" style="margin-top:250px;">
    <form action="emailverify.php" method="post">
        <svg xmlns="http://www.w3.org/2000/svg" width="78" height="60" data-testid="icon-login-email-fp"><g fill="none" fill-rule="evenodd"><path fill="#FBE7EF" d="M.137 30.733C-1.74 44.425 16.084 56.826 27.485 59.12c11.329 2.293 29.476.825 41.562-13.835 12.12-14.625 9.957-33.476 4.474-38.851-5.484-5.375-10.964-5.298-19.447-.25-8.478 5.053-22.007 7.096-37.699 8.137C.642 15.323.137 30.733.137 30.733"></path><path fill="#D70F64" d="M9.649 17.349L40.18 2l28.5 18.754z"></path><path fill="#D70F64" d="M9.65 17.2l26.584 18.102 3.946.227 28.5-14.934L9.65 17.2z"></path><path fill="#DFEAF6" d="M59.206 55.162l-44.33-2.554 2.746-47.434L23.444 0 62.27 2.237l-3.064 52.925z"></path><path fill="#BED3EB" d="M7.237 53.715L35.947 35.2l3.947.226 26.374 21.675z"></path><path fill="#93B7DF" d="M9.776 17.2l26.716 18.158L7.639 53.979zM68.677 20.8L40.206 35.781l26.347 21.798z"></path><path fill="#5D93CF" d="M17.691 5.041l5.68.886L23.713 0z"></path><path fill="#D70F64" fill-rule="nonzero" d="M40.617 10.842c.311.277.554.62.73 1.027.175.408.263.88.263 1.417 0 .35-.034.65-.101.9a2.18 2.18 0 01-.264.625 1.056 1.056 0 01-.371.362.879.879 0 01-.425.115c-.144 0-.918 1.208-.54 1.208.135 0 .303-.015.506-.047.202-.03.414-.087.634-.167.221-.081.442-.197.662-.35.22-.152.419-.349.594-.59.176-.242.32-.538.432-.887.113-.35.169-.761.169-1.236 0-.707-.137-1.336-.412-1.887a4.268 4.268 0 00-1.087-1.39c-.45-.376-1.1.622-.79.9z"></path><path fill="#D70F64" fill-rule="nonzero" d="M34.616 12.292c.18-.465.434-.868.763-1.209.329-.34.722-.604 1.181-.792a3.989 3.989 0 011.526-.282c.513 0 .986.07 1.418.208.432.139.803.347 1.113.625.311.277 1.24-.524.79-.9-.45-.376-.96-.66-1.532-.853a5.443 5.443 0 00-1.748-.289 5.256 5.256 0 00-3.646 1.437 4.94 4.94 0 00-1.107 1.585c-.27.61 1.062.936 1.242.47z"></path><path fill="#D70F64" fill-rule="nonzero" d="M38.208 18.793c.828 0 1.604-.172 2.328-.517a4.761 4.761 0 001.816-1.51h-1.485c-.333.259-.713.46-1.14.604a4.418 4.418 0 01-1.411.214 4.639 4.639 0 01-1.58-.261 3.736 3.736 0 01-1.262-.746 3.331 3.331 0 01-.83-1.182c-.199-.466-.298-.994-.298-1.585 0-.546.09-1.052.27-1.518.18-.465-.972-1.079-1.242-.47a4.848 4.848 0 00-.405 1.988c0 .725.137 1.395.412 2.008.274.614.65 1.14 1.127 1.578a5.232 5.232 0 001.668 1.028c.634.246 1.311.37 2.032.37z"></path><path fill="#D70F64" fill-rule="nonzero" d="M38.74 11.392c-.238-.116-.537-.174-.897-.174-.423 0-.801.083-1.134.248-.333.166-.614.39-.844.672-.23.282-.407.604-.533.967a3.433 3.433 0 00-.19 1.135c0 .331.048.636.143.913.094.278.227.515.398.712.17.197.376.352.614.464.239.112.502.167.79.167.432 0 .783-.076 1.053-.228a3.13 3.13 0 00.675-.497h.027c.01.18.137-4.262-.101-4.379z"></path><path fill="#D70F64" fill-rule="nonzero" d="M40.449 15.288c-.144 0-.241-.038-.29-.115a.47.47 0 01-.075-.261c0-.126.014-.274.04-.444.028-.17.055-.318.082-.443l.5-2.646h-1.27l-.108.604h-.027c-.135-.277-.322-.474-.56-.59-.239-.117-.106 4.557.074 4.378.081.23.176.396.284.497.162.152.432.228.81.228.135 0 .684-1.208.54-1.208z"></path><path fill="#DFEAF6" fill-rule="nonzero" d="M37.503 15.156a.906.906 0 01-.458-.104.774.774 0 01-.278-.265 1.09 1.09 0 01-.14-.369 2.188 2.188 0 01-.04-.414c0-.448.12-.828.359-1.138.239-.31.562-.466.969-.466.336 0 .583.112.743.336.159.225.239.51.239.854 0 .181-.02.365-.06.55-.04.186-.113.354-.22.505a1.19 1.19 0 01-.43.368c-.182.095-.41.143-.684.143z"></path></g></svg>
        <h4><strong>你的email是?</strong></h4>
        <p><font color=#8E8E8E>我們將確認你是否已擁有帳戶</font></p>
        <div class="input-container">
          <input type="email" class="input-box" value="" name="email" id="emailInput" required>
          <div class="placeholder-wrap">電子郵件</div>
        </div>

        <div>
          <button class="button1c1" id="submitButton" style="margin-bottom: 20px" disabled>
          <font color=white><strong>繼續</strong></font>
          </button>
        </div>

    </form>
    
  </p>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
  const emailInput = document.getElementById('emailInput');
  const placeholderWrap = document.querySelector('.placeholder-wrap');

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

</body>
</html>