<?
    session_start();
    if (!(isset($_SESSION['admin'])))
    {
        header("Location: login.php");
        exit;
    };
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <?php 
        include "data_base.php"; //подключение файла с данными БД
    ?>
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

    <main>
        <nav>
                <a href="admin.php">
                    Portfolio editor
                </a>
                <a href="edit_review.php">
                    Review editor
                </a>
                <div class="logoutButton">
                    <form method="POST">
                        <input  name='logout' type='submit' value='Exit'  />
                    </form>
                    <?php if(isset($_POST['logout'])){session_destroy();} ?>
                </div>
        </nav>
        <div class="edit_portfolio">
	    <?php
            if(isset($_POST['type']) && 
            isset($_POST['description']) && isset($_POST['title']) && isset($_POST['data_of_create']) && 
            isset($_POST['area']) && isset($_POST['img_min']) && isset($_POST['img_max']) && isset($_POST['subNew']))
            {
            
            	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
            	// экранирования символов для mysql
            	$type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
            	$description = htmlentities(mysqli_real_escape_string($link, $_POST['description']));
            	$title = htmlentities(mysqli_real_escape_string($link, $_POST['title']));
            	$data_of_create = htmlentities(mysqli_real_escape_string($link, $_POST['data_of_create']));
            	$area = htmlentities(mysqli_real_escape_string($link, $_POST['area']));
                $img_min = htmlentities(mysqli_real_escape_string($link, $_POST['img_min']));
                $img_max = htmlentities(mysqli_real_escape_string($link, $_POST['img_max']));
            		// создание строки запроса
	            	$query ="INSERT INTO `portfolio` VALUES(NULL, '$type','$description','$title','$data_of_create','$area', '$img_min', '$img_max');";
	            	// выполняем запрос
	            	if ($link->query($query) === TRUE) {
	          			echo '<h3>New project was added</h3>';


	          			mysqli_close($link);
	        		}else {
	         			echo 'Error: '. $link->error;
	         			mysqli_close($link);
	        	}
	        }
            if(isset($_POST['ttype']) && isset($_POST['update']) && isset($_POST['ddescription']) && 
            isset($_POST['title']) && isset($_POST['data_of_create']) && isset($_POST['area'])&& isset($_POST['img_min'])&& isset($_POST['img_max']) && isset($_POST['subUpdate']))
            {
            
            	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
            	// экранирования символов для mysql
                $type = htmlentities(mysqli_real_escape_string($link, $_POST['ttype']));
                $id = htmlentities(mysqli_real_escape_string($link, $_POST['update']));
            	$description = htmlentities(mysqli_real_escape_string($link, $_POST['ddescription']));
            	$title = htmlentities(mysqli_real_escape_string($link, $_POST['title']));
            	$data_of_create = htmlentities(mysqli_real_escape_string($link, $_POST['data_of_create']));
            	$area = htmlentities(mysqli_real_escape_string($link, $_POST['area']));
                $img_min = htmlentities(mysqli_real_escape_string($link, $_POST['img_min']));
                $img_max = htmlentities(mysqli_real_escape_string($link, $_POST['img_max']));
                echo '<h3>Project was change</h3>';
	            	$query ="UPDATE `portfolio` SET ttype='$type',ddescription='$description',title='$title',data_of_create='$data_of_create',area='$area',img_min='$img_min',img_max='$img_max' WHERE id_project ='$id'";
	            	// выполняем запрос
	            	if ($link->query($query) === TRUE) {
	          			echo '<h3>Project was change</h3>';
	          			mysqli_close($link);
	        		}else {
	         			echo 'Error: '. $link->error;
	         			mysqli_close($link);
	        	}
	        }
	        if(isset($_POST['delete']) && isset($_POST['subDelete'])){
            
            	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
            	// экранирования символов для mysql
            	//$type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
            	$id = htmlentities(mysqli_real_escape_string($link, $_POST['delete']));
            
            		// создание строки запроса
	            	$query ="DELETE FROM portfolio WHERE id_project = '$id'";
	            	// выполняем запрос
	            	if ($link->query($query) === TRUE) {


	          			echo '<h3>Project was deleted</h3>';
	          			mysqli_close($link);
	        		}else {
	         			echo 'Error: '. $link->error;
	         			mysqli_close($link);
	        	}
	        }		
        ?>

        <div class="form">
            <form action="admin.php" id="formNew" method="post">
                <h2>Add project</h2>
                <table border="1">
                    <tr><td>Choose type</td><td><select name="type" form="formNew">
                        <option>post public</option>
                        <option>post commercial</option>
                        <option>post residential</option>
                        <option>post industrial</option>
                    </select></td></tr>
                    <tr><td>Enter the title</td><td><input type="text" name="title" required></td></tr>
                    <tr><td>Enter the area</td><td><input type="text" name="area" required></td></tr>
                    <tr><td>Enter the data of create</td><td><input type="date" name="data_of_create" required></td></tr>
                    <tr><td>Enter the desription</td><td><input type="text" name="description" required></td></tr>
                    <tr><td>Path to min-image</td><td><input type="text" name="img_min" required></td></tr>
                    <tr><td>Path to max-image</td><td><input type="text" name="img_max" required></td></tr>
                    <tr><td><input type="submit" name="subNew" value="Отправить"></td><td><input type="reset" value="Reset"></td></tr>
                </table>
            </form>
            <form action="admin.php" id="formUpdate" method="post">
                <h2>Change portfolio</h2>
                <table border="1">
                <tr><td>Choose type</td><td><select name="ttype" form="formUpdate">
                        <option>post public</option>
                        <option>post commercial</option>
                        <option>post residential</option>
                        <option>post industrial</option>
                    </select></td></tr>
                    <tr><td>Введите id изменяемой записи</td><td><input type="number" name="update" required></td></tr>
                    <tr><td>Enter the title</td><td><input type="text" name="title" required></td></tr>
                    <tr><td>Enter the area</td><td><input type="text" name="area" required></td></tr>
                    <tr><td>Enter the data of create</td><td><input type="date" name="data_of_create" required></td></tr>
                    <tr><td>Enter the desription</td><td><input type="text" name="ddescription" required></td></tr>
                    <tr><td>Path to min-image</td><td><input type="text" name="img_min" required></td></tr>


                    <tr><td>Path to max-image</td><td><input type="text" name="img_max" required></td></tr>

                    <tr><td><input type="submit" name="subUpdate" value="Send"></td><td><input type="reset" value="Reset"></td></tr>
                </table>
            </form>
            <form action="admin.php" id="formDelete" method="post">
                <h2>Delete project</h2>
                <table border="1">
                    <tr><td>Enter id project</td><td><input type="text" name="delete" required></td></tr>
                    <tr><td><input type="submit" name="subDelete" value="Send"></td><td><input type="reset" value="Reset"></td></tr>
                </table>
            </form>
            </div>	

            <h2>Portfolio</h2>
		    <div class="database">
		        <?php $link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
     	        $query ="SELECT * FROM portfolio";
		        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		        if($result)
		        {
    	        	$rows = mysqli_num_rows($result); // количество полученных строк
		        	echo "<table border='1'><tr><th>ID</th><th>Type</th><th>Description</th><th>Title</th><th>Data of create</th><th>Area</th><th>Image-min, jpg</th><th>Image-max, jpg</th></tr>";
    	        	for ($i = 0 ; $i < $rows  ; ++$i)
    	        	{
    	        	    $row = mysqli_fetch_row($result);
    	        	    echo "<tr>";
    	        	        for ($j = 0 ; $j < 8 ; ++$j){
                                echo "<td>$row[$j]</td>";
    	        	        }
    	        	    echo "</tr>";
    	        	}
    	        	echo "</table>";
    	        	// очищаем результат
    	        	mysqli_free_result($result);
                }
                ?>
            </div>
    </main>


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
