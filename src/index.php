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
            <?php
            $pdo = new PDO($connect, USER, PASS);
            $sql = $pdo->prepare('select * from list');
            $sql->execute();
            foreach ($sql as $row) {
                $name=$row['listName'];
                $id=$row['listId'];
                echo '<a href="detail.php?listId=', $id, '">',$row['listName'],'</a>';
                echo '<br>';
            }
                ?>
       </body>
    </html>