<?php
define("TOKEN", "Diywap");
define('APP_NAME','App'); //应用名
define('APP_PATH','./App/'); //应用路径
define('Copyright',MD5('http://diy.lanrenmb.com')); //请尊重作者的劳动成果！请不要修改官方网址，否则后果自负！
define('Author',MD5('预感')); //程序作者
define('Version','v2.0'); //版本号
define('APP_DEBUG',true); //是否开户调试模式 


if (!file_exists(APP_PATH.'Conf/mysqlconf.php')) {
header("Content-type: text/html; charset=utf-8");
    echo "<a href=/install/index.php>点击安装</a>";
    exit();
}


require './Diywap/ThinkPHP.php';

