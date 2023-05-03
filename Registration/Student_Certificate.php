<?php 

   session_start();
    include("admin/include/config.php");
    error_reporting(1);
   date_default_timezone_set('Asia/Kolkata');  
   $mydir = "certificate";
   $Currentwebsiteurl=basename($_SERVER['REQUEST_URI']); 
   $tempactivesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$tempresactivesessionquery=mysqli_fetch_assoc($tempactivesessionquery);
$temp_activesession_record=$tempresactivesessionquery['session_year'];
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
<h4 align="left" style="font-family:'type'; color:#f7260f" ><b>Note:
       
        <b>
        <br>&emsp;&emsp;*Contact us on :- 9557500759, 8077379286, 9627190657.
    </b>
</h4>
<hr>
<div class="tab">
  <button class="tablinks" id="tablinks" onclick="CertificateTab(event, 'Get')">Get Certificate</button>
  <button class="tablinks" id="tablinks" onclick="CertificateTab(event, 'Verify')">Verify Certificate</button>
  
</div>


<!--- Get Certicate Content--->
<div id="Get" class="tabcontent">
  
<form name="form" method="POST" action="<?php echo $Currentwebsiteurl; ?>"  onSubmit="return check();">
<div class="row">
    <div class="col">
    <!-- Name input -->
    <div class="form-outline">
     <select class="form-select" name="inputsessionyear" id="inputsessionyear"  required="inputsessionyear" onselect="document.getElementById('$inputsessionyear');">
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
<?php
$rssession=mysqli_query($con,"SELECT * FROM `session`  ORDER BY `session`.`session_year` DESC");
      while($rowsession=mysqli_fetch_array($rssession))
{
if($rowsession[0])
{?>
<option value='<?php echo $rowsession[3];?>'<?php if($temp_activesession_record==$rowsession[1])
{
    echo"selected";
} ?>><?php echo $rowsession[1];?></option>
<?php
}
}
?>
      </select>
      <label class="form-label" for="form8Example3">Session</label>
    </div>
  </div>
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">
      <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="student_id" id="student_id" class="form-control" placeholder="Enter student id Ex:- 21391043" required>
      <label class="form-label" for="form8Example3">Student ID</label>
    </div>
  </div>
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">
    <input type="text" name="student_email" id="student_email" placeholder="Enter your email" required class="form-control">
      <label class="form-label" for="form8Example4">Email address</label>
    </div>
  </div>
  <div class="col">
    <!-- Email input -->
    <div class="form-outline">
     <input type="date" name="student_dob" id="student_dob" placeholder="Enter birth date" class="form-control" required>
      <label class="form-label" for="form8Example5">Date of Birth</label>
    </div>
  </div>
</div>

<div class="mt-6 mb-0" align="center">
                <input class="btn btn-success "type="submit" name="CertificateCheck" id="CertificateCheck" Value="Get Certificate"/>
            </form>
            <br>
      <?php
 extract($_POST);
        extract($_GET);
        if(isset($CertificateCheck))
{
    echo"<hr>";
  
    $StudentId=$_POST['student_id'];
    $studentEmail=$_POST['student_email'];
     $studentdob=$_POST['student_dob'];
   

   $dateyear=$_POST['inputsessionyear']; 

$studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];

 
    
   $updatedatatcoursequery=mysqli_query($con,"SELECT * FROM `registration` WHERE `student_id`='$StudentId' AND `student_email`='$studentEmail' AND `student_dob`='$studentdob' AND `fee_status`='Active'AND `session`='$studentsessionyearrecord'");
$result=mysqli_fetch_assoc($updatedatatcoursequery)or die("<script language='javascript'>alert('Record Not Exits');window.location='$Currentwebsiteurl'</script>");
 // echo "$StudentId" ;
   //echo "$studentEmail" ;
  // echo "$studentdob" ;
 $student_name=$result['student_name'];
$collegeid=$result['student_campus'];

 $campusname=mysqli_query($con,"SELECT * FROM `campus` WHERE `campus_id`='$collegeid'");
                $campusnameresult=mysqli_fetch_array($campusname);
                $college_name=$campusnameresult['campus_name'];
