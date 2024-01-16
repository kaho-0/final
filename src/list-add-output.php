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
                $pdo = new PDO($connect, USER, PASS);
                $sql = $pdo ->prepare('insert into list(listName) values(?)');
                if ( empty($_POST['listName'])) {
                    echo 'リスト名を入力してください';
                    echo '<a href="list-add-input.php">登録画面に戻る</a>';
                } else if ( $sql->execute([$_POST['listName']])){
                    echo '追加に成功しました。';
                    echo '<a href="index.php">プレイリスト一覧に戻る</a>';
                } else {
                    echo '追加に失敗しました。';
                    echo '<a href="list-add-input.php">登録画面に戻る</a>';
                } 
            ?>
            <br><hr><br>
            
        </body>
    </html>