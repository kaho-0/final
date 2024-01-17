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
		<table class=design02>
			<tr><th>リストID</th><th>リスト名</th><th>更新</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);

	foreach ($pdo->query('select * from list') as $row) {
		echo '<tr>';
		echo '<form action="list-update-output.php" method="post">';
		echo '<input type="hidden" name="listId" value="', $row['listId'], '">';
		echo '<td>', $row['listId'], '</td>';
		echo '<td>';
		echo '<input type="text" name="listName" value="', $row['listName'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form></tr>';
	}
?>
		</table>
    </body>
</html>
