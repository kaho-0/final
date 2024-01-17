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
        <link rel="stylesheet" href="./css/list.css">
    </head>
    <body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update list set listName = ? where listId = ?');
    if ( empty($_POST['listName'])) {
        echo '<div class="box2">リスト名を入力してください。</div>';
    } else if($sql->execute([htmlspecialchars($_POST['listName']),$_POST['listId']])){
        echo '<div class="box2">更新に成功しました。</div>';
    } else{
        echo '<div class="box2">更新に失敗しました。</div>';
    }
    echo '<div class="button_solid017"><a href="index.php">プレイリスト一覧</a></div>';
?>
    </body>
</html>

