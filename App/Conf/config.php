<?php
$config_arr1 = include_once 'mysqlconf.php';
$config_arr2 = include_once 'mailconfig.php';
$config_arr3 = include_once 'urlconfig.php';
$config_arr4 = include_once 'phoneconfig.php';
$config_arr5 = include_once 'webset.php';
$config_arr6 = include_once 'zhuti.php';
$config_arr7 = include_once 'imageconfig.php';

$config_arr8 = array(
		'VERSION'=>'懒人diy_V3.02(免费版)',	'APP_NAME'=>'懒人diy手机网站管理系统',	'AUTHOR'=>'懒人',	'AUTHOR_QQ'=>'524076166',	'Official'=>'http://diy.lanrenmb.com',
	'APP_GROUP_LIST' => 'Home,Admin,Wap', //项目分组设定
	'DEFAULT_GROUP'  => 'Home', //默认分组
	'URL_CASE_INSENSITIVE'=>true,	//URL不区分大小写
	'DB_LIKE_FIELDS'=>'title|content',
	'TMPL_FILE_DEPR'=>'_',
	'TMPL_STRIP_SPACE'=>false, //过滤html空格
	 'HTML_CACHE_TIME'       => 3600,      // 数据缓存有效期 0表示永久缓存
	 'DATA_CACHE_COMPRESS'   => false,   // 数据缓存是否压缩缓存
	 'DATA_CACHE_CHECK'      => false,   // 数据缓存是否校验缓存
	 'DATA_CACHE_PREFIX'     => '',     // 缓存前缀
	 'DATA_CACHE_TYPE'       => 'File',  // 数据缓存类型
	 'DATA_CACHE_PATH'       => TEMP_PATH,// 缓存路径设置 (仅对File方式有效)
	 'DATA_CACHE_SUBDIR'     => false,  // 使用子目录缓存 (根据缓存标识的哈希创建子目录)
	 'DATA_PATH_LEVEL'       => 1,        // 子目录缓存级别
	 'DB_SQL_BUILD_CACHE' => true,
	 'DB_SQL_BUILD_QUEUE' => 'xcache',
	 'DB_SQL_BUILD_LENGTH' => 20, // SQL缓存的队列长度
	'URL_HTML_SUFFIX'=>'shtml',
	'URL_ROUTER_ON'   => true, //开启路由
	'URL_ROUTE_RULES' => array( //定义路由规则
		'code$' => 'Code/index',
		'sitemap.html$' => 'Home/Diywap/sitemap',
		'search.php$' => 'Home/Diywap/search',		
		'/^([A-Za-z0-9]+?)$/' => 'Home/Diywap/azlist?cateurl=:1',		
		'/^([A-Za-z0-9]+?)\/(\d+)$/' => 'Home/Diywap/azlist?cateurl=:1&p=:2',
		//'/^([A-Za-z0-9]+?-[A-Za-z0-9]+?\.html)$/' => 'Home/Diywap/azshow?url=:1',
		'/^([A-Za-z0-9]+?-.*)$/' => 'Home/Diywap/azshow?url=:1',
		//'/^page-([A-Za-z0-9]+?).html$/' => 'Home/Index/page?url=:1',		
		//'/^([A-Za-z0-9]+?)$/' => 'Home/Index/textlist?cateurl=:1',
 ),
 
  'TMPL_EXCEPTION_FILE' => './Public/404/index.html',


);
return array_merge($config_arr1, $config_arr2,  $config_arr3,$config_arr4,$config_arr5,$config_arr6,$config_arr7,$config_arr8);
?>