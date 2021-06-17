<?php 
session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_REQUEST["uname"];
        $pwd = $_REQUEST["pwd"];

        if ($uname == "admin" && $pwd == "root") {
            $_SESSION["uname"] = $uname;
            header("Location: admin_home/home.php");
        }
        else {
            $_SESSION["error"] = "Please enter valid <b>user name</b> and <b>password</b> !";
            header("Location: admin_login.php");
        } 
    }
?>