<?php
require "../../includes/config.php";
session_start();
?>
<?php
$err = false;
$find = mysqli_query($connection, "SELECT cardnumber FROM oper_inf WHERE cardnumber = '".$_GET['id']."'");
$row1=mysqli_fetch_assoc($find);
if ($row1['cardnumber'] == $_GET['id'])
{
	print 'Ошибка удаления клиент привязан к операции. <a href="../klient.php"> Вернуться к списку клиентов </a>';
	$err = true;
}
//mysqli_select_db("bank") or die("Нет такой таблицы!");
if ($err == false)
{
	$number = $_GET['id'];

	$zapros="DELETE FROM klient WHERE cardnumber= '$number'";
	
	mysqli_query($connection, $zapros);
	
	header("Location: ../klient.php");
	
	exit;
}


?>
