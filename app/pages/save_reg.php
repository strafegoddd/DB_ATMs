<?php
require "../includes/config.php";
session_start();
$log = $_GET['username'];
$par = $_GET['password'];
$post = $_GET['post'];
$row = mysqli_query($connection, "SELECT * FROM users WHERE login= '$log'");
$res = mysqli_fetch_assoc($row);
if ($res['login'] == $log)
{
	print 'Такой пользователь уже есть в системе. <a href="../index.php"> Вернуться на главную </a>';
}
else
{
	$row = "INSERT INTO users SET login = '$log', password = '$par' , post = '$post'";
	mysqli_query($connection, $row); // Выполнение запроса
	if (mysqli_affected_rows($connection)>0) // если нет ошибок при выполнении запроса
	{ print '<p>Мы, добавили нового сотруднике.';
	print '<p><a href="../index.php"> Вернуться на главную </a>'; }
	else { print 'Ошибка сохранения. <a href="../index.php"> Вернуться на главную </a>'; }
}
?>