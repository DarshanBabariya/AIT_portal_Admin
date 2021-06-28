<?php 
session_start();

require('../db_config/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["sem"] != "") {

        $branch = "";

        foreach ($_REQUEST["branch"] as $branches) {
            $branch .= $branches . " ";
        }

        $sem = $_REQUEST["sem"];
        $subcode = $_REQUEST["subcode"];
        $subname = $_REQUEST["subname"];
        $subcredit = $_REQUEST["subcredit"];
        $subthmark = $_REQUEST["subthmark"];
        $subpremark = $_REQUEST["subpremark"];
        $subtotalmark = $subthmark + $subpremark ; 

        $update_sub = "UPDATE `subject` SET `branch`='$branch',`sub_code`='$subcode',`sub_name`='$subname',`sub_credit`='$subcredit',`sub_theorymarks`='$subthmark',`sub_precticalmarks`='$subpremark',`sub_totalmarks`='$subtotalmark' WHERE id=". $_REQUEST["id"]; 
        $connection->exec($update_sub);

        $_SESSION["success"] = "<b> ".$subname . "</b> Updated Sucessfully.!";
        header("Location: semester.php?sem=$sem");

    }

?>