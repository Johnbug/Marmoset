<?php
return array(
	//'配置项'=>'配置值'
	'URL_PATHINFO_DEPR'=>'/',//修改URL的分隔符
	'TMPL_L_DELIM'=>'<{', //修改左定界符
	'TMPL_R_DELIM'=>'}>', //修改右定界符
	'DB_PREFIX'=>'marmoset_',  //设置表前缀
	'DB_DSN'=>'mysql://root:@localhost:3306/marmoset_test',//使用DSN方式配置数据库信息
	'SHOW_PAGE_TRACE'=>true, //开启页面Trace
	'TMPL_PARSE_STRING'=>array(           //添加自己的模板变量规则
		'__CSS__'=>__ROOT__.'/Public/css',
		'__JS__'=>__ROOT__.'/Public/js',
		'__FONT__'=>__ROOT__.'/Public/assets/font',
		'__IMAGE__'=>__ROOT__.'/Public/assets/image',
	),
	'URL_ROUTER_ON'   => true, //开启路由
 	'URL_ROUTE_RULES' => array( //定义路由规则
    'index' => 'Index/index',
 	),
);
?>