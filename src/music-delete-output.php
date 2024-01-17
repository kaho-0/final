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
        echo '<div class="box2">削除に成功しました</div>';
    } else {
        echo '<div class="box2">削除に失敗しました</div>';
    }
    echo '<div class="button_solid017"><a href="detail.php?listId=', $_GET['listId'], '">プレイリストに戻る</a></div>';
?>
    </body>
</html>

