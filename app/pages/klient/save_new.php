<?php
 require "../../includes/config.php";
 session_start();
 $adres = 'г.'.$_GET['city'].', ул.'.$_GET['street'].', д.'.$_GET['home'].', кв.'.$_GET['kv'];
 $gg = rand(0,9).rand(100,999).' '.rand(0,9).rand(100,999).' '.rand(0,9).rand(100,999).' '.rand(0,9).rand(100,999);
// Строка запроса на добавление записи в таблицу:
$res=mysqli_query($connection, "SELECT kodbanka FROM bank WHERE kodbanka = '".$_GET['kodbank']."'");
$r=mysqli_fetch_assoc($res);
if ($r['kodbanka'] == $_GET['kodbank'])
{
	$sql_add = "INSERT INTO klient SET cardnumber='$gg', fio='".$_GET['fio']."', adresklient='$adres', kodbank='".$_GET['kodbank']."'";

	mysqli_query($connection, $sql_add); // Выполнение запроса
	
	if (mysqli_affected_rows($connection)>0) // если нет ошибок при выполнении запроса
	
	{ print '<p>Мы, добавили информацию о новом банке.';
	
	print '<p><a href="../klient.php"> Вернуться к списку клиентов </a>'; }
	
	else { print 'Ошибка сохранения. <a href="../klient.php"> Вернуться к списку клиентов </a>'; }
}
else
{
	print 'Такого банка не существует. <a href="../klient.php"> Вернуться к списку клиентов </a>';
}

?>