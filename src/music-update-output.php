<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
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
        <link rel="stylesheet" href="./css/music.css">
    </head>
    <body>
        <style>
            backgraund-color: #F8DFD4;
        </style>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update music set musicName=?, musicCreater=?, category=?, musicURL=? where musicId=?');
    if ( empty($_POST['musicName'])) {
        echo '曲名を入力してください。';
    } else if ( empty($_POST['musicCreater'])) {
        echo 'アーティスト名を入力してください。';
    } else if ( empty($_POST['category'])) {
        echo 'カテゴリーを入力してください。';
    } else if($sql->execute([htmlspecialchars($_POST['musicName']),$_POST['musicCreater'],$_POST['category'],$_POST['musicURL'],$_POST['musicId']])){
        echo '<div class="box2">更新に成功しました。</div>';
    } else{
        echo '<div class="box2">更新に失敗しました。</div>';
    }
    echo '<br>';
    echo '<div class="button_solid017"><a href="detail.php?listId=', $_POST['listId'], '">プレイリストに戻る</a></div>';
?>
    </body>
</html>



