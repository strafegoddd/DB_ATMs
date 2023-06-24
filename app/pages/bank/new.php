<?php
require "../../includes/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title> Добавление нового банка </title>

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
						 <h3>О банках</h3>
						 <div class="block__content">
							 <img src="/media/images/bank.jpg" width="500">

							 <div class="full-text">

<H2>Добавление банка:</H2>
<form action="save_new.php" metod="get">

<br>Наименование: <input name="bankname" size="20" type="text" pattern="[А-Я]{1}[а-я-]{1,19}" required>

<p>Адрес: г.<input name="city" size="20" type="text" pattern="[А-Я]{1}[а-я-\s]{1,12}[А-Я]{0,1}[а-я]{0,10}" required> ул.<input name="street" size="20" type="text" pattern="[А-Я]{1}[а-я-\s]{1,24}" required> д.<input name="home" size="20" type="text" pattern="[0-9]{1,3}" required></p>

<p><input name="add" type="submit" value="Добавить">

<input name="b2" type="reset" value="Очистить"></p>

</form>

<p>

<a href="../banki.php"> Вернуться к списку банков </a>



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