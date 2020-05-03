<?php
if (!islp())
	exit(json_encode(array('response' => 'no data')));
else
{
	$link = db_connect();
	console($action);
	$password = md5($password);
	$res = mysqli_query($link,"SELECT id FROM users WHERE BINARY login = '$login' AND hash = '$password'");
	$data = mysqli_fetch_array($res);
	$res = mysqli_num_rows($res);
	if ($res > 0){
		$id_user = $data['id'];
		$token = update_token($id_user);

		$new_data = array('response' => array('id_user' => $id_user, 'token' => $token, 'status' => 1));
	}
	else
		$new_data = array('response' => array('error' => 'login_or_password does not exist', 'status' => 0));

}
echo json_encode($new_data);