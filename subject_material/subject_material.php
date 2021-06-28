<?php 
session_start();
require('../db_config/config.php');

if (isset($_SESSION["uname"]) && $_REQUEST["sem"] != "" && $_REQUEST["subcode"] != "") {
  $sem = $_REQUEST["sem"];
  $subcode = $_REQUEST["subcode"];
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
      .sem-title h1{
        font-family: 'Vollkorn', serif;
        font-size: 2em;
        font-weight: 600;
        margin-top: 10px;
        color: #272833;
        letter-spacing: 1px;
        text-transform: uppercase;
      }
      .sem-title hr {
        width: 25%;
        border: 2px solid #CC0000;
        background-color: #CC0000;
        margin-bottom: 10px;
      }
        
        /* semester */
        
    </style>
    <title> AIT | CE & IT PORTAL-ADMIN | Subject </title>
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
    <?php 
    
        $subjectquery = "SELECT sub_name FROM `subject` WHERE sub_code=".$subcode ;
        $subjectqueryResult = $connection->query($subjectquery);
        $subject = $subjectqueryResult->fetch();  

    ?>
    <div class="container-fluid sem-title text-center">
        <h1><?php echo $subject["sub_name"]; ?></h1>
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
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item gal-nav">
            <a class="nav-link active" id="gtu_syllabus-tab" data-toggle="tab" href="#gtu_syllabus" role="tab"
                aria-controls="home" aria-selected="true">
                GTU Syllabus
            </a>
        </li>
        <li class="nav-item gal-nav">
            <a class="nav-link" id="gtu_papers-tab" data-toggle="tab" href="#gtu_papers" role="tab"
                aria-controls="profile" aria-selected="false">
                GTU Papers
            </a>
        </li>
        <li class="nav-item gal-nav">
            <a class="nav-link" id="que_bank-tab" data-toggle="tab" href="#que_bank" role="tab" aria-controls="contact"
                aria-selected="false">
                Question Bank
            </a>
        </li>
        <li class="nav-item gal-nav">
            <a class="nav-link" id="prectical-tab" data-toggle="tab" href="#prectical" role="tab"
                aria-controls="contact" aria-selected="false">
                Practical
            </a>
        </li>
        <li class="nav-item gal-nav">
            <a class="nav-link" id="material-tab" data-toggle="tab" href="#material" role="tab" aria-controls="contact"
                aria-selected="false">
                Material
            </a>
        </li>
        <li class="nav-item gal-nav">
            <a class="nav-link" id="assignment-tab" data-toggle="tab" href="#assignment" role="tab"
                aria-controls="contact" aria-selected="false">
                Assignment
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!-- gtu_syllabus -->
        <div class="container-fluid tab-pane fade show active" id="gtu_syllabus" role="tabpanel" aria-labelledby="subject-tab">
            
             <!-- add gtu_syllabus -->
             <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_syllabus_Modal"> Add New GTU Syllabus </button>
            
            <!-- add gtu_syllabus model -->
            <div class="modal fade" id="add_syllabus_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New GTU Syllabus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-gtu_syllabus_form -->
                    <form id="" action="add_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=gtu_syllabus" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD GTU SYLLABUS</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        
            <?php
              $allsyllabusquery = "SELECT * FROM `gtu_syllabus` WHERE sub_code=".$subcode ;
              $allsyllabusqueryResult = $connection->query($allsyllabusquery);
              $syllabuses = $allsyllabusqueryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($syllabuses) > 0) {
                  foreach ($syllabuses as $syllabus) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $syllabus["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_syllabus?id=<?php echo $syllabus["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_syllabus?id=<?php echo $syllabus["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_gtu_syllabus-model -->
                  <div class="modal fade" id="edit_syllabus?id=<?php echo $syllabus["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $syllabus["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-gtu_syllabus_form -->
                          <form id="edit-syllabus_form" action="update_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=gtu_syllabus&fileid=<?php echo $syllabus["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE GTU SYLLABUS</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_gtu_syllabus-model -->
              <div class="modal fade" id="delete_syllabus?id=<?php echo $syllabus["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete GTU Syllabus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete GTU Syllabus <br><b><?php echo $syllabus["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=gtu_syllabus&fileid=<?php echo $syllabus["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                    </div>
                </div>
                </div>
              </div>
              <?php 
                  }
                }?>
            </div>
          </div>

        <!-- gtu_papers -->
        <div class="container-fluid tab-pane fade" id="gtu_papers" role="tabpanel" aria-labelledby="subject-tab">
            
             <!-- add gtu_papers -->
             <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_paper_Modal"> Add New GTU Papers </button>
            
            <!-- add gtu_papers model -->
            <div class="modal fade" id="add_paper_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New GTU Paper</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-gtu_papers_form -->
                    <form id="" action="add_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=gtu_papers" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD GTU PAPER</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        
            <?php
              $allpaperquery = "SELECT * FROM `gtu_papers` WHERE sub_code=".$subcode ;
              $allpaperqueryResult = $connection->query($allpaperquery);
              $papers = $allpaperqueryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($papers) > 0) {
                  foreach ($papers as $paper) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $paper["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_paper?id=<?php echo $paper["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_paper?id=<?php echo $paper["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_gtu_papers-model -->
                  <div class="modal fade" id="edit_paper?id=<?php echo $paper["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $paper["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-gtu_papers_form -->
                          <form id="edit-papers_form" action="update_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=gtu_papers&fileid=<?php echo $paper["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE GTU PAPER</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_ggtu_papers-model -->
              <div class="modal fade" id="delete_paper?id=<?php echo $paper["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete GTU Paper</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete GTU Paper <br><b><?php echo $paper["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=gtu_papers&fileid=<?php echo $paper["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                    </div>
                </div>
                </div>
              </div>
              <?php 
                  }
                }?>
            </div>
        </div>

        <!-- que_bank -->
        <div class="container-fluid tab-pane fade" id="que_bank" role="tabpanel" aria-labelledby="subject-tab">
             <!-- add que_bank -->
             <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_quebank_Modal"> Add New Question Bank </button>
            
            <!-- add que_bank model -->
            <div class="modal fade" id="add_quebank_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Question Bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-que_bank_form -->
                    <form id="" action="add_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=question_bank" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD QUESTION BANK</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        
            <?php
              $allquebankquery = "SELECT * FROM `question_bank` WHERE sub_code=".$subcode ;
              $allquebankqueryResult = $connection->query($allquebankquery);
              $quebanks = $allquebankqueryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($quebanks) > 0) {
                  foreach ($quebanks as $quebank) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $quebank["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_quebank?id=<?php echo $quebank["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_quebank?id=<?php echo $quebank["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_que_bank-model -->
                  <div class="modal fade" id="edit_quebank?id=<?php echo $quebank["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $quebank["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-que_bank_form -->
                          <form id="edit-papers_form" action="update_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=question_bank&fileid=<?php echo $quebank["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE QUESTION BANK</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_que_bank-model -->
              <div class="modal fade" id="delete_quebank?id=<?php echo $quebank["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Question Bank</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete Question Bank <br><b><?php echo $quebank["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=question_bank&fileid=<?php echo $quebank["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                    </div>
                </div>
                </div>
              </div>
              <?php 
                  }
                }?>
            </div>
        </div>
        <!-- prectical -->
        <div class="container-fluid tab-pane fade" id="prectical" role="tabpanel" aria-labelledby="subject-tab">
            <!-- add prectical -->
            <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_practical_Modal"> Add New Practical </button>
            
            <!-- add prectical model -->
            <div class="modal fade" id="add_practical_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Practical</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-prectical_form -->
                    <form id="" action="add_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=practical" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD PRACTICAL</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        
            <?php
              $allpracticalquery = "SELECT * FROM `practical` WHERE sub_code=".$subcode ;
              $allpracticalqueryResult = $connection->query($allpracticalquery);
              $practicals = $allpracticalqueryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($practicals) > 0) {
                  foreach ($practicals as $practical) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $practical["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_practical?id=<?php echo $practical["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_practical?id=<?php echo $practical["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_prectical-model -->
                  <div class="modal fade" id="edit_practical?id=<?php echo $practical["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $practical["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-prectical_form -->
                          <form id="edit-papers_form" action="update_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=practical&fileid=<?php echo $practical["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE PRACTICAL</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_prectical-model -->
              <div class="modal fade" id="delete_practical?id=<?php echo $practical["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Practical</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete Practical <br><b><?php echo $practical["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=practical&fileid=<?php echo $practical["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                    </div>
                </div>
                </div>
              </div>
              <?php 
                  }
                }?>
            </div>
        </div>
        <!-- material -->
        <div class="container-fluid tab-pane fade" id="material" role="tabpanel" aria-labelledby="subject-tab">
            <!-- add material -->
            <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_material_Modal"> Add New Material </button>
            
            <!-- add material model -->
            <div class="modal fade" id="add_material_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-material_form -->
                    <form id="" action="add_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=material" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD MATERIAL</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        
            <?php
              $allmaterialquery = "SELECT * FROM `material` WHERE sub_code=".$subcode ;
              $allmaterialqueryResult = $connection->query($allmaterialquery);
              $materials = $allmaterialqueryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($materials) > 0) {
                  foreach ($materials as $material) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $material["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_material?id=<?php echo $material["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_material?id=<?php echo $material["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_material-model -->
                  <div class="modal fade" id="edit_material?id=<?php echo $material["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $material["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-material_form -->
                          <form id="edit-papers_form" action="update_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=material&fileid=<?php echo $material["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE MATERIAL</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_material-model -->
              <div class="modal fade" id="delete_material?id=<?php echo $material["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Material</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete Material <br><b><?php echo $material["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=material&fileid=<?php echo $material["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                    </div>
                </div>
                </div>
              </div>
              <?php 
                  }
                }?>
            </div>
        </div>
        <!-- assignment -->
        <div class="container-fluid tab-pane" id="assignment" role="tabpanel" aria-labelledby="subject-tab">
            <!-- add assignment -->
            <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_assignment_Modal"> Add New Assignment </button>
            
            <!-- add assignment model -->
            <div class="modal fade" id="add_assignment_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Assignment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-assignment_form -->
                    <form id="" action="add_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=assignment" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD ASSIGNMENT</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        
            <?php
              $allassignmentquery = "SELECT * FROM `assignment` WHERE sub_code=".$subcode ;
              $allassignmentqueryResult = $connection->query($allassignmentquery);
              $assignments = $allassignmentqueryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($assignments) > 0) {
                  foreach ($assignments as $assignment) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $assignment["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_assignment?id=<?php echo $assignment["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_assignment?id=<?php echo $assignment["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_assignment-model -->
                  <div class="modal fade" id="edit_assignment?id=<?php echo $assignment["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $assignment["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-assignment_form -->
                          <form id="edit-papers_form" action="update_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=assignment&fileid=<?php echo $assignment["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE ASSIGNMENT</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_assignment-model -->
              <div class="modal fade" id="delete_assignment?id=<?php echo $assignment["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete ASSIGNMENT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete Assignment <br><b><?php echo $assignment["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sub_file.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subcode; ?>&action=assignment&fileid=<?php echo $assignment["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
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