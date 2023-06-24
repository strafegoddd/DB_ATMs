<?php
require "../../includes/config.php";
session_start();
?>
<?php

//mysqli_select_db("bank") or die("Нет такой таблицы!");

$number = $_GET['id'];

$zapros="DELETE FROM oper_inf WHERE id= $number";

mysqli_query($connection, $zapros);

header("Location: ../oper.php");

exit;

?>
