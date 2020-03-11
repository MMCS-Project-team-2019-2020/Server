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
function iscard()//есть ли визитка?
{
	if (isset($_GET['login']) && isset($_GET['card-name']) && isset($_GET['card-caption']))
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

