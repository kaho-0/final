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
            <link rel="stylesheet" href="./css/music.css">
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
                <div class="Form">
                  <div class="Form-Item">
                    <p class="Form-Item-Label">
                      <span class="Form-Item-Label-Required">必須</span>曲名
                        </p>
                            <input type="text" class="Form-Item-Input" name="name" placeholder="例）青と夏">
                            </div>
                                <div class="Form-Item">
                                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>アーティスト名</p>
                                    <input type="text" class="Form-Item-Input" name="creater" placeholder="例）Mrs. GREEN APPLE">
                                </div>
                                <div class="Form-Item">
                                    <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>カテゴリー</p>
                                    <input type="text" class="Form-Item-Input" name="category" placeholder="例）J-POP">
                                </div>
                                    <div class="Form-Item">
                                        <p class="Form-Item-Label">楽曲URL</p>
                                        <input type="text" class="Form-Item-Input" name="URL" placeholder="例）https://www.youtube.com/embed/m34DPnRUfMU?si=pswBuJoaM9gSCuMj">
                                    </div>
                                    <input type="submit" class="Form-Btn" value="追加">
                                </div>  
                            </form>
                        </body>
                    </html>