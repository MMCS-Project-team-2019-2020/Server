<?php
include('modules/core.php');
if (isset($_GET['action']))
	$action = $_GET['action'];
else
	exit(json_encode(array('response' => 'no action')));

if (islp()) {
	$login = $_GET['login'];
	$password = $_GET['password'];
}
if (islogin()) {
	$login = $_GET['login'];
}
if (iscard()) {
	$login = $_GET['login'];
	$card_name = $_GET['card-name'];
	$card_caption = $_GET['card-caption'];
}
if (isgive()) {
	$id_owner = $_GET['id_owner'];
	$id_recipient = $_GET['id_recipient'];
	$id_card = $_GET['id_card'];
}



//Запрос - логинится//Пример:   ?action=login&login=vasya&password=4testtststs
if ($action == "login") {
	require("models/login.php");
}
//Запрос - регистрация//Пример:   ?action=register&login=vasya&password=4testtststs&name=Василий&phone=89995556677
if ($action == "register") {
	require("models/register.php");
}
//Запрос - получить профиль(данные акка)//Пример:   ?action=get-profile&login=vasya
if ($action == "get-profile") {
	require("models/profile.php");
}
//Запрос - получить список визиток владельца//Пример:  ?action=get-list-card&login=vasya&password=123trxzxcsx
if ($action == "get-list-card") {
	require("models/listcard.php");
}
//Запрос - Создать визитку//Пример:  ?action=card-create&login=login&card-name=testcard&card-caption=ratatatata
if ($action == "card-create") {
	require("models/cardcreate.php");
}
//Запрос - поделится визиткой//Пример: ?action=give-card&id_owner=1001&id_recipient=1000&id_card=10004 (id - это будет QR код визитки, тоесть шарить будем по id)
if ($action == "give-card") {
	require("models/givecard.php");
}
//Запрос - получить данные визитки//Пример: ?action=get-card&id_card=10004
if ($action == "get-card") {
	require("models/getcard.php");
}