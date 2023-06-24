<?php
require "../includes/config.php";
session_start();
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

 <?php include "../includes/header.php";  ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section>
            <div class="block">
              <h3>О банках</h3>
              <div class="block__content">
                <img src="/media/images/bank.jpg" width="300" height="200">

                <div class="full-text">
<h1>Банки</h1>
<p> <a class="decor" href="bank/new.php"> Добавить банк </a> </p>
<p style="font-style: italic">* означает ключевое поле</p>

<p>Поиск: <input class="form-control" type="text" placeholder="Код,имя,адрес..." id="search-text" onkeyup="tableSearch()"></p>
<table class="table table-striped" id="info-table">
		<tr>
			<td class="strongg">Код банка*</td>
			<td class="strongg">Наименование банка</td>
			<td class="strongg">Адрес банка</td>
			<td class="strongg"></td> 
			<td class="strongg"></td> 
		</tr>
		<?php
		$result=mysqli_query($connection, "SELECT * FROM bank");
		while ($row=mysqli_fetch_assoc($result)){
		echo '<tr>';
				
			echo '<td>' . $row['kodbanka'] . '</td>';
			echo '<td>' . $row['bankname'] . '</td>';
			echo '<td>' . $row['adresbank'] . '</td>';
			echo '<td><a class="decor" href="bank/edit.php?id=' . $row['kodbanka'] . '">Редактировать</a></td>'; // запуск скрипта для редактирования
			echo '<td><a class="decor" href="bank/delete.php?id=' . $row['kodbanka'] . '">Удалить</a></td>'; // запуск скрипта для удаления записи
				
		echo '</tr>';
				
				}
				?>
	</table>
</div>

<script>
function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('info-table');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
        flag = false;
        for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
            flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
            if (flag) break;
        }
        if (flag) {
            table.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
        }

    }
}
</script>


		<?php
			$num_rows = mysqli_num_rows($result); // число записей в таблице БД
			
			echo '<p>Всего банков:' . $num_rows . '</p>';
			
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


