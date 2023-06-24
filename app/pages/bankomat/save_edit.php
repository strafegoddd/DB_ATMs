<?php
require "../../includes/config.php";
session_start();
$adres = 'г.'.$_GET['city'].', ул.'.$_GET['street'].', д.'.$_GET['home'];

$zapros="UPDATE bankomat SET adresbankomat='$adres' WHERE nomerbankomat='" .$_GET['nomerbankomat']. "'";

mysqli_query($connection, $zapros);

if (mysqli_affected_rows($connection)>0) {

echo 'Все сохранено. <a href="../bankomat.php"> Вернуться к списку банкоматов </a>'; }

else { echo 'Ошибка сохранения. <a href="../bankomat.php"> Вернуться к списку банкоматов</a> '; }

?>