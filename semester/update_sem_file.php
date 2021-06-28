<?php 
    session_start();

    require('../db_config/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["sem"] != "" && $_REQUEST["action"] != "" && $_REQUEST["fileid"] != "") {
       
        $sem = $_REQUEST["sem"];
        $action = $_REQUEST["action"];
        $fileid = $_REQUEST["fileid"];

        $target_dir = "$action/";
        $target_file = $target_dir . basename($_FILES["customFile"]["name"]);
        $uploadOk = 1;
        $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if (file_exists($target_file)) {
            $_SESSION["error"] = "Sorry, selected file <b> already exists</b> while updating $action.";
            $uploadOk = 0;
            header("Location: semester.php?sem=$sem");
        }
        if ($_FILES["customFile"]["size"] > 500000) {
            $_SESSION["error"] = "Sorry, your file is too large while updating $action.";
            $uploadOk = 0;
            header("Location: semester.php?sem=$sem");
        }
        if($pdfFileType != "pdf") {
            $_SESSION["error"] = "Sorry, only <b>*pdf</b> file allowed while updating $action.";
            $uploadOk = 0;
            header("Location: semester.php?sem=$sem");
        }

        if ($uploadOk == 0) {
            header("Location: semester.php?sem=$sem");
        } 
        else {

            $allactionquery = "SELECT * FROM `$action` WHERE id=".$fileid ;
            $allactionqueryResult = $connection->query($allactionquery);
            $actionfilename = $allactionqueryResult->fetch(); 
    
            $path = $actionfilename['file_path']; //delete old file from folder
            unlink($path);

            if (move_uploaded_file($_FILES["customFile"]["tmp_name"], $target_file)) {

                $update_file = "UPDATE `$action` SET `file_path`='$target_file' WHERE id=". $fileid; 
                $connection->exec($update_file);

                $_SESSION["success"] = "The $action file <b>". htmlspecialchars( basename( $_FILES["customFile"]["name"])). "</b> has been updated.";
                header("Location: semester.php?sem=$sem");

            } 
            else {
                $_SESSION["error"] = "Sorry, there was an error updating your $action file.";
                header("Location: semester.php?sem=$sem");

            }
        }

    }
   


?>