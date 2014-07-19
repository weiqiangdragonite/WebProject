<?php

class main extends spController
{
	/* 这里是首页 */
	function index() {
		/* 用spUrl制造写留言的地址 */
		$posturl = spUrl("main", "write");

		echo "<p align=center><h2>我的留言本</h2></p>";
		/* 下面做一个表单来提交留言，请注意这些输入框的name属性，它们都对应了
		数据表guestbook的字段名！ */
		echo "<p>请写下您的留言：</p><form action={$posturl} method=POST><p>您的名字：<input type=text name=name></p><p>留言标题：<input type=text name=title></p><p>留言内容：<textarea name=contents></textarea></p><p><input type=submit value=提交></p></form>";

		/* 用spClass来初始化留言本数据表对象（模型类对象） */
		$guestbook = spClass("guestbook");
		/* 用findAll将全部的留言查出来 */
		if ($result = $guestbook->findAll()) {
			/* 循环输出留言信息 */
			foreach ($result as $value) {
				/* 用spUrl制造查看留言内容页面地址，请注意array('id'=>$value['id'])将传递ID到查看页面，由spArgs来接收。 */
				$contentsurl = spUrl("main", "show", array('id' => $value['id']));
				echo "<p>这里是第{$value['id']}条留言：<a href={$contentsurl} target=_blank>{$value['title']}</a>&nbsp;&nbsp;{$value['name']}</p>";
			}
		}
	}

	/* 这里是查看留言内容 */
	function show() {
		/* 用spArgs接收spUrl传过来的ID */
		$id = $this->spArgs("id");
		/* 还是用spClass */
		$guestbook = spClass("guestbook");
		/* 制造查找条件，这里是使用ID来查找属于ID的那条留言记录 */
		$condition = array('id'=>$id);
		/* 这次是用find来查找，我们把$condition（条件）放了进去 */
		$result = $guestbook->find($condition);
		/* 下面输出了该条留言内容 */
		echo "<p>留言标题：{$result['title']}</p>";
		echo "<p>留言者：{$result['name']}</p>";
		echo "<p>留言内容：{$result['contents']}</p>";
	}

	/* 这里是留言 */
	function write() {
		$guestbook = spClass("guestbook");
		/* 这里用$this->spArgs()取得了表单的全部内容，然后增加了一条留言记录 */
		$guestbook->create($this->spArgs());
		echo "留言成功，<a href=../guestbook/>返回</a>";
	}
}

?>
