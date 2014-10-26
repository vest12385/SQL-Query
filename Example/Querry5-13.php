<!DOCTYPE html>
<html>
<head>
<title>5-13</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-13】</h1>
倘若公司要寄出邀請函，同時邀請客戶與供應商，並挑選出公司名稱、聯絡人以及地址。
<BR><BR>
【說明】<BR>
此例的查詢，是要將兩個關聯做聯集處理，也因此在聯集後，會自動將重複資料去除，僅留下一筆，可避免同一家公司重複收到相同的邀請函
<BR><BR>
【表示式】 <BR>
<img border="0" src="../images/8.JPG" />
<BR><BR>
SQL 表達式 : SELECT 公司名稱, 聯絡人, 地址 FROM 客戶 UNION SELECT 供應商, 聯絡人, 地址 FROM 供應商<BR>

</div>
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT 公司名稱, 聯絡人, 地址 FROM 客戶 UNION SELECT 供應商, 聯絡人, 地址 FROM 供應商", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
<BR>
<BR>
<BR>
<BR>
<div >
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
<a href="./Querry5-12.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-14.php" id="Next">下一個</a>
</div>
</body>
</html>