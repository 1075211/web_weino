<?php
$content = $_POST['comment'];
$fileInfo = $_FILES["upFile"];
$a=$_POST['title'];
// 获取上传文件的名称
$fileName = $fileInfo["name"];
// 获取上传文件保存的临时路径
$filePath = $fileInfo["tmp_name"];
// 移动文件
move_uploaded_file($filePath, $_SERVER['DOCUMENT_ROOT']."/upFile/".$fileName);
$mysqli = new mysqli();
$mysqli->connect("localhost", "root", "", "weiBo");
$mysqli->set_charset("utf8");
$sql = "INSERT INTO `passage` (`ownerimg`,`passageTitle`,`owner`, `pressNum`, `date`,`passageWord`, `passageImg`) VALUES ('/upFile/content2.png','$a','lytt','0', CURRENT_TIMESTAMP, '$content', '/upFile/$fileName');";
$mysqli->query($sql); // 添加到新闻数据库
header('location:afterLogin.php');
mysqli_close($mysqli);
?>
