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
		<link rel="stylesheet" href="./css/music.css">
	</head>
	<body>
		<h1>プレイリストの編集</h1>
		<table class="design02">
    		<tr><th>曲名</th><th>アーティスト名</th><th>カテゴリー</th><th>動画</th><th>更新</th></tr>
		<?php
    $pdo=new PDO($connect, USER, PASS);
	$listId = $_GET['listId'];
	$sql = $pdo->prepare('SELECT * FROM music WHERE listId = :listId order by musicId');
	$sql->bindParam(':listId', $listId, PDO::PARAM_INT);
	$sql->execute();
	
	foreach ($sql as $row){
		echo '<form action="music-update-output.php" method="post">';
		echo '<input type="hidden" name="musicId" value="', $row['musicId'], '">';
		echo '<tr>';
		echo '<td>';
		echo '<input type="text" name="musicName" value="', $row['musicName'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="musicCreater" value="', $row['musicCreater'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="category" value="', $row['category'], '">';
		echo '</td> ';
        echo '<td>';
		echo '<input type="text" name="musicURL" value="', $row['musicURL'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '<input type="hidden" name="listId" value="', $row['listId'], '">';
		echo '</tr>';
	}
?>
	</table></form>
    </body>
</html>
