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
	
	$result = mysqli_query($connection, "SELECT * FROM bank");
        
        if (mysqli_num_rows($result) == 0)
        {
            echo 'Записей не найдено!';
        }
        else
        {
    ?>
	
	<ul>
    <?php
	while( $record = mysqli_fetch_assoc($result))
	{
       $count = mysqli_query($connection, "SELECT COUNT('kodbanka') AS 'total_count' FROM bankomat WHERE kodbank =" . $record['kodbanka']) ; 
       $count_result = mysqli_fetch_assoc($count);
	   echo '<li>' . $record['bankname'] . ' (' . $count_result['total_count']  . ' банкоматов)</li>';
	}
	?>
	</ul>
	
<?php
        }
?>

	<?php
	 mysqli_close($connection);
	 //phpinfo();
	 ?>

	  <form method="POST" action="/handle.php">
	 <input type="text" placeholder="something" name="some">
	 <hr>
	 <input type="submit" value="отправить">
	 </form>