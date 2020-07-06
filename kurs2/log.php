<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body style="font-size: 25px">
    <style>
    input{font-size: inherit;display: block; width: 300px;margin-bottom: 20px;font-family: inherit; margin-top: 20px;margin-left: 100px}
    label{display: block;font-family: inherit;}
    </style>
    <?
    if(!$_POST['submit']=='Войти'){
    ?>
    <form action="" method="POST">
<input type="text" name="name" placeholder="Ваш логин" required>
<input type="password" name="password" placeholder="Пароль" required>
<input type="submit"name="submit" value="Войти">
    </form>
    <?}
else{
    require_once('db.php');
    $DB=new DB();
    $log=$_POST['password'];
    $resArr=$DB->getTableData('users',$_POST['name']);
    if($resArr[0]['password']!=$log){
        die('Пароль введен неверно');
    }
   
?>
<script>document.location.href="store.php"</script>
<?}?>
</body>
</html>