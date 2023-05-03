<?php 

   session_start();
    include("admin/include/config.php");
    error_reporting(1);
 date_default_timezone_set('Asia/Kolkata'); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    
     
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   
</head>
<script type="text/javascript">
     function CourseChangeFunction() {
        selectElement_fee = document.querySelector('#student_course');
        selectElement_fee_output = selectElement_fee.value;
        if(selectElement_fee_output == "123")
        {
       document.getElementById("student_specilization").readOnly = false;
       document.getElementById("student_specilization").disabled = false;
       //document.getElementById("student_specilization").value=" ";
       document.getElementById("student_specilization").required = true;
      // document.getElementById("Specialization").style.display = "flex";
      // document.getElementById("Showonly").style.display = "none";
       // document.getElementById("Othercoure").style.display = "none";
       document.getElementById("OtherCourseName").readOnly = true;
       document.getElementById("OtherCourseName").disabled = true;
       document.getElementById("OtherCourseName").value="";
            document.getElementById("OtherCourseName").required = false;
         }
         else if (selectElement_fee_output == "527") 
         {
             document.getElementById("OtherCourseName").readOnly = false;
       document.getElementById("OtherCourseName").disabled = false;
            document.getElementById("OtherCourseName").required = true;

            document.getElementById("student_specilization").readOnly = true;
       document.getElementById("student_specilization").disabled = true;
       document.getElementById("student_specilization").value="none";
       document.getElementById("student_specilization").required = false;
         
           // document.getElementById("Othercoure").style.display = "flex";
            //document.getElementById("Specialization").style.display = "none";
      // document.getElementById("Showonly").style.display = "none";

         }
         else 
         {
              document.getElementById("student_specilization").readOnly = true;
       document.getElementById("student_specilization").disabled = true;
       document.getElementById("student_specilization").value="none";
       document.getElementById("student_specilization").required = false;
      // document.getElementById("Showonly").style.display = "flex";
      //  document.getElementById("Othercoure").style.display = "none";
//document.getElementById("Specialization").style.display = "none";
       document.getElementById("OtherCourseName").readOnly = true;
       document.getElementById("OtherCourseName").disabled = true;
       document.getElementById("OtherCourseName").value="";
            document.getElementById("OtherCourseName").required = false;

         }
     }
     var myArray=["gmail.com","geu.ac.in","yahoo.in","gehu.ac.in","duck.com","outlook.com","outlook.in","mailinator.com","protonmail.com","proton.me"];
  
    function check()
    {  
var string=document.form.student_email.value;  
 var emailcontent =  string.split('@')[1];
 var mailname =  string.split('@')[0];
  var emailcontentafter=emailcontent.toLowerCase();
  var mailnameafter=mailname.toLowerCase();
if(emailcontentafter=="gmail.com"||emailcontentafter=="geu.ac.in"||emailcontentafter=="yahoo.in"||emailcontentafter=="gehu.ac.in"||emailcontentafter=="duck.com"||emailcontentafter=="outlook.com"||emailcontentafter=="outlook.in"||emailcontentafter=="mailinator.com")
{  
  
}
else
{
    alert("Please Enter Valid Mail Id");  
  return false;  
}
if(hasSpace(mailnameafter))
{
 alert("Please Remove Space or Enter your Email");
 return false;     
}

}  
</script>
 
 <body class="sb-nav-fixed" oncontextmenu="return false" style=" background-color: #4070f4;">
    <div class="container">
         <?php 
         $activesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$resactivesessionquery=mysqli_fetch_assoc($activesessionquery);
$activesession_record_add=$resactivesessionquery['session_year'];
$activesession_record_add_full=$resactivesessionquery['fyear'];

$studentsendmessagesetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`='Registration'"); 
$studentsendmessagesettingres=mysqli_fetch_assoc($studentsendmessagesetting);
$studentsendmessagesettingstatus = $studentsendmessagesettingres['popupstatus'];

$EventnameQuery =mysqli_query($con,"SELECT *  FROM `course_fee`  WHERE `status`='Active' and `session`='$activesession_record_add' AND `event_status`='Active'"); 
$resultEventnameQuery=mysqli_fetch_assoc($EventnameQuery);
$eventname = $resultEventnameQuery['event_name'];


if($studentsendmessagesettingstatus == "Active")
 {
?>
    <title> Registration Form | <?php echo $eventname;?>  </title> 
        <header>
            <img src="img/img.png" alt="" width="100px;" height="100px;">
           
              <img src="img/geu-logo (1).svg" alt="" width="100px;" height="100px;">
            <img class="imp" src="img/istelogo.png" alt="In Association With" width="100px;" height="100px;" >
            

            <h2>TEKVISORY PRESENTS</h2>

            <h2><?php echo $eventname;?> 
            
            </h2>
            <h3>Registration Form</h3>
             <h3>Team Leader Detail</h3>

           
            
        </header>
        <center>
            <a href=""  data-bs-toggle="modal" data-bs-target="#CompletePaymentProcess">Complete Payment Process</a>
        </center>
        
        
<?php 
        extract($_POST);
        extract($_GET);
        if(isset($Registration))
{

$hash_pass ="e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd";
$schoolquerycode=mysqli_query($con,"SELECT * FROM `school`");
$schoolquerycoderesult=mysqli_fetch_assoc($schoolquerycode);
$school_code=$schoolquerycoderesult['school_code'];
     
$date=date("Y-m-d h:i:sa");
$Currentdate=date("Y-m-d");

    $feesessionyearrecord=$activesession_record_add;
    $inputStudentAmountPaid=$_POST['TotalAmount'];
    $StudentName=$_POST['student_name'];
    $StudentId=$_POST['student_id'];
    $studentEmail=$_POST['student_email'];
    $studentNumber=$_POST['student_number'];
    $studentwhatsappnumber=$_POST['student_whatsappnumber'];
    $studentGender=$_POST['student_gender'];
    $studentCampus=$_POST['student_campus'];
    $studentCourse=$_POST['student_course'];
    $studentSemester=$_POST['student_semester'];
    $studentSpecilization=$_POST['student_specilization'];
      $studentdob=$_POST['student_dob'];
$InputTeamName=$_POST['InputTeamName'];
 $dateyear=$activesession_record_add_full;
    $startno="00001";
    $feestatus ="Rejected";
    $studentstatus ="Active";
    $orderid=" ";
    $monthyear=date("my");

    $id1=$dateyear."".$school_code;
    $teamidgenid1=$dateyear."".$monthyear;
    $rsquery=mysqli_query($con,"SELECT * FROM `registration` WHERE `student_id`='$StudentId' AND `fee_status`='Active' AND `session`='$feesessionyearrecord' OR `student_email`='$studentEmail' AND `fee_status`='Active' AND `session`='$feesessionyearrecord'");
if (mysqli_num_rows($rsquery)>0)
{
    
        echo "<script language='javascript'>alert('your Process is already Completed');window.location='index.php'</script>";
        exit();
    
}

       $rsquery=mysqli_query($con,"SELECT * FROM `registration` WHERE `student_id`='$StudentId' AND `fee_status`='Rejected'  AND `session`='$feesessionyearrecord'  OR `student_email`='$studentEmail' AND `fee_status`='Rejected' AND `session`='$feesessionyearrecord' OR `student_number`='$studentNumber' AND `fee_status`='Rejected' AND `session`='$feesessionyearrecord' ");
if (mysqli_num_rows($rsquery)>0)
{
    if ($resultrow=mysqli_fetch_row($rsquery)) 
    {
$receiptnumberid=$resultrow['1'];
$hashcode1=surlencode(base64_encode($receiptnumberid));
        echo "<script language='javascript'>alert('you are already registered with us  Please Complete Your Payment Process');window.location='Complete_PaymentProcess.php?id=$hashcode1'</script>";
        exit();
    }
    
}

$rs1=mysqli_query($con,"SELECT * FROM `registration` WHERE LEFT(`receipt_number`,6) LIKE '%$id1%' ORDER BY `payment_id` DESC LIMIT 1");
 if (mysqli_num_rows($rs1)>0)
{
    if ($row=mysqli_fetch_row($rs1)) 
    {
        $uid = $row['1'];
       // $get_numbers = str_replace("SR","",$uid);
        $id_increase = $uid+1;
        //$id_increase = $get_numbers+1;
        $get_string = str_pad($id_increase,6,0,STR_PAD_LEFT);
        //$id = "SR".$get_string;
        $id = $get_string;
        $password_gen = SHA1($id);
   $hashcode=urlencode(base64_encode($id));
mysqli_query($con,"INSERT INTO `registration`(`login`,`receipt_number`, `student_id`, `student_name`, `student_gender`, `student_campus`, `student_course`, `student_specilization`, `student_semester`, `student_email`, `student_number`, `student_whatsappnumber`,`student_dob`, `paid_amount`, `paid_date`, `paid_mode`, `order_id`, `fee_status`, `student_status`, `createdtime`, `session`,`student_othercoursename`,`member_leader`,`team_name`, `password`, `hash_password`, `memberfreezerecord`, `mentorfreezerecord`) VALUES ('$id','$id','$StudentId','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentwhatsappnumber','$studentdob','$inputStudentAmountPaid','$Currentdate','Online','$orderid','$feestatus','$studentstatus','$date','$feesessionyearrecord','$OtherCourseName','Yes','$InputTeamName','$password_gen','$hash_pass','No','No')") or die(mysqli_error());
 $_SESSION['OID']=mysqli_insert_id($con);
$teamidformember=$_SESSION['OID'];

$teamidgen=mysqli_query($con,"SELECT * FROM `team_detail` WHERE LEFT(`teammember_number`,6) LIKE '%$teamidgenid1%' ORDER BY `teammember_id` DESC LIMIT 1");
 if (mysqli_num_rows($teamidgen)>0)
{
    if ($teamidgenrow=mysqli_fetch_row($teamidgen)) 
    {
        $teamidgenuid = $teamidgenrow['1'];
       // $teamidgenget_numbers = str_replace("ID","",$teamidgenuid);
        $teamidgenid_increase = $teamidgenuid+1;
        //$teamidgenid_increase = $teamidgenget_numbers+1;
        $teamidgenget_string = str_pad($teamidgenid_increase,6,0,STR_PAD_LEFT);
        //$teamidgenid = "SR".$teamidgenget_string;
        $teamidgenid = $teamidgenget_string;

 mysqli_query($con,"INSERT INTO `team_detail`(`teammember_number`,`team_id`, `teammember_studentid`,`teammember_studentname`,`teammember_studentgender`,`teammember_studentcampus`, `teammember_studentcourse`, `teammember_studentspecilization`,`teammember_studentsemester`, `teammember_studentemail`, `teammember_studentnumber`,`teammember_studentdob`, `teammember_studentsession`, `teammember_studentstatus`,`teammember_studentcreatedtime`, `teammember_leader`)  VALUES ('$teamidgenid','$teamidformember','$StudentId','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentdob','$feesessionyearrecord','Pending','$date','Yes')") or die(mysqli_error());

    }
   
}  
else
{    
  
     $teamidgenid=$dateyear."".$monthyear."".$startno;


mysqli_query($con,"INSERT INTO `team_detail`(`teammember_number`,`team_id`, `teammember_studentid`,`teammember_studentname`,`teammember_studentgender`,`teammember_studentcampus`, `teammember_studentcourse`, `teammember_studentspecilization`,`teammember_studentsemester`, `teammember_studentemail`, `teammember_studentnumber`,`teammember_studentdob`, `teammember_studentsession`, `teammember_studentstatus`,`teammember_studentcreatedtime`, `teammember_leader`)  VALUES ('$teamidgenid','$teamidformember','$StudentId','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentdob','$feesessionyearrecord','Pending','$date','Yes')") or die(mysqli_error());

}


echo "<script language='javascript'>alert('Record Added Successfully  Please Complete Your Payment Process');window.location='Complete_PaymentProcess.php?id=$hashcode'</script>";

    exit();
    }
   
}  
else
{    
  
     $id=$dateyear."".$school_code."".$startno;
     $password_gen = SHA1($id);
     $hashcode=urlencode(base64_encode($id));
mysqli_query($con,"INSERT INTO `registration`(`login`,`receipt_number`, `student_id`, `student_name`, `student_gender`, `student_campus`, `student_course`, `student_specilization`, `student_semester`, `student_email`, `student_number`, `student_whatsappnumber`,`student_dob`, `paid_amount`, `paid_date`, `paid_mode`, `order_id`, `fee_status`, `student_status`, `createdtime`, `session`,`student_othercoursename`,`member_leader`,`team_name`, `password`, `hash_password`, `memberfreezerecord`, `mentorfreezerecord`) VALUES ('$id','$id','$StudentId','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentwhatsappnumber','$studentdob','$inputStudentAmountPaid','$Currentdate','Online','$orderid','$feestatus','$studentstatus','$date','$feesessionyearrecord','$OtherCourseName','Yes','$InputTeamName','$password_gen','$hash_pass','No','No')") or die(mysqli_error());
$_SESSION['OID']=mysqli_insert_id($con);
$teamidformember=$_SESSION['OID'];

$teamidgen=mysqli_query($con,"SELECT * FROM `team_detail` WHERE LEFT(`teammember_number`,6) LIKE '%$teamidgenid1%' ORDER BY `teammember_id` DESC LIMIT 1");
 if (mysqli_num_rows($teamidgen)>0)
{
    if ($teamidgenrow=mysqli_fetch_row($teamidgen)) 
    {
        $teamidgenuid = $teamidgenrow['1'];
       // $teamidgenget_numbers = str_replace("ID","",$teamidgenuid);
        $teamidgenid_increase = $teamidgenuid+1;
        //$teamidgenid_increase = $teamidgenget_numbers+1;
        $teamidgenget_string = str_pad($teamidgenid_increase,6,0,STR_PAD_LEFT);
        //$teamidgenid = "SR".$teamidgenget_string;
        $teamidgenid = $teamidgenget_string;

 mysqli_query($con,"INSERT INTO `team_detail`(`teammember_number`,`team_id`, `teammember_studentid`,`teammember_studentname`,`teammember_studentgender`,`teammember_studentcampus`, `teammember_studentcourse`, `teammember_studentspecilization`,`teammember_studentsemester`, `teammember_studentemail`, `teammember_studentnumber`,`teammember_studentdob`, `teammember_studentsession`, `teammember_studentstatus`,`teammember_studentcreatedtime`, `teammember_leader`)  VALUES ('$teamidgenid','$teamidformember','$StudentId','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentdob','$feesessionyearrecord','Pending','$date','Yes')") or die(mysqli_error());

    }
   
}  
else
{    
  
     $teamidgenid=$dateyear."".$monthyear."".$startno;


mysqli_query($con,"INSERT INTO `team_detail`(`teammember_number`,`team_id`, `teammember_studentid`,`teammember_studentname`,`teammember_studentgender`,`teammember_studentcampus`, `teammember_studentcourse`, `teammember_studentspecilization`,`teammember_studentsemester`, `teammember_studentemail`, `teammember_studentnumber`,`teammember_studentdob`, `teammember_studentsession`, `teammember_studentstatus`,`teammember_studentcreatedtime`, `teammember_leader`)  VALUES ('$teamidgenid','$teamidformember','$StudentId','$StudentName','$studentGender','$studentCampus','$studentCourse','$studentSpecilization','$studentSemester','$studentEmail','$studentNumber','$studentdob','$feesessionyearrecord','Pending','$date','Yes')") or die(mysqli_error());

}

echo "<script language='javascript'>alert('You are Successfully registated With Please Complete Your Payment Process');window.location='Complete_PaymentProcess.php?id=$hashcode'</script>";


}

}


        ?>
        <form name="form" id="form" method="POST" action="#"  onsubmit="return check();" style="height:100px">
            <div class="form first">
                <div class="details personal">
                    <!--<span class="title">Personal Details</span>-->
                    <div class="fields">
                        <input type="hidden" name="TotalAmount" id="TotalAmount" value="50">
                        <div class="input-field">
                            <label>Team Leader Full Name</label>
                            <input type="text" placeholder="Enter your name" name="student_name" id="student_name" required>
                        </div>

                        <div class="input-field">
                            <label>Team Leader Student ID</label>
                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="student_id" id="student_id" placeholder="Enter student id Ex:- 21391043" required onkeyup="functionStudentIDCheck()">
                        </div>

                        <div class="input-field">
                            <label>Team Leader Email</label>
                            <input type="text" name="student_email" id="student_email" placeholder="Enter your email"   required onkeyup="functionStudentEmailCheck()">
                        </div>

                        <div class="input-field">
                            <label>Team Leader Mobile Number</label>
                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="student_number" id="student_number" max="10" placeholder="Enter mobile number" pattern="[6-9]{1}[0-9]{9}" maxlength="10" required>
                        </div>

                        <div class="input-field">
                            <label>Team Leader WhatsApp Number</label>
                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  id="student_whatsappnumber" name="student_whatsappnumber"   max="10" placeholder="Enter whatsapp number" maxlength="10" title="Enter 10 Digit Mobile Number" pattern="[6-9]{1}[0-9]{9}" required>
                        </div>

                        <div class="input-field">
                            <label>Select Gender</label>
                            <select required value="" name="student_gender" id="student_gender">
                                <option value="" disabled selected>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Prefer Not To Say</option>
                            </select>
                        </div>
                    </div>
                </div>

               
                  

                    <div class="fields">
                        <div class="input-field">
                            <label>Team Name</label>
                            <input type="text" name="InputTeamName" id="InputTeamName" placeholder="Enter Team Name" required  onkeyup="functionTeamNamecheck()">
                        </div>
                        <div id="result"></div>
                        <div class="input-field">
                            <label>Campus</label>
                            <select  name="student_campus" id="student_campus"  required="student_campus">
                                <option value="" disabled selected>Select</option>
                                <?php
$campusselect=mysqli_query($con,"SELECT * FROM `campus` WHERE  `status`='Active'");
      while($resultcampusselect=mysqli_fetch_array($campusselect))
{

echo "<option value='$resultcampusselect[0]'>$resultcampusselect[1]</option>";

}
?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label name="studentlabelcourse" id="studentlabelcourse">Course</label>
                            <select required name="student_course" id="student_course"  onchange="CourseChangeFunction()">
                                <option value="" disabled selected>Select</option>
                               <?php
$courseselect=mysqli_query($con,"SELECT * FROM `course_detail` WHERE  `status`='Active'");
      while($resultcourseselect=mysqli_fetch_array($courseselect))
{

echo "<option value='$resultcourseselect[1]'>$resultcourseselect[2]</option>";

}
?>
                            </select>
                        </div>

                       
 
                        
                        <div class="input-field" id="Specialization" >
                            
                            <label>Specialization (Only For B.Tech Student)</label>
                            <select required name="student_specilization" id="student_specilization">
                                <option value="" disabled selected>Select</option>
                               <?php
$courseselect=mysqli_query($con,"SELECT * FROM `specilization` WHERE  `status`='Active'");
      while($resultcourseselect=mysqli_fetch_array($courseselect))
{

echo "<option value='$resultcourseselect[0]'>$resultcourseselect[1]</option>";

}
?>
                            </select>
                            
                        </div>
                         <div class="input-field">
                            <label>Semester</label>
                            <select required="true" name="student_semester" id="student_semester">
                                <option value="" disabled selected>Select</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                         
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="student_dob" id="student_dob" placeholder="Enter birth date" required>
                        </div>

                       


                        <div class="input-field">
                            
                            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" placeholder="Enter your issued date" readonly required>
                        </div>

                        
                    </div>
<style type="text/css">
   
#Registration {
  display: inline-block;
  padding: 15px 25px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

#Registration:hover {background-color: #3e8e41}

#Registration:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
<div align="center">
                        <input type="Submit" class="sumbit" value="Next"  name="Registration" id="Registration"  >
                        </div>
                        </form>
                           
                <?php }  else {?>
                
<h1 align="center"> <span style="font-family:'type'; color:red;"><?php echo "Registartion are closed!";?></h1>
<br>
<?php echo "For further Queries!";?>
<br>
<?php echo "Mail :- graphiceraitquiz@gmail.com";?>
<br>
<?php echo "Contact Number :- 7302020015 , 8077379286";?></span>
<h4> <span style="font-family:'type'; color:red;"></span></h4>


                <?php } ?>
                    </div>
                </div> 
           
        
    </div>


<script type="text/javascript">
    var alerted = false;
    function functionTeamNamecheck() {
  var name = document.getElementById("InputTeamName").value;
 
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.indexOf("Name found in database") !== -1) {
        if (!alerted) {
          alert("Team Name already exists");
          document.getElementById("InputTeamName").value="";
          alerted = false;
        }
      } else {
        alerted = false;
      }
    }
  };
 xhttp.open("GET", "checkname.php?id="+name+"&Type="+"TeamNameCheck", true);
  xhttp.send();
}
var alerted1 = false;
function functionStudentIDCheck() {
  var name = document.getElementById("student_id").value;
 
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.indexOf("Name found in database") !== -1) {
        if (!alerted1) {
          alert("Student Id already exists");
          document.getElementById("student_id").value="";
          alerted1 = false;
        }
      } else {
        alerted1 = false;
      }
    }
  };
 xhttp.open("GET", "checkname.php?id="+name+"&Type="+"StudentidCheck", true);
  xhttp.send();
}
var emailalerted = false;
function functionStudentEmailCheck() {
  var name = document.getElementById("student_email").value;
 
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.indexOf("Name found in database") !== -1) {
        if (!emailalerted) {
          alert("Student Email already exists");
          document.getElementById("student_email").value="";
          emailalerted = false;
        }
      } else {
        emailalerted = false;
      }
    }
  };
 xhttp.open("GET", "checkname.php?id="+name+"&Type="+"StudentEmailCheck", true);
  xhttp.send();
}
</script>
<!---------------------  discount  Modal ---------------------------->
<div class="modal fade" id="CompletePaymentProcess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <form action="" method="POST">
    <div class="modal-content">
      <div class="modal-header">
<?php 
if(isset($paymentCheck))
{
$rsquery=mysqli_query($con,"SELECT * FROM `registration` WHERE  `student_email`='$Inputpaymentregistrationemailcheck' AND `fee_status`='Rejected' AND `session`='$activesession_record_add' ");
if (mysqli_num_rows($rsquery)>0)
{
    if ($resultrow=mysqli_fetch_row($rsquery)) 
    {
$receiptnumberid=$resultrow['1'];
$hashcode=urlencode(base64_encode($receiptnumberid));
        echo "<script language='javascript'>alert('you are already registered with us  Please Complete Your Payment Process');window.location='Complete_PaymentProcess.php?id=$hashcode'</script>";
        exit();
    }
    //$receiptnumberid=$rs['1'];
    
}
else
{
   echo "<script language='javascript'>alert('your Process is already Completed else check mail id');window.location='index.php'</script>";
        exit();  
}

}
?>
        <h5 class="modal-title" id="exampleModalLabel">Complete Payment Process <?php echo $activesession_record_add; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    
       <div class="row mb-3">
          <div class="col-md-4">
             <label for="Inputpaymentregistrationemailcheck" class="col-form-label">Registered Email ID<span style="color: red">*</span> </label>
            <input type="text" class="form-control" id="Inputpaymentregistrationemailcheck" name="Inputpaymentregistrationemailcheck" required placeholder="Please Enter Registered Email ID">
          </div>
          <div class="col-md-4">
            <br>  <br>
          <input class="btn btn-success" type="submit" name="paymentCheck" id="paymentCheck" value="Search" > 
       </div>
      </div>
                                 </div>
      <div class="modal-footer">
        
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div></form>

</div>

<!---------------------------------------------- end discount modal ------------------------------------------>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</body>
</html>