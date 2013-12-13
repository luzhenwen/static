<?php
$conn = mysql_connect('localhost', 'root', '123456');

mysql_select_db('ndac');

$sql = 'select * from art order by pubtime desc';

$result = mysql_query($sql);
$data = array();
while(($row = mysql_fetch_assoc($result)) != false){
	$data[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>这是新闻列表页</title>
</head>
<body>
	<a target="_black" href="addnew.html">添加新闻</a><br />
	<p1>新闻列表</p1>
	<table>
		<?php
		foreach($data as $val){
		?>
		<tr>
			<td>
				<a target="_black" href="news-id-<?php echo $val['id']; ?>.html"><?php echo $val['title']; ?></a>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
</body>
</html>
