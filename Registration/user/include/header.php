<?php

    session_start();
    include("../admin/include/config.php");
 
  @$_SESSION['userlogin']; 
  error_reporting(1);
 ?>
 <?php
extract($_POST);


if (!isset($_SESSION['userlogin']))
{
   
    echo "<script>window.location='index.php'</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        date_default_timezone_set('Asia/Kolkata'); 
$Currenturlfortittle=basename($_SERVER['REQUEST_URI']); 
$urlfortittle= parse_url($Currenturlfortittle, PHP_URL_PATH);
 $submenuqueryfortittle=mysqli_query($con,"SELECT * FROM `submenu` WHERE `submenu_url`='$urlfortittle'");
$submenuqueryfortittleresult=mysqli_fetch_assoc($submenuqueryfortittle);
        ?>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Paritosh Bisht" />
        <meta name="author" content="Paritosh Bisht" />
        <title>GEU-CA <?php echo $submenuqueryfortittleresult['submenu_name'];?></title>
          <link rel="shortcut icon" href="../admin/image/favicon.ico">
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <!---- Exrta css ---->
         <link href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet" />
         <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
         <link href=" https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" />
          <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
          <style>

        .loader,
        .loader:after {
            border-radius: 50%;
            width: 10em;
            height: 10em;
        }
        .loader {            
            margin: 60px auto;
            font-size: 10px;
            position: relative;
            text-indent: -9999em;
            border-top: 1.1em solid rgba(255, 255, 255, 0.2);
            border-right: 1.1em solid rgba(255, 255, 255, 0.2);
            border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
            border-left: 1.1em solid #ffffff;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation: load8 1.1s infinite linear;
            animation: load8 1.1s infinite linear;
        }
        @-webkit-keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes load8 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        #loadingDiv {
            position:absolute;;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background-color:#000;
        }
    
          </style>
       
    </head>
    <body class="sb-nav-fixed"  oncontextmenu="return false">
 <div id="loader" class="center"></div>
         
       <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php"><?php 
$schol=mysqli_query($con,"SELECT * FROM `school` WHERE `status` = \"Active\"");
$res1=mysqli_fetch_assoc($schol); ?>
<h2 style="text-transform:uppercase;"><?php
echo $school_short_name_record = $res1['school_srtname'];
 $today_date_1=date('Y-m-d');
                                            
                                         
?></h2></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                   
                    <!--<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>-->
                </div>
            </form>
            <!-- Navbar-->
           
 
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

           
                
                   <?php
$loginsession = $_SESSION["userlogin"];
$q=mysqli_query($con,"SELECT * FROM `registration` WHERE `login` ='$loginsession'  and `fee_status` = \"Active\"");
$res=mysqli_fetch_assoc($q);

$log = $res['payment_id'];
$login_user_status= $res['fee_status'];



$activesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$resactivesessionquery=mysqli_fetch_assoc($activesessionquery);
$activesession_record_add=$resactivesessionquery['fyear'];
$current_activesession_record=$resactivesessionquery['session_year'];


                    ?>  
                   
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span style=" font-size:15px; color: white;" aria-expanded="false">  <?php echo $res['student_name']; ?></span> <i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    
                        <li><a class="dropdown-item" href="changepassword.php">Change password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="signout.php?AppType=0%20|%20ApplicationType=Session%20Destroy&Mid=0">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                             <div class="sb-sidenav-menu-heading">Interface</div>

                           
                           <a class="nav-link"  href="MemberDetail.php?id=Member Details||Mid id=19||MemberDetails">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                Member Details
                                
                            </a>
                              <a class="nav-link" href="MentorDetail.php?id=Mentor Details||Mid id=20||MentorDetail" >
                                <div class="sb-nav-link-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
                                Mentor Details
                                
                            </a>
                          <a class="nav-link" href="projectsubmission.php?id=Project Submission||Mid id=21||ProjectSubmission" >
                                <div class="sb-nav-link-icon"><i class="fa fa-tasks" aria-hidden="true"></i></div>
                                Project Submission
                                
                            </a>
                           
                         

                             </div>

                    </div>
              
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $res['login']; ?>
                    </div>
                </nav>
            </div>

            
<?php 
if($login_user_status!="Active") 
{
    echo "<script>window.location='signout.php'</script>";
}

$Birthdaysetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`=\"Birthday message\" "); 
$Birthdaysettingres=mysqli_fetch_assoc($Birthdaysetting);
$Birthdaymessagepopupstatus=$Birthdaysettingres['popupstatus'];


?>
<?php $Currentwebsiteurl=basename($_SERVER['REQUEST_URI']); 
                                 
    
                                ?>