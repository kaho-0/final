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
<?php
    $listId = $_GET['listId'];
    try {
    $pdo=new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $music_sql = 'DELETE FROM music WHERE listId = :listId';
    $music_stmt = $pdo->prepare($music_sql);
    $music_stmt->bindParam(':listId', $listId, PDO::PARAM_INT);
    $music_stmt->execute();

    $sql=$pdo->prepare('delete from list where listId = ?');
    $sql->execute([$_GET['listId']]);
        echo '<div class="box2">削除に成功しました</div>';
    } catch (PDOException $e) {
        echo '<div class="box2">削除中にエラーが発生しました: ' . $e->getMessage(). '</div>';
    } finally {
        $pdo = null;
    }
    echo '<div class="button_solid017"><a href="index.php">プレイリスト一覧に戻る</a></div>';
?>
    </body>
</html>

