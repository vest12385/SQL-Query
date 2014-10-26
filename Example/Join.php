<!doctype html>
<html>
<head>
<link href="ExampleQuery.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Join</title>
</head>
<div id = "content">
<h1>Cross Join</h1>
<BR>
SQL 表達式 : SELECT * FROM 員工 CROSS JOIN 訂單<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 CROSS JOIN 訂單", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
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
<BR>
<BR>
<BR>
<h1>Inner Join</h1>
<BR>
SQL 表達式 : SELECT * FROM 員工 Inner JOIN 訂單 ON 員工.員工編號 = 訂單.員工編號( 顯性 )<BR>
<BR>
SQL 表達式 : SELECT * FROM 員工, 訂單 WHERE 員工.員工編號 = 訂單.員工編號( 隱性 )<BR>

如果後面條件式為等號則也等於Equl Join<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 Inner JOIN 訂單 ON 員工.員工編號 = 訂單.員工編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
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
<BR>
<BR>
<BR>
<h1>Natural Join</h1>
<BR>
SQL 表達式 : SELECT * FROM 員工 NATURAL JOIN 訂單<BR>
SQL 表達式 : SELECT * FROM 員工 INNER JOIN 訂單 USING (員工編號)<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 NATURAL JOIN 訂單", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
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
<BR>
<BR>
<BR>
<h1>Outer Join</h1>
<BR>
SQL 表達式 : SELECT * FROM 員工 LEFT JOIN 訂單 ON 員工.員工編號 = 訂單.員工編<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 LEFT JOIN 訂單 ON 員工.員工編號 = 訂單.員工編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
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
<BR>
SQL 表達式 : SELECT * FROM 員工 RIGHT JOIN 訂單 ON 員工.員工編號 = 訂單.員工編<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 RIGHT JOIN 訂單 ON 員工.員工編號 = 訂單.員工編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
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
<BR>
SQL 表達式 : SELECT * FROM 員工 FULL JOIN 訂單 ON 員工.員工編號 = 訂單.員工編<BR>

<?php
	require_once("../Data/DB_config.php");
	require_once("../Data/DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 員工 LEFT JOIN 訂單 ON 員工.員工編號 = 訂單.員工編號
UNION
SELECT * FROM 員工 RIGHT JOIN 訂單 ON 員工.員工編號 = 訂單.員工編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
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

<a href="http://zh.wikipedia.org/wiki/%E8%BF%9E%E6%8E%A5_(SQL)" id="GoBack">維基百科詳細說法</a>
<a href="./Querry5-11.php" id="GoBack">回範例5-11</a>
</div>
<body>
</body>
</html>