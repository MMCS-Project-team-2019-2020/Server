<?php
bool islp()//есть ли логин и пароль?
{
	if (isset($_POST['login']) && isset($_POST['password']))
		return true;
	else 
		return false;
}
?>