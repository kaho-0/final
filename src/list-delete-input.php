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
		<title>プレイリスト</title>
        <link rel="stylesheet" href="./css/list.css">
	</head>
	<body>
        <h1>プレイリストの削除</h1>
        <table class="design02">
            <tr><th>リスト名</th><th>削除</th></tr>
    <form action="list-delete-output.php" method="GET">
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from list') as $row ) {
        echo '<tr><td>',$row['listName'],'</td>';
        echo '<td><a href="list-delete-output.php?&listId=', $row['listId'], '">削除</a></td></tr>';
    }
?>
    </form>
    </table>
    </body>
</html>
