<html> 
<body>
<?php
require "../../includes/config.php";

// Строка запроса на добавление записи в таблицу:

$log = $_GET['user'];
$par = $_GET['password'];

$row = mysqli_query($connection, "SELECT * FROM users WHERE login= '$log' AND password= '$par'");

$res = mysqli_fetch_assoc($row);

if ($res['post'] == 'admin') {
	print '<form action="/index.php" metod="get">';
	print "<input type='hidden' name='post' value='admin'>";
	print "<br><br><input type='submit' name='' value='Войти'>";
	print "</form>";

}
else if ($res['post'] == 'auditor') {

	echo '<a href="../../index.php">Вы подключились как админ</a>';
	
	}

else { echo 'Такого пользователя нет в системе'; }

?>
</body>
</html>