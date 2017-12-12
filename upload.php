<?php
require_once("config/config.php");
require_once("functions/functions.php");
?>

<?php
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
            } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 60000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $filetmp = $_FILES["fileToUpload"]["tmp_name"];
        $fileid = $_FILES["fileToUpload"]["id"];
        $filename = $_FILES["fileToUpload"]["name"];
        $filecategory = $_FILES["fileToUpload"]["category"];
        $filedate = date('Y-m-d H:i:s');
        $filepath = $filename;

        $STH = "INSERT INTO kk_media (ID, mediaTitle, mediaCategory, mediaDate, mediaUrl) VALUES ('$fileid', '$filename', '$filecategory', '$filedate', '$filepath')";
        $omakysely = $DBH->prepare($STH);
        $omakysely->execute();

        $filejson = 'kuvat.json';
// Open the file to get existing content
        $current = file_get_contents($filejson);
// Append a new person to the file
        $current .= $newimg;

         $newimg = '{  "ID"  :"'. $fileid.'",
                "mediaTitle" :"'. $filename.'",
                "mediaType" :"'. 'image\/jpeg'.'",
                "mediaUrl" : "'. $filepath.'",
                "mediaThumb" : "'. $filepath.'"
                }';
// Write the contents back to the file
        file_put_contents("kuvat.json",$newimg, FILE_APPEND);





        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<form action="sivu.php">
    <input type="submit" value="Takaisin" />
</form>
