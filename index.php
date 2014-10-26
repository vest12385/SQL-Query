<!DOCTYPE html>
<html>
<head>
<title>PHP Test</title>
<meta charset="UTF-8" />
</head>
<body>
<?php
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors',1);
	ini_set('html_errors', 1);
	require_once("DB_config.php");
	require_once("DB_Class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 ORDER BY 員工編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
<table border="1">
	<tr><th>員工編號</th><th>姓名</th><th>職稱</th><th>性別</th><th>出生日期</th><th>任用日期</th><th>區域號碼</th><th>地址</th><th>分機號碼</th><th>報告人</th></tr>
<?php
	while($row = $db->userFetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
		echo '<tr>';
		for ( $i = 0; $i < 10; $i++ )
		{
			echo '<td >';
			print $row[$i];
			echo '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
	$db = null;
?>
</body>
</html>