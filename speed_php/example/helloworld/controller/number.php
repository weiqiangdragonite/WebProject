<?php

class number extends spController
{
	function show() {
		$num = 3.1415;
		echo "The old number is $num<br/>";
		$num = round($num);
		echo "Now the number is $num";
	}
}

?>
