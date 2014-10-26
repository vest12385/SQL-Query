<!DOCTYPE html>
<html>
<head>
<title>5-11</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-11】</h1>
遞迴封閉式操作
查詢員工和所屬上司之所有資料。<BR><BR>
【說明】<BR>
在此查詢中，有相關的關聯只有『員工』一個關聯，其中的『報告人』自我參考到『員工編號』的屬性，如圖5-18(c)，但此關聯卻要扮演兩個不同的角色，一個就是員工，另一個就是上司角色<BR><BR>
【表示式】 <BR>
<img border="0" src="../images/5.JPG" />
<BR><BR>
SQL 表達式 : SELECT * FROM (SELECT 員工編號, 姓名 AS 員工姓名, 職稱 AS 員工職稱, 報告人 FROM 員工) t1, ( SELECT 員工編號 AS 上司編號, 姓名 AS 上司姓名, 職稱 AS 上司職稱 FROM 員工 ) t2 WHERE t1.報告人 = t2.上司編號<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM (SELECT 員工編號, 姓名 AS 員工姓名, 職稱 AS 員工職稱, 報告人 FROM 員工) t1, ( SELECT 員工編號 AS 上司編號, 姓名 AS 上司姓名, 職稱 AS 上司職稱 FROM 員工 ) t2 WHERE t1.報告人 = t2.上司編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
<BR>
<BR>
<BR>
<BR>
<table border="1" id = "SQLTABLE" >
	<tr>
		<?php
		for ( $i = 0; $i < $db->getColumnLen(); $i++ )
		{
			echo '<th>';
			print $db->getMetadata( $i );
			echo '</th>';
		}
		?>
	</tr>
<?php
	while($row = $db->userFetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
		echo '<tr>';
		for ( $i = 0; $i < $db->getColumnLen(); $i++ )
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
<BR><BR><BR>
<img border="0" src="../images/6.JPG" /><BR>
SQL 表達式 : SELECT * FROM (SELECT 員工編號, 姓名 AS 員工姓名, 職稱 AS 員工職稱, 報告人 FROM 員工) t1 LEFT JOIN ( SELECT 員工編號 AS 上司編號, 姓名 AS 上司姓名, 職稱 AS 上司職稱 FROM 員工 ) t2 ON t1.報告人 = t2.上司編號
</div>
<?php
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM (SELECT 員工編號, 姓名 AS 員工姓名, 職稱 AS 員工職稱, 報告人 FROM 員工) t1 LEFT JOIN ( SELECT 員工編號 AS 上司編號, 姓名 AS 上司姓名, 職稱 AS 上司職稱 FROM 員工 ) t2 ON t1.報告人 = t2.上司編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
<BR
<BR>
<BR>
<table border="1" id = "SQLTABLE" >
	<tr>
		<?php
		for ( $i = 0; $i < $db->getColumnLen(); $i++ )
		{
			echo '<th>';
			print $db->getMetadata( $i );
			echo '</th>';
		}
		?>
	</tr>
<?php
	while($row = $db->userFetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
		echo '<tr>';
		for ( $i = 0; $i < $db->getColumnLen(); $i++ )
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
<h1><a href="./Join.php" id="join">Join 觀念大集合</a></h1>
</div>
<div id="Page">
<a href="./Querry5-10.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-12.php" id="Next">下一個</a>
</div>
</body>
</html>