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
    <div id="content">
      <div class="container">
        <div class="row">
          <section>
					<style>
.filterDiv {
  float: center;	
  width: auto;
  line-height: 30px;
  text-align: center;
  margin: 2px;
  display: none;
}

.show {
  display: block;
}

.container {
  margin-top: 20px;
  overflow: hidden;
}

/* Стиль кнопок */
.btn {
  border: none;
  outline: none;
	width: 150px;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

#first{
	margin-left: 550px;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}

</style>
<div id="myBtnContainer">
  <button class="btn active" id="first" onclick="filterSelection('ez')"> Регистрация</button>
  <button class="btn" id="second" onclick="filterSelection('find')"> Удаление</button>
</div>
<div class="container">
<div class="filterDiv ez">
            <div class="block">
              <h3>Регистрация</h3>
              <div class="block__content">
                <img class="login" src="/media/images/login.png">
                <div class="login">
								<form method="get" name="reg" onsubmit="return checkForm()" action="save_reg.php">
											<div class="form-element" >
											<label>Логин</label>
											<input type="text" name="username" pattern="[a-zA-Z0-9]{3,10}" required />
											</div>
											<div class="form-element">
											<label>Пароль</label>
											<input type="password" name="password" required />
											</div>
											<div class="form-element">
											<p>Выберите должность: <select name="post">
											<option value="admin" selected>Администратор</option>
											<option value="menager">Менеджер</option>
											<option value="auditor">Аудитор</option>
											<option value="analitik">Фин. аналитик</option>
											</select></p>
											</div>
											<button type="submit" name="register" value="register">Регистрация</button>
											</form>
                </div>
              </div>
            </div>
	</div>
	<div class="filterDiv find">
	<div class="block">
	<style>
td {
    border: solid 3px grey;
		padding: 5px;
}
</style>
              <h3>Удаление</h3>
              <div class="block__content">
                <img class="login" src="/media/images/login.png">
                <div class="login">
								<table style="border: 5px solid grey; border-collapse: collapse; margin: auto;" class="table table-striped" id="info-table">
								<tr>
									<td class="strongg">Логин*</td><td class="strongg">Пароль</td><td class="strongg">Должность</td>
								</tr>
								<?php
		$result=mysqli_query($connection, "SELECT * FROM users");
		while ($row=mysqli_fetch_assoc($result)){
			echo '<tr>';
			echo '<td>' . $row['login'] . '</td>';
			echo '<td>' . $row['password'] . '</td>';
			echo '<td>' . $row['post'] . '</td>';
			echo '<td><a class="decor" href="deleteuser.php?id=' . $row['login'] . '">Удалить</a></td>'; // запуск скрипта для удаления записи
			echo '</tr>';
				}
				?>
				</table>
                </div>
              </div>
            </div>
	</div>
</div>
<script>
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Добавьте активный класс к текущей кнопке (выделите его)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
          </section>
        </div>
      </div>
    </div>
  </div>

</body>
</html>