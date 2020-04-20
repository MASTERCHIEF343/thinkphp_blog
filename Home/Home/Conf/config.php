<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_ERROR_MSG'        =>  true,    // 显示错误信息
	'DB_TYPE'               =>  'mysql',     // 数据库类型
	'DB_HOST'               =>  'localhost', // 服务器地址
	'DB_NAME'               =>  'blog',          // 数据库名
	'DB_USER'               =>  'blog',      // 用户名
	'DB_PWD'                =>  'blog',          // 密码
	'DB_PREFIX'             =>  'blog_',    // 数据库表前缀  
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
	// 开启路由
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES'=>array(
		'Index/show/:id\d'=>'Index/show' ,
	),
);