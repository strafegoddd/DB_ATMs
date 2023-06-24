<?php

$perev = $_POST['some'];

include('includes/db.php');

$count = mysqli_query($connection, "SELECT * FROM bank WHERE bankname = '$perev'");

if(mysqli_num_rows($count) == 0)
{
	echo 'Нет';
}
else
{
	echo 'favorite bank: ' . $perev . '!';
}