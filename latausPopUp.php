<?php

require_once ("config/config.php");
require_once("functions/functions.php");

?>


<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
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