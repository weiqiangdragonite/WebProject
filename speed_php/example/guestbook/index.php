<?php


/* 应用程序目录，controller和model等文件夹所在的目录，这里设置的是根目录 */
define("APP_PATH", dirname(__FILE__));

/* sp框架的目录，SpeedPHP.php文件所在的目录 */
define("SP_PATH", dirname(__FILE__).'/SpeedPHP');

/* 这里开始是应用程序的配置 */
$spConfig = array(
	/* 数据库设置 */
	'db' => array(
		'host' => 'localhost',		/* 数据库地址 */
		'login' => 'dragonite',		/* 数据库用户名 */
		'password' => 'dragonite',	/* 数据库密码 */
		'database' => 'guestbook'	/* 数据库的库名称 */
	)
);


require(SP_PATH . "/SpeedPHP.php");

/* 全局定义php文件的编码都是utf-8 */
header("Content-type: text/html; charset=utf-8"); 

spRun();

?>
