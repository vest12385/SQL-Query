<!DOCTYPE html>
<html>
<head>
<title>5-8</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-8】</h1>
倘若要查詢每一位員工所經手的訂單資料。<BR><BR>
【說明】<BR>
在此查詢中，如果先以簡單將『員工』所有屬性和『訂單』的所有屬性輸出，則只要將此兩個關聯進行合併動作，而此處的關聯性來自於員工中的員工編號與訂單中的員工編號，也由於這兩個屬性名稱剛好相同，所以在表示式中，必須在屬性前加上關聯名稱，例如員工的員工編號將表示成員工.員工編號，訂單中的員工編號表示成訂單.員工編號<BR><BR>
【表示式】 <BR>
<img border="0" src="../images/1.JPG" />
<BR><BR>
EQUI JOIN<BR>
SQL 表達式 : SELECT * FROM 員工 INNER JOIN 訂單 ON  員工.員工編號 = 訂單.員工編號(顯式的內連接)<BR>
OR<BR>SQL 表達式 : SELECT * FROM 員工, 訂單 WHERE 員工.員工編號 = 訂單.員工編號(隱式的內連接)
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 INNER JOIN 訂單 ON  員工.員工編號 = 訂單.員工編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
 NATURAL JOIN<BR>
SQL 表達式 : SELECT * FROM 員工 NATURAL JOIN 訂單 
</div>
<?php
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 NATURAL JOIN 訂單", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-7.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-9.php" id="Next">下一個</a>
</div>
</body>
</html>