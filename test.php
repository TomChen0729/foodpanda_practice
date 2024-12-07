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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div style="float: left;">
    <a class="navbar-brand" href="index.php"><img src="./images/logo.png">
  </a>
  </div>
    <div style="float: right;" id="navbarSupportedContent" >
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">切換語言</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#"><img src="./images/login.png"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-disabled="true">購物車</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
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
    <input type="submit" class="form-control" value="送出資料">
</form>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>