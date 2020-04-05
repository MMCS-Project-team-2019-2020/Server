<?php
if (!islp())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT id FROM users WHERE login = '$login' AND hash = '$password'");
	$data = mysqli_fetch_array($res);
	$res = mysqli_num_rows($res);
	if ($res > 0)
		$new_data = array('response' => array('id_user' => $data['id'],'status' => 1));
	else
		$new_data = array('response' => array('error' => 'login_or_password does not exist', 'status' => 0));

}
echo json_encode($new_data);