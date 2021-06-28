<?php 
session_start();
require('../db_config/config.php');

if (isset($_SESSION["uname"]) && $_REQUEST["sem"] != "") {
    $sem = $_REQUEST["sem"];
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

    <style>
        a {
            text-decoration: none;
        }
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

        $selectsubquery = "SELECT `id`, `branch`, `sub_code`, `sub_name`, `sub_credit`, `sub_theorymarks`, `sub_precticalmarks`, `sub_totalmarks` FROM `subject` WHERE id=".$_REQUEST["id"];
        $selectsubqueryResult = $connection->query($selectsubquery);
        $selectsubject = $selectsubqueryResult->fetch();

    ?>
    
    <div class="container-fluid mb-4" id="faculty">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-1">
                        <a href="semester.php?sem=<?php echo $sem; ?>">
                            <h5 class="text-center"><i class="fa fa-arrow-left"></i></h5>
                        </a>
                    </div>
                    <div class="col-11">
                        <h5 class="text-center heading-tile">Edit Subject</h5>
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
            <!-- add_faculty_form -->
                    <form id="sub_add_form" onsubmit="return add_subject()" action="edit_subject.php?sem=<?php echo $sem; ?>&id=<?php echo $selectsubject["id"]; ?>" method="post"> 
                        <div class="form-group">
                            <label for="subbranch">Branch</label>
                            <div class="form-check" id="subbranch">
                              <input class="branchCheckbox" type="checkbox" value="All" id="all" name="branch[]" <?php echo strpos($selectsubject["branch"],"All") !== false ? "checked" : ""; ?>>
                              <label class="form-check-label" for="all"> All </label><br>
                              <input class="branchCheckbox" type="checkbox" value="CE" id="ce" name="branch[]" <?php echo strpos($selectsubject["branch"],"CE") !== false ? "checked" : ""; ?>>
                              <label class="form-check-label" for="ce"> Computer Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="IT" id="it" name="branch[]" <?php echo strpos($selectsubject["branch"],"IT") !== false ? "checked" : ""; ?>>
                              <label class="form-check-label" for="it"> Information Technology </label><br>
                              <input class="branchCheckbox" type="checkbox" value="ME" id="me" name="branch[]" <?php echo strpos($selectsubject["branch"],"ME") !== false ? "checked" : ""; ?>>
                              <label class="form-check-label" for="me"> Mechanical Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="Auto" id="auto" name="branch[]" <?php echo strpos($selectsubject["branch"],"Auto") !== false ? "checked" : ""; ?>>
                              <label class="form-check-label" for="auto"> AutoMobile Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="Civil" id="civil" name="branch[]" <?php echo strpos($selectsubject["branch"],"Civil") !== false ? "checked" : ""; ?>>
                              <label class="form-check-label" for="civil"> Civil Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="Electrical" id="electrical" name="branch[]" <?php echo strpos($selectsubject["branch"],"Electrical") !== false ? "checked" : ""; ?>>
                              <label class="form-check-label" for="electrical"> Electrical Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="EC" id="ec" name="branch[]" <?php echo strpos($selectsubject["branch"],"EC") !== false ? "checked" : ""; ?>>
                              <label class="form-check-label" for="ec"> Electronics and Communication Engineering </label><br>
                            </div>
                            
                            <label for="subcode">GTU Code</label>
                            <input class="form-control" type="text" name="subcode" id="subcode" value="<?php echo $selectsubject["sub_code"]; ?>" placeholder="Enter GTU Code">

                            <label for="subname">Subject Name</label>
                            <input type="text" class="form-control" id="subname" name="subname" value="<?php echo $selectsubject["sub_name"]; ?>" placeholder="Enter Subject Name">
                            
                            <label for="subcredit">Subject Credit</label>
                            <input class="form-control" type="text" name="subcredit" id="subcredit" value="<?php echo $selectsubject["sub_credit"]; ?>" placeholder="Enter Subject Credit as per GTU">

                            <label for="subthmark">Theory Marks</label>
                            <input class="form-control" type="text" name="subthmark" id="subthmark" value="<?php echo $selectsubject["sub_theorymarks"]; ?>" placeholder="Enter Subject Thory Marks">

                            <label for="subpremark">Prectical Marks</label>
                            <input class="form-control" type="text" name="subpremark" id="subpremark" value="<?php echo $selectsubject["sub_precticalmarks"]; ?>" placeholder="Enter Subject Prectiacl Marks">
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
    <script src="../js/subject_validation.js"></script>
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