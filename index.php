<?php
include('modules/core.php');

//блок проверок на существование конкретных параметров в запросе. Если существуют, то сохраняем данные параметров.
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
if (isid()) {
	$id_user = $_GET['id_user'];
}
if (isreg()) {
	$name = $_GET['name'];
	$surname = $_GET['surname'];
	$patronymic = $_GET['patronymic'];
	$company = $_GET['company'];
	$position = $_GET['position'];
	$phone = $_GET['phone'];
	$mail = $_GET['mail'];
	$login = $_GET['login'];
	$password = $_GET['password'];
}
if (iscard()) {
	$id_user = $_GET['id_user'];
	$card_name = $_GET['card_name'];
	$card_caption = $_GET['card_caption'];
}
if (isgive()) {
	$id_owner = $_GET['id_owner'];
	$id_recipient = $_GET['id_recipient'];
	$id_card = $_GET['id_card'];
}
if (islistcard()) {
	$id_user = $_GET['id_user'];
}
if (isgetcard()) {
	$id_card = $_GET['id_card'];
}



//Запрос - логинится//Пример:   ?action=login&login=vasya&password=4testtststs
if ($action == "login") {
	require("models/login.php");
}
//Запрос - регистрация//Пример:   ?action=register&name=test&surname=testtest&patronymic=testtesttest&company=testcompany&position=testposition&mail=testmail@mail.ru&phone=89995559999&login=testnew&password=testnew
if ($action == "register") {
	require("models/register.php");
}
//Запрос - получить профиль(данные акка)//Пример:   ?action=get-profile&login=vasya 
if ($action == "get-profile") {
	require("models/profile.php");
}
//Запрос - получить список визиток владельца//Пример:  ?action=get-list-card&id_user=1004
if ($action == "get-list-card") {
	require("models/listcard.php");
}
//Запрос - Создать визитку//Пример:  ?action=card-create&id_user=1004&card_name=testcard&card_caption=ratatatata
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