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
            <a href="music-add-input.php">登録</a>
            <a href="delete-input.php">削除</a>
            <a href="update-input.php">更新</a>
            <?php
             $pdo = new PDO($connect, USER, PASS);
             
    if (isset($_GET['listId'])) {
        $listId = $_GET['listId'];
        $sql = $pdo->prepare('SELECT * FROM music WHERE listId = :listId order by ');
        $sql->bindParam(':listId', $listId, PDO::PARAM_INT);
        $sql->execute();
        echo '<table>';
        echo '<tr><th>曲名</th><th>アーティスト</th><th>動画</th></tr>';
        foreach ($sql as $row) {
            echo '<tr><td>';
            echo $row['musicName'];
            echo '</td><td>';
            echo $row['musicCreater'];
            echo '</td><td>';
            echo $row['musicURL'];
            echo '</td></tr>';
        }
        echo '</table>';
            }
                ?>

       </body>
    </html>