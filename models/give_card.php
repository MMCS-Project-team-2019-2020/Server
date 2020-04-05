<?php
//
if (!isgive())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT name FROM users WHERE id = '$id_owner'");//проверка на существование id владельца в базе
	$res = mysqli_num_rows($res);

	if ($res > 0) {
		$res = mysqli_query($link,"SELECT name FROM users WHERE id = '$id_recipient'");//проверка на существование id получателя в базе
		$res = mysqli_num_rows($res);
	}
	else
		exit(json_encode(array('response' => array('error' => 'id_owner does not exist', 'status' => 0))));
	if ($res > 0) {
		$res = mysqli_query($link,"SELECT name FROM card WHERE id = '$id_card' AND owner_id = '$id_owner'");//проверка на существование визитки у этого пользователя
		$res = mysqli_num_rows($res);
	}
	else
		exit(json_encode(array('response' => array('error' => 'id_recipient does not exist', 'status' => 0))));
	if ($res > 0) {
		$res = mysqli_query($link,"SELECT card_id FROM registry WHERE recipient_id = '$id_recipient' AND card_id = '$id_card'");
		$num = mysqli_num_rows($res);
			if($num != 0)
				exit(json_encode(array('response' => array('error' => 'id_card already exists with this user.', 'status' => 0))));

		$res = mysqli_query($link, "INSERT INTO registry (`card_id`, `owner_id`, `recipient_id`) VALUES ('$id_card', '$id_owner', '$id_recipient') ");
		$id_operation=mysqli_insert_id($link);
		$new_data = array('response' => array('id_operation' => $id_operation,'status' => 1));
	}
	else
		exit(json_encode(array('response' => array('error' => 'id_card does not exist for this user', 'status' => 0))));
}

echo json_encode($new_data);
