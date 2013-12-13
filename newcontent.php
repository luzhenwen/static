<?php
$conn = mysql_connect('localhost', 'root', '123456');
mysql_select_db('ndac');

$id = $_GET['id'];

$sql = 'select title,content from art where id = ' . $id;

$data = mysql_fetch_assoc(mysql_query($sql));
?>


<!DOCTYPE html>
<html>
<head>
<title><?php echo $data['title']; ?></title>
<style type="text/css">
td{
	border: 1px solid green;
}
</style>
</head>
<body>
	<table>
		<tr>
			<td><?php echo $data['title']; ?></td>
		</tr>
		<tr>
			<td><?php echo $data['content']; ?></td>
		</tr>
	</table>
</body>
</html>