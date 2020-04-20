<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page</title>
	<link rel="stylesheet" type="text/css" href="/thinkphp_blog/Public/Css/page.css">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="/thinkphp_blog/Public/bootstrap/css/bootstrap.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>
<body>
<!--navigation-->
	<nav class="nav-bgcolor navbar navbar-fixed-top navbar-default navbar-static-top">
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
						<li><a href="http://localhost/thinkphp_blog/index.php/Home/Index/logout">Log out</a></li>
					</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
<!--main-content-->
	<div id="header"></div>
	<div id="msg">
		<form class="form-horizontal" method="post" action="">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">标题:</label>
				<input type="text" class="form-wdth form-control" name="title" id="inputEmail3" placeholder="文章的题目">
			</div>
			<div class="form-group">
				<label for="inputEmail2" class="col-sm-2 control-label">描述:</label>
				<input type="text" class="form-wdth form-control" name="describe" id="inputEmail2" placeholder="文章的描述">
			</div>
			<div class="form-group">
				<label id="content" for="inputtextarea" class="col-sm-2 control-label">内容:</label>
				<textarea id="inputtextarea"  name="msg" placeholder="就在这里记录些什么吧(Mark Down~)......."></textarea>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 ">
				<button id="btn" type="button" class="btn btn-default">Post message</button>
				</div>
			</div>
		</form>
	</div>
<!--footer-->
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
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/thinkphp_blog/Public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	var oLink = document.getElementById('link');
	var title = $('input[name=title]');
	var des = $('input[name=describe]');
	var text = $('textarea[name=msg]');
	//回到主页
	oLink.onclick = function (){
		this.setAttribute("href","http://localhost/thinkphp_blog/?user="+"<?php echo ($data["name"]); ?>");
	}
	//提交文章
	var url = "<?php echo U('Home/Index/insertmsg','','');?>";
	$("#btn").click(function(){
		if(title.val() == ''){
			alert("缺少了标题哦~");
			title.focus();
			return ;
		}else if(title.val().length > 20){
			alert("标题格式不正确");
			title.focus();
			return ;
		}
		if(des.val() == ''){
			alert("缺少了描述哦~");
			des.focus();
			return ;
		}else if(des.val().length > 20){
			alert("描述格式不正确");
			des.focus();
			return ;
		}
		if(text.val() == ''){
			alert("缺少了哦内容~");
			text.focus();
			return ;
		}
		$.ajax({
			type: 'POST',
			url: url,
			data:{title:title.val(),message:text.val(),des:des.val()},
			success:function(data){
				if(data.status){
					if(data['error']){
						alert(data['error']);
					}else{
						window.location.href = "http://localhost/thinkphp_blog/?user="+data['name'] ;
					}
				}
			},
			dataType: "json"
		});
	})
</script>
</html>