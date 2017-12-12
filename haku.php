<!DOCTYPE html>
<head>
<link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php
require_once("config/config.php");  //Miten hakemistopolut?

?>


<h4> Hae kuvia </h4>



<form method="post" action="sivu.php">
    Haku:
    <input type="text" name="nimi" />

    <input type="submit" value="Hae" />

</form>


<?php

echo("<h4>");

$haku = $_POST["nimi"];
//Kysytään montako tuotetta on kannassa. Käytä $DBH eli config.php:ssä luotua yhteysoliota
//(Data Base Handle)
$sql="SELECT * FROM kk_media WHERE kk_media.mediaTitle LIKE " . "'%$haku%'" . " OR kk_media.ID LIKE " . " '%$haku%' " ;
echo("</br>");
$omakysely = $DBH->prepare($sql);
$omakysely->execute();



//echo($sql); //Testi, miltä lause näyttää - lainausmerkit kohdallaan?

//$sqll="UPDATE kk_media SET Liketys = Liketys + 1 WHERE kk_media.ID = " . $rivi["ID"]   ;
//$liketysny = $DBH->prepare($sqll);
//$liketysny->execute();
//document.getElementById("myTykkays").submit();



try{
    while ($rivi = $omakysely->fetch()) {
        echo
            "<br>  Kuva:  " . '<a href=img/' . $rivi["mediaTitle"] .'  data-lightbox="sun-set"> <img class="kuva" src=img/' . $rivi["mediaTitle"] .'  width="215" height="165" alt="image" /></a>' .
            "<br>  " . ' <form id="myTykkays" method="POST" action="tykkays.php">
        <input type="submit" name="tykkays" value="Tykkää"/>
    </form> ' .
            "<br>  Nimi:  " . $rivi["mediaTitle"] .
            "<br>  ID " . $rivi["ID"] .
            "<br>  Tykkäykset " . $rivi["Liketys"] .

            "<br> ";
    }
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}


?>


</body>




