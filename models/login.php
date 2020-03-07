<?php
if (!islp())
	exit();
else
{
include("db.php");
//$password=md5($password);
$link = db_connect();
$res = mysqli_query($link,"SELECT name FROM users WHERE login = '$login' AND hash = '$password'");
$res = mysqli_num_rows($res);
if ($res > 0) {
	$status = array('status' => 1);
}
else
	$status = array('status' => 0);

echo json_encode($status);
}