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
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from music where musicId = ?');
    if ( $sql->execute([$_GET['musicId']])){
        echo '削除に成功しました';
    } else {
        echo '削除に失敗しました';
    }
    echo '<a href="detail.php?listId=', $_GET['listId'], '">プレイリストに戻る</a>';
?>
    </body>
</html>

