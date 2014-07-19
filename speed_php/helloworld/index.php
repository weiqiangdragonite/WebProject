<?php

/* 应用程序目录，controller和model等文件夹所在的目录，这里设置的是根目录 */
define("APP_PATH", dirname(__FILE__));

/* sp框架的目录，SpeedPHP.php文件所在的目录 */
define("SP_PATH", dirname(__FILE__) . '/SpeedPHP');

/* 应用程序的配置 */
$spConfig = array(

);


require(SP_PATH . "/SpeedPHP.php");
spRun();

?>
