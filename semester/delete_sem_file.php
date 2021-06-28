<?php 
    session_start();

    require('../db_config/config.php');


    if ($_REQUEST["sem"] != "" && $_REQUEST["action"] != "" && $_REQUEST["fileid"] != "") {
       
        $sem = $_REQUEST["sem"];
        $action = $_REQUEST["action"];
        $fileid = $_REQUEST["fileid"];

        $allactionquery = "SELECT * FROM `$action` WHERE id=".$fileid ;
        $allactionqueryResult = $connection->query($allactionquery);
        $actionfilename = $allactionqueryResult->fetch(); 

        $path = $actionfilename['file_path']; //delete file from folder
        unlink($path);
       

        $deleteQuery = "DELETE FROM `$action` WHERE id=" . $fileid;
        $connection->exec($deleteQuery);

       
        
        $_SESSION['success'] = $path .' has been deleted successfully.!';
        header("Location: semester.php?sem=$sem");
    }
    

?>