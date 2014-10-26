<!DOCTYPE html>
<html>
<head>
<title>5-6</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-6】</h1>
查詢所有男性員工的員工編號、姓名、職稱和地址<BR><BR>
【說明】<BR>
在此查詢彷彿和【查詢5-5】很相似，唯獨其中只有缺少一個『性別』屬性之差異<BR><BR>
【表示式】<BR>先選取操作，後投影操作<BR>
π(員工編號, 姓名, 職稱, 地址)(σ（性別=‘男’)(員工))<BR>
SQL 表達式 :SELECT 員工編號, 姓名, 職稱, 地址 FROM ( SELECT * FROM 員工 WHERE 性別 = '男');

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query(" SELECT 員工編號, 姓名, 職稱, 地址 FROM ( SELECT * FROM 員工 WHERE 性別 = '男' ) t1", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
or<BR>
SQL 表達式 :SELECT * FROM ( SELECT 員工編號, 姓名, 職稱, 地址 FROM 員工 ) WHERE 性別 = '男';
</div>
<BR><BR><BR>
<?php
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM ( SELECT 員工編號, 姓名, 職稱, 地址 FROM 員工 ) t1 WHERE 性別 = '男'", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
<div id="Page">
<a href="./Querry5-5.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-7.php" id="Next">下一個</a>
</div>
</body>
</html>