<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Button Bottom Border Animation</title>
    <style>
        /* 定义按钮的初始样式 */
.animated-button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    position: relative;
}

/* 定义底部边框样式 */
.animated-button::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px; /* 底线高度 */
    background-color: #ff6347; /* 底线颜色 */
    transform: scaleX(0); /* 初始时线的宽度为0，没有显示 */
    transform-origin: left; /* 从左侧开始变化 */
    transition: transform 0.3s ease; /* 添加动画效果 */
}

/* 当鼠标悬停在按钮上时，显示底线 */
.animated-button:hover::before {
    transform: scaleX(1); /* 放大底线的宽度 */
}
    </style>
</head>
<body>
    <button class="animated-button">Hover me</button>
</body>
</html>