<?php 
session_start();

require('../db_config/config.php');

    $target_dir = "../images/faculty/";
    $target_file = $target_dir . basename($_FILES["fcimage"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        $_SESSION["error"] = "Sorry, image <b>already exists</b>. Faculty was <b>not added</b>";
        header("Location: faculty.php");
        $uploadOk = false;
    }
    if ($_FILES["fcimage"]["size"] > 2 * 1024 * 1024) {
        $_SESSION["error"] = "Sorry, your image is <b>too large</b>. Faculty was <b>not added</b>";
        header("Location: faculty.php");
        $uploadOk = false;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION["error"] = "Sorry, only <b>JPG, JPEG & PNG</b> files are allowed. Faculty was <b>not added</b>";
        header("Location: faculty.php");
        $uploadOk = false;
    }

    if ($uploadOk) {
        move_uploaded_file($_FILES["fcimage"]["tmp_name"], $target_file);
    } 
  

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fcid = $_REQUEST["fcid"];
        $fcimage = $target_file;
        $fcname = $_REQUEST["fcname"];
        $fcdesignation = $_REQUEST["fcdesignation"];
        $fcexperiance = $_REQUEST["fcexperiance"];
        $fcqualification = $_REQUEST["fcqualification"];
        $fcexpertise = $_REQUEST["fcexpertise"];
        $fcemail = $_REQUEST["fcemail"];

        $insert_fc = "INSERT INTO `faculty`(`faculty_id`, `name`, `image_path`, `designation`, `experience`, `qualification`, `expertise`, `email`) VALUES ('$fcid','$fcname','$fcimage','$fcdesignation','$fcexperiance','$fcqualification','$fcexpertise','$fcemail')"; 
        $connection->exec($insert_fc);

        $_SESSION["success"] = "Faculty Added Sucessfully.!";
        header("Location: faculty.php");
}

?>