-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2022-12-30 05:31:17
-- 服务器版本： 8.0.31
-- PHP 版本： 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `weiBo`
--

-- --------------------------------------------------------

--
-- 表的结构 `myuser`
--

CREATE TABLE `myuser` (
  `id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(25) NOT NULL,
  `number` int NOT NULL,
  `picture` varchar(25) NOT NULL,
  `fansNum` int NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `myuser`
--

INSERT INTO `myuser` (`id`, `username`, `password`, `phone`, `number`, `picture`, `fansNum`, `type`) VALUES
(1, 'lytt', 'c4ca4238a0b923820dcc509a6f75849b', '15170167790', 1, '/upFile/2.jpg', 1, '普通用户'),
(2, 'user1', 'c4ca4238a0b923820dcc509a6f75849b', '15170167790', 1, '/upFile/1.jpg', 1, '普通用户'),
(3, 'user2', 'c4ca4238a0b923820dcc509a6f75849b', '15170167790', 1, '/upFile/2.jpg', 1, '普通用户'),
(4, '俄勒冈州', 'c4ca4238a0b923820dcc509a6f75849b', '15170167790', 1, '/upFile/content3.png', 1, '普通用户'),
(5, 'lyut', 'c4ca4238a0b923820dcc509a6f75849b', '15170167790', 1, '/upFile/1.jpg', 1, '普通用户'),
(6, '央视新闻', 'c4ca4238a0b923820dcc509a6f75849b', '15170167790', 1, '/upFile/2.jpg', 1, '普通用户'),
(7, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '15170167790', 1, '/upFile/1.jpg', 1, '管理员'),
(20, '10001', 'c4ca4238a0b923820dcc509a6f75849b', '15170167790', 0, '/upFile/1.jpg', 0, '管理员');

-- --------------------------------------------------------

--
-- 表的结构 `passage`
--

CREATE TABLE `passage` (
  `passageId` int NOT NULL,
  `owner` varchar(25) NOT NULL,
  `passageImg` varchar(30) NOT NULL,
  `passageWord` varchar(3000) NOT NULL,
  `pressNum` int NOT NULL,
  `likeNum` int NOT NULL,
  `date` date NOT NULL,
  `ownerimg` varchar(25) NOT NULL,
  `ownerType` varchar(25) NOT NULL,
  `passageTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `passage`
--

INSERT INTO `passage` (`passageId`, `owner`, `passageImg`, `passageWord`, `pressNum`, `likeNum`, `date`, `ownerimg`, `ownerType`, `passageTitle`) VALUES
(1, '俄勒冈州', '/upFile/content23.jpg', '近日，国家语言资源监测与研究中心、商务印书馆、光明网联合主办的“汉语盘点2022”揭晓仪式在京举行。“稳”“党的二十大”“战”“俄乌冲突”分别当选年度国内字、国内词、国际字、国际词。', 333, 222, '2022-12-22', '/upFile/content3.png', '普通用户', '疫情'),
(2, 'lyut', '/upFile/content24.jpg', '12月22日，我们迎来冬至节气，这既是二十四节气中一个重要节气，也是中国民间的传统节日。 “冬至大如年”。冬至标示着太阳新生、太阳往返运动进入新的循环，所以古人把冬至看作“大吉之日”。', 212, 12, '2022-12-22', '/upFile/1.jpg', '普通用户', '冬至'),
(3, 'lytt', '/upFile/content25.jpg', '卯门生紫气，兔岁报新春。今天，中央广播电视总台《2023年春节联欢晚会》以“欣欣向荣的新时代中国，日新月异的更美好生活”为主题，正式发布官方标识和吉祥物形象“兔圆圆”。2023年春晚主视觉标识从“兔圆圆”奔跃向上的姿态定格而来。', 1, 1, '2022-12-04', '/upFile/2.jpg', '普通用户', '新年'),
(5, '央视新闻', '/upFile/q.jpg', '今天，白鹤滩水电站全面投产，标志着世界最大清洁能源走廊在长江之上全面建成。金沙江下游乌东德、白鹤滩、溪洛渡、向家坝四座巨型电站，与长江上的葛洲坝水利枢纽、三峡工程“连珠成串”，一滴水发6次电，最大化地利用了长江流域水力资源。', 470, 2216, '2022-12-22', '/upFile/2.jpg', '普通用户', '为中国这项世界之最点赞'),
(6, 'admin', '/upFile/content131.jpg', '同济大学附属同济医院关节外科主任程飚表示，一般情况下新冠病毒会攻击人体的免疫细胞，出现免疫过度反应，造成局部粘膜受损、肌肉损伤，导致浑身肌肉酸痛。如果再加上发热，还会造成微循环里面的乳酸聚集，引起局部的疼痛。', 11, 11, '2022-12-22', '/upFile/1.jpg', '管理员', '疫情'),
(7, 'lytt', '/upFile/content211.jpg', '北京佑安医院感染综合科主任医师李侗曾表示，奥密克戎变异毒株主要是在上呼吸道，免疫细胞完成任务后也会自然代谢死亡，这些都成为我们体内的“垃圾”，#转阴后咳嗽是一个打扫战场过程#。有病时咳嗽也不一定是坏事，它能帮人把病菌从体内排出，利于病情好转。', 1, 1, '2022-12-22', '/upFile/2.jpg', '普通用户', '疫情'),
(10, 'lytt', '/upFile/content12.jpg', '①今天5时48分，迎来“冬至”节气；②这一天北半球白天最短、夜晚最长；③我国各地气候都会进入最寒冷的阶段，即常说的“进九”；④这一天，北方有吃饺子的习俗，江南则吃汤圆。#你家冬至这天吃什么#？冬至阳生春又来，冬至不只是节点，更是始点。春天不远了，一起迎接新的开始！ ​', 111, 333, '2022-12-22', '/upFile/2.jpg', '普通用户', '冬至');

-- --------------------------------------------------------

--
-- 表的结构 `press`
--

CREATE TABLE `press` (
  `passageId` int NOT NULL,
  `pressWord` varchar(3000) NOT NULL,
  `pressDate` date NOT NULL,
  `ownerimg` varchar(25) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `press`
--

INSERT INTO `press` (`passageId`, `pressWord`, `pressDate`, `ownerimg`, `owner`, `id`) VALUES
(2, '新的一年，愿平安喜乐安康', '2022-12-12', '/upFile/1.jpg', 'lyut', 3),
(1, '气氛已经烘托到这儿了…结果要去要去深圳工作\r\n回来就换成新年装饰啦 ​', '2022-12-13', '/upFile/content3.png', '俄勒冈州', 4),
(1, '新年装饰', '2022-12-22', '/upFile/content3.png', '俄勒冈州', 5);

--
-- 转储表的索引
--

--
-- 表的索引 `myuser`
--
ALTER TABLE `myuser`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `passage`
--
ALTER TABLE `passage`
  ADD PRIMARY KEY (`passageId`);

--
-- 表的索引 `press`
--
ALTER TABLE `press`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `myuser`
--
ALTER TABLE `myuser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用表AUTO_INCREMENT `passage`
--
ALTER TABLE `passage`
  MODIFY `passageId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `press`
--
ALTER TABLE `press`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
