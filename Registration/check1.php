<?php 

   session_start();
    include("admin/include/config.php");
    error_reporting(1);
   date_default_timezone_set('Asia/Kolkata');  
   $mydir = "certificate";
   $Currentwebsiteurl=basename($_SERVER['REQUEST_URI']); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
     
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title> Student Certificate  | Tech Wizards 2.0 </title> 
    <style type="text/css">
        
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
    </style>
</head>


 <body class="sb-nav-fixed" oncontextmenu="return false">
    <div class="container">
       
   
        <header>
            <img src="img/img.png" alt="" width="100px;" height="100px;">
           
              <img src="img/geu-logo (1).svg" alt="" width="100px;" height="100px;">
            <img class="imp" src="img/imp.png" alt="In Association With" width="300px;" height="100px;" >
            

            <h2>TEKVISORY PRESENTS</h2>

            <h2>TECH WIZARDS 2.0 
            
            </h2>
            <h3>Student Certificate</h3>
               <?php
if ($fh=opendir($mydir) )
 {
    while(($entry = readdir($fh)) !== false)
    {
       // echo $entry;
         
        if($entry !="." && $entry !=".." && $entry !="index.php" )
            {

                $myfile = $entry;
                $count+=1;
                
        
 unlink("certificate/$myfile"); 
       
               //
                ?>


                <?php
            
            }
        }
    }
                ?>

           
            
        </header>

<hr>
<div class="container">
  <ul class="nav nav-pills">
    <li class="active"><a data-target="#home" data-toggle="tab">Home</a></li>
    <li><a href="#about" data-toggle="tab">About</a></li>
    <li><a href="#contacts" data-toggle="tab">Contacts</a></li>
  </ul>
</div>

<div class="tab-content">
  <div class="tab-pane active" id="home">Home</div>
  <div class="tab-pane" id="about">About</div>
  <div class="tab-pane" id="contacts">Contacts</div>
</div>

   </div>
               
  
<script>
    document.getElementsByClassName('tablinks')[0].click()
function CertificateTab(evt, CertificateEvent) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }
  document.getElementById(CertificateEvent).style.display = "block";
  evt.currentTarget.className += "active";
}

</script>
   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>