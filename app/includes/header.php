 <?php include "config.php"
 ?>
 <header id="header">
      <div class="header__top">
        <div class="container">
          <div class="header__top__logo">
            <h1><?php echo $config['title']; ?></h1>
          </div>
          <nav class="header__top__menu">
            <ul>
              <li><a href="/">Главная</a></li>
              <li><a href="/pages/about_me.php">Обо мне</a></li>
              <li><a href="https://vk.com/strafegod" target ="blank">Я Вконтакте</a></li>
							<?php if (($_SESSION['post'] == 'admin') || ($_SESSION['post'] == 'auditor') || ($_SESSION['post'] == 'menager') || ($_SESSION['post'] == 'analitik'))
							{
									echo '<li><a href="../pages/login/login.php" style="font-weight: bold; color: red">Выход</a></li>';
							}
							else
							{
									echo '<li><a href="/pages/login/login.php" style="font-weight: bold; color: red">Вход</a></li>';
							}
							?>
            </ul>
          </nav>
        </div>
      </div>

      <div class="header__bottom">
        <div class="container">
				<nav>
            <ul>
              <?php if ($_SESSION['post'] == 'admin')
							{
								echo '<li><a href="../pages/banki.php">Банки</a></li>';
								echo '<li><a href="../pages/bankomat.php">Банкоматы</a></li>';
								echo '<li><a href="../pages/klient.php">Клиенты</a></li>';
								echo '<li><a href="../pages/oper.php">Операции</a></li>';
								echo '<li><a href="../pages/registration.php">Добавить, удалить сотрудника</a></li>';
							}
							if ($_SESSION['post'] == 'auditor')
							{
								echo '<li><a href="../pages/bankomat.php">Банкоматы</a></li>';
								echo '<li><a href="../pages/oper.php">Операции</a></li>';
							}
							if ($_SESSION['post'] == 'menager')
							{
								echo '<li><a href="../pages/klient.php">Клиенты</a></li>';
							}
							if ($_SESSION['post'] == 'analitik')
							{
								echo '<li><a href="../pages/bankomat.php">Банкоматы</a></li>';
								echo '<li><a href="../pages/klient.php">Клиенты</a></li>';
								echo '<li><a href="../pages/oper.php">Операции</a></li>';
							}
							?>
            </ul>
          </nav>
        </div>
      </div>
    </header>