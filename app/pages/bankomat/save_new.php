<?php
 require "../../includes/config.php";
 session_start();
 $adres = 'г.'.$_GET['city'].', ул.'.$_GET['street'].', д.'.$_GET['home'];
 $gg = rand(0,9).rand(10000,99999);
// Строка запроса на добавление записи в таблицу:
$res=mysqli_query($connection, "SELECT kodbanka FROM bank WHERE kodbanka = '".$_GET['kodbank']."'");
$r=mysqli_fetch_assoc($res);
if ($r['kodbanka'] == $_GET['kodbank'])
{
	$sql_add = "INSERT INTO bankomat SET nomerbankomat='$gg', adresbankomat='$adres', kodbank='" .$_GET['kodbank']."'";

	mysqli_query($connection, $sql_add); // Выполнение запроса
	
	if (mysqli_affected_rows($connection)>0) // если нет ошибок при выполнении запроса
	
	{ print '<p>Мы, добавили информацию о новом банкомате.';
	
	print '<p><a href="../bankomat.php"> Вернуться к списку банкоматов </a>'; }
	
	else { print 'Ошибка сохранения. <a href="../bankomat.php"> Вернуться к списку банкоматов </a>'; }	
}
else
{
	print 'Такого банка не существует. <a href="../bankomat.php"> Вернуться к списку банкоматов </a>';
}
?>