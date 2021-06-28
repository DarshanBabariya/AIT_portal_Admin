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
      .gal-title h1{
        font-family: 'Vollkorn', serif;
        font-size: 2em;
        font-weight: 600;
        margin-top: 10px;
        color: #272833;
        letter-spacing: 1px;
        text-transform: uppercase;
      }
      .gal-title hr {
        width: 25%;
        border: 2px solid #CC0000;
        background-color: #CC0000;
        margin-bottom: 10px;
      }
      /* workshop, event, club, newsletter */
        #workshop, #event, #club, #newsletter {
            padding-top: 50px;
            background-color: #f5f5f5c4;
            margin-bottom: 50px;
            border-bottom: 1px solid  #dee2e6;
        }
        .card-tile {
            display: flex;
            justify-content: center;
            color: #272833;
            padding: 25px 10px;
            margin-top: 0;
        }
        .card-title {
            font-size: 25px;
            font-weight: bold; 
            color: #CC0000;
            text-transform: uppercase;
        }
        .card-title i, .list-group-item i {
            color: #CC0000;
        }
        .list-group-item, .card-text {
            font-size: 18px;
        }
        a {
            text-decoration: none !important;
        }
        
    </style>
    <title> AIT | CE & IT PORTAL-ADMIN | Gallary </title>
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

    <div class="container-fluid gal-title text-center">
        <h1>Gallary</h1>
        <hr class="mx-auto">
    </div>

    <div class="container-fluid">
     <!-- error -->
     <?php if (isset($_SESSION["error"]) && $_SESSION["error"] != "") { ?>
            <div class="alert alert-danger text-center m-4" role="alert">
            <?php echo $_SESSION["error"]; ?>
        </div>
        <?php
            unset($_SESSION["error"]);
        } ?>
        <!-- success -->
        <?php if (isset($_SESSION["success"]) && $_SESSION["success"] != "") { ?>
            <div class="alert alert-success text-center m-4" role="alert">
                <?php echo $_SESSION["success"]; ?>
            </div>
            <?php
                unset($_SESSION["success"]);
            } ?>
    </div>

    <!-- gallary_nav -->
    <ul class="nav nav-tabs justify-content-center mt-4" id="myTab" role="tablist">
        <li class="nav-item gal-nav">
          <a class="nav-link active" id="subject-tab" data-toggle="tab" href="#workshop" role="tab" aria-controls="home" aria-selected="true">
            Workshop
          </a>
        </li>
        <li class="nav-item gal-nav">
          <a class="nav-link" id="timetable-tab" data-toggle="tab" href="#events" role="tab" aria-controls="profile" aria-selected="false">
            Events
          </a>
        </li>
        <li class="nav-item gal-nav">
          <a class="nav-link" id="mse-tab" data-toggle="tab" href="#clubs" role="tab" aria-controls="contact" aria-selected="false">
            Clubs
          </a>
        </li>
        <li class="nav-item gal-nav">
          <a class="nav-link" id="attendance-tab" data-toggle="tab" href="#newsletter" role="tab" aria-controls="contact" aria-selected="false">
            Newsletter
          </a>
        </li>
      </ul>

    <div class="tab-content" id="myTabContent">
        <!-- workshop -->
        <div class="container-fluid tab-pane fade show active" id="workshop" role="tabpanel" aria-labelledby="subject-tab">
            <a href="add_gallary_form.php?action=workshop"><button type="button" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn">
                Add New Workshop
            </button></a>
            
            <!-- All Workshops -->
            <?php
              $allworkshopquery = "SELECT * FROM `workshop` WHERE 1" ;
              $allworkshopqueryResult = $connection->query($allworkshopquery);
              $workshopes = $allworkshopqueryResult->fetchAll();  
            ?>

            <div class="row">
                <?php 
                    if (count($workshopes) > 0) {
                        foreach ($workshopes as $workshop) { 
                ?>
                    <div class="col-lg-4 col-sm-6 col-12 card-tile">
                        <div class="card" style="width: 25rem;">
                            <img class="card-img-top" src="<?php echo $workshop["image_path"]; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-quote-left"></i>&nbsp; <?php echo $workshop["title"]; ?></h4>
                                <p class="card-text"><?php echo $workshop["details"]; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fa fa-calendar-check-o"></i>&nbsp; <?php echo $workshop["date"]; ?></li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="edit_gallary_form.php?action=workshop&id=<?php echo $workshop["id"]; ?>"><button type="button" class="btn btn-outline-primary m-2 px-4">Edit</button></a>
                                <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_workshop?id=<?php echo $workshop["id"]; ?>">Delete</button>
                            </div>
                        </div>
                    </div> 

                    <!-- delete_workshop -->
                    <div class="modal fade" id="delete_workshop?id=<?php echo $workshop["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Workshop</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card text-center alert alert-danger">
                                        <div class="card-body">
                                            <p class="card-text">Are you sure You want to delete workshop <br><b><?php echo $workshop["title"]; ?> </b>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="delete_gallary.php?action=workshop&id=<?php echo $workshop["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                        }
                    }?>
            </div>
        </div>

        <!-- Events -->
        <div class="container-fluid tab-pane fade show" id="events" role="tabpanel" aria-labelledby="subject-tab">
            <a href="add_gallary_form.php?action=events"><button type="button" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn">
                Add New Events
            </button></a>
            
            <!-- All Events -->
            <?php
              $alleventsquery = "SELECT * FROM `events` WHERE 1" ;
              $alleventsqueryResult = $connection->query($alleventsquery);
              $events = $alleventsqueryResult->fetchAll();  
            ?>

            <div class="row">
                <?php 
                    if (count($events) > 0) {
                        foreach ($events as $event) { 
                ?>
                    <div class="col-lg-4 col-sm-6 col-12 card-tile">
                        <div class="card" style="width: 25rem;">
                            <img class="card-img-top" src="<?php echo $event["image_path"]; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-quote-left"></i>&nbsp; <?php echo $event["title"]; ?></h4>
                                <p class="card-text"><?php echo $event["details"]; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fa fa-calendar-check-o"></i>&nbsp; <?php echo $event["date"]; ?></li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="edit_gallary_form.php?action=events&id=<?php echo $event["id"]; ?>"><button type="button" class="btn btn-outline-primary m-2 px-4">Edit</button></a>
                                <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_events?id=<?php echo $event["id"]; ?>">Delete</button>
                            </div>
                        </div>
                    </div>

                    <!-- delete_Events -->
                    <div class="modal fade" id="delete_events?id=<?php echo $event["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Events</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card text-center alert alert-danger">
                                        <div class="card-body">
                                            <p class="card-text">Are you sure You want to delete event <br><b><?php echo $event["title"]; ?> </b>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="delete_gallary.php?action=events&id=<?php echo $event["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                        }
                    }?>
            </div>
        </div>

        <!-- clubs -->
        <div class="container-fluid tab-pane fade show" id="clubs" role="tabpanel" aria-labelledby="subject-tab">
            <a href="add_gallary_form.php?action=clubs"><button type="button" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn">
                Add New Clubs
            </button></a>
            
            <!-- All Events -->
            <?php
              $allclubsquery = "SELECT * FROM `clubs` WHERE 1" ;
              $allclubsqueryResult = $connection->query($allclubsquery);
              $clubs = $allclubsqueryResult->fetchAll();  
            ?>

            <div class="row">
                <?php 
                    if (count($clubs) > 0) {
                        foreach ($clubs as $club) { 
                ?>
                    <div class="col-lg-4 col-sm-6 col-12 card-tile">
                        <div class="card" style="width: 25rem;">
                            <img class="card-img-top" src="<?php echo $club["image_path"]; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-quote-left"></i>&nbsp; <?php echo $club["title"]; ?></h4>
                                <p class="card-text"><?php echo $club["details"]; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fa fa-calendar-check-o"></i>&nbsp; <?php echo $club["date"]; ?></li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="edit_gallary_form.php?action=clubs&id=<?php echo $club["id"]; ?>"><button type="button" class="btn btn-outline-primary m-2 px-4">Edit</button></a>
                                <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_clubs?id=<?php echo $club["id"]; ?>">Delete</button>
                            </div>
                        </div>
                    </div>

                    <!-- delete_Events -->
                    <div class="modal fade" id="delete_clubs?id=<?php echo $club["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Events</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card text-center alert alert-danger">
                                        <div class="card-body">
                                            <p class="card-text">Are you sure You want to delete club <br><b><?php echo $club["title"]; ?> </b>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="delete_gallary.php?action=clubs&id=<?php echo $club["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                        }
                    }?>
            </div>
        </div>

        <!-- newsletter -->
        <div class="container-fluid tab-pane fade show" id="newsletter" role="tabpanel" aria-labelledby="subject-tab">
            <a href="add_gallary_form.php?action=newsletter"><button type="button" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn">
                Add New Newsletter
            </button></a>
            
            <!-- All Events -->
            <?php
              $allnewsletterquery = "SELECT * FROM `newsletter` WHERE 1" ;
              $allnewsletterqueryResult = $connection->query($allnewsletterquery);
              $newsletters = $allnewsletterqueryResult->fetchAll();  
            ?>

            <div class="row">
                <?php 
                    if (count($newsletters) > 0) {
                        foreach ($newsletters as $newsletter) { 
                ?>
                    <div class="col-lg-4 col-sm-6 col-12 card-tile">
                        <div class="card" style="width: 25rem;">
                            <img class="card-img-top" src="<?php echo $newsletter["image_path"]; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-quote-left"></i>&nbsp; <?php echo $newsletter["title"]; ?></h4>
                                <p class="card-text"><?php echo $newsletter["details"]; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fa fa-calendar-check-o"></i>&nbsp; <?php echo $newsletter["date"]; ?></li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <a href="edit_gallary_form.php?action=newsletter&id=<?php echo $newsletter["id"]; ?>"><button type="button" class="btn btn-outline-primary m-2 px-4">Edit</button></a>
                                <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_newsletter?id=<?php echo $newsletter["id"]; ?>">Delete</button>
                            </div>
                        </div>
                    </div>

                    <!-- delete_newsletter -->
                    <div class="modal fade" id="delete_newsletter?id=<?php echo $newsletter["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Newsletter</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card text-center alert alert-danger">
                                        <div class="card-body">
                                            <p class="card-text">Are you sure You want to delete newsletter <br><b><?php echo $newsletter["title"]; ?> </b>.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="delete_gallary.php?action=newsletter&id=<?php echo $newsletter["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                        }
                    }?>
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
}else {
    $_SESSION["error"] = "Please Login first to access portal admin.";
    header("Location: ../admin_login.php");

}
?>