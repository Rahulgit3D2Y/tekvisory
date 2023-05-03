<?php include("Registration/admin/include/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Document</title>
    <style>
        *
        {
          padding: 0;
          margin: 0;
          box-sizing: border-box;
          font-family: serif;
        }
        body
        {
          min-width:400px;
        }
        .navbar-brand {
        font-family: 'Roboto Condensed', serif;
        font-size: 2rem;
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: uppercase;
      }
      
      .navbar-nav .nav-link {
        font-family: 'Open Sans', serif;
        font-size: 1.2rem;
        font-weight: bold;
        letter-spacing: 1px;
      }
      
      .navbar-toggler-icon {
        font-size: 1.5rem;
        color: #333;
      }
      
        .hero
        {
          background-color: #DBDFEA;
          height: 500px;
        }
          .accordion-item {
        margin-bottom: 20px;
      }
   
          @media screen and (max-width: 800px) {
          /* Adjust the video size for smaller screens */
          .video-container {
            padding-bottom: 75%; /* 4:3 aspect ratio */
          }*
              {
                text-align: center;
              }
        }
        .offcanvas {
        background-color: rgb(198, 255, 224) !important;
      }
      .framework-heading {
        font-size: 4rem;
        font-weight: lighter;
        font-family: Arial, Helvetica, sans-serif;
      }
      .navbar {
        box-shadow: 0 2px 10px rgba(156, 156, 156, 0.2);
      }
      #my-section {
        background-image: url('img/wallpaperflare-cropped.jpg');
        background-size: cover;
        background-repeat: no-repeat;
      }
      .customb{
        background-color: #5ca248; color: #ffffff;
      }
      .customb:hover {
        background-color: #54c657;
      }
      
      
      </style>
</head>
<body>
     <!-- Navbar -->

<?php 
 $activesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$resactivesessionquery=mysqli_fetch_assoc($activesessionquery);
$activesession_record_add=$resactivesessionquery['session_year'];
$activesession_record_add_full=$resactivesessionquery['full_year'];

$studentsendmessagesetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`='Registration'"); 
$studentsendmessagesettingres=mysqli_fetch_assoc($studentsendmessagesetting);
$studentsendmessagesettingstatus = $studentsendmessagesettingres['popupstatus'];

$EventnameQuery =mysqli_query($con,"SELECT *  FROM `course_fee`  WHERE `status`='Active' and `session`='$activesession_record_add' AND `event_status`='Active'"); 
$resultEventnameQuery=mysqli_fetch_assoc($EventnameQuery);
$eventname = $resultEventnameQuery['event_name'];
?>
  <section>
    <nav class="navbar navbar-expand-lg navbar-light "  aria-label="Offcanvas navbar large" style="height: 100px; background-color:  #F6F1E9;">
         <div class="container"><img  src="Registration/img/img.png" alt="" height="50px" width="50px" style="border-radius: 1rem;">
           <a class="navbar-brand" href="#"> Tekvisory</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2"          aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
             <div class="offcanvas-header">
            <h5 class="offcanvas-title text-dark" id="offcanvasNavbar2Label">Tekvisory</h5>
               <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
             </div>
             <div class="offcanvas-body">
             <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                 <li class="nav-item">
                   <a class="nav-link btn btn-outline-success"  href="index.php">Home</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link  btn btn-outline-success" href="Registration">Registration</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link btn btn-outline-success border-primary" href="problemStatement.php">Problem Statement</a>
                 </li>
                 
               </ul>
               
            </div>
            </div>
             </div>
           </div>
         </div>
    </nav>
  </section>


  <!-- hero -->
<section class="d-flex align-items-center hero">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="row container py-5">
        <div class="col-lg-7">
          <div class="text-wrapper align-left ">
            <h3 class=" mb-4 fw-bold framework-heading fw-medium text-center text-lg-start my-5">problem<br>Statement</h3>
          </div>
        </div>
        <div class="col-lg-5">
          <img class="w-100 " src="img/towfiqu-barbhuiya-oZuBNC-6E2s-unsplash.jpg" alt="" style="border-radius: 1rem;">
        </div>
      </div>
    </div>
    
    
  </section>


  <div id="project-table-container">
    <div class="bg-light p-5">
      <div class="table-responsive-sm">
        <table id="problemStatement1" class="table  table-responsive table-striped table-bordered">
          <thead class="thead-dark">
            <tr class="table-primary">
                <th scope="col">S No.</th>
                <th scope="col">PS ID</th>
                <th scope="col">Title of PS</th>
                <th scope="col">Domain Bucket</th>
                <th scope="col">Description</th>
              </tr>
          </thead>
          <tbody>
          <?php
                                       
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `projectcontent` WHERE `projectcontent_status`='Active' AND `projectcontent_session`='$activesession_record_add'");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
   $id=$result['projectcontent_id'];
   $subcontentid=$result['projectcontent_contentid'];     


         $contentnamequery=mysqli_query($con,"SELECT * FROM `category` WHERE `category_id`='$subcontentid'");
        $resultcontentnamequery=mysqli_fetch_array($contentnamequery);
         $ContentName=$resultcontentnamequery['category_name'];


                                        ?>
              <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $result['projectcontent_titleid']; ?></td>
                                            <td><?php echo $result['projectcontent_name']; ?></td>
                                            <td><?php echo $ContentName; ?></td>
                                            
                                            <td><?php echo $result['projectcontent_description']; ?></td>
                                        
              </tr>
                  <?php
                                    }
                                        ?>
                                      </tbody>
        </table>
      </div>
      
    </div>
  </div>
  <footer class=" p-3" style="background-color:#aabbcc">
  <div class="container text-center text-light">
    <div class="copyright">
      &copy; Copyright <strong><span><?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?></span></strong>
      All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://geumca.in/" target="_blank">GEUMCA</a>
      
    </div>
    <a href="https://www.instagram.com/YOUR-INSTAGRAM-USERNAME/" target="_blank"><i class="fab fa-instagram" style="font-size: 2em;"></i></a>
  </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>