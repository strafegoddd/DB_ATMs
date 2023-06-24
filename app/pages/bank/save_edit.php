<?php

require "../../includes/config.php";
session_start();
$adres = 'г.'.$_GET['city'].', ул.'.$_GET['street'].', д.'.$_GET['home'];
$zapros="UPDATE bank SET bankname='".$_GET['bankname']. "', adresbank='$adres' WHERE kodbanka='" .$_GET['kodbanka']. "'";

mysqli_query($connection, $zapros);

if (mysqli_affected_rows($connection)>0) {

echo 'Все сохранено. <a href="../banki.php"> Вернуться к списку банков </a>'; }

else { echo 'Ошибка сохранения. <a href="../banki.php"> Вернуться к списку банков</a> '; }

?>
