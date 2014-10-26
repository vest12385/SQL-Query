<!DOCTYPE html>
<html>
<head>
<title>5-3</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-3】</h1>
從員工關聯中挑選男性員工或是職稱為業務之員工<BR><BR>
【說明】<BR>
此查詢與【查詢5-2】不同，因為查詢5-2是要挑選出，同時是男性員工，而且又必須是業務身份。而此查詢卻只要符合其中一個條件者，即可被列出。所以以圖5-6而言，是選取符合兩者條件資料之聯集<BR><BR>
【表示式】<BR>
σ（性別=‘男’ OR 職稱=‘業務’)(員工)<BR><BR>
SQL 表達式 : SELECT * FROM 員工 WHERE 性別 = '男' OR 職稱 = '業務';

</div>
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 WHERE 性別 = '男' OR 職稱='業務'", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-2.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-4.php" id="Next">下一個</a>
</div>
</body>
</html>