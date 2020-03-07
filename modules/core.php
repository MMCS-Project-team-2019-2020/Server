<?php
function islp()//есть ли логин и пароль?
{
	if (isset($_GET['login']) && isset($_GET['password']))
		return true;
	else 
		return false;
}
