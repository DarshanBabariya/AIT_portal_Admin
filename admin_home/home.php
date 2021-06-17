<?php
    session_start();

    if (isset($_SESSION["uname"])) {
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style1.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- fevicon -->
    <link rel="icon" href="../images/logo/logo.png" sizes="16x16">

    <title>AIT | CE & IT PORTAL | ADMIN</title>
</head>

<body>
    <!-- brand-name -->
    <div class="ait-brand container-fluid">
        <div class="row">
            <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 col-2" id="brand-logo">
                <a href="home.php">
                    <img src="../images/logo/logo.png" alt="AIT logo" title="AIT">
                </a>
            </div>
            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10" id="brand-name">
                <a href="home.php" title="AIT">
                    <h1> Ahmedabad Institute Of Technology </h1>
                </a>
                <h3> EST.2004 | AICTE APPROVED | GTU AFFILIATED</h3>
            </div>
        </div>
    </div>

    <?php include('../header/header.php') ?>




    <!-- footer -->
    <!-- <footer class="container-fluid copyright">
        <div class="text-center">
            <p> &copy; Copyright 2021 All rights reserved with by Ahmedabad Institute of Technology</p>
        </div>
    </footer> -->




    <!-- Optional JavaScript -->
    <script src="../js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
<?php 
}else {
    $_SESSION["error"] = "Please Login first to access portal admin.";
    header("Location: ../admin_login.php");

}
?>