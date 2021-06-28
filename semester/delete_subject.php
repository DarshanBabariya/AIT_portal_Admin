<?php 
    session_start();

    require('../db_config/config.php');

    if (isset($_REQUEST['id']) && $_REQUEST['id'] != '' && $_REQUEST['sem'] != '') {
        $subId = $_REQUEST['id'];
        $sem = $_REQUEST["sem"];

        $deleteQuery = "DELETE FROM `subject` WHERE id=" . $subId;
        $connection->exec($deleteQuery);
        
        $_SESSION['success'] = 'Subject has been deleted successfully.!';
        header("Location: semester.php?sem=$sem");
    }
    

?>