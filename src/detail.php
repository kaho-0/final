<?php session_start(); ?>
<?php
        const SERVER    = 'mysql218.phy.lolipop.lan';
        const DBNAME    = 'LAA1517459-ensyu';
        const USER      = 'LAA1517459';
        const PASS      = 'Pass0515';

        $connect = 'mysql:host='. SERVER .';dbname='. DBNAME .';charset=utf8';
        ?>
<!DOCTYPE html>
    <html>
        <head>
        <meta charset="UTF-8">
        <title>プレイリスト</title>
        </head>
        <body>
            <?php
            $pdo = new PDO($connect, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            foreach ($data as $row) {
                $name=$row['listName'];
                $id=$row['listId']
                echo '$name';
                echo '<a href="detail.php?listId=',$id,'">',$row['listid'],'</a>';
            }

                ?>
       </body>
    </html>