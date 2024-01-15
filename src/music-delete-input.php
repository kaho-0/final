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
	</head>
	<body>
    <form action="music-delete-output.php" method="POST">
        <table>
    <tr><th>曲名</th><th>アーティスト名</th><th>カテゴリー</th><th>動画</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach( $pdo->query('select * from music') as $row ) {
        echo '<tr>';
        echo '<td>', $row['musicName'], '</td>';
        echo '<td>', $row['musicCreater'], '</td>';
        echo '<td>', $row['category'], '</td>';
        echo '<td>', $row['musicURL'], '</td>';
        echo '<input type="hidden" name="listId" value="', $row['listId'], '">';
        echo '<td>';
        echo '<a href="music-delete-output.php?musicId=', $row['musicId'],'">削除</a>';
        echo '</td>';
        echo '</tr>';
        
    }
?>
    </table>
    </form>
    </body>
</html>
