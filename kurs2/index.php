<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Motor Website Template</title>
  <meta name="description" content="">
<!-- 
Motor Template
http://www.templatemo.com/tm-463-motor
-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>
      <body class="about-page">

        <!-- Preloader -->
        <div id="loader-wrapper">
          <div id="loader"></div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
        </div>
        <!-- End Preloader -->
    
        <section class="templatemo-top-section">
          <div class="templatemo-header">
            <img class="templatemo-header-img" src="img/header.png" alt="Header">
            <h1 class="templatemo-site-name" style="font-size: 30px;padding-top: 11px;">Витрина <br>автосалона</h1>
            <div class="mobile-menu-icon">
              <i class="fa fa-bars"></i>
            </div>
            <div class="templatemo-nav-container">
              <nav class="templatemo-nav">
                <ul>
                 <li><a href="index.php" class="active">Главная</a></li>
                 <li><a href="services.php">Сервисы</a></li>
                 <li><a href="gallery.php">Галерея</a></li>
                 <li><a href="contact.php">Контакты</a></li>
                 <li><a href="about.php">Вход</a></li>
               </ul>
             </nav> 
           </div>
         </div>
         <div class="templatemo-welcome welcome-slider">
          <div class="container">
            <div class="row">
              <div class="flexslider">
                <ul class="slides">
                  <li>
                    <!--Предложения сегодня-->
                    <?php
                    //подключение к БД
                    $db = mysql_connect("localhost","root","");  //localhost - сервер БД, login - имя пользователя БД, password - пароль
                    //Выбор БД
                    mysql_select_db("kurs2" ,$db);   //site - имя БД
                    $sql = mysql_query("SELECT title, price FROM binary_data WHERE id=45",$db); //Выбирает поля name и text из таблицы links
                    $myrow = mysql_fetch_array ($sql); //из переменной $sql все данные заносятся в массив $myrow
                    mysql_close($db);
                    ?>
                      <div class="about-slider">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                          <img src="getdata.php?id=45" class="img-responsive" alt="Image">
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 about-slider-description">
                          <h2 class="text-uppercase welcome-title">
                              <span class="welcome-title-1">Предложения недели</span>
                            <span class="welcome-title-2"><?php echo($myrow['title']);?></span>
                          </h2>
                          <p class="welcome-message">Всего от <?php echo($myrow['price']);?> руб.</p>
                        </div>              
                      </div>  
                    </li>
                    <li>
                      <!--Предложения сегодня-->
                      <?php
//подключение к БД
$db = mysql_connect("localhost","root","");  //localhost - сервер БД, login - имя пользователя БД, password - пароль
//Выбор БД
mysql_select_db("kurs2" ,$db);   //site - имя БД
$sql1 = mysql_query("SELECT title, price FROM binary_data WHERE id=46",$db); //Выбирает поля name и text из таблицы links
$myrow1 = mysql_fetch_array ($sql1); //из переменной $sql все данные заносятся в массив $myrow
mysql_close($db);
?>
                        <div class="about-slider">
                          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <img src="getdata.php?id=46" class="img-responsive" alt="Image">
                          </div>
                          <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 about-slider-description">
                            <h2 class="text-uppercase welcome-title">
                                <span class="welcome-title-1">Предложения недели</span>
                              <span class="welcome-title-2"><?php echo($myrow1['title']);?></span>
                            </h2>
                            <p class="welcome-message">Всего от <?php echo($myrow1['price']);?> руб.</p>
                          </div>              
                        </div>  
                      </li>
                      <li>
<!--Предложения сегодня-->
<?php
//подключение к БД
$db = mysql_connect("localhost","root","");  //localhost - сервер БД, login - имя пользователя БД, password - пароль
//Выбор БД
mysql_select_db("kurs2" ,$db);   //site - имя БД
$sql2 = mysql_query("SELECT title, price FROM binary_data WHERE id=47",$db); //Выбирает поля name и text из таблицы links
$myrow2 = mysql_fetch_array ($sql2); //из переменной $sql все данные заносятся в массив $myrow
mysql_close($db);
?>
                    <div class="about-slider">
                      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <img src="getdata.php?id=47" class="img-responsive" alt="Image">
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 about-slider-description">
                        <h2 class="text-uppercase welcome-title">
                          	<span class="welcome-title-1">Предложения недели</span>
                      		<span class="welcome-title-2"><?php echo($myrow2['title']);?></span>
                        </h2>
                        <p class="welcome-message">Всего от <?php echo($myrow2['price']);?> руб.</p>
                      </div>              
                    </div>  
                  </li>     
                </ul>
              </div>                          
            </div>    
          </div>
        </div>
      </section>

    <!--Main content-->
    <?php
