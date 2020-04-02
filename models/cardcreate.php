<?php
//
if (!iscard())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT name FROM users WHERE login = '$login'");
	$res = mysqli_num_rows($res);
	if ($res > 0) {
		$res = mysqli_query($link, "SELECT id FROM users WHERE login = '$login'");
		$data = mysqli_fetch_array($res);
		$user_id = $data['0'];
		$res = mysqli_query($link, "INSERT INTO card (`owner_id`, `name`, `caption`) VALUES ('$user_id', '$card_name', '$card_caption') ");
		$id_card=mysqli_insert_id($link);
		$new_data = array('response' => array('id_card' => $id_card, 'status' => 1));
}
else
	$new_data = array('response' => array('login' => 'does not exist', 'status' => 0));

echo json_encode($new_data);
}