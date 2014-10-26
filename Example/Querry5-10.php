<!DOCTYPE html>
<html>
<head>
<title>5-10</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-10】</h1>
查詢所有員工承接的訂單資料，即使沒有承接任何訂單也都要出現該員工的資料。<BR><BR>
【說明】<BR>
在此查詢中，有相關的關聯包括『員工』與『訂單』兩個關聯，並且依據查詢的條件中，可直接使用左邊外部合併(Left Outer Join)或右邊外部合併(Right Outer Join)來合併所需要的關聯，至於是使用左或右，必須視其表示式中，兩個關聯放置於合併符號的左右情形而訂。以此條件是以『員工』關聯為主，『訂單』關聯為輔，若是將員工放置於合併符號的左邊，訂單放置於右邊，則必須使用左邊外部合併；反之，若是將『員工』關聯放置於該符號右邊，訂單放置於符號的左邊，則必須改用右邊外部合併。
<BR><BR>
【表示式】 <BR>
<img border="0" src="../images/3.JPG" />
<BR><BR>
SQL 表達式 : SELECT * FROM 員工 LEFT JOIN 訂單 ON 員工.員工編號 = 訂單.員工編號<BR>
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 LEFT JOIN 訂單 ON 員工.員工編號 = 訂單.員工編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<img border="0" src="../images/4.JPG" /><BR>
SQL 表達式 : SELECT * FROM 訂單 RIGHT JOIN 員工 ON 員工.員工編號 = 訂單.員工編號
</div>
<?php
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 訂單 RIGHT JOIN 員工 ON 員工.員工編號 = 訂單.員工編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-9.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-11.php" id="Next">下一個</a>
</div>
</body>
</html>