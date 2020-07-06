<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Сохранение бинарных данных в базе данных MySQL</title>
</head>
<body>
<div class="menu-container">

<div class="circle dark inline">
  <i class="icon ion-navicon"></i>
</div>

<div class="list-menu">
  <i class="icon ion-close-round close-iframe"></i>
  <div class="intro-inner">
    <ul id="nav-menu">
      <li><a href="store.php">Изменение на главной странице </a></li>
          <li><a href="store1.php">Изменения на странице о нас</a></li>
          <li><a href="store2.php">Изменения на странице примеры наших работ</a></li>
          <li><a href="store3.php">Изменения на странице контакты</a></li>
    </ul>
  </div>
</div>

</div>
<?php
 
// Код, который будет выполняться, если форма была оправлена:
if ($_POST['submit']) {
 
    // подключение к базе данных
    // (возможно, вам придется настроить имя хоста, имя пользователя и пароль)
    $dbh = new mysqli("localhost", "root", "", "kursr");
 
    if(mysqli_connect_errno())
    {
        exit("Ошибка подключения к базе данных MySQL: Сервер база данных не доступен!<br>
        Проверте параметры подключения к базе данных.");
    }
 
    $data = addslashes(fread(fopen($_FILES['file']['tmp_name'], "r"), 
    filesize($_FILES['file']['tmp_name'])));
 
    $_POST['form_description'] = trim($_POST['form_description']);
    $size = filesize ($_FILES['file']['tmp_name']);
 
    $result=$dbh->prepare("UPDATE about SET texts='".$_POST['texts']."',bin_data='".$data."',filename='".$_FILES["file"]["name"]."',filesize='".$size."',filetype='".$_FILES["file"]["type"]."' WHERE ID=1");
 
  if(!$result) exit("Ошибка выполнения SQL запроса!");
 
  $result->execute();

  //echo "<p>Этот файл имеет следующий идентификатор (ID) в базе данных:".$idr."</b>";
 
}

  // отображаем форму для оправки новых данных:
?>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
Контейнер №1
<br>
<br>Текст
<input type = "text" name="texts" size="40">
<br>
<br>Файл для загрузки/хранения в базе данных: <input type="file" name="file" size="40">
<p><input type="submit" name="submit" value="Отправить"><br><br>
</form>
</body>
</html>