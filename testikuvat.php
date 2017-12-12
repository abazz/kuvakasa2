<?php
$dirname = "img/";
$images = glob($dirname."*.jpg");

foreach($images as $image) {
    echo '<img src="'.$image.'" /><br />';
}
?>