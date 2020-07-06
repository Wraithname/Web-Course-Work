<?php
    session_start();
    $admin = '123';//логин 
    $pass = '123';//пароль 
?>
<?php
    if($_POST['submit'])
    {
        if($admin == $_POST['user'] AND $pass == ($_POST['pass'])) // если совпадает
        {
            $_SESSION['admin'] = $admin; // присваиваем сессии имя админа
            header("Location: admin.php"); // направляем в админку 
            exit;
        }else echo '<p>Логин или пароль неверны!</p>';//или нет
    } 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <input type="checkbox" id="menu-checkbox">
            <nav role="navigation">
                <label for="menu-checkbox" class="toggle-button" 
                data-open="Menu" data-close="Close" onclick></label>
                <ul class="main-menu">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="portfolio.php">PORTFOLIO</a></li>
                    <li><a href="about_us.html">ABOUT US</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </header>
<meta charset="UTF-8">
<div class="log">
    <form method="post">
    <table>
    <th>Введите данные для входа</th>
    <tr><td>Логин: </td><td><input type="text" name="user" style="font-size: 20px" /></td></tr>
    <tr><td>Пароль:</td><td> <input type="password" name="pass" style="font-size: 20px" /></td></tr>
    <tr><td><input type="submit" name="submit" value="Войти" style="font-size: 20px" /></td></tr>

    </table>
    </form>
</div>


    <footer>
        <div class="footer-container">
            <div class="about-us">
                <h4>About us</h4>
                <p>The company unites highly qualified specialists 
                    of various specialties: architects, city planners, 
                    landscape architects, interior designers, design engineers, 
                    specialists in engineering networks. Working together a team 
                    of specialists successfully solves design problems, 
                    finds optimal solutions, providing a high-quality and 
                    functional architecture of the facility.
                </p>
                <h4>Social connecting<img src="img/pic-facebook.png" alt="">
                    <img src="img/pic-twitter.png" alt="">
                    <img src="img/pic-youtube.png" alt="">
                </h4>
                
            </div>
            <div class="tweets">


                <h4>Latest tweets</h4>
                <p><img src="img/logo-twitter.png" alt="">Lorem ipsum dolor sit amet, 
                    eu affert praesent tractatos eum, mei eruditi persequeris in.</p>
                <p><img src="img/logo-twitter.png" alt="">Lorem ipsum dolor sit amet, 
                    eu affert praesent tractatos eum, mei eruditi persequeris in.</p>
                <p><img src="img/logo-twitter.png" alt="">Lorem ipsum dolor sit amet, 
                    eu affert praesent tractatos eum, mei eruditi persequeris in.</p>
            </div>
            <div class="contacts">
                <h4>Contact info</h4>
                <p><img src="img/pic-address.png" alt="">   Address: 435 South 18th Street, Suite 144, Saint Louis, MO 63104</p>
                <p><img src="img/pic-phone.png" alt="">   Phone: 654-786-759</p>
                <p><img src="img/pic-mail.png" alt="">   E-mail: hduyerh@gmail.com</p>
            </div>
        </div>
        
    </footer>
</body>
</html>
