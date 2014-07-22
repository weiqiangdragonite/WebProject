<?php

class guestbook extends spModel
{
	/* var跟public一个意思，var是php旧版的用法 */
	/* 每个留言唯一的标志，可以称为主键 */
	var $pk = "id";
	/* 数据表的名称 */
	var $table = "guestbook";
}

?>
