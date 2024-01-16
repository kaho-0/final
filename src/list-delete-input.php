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
    <form action="list-delete-output.php" method="GET">
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from list') as $row ) {
        echo $row['listName'];
        echo '<a href="list-delete-output.php?&listId=', $row['listId'], '">削除</a>';
        echo '<br>';
    }
?>
    </table>
    </form>
    </body>
</html>
