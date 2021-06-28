<?php 
    session_start();

    require('../db_config/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["sem"] != "" && $_REQUEST["subcode"] != "" && $_REQUEST["action"] != "") {
        
        $sem =  $_REQUEST["sem"];
        $subcode = $_REQUEST["subcode"];
        $action = $_REQUEST["action"];

        $target_dir = "$action/";
        $target_file = $target_dir . basename($_FILES["customFile"]["name"]);
        $uploadOk = 1;
        $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if (file_exists($target_file)) {
            $_SESSION["error"] = "Sorry, selected file <b> already exists</b> while adding $action file.";
            $uploadOk = 0;
            header("Location: subject_material.php?sem=$sem&subcode=$subcode");
        }
        if ($_FILES["customFile"]["size"] > 500000) {
            $_SESSION["error"] = "Sorry, your file is too large while adding $action file.";
            $uploadOk = 0;
            header("Location: subject_material.php?sem=$sem&subcode=$subcode");
        }
        if($pdfFileType != "pdf") {
            $_SESSION["error"] = "Sorry, only <b>*pdf</b> file allowed while adding $action file.";
            $uploadOk = 0;
            header("Location: subject_material.php?sem=$sem&subcode=$subcode");
        }

        if ($uploadOk == 0) {
            header("Location: subject_material.php?sem=$sem&subcode=$subcode");
        } 
        else {
            if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $target_file)) {

                $insert_file = "INSERT INTO `$action`(`sem`, `sub_code`,`file_path`) VALUES ('$sem','$subcode','$target_file')"; 
                $connection->exec($insert_file);

                $_SESSION["success"] = "The $action file <b>". htmlspecialchars( basename( $_FILES["customFile"]["name"])). "</b> has been added successfully.!!";
                header("Location: subject_material.php?sem=$sem&subcode=$subcode");

            } 
            else {
                $_SESSION["error"] = "Sorry, there was an error adding your $action file.";
                header("Location: subject_material.php?sem=$sem&subcode=$subcode");

            }
        }

    }
   

?>