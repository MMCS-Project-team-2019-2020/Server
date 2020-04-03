<?php
//
if (!iscard())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT name FROM users WHERE id = '$id_user'");
	$num = mysqli_num_rows($res);
	if ($num > 0) {
		$res = mysqli_query($link,"SELECT id FROM card WHERE owner_id = '$id_user'");
		$num = mysqli_num_rows($res);
		if($num == 0)
		{
			$res = mysqli_query($link, "INSERT INTO card (`owner_id`, `name`, `caption`) VALUES ('$id_user', '$card_name', '$card_caption') ");
			$id_card=mysqli_insert_id($link);
			$new_data = array('response' => array('id_card' => $id_card, 'status' => 1));
		}
		else
			exit(json_encode(array('response' => array('user' => 'have not own over 1 card' , 'status' => 0))));
	}
else
	$new_data = array('response' => array('id' => 'does not exist', 'status' => 0));

echo json_encode($new_data);
}