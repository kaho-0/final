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
        </head>
        <body>
            <h1>プレイリストへ曲の追加</h1>
            <form action="music-add-output.php" method="POST">
                <?php
                $pdo = new PDO($connect, USER, PASS);
                $sql = $pdo->prepare('SELECT * FROM list');
                $sql->execute();

                echo '<select name="listId">';
                foreach( $sql as $row ){
                    echo '<option value="' , $row['listId'] , '">' , $row['listName'] , '</option>';
                }
                echo '</select>';
                ?>
                <br>
                曲名<input type="text" name="name"><br>
                アーティスト<input type="text" name="creater"><br>
                カテゴリ<input type="text" name="category"><br>
                楽曲URL<input type="text" name="URL"><br>
                埋め込みURLの[https://～]以降のURLのみを登録すると、プレイリスト画面で動画の再生が可能です
                <button type="submit">追加</button>
            </form>
        </body>
        </html>