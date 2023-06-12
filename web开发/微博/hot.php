<html>
<head>
   <title>微博 – 随时随地发现新鲜事</title>
   <meta charset="utf-8">
   <style type="text/css">
      .w{
         width:100%;
         margin:0 auto;
      }
      .button{
         background-color:dodgerblue;
		 color:white;
		 width: 100%;
		 height:50%;
		 border:0;
		 font-size: 16px;
	  }
      .w_main{
         width:45%;
         margin:0 auto;
      }
      .w_main_part{
         width:100%;
         margin:0 auto;
      }
      .header{
         background-color:white;
         height:10%;
      }
      .main {
         background-color:#222222;
		 height:90% ;
	  }
	  .main_part{
         background-color:white;
		 height:20%;
		 margin-left:0;
		 margin-top:10px;
	  }
      .nav li{
         float:left;
         list-style:none;
         padding:10px;
      }
      .nav li a{
         text-decoration:none;
         color:black;
      }
      .span a{
         padding:10px;
		 text-decoration: none;
		 color:black;
	  }
	  .anew a{
	     float: right;
		 text-decoration: none;
		 color:black;
		 color: gray;
	  }
	  .main_part a{
	     text-align:center;
	     text-decoration: none;
		 color:black;
		 position:absolute;
		 font-size: 20px;
		 padding:50px;
		 margin-top:12px;
	  }
	  .slider_center_part a{
	     text-align:center;
	     text-decoration: none;
		color:black;
		position:absolute;
		font-size: 15px;
		margin-top:20px;
		margin-left:60px;
	  }
	  .sliderLeft{
	     width:20%;
		 height:97%;
		 background-color:white;
			/* 设置绝对定位，将侧边栏固定在页面上的右边区域 */
		 position:fixed;
			/* 330像素正好将侧边栏与主体区域的顶部对齐 */
		 top:1.5%;
		 left:5%;
	  }
	  .slider_top{
	     width:20%;
		 height:15%;
		 background-color:white;
			/* 设置绝对定位，将侧边栏固定在页面上的右边区域 */
		 position:fixed;
			/* 330像素正好将侧边栏与主体区域的顶部对齐 */
		 top:1.5%;
		 left:75%;
	  }
	  .slider_center{
	     width:20%;
		 height:80%;
		 background-color:white;
			/* 设置绝对定位，将侧边栏固定在页面上的右边区域 */
		 position:fixed;
			/* 330像素正好将侧边栏与主体区域的顶部对齐 */
		 top:1.5%;
		 left:75%;
	  }
	  .slider_bottom{
	     width:15%;
		 height:15%;
		 background-color:white;
			/* 设置绝对定位，将侧边栏固定在页面上的右边区域 */
		 position:absolute;
			/* 330像素正好将侧边栏与主体区域的顶部对齐 */
		 top:100%;
		 left:75%;
	  }
   </style>
</head>
<?php
   $conn=new mysqli('localhost','root','');
   $conn->set_charset("utf8");
   $conn->select_db('weiBo');     
   $sql="select * from passage";
   echo $conn->error;
   $result=$conn->query($sql);
   $datanum=$result->num_rows;
   $row=$result->fetch_assoc();
?>

<body bgcolor="#222222">
   <div class="main w_main">
      <div class="main_part w_main_part">
         <?php
            $total=array(0);
            $id=array(0);
            for($i=1;$i<=$datanum;$i++){
               $id[$i]=$i;
            }
            for($i=1;$i<=$datanum;$i++){
               $press=$row['pressNum'];
               $like=$row['likeNum'];
               $totalnum=$press+$like;
               $total[$i]=$totalnum;
               $row=$result->fetch_assoc();
            }
            $result->close();
            $result=$conn->query($sql);
            $datanum=$result->num_rows;
            $row=$result->fetch_assoc();
            for($i=1;$i<=$datanum;$i++){
               $max=$i;
               for($j=$i+1;$j<=$datanum;$j++){
                  if($total[$max]<$total[$j]){
                     $temp=$total[$max];
                     $total[$max]=$total[$j];
                     $total[$j]=$temp;
                     $tempid=$id[$max];
                     $id[$max]=$id[$j];
                     $id[$j]=$tempid;
                  }
               }
            }
            for($i=1;$i<=$datanum;$i++){
               $Id=$row['passageId'];
               if($Id==$id[1]){
                  $title=$row['passageTitle'];
                  echo "<a href='showHot.php?Title=$title'>$title</a><br><br>";
               }
               $row=$result->fetch_assoc();
            }
            $result->close();
         ?>
      </div>
      <?php
      for($j=2;$j<=$datanum;$j++){
      echo "<div class='main_part w_main_part'>";
            $result=$conn->query($sql);
            $datanum=$result->num_rows;
            $row=$result->fetch_assoc();
            for($i=1;$i<=$datanum;$i++){
               $Id=$row['passageId'];
               if($Id==$id[$j]){
                  $title=$row['passageTitle'];
                  echo "<a href='showHot.php?Title=$title'>$title</a><br><br>";
               }
               $row=$result->fetch_assoc();
            }
            $result->close();
      echo "</div>";
      }
      ?>
   </div>
   <div class="sliderLeft">
      <span class="span">
         <br>
		 <a href="main.php">热门微博</a><br><br>
		 <a href="hotlist.php">热门榜单</a><br><br>
		 <a href="">热搜榜</a><br>		
      </span>
   </div>
   <div class="slider_center">
      <br>
                 微博热搜
      <span class="anew">
      <a href="">立即刷新</a>
      </span>
      <div class="slider_center_part">
         <?php
            for($j=1;$j<=$datanum;$j++){
            $result=$conn->query($sql);
            $datanum=$result->num_rows;
            $row=$result->fetch_assoc();
            for($i=1;$i<=$datanum;$i++){
               $Id=$row['passageId'];
               if($Id==$id[$j]){
                  $title=$row['passageTitle'];
                  echo "<a href='showHot.php?Title=$title'>$title</a><br><br>";
               }
               $row=$result->fetch_assoc();
            }
            $result->close();
            }
         ?>
      </div>
   </div>
   <script  type="text/javascript">
			let header = document.querySelector(".header");
			let sliderT = document.querySelector(".slider_top");
			let sliderL = document.querySelector(".sliderLeft");
			document.addEventListener("scroll", function () {
			            //（1）获取主体区域距离页面顶部的高度，等于头部区域的高度+banner区域的高度+3个margin-top的高度30
			        let mainHeight = header.scrollHeight  + 470;
			            //（2）当页面顶部的偏移量大于主体区域距离页面顶部的高度时，
	                 //将侧边栏的高度固定在页面的顶部，不跟随页面的上下滑动而变化位置，显示返回顶部文字
			        if (window.pageYOffset > mainHeight) {
			            slider.style.position = "fixed";
			            slider.style.top = "0px";
			            slider.style.left = "80%";
						sliderL.style.position = "fixed";
						sliderL.style.top = "0px";
						sliderL.style.left = "5%";
			        } else {//当页面顶部偏移量小于主体区域距离页面顶部的高度时，侧边栏的位置在主体区域旁边
			            
			            slider.style.position = "absolute";
			            slider.style.left = "80%";
			            slider.style.top = mainHeight + "px";
						sliderL.style.position = "absolute";
						sliderL.style.left = "5%";
						sliderL.style.top = mainHeight + "px";
						
			        }
			    })
   </script>
</body>
   
</html>
