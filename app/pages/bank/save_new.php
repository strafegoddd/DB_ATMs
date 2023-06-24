<?php
 require "../../includes/config.php";
 session_start();
$must = '';
$adres = 'г.'.$_GET['city'].', ул.'.$_GET['street'].', д.'.$_GET['home'];
$gg = rand(40000000,49999999);
$zero = strval($gg);
$must = '0'.$zero;

// Строка запроса на добавление записи в таблицу:

$sql_add = "INSERT INTO bank SET kodbanka='$must', bankname='".$_GET['bankname']."', adresbank= '$adres'";

mysqli_query($connection, $sql_add); // Выполнение запроса

if (mysqli_affected_rows($connection)>0) // если нет ошибок при выполнении запроса

{ print '<p>Мы, добавили информацию о новом банке.';

print '<p><a href="../banki.php"> Вернуться к списку банков </a>'; }

else { print 'Ошибка сохранения. <a href="../banki.php"> Вернуться к списку банков </a>'; }

?>