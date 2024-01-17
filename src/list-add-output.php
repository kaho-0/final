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
                    echo '<div class="box2">リスト名を入力してください</div>';
                    echo '<div class="button_solid017"><a href="list-add-input.php">登録画面に戻る</a></div>';
                } else if ( $sql->execute([$_POST['listName']])){
                    echo '<div class="box2">追加に成功しました。';
                    echo '<div class="button_solid017"><a href="index.php">プレイリスト一覧に戻る</a></div>';
                } else {
                    echo '<div class="box2">追加に失敗しました。';
                    echo '<div class="button_solid017"><a href="list-add-input.php">登録画面に戻る</a></div>';
                } 
            ?>
            <br><br>
            
        </body>
    </html>