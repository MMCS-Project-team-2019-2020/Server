<?php
include('modules/core.php');
include('db.php');

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
if (isiduser()) {
	$id_user = $_GET['id_user'];
}
if (isdeletecard()) {
	$id_card = $_GET['id_card'];
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
	$avatar = $_GET['avatar'];
}
if (iscard()) {
	$id_user = $_GET['id_user'];
	$card_name = $_GET['card_name'];
	$card_caption = $_GET['card_caption'];
}
if (isupdatecard()) {
	$id_card = $_GET['id_card'];
	$id_user = $_GET['id_user'];
	$card_name = $_GET['card_name'];
	$card_caption = $_GET['card_caption'];
}
if (isupdateuser()) {
	$id_user = $_GET['id_user'];
	$name = $_GET['name'];
	$surname = $_GET['surname'];
	$patronymic = $_GET['patronymic'];
	$company = $_GET['company'];
	$position = $_GET['position'];
	$phone = $_GET['phone'];
	$mail = $_GET['mail'];
	$avatar = $_GET['avatar'];
}
if (isgive()) {
	$id_owner = $_GET['id_owner'];
	$id_recipient = $_GET['id_recipient'];
	$id_card = $_GET['id_card'];
	$gps = $_GET['gps'];
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
//Запрос - проверить на существование логина//Пример:   ?action=check-login&login=vasya
if ($action == "check-login") {
	require("models/check_login.php");
}
//Запрос - регистрация//Пример:   ?action=register&name=test&surname=testtest&patronymic=testtesttest&company=testcompany&position=testposition&mail=testmail@mail.ru&phone=89995559999&login=testnew&password=testnew&avatar=1234
if ($action == "register") {
	require("models/register.php");
}
//Запрос - получить профиль(данные акка)//Пример:   ?action=get-profile&login=vasya&token=1287eh21dh1287dg1gd7h812712
if ($action == "get-profile") {
	require("models/profile.php");
}
//Запрос - получить список визиток владельца//Пример:  ?action=get-list-card&id_user=1004&token=1287eh21dh1287dg1gd7h812712
if ($action == "get-list-card") {
	require("models/list_recived_card.php");
}
//Запрос - Создать визитку//Пример:  ?action=card-create&id_user=1004&card_name=testcard&card_caption=ratatatata&token=1287eh21dh1287dg1gd7h812712
if ($action == "card-create") {
	require("models/own_card_create.php");
}
//Запрос - Обновить визитку//Пример:  ?action=card-update&id_card=10016&id_user=1004&card_name=ораа&card_caption=333test&token=1287eh21dh1287dg1gd7h812712
if ($action == "card-update") {
	require("models/own_card_update.php");
}
//Запрос - поделится визиткой//Пример: ?action=give-card&id_owner=1001&id_recipient=1000&id_card=10004&gps=ул.Большая Садовая&token=1287eh21dh1287dg1gd7h812712
if ($action == "give-card") {
	require("models/give_card.php");
}
//Запрос - получить данные визитки//Пример: ?action=get-card&id_card=10004&token=1287eh21dh1287dg1gd7h812712
if ($action == "get-card") {
	require("models/get_card.php");
}
//Запрос - удалить полученную визитку//Пример: ?action=delete-card&id_user=1005&id_card=10006&token=1287eh21dh1287dg1gd7h812712
if ($action == "delete-card") {
	require("models/recived_card_delete.php");
}
//Запрос - Обновить визитку//Пример:  ?action=user-update&name=test&surname=testtest&patronymic=testtesttest&company=testcompany&position=testposition&mail=testmail@mail.ru&phone=89995559999&avatar=1234&token=1287eh21dh1287dg1gd7h812712
if ($action == "user-update") {
	require("models/profile_update.php");
}
