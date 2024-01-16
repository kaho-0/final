<?php session_start(); ?>
<?php
        const SERVER    = 'mysql220.phy.lolipop.lan';
        const DBNAME    = 'LAA1517513-final';
        const USER      = 'LAA1517513';
        const PASS      = 'Pass0222';

        $connect = 'mysql:host='. SERVER .';dbname='. DBNAME .';charset=utf8';
        ?>
<!DOCTYPE html>
    <html>
        <head>
        <meta charset="UTF-8">
        <title>プレイリスト</title>
        <link rel="stylesheet" href="./css/list.css">
        </head>
        <body>
            <h1>プレイリスト</h1>
            <div class="button_solid017">
                <a href="list-add-input.php">登録</a>
                <a href="list-update-input.php">更新</a>
                <a href="list-delete-input.php">削除</a>
            </div>
            <?php
            $pdo = new PDO($connect, USER, PASS);
            $sql = $pdo->prepare('select * from list');
            $sql->execute();
            echo '<br>';
            
            foreach ($sql as $row) {
                $name=$row['listName'];
                $id=$row['listId'];
                echo '<div class="button001"><a href="detail.php?listId=', $id, '">',$row['listName'],'</a></div>';
            }
                ?>
       </body>
    </html>