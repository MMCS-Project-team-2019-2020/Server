<?php
if (!isreg())
	exit(json_encode(array('response' => 'no data')));
else
{
	$link = db_connect();
	console($action);
	$password=md5($password);
	$res = mysqli_query($link,"SELECT name FROM users WHERE BINARY login = '$login' ");
	$res = mysqli_num_rows($res);
	if ($res == 0) {
		$res = mysqli_query($link, "INSERT INTO users (`name`, `surname`, `patronymic`, `company`,
													   `position`, `mail`, `phone`, `login`, `hash`,`avatar`, `active`) 
									VALUES	('$name', '$surname', '$patronymic', '$company', '$position',
											 '$mail', '$phone', '$login', '$password', '$avatar', 1)");
		
		$id_user=mysqli_insert_id($link);

		//TOKEN//
		$token = md5(generate_string($permitted_chars, 25560));
		$role = "User";
		//TOKEN//
		$res = mysqli_query($link, "INSERT INTO tokens (`token`, `role`, `id_user`) VALUES ('$token', '$role', '$id_user')");


		$new_data = array('response' => array('id_user' => $id_user, 'token' => $token,  'status' => 1));
	}
	else
		$new_data = array('response' => array('error' => 'login is now existing', 'status' => 0));

}

	echo json_encode($new_data);