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
		$own_cards = array();
		while($card = mysqli_fetch_array($res2)) 
			array_push($own_cards, $card['id']);

		$new_data = array('response' => array('id' => $data['id'], 'name' => $data['name'], 'phone' => $data['phone'], 'login' => $data['login']), 'own_cards' => $own_cards );
	}
	else
		$new_data = array('response' => array('login' => 'does not exist', 'status' => 0));

}
	echo json_encode($new_data);