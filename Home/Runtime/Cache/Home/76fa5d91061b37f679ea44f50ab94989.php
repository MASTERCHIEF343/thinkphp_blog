<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Author" content="Anonymous">
	<meta name="theme" content="Personal Blog">
	<title>Anonymous's Blog</title>
	<link rel="stylesheet" type="text/css" href="Public/Css/main.css">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="Public/bootstrap/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>
<body>
<!--navigation-->
	<nav class="nav-bgcolor navbar  navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<a class="navbar-brand" href="#">Anonymous's Blog</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="javascript:" onclick="fresh()">Index<span class="sr-only">(current)</span></a></li>
						<li><a id="log" href="index.php/Home/Index/login">Log in</a></li>
						<li><a id="page" href="">Page</a></li>
					</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>	
<!--main-content-->
	<div id="head">
		<span id="person">There is more than one way to do!----Perl</span>
	</div>
	<div id="main"></div>
	<a id="arraow" href="" style="display:none;"></a>
<!--footer-->
	<footer>
		<div id="footer">
			<div id="friendlink">
				<ul>
					<li>
						<a href="https://github.com/MASTERCHIEF343"><img src="Public/images/github.png"></a>
					</li>
					<li>
						<a href=""><img src="Public/images/qq.png"></a>
					</li>
					<li>
						<a href="https://www.zhihu.com/people/yang-bao-bao-43-84"><img src="Public/images/zhihu.png"></a>
					</li>
				</ul>
			</div>
			<span id="copyright">
				&copy; belongs ot Anonymou
			</span>
		</div>
	</footer>
</body>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="Public/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
	var oDiv_main = document.getElementById('main');
	//检查是否已经登录
	var oLink = document.getElementById('log');
	var oPage = document.getElementById('page');
	function GetQueryString(name)
	{
		var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
		var r = window.location.search.substr(1).match(reg);
		if(r!=null)return  unescape(r[2]); return null;
	}
	var user=GetQueryString("user");
	if(user !=null && user.toString().length>1)
	{
		oLink.innerHTML = "logout";
		oLink.setAttribute('href','index.php/Home/Index/logout');
		oPage.style.display = 'block';
		oPage.setAttribute('href','index.php/Home/Index/page');
	}else{
		oPage.style.display = 'none';
	}
	//获取文章
	window.onload = function(){
		$.get("index.php/Home/Index/showmsg",function(data){
			for(var i = 0;i < data['len'];i ++){
				ShowMessage(data[i+'title'],data[i+'message'],data[i+'posted'],data[i+'id'],data[i+'des']);
			}
		})
	}
	//显示文章函数
	function ShowMessage(title,message,time,id,des){
		//msg-box
		var oDiv = document.createElement('div');
		oDiv.className = 'msg-box';
		oDiv.onclick = function(){
			location.href = 'index.php/Home/Index/show/'+id;
		}
		//img
		var img = document.createElement("img");
		img.setAttribute("src","Public/images/tag.png");
		oDiv.appendChild(img);
		//title
		var h2 = document.createElement('h2');
		h2.innerHTML = title;
		oDiv.appendChild(h2);
		//des
		var describe = document.createElement('h6');
		describe.innerHTML = des;
		oDiv.appendChild(describe);
		//time
		var tag = document.createElement('span');
		tag.innerHTML = time;
		oDiv.appendChild(tag);
		//显示在页面
		$("#main").append(oDiv);
		// oDiv_main.appendChild(oDiv);
	} 
	//顶部
	$(document).ready(function() {
		$(window).scroll(function() {
			//$(document).scrollTop() 获取垂直滚动的距离
			//$(document).scrollLeft() 这是获取水平滚动条的距离
			if ($(document).scrollTop() <= 0) {
				$("#arraow").hide();
				$("nav").show(1000);
			}else{
				$("#arraow").show();
				$("nav").hide(1000);
			}
		});
	});
</script>
</html>