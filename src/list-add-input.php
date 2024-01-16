<?php session_start(); ?>
<?php
        const SERVER    = 'mysql220.phy.lolipop.lan';
        const DBNAME    = 'LAA1517513-final';
        const USER      = 'LAA1517513';
        const PASS      = 'Pass0222';

        $connect = 'mysql:host='. SERVER .';dbname='. DBNAME .';charset=utf8';
        ?>

<!DOCTYPE html>
    <html lang="ja">
        <head>
            <meta charset="UTF-8">
            <title>プレイリスト</title>
        <link rel="stylesheet" href="./css/list.css">
        </head>
        <body>
            <h1>新規プレイリストの作成</h1>
            <form action="list-add-output.php" method="POST">
                <br>
                リスト名<input type="text" name="listName"><br>
                <button type="submit">追加</button>
            </form>
        </body>
        </html>