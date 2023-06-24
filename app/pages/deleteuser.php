<?php
require "../includes/config.php";
session_start();
?>
<?php
$err = false;
$number = $_GET['id'];
$find1 = mysqli_query($connection, "SELECT * FROM users");
$num = mysqli_num_rows($find1);
//mysqli_select_db("bank") or die("Нет такой таблицы!");
if (($num > 1) or ($number != 'admin'))
{
	$zapros="DELETE FROM users WHERE login = '$number'";
	mysqli_query($connection, $zapros);
	
	header("Location: ../index.php");
	
	exit;
	
}
else if ($num <= 1)
{
	echo 'Это последняя запись, не стоит её удалять!';
	echo '<br>';
	echo 'Ошибка удаления. <a href="../index.php"> Вернуться на главную. </a> ';
}
else if ($number == 'admin')
{
	echo 'Админа удалять нельзя. <a href="../index.php"> Вернуться на главную. </a> ';
}