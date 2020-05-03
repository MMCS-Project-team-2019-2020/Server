<?php
if (!islogin())
	exit(json_encode(array('response' => 'no data')));
else
{
	$link = db_connect();
	console($action);
	$res = mysqli_query($link,"SELECT name FROM users WHERE BINARY login = '$login' ");
	$res = mysqli_num_rows($res);
	if ($res > 0 ) {
		$new_data = array('response' => array('status' => 1));
	}
	else
		$new_data = array('response' => array('error' => 'login doesnt existing', 'status' => 0));

}

	echo json_encode($new_data);