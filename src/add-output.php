<?php
    const SERVER = 'mysql215.phy.lolipop.lan';
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
        </head>
        <body>
            <?php
                $pdo = new PDO($connect, USER, PASS);
                $sql = $pdo ->prepare('insert into music(musicName, musicCreater, category, musicURL) values(?, ?, ?, ?)');
                if ( !preg_match('/^\d+$/',$_POST['id'])){
                    echo 'リスト';
                } else if ( empty($_POST['name'])) {
                    echo '曲名を入力してください。';
                } else if ( empty($_POST['creater'])) {
                    echo 'アーティストを入力してください。';
                }    else if ( $sql->execute([$_POST['id'],$_POST['name'],$_POST['creater'],$_POST['musicURL']])){
                    echo '<font color="red"> 追加に成功しました。</font>';
                } else {
                    echo '<font color="red"> 追加に失敗しました。</font>';
                } 
            ?>
            <br><hr><br>
            <form action="detail.php" method="post">
                <button type="submit">追加画面へ戻る</button>
            </form>
        </body>
    </html>