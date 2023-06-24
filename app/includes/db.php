<?php

require_once "config.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = mysqli_connect($config['db']['server'], $config['db']['username'], $config['db']['password'], $config['db']['name']);
//connect
if( $connection == false)
{
	echo 'Не удалось подключиться<br>';
	echo mysqli_connect_error();
	die();
}
	//echo 'good job mu frend, i connected!<br>';