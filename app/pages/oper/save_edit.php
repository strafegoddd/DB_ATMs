<?php

require "../../includes/config.php";
session_start();
$zapros="UPDATE operobnal SET data='".$_GET['data']. "', time='".$_GET['time']."', summa='".$_GET['summa']."' WHERE oper_id='" .$_GET['id']. "'";

mysqli_query($connection, $zapros);

if (mysqli_affected_rows($connection)>0) {

echo 'Все сохранено. <a href="../oper.php"> Вернуться к списку операций </a>'; }

else { echo 'Ошибка сохранения. <a href="../oper.php"> Вернуться к списку операций</a> '; }

?>