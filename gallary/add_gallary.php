<?php 
    session_start();

    require('../db_config/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" &&  $_REQUEST["action"] != "") {
        
        $action = $_REQUEST["action"];
        $galtitle = $_REQUEST["galtitle"];
        $galdetail = $_REQUEST["galdetail"];
        $galdate = $_REQUEST["galdate"];


        $target_dir = "$action/";
        $target_file = $target_dir . basename($_FILES["customFile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if (file_exists($target_file)) {
            $_SESSION["error"] = "Sorry, selected image <b> already exists</b> while adding $action image.";
            $uploadOk = 0;
            header("Location: gallary.php");
        }
        if ($_FILES["customFile"]["size"] > 2097152) {
            $_SESSION["error"] = "Sorry, your image is too large while adding $action image.";
            $uploadOk = 0;
            header("Location: gallary.php");
        }
        if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            $_SESSION["error"] = "Sorry, only <b>*jpg</b>, <b>*jpeg</b> and <b>*png</b> image allowed while adding $action image.";
            $uploadOk = 0;
            header("Location: gallary.php");
        }
        if ($uploadOk == 0) {
            header("Location: gallary.php");
        } 
        else {
            if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $target_file)) {

                $insert_file = "INSERT INTO `$action`(`image_path`, `title`,`details`,`date`) VALUES ('$target_file','$galtitle','$galdetail','$galdate')"; 
                $connection->exec($insert_file);

                $_SESSION["success"] = "The <b>$action</b> has been added successfully.!!";
                header("Location: gallary.php");

            } 
            else {
                $_SESSION["error"] = "Sorry, there was an error adding your $action information.";
                header("Location: gallary.php");

            }
        }

    }
   

?>