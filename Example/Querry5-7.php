<!DOCTYPE html>
<html>
<head>
<title>5-7</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-7】</h1>
查詢所有男性業務和女性業務助理之員工編號、姓名、職稱和性別。<BR><BR>
【說明】<BR>
在此查詢中，不僅對橫向的屬性值做篩選(即為選取操作)，例如『男性員工』即是針對『選取操作』的橫向篩選，而輸出的員工編號、姓名、職稱和性別等屬性，則為縱向篩選(即為投影操作)。<BR><BR>
【表示式】<BR>先選取操作，後投影操作<BR>
π(員工編號, 姓名, 職稱, 性別, 地址)(σ(性別 = '男' AND 職務 = '業務') OR (性別 = '女' AND 職務 = '業務助理')(員工))<BR>
or<BR>先投影操作，後選取操作<BR>
σ(性別 = '男' AND 職務 = '業務') OR (性別 = '女' AND 職務 = '業務助理')(π(員工編號, 姓名, 職稱, 性別, 地址)(員工))<BR><BR>
SQL 表達式 :  SELECT 員工編號, 姓名, 職稱, 性別, 地址 FROM ( SELECT * FROM 員工 WHERE (性別 = '男' AND 職稱 = '業務') OR (性別 = '女' AND 職務 = '業務助理') );<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT 員工編號, 姓名, 職稱, 性別, 地址 FROM ( SELECT * FROM 員工 WHERE (性別 = '男' AND 職稱 = '業務') OR (性別 = '女' AND 職稱 = '業務助理') ) t1", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
SQL 表達式 :SELECT * FROM ( SELECT 員工編號, 姓名, 職稱, 性別, 地址 FROM 員工 ) WHERE (性別 = '男' AND 職務 = '業務') OR (性別 = '女' AND 職務 = '業務助理') ;
</div>
<?php
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM ( SELECT 員工編號, 姓名, 職稱, 性別, 地址 FROM 員工 ) t1 WHERE (性別 = '男' AND 職稱 = '業務') OR (性別 = '女' AND 職稱 = '業務助理')", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<div id="Page">
<a href="./Querry5-6.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-8.php" id="Next">下一個</a>
</div>
</body>
</html>