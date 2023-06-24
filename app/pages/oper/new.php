<?php
require "../../includes/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title> Добавление операции</title>

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
						 <h3>Об операциях</h3>
						 <div class="block__content">
							 <img src="/media/images/aang.jpg" width="500">

							 <div class="full-text">

<H2>Добавление операции:</H2>

<form action="save_new.php" metod="get">

Номер карты: <input name="cardnumber" size="20" type="text" pattern="[0-9]{4}[\s]{1}[0-9]{4}[\s]{1}[0-9]{4}[\s]{1}[0-9]{4}" required>

<br>Номер банкомата: <input name="nomerbankomat" size="20" type="text" pattern="[0-9]{6}" required>

<?php $today = date('Y-m-d'); echo '<br>Дата: <input name="data" size="20" type="date" max="'.$today.'" required>'; ?>

<br>Время: <input name="time" size="20" type="time" required>

<br>Сумма: <input name="summa" size="20" type="text" pattern="[0-9]{2,5}" required>

<p><input name="add" type="submit" value="Добавить">

<input name="b2" type="reset" value="Очистить"></p>

</form>

<p>

<a href="../oper.php"> Вернуться к списку операций </a>



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