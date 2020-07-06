<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Motor Contact</title>
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
  <body class="contact-page">
    
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
              <li><a href="index.php" >Главная</a></li>
                 <li><a href="services.php">Сервисы</a></li>
                 <li><a href="gallery.php">Галерея</a></li>
                 <li><a href="contact.php" class="active">Контакты</a></li>
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
                
              </ul>
            </div>                          
          </div>    
        </div>
      </div>
    </section>
      
    <!-- Main content -->
    <section class="container tm-contact-main">

      <div class="row">
        <div class="contact-form-container">
          <h2 class="contact-title">Связаться с нами</h2>
          <p>Свяжитесь с нами для получения подробной информации об интересующем вас автомобиле</p>
          <form action="#" method="post" class="tm-contact-form">
              <div class="col-lg-5 col-md-5 contact-form-left">
                <div class="form-group">
                    <input type="text" id="contact_name" class="form-control" placeholder="Имя" />
                </div>
                <div class="form-group">
                    <input type="email" id="contact_email" class="form-control" placeholder="e-mail" />
                </div>
                             
              </div>
              <div class="col-lg-7 col-md-7 contact-form-right">
                <div class="form-group margin-bottom-0">
                    <textarea id="contact_message" class="form-control" rows="6" placeholder="Сообщение"></textarea>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 submit-btn-container">
                <button type="submit" name="submit" class="btn text-uppercase templatemo-submit-btn">Отправить</button>  
              </div>                        
          </form>
        </div>
      </div>
           
    </section>

    <!-- End Main content -->
    
    <!--Footer content-->
    <footer class="tm-footer">
      <div class="container">
        <div class="row margin-bottom-60">
          <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
            <h3 class="tm-footer-div-title">Главное меню</h3>
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

        // Remove preloader
        // https://ihatetomatoes.net/create-custom-preloading-screen/
        $('body').addClass('loaded');
      });

      /* Google map
      ------------------------------------------------*/
      var map = '';
      var center;

      function initialize() {
          var mapOptions = {
            zoom: 16,
            center: new google.maps.LatLng(13.758468,100.567481),
            scrollwheel: false
          };
        
          map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

          google.maps.event.addDomListener(map, 'idle', function() {
              calculateCenter();
          });
        
          google.maps.event.addDomListener(window, 'resize', function() {
              map.setCenter(center);
          });
      }

      function calculateCenter() {
        center = map.getCenter();
      }

      function loadGoogleMap(){
          var script = document.createElement('script');
          script.type = 'text/javascript';
          script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
          document.body.appendChild(script);
      }
      $(document).ready(function(){                
          loadGoogleMap();                
      });

      
    </script>
  </body>
  </html>
