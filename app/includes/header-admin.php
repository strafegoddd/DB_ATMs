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
              <li><a href="/index-admin.php">Главная</a></li>
              <li><a href="/pages/about_me.php">Обо мне</a></li>
              <li><a href="https://vk.com/strafegod" target ="blank">Я Вконтакте</a></li>
							<li><a href="/index.php" style="font-weight: bold; color: red">Выход</a></li>
            </ul>
          </nav>
        </div>
      </div>
			<form action="header-back.php" method="get">
				<input type="hidden" name="mypost" value="admin">
			</form>

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