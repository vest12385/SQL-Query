<!DOCTYPE html>
<html>
<head>
<title>5-4</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-4】</h1>
查詢所有員工的員工編號、姓名、職稱和地址<BR><BR>
【說明】<BR>
此種查詢主要是針對『屬性』做篩選，並非一個關聯的所有屬性皆要輸出，目的除了可以避免某些資料被未授權者所看到外，亦可篩選掉多餘而不需要的屬性項<BR><BR>
【表示式】<BR>
π(員工編號, 姓名, 職稱, 地址)(員工)<BR><BR>
SQL 表達式 : SELECT 員工編號, 姓名, 職稱, 地址 FROM 員工;

</div>
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query(" SELECT 員工編號, 姓名, 職稱, 地址 FROM 員工", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-3.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-5.php" id="Next">下一個</a>
</div>
</body>
</html>