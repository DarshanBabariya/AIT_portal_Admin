<?php 
    session_start();

    require('../db_config/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" &&  $_REQUEST["action"] != "" &&  $_REQUEST["id"] != "") {
        
        $action = $_REQUEST["action"];
        $galtitle = $_REQUEST["galtitle"];
        $galdetail = $_REQUEST["galdetail"];
        $galdate = $_REQUEST["galdate"];
        $id = $_REQUEST["id"]; 

        if (basename($_FILES["customFile"]["name"]) == "") {
            $image = false;
            
            $update_query = "UPDATE `$action` SET `title`='$galtitle',`details`='$galdetail',`date`='$galdate' WHERE id=". $id; 
            $connection->exec($update_query);

            $_SESSION["success"] = "The $action <b>$galtitle</b> has been updated successfully.!!";
            header("Location: gallary.php");


        }
        else {

            $target_dir = "$action/";
            $target_file = $target_dir . basename($_FILES["customFile"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            if (file_exists($target_file)) {
                $_SESSION["error"] = "Sorry, selected image <b> already exists</b> while updating $action image.";
                $uploadOk = 0;
                header("Location: gallary.php");
            }
            if ($_FILES["customFile"]["size"] > 2097152) {
                $_SESSION["error"] = "Sorry, your image is too large while updating $action image.";
                $uploadOk = 0;
                header("Location: gallary.php");
            }
            if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
                $_SESSION["error"] = "Sorry, only <b>*jpg</b>, <b>*jpeg</b> and <b>*png</b> image allowed while updating $action image.";
                $uploadOk = 0;
                header("Location: gallary.php");
            }
            if ($uploadOk == 0) {
                header("Location: gallary.php");
            } 
            else {
                if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $target_file)) {

                    $actionquery = "SELECT * FROM `$action` WHERE id=".$id ;
                    $actionqueryResult = $connection->query($actionquery);
                    $actionfilename = $actionqueryResult->fetch(); 
            
                    $path = $actionfilename['image_path']; //delete old file from folder
                    unlink($path);

                    $update_query = "UPDATE `$action` SET `image_path`='$target_file', `title`='$galtitle',`details`='$galdetail',`date`='$galdate' WHERE id=". $id; 
                    $connection->exec($update_query);

                    $_SESSION["success"] = "The $action <b>$galtitle</b> has been updated successfully.!!";
                    header("Location: gallary.php");

                } 
                else {
                    $_SESSION["error"] = "Sorry, there was an error updating your $action information.";
                    header("Location: gallary.php");

                }
            }
        }
    }
   

?>