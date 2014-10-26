<!DOCTYPE html>
<html>
<head>
<title>5-9</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-9】</h1>
查詢所有訂單中，哪些產品的實際單價並未以建議單價來銷售。<BR><BR>
【說明】<BR>
在此查詢中，有相關的關聯包括『訂單明細』與『產品資料』兩個關聯，並且依據查詢的條件中，可清楚看出，在『訂單明細』與『產品資料』兩個關聯的相同產品編號做『相等』的比較運算，而訂單明細中的實際單價與產品資料中的建議單價做『不相等』的比較運算。<BR><BR>
【表示式】 <BR>
<img border="0" src="../images/2.JPG" />
<BR><BR>
SQL 表達式 : SELECT * FROM 訂單明細, 產品資料 WHERE 訂單明細.產品編號 = 產品資料.產品編號 AND 訂單明細.實際單價 <> 產品資料.建議單價
<BR>OR<BR>SQL 表達式 : SELECT * FROM 訂單明細 INNER JOIN 產品資料 ON 訂單明細.產品編號 = 產品資料.產品編號 AND 訂單明細.實際單價 <> 產品資料.建議單價
</div>
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 訂單明細, 產品資料 WHERE 訂單明細.產品編號 = 產品資料.產品編號 AND 訂單明細.實際單價 <> 產品資料.建議單價", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-8.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-10.php" id="Next">下一個</a>
</div>
</body>
</html>