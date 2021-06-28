<?php 
session_start();
require('../db_config/config.php');

if (isset($_SESSION["uname"]) && $_REQUEST["sem"] !== "") {
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
    <title> AIT | CE & IT PORTAL-ADMIN | Semester </title>
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

    <div class="container-fluid sem-title text-center">
        <h1>Semester <?php echo $sem; ?></h1>
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
          <a class="nav-link active" id="subject-tab" data-toggle="tab" href="#subject" role="tab" aria-controls="home" aria-selected="true">
            Subject
          </a>
        </li>
        <li class="nav-item gal-nav">
          <a class="nav-link" id="timetable-tab" data-toggle="tab" href="#timetable" role="tab" aria-controls="profile" aria-selected="false">
            Timetable
          </a>
        </li>
        <li class="nav-item gal-nav">
          <a class="nav-link" id="mse-tab" data-toggle="tab" href="#mse" role="tab" aria-controls="contact" aria-selected="false">
            MSE
          </a>
        </li>
        <li class="nav-item gal-nav">
          <a class="nav-link" id="attendance-tab" data-toggle="tab" href="#attendance" role="tab" aria-controls="contact" aria-selected="false">
            Attendance
          </a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!-- subjects -->
        <div class="container-fluid tab-pane fade show active" id="subject" role="tabpanel" aria-labelledby="subject-tab">

        <!-- add-new-subject -->
        <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_subject_Modal"> Add New Subject </button>

        <!-- Modal -->
        <div class="modal fade" id="add_subject_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add_subject_form -->
                    <form id="sub_add_form" onsubmit="return add_subject()" action="subject_add.php?sem=<?php echo $sem; ?>" method="post">
                        <div class="form-group">
                            <label for="subbranch">Branch</label>
                            <div class="form-check" id="subbranch">
                              <input class="branchCheckbox" type="checkbox" value="All" id="all" name="branch[]">
                              <label class="form-check-label" for="all"> All </label><br>
                              <input class="branchCheckbox" type="checkbox" value="CE" id="ce" name="branch[]">
                              <label class="form-check-label" for="ce"> Computer Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="IT" id="it" name="branch[]">
                              <label class="form-check-label" for="it"> Information Technology </label><br>
                              <input class="branchCheckbox" type="checkbox" value="ME" id="me" name="branch[]">
                              <label class="form-check-label" for="me"> Mechanical Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="Auto" id="auto" name="branch[]">
                              <label class="form-check-label" for="auto"> AutoMobile Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="Civil" id="civil" name="branch[]">
                              <label class="form-check-label" for="civil"> Civil Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="Electrical" id="electrical" name="branch[]">
                              <label class="form-check-label" for="electrical"> Electrical Engineering </label><br>
                              <input class="branchCheckbox" type="checkbox" value="EC" id="ec" name="branch[]">
                              <label class="form-check-label" for="ec"> Electronics and Communication Engineering </label><br>
                            </div>
                            
                            <label for="subcode">GTU Code</label>
                            <input class="form-control" type="text" name="subcode" id="subcode" placeholder="Enter GTU Code">

                            <label for="subname">Subject Name</label>
                            <input type="text" class="form-control" id="subname" name="subname" placeholder="Enter Subject Name">
                            
                            <label for="subcredit">Subject Credit</label>
                            <input class="form-control" type="text" name="subcredit" id="subcredit" placeholder="Enter Subject Credit as per GTU">

                            <label for="subthmark">Theory Marks</label>
                            <input class="form-control" type="text" name="subthmark" id="subthmark" placeholder="Enter Subject Thory Marks">

                            <label for="subpremark">Prectical Marks</label>
                            <input class="form-control" type="text" name="subpremark" id="subpremark" placeholder="Enter Subject Prectiacl Marks">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="add_fc_btn">ADD SUBJECT</button>
                    </form>
               
              </div>
            </div>
          </div>
        </div>

        <?php 
          $allsubjectquery = "SELECT * FROM `subject` WHERE semester=".$sem ;
          $allsubjectqueryResult = $connection->query($allsubjectquery);
          $subjects = $allsubjectqueryResult->fetchAll(); 

        ?>

          <div class="sub_content mx-auto " >
          <table class="sub_table ">
            <tbody>
              <tr>
                <th rowspan="2">Branch</th>
                <th rowspan="2">GTU Code</th>
                <th rowspan="2">Subject Name</th>
                <th rowspan="2">Credit</th>
                <th colspan="3">Marks</th>
                <th rowspan="2" colspan="2">Update</th>
              </tr>
              <tr>
                <th>Theory</th>
                <th>Practical</th>
                <th>Total</th>
              </tr>
              <?php 
                if (count($subjects) > 0) {
                  foreach ($subjects as $subject) { 
              ?>
              <tr>
                  <td style="color: #CC0000;"><?php echo $subject["branch"]; ?></td>
                  <td><?php echo $subject["sub_code"]; ?></td>
                  <td>
                    <a href="../subject_material/subject_material.php?sem=<?php echo $sem; ?>&subcode=<?php echo $subject["sub_code"]; ?>"><?php echo $subject["sub_name"]; ?></a>
                  </td>
                  <td><?php echo $subject["sub_credit"]; ?></td>
                  <td><?php echo $subject["sub_theorymarks"]; ?></td>
                  <td><?php echo $subject["sub_precticalmarks"]; ?></td>
                  <td><?php echo $subject["sub_totalmarks"]; ?></td>
                  <td><a href="edit_subject_form.php?sem=<?php echo $sem; ?>&id=<?php echo $subject["id"]; ?>"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit_model">Edit</button></a></td>
                  <td><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete_subject?id=<?php echo $subject["id"]; ?>">Delete</button></td>
              </tr>

                  <!-- delete subject Model -->
              <div class="modal fade" id="delete_subject?id=<?php echo $subject["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete subject <br><b><?php echo $subject["sub_name"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_subject.php?sem=<?php echo $sem; ?>&id=<?php echo $subject["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
                    </div>
                    </div>
                </div>
                </div>
              <?php 
                  }
                }
              ?>
              
            </tbody>
          </table>
        </div>
          </div>

          <!-- timetable -->
        <div class="container-fluid tab-pane fade" id="timetable" role="tabpanel" aria-labelledby="timetable-tab">
            <!-- add timetable -->
            <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_timetable_Modal"> Add New Timetable </button>
            
            <!-- add timetable model -->
            <div class="modal fade" id="add_timetable_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Timetable</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-timetable_form -->
                    <form id="" action="add_sem_file.php?sem=<?php echo $sem; ?>&action=timetable" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD TIMETABLE</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
              
            <?php
              $allttquery = "SELECT * FROM `timetable` WHERE sem=".$sem ;
              $allttqueryResult = $connection->query($allttquery);
              $timetables = $allttqueryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($timetables) > 0) {
                  foreach ($timetables as $timetable) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $timetable["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_timetable?id=<?php echo $timetable["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_timetable?id=<?php echo $timetable["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_timetable-model -->
                  <div class="modal fade" id="edit_timetable?id=<?php echo $timetable["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $timetable["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-timetable_form -->
                          <form id="edit-timetable_form" action="update_sem_file.php?sem=<?php echo $sem; ?>&action=timetable&fileid=<?php echo $timetable["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE TIMETABLE</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_timetable-model -->
              <div class="modal fade" id="delete_timetable?id=<?php echo $timetable["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete timetable <br><b><?php echo $timetable["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sem_file.php?sem=<?php echo $sem; ?>&action=timetable&fileid=<?php echo $timetable["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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

          <!-- mse -->
        <div class="container-fluid tab-pane fade" id="mse" role="tabpanel" aria-labelledby="mse-tab">
          <!-- add mse -->
          <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_mse_Modal"> Add New MSE </button>
            
            <!-- add mse model -->
            <div class="modal fade" id="add_mse_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New MSE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-mse_form -->
                    <form id="" action="add_sem_file.php?sem=<?php echo $sem; ?>&action=mse" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD MSE</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
              
            <?php
              $allmsequery = "SELECT * FROM `mse` WHERE sem=".$sem ;
              $allmsequeryResult = $connection->query($allmsequery);
              $mses = $allmsequeryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($mses) > 0) {
                  foreach ($mses as $mse) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $mse["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_mse?id=<?php echo $mse["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_mse?id=<?php echo $mse["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_mse-model -->
                  <div class="modal fade" id="edit_mse?id=<?php echo $mse["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $mse["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-mse_form -->
                          <form id="edit-timetable_form" action="update_sem_file.php?sem=<?php echo $sem; ?>&action=mse&fileid=<?php echo $mse["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE MSE</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_mse-model -->
              <div class="modal fade" id="delete_mse?id=<?php echo $mse["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete MSE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete MSE <br><b><?php echo $mse["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sem_file.php?sem=<?php echo $sem; ?>&action=mse&fileid=<?php echo $mse["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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





        <!-- attendance -->
        <div class="container-fluid tab-pane fade" id="attendance" role="tabpanel" aria-labelledby="attendance-tab">
          <!-- add attend -->
          <button type="submit" class="btn btn-lg btn-block mt-4 mb-4" id="add_fc_btn" data-toggle="modal" data-target="#add_attend_Modal"> Add New Attendance </button>
            
            <!-- add attend model -->
            <div class="modal fade" id="add_attend_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="alert alert-danger text-center" role="alert" id="add_error">
                </div>    
                    <!-- add-attend_form -->
                    <form id="" action="add_sem_file.php?sem=<?php echo $sem; ?>&action=attendance" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input class="form-control" type="file" name="customFile" id="customFile">
                      <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                    </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">ADD ATTENDANCE</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
              
            <?php
              $allattendancequery = "SELECT * FROM `attendance` WHERE sem=".$sem ;
              $allattendancequeryResult = $connection->query($allattendancequery);
              $attendances = $allattendancequeryResult->fetchAll();     
            ?>
            <div class="row">
            <?php 
                if (count($attendances) > 0) {
                  foreach ($attendances as $attendance) { 
              ?>
              <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="sub_content mx-auto" >
                  <embed src="<?php echo $attendance["file_path"]; ?>" type="application/pdf" width="100%" height="500px"/>
                 
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-primary m-2 px-4" data-toggle="modal" data-target="#edit_attend?id=<?php echo $attendance["id"]; ?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-2 px-4" data-toggle="modal" data-target="#delete_attend?id=<?php echo $attendance["id"]; ?>">Delete</button>                 
                  </div>
                  
                  <!-- edit_attend-model -->
                  <div class="modal fade" id="edit_attend?id=<?php echo $attendance["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $attendance["file_path"]; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- edit-attend_form -->
                          <form id="edit-timetable_form" action="update_sem_file.php?sem=<?php echo $sem; ?>&action=attendance&fileid=<?php echo $attendance["id"]; ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input class="form-control" type="file" name="customFile" id="customFile">
                            <small id="fileHelp" class="form-text text-muted mx-3 mt-3">File must be in *pdf formate or less then 2MB</small>
                          </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" id="add_fc_btn">UPDATE ATTENDANCE</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- delete_attend-model -->
              <div class="modal fade" id="delete_attend?id=<?php echo $attendance["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete MSE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="card text-center alert alert-danger">
                        <div class="card-body">
                            <p class="card-text">Are you sure You want to delete attendance <br><b><?php echo $attendance["file_path"]; ?> </b>.</p>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="delete_sem_file.php?sem=<?php echo $sem; ?>&action=attendance&fileid=<?php echo $attendance["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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
}else {
    $_SESSION["error"] = "Please Login first to access portal admin.";
    header("Location: ../admin_login.php");

}
?>