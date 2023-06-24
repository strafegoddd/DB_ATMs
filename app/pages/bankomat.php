<?php
require "../includes/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Банкоматы</title>

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
              <h3>О банкоматах</h3>
              <div class="block__content">
                <img src="/media/images/bankomat.jpg" width="200" height="300">

                <div class="full-text">
<h1>Банкоматы</h1>
<p style="font-style: italic">* означает ключевое поле</p>
<p> <a class="decor" href="bankomat/new.php"> Добавить банкомат </a> </p>
<p>Поиск: <input class="form-control" type="text" placeholder="Номер,адрес,код банка..." id="search-text" onkeyup="tableSearch()"></p>

<table class="table table-striped" id="info-table">
		<tr>
			<td class="strongg">Номер банкомата*</td>
			<td class="strongg">Адрес банкомата</td>
			<td class="strongg">Код банка</td>
			<td class="strongg"></td> 
			<td class="strongg"></td> 
		</tr>
		<?php
		$result=mysqli_query($connection, "SELECT * FROM bankomat");
		while ($row=mysqli_fetch_assoc($result)){
		echo '<tr>';
				
			echo '<td>' . $row['nomerbankomat'] . '</td>';
			echo '<td>' . $row['adresbankomat'] . '</td>';
			echo '<td>' . $row['kodbank'] . '</td>';
			echo '<td><a class="decor" href="bankomat/edit.php?id=' . $row['nomerbankomat'] . '">Редактировать</a></td>'; // запуск скрипта для редактирования
			echo '<td><a class="decor" href="bankomat/delete.php?id=' . $row['nomerbankomat'] . '">Удалить</a></td>'; // запуск скрипта для удаления записи
				
		echo '</tr>';
				
				}
				?>
	</table>
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
			
			echo '<p>Всего банкоматов:' . $num_rows . '</p>';
			
			?>
							</div>
              </div>
            </div>
            
          </section>
          <section class="content__right col-md-4">
            
          </section>
        </div>
      </div>
    </div>
  </div>

</body>
</html>


