<?php
require "includes/config.php";
session_start();
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

	<?php 
	include "includes/header.php"; 
	$month = 'none';
	?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section>
            <div class="block">
								<?php
	if (($_SESSION['post'] == 'admin') or ($_SESSION['post'] == 'analitik')){
		echo '<h3>Выберите месяц и год:</h3>';
		echo '<form metod="get">';
		echo '<input type="month" name="month" value="none">';
		echo '<input type="hidden" name="atm" value="none">';
		echo '<input style="margin-left: 5px" type="submit" name="send" value="Сформировать">';
		echo '</form>';
		echo '<form metod="get">';
		echo '<input type="hidden" name="month1" value="-">';
		echo '<input type="hidden" name="atm1" value="-">';
		echo '<input type="submit" name="clear" value="Очистить">';
		echo '</form>';
		echo '<br>';
		echo '<p>Поиск: <input class="form-control" type="text" placeholder="Номер,адрес,код банка..." id="search-text" onkeyup="tableSearch()"></p>';
	echo '<br>';
echo '<table class="table table-striped" id="info-table">';
echo '<tr>';
echo '<td class="strongg">Номер карты</td>';
echo '<td class="strongg">Дата</td>';
echo '<td class="strongg">Время</td>';
echo '<td class="strongg">Сумма выдачи,руб.</td>'; 
echo '<td class="strongg">Сумма комиссии,руб</td>'; 
echo '</tr>';

		$bankomat = $_GET['atm1'];
		$bankomat = $_GET['atm'];
		$month = $_GET['month1'];
		$month = $_GET['month'];
		$da = true;
		$bul = true;
		$sum = 0;
		$allsum = 0;
		$allkom = 0;
		$perek = false;
		$linlin = mysqli_query($connection,"SELECT *, DATE_FORMAT(data, '%Y-%m') as new FROM oper_inf JOIN operobnal ON oper_inf.id = operobnal.oper_id ORDER BY `oper_inf`.`nomerbankomat` ASC");
		while ($perospero = mysqli_fetch_assoc($linlin))
		{ 
			if ($perospero['new'] == $month)
			{
				if ($bankomat != $perospero['nomerbankomat'])
				{
					$bankomat = $perospero['nomerbankomat'];
					if ($sum != 0)
					{
						if ($bul == false){
							///
						}
						else{
							$kom = 0;
						}
						echo '<tr><td class="strongg">Итого по банкомату</td><td></td><td></td><td>' .$sum. '</td><td>' .$kom. '</td></tr>';
						$allkom = $allkom + $kom;
						$allsum = $allsum + $sum;
						$kom = 0;
						$bul = true;
					}
					$sum = 0;
					$sum = $sum + $perospero['summa'];
					echo '<tr><td class="strongg">Номер банкомата</td><td>' .$bankomat. '</td></tr>';
				}
				else
				{
					$sum = $sum + $perospero['summa'];
					$bankomat = $perospero['nomerbankomat'];
				} 	
				echo '<tr>';
				echo '<td>' . $perospero['cardnumber'] . '</td>';
				echo '<td>' . $perospero['data'] . '</td>';
				echo '<td>' . $perospero['time'] . '</td>';
				echo '<td>' . $perospero['summa'] . '</td>';
				$perek = true;
				$komissia = 0;
				if ($perospero['komissia'] == 1)
				{
					$komissia = $perospero['summa'] * 0.012;
					$kom = $kom + $komissia;
					$bul = false;
				}
				else
				{
					$komissia = 0;
					$bul = true;
				}
				echo '<td>' . $komissia . '</td>';
				echo '</tr>';
			}
		}
		if ($perek == true)
		{
			$allkom = $allkom + $kom;
			$allsum = $allsum += $sum;
			echo '<tr><td class="strongg">Итого по банкомату</td><td></td><td></td><td>' .$sum. '</td><td>' .$kom. '</td></tr>';
			echo '<tr><td class="strongg">Итого по всем банкоматам</td><td></td><td></td><td>' .$allsum. '</td><td>' .$allkom. '</td></tr>';
		}
		
	echo '</table>';
	}
	?>
	<!-- <script>
		var table = document.getElementById("info-table");
let lastRow = table.rows[table.rows.length - 1];
for (var i = 1; i < table.rows.length - 1; i++) {
  let row = table.rows[i];
  for (var j = 1; j < row.cells.length; j++) {
    let cel = row.cells[j];

    lastRow.cells[j].innerText =
      (Number(lastRow.cells[j].innerText) || 0) + 
      (Number(cel.innerText) || 0);
  }
}
	</script> -->
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
	</section>
        </div>
      </div>
    </div>
  </div>

</body>
</html>