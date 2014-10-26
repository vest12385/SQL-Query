<!DOCTYPE html>
<html>
<head>
<title>產品資料</title>
<meta charset="UTF-8" />
</head>
<body>

<?php
	require_once("DB_config.php");
	require_once("DB_class.php");
	$db = new DB();
	$db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$db -> query("SELECT * FROM 產品資料 ORDER BY 產品編號", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL) );
?>
<table border="1">
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
</body>
</html>