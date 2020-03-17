<?php
if (!islp())
	exit(json_encode(array('response' => 'no data')));
else
{
include("db.php");
//$password=md5($password);
$link = db_connect();
$res = mysqli_query($link,"SELECT name FROM users WHERE login = '$login' AND hash = '$password'");
$res = mysqli_num_rows($res);
if ($res > 0) {
	$status = array('response' => array('status' => 1));
}
else
	$status = array('response' => array('login_or_password' => 'does not exist', 'status' => 0));

echo json_encode($status);
}