<?php
require "../../includes/config.php";
session_start();
$_SESSION['post'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php $config['title']; ?></title>

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
          <section>
            <div class="block">
              <h3>Логин</h3>
              <div class="block__content">
                <img class="login" src="/media/images/login.png">
                <div class="login">
									<form name="log" metod="get" onsubmit="return checkForm()">
										Логин: <input class="login" id="user" name="user" size="20" type="text" pattern="[a-zA-Z0-9]+">
										<br>
										Пароль: <input class="login" name="password" size="20" type="password">
										<br>
										<p><input class="login" name="add" type="submit" value="Проверка">
									</form>
									<?php
									$log = $_GET['user'];
									$par = $_GET['password'];
									?>
									<script>
									//Функция проверки полей формы
									function checkForm() {
										let form = document.forms.log;
										if ((form.elements.user.value == '') && (form.elements.password.value == ''))
										{
											alert("Введите логин и пароль!");
										}
										else{
										if (form.elements.user.value == '')
										alert("Введите логин");
										if (form.elements.password.value == '')
										alert("Введите пароль");
										}
									}
									</script>
									<?php
									$row = mysqli_query($connection, "SELECT * FROM users WHERE login= '$log' AND password= '$par'");
									
									$res = mysqli_fetch_assoc($row);
									
									if ($res['post'] == 'admin') {
										echo 'Вы хотите войти как админ?';
										$_SESSION['post'] = 'admin';
										print '<form action="/index.php" metod="get">';
										print "<input type='hidden' name='post' value='admin'>";
										print "<br><br><input type='submit' name='' value='Войти'>";
										print "</form>";
									}
									else if ($res['post'] == 'auditor') {
										echo 'Вы хотите войти как аудитор?';
										$_SESSION['post'] = 'auditor';
										print '<form action="/index.php" metod="get">';
										print "<input type='hidden' name='post' value='auditor'>";
										print "<br><br><input type='submit' name='' value='Войти'>";
										print "</form>";
									}
									else if ($res['post'] == 'menager') {
										echo 'Вы хотите войти как менеджер?';
										$_SESSION['post'] = 'menager';
										print '<form action="/index.php" metod="get">';
										print "<input type='hidden' name='post' value='menager'>";
										print "<br><br><input type='submit' name='' value='Войти'>";
										print "</form>";
									}
									else if ($res['post'] == 'analitik') {
										echo 'Вы хотите войти как финансовый аналитик?';
										$_SESSION['post'] = 'analitik';
										print '<form action="/index.php" metod="get">';
										print "<input type='hidden' name='post' value='analitik'>";
										print "<br><br><input type='submit' name='' value='Войти'>";
										print "</form>";
									}
									else if ($res['login'] != $log)
									{ 
										echo 'Такого пользователя нет в системе'; 
										$_SESSION['post'] = '';
									}
									?>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

</body>
</html>