$receipt_number=$result['receipt_number'];

    $image=imagecreatefromjpeg("certificateimg/$studentsessionyearrecord/FinalTechWizardCertificate.jpg");
    $color=imagecolorallocate($image,255, 255, 255);
    
    imagettftext($image,50,1,650,605,$color,"font/FontsFree-Net-Poppins-Medium.TTF",$student_name);
    //$date=$college_name;
    imagettftext($image,35,1,550,745,$color,"font/FontsFree-Net-Poppins-Medium.TTF",$college_name);
    imagettftext($image,20,1,300,1410,$color,"font/FontsFree-Net-Poppins-Medium.TTF",$receipt_number);
    $file=$receipt_number."_".$StudentId.".jpg";
    $filename=$receipt_number."_".$StudentId;
    imagejpeg($image,"certificate/".$file);
    imagedestroy($image);
     $imageencode="certificate/$file";
     $creationdate=date("Y-m-d");
     $creationtime=date("h:i:sa");
     $creationdatetime=date("Y-m-d h:i:sa");

$courseupdatequery="UPDATE `registration` SET `certificate_name`='$file',`certificate_date`='$creationdate',`certificate_time`='$creationtime',`certificate_datetime`='$creationdatetime' WHERE`receipt_number`='$receipt_number'";
mysqli_query($con,$courseupdatequery);

$imageData = base64_encode(file_get_contents($imageencode));

// Format the image SRC:  data:{mime};base64,{data};
$imageencodesrc = 'data: '.mime_content_type($imageencode).';base64,'.$imageData;
}


?>
<?php 

if(isset($_REQUEST['download'])){
    $idverify= $_GET['download'];
    $status=1;
    $query = "UPDATE `registration` SET `certificate_download`='$status' WHERE  `certificate_name`='$idverify'";
    $Result =mysqli_query($connect, $query);
    header("location: Student_Certificate.php");
}
    ?>

 <?php if($imageencodesrc)   { ?>                                    
   <img src="<?php echo $imageencodesrc; ?>" class="rounded" alt="<?php echo $result['receipt_number']; ?>" width="500" height="300">
        <br>
        <hr>
        <a href="<?php echo $imageencodesrc; ?>" download="<?php echo $filename; ?>"><span class='fas fa-download'></span> Download</a>                                        
     <?php } ?>                                         

                                            
 </div>

</div>
   <?php
 extract($_POST);
        extract($_GET);
        if(isset($verifycertificate))
{
       $VerifyCertificateupdate=mysqli_query($con,"SELECT * FROM `registration` WHERE `receipt_number`='$CertificateNumber'  AND `fee_status`='Active';");
$VerifyCertificateupdateresult=mysqli_fetch_assoc($VerifyCertificateupdate)or die("<script language='javascript'>alert('Record Not Exits');window.location='$Currentwebsiteurl'</script>");
$student_name=$VerifyCertificateupdateresult['student_name'];

echo"<script language='javascript'>alert('Verified This Certificate Belongs to $student_name');window.location='$Currentwebsiteurl'</script>";

}
 ?>   
<!--- Verify Certicate Content--->
<div id="Verify" class="tabcontent">
<form name="Verify" method="POST" action="<?php echo $Currentwebsiteurl; ?>"  onSubmit="return check();">
<div class="row">
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">
      <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="CertificateNumber" id="CertificateNumber" class="form-control" placeholder="Enter Certificate Number" required>
      <label class="form-label" for="form8Example3">Certificate Number</label>
      <label class="form-label" for="form8Example3">Note:- Locate your certificate number at the bottom left corner</label>
    </div>
  </div>
  <div class="col">
    <!-- Name input -->
    <div class="form-outline">
   <input class="btn btn-success "type="submit" name="verifycertificate" id="verifycertificate" Value="Verify Certificate"/>
    </div>
  </div>
</div>
</div>


   </div>
               
  
<script>
    var tab1=document.getElementsByClassName('tablinks')[0];
    var tab2=document.getElementsByClassName('tablinks')[1];
    tab1.click()
    //tab2.click()
function CertificateTab(evt, CertificateEvent) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
   
        //document.getElementsByClassName('tablinks')[1].click()
   
  }
  document.getElementById(CertificateEvent).style.display = "block";
  evt.currentTarget.className += "active";
  //document.getElementsByClassName('tablinks')[1].click()
}

</script>
   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>