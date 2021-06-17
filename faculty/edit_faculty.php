<?php 
    session_start();

    require('../db_config/config.php');

    $target_dir = "../images/faculty/";

    if (basename($_FILES["fcimage"]["name"]) == "") {
        $image = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fcid = $_REQUEST["fcid"];
            $fcname = $_REQUEST["fcname"];
            $fcdesignation = $_REQUEST["fcdesignation"];
            $fcexperiance = $_REQUEST["fcexperiance"];
            $fcqualification = $_REQUEST["fcqualification"];
            $fcexpertise = $_REQUEST["fcexpertise"];
            $fcemail = $_REQUEST["fcemail"];
    
            $update_fc = "UPDATE `faculty` SET `faculty_id`='$fcid',`name`='$fcname',`designation`='$fcdesignation',`experience`='$fcexperiance',`qualification`='$fcqualification',`expertise`='$fcexpertise',`email`='$fcemail' WHERE id=". $_REQUEST["id"]; 
            $connection->exec($update_fc);
    
            $_SESSION["success"] = "Faculty Updated Sucessfully.!";
            header("Location: faculty.php");
        }
    }
    else{
        $image = true;

        $target_file = $target_dir . basename($_FILES["fcimage"]["name"]);

        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $_SESSION["error"] = "Sorry, image <b>already exists</b>. Faculty was <b>not updated</b>.";
            header("Location: edit_faculty_form.php?id=".$_REQUEST["id"]);
            $uploadOk = false;
        }
        if ($_FILES["fcimage"]["size"] > 2 * 1024 * 1024) {
            $_SESSION["error"] = "Sorry, your image is <b>too large</b>. Faculty was <b>not updated</b>.";
            header("Location: edit_faculty_form.php?id=".$_REQUEST["id"]);
            $uploadOk = false;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION["error"] = "Sorry, only <b>JPG, JPEG & PNG</b> files are allowed. Faculty was <b>not updated</b>.";
            header("Location: edit_faculty_form.php?id=".$_REQUEST["id"]);
            $uploadOk = false;
        }

        if ($uploadOk) {
            move_uploaded_file($_FILES["fcimage"]["tmp_name"], $target_file);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $fcid = $_REQUEST["fcid"];
                $fcname = $_REQUEST["fcname"];
                $imagepath = $target_file;
                $fcdesignation = $_REQUEST["fcdesignation"];
                $fcexperiance = $_REQUEST["fcexperiance"];
                $fcqualification = $_REQUEST["fcqualification"];
                $fcexpertise = $_REQUEST["fcexpertise"];
                $fcemail = $_REQUEST["fcemail"];
        
                $update_fc = "UPDATE `faculty` SET `faculty_id`='$fcid',`name`='$fcname',`image_path`='$imagepath',`designation`='$fcdesignation',`experience`='$fcexperiance',`qualification`='$fcqualification',`expertise`='$fcexpertise',`email`='$fcemail' WHERE id=". $_REQUEST["id"]; 
                $connection->exec($update_fc);
        
                $_SESSION["success"] = "Faculty Updated Sucessfully.!";
                header("Location: faculty.php");
            }
        } 

        
    }
    
    

    
   

?>