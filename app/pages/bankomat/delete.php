<?php
require "../../includes/config.php";
session_start();
?>
<?php
$err = false;
$find = mysqli_query($connection, "SELECT nomerbankomat FROM oper_inf WHERE nomerbankomat = '".$_GET['id']."'");
$row1=mysqli_fetch_assoc($find);
if ($row1['nomerbankomat'] == $_GET['id'])
{
	print 'Ошибка удаления банкомат привязан к операции. <a href="../bankomat.php"> Вернуться к списку банкоматов </a>';
	$err = true;
}

//mysqli_select_db("bank") or die("Нет такой таблицы!");
if ($err == false)
{
	$nomer = $_GET['id'];
	$zapros = "DELETE FROM bankomat WHERE nomerbankomat = '$nomer'";
	
	mysqli_query($connection, $zapros);
	
	header("Location: ../bankomat.php");
	
	exit;
}
?>
