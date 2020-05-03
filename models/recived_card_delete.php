<?php
//
if (!isdeletecard())
	exit(json_encode(array('response' => 'no data')));
else
{
	$link = db_connect();
	if(jwt($id_user)){
		console($action);
		$res = mysqli_query($link,"SELECT card_id FROM registry WHERE recipient_id = '$id_user' AND card_id = '$id_card'");
		$num = mysqli_num_rows($res);
			if($num != 0){
				$res = mysqli_query($link,"DELETE FROM registry WHERE recipient_id = '$id_user' AND card_id = '$id_card'");
				$new_data = array('response' => array('card_id' => $id_card ." deleted", 'status' => 1));
			}
			else
				$new_data = array('response' => array('error' => 'user have not this card', 'status' => 0));

			echo json_encode($new_data);
	}
	else
		echo json_encode(array('response' => array('error' => 'permittion denied', 'status' => 0)));
}