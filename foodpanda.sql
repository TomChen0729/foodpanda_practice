-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-08-30 08:28:07
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `foodpanda`
--
CREATE DATABASE IF NOT EXISTS `foodpanda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `foodpanda`;

-- --------------------------------------------------------

--
-- 資料表結構 `cartitems`
--
-- 建立時間： 2023-08-30 05:47:53
--

DROP TABLE IF EXISTS `cartitems`;
CREATE TABLE `cartitems` (
  `cartid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增資料前，先清除舊資料 `cartitems`
--

TRUNCATE TABLE `cartitems`;
-- --------------------------------------------------------

--
-- 資料表結構 `cf`
--
-- 建立時間： 2023-08-22 16:40:07
--

DROP TABLE IF EXISTS `cf`;
CREATE TABLE `cf` (
  `id` int(11) NOT NULL,
  `cfname` char(25) NOT NULL,
  `cflink` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增資料前，先清除舊資料 `cf`
--

TRUNCATE TABLE `cf`;
--
-- 傾印資料表的資料 `cf`
--

INSERT INTO `cf` (`id`, `cfname`, `cflink`, `cid`) VALUES
(1, '披薩外送', 'https://www.foodpanda.com.tw/cuisine/pizza-delivery-taipei', 1),
(2, '壽司外送', 'https://www.foodpanda.com.tw/cuisine/sushi-delivery-taipei', 1),
(3, '印度料理', 'https://www.foodpanda.com.tw/cuisine/indian-delivery-taipei', 1),
(4, '中式料理', 'https://www.foodpanda.com.tw/cuisine/chinese-delivery-taipei', 1),
(5, '素食料理', 'https://www.foodpanda.com.tw/cuisine/vegetarian-delivery-taipei', 1),
(6, '中式料理', 'https://www.foodpanda.com.tw/cuisine/chinese-delivery-new-taipei', 2),
(7, '美式料理', 'https://www.foodpanda.com.tw/cuisine/american-delivery-new-taipei', 2),
(8, '日本料理', 'https://www.foodpanda.com.tw/cuisine/japanese-delivery-new-taipei', 2),
(9, '飲料外送', 'https://www.foodpanda.com.tw/cuisine/beverages-delivery-new-taipei', 2),
(10, '麵包蛋糕', 'https://www.foodpanda.com.tw/cuisine/bakery-cake-delivery-new-taipei', 2),
(11, '中式料理', 'https://www.foodpanda.com.tw/cuisine/chinses-delivery-kaohsiung', 10),
(12, '美式料理', 'https://www.foodpanda.com.tw/cuisine/american-delivery-kaohsiung', 10),
(13, '日本料理', 'https://www.foodpanda.com.tw/cuisine/japanese-delivery-kaohsiung', 10),
(14, '麵包蛋糕', 'https://www.foodpanda.com.tw/cuisine/bakery-cake-delivery-kaohsiung', 10),
(15, '飲料外送', 'https://www.foodpanda.com.tw/cuisine/beverages-delivery-kaohsiung-city', 10),
(16, '日本料理', 'https://www.foodpanda.com.tw/cuisine/japanese-delivery-taichung-city', 3),
(17, '中式料理', 'https://www.foodpanda.com.tw/cuisine/chinese-delivery-taichung', 3),
(18, '義式料理', 'https://www.foodpanda.com.tw/cuisine/italian-delivery-taichung', 3),
(19, '亞洲料理', 'https://www.foodpanda.com.tw/cuisine/asian-delivery-taichung', 3),
(20, '飲料外送', 'https://www.foodpanda.com.tw/cuisine/beverages-delivery-taichung', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `city`
--
-- 建立時間： 2023-08-22 16:40:07
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `plink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增資料前，先清除舊資料 `city`
--

TRUNCATE TABLE `city`;
--
-- 傾印資料表的資料 `city`
--

INSERT INTO `city` (`cid`, `cname`, `plink`) VALUES
(1, '台北市', 'https://pgw.udn.com.tw/gw/photo.php?u=https://uc.udn.com.tw/photo/2020/06/07/99/7997558.jpg&x=0&y=0&sw=0&sh=0&sl=W&fw=800&exp=3600'),
(2, '新北市', 'https://newtaipei.travel/content/images/attractions/48208/1024x768_attractions-image-qejyhdnlokma5y4kp4gd6q.jpg'),
(3, '台中市', 'https://cw-image-resizer.cwg.tw/resize/uri/https%3A%2F%2Fcw1.tw%2FCW%2Fimages%2Farticle%2F201704%2Farticle-58ef4deeeae4c.jpg/?w=1600&format=webp'),
(4, '台南市', 'https://cc.tvbs.com.tw/img/program/upload/2022/04/26/20220426163233-3c208786.jpg'),
(5, '台東市', 'https://cdntwrunning.biji.co/800_490e80f7688e9f0201394c15f7f9e1ea.png'),
(6, '彰化市', 'https://www.tromnimedia.com/FileUploads/ArticlePhoto/20220224033601596.jpg'),
(7, '嘉義市', 'https://photo.settour.com.tw/900x600/https%3A%2F%2Fwww.settour.com.tw%2Fss_img%2FGRT%2F0000%2F0044%2F75%2Fori_32730830.jpg'),
(8, '新竹市', 'https://www.funtime.com.tw/blog/wp-content/uploads/2018/02/105987209_279432210136868_4839236566234973087_n-700x464.jpg'),
(9, '花蓮市', 'https://kuokuo.tw/wp-content/uploads/20210814165729_24.jpg'),
(10, '高雄市', 'https://cdn2.veltra.com/ptr/20170621083856_1353685874_10964_0.jpg'),
(11, '基隆市', 'https://cdn2.ettoday.net/images/6342/d6342832.jpg'),
(12, '金門縣', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/08/c1/cc/68/caption.jpg?w=1200&h=-1&s=1'),
(13, '苗栗市', 'https://9968c6ef49dc043599a5-e151928c3d69a5a4a2d07a8bf3efa90a.ssl.cf2.rackcdn.com/1182555.jpeg'),
(14, '南投市', 'https://lohanpush.files.wordpress.com/2022/11/20221001-7869.jpg?w=1600&h=1068'),
(15, '澎湖縣', 'https://s3-ap-northeast-1.amazonaws.com//mandarin-officialweb-bkt/images/content/7e96e8f39f47c00349921a691f454a9201905071058571991.jpg'),
(16, '屏東縣', 'http://pica.nidbox.net/6/y1378628378_00e03c66_6.jpg'),
(17, '桃園市', 'https://img.ltn.com.tw/Upload/news/600/2021/02/19/3443349_1_1.jpg'),
(18, '宜蘭縣', 'https://pic.pimg.tw/car0126/1561374166-541906473.jpg'),
(19, '雲林縣', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/%E5%8C%97%E6%B8%AF%E6%9C%9D%E5%A4%A9%E5%AE%AE%E5%A4%9C%E6%99%AF--%E5%BC%B5%E5%88%A9%E8%81%B0jpg.jpg/800px-%E5%8C%97%E6%B8%AF%E6%9C%9D%E5%A4%A9%E5%AE%AE%E5%A4%9C%E6%99%AF--%E5%BC%B5%E5%88%A9%E8%81%B0jpg.jpg?20190930033716');

-- --------------------------------------------------------

--
-- 資料表結構 `country`
--
-- 建立時間： 2023-08-22 16:40:07
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `clink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增資料前，先清除舊資料 `country`
--

TRUNCATE TABLE `country`;
-- --------------------------------------------------------

--
-- 資料表結構 `dishes`
--
-- 建立時間： 2023-08-30 06:20:57
-- 最後更新： 2023-08-30 06:27:44
--

DROP TABLE IF EXISTS `dishes`;
CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `menuname` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pirce` int(11) NOT NULL,
  `img` char(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增資料前，先清除舊資料 `dishes`
--

TRUNCATE TABLE `dishes`;
--
-- 傾印資料表的資料 `dishes`
--

INSERT INTO `dishes` (`id`, `rid`, `menuname`, `description`, `pirce`, `img`) VALUES
(1, 1, '蒜香拉麵 (添加新鮮生蒜)', '拉麵皆5樣配菜（玉米筍、豆芽菜、木耳絲、海帶芽、紅蘿蔔絲）、海苔一片、叉燒一片', 108, ''),
(2, 1, '豚骨拉麵', '拉麵皆5樣配菜（玉米筍、豆芽菜、木耳絲、海帶芽、紅蘿蔔絲）、海苔一片、叉燒一片', 108, ''),
(3, 2, '招牌鍋貼', '10 顆。豬肉原產地: 台灣, 丹麥, 西班牙。本店不使用萊克多巴胺肉品。', 86, ''),
(4, 2, '韓式辣味鍋貼', '10 顆(小辣)。豬肉原產地: 台灣, 丹麥, 西班牙。本店不使用萊克多巴胺肉品。', 88, ''),
(5, 3, '總匯飯捲', '推薦 | 肉鬆、小黃瓜、高麗菜、美乃滋、玉米、火腿、鮪魚、起司', 80, ''),
(6, 3, '照燒雞肉飯捲', '肉品原產地：台灣雞肉 | 推薦 | 肉鬆、小黃瓜、高麗菜、美乃滋、照燒雞肉', 85, ''),
(7, 5, '台東洛神花茶', 'L | 甜度固定', 50, ''),
(8, 5, '初鹿鮮奶茶', '台東的驕傲─初鹿鮮奶，以100%的優質生乳製造，口感清爽不黏稠，散發自然乳香和獨特香醇風味', 60, ''),
(9, 4, '東京豚骨拉麵', '台灣豬', 139, ''),
(10, 4, '九州地獄拉麵', '含牛油成份 小辣', 149, '');

-- --------------------------------------------------------

--
-- 資料表結構 `permissions`
--
-- 建立時間： 2023-08-22 17:22:14
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增資料前，先清除舊資料 `permissions`
--

TRUNCATE TABLE `permissions`;
--
-- 傾印資料表的資料 `permissions`
--

INSERT INTO `permissions` (`pid`, `pname`) VALUES
(1, '外送員'),
(2, '一般使用者'),
(3, '管理員');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurants`
--
-- 建立時間： 2023-08-30 06:21:28
-- 最後更新： 2023-08-30 06:24:00
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `rid` int(11) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `raddress` varchar(100) NOT NULL,
  `rphone` varchar(50) NOT NULL,
  `img` char(25) CHARACTER SET utf8 NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增資料前，先清除舊資料 `restaurants`
--

TRUNCATE TABLE `restaurants`;
--
-- 傾印資料表的資料 `restaurants`
--

INSERT INTO `restaurants` (`rid`, `rname`, `raddress`, `rphone`, `img`, `cid`) VALUES
(1, '酒石拉麵(台中民權店)', '403台中市西區民權路211-1號', '04 2305 7313', '', 3),
(2, '八方雲集(台中柳川店)', '406台中市中區民族路180號', '04 2223 2283', '', 3),
(3, '弄米手作飯捲 (台中梅川店)', '404台中市北區梅川東路三段161號', '04 2207 8199', '', 3),
(4, '九湯屋日式拉麵 (台東中華店)', '950台東縣台東市中華路一段536號', '08 933 3453', '', 5),
(5, '叮哥茶飲 (台東新生店)', '950台東縣台東市新生路649號', '08 923 3796', '', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--
-- 建立時間： 2023-08-22 17:36:18
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `lastname` char(50) NOT NULL,
  `firstname` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表新增資料前，先清除舊資料 `users`
--

TRUNCATE TABLE `users`;
--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`uid`, `lastname`, `firstname`, `email`, `password`, `pid`) VALUES
(6, 'Chen', 'Tom', 'tom98075@gmail.com', 'tom98075', 2),
(7, 'Tom', 'Chen', '98075tom@gmail.com', 'tom98075', 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cartitems`
--
ALTER TABLE `cartitems`
  ADD KEY `uid` (`uid`),
  ADD KEY `rid` (`rid`),
  ADD KEY `id` (`id`);

--
-- 資料表索引 `cf`
--
ALTER TABLE `cf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- 資料表索引 `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- 資料表索引 `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rid` (`rid`);

--
-- 資料表索引 `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`pid`);

--
-- 資料表索引 `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `cid` (`cid`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `pid` (`pid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cf`
--
ALTER TABLE `cf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `permissions`
--
ALTER TABLE `permissions`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `cartitems_ibfk_4` FOREIGN KEY (`rid`) REFERENCES `restaurants` (`rid`),
  ADD CONSTRAINT `cartitems_ibfk_5` FOREIGN KEY (`id`) REFERENCES `dishes` (`id`);

--
-- 資料表的限制式 `cf`
--
ALTER TABLE `cf`
  ADD CONSTRAINT `cf_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `city` (`cid`);

--
-- 資料表的限制式 `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `restaurants` (`rid`);

--
-- 資料表的限制式 `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `city` (`cid`);

--
-- 資料表的限制式 `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `permissions` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
