<?php
function islp()//есть ли логин и пароль?
{
	if (isset($_GET['login']) && isset($_GET['password']))
		return true;
	else 
		return false;
}
function islogin()//есть ли логин?
{
	if (isset($_GET['login']))
		return true;
	else 
		return false;
}
function isiduser()//есть ли логин?
{
	if (isset($_GET['id_user']))
		return true;
	else 
		return false;
}
function isdeletecard()//есть ли логин?
{
	if (isset($_GET['id_card']) && isset($_GET['id_user']) && isset($_GET['token']))
		return true;
	else 
		return false;
}
function iscard()//есть ли визитка?
{
	if (isset($_GET['id_user']) && isset($_GET['card_name']) && isset($_GET['card_caption']) && isset($_GET['token']))
		return true;
	else 
		return false;
}
function isupdatecard()//есть ли визитка?
{
	if (isset($_GET['id_user']) && isset($_GET['id_card']) && (count($_GET) > 3) && isset($_GET['token']))
		return true;
	else 
		return false;
}
function isupdateuser()//есть ли визитка?
{
	if (isset($_GET['id_user']) && (count($_GET) > 2) && isset($_GET['token']))
		return true;
	else 
		return false;
}
function isgive()//есть ли шара?
{
	if (isset($_GET['id_owner']) && isset($_GET['id_recipient']) && isset($_GET['id_card']) && isset($_GET['gps']) && isset($_GET['token']))
		return true;
	else 
		return false;
}
function isreg()//есть ли регистрация?
{
	if (isset($_GET['name']) && isset($_GET['surname']) && isset($_GET['patronymic']) &&
	 	isset($_GET['company']) && isset($_GET['position']) && isset($_GET['phone']) && 
	 	isset($_GET['mail']) &&  isset($_GET['login']) && isset($_GET['password']) && isset($_GET['avatar']))
		return true;
	else 
		return false;
}
function islistcard()//есть ли список визиток для юзера?
{
	if (isset($_GET['id_user']) && isset($_GET['token']))
		return true;
	else 
		return false;
}
function isgetcard()//есть ли id визитки
{
	if (isset($_GET['id_card']) && isset($_GET['token']))
		return true;
	else 
		return false;
}
function jwt($gave_id_user)//Проверка токена
{
	$token = $_GET['token'];
	$res = mysqli_query(db_connect(),"SELECT id_user FROM tokens WHERE token = '$token'");
	$data = mysqli_fetch_array($res);
	if(mysqli_num_rows($res) > 0){
		if($data['id_user'] == $gave_id_user)
			return true;
	}
	else
		exit(json_encode(array('response' => 'bad token, please log in again', 'status' => 0)));
}
function console($action)//запись запроса в базу
{
	//$link = db_connect();
	$ip = $_SERVER['REMOTE_ADDR'];
	//$res = mysqli_query($link, "INSERT INTO queryes (`query`, `ip`) VALUES ('$action', '$ip') ");

	$date = date_default_timezone_set('Europe/Moscow');	
	$date = date("Y-m-d H:i:s");

	$current = "|Хост: ". $ip . "| |action: " . $action . "| |timestamp: ". $date ."|\n";
	file_put_contents("modules/queryes.txt", $current, FILE_APPEND | LOCK_EX);

	return true;
}

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-.';
 
function generate_string($input, $strength = 16) {//генератор случайных строк
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
function update_token($id_user) {//обновление токена при повторной авторизации
	$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-.';
	$token = md5(generate_string($permitted_chars, 25560));
	$res = mysqli_query(db_connect(),"SELECT token FROM tokens WHERE id_user = '$id_user'");
	if(mysqli_num_rows($res) > 0)

		mysqli_query(db_connect(), "UPDATE tokens SET token='$token' WHERE id_user = '$id_user' ");
	else

		mysqli_query(db_connect(), "INSERT INTO tokens (`token`, `role`, `id_user`) VALUES ('$token', 'User', '$id_user')");

	return $token;
}