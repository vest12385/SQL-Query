<!DOCTYPE html>
<html>
<head>
<title>5-2</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-2】</h1>
從員工關聯中挑選出男性業務。<BR><BR>
【說明】<BR>
此查詢與【查詢5-1】不同，因為查詢5-1只要挑選出性別屬性的屬性值為『男』即可，但此查詢不但是要求『性別』的屬性值為『男』，『職稱』屬性的屬性值也必須是『業務』，也就是兩者條件要同時成立，選取員工性別為男與職稱為業務的兩者共同之交集<BR><BR>
【表示式】<BR>
 σ（性別=‘男’ AND 職稱=‘業務’)(員工)<BR><BR>
SQL 表達式 : SELECT * FROM 員工 WHERE 性別 = '男' AND 職稱 = '業務';

</div>
<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 WHERE 性別 = '男' AND 職稱='業務'", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-1.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-3.php" id="Next">下一個</a>
</div>
</body>
</html>