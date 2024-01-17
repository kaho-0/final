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
        <link rel="stylesheet" href="./css/music.css">
        </head>
        <body>
            <h1>プレイリスト</h1>
            <?php
             $pdo = new PDO($connect, USER, PASS);
             
    if (isset($_GET['listId'])) {
        $listId = $_GET['listId'];
        $sql = $pdo->prepare('SELECT * FROM music WHERE listId = :listId order by musicId');
        $sql->bindParam(':listId', $listId, PDO::PARAM_INT);
        $sql->execute();
        
        echo '<div class="button_solid017"><a href="music-add-input.php">登録</a>';

        // 更新ボタン
        echo '<a href="music-update-input.php?listId=', $listId, '">更新</a>';

        // 削除ボタン
        echo '<a href="music-delete-input.php?listId=', $listId, '">削除</a>';

        echo '<a href="index.php">プレイリスト一覧</a></div>';

        echo '<br><br>';
        echo '<table class="design02">';
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

            if (!empty($row['musicURL'])){
                $youtube_url = $row['musicURL'];
		    if (strpos($youtube_url, "embed")) {
                $youtube = '<iframe width="336" height="189" src="'. $row['musicURL']. '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
            } else {
                $youtube = '<a href="'. $row['musicURL']. '"> '. $row['musicName']. 'をYouTubeで聴く</a>';
            }
            } else {
                $youtube = 'URLが登録されていません。';
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