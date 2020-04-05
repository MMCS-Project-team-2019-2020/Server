<?php
if (!isgetcard())
	exit(json_encode(array('response' => 'no data')));
else
{
	include("db.php");
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT name FROM card WHERE id = '$id_card'");
	$res = mysqli_num_rows($res);
	if ($res > 0) {
		$res = mysqli_query($link, "SELECT * FROM card WHERE id = '$id_card'");
		$data = mysqli_fetch_array($res);

		$new_data = array('response' => array('id' => $data['id'], 'owner_id' => $data['owner_id'], 'name' => $data['name'],  'caption' => $data['caption']));
	}
	else
		$new_data = array('response' => array('erorr' => 'id_card does not exist', 'status' => 0));

}
	echo json_encode($new_data);