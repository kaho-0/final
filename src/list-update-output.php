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
    </head>
    <body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update list set listName = ? where listId = ?');
    if ( empty($_POST['listName'])) {
        echo 'リスト名を入力してください。';
    } else if($sql->execute([htmlspecialchars($_POST['listName']),$_POST['listId']])){
        echo '更新に成功しました。';
    } else{
        echo '更新に失敗しました。';
    }
    echo '<a href="index.php">プレイリスト一覧</a>';
?>
    </body>
</html>

