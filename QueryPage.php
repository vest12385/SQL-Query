<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>QueryPage</title>
<link href="QueryCss.css" rel="stylesheet" type="text/css">
</head>
<div id ="query">
 	<form action="QueryPage.php" method="post">
	請輸入SQL語法:<textarea name="database" ></textarea>
	<input type="submit" value="送出按鈕">
    <BR><BR></form>
    <table border="1">
    <tr>
    	<th>員工</th><td>員工編號</td><td>姓名</td><td>職稱</td><td>性別</td><td>出生日期</td><td>任用日期</td><td>區域號碼</td><td>地址</td><td>分機號碼</td><td>報告人</td>
    </tr>
    <tr>
    	<th>訂單</th><td>訂單編號</td><td>員工編號</td><td>客戶編號</td><td>訂貨日期</td><td>付款方式</td><td>交貨方式</td>
    </tr>
    <tr>
    	<th>訂單明細</th><td>訂單編號</td><td>產品編號</td><td>實際單價</td><td>數量</td>
    </tr>
    <tr>
    	<th>客戶</th><td>客戶編號</td><td>公司名稱</td><td>聯絡人</td><td>聯絡人職稱</td><td>聯絡人性別</td><td>郵遞區碼</td><td>地址</td><td>電話</td>
    </tr>
    <tr>
    	<th>供應商</th><td>供應商編號</td><td>供應商</td><td>聯絡人</td><td>聯絡人職稱</td><td>聯絡人性別</td><td>郵遞區碼</td><td>地址</td><td>電話</td>
    </tr>
    <tr>
    	<th>產品資料</th><td>產品編號</td><td>類別編號</td><td>供應商編號</td><td>產品名稱</td><td>建議單價</td><td>庫存量</td><td>安全存量</td>
    </tr>
    <tr>
    	<th>產品類別</th><td>類別編號</td><td>類別名稱</td>
    </tr>
    </table>
    <BR>
    <?php
    if( !isset($_POST["database"]))
        $sql = "SELECT * FROM 員工";
    else
        $sql = $_POST["database"];
    require_once("./Data/DB_config.php");
    require_once("./Data/DB_class.php");
    $db = new DB();
    $db -> connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
    $db -> query( $sql , array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
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
<a href="./index.html" id=Back>Back To Index</a>
</div>
<body>
</body>
</html>