<title>所有留言</title>
<html>
<?php
date_default_timezone_set('Asia/Taipei');
$DateAndTime = date('Y-m-d h:i:s a', time());  
echo "當前時間 $DateAndTime.";
$name = $_GET['name'];
?>
<p>
<body>
<?php
	if (!$name) {
	echo '<a href="index.php">登入</a>';
} else {
echo "<a href='board.php?name=" . $name . "'>繼續寫留言</a>&nbsp;&nbsp;";
echo '<a href="index.php">登出</a><p>';
}?>

<?php
session_start();
include "db.php";
$sql = "select * from book";
$result = mysqli_query($db, $sql);
$_SESSION['name'] = $name = $_GET['name'];
while ($row = mysqli_fetch_assoc($result)) {
	echo "<br>姓名： " . $row['name'];
	echo "<br>主題： " . $row['subject'];
	echo "<br>內容： " . nl2br($row['content']) . "<br>";
	if ($name == $row['name']) {
		echo '<a href=" edit.php?no=' . $row['no'] . '&name=' . $name . '">
		編輯訊息內容</a>&nbsp|&nbsp<a href="delete.php?no=' . $row['no'] . '">刪除訊息</a><br>';
	}
	echo "時間:" . $row['time'] . "<br>";
	echo "<hr>";
}
echo "<br>";
echo "總共有 " . mysqli_num_rows($result) . " 筆留言.";
?>
</body>
</html>