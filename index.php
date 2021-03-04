<title>登入</title>
<?php
date_default_timezone_set('Asia/Taipei');
$DateAndTime = date('Y-m-d h:i:s a', time());  
echo "目前時間 $DateAndTime.";
?>
<html>
<body>
<p><a href="register.php">註冊</a></p>
<form name="login" action="index.php" method="post">
<p>使用者 : <input type=text name="name"></p>
<p>密碼 : <input type=password name="password"></p>
<input type="submit" name="submit" value="登入">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Reset" value="清除">
</body>
</html>

<?php
header("Content-Type: text/html; charset=utf8");
if (isset($_POST['submit'])) {
	include 'db.php';
	$name = $_POST['name'];
	$password = $_POST['password'];

	if ($name && $password) {
		$sql = "select * from user where name = '$name' and password='$password'";
		$result = mysqli_query($db, $sql);
		$rows = mysqli_num_rows($result);
		if ($rows) {
			echo "<script>alert('登入成功!'); location.href = 'board.php';</script>";
			exit;
		} else {
			echo "<script>alert('使用者or密碼有問題!'); location.href = 'index.php';</script>";
		}
	} else {
		echo "<script>alert('內容不完整!'); location.href = 'index.php';</script>";
	}
	mysqli_close();
}
?>