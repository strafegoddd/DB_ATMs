<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = mysqli_connect('127.0.0.1', 'root', 'root', 'bdguru');
//connect
if( $connection == false)
{
	echo 'Не удалось подключиться<br>';
	echo mysqli_connect_error();
	die();
}
	echo 'good job mu frend, i connected!<br>';