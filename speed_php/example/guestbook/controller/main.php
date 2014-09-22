<?php

/*
访问者可以查看留言首页（也就是留言列表）。
访问者可以查看单一条留言的详细内容。
访问者可以进行留言。
*/

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
		/* 用findAll将全部的留言查出来
		findAll 按条件查找记录，返回数组
		findAll($conditions)的$conditions是条件，可以为空，也可以是数组或者字符串
		*/
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
		$condition = array('id' => $id);
		/* 这次是用find来查找，我们把$condition（条件）放了进去
		find仅是查找并返回第一条符合条件的记录
		*/
		$result = $guestbook->find($condition);
		/* 下面输出了该条留言内容 */
		echo "<p>留言标题：{$result['title']}</p>";
		echo "<p>留言者：{$result['name']}</p>";
		echo "<p>留言内容：{$result['contents']}</p>";
	}

	/* 这里是留言 */
	function write() {
		/* 用spClass来初始化留言本数据表对象（模型类对象） */
		$guestbook = spClass("guestbook");
		/* 这里用$this->spArgs()取得了表单的全部内容，然后增加了一条留言记录
		相当于
		$newrow = array( 
            		'name' => $this->spArgs('name'), 
            		'title' => $this->spArgs('title'), 
            		'contents' => $this->spArgs('contents'), 
        	);
		$guestbook->create($newrow);

		create用起来很容易，只要我们把一个有着“字段名对应数值”的数组放到create里面，
		那么就可以在数据表中新建一条记录了。
		*/
		$guestbook->create($this->spArgs());
		echo "留言成功，<a href=../guestbook/>返回</a>";
	}

	function test_update() {
		$guestbook = spClass("guestbook");
		/*
		update使用的方法有些像是findAll和create的结合体，因为update需要和
		findAll一样的条件（$conditions），也需要像create的$newrow，只是update
		只是需要修改的才放到$updaterow 里面而已。
		*/
		/* 查找id是2的记录 */
		$conditions = array('id' => 2);
		/* 然后将这条记录的name改成“喜羊羊” */
		$newrow = array(
			'name' => '喜羊羊'
		);
		$guestbook->update($conditions, $newrow);
		echo '已修改id为2的记录！'; 
	}

	function test_delete() {
		/*
		delete的使用方法和findAll是同样需要$conditions的，也就是delete将删除
		符合条件的全部记录。
		*/
		$guestbook = spClass('guestbook');
		$conditions = array('name' => '喜羊羊');
		$guestbook->delete($conditions);
		echo '已删除名称是喜羊羊的记录！';
	}

}

?>
