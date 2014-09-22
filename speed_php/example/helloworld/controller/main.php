<?php

class main extends spController
{
	function index() {
		echo "Enjoy, Speed of PHP!<br/>";
		echo "APP_PATH = " . APP_PATH . "<br/>";
		echo "SP_PATH = " . SP_PATH . "<br/>";
		/* c -> controller, a -> action */
		echo "<a href='index.php?c=number&a=show'>Turn to number page</a><br/>";
		echo "<a href='index.php?c=main&a=time'>显示当前时间</a>";
	}

	function time() {
		/* use php function to display time */
		echo date("Y-m-d H:i:s");
	}
}

?>
