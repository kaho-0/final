<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1517513-final';
    const USER = 'LAA1517513';
    const PASS = 'Pass0222';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
		<title>プレイリスト</title>
        <link rel="stylesheet" href="./css/list.css">
	</head>
	<body>
		<h1>プレイリスト名の変更</h1>
		<!-- <div class="th0">リストID</div>
		<div class="th1">リスト名</div> -->
<?php
    $pdo=new PDO($connect, USER, PASS);
	echo '<form action="list-update-output.php" method="post">';

	foreach ($pdo->query('select * from list') as $row) {
		echo '<input type="hidden" name="listId" value="', $row['listId'], '">';
		echo '<div class="td0">リストID　', $row['listId'], '</div>';
		echo '<div class="td1">リスト名　';
		echo '<input type="text" name="listName" value="', $row['listName'], '">';
		echo '</div> ';
		echo '<div class="td2"><input type="submit" value="更新"></div>';
	}
	echo '</form>';
?>

    </body>
</html>
