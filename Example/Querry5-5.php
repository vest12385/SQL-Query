<!DOCTYPE html>
<html>
<head>
<title>5-5</title>
<meta charset="UTF-8" />
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id = "content">
<h1>【查詢5-5】</h1>
查詢所有男性員工的員工編號、姓名、職稱、性別和地址。<BR><BR>
【說明】<BR>
在此查詢中，不僅對橫向的屬性值做篩選，例如『男性員工』即是針對性別屬性中挑選出屬性值為『男』的值組；亦對縱向的屬性做一投影操作，例如員工編號、姓名、職稱、性別和地址。所以在挑選時，不但要使用選取操作(SELECT operation)，亦要同時使用投影操作(PROJECT operation)兩個操作，可做一組合的混合操作。至於該使用『先選取操作，後投影操作』或是『先投影操作，後選取操作』呢？在此範例中，兩者皆可，如下表示式所示 <BR><BR>
【表示式】<BR>先選取操作，後投影操作<BR>
π(員工編號, 姓名, 職稱, 性別, 地址)(σ（性別=‘男’)(員工))<BR>
or<BR>先投影操作，後選取操作<BR>
σ（性別=‘男’)(π(員工編號, 姓名, 職稱, 性別, 地址)(員工))<BR><BR>
SQL 表達式 :  SELECT 員工編號, 姓名, 職稱, 性別, 地址 FROM ( SELECT * FROM 員工 WHERE 性別 = '男');<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT 員工編號, 姓名, 職稱, 性別, 地址 FROM ( SELECT * FROM 員工 WHERE 性別 = '男') t1", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
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
SQL 表達式 :SELECT * FROM ( SELECT 員工編號, 姓名, 職稱, 性別, 地址 FROM 員工 ) WHERE 性別 = '男';
</div>
<?php
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM ( SELECT 員工編號, 姓名, 職稱, 性別, 地址 FROM 員工 ) t1 WHERE 性別 = '男'", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
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
<a href="./Querry5-4.php" id="Pre">上一個</a>
<a href="./ExampleIndex.html" id="GoBack">回範例首頁</a>
<a href="./Querry5-6.php" id="Next">下一個</a>
</div>
</body>
</html>