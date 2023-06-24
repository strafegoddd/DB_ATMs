<?php
require "../includes/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Клиенты</title>

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
              <h3>О клиентах</h3>
							<p></p>
              <div class="block__content">
                <img src="/media/images/klient.png" width="300" height="200">

                <div class="full-text">
<h1>Клиенты</h1>
<p style="font-style: italic">* означает ключевое поле</p>
<p> <a class="decor" href="klient/new.php"> Добавить клиента </a> </p>
<p>Поиск: <input class="form-control" type="text" placeholder="Номер,адрес,код банка..." id="search-text" onkeyup="tableSearch()"></p>

<table class="table table-striped" id="info-table">
		<tr>
			<td class="strongg">Номер карты*</td>
			<td class="strongg">ФИО</td>
			<td class="strongg">Адрес клиента</td>
			<td class="strongg">Код банка</td>
			<td class="strongg"></td> 
			<td class="strongg"></td> 
		</tr>
		<?php
		$result=mysqli_query($connection, "SELECT * FROM klient");
		while ($row=mysqli_fetch_assoc($result)){
		echo '<tr>';
				
			echo '<td>' . $row['cardnumber'] . '</td>';
			echo '<td>' . $row['fio'] . '</td>';
			echo '<td>' . $row['adresklient'] . '</td>';
			echo '<td>' . $row['kodbank'] . '</td>';
			echo '<td><a class="decor" href="klient/edit.php?id=' . $row['cardnumber'] . '">Редактировать</a></td>'; // запуск скрипта для редактирования
			echo '<td><a class="decor" href="klient/delete.php?id=' . $row['cardnumber'] . '">Удалить</a></td>'; // запуск скрипта для удаления записи
				
		echo '</tr>';
				
				}
				?>
	</table>
		<?php
			$num_rows = mysqli_num_rows($result); // число записей в таблице БД
			
			echo '<p>Всего клиентов:' . $num_rows . '</p>';
			
			?>
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