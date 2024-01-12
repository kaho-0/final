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
            <?php
                $pdo = new PDO($connect, USER, PASS);
                $sql = $pdo ->prepare('insert into music(listId, musicName, musicCreater, category, musicURL) values(?, ?, ?, ?, ?)');
                if ( empty($_POST['name'])) {
                    echo '曲名を入力してください。';
                } else if ( empty($_POST['musicCreater'])) {
                    echo 'アーティストを入力してください。';
                } else if ( empty($_POST['category'])) {
                    echo 'カテゴリーを入力してください。';
                } else if ( $sql->execute([$_POST['listId'],$_POST['name'],$_POST['creater'],$_POST['category'],$_POST['URL']])){
                    echo '追加に成功しました。';
                } else {
                    echo '追加に失敗しました。';
                } 
                echo '<a href="detail.php?listId=', $_POST['listId'], '">プレイリストに戻る</a>';
            ?>
            <br><hr><br>
            
        </body>
    </html>