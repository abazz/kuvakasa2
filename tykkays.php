<?php
require_once("config/config.php");  //Miten hakemistopolut?

?>


<?php
if(isset($_POST['tykkays'])){
    echo("Tykkäsit kuvasta iideellä 40!");
    $tykkays = $_POST["tykkays"];
    $sqll="UPDATE kk_media SET Liketys = Liketys + 1 WHERE kk_media.ID = 40 " ;
    $liketysny = $DBH->prepare($sqll);
    $liketysny->execute();


}
else {
    echo" dhur";
}
?>