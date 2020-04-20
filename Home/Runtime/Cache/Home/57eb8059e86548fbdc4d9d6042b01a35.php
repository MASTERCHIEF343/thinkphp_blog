<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($data["title"]); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Author" content="Anonymous">
	<meta name="theme" content="Personal Blog">
	<title>Pages</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
</head>
<body>
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
						<li><a id="link" href="javascript:;">Index<span class="sr-only">(current)</span></a></li>
						<li><a id="log" href="http://localhost/thinkphp_blog/index.php/Home/Index/logout">Log out</a></li>
						<li><a id="page" href="http://localhost/thinkphp_blog/index.php/Home/Index/page">Page</a></li>
					</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div id="header"></div>
<xmp>
<?php echo ($data["message"]); ?>
</xmp>
	<a id="arraow" href="" style="display:none;"></a>
<!-- 多说评论框 start -->
	<div id="comment">
		<div class="ds-thread" data-thread-key="<?php echo ($data["id"]); ?>" data-title="<?php echo ($data["title"]); ?>" data-url="请替换成文章的网址"></div>
	</div>
<!-- 多说评论框 end -->
	<footer>
		<div id="footer">
			<div id="friendlink">
				<ul>
					<li>
						<a href="https://github.com/MASTERCHIEF343"><img src="/thinkphp_blog/Public/images/github.png"></a>
					</li>
					<li>
						<a href=""><img src="/thinkphp_blog/Public/images/qq.png"></a>
					</li>
					<li>
						<a href="https://www.zhihu.com/people/yang-bao-bao-43-84"><img src="/thinkphp_blog/Public/images/zhihu.png"></a>
					</li>
				</ul>
			</div>
			<span id="copyright">
				&copy; belongs ot Anonymou
			</span>
		</div>
	</footer>
</body>
<script src="http://strapdownjs.com/v/0.2/strapdown.js"></script>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/thinkphp_blog/Public/bootstrap/js/bootstrap.min.js"></script>
<!--jquery-->
<link rel="stylesheet" href="/thinkphp_blog/Public/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp_blog/Public/Css/show.css">
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
	var duoshuoQuery = {short_name:"autobars"};
	(function() {
	var ds = document.createElement('script');
	ds.type = 'text/javascript';ds.async = true;
	ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
	ds.charset = 'UTF-8';
	(document.getElementsByTagName('head')[0] 
	|| document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	//多说公共JS代码 end
	//返回顶部函数
	$("#arraow").click(function(){
		$(this).attr("href","#");
		$("nav").show(1000);
	})
	//是否登录
	var name = '<?php echo ($data["name"]); ?>';
	var log = document.getElementById('log');
	var page = document.getElementById('page');
	//显示page和logout
	if(name != ''){
		log.style.display = 'block';
		page.style.display = 'block';
	}else{
		log.style.display = 'none';
		page.style.display = 'none';
	}
	//回到主页
	var oLink = document.getElementById('link');
	oLink.onclick = function (){
		if( name == ''){
			this.setAttribute("href","http://localhost/thinkphp_blog/");
		}else{
			this.setAttribute("href","http://localhost/thinkphp_blog/?user="+"<?php echo ($data["name"]); ?>");
		}
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