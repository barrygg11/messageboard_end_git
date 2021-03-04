<title>留言板</title>
<?php
date_default_timezone_set('Asia/Taipei');
$DateAndTime = date('Y-m-d h:i:s a', time());  
echo "目前時間 $DateAndTime.";
?>
<p><a href="view.php">查看留言</a>
<a href="register.php">註冊</a>
<a href="index.php">登入</a>
<html>
<meta charset="utf-8">
<form name="board" action="board.php" method="post">
姓名：<input type="text" name="name"><br>
主題：<input type="text" name="subject"><br>
內容：<textarea name="content"></textarea><br>
<p><input type="submit" name="submit" value="送出">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="Reset" value="清除">
</form>
</html>

<?php
if (isset($_POST['submit'])) {
    include "db.php";
    echo '成功送出';
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $sql = "INSERT book(name, subject, content, time) VALUES ('$name', '$subject', '$content', now())";
	if (!mysqli_query($db, $sql)) {
		die(mysqli_error());
	} else { 
        echo "
        <script>
                setTimeout(function(){window.location.href='view.php?name=" . $name . "';},500);
                </script>";
            }
        } else {
            echo '<div class="success">輸入完畢後請點擊<strong>送出</strong>.</div>';
        }
?>