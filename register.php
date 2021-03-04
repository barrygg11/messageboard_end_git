<title>註冊使用者</title>
<?php
date_default_timezone_set('Asia/Taipei');
$DateAndTime = date('Y-m-d h:i:s a', time());  
echo "目前時間 $DateAndTime.";
?>
<p><a href="index.php">登入</a></p>
<html>
<body>
<meta charset="utf-8">
<form name="register" action="register.php" method="post">
<p>使用者 : <input type=text name="name"></p>
<p>密碼 : <input type=password name="password"></p>
<input type="submit" name="submit" value="註冊">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Ｒeset" value="清除">
</form>
</body>
</html>

<?php
header("Content-Type: text/html; charset=utf8");
if (isset($_POST['submit'])) { 
	include 'db.php';
	$name = $_POST['name'];
	$password = $_POST['password'];
	if ($name && $password) {
		$sql = "select * from user where name = '$name'";
		$result = mysqli_query($db, $sql);
		$rows = mysqli_num_rows($result);
		if (!$rows) { 
			$sql = "insert user(id, name, password) values (null, '$name', '$password')";
			mysqli_query($db, $sql);

			if (!$result) {
				die('Error: '.mysqli_error());
			} else {
				echo "<script>alert('註冊成功！'); location.href = 'index.php';</script>";
			}
		} else { 
			echo "<script>alert('此使用者已被使用過！'); location.href = 'register.php';</script>";
		}
	} else {
		echo "<script>alert('此使用者已被使用過！'); location.href = 'register.php';</script>";
	}
mysqli_close($db);
}
?>