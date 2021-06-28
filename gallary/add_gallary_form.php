<?php 
session_start();
require('../db_config/config.php');

if (isset($_SESSION["uname"]) && $_REQUEST["action"] !== "") {
    $action = $_REQUEST["action"];
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
    <link rel="stylesheet" href="../css/style.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- fevicon -->
    <link rel="icon" href="../images/logo/logo.png" sizes="16x16">

    <title>AIT | CE & IT PORTAL-ADMIN | Gallary</title>
</head>

<body>
    <!-- brand-name -->
    <div class="ait-brand container-fluid">
        <div class="row">
            <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 col-2" id="brand-logo">
                <a href="../admin_home/home.php">
                    <img src="../images/logo/logo.png" alt="AIT logo" title="AIT">
                </a>
            </div>
            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10" id="brand-name">
                <a href="../admin_home/home.php" title="AIT">
                    <h1> Ahmedabad Institute Of Technology </h1>
                </a>
                <h3> EST.2004 | AICTE APPROVED | GTU AFFILIATED</h3>
            </div>
        </div>
    </div>

    <?php include('../header/header.php') ?>

    
    <div class="container-fluid mb-4" id="faculty">
        <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-1">
                        <a href="gallary.php">
                            <h5 class="text-center"><i class="fa fa-arrow-left"></i></h5>
                        </a>
                    </div>
                    <div class="col-11">
                        <h5 class="text-center heading-tile">Add New <?php echo $action; ?></h5>
                    </div>
                    
                </div>
            </div>
            <div class="card-body">

                    <!-- error -->
            <?php if (isset($_SESSION["error"]) && $_SESSION["error"] != "") { ?>
                    <div class="alert alert-danger text-center m-4" role="alert">
                    <?php echo $_SESSION["error"]; ?>
                </div>
                <?php
                    unset($_SESSION["error"]);
                } ?>
                <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div> 
                    <!-- add_workshop_form -->
                    <form id="sub_add_form" onsubmit="return add_gallary()" action="add_gallary.php?action=<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="galtitle">Image</label>
                        <input class="form-control" type="file" name="customFile" id="customFile">
                        <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *jpg, *jpeg or *png formate or less then 2MB</small>
            
                        <label for="galtitle">Title</label>
                        <input type="text" class="form-control" id="galtitle" name="galtitle" placeholder="Enter Title">
                        
                        <label for="galdetail">Details</label>
                        <textarea class="form-control" type="text" name="galdetail" id="galdetail" rows="10" placeholder="Enter Details"></textarea>

                        <label for="galdate">Date</label>
                        <input class="form-control" type="date" name="galdate" id="galdate" placeholder="Select Date">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="add_fc_btn" style="text-transform: uppercase;">ADD <?php echo $action; ?></button>
                </form>
            </div>
        </div>
    </div>



    
    <!-- Optional JavaScript -->
    <script src="../js/script.js"></script>
    <script src="../js/gallary_validation.js"></script>
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
}
else {
    $_SESSION["error"] = "Please Login first to access portal admin.";
    header("Location: ../admin_login.php");

}
?>