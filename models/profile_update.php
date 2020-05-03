<?php
//
if (!isupdateuser())
	exit(json_encode(array('response' => 'no data')));
else
{
	$link = db_connect();
	if(jwt($id_user)){
		console($action);
		$res = mysqli_query($link,"SELECT name FROM users WHERE id = '$id_user'");
		$num = mysqli_num_rows($res);
		if ($num > 0) {
			$res = mysqli_query($link, "UPDATE users SET name='$name', surname='$surname', patronymic='$patronymic', company='$company', position='$position', mail='$mail', 
														 phone='$phone', avatar='$avatar' WHERE id = '$id_user' ");
			$new_data = array('response' => array('id_user' => $id_user. " updated", 'status' => 1));
		}
		else
			$new_data = array('response' => array('error' => 'id_user does not exist', 'status' => 0));

	echo json_encode($new_data);
	}
	else
		echo json_encode(array('response' => array('error' => 'permittion denied', 'status' => 0)));
}