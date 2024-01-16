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
            <link rel="stylesheet" href="./css/music.css">
	</head>
	<body>
    <form action="music-delete-output.php" method="GET">
        <table>
    <tr><th>曲名</th><th>アーティスト名</th><th>カテゴリー</th><th>動画</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    if (isset($_GET['listId'])) {
        $listId = $_GET['listId'];
        $sql = $pdo->prepare('SELECT * FROM music WHERE listId = :listId order by musicId');
        $sql->bindParam(':listId', $listId, PDO::PARAM_INT);
        $sql->execute();
    foreach( $sql as $row ) {
        echo '<tr>';
        echo '<td>', $row['musicName'], '</td>';
        echo '<td>', $row['musicCreater'], '</td>';
        echo '<td>', $row['category'], '</td>';
        echo '<td>', $row['musicURL'], '</td>';
        echo '<td>';
        echo '<a href="music-delete-output.php?musicId=', $row['musicId'],'&listId=', $row['listId'], '">削除</a>';
        echo '</td>';
        echo '</tr>';
        
    }
}
?>
    </table>
    </form>
    </body>
</html>
