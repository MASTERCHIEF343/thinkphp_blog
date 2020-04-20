<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="title" content="login-page">
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="/thinkphp_blog/Public/Css/login.css">
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
						<li><a href="http://localhost/thinkphp_blog/">Index<span class="sr-only">(current)</span></a></li>
					</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
<!--main-content-->
	<div id="header"></div>
	<div id="main-content">
		<div id="msg">
			<form class="form-horizontal"  method="post" action="">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
					<input type="name" name="username" class="form-wdth form-control" id="input" placeholder="用户名">
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<input type="password" name="passwd" class="form-wdth form-control" id="input" placeholder="密码（6-16位之间）">
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2">
					<button id="btn" type="button" class="btn btn-default">Sign in</button>
					</div>
				</div>
			</form>
		</div>
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
<!--jquery-->
<script type="text/javascript">
	var username = $('input[name=username]');
	var passwd = $('input[name=passwd]');
	var url = "<?php echo U('Home/Index/logincheck','','');?>";
	$('#btn').bind("click",function(){
		if(username.val() == ''){
			alert('用户名不能为空');
			username.focus();
			return ;
		}
		if(passwd.val() == ''){
			alert('密码不能为空');
			passwd.focus();
			return ;
		}
		$.ajax({
			type: 'POST',
			url: url,
			data:{username:username.val(),passwd:passwd.val()},
			success:function(data){
				if (data.status) {
					window.location.href = "http://localhost/thinkphp_blog/?user="+data['name'];
				}
			},
			error:function(data){
				alert("用户名或密码不正确");
			},
			dataType: "json"
		});
	})
</script>
</html>