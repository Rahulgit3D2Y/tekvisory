<?php include("Registration/admin/include/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

    <title>Tekvisory</title>
</head>
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
    height:  800px;
 }
    .accordion-item {
  margin-bottom: 20px;
}
@media screen and (width<991px) {
        .hero {
            margin-top: 100px;
        }
        
    }

    @media screen and (max-width: 768px) {
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
  font-size: 5rem;
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

.video-container {
  position: relative;
  overflow: hidden;
  width: 100%;
  height: 0;
  padding-bottom: 56.25%; /* 16:9 aspect ratio */
}

.video-container video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.framework-heading {
    font-size: 2rem;
  }
  
  @media (min-width: 768px) {
    .framework-heading {
      font-size: 3rem;
    }
  }
  
  @media (min-width: 992px) {
    .framework-heading {
      font-size: 4rem;
    }
  }
  
  /* Adjust image size based on screen width */
  img {
    max-width: 100%;
    height: auto;
  }
  
  @media (min-width: 768px) {
    img {
      max-width: 50%;
    }
  }

</style>
<body>

  <!-- Navbar -->
  <section>
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top"  aria-label="Offcanvas navbar large" style="height: 100px; background-color: #F6F1E9;">
         <div class="container">
          <img  src="Registration/img/img.png" alt="" height="50px" width="50px" style="border-radius: 1rem;">
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
    </nav>
  </section>

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

<!-- hero -->
<section class="d-flex align-items-center hero">
  <div class="container d-flex justify-content-center align-items-center">
    <div class="row container py-5">
      <div class="col-lg-7">
        <div class="text-wrapper align-left">
          <div class="subtitle-align-wrap">
            <div class="subtitle-wrap">
              <span class="bi bi-envelope"></span>
              <span class="bi bi-chevron-right"></span>
            </div>
          </div>
  
          <h1 class="h2 mb-4 fw-bold framework-heading fw-medium text-center text-lg-start"><?php echo $eventname; ?></h1>
          <h2>In Association with ISTE Chapter<img src="Registration/img/istelogo.png" class="img-fluid" alt="" style="height:50px"></h2>
          

          <p class="lead fs-2 fw-semi-bold">
            <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> is a unique opportunity for  Students to submit their innovative ideas/concepts under the different problem statements.
          </p>
          
          <div class="mt-4 p-3">
            <a class="btn btn-outline-dark btn-lg " href="Registration">Get Started</a>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
  <div class="video-container">
    <video autoplay loop muted>
      <source src="teckvisory.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
</div>

    </div>
  </div>
  
  
</section>


   <section class="" style="min-height: 100px;background-color: #09D6D3;">
      <div class="row justify-content-center align-items-center pt-4 m-0">
        <div class="col-md-6 text-center">
          <h2 class="text-light"><?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> Problem Statement List</h2>
        </div>
        <div class="col-md-4 text-center p-3">
          <button id="toggle-table" class="btn btn-lg  mt-2 mt-md-0" style="background-color:#80CD6B;">View List</button>
        </div>
      </div>
    
    
    <div id="project-table-container" style="display:none;">
      <div class="bg-light p-5">
        <div class="table-responsive-sm">
          <table id="problemStatement1"  class="table table-responsive table-striped table-bordered">
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
    
      <script>
      var tableContainer = document.getElementById("project-table-container");
      var toggleButton = document.getElementById("toggle-table");
      
              toggleButton.addEventListener("click", function() {
        if (tableContainer.style.display === "none") {
        tableContainer.style.display = "block";
        toggleButton.textContent = "Hide List";
        } else {
        tableContainer.style.display = "none";
        toggleButton.textContent = "View List";
        }
              });
      </script>
    </section>
    
    
    
    
    <section class=" p-5" id="my-section">
        <section>
            <div class="row">
              <div class="col-lg-5">
                <img class="w-100 " src="img/brands-people-Ax8IA8GAjVg-unsplash.jpg" alt="" style="border-radius: 1rem;">
              </div>
                <div class="col-lg-6 text-light">
                    <div class="d-flex align-items-center">
                        <h3 class="pe-4">About</h3>
                        <hr class="text-success w-25">
                      </div>                   
                    <h1><?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?></h1>
                    <h4>
<?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> is a unique opportunity for  Students to submit their innovative ideas/concepts under the different problem statements. This event is going to be conducted in physical mode in two phase’s viz. Initial Phase/Idea screening round and Grand Finale round. In the Initial round the initially submitted ideas will be thoroughly screened and scrutinized and the selected ones will be moved for the Grand Finale that will be held in the month of May-2023. <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> will have two phases. The submitted ideas will be evaluated by a group of experts in the field and only the innovative ideas will be selected for the Grand Finale or 2nd round. During the Grand Finale, selected participants are expected to build the solution to demonstrate their concepts and prove to the juries that their ideas are technically feasible and more importantly implementable. Best ideas will be declared winners. During this 8 hours hackathon, scheduled in the month of May-2023.

This hackathon has More Than 20 Problem statements related to the cyber security domain against which the innovative minds will be able to submit their ideas and compete against each other</h4>
                </div>
            </div>
        </section>
        <br>
        <br>

       
        <br>
        <br>
        <!-- table -->
         <section>
            <div>
                <div class="d-flex align-items-center">
                    <h3 class="pe-4 text-light">About</h3>
                    <hr class="text-success fw-bold w-25">
                </div> 
                <h1 class="text-primary">Hacathon</h1>
                <div class="bg-light p-5">
                  <div class="table-responsive-sm">
                    <table class="table table-responsive table-striped table-bordered">
                      <thead class="bg-warning">
                        <tr>
                          <th>S No.</th>
                          <th>Task and Activities</th>
                          <th>Tentative Timeline</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Launch of <?php echo $eventname; ?>  Hackathon</td>
                          <td>2nd May 2023</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Registration &amp; Idea Submission</td>
                          <td>2nd May 2023 – 10th May 2023 (Revised)</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Idea Evaluation</td>
                          <td>11th May 2023 – 12th May 2023</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Announcement of Second Round</td>
                          <td>12th May 2023</td>
                        </tr>
                         <tr>
                          <td>5</td>
                          <td>Evaluation of Second Round</td>
                          <td>13th May 2023- 14th May 2023</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Announcement of Finalist</td>
                          <td>15th May 2023</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>Grand Finale of the Hackathon</td>
                          <td>20th May 2023</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </section>
        <br><br>
        <!-- steps -->
        <section>
            <div class="container bg-light">
                <div class="d-flex align-items-center">
                    <h3 class="pe-4">About</h3>
                    <hr class="text-success w-25">
                </div> 
                <h1 class="text-primary">Process flow</h1>	         
          
        <div class="container-fluid ">
           <div class="container text-center">
            
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                <p class="text-process"><?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> : Problem statements submission by I4C and BPR&D (MHA)</p>
                                <p class="process-border"> 
                                    <img src="img/step1.png">
                                    <span>Step 1</span>
                                </p>
                                <p class="arrow-right"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <p class="text-process">Publishing of the problem statements on <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> website. </p>
                                <p class="process-border"> 
                                    <img src="img/step2.png">
                                    <span>Step 2</span>
                                </p>
                                <p class="arrow-right"></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <p class="text-process">Registration of Team Head on <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> portal </p>
                                <p class="process-border"> 
                                    <img src="img/step3.png">
                                    <span>Step 3</span>
                                </p>
                                <p class="arrow-right"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                <p class="process-border"> 
                                    <img src="img/step4.png">
                                    <span>Step 4</span>
                                </p>
                                <p class="arrow-right-bottom"></p>
                                <p class="text-process">Team Head to be responsible to finalise  teams from the internal hackathon/or similar activity. Team Head will recommend maximum 6 members for the  teams for <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> at <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> portal.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <p class="process-border"> 
                                    <img src="img/step5.png">
                                    <span>Step 5</span>
                                </p>
                                <p class="arrow-right-bottom"></p>
                                <p class="text-process">The selected teams/start-ups registered at the <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> portal, submit ideas against PSs. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <p class="process-border"> 
                                    <img src="img/step6.png">
                                    <span>Step 6</span>
                                </p>
                                <p class="arrow-right-bottom"></p>
                                <p class="text-process">The submitted ideas will be evaluated and for the grand finale teams/start-ups will be shortlisted.</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
        </section>
        <br><br>
        
    </section>

    <section style="background-color:#574bff">
        <div class="container p-5">
            <div class="d-flex align-items-center">
                <h3 class="pe-4 text-light">F.A.Q</h3>
                <hr class="text-success w-25">
            </div> 
            <h1 class="text-light fw-bold">FREQUENTLY ASKED QUESTIONS FOR <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> PARTICIPANTS</h1>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     
							Q. How do I register for <?php echo $eventname; ?>-<?php echo $activesession_record_add_full; ?> ?
						  
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Registration of teams must be done by Team Leader. The registration process is simple. All you need to do is,<br>

                    Visit https://tekvisory.geumca.in/Registration<br>
                    Create a login id<br>
                    Fill all the required fields<br>
                    Fill the team details<br>
                    Don’t forget to click 'Submit'<br></div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      HOW SHOULD WE FORM A TEAM
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Each team would comprise of 6 members including the team leader.<br>
                     Each team must have at least one female team member.<br>
                     Clearly communicate the email-ids and mobile numbers of all team members as well.<br>
                     The Team Name should be unique and not contain the name of your institute in any form.<br>
                     The team leader can nominate up to 1 mentor preferably having relevant expertise in academia or industry experience.</div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      HOW DO WE SUBMIT OUR IDEA
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"><b>Please note: Idea submission must be made by the Team Leader only.<b><br>
                     Submission dates should be strictly followed. No exceptions will be made.<br>
                     Submission is required to be done on Registration Potral in the prescribed format. The format is available on the website.<br>
                     After login, fill in all the required details for submission of the idea.<br>
                     Entries to be sent only in the prescribed format; otherwise they are bound to get rejected.<br>
                     A team can submit idea in only one problem statement only. Multiple idea submission in this hackathon is not allowed.</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                     WHAT IS THE SELECTION CRITERIA
                    </button>
                  </h2>
                  <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body"><b>Evaluation criteria will include novelty of the idea, complexity, clarity and details in the prescribed format, feasibility, practicability, sustainability, scale of impact, user experience and potential for future work progression.</b></div>
                </div>
            </div>
        </div>

        
                </div>
            </div>
        </div>
    </section>


    <section style="background-color:#574bff">
            <div class="container text-light">
                <div class="row">
                  <div class="col-md-6">
                      <h2 class="">Faculity Coordinator</h2>
                      <h4>Dr. Neelam Singh</h4>
                      <h4>Dr. Varsha Mittal</h4>
                      <h4>Mrs. Vandana Rawat</h4>
                      <hr>
                  </div>
               
                  <div class="col-md-6">
                    <h2 class="">Student Coordinator</h2>
                    <h4>Arnav Garg</h4>
                    <h4>Abhinav Jain</h4>
                    <h4>Paritosh Bisth</h4>
                    <hr>
                  </div>
                </div>
            </div>
    </section>

    <section style="background: #574bff;background: -webkit-linear-gradient(0deg,#574bff 0%, #bc48ff 100%);
    background: linear-gradient(0deg, #bc48ff 0%, #574bff 100%);">
        <div class="container p-5 text-light">
            <div class="d-flex align-items-center">
                
                <hr class="text-success w-25">
            </div> 
            <h1 class="text-light">CONTACT US</h1>
            <div class="row">
                <div class="col-lg-6 ">
                  <div class="info">
                    <div class="email">
                      <i class="bi bi-envelope"></i>
                      <h4>Email:</h4>
                      <p><a href="mailto:tekvisory@gmail.com" class="btn btn-lg text-light"> tekvisory@gmail.com </a></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6" >
                  <div class="info">
                    <div class="phone">
                      <i class="bi bi-phone"></i>
                      <h4>Call:</h4>
                      <p><a href="tel:7302624169" class="btn btn-lg  text-light"> 7302624169 </a></p>
                      <p><a href="tel:9557500759" class="btn btn-lg  text-light"> 9557500759 </a></p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>


<footer class=" p-3" style="background-color:#bc48ff">
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