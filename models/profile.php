<?php
if (!islogin())
	exit();
else
{
include("db.php");
$link = db_connect();
$res = mysqli_query($link,"SELECT name FROM users WHERE login = '$login'");
$res = mysqli_num_rows($res);
if ($res > 0) {
	$res = mysqli_query($link, "SELECT * FROM users WHERE login = '$login'");
	$data = mysqli_fetch_array($res);
	$new_data = array('id' => $data['id'], 'name' => $data['name'], 'phone' => $data['phone'], 'login' => $data['login']);
}
else{
	$new_data = array('status' => "not exist user");
}
echo json_encode($new_data);
}
