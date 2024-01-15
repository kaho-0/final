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
        </head>
        <body>
            <h1>プレイリスト</h1>
            <a href="list-add-input.php">登録</a>
            <?php
            $pdo = new PDO($connect, USER, PASS);
            $sql = $pdo->prepare('select * from list');
            $sql->execute();

            // 更新ボタン
            echo '<form action="list-update-input.php" method="post">';
            echo '<input type="hidden" name="musicId" value="', $row['musicId'], '">';
            echo '<button type="submit">更新</button>';
            echo '</form>';
    
            // 削除ボタン
            echo '<form action="list-delete-input.php" method="post">';
            echo '<input type="hidden" name="musicId" value="', $row['musicId'], '">';
            echo '<button type="submit">削除</button>';
            echo '</form>';
            foreach ($sql as $row) {
                $name=$row['listName'];
                $id=$row['listId'];
                echo '<a href="detail.php?listId=', $id, '">',$row['listName'],'</a>';
                echo '<br>';
            }
                ?>
       </body>
    </html>