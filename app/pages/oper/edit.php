<?php
require "../../includes/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title> Редактирование операции </title>

 <!-- Bootstrap Grid -->
 <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

 <!-- Google Fonts -->
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

 <!-- Custom -->
 <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

 <div id="wrapper">

	 <div id="content">
		 <div class="container">
			 <div class="row">
				 <section class="content__left col-md-8">
					 <div class="block">
						 <h3>О клиентах</h3>
						 <div class="block__content">
							 <img src="/media/images/aang.jpg" width="500">

							 <div class="full-text">

 <?php

//mysqli_query('SET NAMES cp1251');

//mysqli_select_db($connection, "bank") or die("Нет такой таблицы!");

$nomer = $_GET['id'];

$rows=mysqli_query($connection, "SELECT * FROM operobnal WHERE oper_id = $nomer");

while ($st = mysqli_fetch_assoc($rows)) {

$id = $_GET['id'];

$data = $st['data'];

$time = $st['time'];

$summa = $st['summa'];

}

print '<form action="save_edit.php" metod="get">';

//print "Код банка: <input name='kodbanka' size='20' type='text' value='".$kodbanka."'>";

print "<br>Cумма: <input name='summa' size='20' type='text' value='".$summa."' pattern='[0-9]{2,5}' required>";
$today = date('Y-m-d');
print "<br>Дата: <input name='data' size='20' type='date' value='".$data."' max='".$today."' required>";

print "<br>Время: <input name='time' size='20' type='time' value='".$time."' required>";

print "<input name='id' size='20' type='hidden' value='".$id."' required>";

//print "<input type='hidden' name='kodbanka' value='".$kodbanka."'> <br>";

print "<br><br><input type='submit' name='' value='Сохранить'>";

print "</form>";

?>
</form>

<p>

<a href="/pages/klient.php"> Вернуться к списку клиентов </a>



						 </div>
						 </div>
					 </div>
					 
				 </section>
				 <section class="content__right col-md-4">
					 
				 </section>
			 </div>
		 </div>
	 </div>

	 <footer id="footer">
		 <div class="container">
			 <div class="footer__logo">
				 <h1><?php echo $config['title']; ?></h1>
			 </div>
			 <nav class="footer__menu">
				 <ul>
					 <li><a href="#">Главная</a></li>
					 <li><a href="#">Обо мне</a></li>
					 <li><a href="#">Я Вконтакте</a></li>
					 <li><a href="#">Правообладателям</a></li>
				 </ul>
			 </nav>
		 </div>
	 </footer>

 </div>

</body>
</html>