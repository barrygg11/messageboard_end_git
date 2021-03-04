<title>編輯留言</title>
<html>
<?php
date_default_timezone_set('Asia/Taipei');
$DateAndTime = date('Y-m-d h:i:s a', time());  
echo "目前時間 $DateAndTime.";
$name = $_GET['name'];
$no = $_GET['no'];
?>
<body>
    <p><a href='view.php?name=" . $name . "&no=" . $no . "'>查看留言</a>
    <a href="index.php">登出</a>
    <a href="register.php">註冊</a>

<?php
include 'db.php';
$query = "SELECT * FROM book WHERE  no=" . $_GET['no'];
$result = mysqli_query($db, $query);
$no = $_GET['no'];
while ($rs = mysqli_fetch_array($result)) {
	?>
        <form name="edit" action="edit.php" method="post">
        留言順序:<input tyep="hidden" name="no" value="<?=$rs['no']?>"><p>
        姓名:<input type="text" name="name" value="<?=$_GET['name']?>"><p>
        主題:<input type="text" name="subject" value="<?=$rs['subject']?>"><p>
        內容:<textarea name="content"><?=$rs['content']?></textarea><p>
        <input type="submit" name="submit" value="儲存">
        <input type="reset" name="Reset" value="清除">
</form>
</body>
</html>

<?php 
}
if (isset($_POST['submit'])) {

	$no = $_POST['no'];
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$content = $_POST['content'];

	$sql = "update book set subject='$subject',content='$content' where no='$no'";
	if (!mysqli_query($db, $sql)) {
		die(mysqli_error());
	} else {
		echo "
         <script>
            setTimeout(function(){window.location.href='view.php?name=" . $name . "&no=" . $no . "';},0);
        </script>";
	}
} else {
	echo '<div class="success">修改完成後點擊儲存鍵.</div>';
}
?>