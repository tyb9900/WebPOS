<?php
#Orignal Source https://www.w3schools.com/php/php_file_upload.asp
require_once ('Classes/User.php');
$target_dir = "graphics/users/";
$target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
$uploadOk = 1;
$filename = explode('.',$_FILES["profilePicture"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["updateProfile"])) {
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
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
    while (file_exists($target_file))
    {
        $num = rand(1,1000);
        $target_file = $target_dir . $filename[0] . $num . "." . $filename[1];
//        echo "Sorry, file already exists.";
//        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["profilePicture"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     ) {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    session_start();
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["profilePicture"]["name"]). " has been uploaded.";
        $user = new User();
        $_SESSION["userimg"] = "graphics/users/".basename($_FILES["profilePicture"]["name"]);
        $user->uploadPicture("graphics/users/".basename($_FILES["profilePicture"]["name"]),$_SESSION["username"]);
        echo "UPDATED";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
header("location:index.php");
?>