<?php
//
if (!isupdatecard())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT name FROM users WHERE id = '$id_user'");
	$num = mysqli_num_rows($res);
	if ($num > 0) {
		$res = mysqli_query($link,"SELECT name FROM card WHERE id = '$id_card' AND owner_id = '$id_user'");
		$count_cards = mysqli_num_rows($res);
		if($count_cards > 0)
		{
			$res = mysqli_query($link, "UPDATE card SET name = '$card_name', caption = '$card_caption' WHERE id = '$id_card' ");
			$new_data = array('response' => array('id_card' => $id_card, 'status' => 1));
		}
		else
			exit(json_encode(array('response' => array('error' => 'user have not card or card does not exist' , 'status' => 0))));
	}
else
	$new_data = array('response' => array('error' => 'id_user does not exist', 'status' => 0));

echo json_encode($new_data);
}