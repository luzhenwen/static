<?php
$conn = mysql_connect('localhost', 'root', '123456');
mysql_select_db('ndac');

$data = $_POST;
$title = $data['title'];
$content = $data['content'];
$pubtime = time();

$sql = 'insert into art(title, content, pubtime) value(\'' . $title . '\',\'' . $content . '\',\'' . $pubtime . '\')';
$id = mysql_insert_id();
if(mysql_query($sql)){
	$id = mysql_insert_id();
	$fhandle = fopen('news-id-' . $id . '.html', 'ab');
	$tplhandle = fopen('new.tpl', 'rb');

	$search = array('{<title>}', '{<content>}');
	$replace = array($title, $content);

	while(!feof($tplhandle)){
		$temp_str = fgets($tplhandle);
		$temp_str = str_replace($search, $replace, $temp_str);
		fwrite($fhandle, $temp_str);
	}
	fclose($fhandle);
	fclose($tplhandle);
	echo '添加成功，<a target="_blank" href="/static/news-id-' . $id . '.html">点此查看新闻</a>';
}else{
	echo '数据插入失败';
}