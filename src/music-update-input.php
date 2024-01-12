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
		<link rel="stylesheet" href="style.css">
		<title>プレイリスト</title>
	</head>
	<body>
		<div class="th0">楽曲ID</div>
		<div class="th1">曲名</div>
		<div class="th1">アーティスト名</div>
		<div class="th1">カテゴリー</div>
		<div class="th1">動画</div>
<?php
    $pdo=new PDO($connect, USER, PASS);

	foreach ($pdo->query('select * from music') as $row) {
		echo '<form action="music-update-output.php" method="post">';
		echo '<input type="hidden" name="musicId" value="', $row['musicId'], '">';
		echo '<div class="td0">', $row['musicId'], '</div>';
		echo '<div class="td1">';
		echo '<input type="text" name="musicName" value="', $row['musicName'], '">';
		echo '</div> ';
		echo '<div class="td1">';
		echo '<input type="text" name="musicCreater" value="', $row['musicCreater'], '">';
		echo '</div> ';
		echo '<div class="td1">';
		echo '<input type="text" name="category" value="', $row['category'], '">';
		echo '</div> ';
        echo '<div class="td1">';
		echo '<input type="text" name="musicURL" value="', $row['musicURL'], '">';
		echo '</div> ';
		echo '<div class="td2"><input type="submit" value="更新"></div>';
		echo '<input type="hidden" name="listId" value="', $row['listId'], '">';
		echo '</form>';
		echo "\n";
	}
?>

    </body>
</html>
