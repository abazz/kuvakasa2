<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kuvakasa2</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/main.css">
    <link href="lightbox/dist/css/lightbox.css" rel="stylesheet" type="text/css" />
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>



    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="sivu.php">Kuvakasa2</a>
            </div>
            <div class="collapse navbar-collapse" id="myNav">
               <ul id="navbar" class="nav navbar-nav">



                   <li>
                        <a href="" id="popUp2"><span class="glyphicon glyphicon-search"></span> </a>
                   </li>

                    <li>
                        <a href="" id="popUp"><span class="glyphicon glyphicon-upload"></span> </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a id="loggaus" href="" data-rel="dialog" class="btn"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
        </div>
    </nav>


<div class="kuvanakyma">
                <?php
                $dirname = "img/";
                $images = glob($dirname."*.jpg");

                foreach($images as $image) {
                echo '<a href="'.$image.'" data-lightbox="sun-set"> <img class="kuva" src="'.$image.'" width="215" height="165" alt="image" /></a> <br />';
                }
               ?>


</div>
<!-----
    <ul id="kuvat">


    </ul>
---->




    <?php

require_once ("config/config.php");
require_once("functions/functions.php");

?>











    <form id="kuvalisäys" action="upload.php" method="post" enctype="multipart/form-data">
        Lisää kuvia:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <div>
            <canvas></canvas>
        </div>
        <label>Kuvan nimi
            <input type="text" name="mediaTitle" required>
        </label>
        <label>Kategoria
            <input type="text" name="category" required>
        </label>
        <input type="submit" value="Upload Image" name="submit">
    </form>



    <p id="message"></p>




    <form id="lomakekenttä" action="confirm.php" method="post">
        <h2>Kirjautuminen</h2>
        <label>Etunimi
            <input type="text" name="etunimi" required>
        </label>
        <br>
        <label>Sukunimi
            <input type="text" name="sukunimi" required>
        </label>
        <br>
        <label>Sähköposti
            <input type="email" name="sahkoposti" required>
        </label>
        <br>
        <label>Puhelinnumero
            <input type="tel" name="puhelin" placeholder="esim: +358501234567" pattern="^\+[0-9]*$">
        </label>
        <br>
        <label>Osoite
            <input type="text" name="osoite">
        </label>
        <br>
        <label>Postinumero
            <input type="text" name="postinumero" pattern="^[0-9]{5}$">
        </label>
        <br>
        <label>Salasana
            <input type="password" required>
        </label>
        <br>
        <label>
            <input type="submit" value="Tallenna">
        </label>
        <br>
    </form>

    <script>
        var salasana = document.querySelector('input[name="givenPw"]');
        var varmistus = document.querySelector('input[name="givenPwAgain"]');
        var fillPattern = function () {
            varmistus.pattern = this.value;
        }
        salasana.addEventListener('keyup', fillPattern);
    </script>







<div class="kuvahaku">
    <?php
    include 'haku.php';
    ?>
</div>






    <script src="js/lomake.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/uploadCanvas.js"></script>
        <script src="js/showImages.js"></script>
        <script src="js/upload.js"></script>
        <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="lightbox/dist/js/lightbox.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>




</body>

</html>