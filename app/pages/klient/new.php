<?php
require "../../includes/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title> Добавление нового клиента </title>

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

<H2>Добавление клиента:</H2>
<form action="save_new.php" metod="get">

<br><span style="margin-left:25px">ФИО: </span><input name="fio" size="20" type="text" pattern="^([А-Я]{1}[а-яё]{1,23}[\s][А-Я]{1}[а-яё]{1,23}[\s][А-Я]{1}[а-яё]{1,23})" required>

<br>Адрес: г.<input name="city" size="20" type="text" pattern="[А-Я]{1}[а-я-\s]{1,12}[А-Я]{0,1}[а-я]{0,10}" required> ул.<input name="street" size="20" type="text" pattern="[А-Я]{1}[а-я-\s]{1,24}" required> д.<input style="width: 60px" name="home" size="3" type="text" pattern="[0-9]{1,3}" required> кв. <input style="width: 60px" name="kv" size="3" type="text" pattern="[0-9]{1,3}" required>

<br><span>Код банка:</span><input name="kodbank" size="20" type="text" pattern="[0]{1}[4]{1}[0-9]{7}" required>

<p><input name="add" type="submit" value="Добавить">

<input name="b2" type="reset" value="Очистить"></p>

</form>

<p>

<a href="../klient.php"> Вернуться к списку клиентов </a>



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