//подключение к БД
$db = mysql_connect("localhost","root","");  //localhost - сервер БД, login - имя пользователя БД, password - пароль
//Выбор БД
mysql_select_db("kurs2" ,$db);   //site - имя БД
$sql3 = mysql_query("SELECT title, textrk FROM cars WHERE id=1",$db); //Выбирает поля name и text из таблицы links
$myrow3 = mysql_fetch_array ($sql3); //из переменной $sql все данные заносятся в массив $myrow
mysql_close($db);
?>
    <section class="container margin-bottom-50"> 
         
      <div class="about-container">
      
        <div class="about-container-left">
          <img src="getdata2.php?id=1" alt="Image" class="img-responsive">
        </div>
        
        <div class="about-container-right">
          <h2 class="about-title"><?php echo($myrow3['title']);?></h2>
          <p class="about-description"><?php echo($myrow3['textrk']);?></p>
          <a href="#" class="about-link">Подробнее</a>
        </div>
      </div>
      <?php
//подключение к БД
$db = mysql_connect("localhost","root","");  //localhost - сервер БД, login - имя пользователя БД, password - пароль
//Выбор БД
mysql_select_db("kurs2" ,$db);   //site - имя БД
$sql4 = mysql_query("SELECT title, textrk FROM cars WHERE id=2",$db); //Выбирает поля name и text из таблицы links
$myrow4 = mysql_fetch_array ($sql4); //из переменной $sql все данные заносятся в массив $myrow
mysql_close($db);
?>
      <div class="about-container-2 margin-bottom-50">
        <div class="about-container-inner">
          <h3 class="about-title-2"><?php echo($myrow4['title']);?></h3>
          <img src="getdata2.php?id=2" alt="Image" class="img-responsive margin-bottom-15">          
          <p class="about-description"><?php echo($myrow4['textrk']);?></p>
          <a href="#" class="about-link about-link-2">Подробнее</a>
        </div>
        <?php
//подключение к БД
$db = mysql_connect("localhost","root","");  //localhost - сервер БД, login - имя пользователя БД, password - пароль
//Выбор БД
mysql_select_db("kurs2" ,$db);   //site - имя БД
$sql5 = mysql_query("SELECT title, textrk FROM cars WHERE id=3",$db); //Выбирает поля name и text из таблицы links
$myrow5 = mysql_fetch_array ($sql5); //из переменной $sql все данные заносятся в массив $myrow
mysql_close($db);
?>
        <div class="about-container-inner">
          <h3 class="about-title-2"><?php echo($myrow5['title']);?></h3>
          <img src="getdata2.php?id=3" alt="Image" class="img-responsive margin-bottom-15">          
          <p class="about-description"><?php echo($myrow5['textrk']);?></p>
          <a href="#" class="about-link about-link-2">Подробнее</a>
        </div>
      </div>
        
    </section> <!-- Main content -->
    
    <!--Footer content-->
    <footer class="tm-footer">
      <div class="container">
        <div class="row margin-bottom-60">
          <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
            <h3 class="tm-footer-div-title">Меню</h3>
            <ul>
              <li><a href="index.php">Главная</a></li>
              <li><a href="services.php">Сервисы</a></li>
              <li><a href="gallery.php">Галерея</a></li>
              <li><a href="contact.php">Контакты</a></li>
            </ul>
          </nav>
          <div class="col-lg-4 col-md-4 tm-footer-div">
            <h3 class="tm-footer-div-title">Мы в социальных сетях</h3>
            <div class="tm-social-icons-container">
              <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
            </div>
          </div>
        </div>
        <div class="row tm-copyright">
          <p class="col-lg-12 small copyright-text text-center">Copyright &copy; by Alexander Orlov</p>
        </div>
      </div>
    </footer> <!-- Footer content-->
    
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
    <script defer src="js/jquery.flexslider-min.js"></script><!-- FlexSlider -->
    <script>
      $(window).load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          slideshow: false,
          prevText: "&#xf104;",
          nextText: "&#xf105;"
        });
        $('body').addClass('loaded');
      });
    </script>
  </body>
  </html>
