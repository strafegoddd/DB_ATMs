<?php
require "../../includes/config.php";
session_start();

$result = mysqli_query($connection, "SELECT kodbank FROM bankomat WHERE nomerbankomat ='".$_GET['nomerbankomat']."'");

$check = mysqli_fetch_assoc($result);

$result1 = mysqli_query($connection, "SELECT kodbank FROM klient WHERE cardnumber ='".$_GET['cardnumber']."'");

$check1 = mysqli_fetch_assoc($result1);

if ($check['kodbank'] == $check1['kodbank'])
{
	$komissia = 0;
}
else
{
	$komissia = 1;
}

$res=mysqli_query($connection, "SELECT nomerbankomat FROM bankomat WHERE nomerbankomat = '".$_GET['nomerbankomat']."'");
$r=mysqli_fetch_assoc($res);
if ($r['nomerbankomat'] == $_GET['nomerbankomat'])
{
	$card=mysqli_query($connection, "SELECT cardnumber FROM klient WHERE cardnumber = '".$_GET['cardnumber']."'");
	$c=mysqli_fetch_assoc($card);
	if ($c['cardnumber'] == $_GET['cardnumber'])
	{
		
		$sql_add = "INSERT INTO oper_inf SET cardnumber = '".$_GET['cardnumber']."' ,nomerbankomat='".$_GET['nomerbankomat']."'; 
		SELECT * FROM oper_inf WHERE id=LAST_INSERT_ID(); 
		INSERT INTO operobnal SET oper_id = (SELECT MAX(id) FROM oper_inf), data='".$_GET['data']."', time='".$_GET['time']."', komissia= $komissia, summa='".$_GET['summa']."'";
		
		$connection->multi_query($sql_add);
		//mysqli_query($connection, $sql_add); // Выполнение запроса

		if (mysqli_affected_rows($connection)>0) // если нет ошибок при выполнении запроса

		{ print '<p>Мы, добавили информацию о новой операции.';

		print '<p><a href="../oper.php"> Вернуться к списку операций </a>'; }

		else { print 'Ошибка сохранения. <a href="../oper.php"> Вернуться к списку операций </a>'; }
			}
			else
			{
				print 'Такого клиента не существует. <a href="../oper.php"> Вернуться к списку операций </a>';
			}
}
else
{
	print 'Такого банкомата не существует. <a href="../oper.php"> Вернуться к списку операций </a>';
}

?>