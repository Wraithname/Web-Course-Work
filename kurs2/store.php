<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Сохранение бинарных данных в базе данных MySQL</title>
</head>
<body>
<?php
 
// Код, который будет выполняться, если форма была оправлена:
if ($_POST['submit']) {
 
    // подключение к базе данных
    // (возможно, вам придется настроить имя хоста, имя пользователя и пароль)
    $dbh = new mysqli("localhost", "root", "", "kurs2");
 
    if(mysqli_connect_errno())
    {
        exit("Ошибка подключения к базе данных MySQL: Сервер база данных не доступен!<br>
        Проверте параметры подключения к базе данных.");
    }
 
    $data = addslashes(fread(fopen($_FILES['file']['tmp_name'], "r"), 
    filesize($_FILES['file']['tmp_name'])));
 
    $_POST['form_description'] = trim($_POST['form_description']);
    $size = filesize ($_FILES['file']['tmp_name']);
 
    $result=$dbh->prepare("UPDATE binary_data SET title='".$_POST['title']."',price='".$_POST['price']."',bin_data='".$data."',filename='".$_FILES["file"]["name"]."',filesize='".$size."',filetype='".$_FILES["file"]["type"]."' WHERE ID=45");
 
  if(!$result) exit("Ошибка выполнения SQL запроса!");
 
  $result->execute();

  //echo "<p>Этот файл имеет следующий идентификатор (ID) в базе данных:".$idr."</b>";
 
}
if ($_POST['submit1']) {
 
    // подключение к базе данных
    // (возможно, вам придется настроить имя хоста, имя пользователя и пароль)
    $dbh = new mysqli("localhost", "root", "", "kurs2");
 
    if(mysqli_connect_errno())
    {
        exit("Ошибка подключения к базе данных MySQL: Сервер база данных не доступен!<br>
        Проверте параметры подключения к базе данных.");
    }
 
    $data = addslashes(fread(fopen($_FILES['file1']['tmp_name'], "r"), 
    filesize($_FILES['file1']['tmp_name'])));
 
    $_POST['form_description'] = trim($_POST['form_description']);
    $size = filesize ($_FILES['file1']['tmp_name']);
 
    $result=$dbh->prepare("UPDATE binary_data SET title='".$_POST['title1']."',price='".$_POST['price1']."',bin_data='".$data."',filename='".$_FILES["file1"]["name"]."',filesize='".$size."',filetype='".$_FILES["file1"]["type"]."' WHERE ID=46");
 
  if(!$result) exit("Ошибка выполнения SQL запроса!");
 
  $result->execute(); 
  $id = $dbh->prepare("SELECT max(id) FROM  binary_data");
  $id->execute();
  $id->bind_result($idr);
  $id->fetch();


 
  //echo "<p>Этот файл имеет следующий идентификатор (ID) в базе данных:".$idr."</b>";
 
}
if ($_POST['submit2']) {
 
    // подключение к базе данных
    // (возможно, вам придется настроить имя хоста, имя пользователя и пароль)
    $dbh = new mysqli("localhost", "root", "", "kurs2");
 
    if(mysqli_connect_errno())
    {
        exit("Ошибка подключения к базе данных MySQL: Сервер база данных не доступен!<br>
        Проверте параметры подключения к базе данных.");
    }
 
    $data = addslashes(fread(fopen($_FILES['file2']['tmp_name'], "r"), 
    filesize($_FILES['file2']['tmp_name'])));
 
    $_POST['form_description'] = trim($_POST['form_description']);
    $size = filesize ($_FILES['file2']['tmp_name']);
 
    $result=$dbh->prepare("UPDATE binary_data SET title='".$_POST['title2']."',price='".$_POST['price2']."',bin_data='".$data."',filename='".$_FILES["file2"]["name"]."',filesize='".$size."',filetype='".$_FILES["file2"]["type"]."' WHERE ID=47");
 
  if(!$result) exit("Ошибка выполнения SQL запроса!");
 
  $result->execute(); 
  $id = $dbh->prepare("SELECT max(id) FROM  binary_data");
  $id->execute();
  $id->bind_result($idr);
  $id->fetch();


 
  //echo "<p>Этот файл имеет следующий идентификатор (ID) в базе данных:".$idr."</b>";
 
}
if ($_POST['submit3']) {
 
    // подключение к базе данных
    // (возможно, вам придется настроить имя хоста, имя пользователя и пароль)
    $dbh = new mysqli("localhost", "root", "", "kurs2");
 
    if(mysqli_connect_errno())
    {
        exit("Ошибка подключения к базе данных MySQL: Сервер база данных не доступен!<br>
        Проверте параметры подключения к базе данных.");
    }
 
    $data = addslashes(fread(fopen($_FILES['file3']['tmp_name'], "r"), 
    filesize($_FILES['file3']['tmp_name'])));
 
    $_POST['form_description'] = trim($_POST['form_description']);
    $size = filesize ($_FILES['file3']['tmp_name']);
 
    $result=$dbh->prepare("UPDATE  cars SET title='".$_POST['title3']."',text='".$_POST['textr']."',bin_data='".$data."',filename='".$_FILES["file3"]["name"]."',filesize='".$size."',filetype='".$_FILES["file3"]["type"]."' WHERE ID=1");
 
  if(!$result) exit("Ошибка выполнения SQL запроса!");
 
  $result->execute(); 
  $id = $dbh->prepare("SELECT max(id) FROM  binary_data");
  $id->execute();
  $id->bind_result($idr);
  $id->fetch();


 
  //echo "<p>Этот файл имеет следующий идентификатор (ID) в базе данных:".$idr."</b>";
 
}
  // отображаем форму для оправки новых данных:
?>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
Изменение предложения недели №1
<br>
<br>Название
<input type = "text" name="title" size="40">
<br>
<br>Цена
<input type = "text" name="price" size="40"><br>

<br>Файл для загрузки/хранения в базе данных: <input type="file" name="file" size="40">
<p><input type="submit" name="submit" value="Отправить"><br><br>
Изменение предложения недели №2
<br>
<br>Название
<input type = "text" name="title1" size="40">
<br>
<br>Цена
<input type = "text" name="price1" size="40"><br>

<br>Файл для загрузки/хранения в базе данных: <input type="file" name="file1" size="40">
<p><input type="submit" name="submit1" value="Отправить">
<br><br>
Изменение предложения недели №3
<br>
<br>Название
<input type = "text" name="title2" size="40">
<br>
<br>Цена
<input type = "text" name="price2" size="40"><br>

<br>Файл для загрузки/хранения в базе данных: <input type="file" name="file2" size="40">
<p><input type="submit" name="submit2" value="Отправить">
<br><br>
<style>
    textarea{width: 300px; min-height: 150px;font-family: inherit;}
    </style>
Главная информация
<br>
<br>Название
<input type = "text" name="title3" size="40">
<br>
<br>
<textarea name="textr" placeholder="О машине"></textarea><br>
<br>Файл для загрузки/хранения в базе данных: <input type="file" name="file3" size="40">
<p><input type="submit" name="submit3" value="Отправить">
</form>
</body>
</html>