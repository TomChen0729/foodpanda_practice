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
        background-image:url('./images/join-background.jpg');
        background-repeat:no-repeat;
        background-attachment:fixed;
        z-index: -1;
      }
      header{
        height:66px;
        float:center;
        background-color: white;
      }
      .headlogo{
        float:left;
        margin-left:15px;
      }
      .changelang{
        float:right;
        margin-top: 20px;
        margin-right: 40px;
      }
      .headhref:link{
        color:black;
        text-decoration:none;
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
      footer{
        height: 400px;
      }
      .icon-container{
        float: right;
      }
    </style>
</head>
<body>
<!--標頭檔-->
<header >
        <div class="headlogo">
            <img src="./images/logo-foodpanda.png" style="margin:15.99px; height:34.02px; width:181px;">
        </div>
      <div class="changelang">
        <a class="headhref" href="#"><font color=black size="1">EN</font></a><font color=black size="1"> | </font><a class="headhref" href="#"><font color=black size="1">中文</font></a>
      </div>
</header>
<div class="container" style="display:flex;justify-content: space-between;">
      <div class="titlelabel">
        <h1><b><font color=white>成為我們合作商家，讓更多人享用到您的美味餐點與生鮮雜貨！</font></b></h1>
        <p><font color=white size=3>我們渴望生活中最美好的事物：探索城市，為我們的顧客帶來第一口美食。</font></p>
        <p><font color=white size=3>foodpanda 為新時代開啟便利、高品質的生活，致力於優質與快速的外送服務，讓更多人體驗您所提供的商品，傳遞更多幸福的時刻。</font></p>
      </div>
      <div class="joinform">
      <form>
    <h3>心動不如馬上行動，成為我們的合作商家，一起跨越實體商店的限制，提高營業收入。</h3>
    <p>
    您好 ，我們是 foodpanda
    想要加入我們、與我們合作嗎？立即填寫申請表單、提供資訊，我們將儘速與您聯繫！
    商店類型：
    熟食餐廳、飲料店，請選擇【餐廳店家】
    非熟食類商品、禮品類，請選擇【生鮮雜貨店家】</p>
    <p>貴餐廳/商店名稱*</p>
    <div class="form-floating is-invalid">
    <p><input type="text" class="form-control is-invalid" aria-label="default input example" required></p>
    </div>
    <div class="invalid-feedback">
    此欄位不可為空白
    </div>
    <p>店家種類*</p>
    <p>
    <select class="form-select form-select-lg mb-3" aria-label="Large select example">
    <option selected>--無--</option>
    <option value="1">餐廳店家</option>
    <option value="2">生鮮雜貨店家</option>
    </select>
    </p>
    <p>分店數量*</p>
    <p><input class="form-control" type="text" placeholder="1" aria-label="default input example"></p>
    <p>聯絡人名字(不包含姓氏)*</p>
    <p><input class="form-control" type="text"  aria-label="default input example"></p>
    <p>聯絡人姓氏*</p>
    <p><input class="form-control" type="text"  aria-label="default input example"></p>
    <p>聯絡電話*</p>
    <p><input type="email" class="form-control"  placeholder="name@example.com" value="+886"></p>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">電子郵件*</label>
    <p><input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"></p>
    </div>
    <p>菜單/商品清單附件(僅供審核參考)*</p>
    <div class="input-group mb-3">
    <input type="file" class="form-control" id="inputGroupFile01">
    </div>
    <p>商家地址*</p>
    <div class="form-floating is-invalid">
    <p><input type="text" class="form-control is-invalid" aria-label="default input example" required></p>
    </div>
    <div class="invalid-feedback">
    此欄位不可為空白
    </div>
    <input type="submit" class="form-control" value="送出資料" style="background-color:#FF0080;color:white;border-radius:0px;">
</form>
      </div>
</div>
<!-- -->
<br>
<div class="howtojoin">
    <div class="container" style="text-align:center;padding-left:200px; padding-right:200px;">
        <h4>如何加入?</h4>
        <div class="contents" style="display:flex;justify-content: space-between;margin-top:50px;">
        <div class="cont1">
                    <img src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/icon-step-a.svg">
                    <div class="card-body" style="margin-top:50px">
                        <h5>第一步:</h5>
                        <h5>簽訂合約</h5>
                    </div>
            </div>
            <div class="cont1">
                    <img src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/icon-step-b.svg">
                    <div class="card-body" style="margin-top:50px">
                        <h5>第二步:</h5>
                        <h5>資訊建置</h5>
                    </div>
            </div>
            <div class="cont1">
                    <img src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/icon-step-c.svg">
                    <div class="card-body" style="margin-top:50px">
                        <h5>第三步:</h5>
                        <h5>商家上線</h5>
                    </div>
            </div>
            <div class="cont1">
                    <img src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/icon-step-d.svg">
                    <div class="card-body" style="margin-top:50px">
                        <h5>第四步:</h5>
                        <h5>開始接單</h5>
                    </div>
            </div>
        </div>
    </div>
</div>
<div class="contents2" style="display:flex;">
    <div class="main" style="height:400px;">
        <img src="./images/bg_checklist-min.jpg" >
    </div>
    <div class="side" style="background-color:#FF0080;width:100%;padding:30px;height:400px;">
        <ul style="list-style:none;">
            <li>
                <h2><font color=white>加入 foodpanda 您可以</font></h2>
            </li>
            <li>
                <div style="display:flex;">
                    <div style="width:30px"></div>
                    <div>
                        <h2><font color=white>增加營業額</font></h2>
                        <p><font color=white>突破實體商家營收限制，拓展網路新市場。</font></p> 
                    </div>
                </div>
            </li>
            <li>
            <div style="display:flex;">
                    <div style="width:30px"></div>
                    <div>
                        <h2><font color=white>提高能見度</font></h2>
                        <p><font color=white>foodpanda 市佔率 79.6% 稱霸市場，為您觸及新客群。</font></p>
                    </div>
                </div>
            </li>
            <li>
            <div style="display:flex;">
                    <div style="width:30px"></div>
                    <div>
                        <h2><font color=white>彈性化管理</font></h2>
                        <p><font color=white>專屬商家的管理系統，迅速調整您管理的商家庶務。</font></p>
                    </div>
                </div>
            </li>
        </ul>
        
    </div>
</div>
<div class="howtojoin">
    <div class="container" style="text-align:center;padding-left:200px; padding-right:200px;">
        <h4>如何加入?</h4>
        <div class="contents" style="display:flex;justify-content: space-between;margin-top:50px;">
            <div class="cont1">
                    <img class="stepimg" src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/icon-peya-step-1.svg">
                    <div class="card-body" style="margin-top:50px">
                        <p>第一步：消費者下單</p>
                        <p>消費者透過 foodpanda 找到您的商家並下訂單。</p>
                    </div>
            </div>
            <div class="cont1">
                    <img class="stepimg" src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/icon-peya-step-2.svg">
                    <div class="card-body" style="margin-top:50px">
                        <p>第二步：商家準備</p>
                        <p>接收到訂單，並準備商品。</p>
                    </div>
            </div>
            <div class="cont1">
                    <img class="stepimg" src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/icon-peya-step-3.svg">
                    <div class="card-body" style="margin-top:50px">
                        <p>第三步：配送訂單</p>
                        <p>外送夥伴至商家領取商品，並送達至消費者手上。</p>
                    </div>
            </div>
            <div class="cont1">
                    <img class="stepimg" src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/icon-peya-step-4.svg">
                    <div class="card-body" style="margin-top:50px">
                        <p>第四步：查看訂單</p>
                        <p>透過接單系統，您可查看過往的商家訂單資訊。</p>
                    </div>
            </div>
        </div>
        <div style="margin-top:50px;">
            <input type="button" value="立即加入" onclick="location.href='#'" style="color: white;border-radius: 0px;background-color:#FF0080;border:none;width:300px;height:40px;font-size:20px;">
        </div>
    </div>
</div>
<footer style="background-color:black;padding:50px;padding-left:200px; width: auto; height: 400px ">
    <div class="container">
        <div>
        <div style="width:100px;margin:20px;">
            <img src="https://partner.foodpanda.com.tw/resource/1685457535000/FoodpandaResource/FoodpandaResource/images/logo-foodpanda.svg">
        </div>
        <div style="width:100px;margin:20px;">
            <font color=white size=2>合作商家專區</font>
        </div>
        <div style="width:100px;margin:20px;">
            <font color=white size=2>服務條款</font>
        </div>
        <div style="width:100px;margin:20px;">
            <font color=white size=2>隱私權條款</font>
        </div>
        </div>
        <div class="icon-container">
            <p><font size=1 color=gray>社群媒體</font><br>
            <a href=""><img src="./images/fbicon.png"></a>
            <a href=""><img src="./images/igicon.png"></a>
            <a href=""><img src="./images/lineicon.png" style="width: 50px; height: 50px;"></a>
            </p>
        </div>
    </div>
    </div>
      
</footer>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>