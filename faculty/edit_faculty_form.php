<?php 
session_start();
require('../db_config/config.php');

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

    <style>
        .navigation {
            z-index: 1;
        }
        .container-fluid {
            padding-left: 70px;
            padding-top: 20px;
        }
        .heading-tile {
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            font-size: 22px;
        }
        #add_fc_btn {
            background-color: #CC0000;
            color: #FFF;
            letter-spacing: 1px;
            box-shadow: none;
        }
        /* faculty */
        .faculty_content {
            background-color: #FFF;  
            margin: 10px;
        }

        .fac-img img {
            width: 200px;
            height: 200px;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .fac-img h4 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 22px;
            font-weight: bold;
            color: #CC0000;
            border: 2px solid #dee2e6;
            padding: 5px;
        }
        .fac-detail ul {
            text-align: left;
            margin: 30px;
            list-style: none;
        }
        .fac-detail ul li span{
            font-weight: bold;
        }
        .fac-detail ul li {
            margin-bottom: 10px;
            font-size: 20px;
            color: #272833;
        }
        #fc_add_form label{
            margin-top: 10px;
        }
        #fc_add_form input, #fc_add_form textarea{
            box-shadow: none;
        }
        #add_error {
            display: none;
        }
        #edit_error {
            display: none;
        }
    </style>
    <title>AIT | CE & IT PORTAL-ADMIN | Faculty</title>
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

    <?php if (isset($_REQUEST['id'])) {

        $selectfacquery = "SELECT `id`, `faculty_id`, `name`, `image_path`, `designation`, `experience`, `qualification`, `expertise`, `email` FROM `faculty` WHERE id=".$_REQUEST["id"];
        $selectfacqueryResult = $connection->query($selectfacquery);
        $selectfaculty = $selectfacqueryResult->fetch();

    ?>
    
    <div class="container-fluid mb-4" id="faculty">
        <div class="card">
            <h5 class="card-header text-center heading-tile">Edit Faculty</h5>
            <div class="card-body">

                 <!-- error -->
        <?php if (isset($_SESSION["error"]) && $_SESSION["error"] != "") { ?>
                <div class="alert alert-danger text-center m-4" role="alert">
                <?php echo $_SESSION["error"]; ?>
            </div>
            <?php
                unset($_SESSION["error"]);
            } ?>
            <div class="alert alert-danger text-center" role="alert" id="edit_error">
            </div>    
            <!-- add_faculty_form -->
            <form id="fc_add_form" onsubmit="return edit_faculty()" action="edit_faculty.php?id=<?php echo $_REQUEST["id"]; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fcid">ID</label>
                    <input type="text" class="form-control" id="fcid" name="fcid" placeholder="Enter ID No." value="<?php echo $selectfaculty["id"]; ?>">

                    <label for="fcimage">Image</label>
                    <input class="form-control" type="file" name="fcimage" id="fcimage" <?php echo $selectfaculty["image_path"]; ?>>

                    <label for="fcname">Name</label>
                    <input type="text" class="form-control" id="fcname" name="fcname" placeholder="Enter Name" value="<?php echo $selectfaculty["name"]; ?>">
                    <small id="namelHelp" class="form-text text-muted"> Add dr. or prof. before name</small>
                    
                    <label for="fcid">Designation</label>
                    <input type="text" class="form-control" id="fcdesignation" name="fcdesignation" placeholder="Enter Designation" value="<?php echo $selectfaculty["designation"]; ?>">
                    <small id="degHelp" class="form-text text-muted"> If more then one then saperate by qoma(,)</small>
                    
                    <label for="fcid">Experience</label>
                    <input type="text" class="form-control" id="fcexperiance" name="fcexperiance" placeholder="Enter Experience" value="<?php echo $selectfaculty["experience"]; ?>">
                    
                    <label for="fcid">Qualification</label>
                    <textarea type="text" class="form-control" id="fcqualification" name="fcqualification" placeholder="Enter Qualification"><?php echo $selectfaculty["qualification"]; ?></textarea>
                    <small id="degHelp" class="form-text text-muted"> If more then one then saperate by qoma(,)</small>
                    
                    <label for="fcid">Expertise</label>
                    <textarea type="text" class="form-control" id="fcexpertise" name="fcexpertise" placeholder="Enter Expertise"><?php echo $selectfaculty["expertise"]; ?></textarea>
                    <small id="degHelp" class="form-text text-muted"> If more then one then saperate by qoma(,)</small>
                    
                    <label for="fcid">Email</label>
                    <input type="text" class="form-control" id="fcemail" name="fcemail" placeholder="Enter Email" value="<?php echo $selectfaculty["email"]; ?>">

                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" id="add_fc_btn">UPDATE</button>
            </form>

            </div>
        </div>
    </div>

        <?php 
        }
        ?>


    
    <!-- Optional JavaScript -->
    <script src="../js/script.js"></script>
    <script src="../js/faculty_validation.js"></script>
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