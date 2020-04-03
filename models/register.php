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
		$res = mysqli_query($link, "INSERT INTO users	(`name`, `surname`, `patronymic`, `company`, `position`, `mail`, `phone`, `login`, `hash`, `active`) 
											VALUES	('$name', '$surname', '$patronymic', '$company', '$posotion', '$mail', '$phone', '$login', '$password', 1)");
		$id_user=mysqli_insert_id($link);
		$new_data = array('response' => array('id_user' => $id_user, 'status' => 1));
	}
	else
		$new_data = array('response' => array('erorr' => 'login is now existing', 'status' => 0));

}

	echo json_encode($new_data);