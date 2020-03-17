<?php
//
if (!isgive())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	$res = mysqli_query($link,"SELECT name FROM users WHERE id = '$id_owner'");
	$res = mysqli_num_rows($res);

	if ($res > 0) {
		$res = mysqli_query($link,"SELECT name FROM users WHERE id = '$id_recipient'");
		$res = mysqli_num_rows($res);
	}
	else
		exit(json_encode(array('response' => array('id_owner' => 'does not exist', 'status' => 0))));
	if ($res > 0) {
		$res = mysqli_query($link,"SELECT name FROM card WHERE id = '$id_card'");
		$res = mysqli_num_rows($res);
	}
	else
		exit(json_encode(array('response' => array('id_recipient' => 'does not exist', 'status' => 0))));
	if ($res > 0) {
		$res = mysqli_query($link, "INSERT INTO registry (`card_id`, `owner_id`, `recipient_id`) VALUES ('$id_card', '$id_owner', '$id_recipient') ");
		$new_data = array('status' => 1);
	}
	else
		exit(json_encode(array('response' => array('id_card' => 'does not exist', 'status' => 0))));
}

echo json_encode($new_data);
