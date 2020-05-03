<?php
if (!isgetcard())
	exit(json_encode(array('response' => 'no data')));
else
{
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT owner_id FROM card WHERE id = '$id_card'");
	$data = mysqli_fetch_array($res);
	if(jwt($data['owner_id'])){
		$res = mysqli_num_rows($res);
		if ($res > 0) {
			$res = mysqli_query($link, "SELECT * FROM card WHERE id = '$id_card'");
			$data = mysqli_fetch_array($res);

			$new_data = array(	'response' => array('id' => $data['id'],
								'owner_id' => $data['owner_id'],
								'name' => $data['name'],
								'caption' => $data['caption'],
								'last_update' => $data['timestamp']));
		}
		else
			$new_data = array('response' => array('error' => 'id_card does not exist', 'status' => 0));

		echo json_encode($new_data);
	}
	else
		echo json_encode(array('response' => array('error' => 'permittion denied', 'status' => 0)));
		
}