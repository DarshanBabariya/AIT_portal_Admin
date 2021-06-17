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
        #search_container {
            padding-top: 0px;
        }
        #search-bar {
            margin: 15px 0px;
        }
        #search-bar div{
            padding: 0px !important;
        }
        #search_fac ,#search_fac_select {
            margin: 0px 10px;
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

    <!-- search faculty -->
    <div class="container-fluid" id="search_container">
        <div class="card navbar-light bg-light">
            <div class="row" id="search-bar">
                <div class="col-10 d-flex justify-content-center">
                    <input class="form-control" id="search_fac" name="search_fac" style="width: 90% !important" type="search" placeholder="Search here..." aria-label="Search" onkeyup="search_faculty()">
                </div>
                <div class="col-2 d-flex justify-content-center">
                    <select class="custom-select" id="search_fac_select">
                        <option value="name">by Name...</option>
                        <option value="designation">by Designation...</option>
                        <option value="experience">by Experience...</option>
                        <option value="qualification">by Qualification...</option>
                        <option value="expertise">by Expertise...</option>
                        <option value="email">by Email...</option>
                      </select>                
                    </div>
            </div>
        </div>
    </div>
    

    
    <!-- add new faculty -->
    <div class="container-fluid">
        <button type="button" class="btn btn-lg btn-block" id="add_fc_btn" data-toggle="modal" data-target="#add_faculty_Modal">Add New Faculty</button>
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

    

    <!-- Modal -->
    <div class="modal fade" id="add_faculty_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Faculty</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        <div class="alert alert-danger text-center" role="alert" id="add_error">
        </div>    
            <!-- add_faculty_form -->
            <form id="fc_add_form" onsubmit="return add_faculty()" action="faculty_add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="fcid">ID</label>
                    <input type="text" class="form-control" id="fcid" name="fcid" placeholder="Enter ID No.">

                    <label for="fcimage">Image</label>
                    <input class="form-control" type="file" name="fcimage" id="fcimage">

                    <label for="fcname">Name</label>
                    <input type="text" class="form-control" id="fcname" name="fcname" placeholder="Enter Name">
                    <small id="namelHelp" class="form-text text-muted"> Add dr. or prof. before name</small>
                    
                    <label for="fcid">Designation</label>
                    <input type="text" class="form-control" id="fcdesignation" name="fcdesignation" placeholder="Enter Designation">
                    <small id="degHelp" class="form-text text-muted"> If more then one then saperate by qoma(,)</small>
                    
                    <label for="fcid">Experience</label>
                    <input type="text" class="form-control" id="fcexperiance" name="fcexperiance" placeholder="Enter Experience">
                    
                    <label for="fcid">Qualification</label>
                    <textarea type="text" class="form-control" id="fcqualification" name="fcqualification" placeholder="Enter Qualification"></textarea>
                    <small id="degHelp" class="form-text text-muted"> If more then one then saperate by qoma(,)</small>
                    
                    <label for="fcid">Expertise</label>
                    <textarea type="text" class="form-control" id="fcexpertise" name="fcexpertise" placeholder="Enter Expertise"></textarea>
                    <small id="degHelp" class="form-text text-muted"> If more then one then saperate by qoma(,)</small>
                    
                    <label for="fcid">Email</label>
                    <input type="text" class="form-control" id="fcemail" name="fcemail" placeholder="Enter Email">

                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" id="add_fc_btn">ADD</button>
            </form>
        </div>
        
        </div>
    </div>
    </div>

    <?php 
    
    $allfacultyquery = "SELECT * FROM `faculty` WHERE 1";
    $allfacultyqueryResult = $connection->query($allfacultyquery);
    $faculties = $allfacultyqueryResult->fetchAll();    
    ?>
    
    <!-- faculty-list -->
    <div class="container-fluid mb-4" id="faculty">
        <div class="card">
            <h5 class="card-header text-center heading-tile">CE & IT Faculty</h5>
            <div class="card-body">
            
            <?php
                if (count($faculties) > 0) {
                    foreach ($faculties as $faculty) {     
            ?>
            <div class="row faculty_content">
                <div class="col-lg-3 col-12 fac-img">
                  <img class="img-thumbnail rounded mx-auto d-block" src="<?php echo $faculty["image_path"] ?>" alt="faculty_photo">
                  <h4 class="fac_name_search"><i class="fa fa-user-circle"></i> <?php echo $faculty["name"] ?></h4>
                </div>
              <div class="col-lg-9 col-12 fac-detail">
                <ul>
                  <li class="fac_deg_search"><span><i class="fa fa-caret-right"></i> Designation :</span> <?php echo $faculty["designation"] ?></li>
                  <li class="fac_expe_search"><span><i class="fa fa-caret-right"></i> Experience :</span> <?php echo $faculty["experience"] ?> Years</li>
                  <li class="fac_quali_search"><span><i class="fa fa-caret-right"></i> Qualification :</span> <?php echo $faculty["qualification"] ?></li>
                  <li class="fac_expert_search"><span><i class="fa fa-caret-right"></i> Expertise :</span> <?php echo $faculty["expertise"] ?></li>
                  <li class="fac_email_search"><span><i class="fa fa-caret-right"></i> Email :</span> <?php echo $faculty["email"] ?></li>
                </ul>
                <div class="d-flex justify-content-end">
                <a href="edit_faculty_form.php?id=<?php echo $faculty["id"]; ?>"><button type="button" class="btn btn-outline-primary mx-2 px-4" data-toggle="modal" data-target="#edit_model">Edit</button></a>
                <button type="button" class="btn btn-outline-danger mx-2 px-4" data-toggle="modal" data-target="#delete_faculty?id=<?php echo $faculty["id"]; ?>">Delete</button>
                </div>
              </div>  
            </div>
            

            <!-- delete_faculty -->
    <!-- Modal -->
    <div class="modal fade" id="delete_faculty?id=<?php echo $faculty["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Faculty</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="card text-center alert alert-danger">
            <div class="card-body">
                <p class="card-text">Are you sure You want to delete faculty <br><b><?php echo $faculty["name"]; ?> </b>.</p>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="delete_faculty.php?id=<?php echo $faculty["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
        </div>
        </div>
    </div>
    </div>
            <?php 
                    }
                }
            ?>
           </div>
        </div>
    </div>

    
    <?php 
    
    $total_facQuery = "SELECT COUNT(*) FROM `faculty`";
    $total_fac = $connection->query($total_facQuery)->fetchAll();;
    $total_fac_no = $total_fac[0][0]; //total faculty in database

    ?>
    <script>
    
        function search_faculty() {
            let filter = document.getElementById("search_fac").value.toUpperCase(); 
            let faculty_content = document.getElementsByClassName("faculty_content");
            let search_fac_select = document.getElementById("search_fac_select");

            if (search_fac_select.value == "name") {
                let fac = document.getElementsByClassName("fac_name_search");
            
                for (let i = 0; i < <?php echo $total_fac_no ?>; i++) {
                    let fac_name = fac[i].innerText.toUpperCase();   
                    if (fac_name.indexOf(filter) > -1) {
                        faculty_content[i].style.display = "";
                    }
                    else {
                        faculty_content[i].style.display = "none";
                    }
                }
            }

            if (search_fac_select.value == "designation") {
                let fac = document.getElementsByClassName("fac_deg_search");
            
                for (let i = 0; i < <?php echo $total_fac_no ?>; i++) {
                    let fac_deg = fac[i].innerText.toUpperCase();  
                    if (fac_deg.indexOf(filter) > -1) {
                        faculty_content[i].style.display = "";
                    }
                    else {
                        faculty_content[i].style.display = "none";
                    }
                }
            }

            if (search_fac_select.value == "experience") {
                let fac = document.getElementsByClassName("fac_expe_search");
            
                for (let i = 0; i < <?php echo $total_fac_no ?>; i++) {
                    let fac_expe = fac[i].innerText.toUpperCase();  
                    if (fac_expe.indexOf(filter) > -1) {
                        faculty_content[i].style.display = "";
                    }
                    else {
                        faculty_content[i].style.display = "none";
                    }
                }
            }

            if (search_fac_select.value == "qualification") {
                let fac = document.getElementsByClassName("fac_quali_search");
            
                for (let i = 0; i < <?php echo $total_fac_no ?>; i++) {
                    let fac_qual = fac[i].innerText.toUpperCase();  
                    if (fac_qual.indexOf(filter) > -1) {
                        faculty_content[i].style.display = "";
                    }
                    else {
                        faculty_content[i].style.display = "none";
                    }
                }
            }

            if (search_fac_select.value == "expertise") {
                let fac = document.getElementsByClassName("fac_expert_search");
            
                for (let i = 0; i < <?php echo $total_fac_no ?>; i++) {
                    let fac_expert = fac[i].innerText.toUpperCase();  
                    if (fac_expert.indexOf(filter) > -1) {
                        faculty_content[i].style.display = "";
                    }
                    else {
                        faculty_content[i].style.display = "none";
                    }
                }
            }

            if (search_fac_select.value == "email") {
                let fac = document.getElementsByClassName("fac_email_search");
            
                for (let i = 0; i < <?php echo $total_fac_no ?>; i++) {
                    let fac_email = fac[i].innerText.toUpperCase();  
                    if (fac_email.indexOf(filter) > -1) {
                        faculty_content[i].style.display = "";
                    }
                    else {
                        faculty_content[i].style.display = "none";
                    }
                }
            }
            
        }
        
        </script>

    
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
}else {
    $_SESSION["error"] = "Please Login first to access portal admin.";
    header("Location: ../admin_login.php");

}
?>