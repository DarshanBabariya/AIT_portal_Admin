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

        $insert_sub = "INSERT INTO `subject`(`branch`, `semester`, `sub_code`, `sub_name`, `sub_credit`, `sub_theorymarks`, `sub_precticalmarks`, `sub_totalmarks`) VALUES ('$branch','$sem','$subcode','$subname','$subcredit','$subthmark','$subpremark','$subtotalmark')"; 
        $connection->exec($insert_sub);

        $_SESSION["success"] = "Subject Added Sucessfully.!";
        header("Location: semester.php?sem=$sem");

    }

?>