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
            <?php
             $pdo = new PDO($connect, USER, PASS);
             
    if (isset($_GET['listId'])) {
        $listId = $_GET['listId'];
        $sql = $pdo->prepare('SELECT * FROM music WHERE listId = :listId order by musicId');
        $sql->bindParam(':listId', $listId, PDO::PARAM_INT);
        $sql->execute();
        
        // 更新ボタン
        echo '<form action="music-update-input.php" method="post">';
        echo '<input type="hidden" name="musicId" value="', $row['musicId'], '">';
        echo '<button type="submit">更新</button>';
        echo '</form>';

        // 削除ボタン
        echo '<form action="music-delete-input.php" method="post">';
        echo '<input type="hidden" name="musicId" value="', $row['musicId'], '">';
        echo '<button type="submit">削除</button>';
        echo '</form>';

        echo '<table>';
        echo '<tr><th>曲名</th><th>アーティスト</th><th>カテゴリ</th><th>動画</th><th></th></tr>';
        foreach ($sql as $row) {
            echo '<tr><td>';
            echo $row['musicName'];
            echo '</td><td>';
            echo $row['musicCreater'];
            echo '</td><td>';
            echo $row['category'];
            echo '</td><td>';
            $youtube = $data = null;
        if (isset($row['musicURL']) == true){

		if (strpos($youtube_url, "embed")) {
            $youtube = '<iframe width="560" height="315" src="'. $row['musicURL']. '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
        } else {
            $youtube = '<a href="'. $row['musicURL']. '" value="'. $row['musicName']. 'をYouTubeで聴く"></a>';
        }
        } else {
            echo 'URLが登録されていません。';
        }
            echo $youtube;
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
            }
                ?>

       </body>
    </html>