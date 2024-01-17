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
                <div class="Form">
                    <div class="Form-Item">
                        <p class="Form-Item-Label">
                        <span class="Form-Item-Label-Required">必須</span>リスト名
                        </p>
                        <input type="text" class="Form-Item-Input" name="listName">
                    </div>
                    <input type="submit" class="Form-Btn" value="追加">
                </div>  
            </form>
        </body>
        </html>