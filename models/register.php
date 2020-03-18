<?php
if (!isreg())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	//$password=md5($password);
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT name FROM users WHERE login = '$login' ");
	$res = mysqli_num_rows($res);
	if ($res == 0) {
		$res = mysqli_query($link, "INSERT INTO users (`login`, `hash`, `name`, `phone`, `active`) VALUES ('$login', '$password', '$name', '$phone', 1) ");
		$new_data = array('response' => array('status' => 1));
	}
	else
		$new_data = array('response' => array('login' => 'existing', 'status' => 0));

}

	echo json_encode($new_data);