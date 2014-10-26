<!DOCTYPE html>
<html>
<head>
<title>5-15</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-15】</h1>
依據每一筆訂單編號，計算出每一張訂單中所訂購產品的總金額。
<BR><BR>
【說明】<BR>
此例的查詢，可以使用單一個『訂單明細』之關聯，先將其中的屬性實際單價和數量進行相乘積之計算後，再依據sum()聚合函數的加總計算，如下所表示sum(實際單價×數量)
<BR><BR>
【表示式】 <BR>
<img border="0" src="../images/11.JPG" />
<BR><BR>
SQL 表達式 : SELECT 訂單編號, sum(實際單價 * 數量) FROM 訂單明細 GROUP BY 訂單編號<BR>
</div>
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT 訂單編號, sum(實際單價 * 數量) FROM 訂單明細 GROUP BY 訂單編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-14.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-16.php" id="Next">下一個</a>
</div>
</body>
</html>