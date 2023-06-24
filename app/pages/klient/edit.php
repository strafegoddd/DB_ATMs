<?php
require "../../includes/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title> Редактирование данных клиента </title>

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
							 <img src="/media/images/dante.jpg" width="500">

							 <div class="full-text">

 <?php

//mysqli_query('SET NAMES cp1251');

//mysqli_select_db($connection, "bank") or die("Нет такой таблицы!");

$nomer = $_GET['id'];

$rows=mysqli_query($connection, "SELECT * FROM klient WHERE cardnumber = '$nomer'");

while ($st = mysqli_fetch_assoc($rows)) {

$cardnumber = $_GET['id'];

$fio = $st['fio'];

$adresklient = $st['adresklient'];

$kodbank = $st['kodbank'];

}

print '<form action="save_edit.php" metod="get">';

//print "Код банка: <input name='kodbanka' size='20' type='text' value='".$kodbanka."'>";

print "<input name='cardnumber' size='20' type='hidden' value='".$cardnumber."'>";

echo '<br>ФИО: <input name="fio" size="25" type="text" value="'.$fio.'" pattern="^([А-Я]{1}[а-яё]{1,23}[\s][А-Я]{1}[а-яё]{1,23}[\s][А-Я]{1}[а-яё]{1,23})" required>';

print '<br>Адрес: г.<input name="city" size="20" type="text" pattern="[А-Я]{1}[а-я-\s]{1,24}" required> ул.<input name="street" size="20" type="text" pattern="[А-Я]{1}[а-я-\s]{1,24}" required> д.<input name="home" size="3" type="text" pattern="[1-9]{1,3}" required> кв. <input name="kv" size="3" type="text" pattern="[1-9]{1,3}" required>';

print "<input name='kodbank' size='10' type='hidden' value='".$kodbank."'>";

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