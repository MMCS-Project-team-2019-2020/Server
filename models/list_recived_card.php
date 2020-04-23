<?php
if (!islistcard())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT * FROM registry WHERE recipient_id = '$id_user'");
	$num = mysqli_num_rows($res);
	if ($num > 0) {
		$recipient_cards = array();
		while($request = mysqli_fetch_array($res)) {
			$recipient_cards[$request['card_id']] = $request['gps'];
		}
		$new_data = array('response' => array('cards' => $recipient_cards, 'status' => 1));
	}
	else
		$new_data = array('response' => array('error' => 'user_id have not cards', 'status' => 0));

}
	echo json_encode($new_data);
?>