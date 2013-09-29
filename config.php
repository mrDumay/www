<?php 
//Aдрес сервера MySQL 
$dblocation="localhost"; 
//Имя базы данных на хостинге или локальной машине 
$dbname="gb"; 
//Имя пользователя базы данных 
$dbuser="root"; 
//его пароль 
$dbpasswd=""; 
//устанавливаем соединение с базой данных 
$dbcnx=@mysql_connect($dblocation, $dbuser, $dbpasswd); 
if(!$dbcnx) { 
exit("<p>В настоящий момент сервер базы данных не доступен, поэтому корректное отбражение страницы невозможно</p>"); 
} 
//выбираем базу данных 
if(!@mysql_select_db($dbname, $dbcnx)) 
{ 
exit("<p>В настоящий момент база данных не доступна, поэтому корректное отбражение страницы невозможно </p>"); 
} 

$e_r_mail=urlencode("ne_pravelnoe_milo");
$e_name=urlencode("netu_imeni");
$e_mail=urlencode("netu_mail");
$e_msg=urlencode("netu_msg");
?> 