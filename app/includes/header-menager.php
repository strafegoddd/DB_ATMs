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
              <li><a href="/index-menager.php">Главная</a></li>
              <li><a href="/pages/about_me.php">Обо мне</a></li>
              <li><a href="https://vk.com/strafegod" target ="blank">Я Вконтакте</a></li>
							<li><a href="/index.php" style="font-weight: bold; color: red">Выход</a></li>
            </ul>
          </nav>
        </div>
      </div>

<?php
$banki = mysqli_query($connection, "SELECT * FROM bank"); 
  ?>

      <div class="header__bottom">
        <div class="container">
          <nav>
            <ul>
              <?php
								echo '<li><a href="../pages/klient.php">Клиенты</a></li>';
							?>
            </ul>
          </nav>
        </div>
      </div>
    </header>