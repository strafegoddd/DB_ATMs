<?php
require "includes/config.php"
?>
<?php
$access = $_GET['post'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

<?php include "includes/header-menager.php"; ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section>
            <div class="block">
              <h3>Отчёт</h3>
              
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
            <div class="block">
            Здесь будет отчётность.
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

</body>
</html>