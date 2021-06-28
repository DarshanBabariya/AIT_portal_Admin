<?php 
    session_start();

    require('../db_config/config.php');

    if ($_REQUEST["action"] !== '' && $_REQUEST['id'] !== '') {

        $action = $_REQUEST["action"];
        $id = $_REQUEST['id'];

        $actionquery = "SELECT * FROM `$action` WHERE id=".$id ;
        $actionqueryResult = $connection->query($actionquery);
        $actionfilename = $actionqueryResult->fetch(); 

        $path = $actionfilename['image_path']; //delete old image from folder
        unlink($path);

        $deleteQuery = "DELETE FROM `$action` WHERE id=" . $id;
        $connection->exec($deleteQuery);
        
        $_SESSION['success'] =  '<b>'.$action . '</b> has been deleted successfully.!';
        header("Location: gallary.php");
    }
    

?>