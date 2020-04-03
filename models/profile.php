<?php
if (!islogin())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT name FROM users WHERE login = '$login'");
	$res = mysqli_num_rows($res);
	if ($res > 0) {
		$res = mysqli_query($link, "SELECT * FROM users WHERE login = '$login'");
		$data = mysqli_fetch_array($res);
		$user_id = $data['id'];
		$res2 = mysqli_query($link, "SELECT id FROM card WHERE owner_id = '$user_id'");
		$own_card = mysqli_fetch_array($res2);

		$new_data = array('response' => array(	'id' => $data['id'],
												'name' => $data['name'],
												'surname' => $data['surname'],
												'patronymic' => $data['patronymic'], 
												'company' => $data['company'], 
												'position' => $data['position'], 
												'mail' => $data['mail'], 
												'phone' => $data['phone'], 
												'login' => $data['login'], 
												'own_card' => $own_card['id']));
	}
	else
		$new_data = array('response' => array('login' => 'does not exist', 'status' => 0));

}
	echo json_encode($new_data);