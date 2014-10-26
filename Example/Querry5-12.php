<!DOCTYPE html>
<html>
<head>
<title>5-12</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-12】</h1>
倘若要從『客戶』與『供應商』的兩個關聯中，挑選出既是客戶，同時又是供應商的公司相關資料，如公司名稱、聯絡人以及地址，做為公司行銷上的參考資料。
<BR><BR>
【說明】<BR>
此查詢是要從『客戶』關聯中有的值組，同時在『供應商』關聯中也有的共同值組挑選出來，也就是客戶中的『公司名稱』屬性和供應商中的『供應商』屬性，具有相同屬性值的值組
<BR><BR>
【表示式】 <BR>
<img border="0" src="../images/7.JPG" />
<BR><BR>
SQL 表達式 : SELECT 公司名稱, 聯絡人, 地址 FORM 客戶 INTERSECT SELECT 供應商, 聯絡人, 地址 FORM 供應商<BR>

</div>
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT DISTINCT 公司名稱, 聯絡人, 地址 FROM 客戶
WHERE (公司名稱, 聯絡人, 地址) IN
(SELECT 供應商, 聯絡人, 地址 FROM 供應商)
", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-11.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-13.php" id="Next">下一個</a>
</div>
</body>
</html>