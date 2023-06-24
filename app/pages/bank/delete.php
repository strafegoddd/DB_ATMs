<?php
require "../../includes/config.php";
session_start();
?>
<?php
$err = false;
$find = mysqli_query($connection, "SELECT kodbank FROM bankomat WHERE kodbank = '".$_GET['id']."'");
$row1=mysqli_fetch_assoc($find);
if ($row1['kodbank'] == $_GET['id'])
{
	print 'Ошибка удаления банк привязан к банкоматам. <a href="../banki.php"> Вернуться к списку банков </a>';
	$err = true;
}
$find1 = mysqli_query($connection, "SELECT kodbank FROM klient WHERE kodbank = '".$_GET['id']."'");
$row2=mysqli_fetch_assoc($find);
if ($row2['kodbank'] == $_GET['id'])
{
	print '<br>Ошибка удаления банк привязан к клиентам. <a href="../banki.php"> Вернуться к списку банков </a>';
	$err = true;
}
//mysqli_select_db("bank") or die("Нет такой таблицы!");
if ($err == false)
{
	$zapros="DELETE FROM bank WHERE kodbanka=" . $_GET['id'];

	mysqli_query($connection, $zapros);
	
	header("Location: ../banki.php");
	
	exit;
	
}
?>
