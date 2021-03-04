<?php
include "db.php";
session_start();
$no = $_GET['no'];
$sql = "delete from book where no='$no'";
$name = $_SESSION['name'];
mysqli_query($db, $sql);
if (!mysqli_query($db, $sql)) {
	die(mysqli_error());
} else {
	echo "
         <script>
            setTimeout(function(){window.location.href='view.php?name=" . $name . "&no=" . $no . "';},300);
        </script>";

}