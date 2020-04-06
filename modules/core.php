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
	if (isset($_GET['id_card']) && isset($_GET['id_user']))
		return true;
	else 
		return false;
}
function iscard()//есть ли визитка?
{
	if (isset($_GET['id_user']) && isset($_GET['card_name']) && isset($_GET['card_caption']))
		return true;
	else 
		return false;
}
function isupdatecard()//есть ли визитка?
{
	if (isset($_GET['id_user']) && isset($_GET['id_card']) && isset($_GET['card_name']) && isset($_GET['card_caption']))
		return true;
	else 
		return false;
}
function isgive()//есть ли шара?
{
	if (isset($_GET['id_owner']) && isset($_GET['id_recipient']) && isset($_GET['id_card']))
		return true;
	else 
		return false;
}
function isreg()//есть ли регистрация?
{
	if (isset($_GET['name']) && isset($_GET['surname']) && isset($_GET['patronymic']) &&
	 	isset($_GET['company']) && isset($_GET['position']) && isset($_GET['phone']) && 
	 	isset($_GET['mail']) &&  isset($_GET['login']) && isset($_GET['password']))
		return true;
	else 
		return false;
}
function islistcard()//есть ли список визиток для юзера?
{
	if (isset($_GET['id_user']))
		return true;
	else 
		return false;
}
function isgetcard()//есть ли id итки
{
	if (isset($_GET['id_card']))
		return true;
	else 
		return false;
}
function console($action)//запись запроса в базу
{
	$date = date_default_timezone_set('Europe/Moscow');
	$date = date('H:i:s d-m-Y');
	$link = db_connect();
	$ip = $_SERVER['REMOTE_ADDR'];
	$res = mysqli_query($link, "INSERT INTO queryes (`query`, `ip`, `date_time`) VALUES ('$action', '$ip', '$date') ");

	return true;
}

