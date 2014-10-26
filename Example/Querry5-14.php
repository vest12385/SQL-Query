<!DOCTYPE html>
<html>
<head>
<title>5-14</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-14】</h1>
倘若要從客戶與供應商的兩個關聯中，挑選出<BR>
(a)單純為客戶，不是供應商以及<BR>
(b)單純為供應商，不是客戶者
<BR><BR>
【說明】<BR>
(a)從客戶的關聯中，去除既為客戶又為供應商的資料<BR>
(b)從供應商的關聯中，去除既為供應商又為客戶的資料
<BR>
<img border="0" src="../images/9.JPG" />
<BR><BR>
SQL 表達式 : SELECT 公司名稱, 聯絡人, 地址 FROM 客戶 MINUS SELECT 供應商, 聯絡人, 地址 FROM 供應商 <BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT 公司名稱, 聯絡人, 地址 FROM 客戶 WHERE (公司名稱, 聯絡人, 地址) NOT IN ( SELECT 供應商, 聯絡人, 地址 FROM 供應商 )", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<img border="0" src="../images/10.JPG" /><BR>
SQL 表達式 : SELECT 供應商, 聯絡人, 地址 FROM 供應商 MINUS SELECT 公司名稱, 聯絡人, 地址 FROM 客戶
<?php
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT 供應商, 聯絡人, 地址 FROM 供應商 WHERE (供應商, 聯絡人, 地址) NOT IN ( SELECT 公司名稱, 聯絡人, 地址 FROM 客戶 )", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
</div>
<div id="Page">
<a href="./Querry5-13.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-15.php" id="Next">下一個</a>
</div>
</body>
</html>