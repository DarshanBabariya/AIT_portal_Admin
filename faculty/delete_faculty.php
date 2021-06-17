<?php 
    session_start();

    require('../db_config/config.php');

    if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
        $fcId = $_REQUEST['id'];

        $deleteQuery = "DELETE FROM `faculty` WHERE id=" . $fcId;
        $connection->exec($deleteQuery);
        
        $_SESSION['success'] = 'Faculty has been deleted successfully.!';
        header("Location: faculty.php");
    }
    

?>