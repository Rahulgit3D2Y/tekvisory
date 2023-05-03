<?php 

   session_start();
    include("admin/include/config.php");
    error_reporting(1);
date_default_timezone_set('Asia/Kolkata'); 
    extract($_REQUEST);
foreach($_GET as $userid=>$useritem)
  $id = $_GET[$userid] = base64_decode(urldecode($useritem));
$activesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$resactivesessionquery=mysqli_fetch_assoc($activesessionquery);
$activesession_record_add=$resactivesessionquery['session_year'];
$activesession_record_add_full=$resactivesessionquery['fyear'];
$EventnameQuery =mysqli_query($con,"SELECT *  FROM `course_fee`  WHERE `status`='Active' and `session`='$activesession_record_add' AND `event_status`='Active'"); 
$resultEventnameQuery=mysqli_fetch_assoc($EventnameQuery);
$eventname = $resultEventnameQuery['event_name'];
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="style.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
     
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title> Registration Form | <?php echo $eventname;?>  </title> 
</head>

<style type="text/css">
   
#btn {
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

#btn:hover {background-color: #3e8e41}

#btn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
        
         }
         else 
         {
              document.getElementById("student_specilization").readOnly = true;
       document.getElementById("student_specilization").disabled = true;
       document.getElementById("student_specilization").value="NaN";
       document.getElementById("student_specilization").required = false;

         }
     }
    
</script>
 <body class="sb-nav-fixed" oncontextmenu="return false">
<?php
$updatedatatstudentstatusquery=mysqli_query($con,"SELECT * FROM `registration` WHERE `receipt_number`='$id'");
$resultstatus=mysqli_fetch_assoc($updatedatatstudentstatusquery)or die("<script language='javascript'>alert('Link Expired Contact to Admin');window.location='index.php'</script>");
$studentstatus=$resultstatus['fee_status'];
$sessionyear=$resultstatus['session'];
$tempactivesessionquery=mysqli_query($con,"SELECT * FROM `session` WHERE `status` ='Active'");
$tempresactivesessionquery=mysqli_fetch_assoc($tempactivesessionquery);
$temp_activesession_record=$tempresactivesessionquery['session_year'];
if($sessionyear!=$temp_activesession_record)
{
echo "<script language='javascript'>alert('Link Expired');window.location='index.php'</script>";
    exit();
}

if ($studentstatus=="Active")
 {
    echo "<script language='javascript'>alert('You Have Already Complete Your Payment Process');window.location='index.php'</script>";
    exit();
}
?>
    <div class="container">
        <header>
               <?php 
$studentsendmessagesetting =mysqli_query($con,"SELECT `popupstatus` FROM `advancesetting`  WHERE `popupname`='Registration'"); 
$studentsendmessagesettingres=mysqli_fetch_assoc($studentsendmessagesetting);
$studentsendmessagesettingstatus = $studentsendmessagesettingres['popupstatus'];

if($studentsendmessagesettingstatus == "Active") {
?>
            <img src="img/img.png" alt="" width="100px;" height="100px;">
           
              <img src="img/geu-logo (1).svg" alt="" width="100px;" height="100px;">
            <img class="imp" src="img/istelogo.png" alt="In Association With" width="100px;" height="100px;" >

            <h2>TEKVISORY PRESENTS</h2>

            <h2><?php echo $eventname;?> 
            
            </h2>
            <h3>Payment Form</h3>

           
            
        </header>




         
  <div class="col-sm-6" style="align-content: center;">
    <div class="card">
      <div class="card-body">
       
<?php




$updatedatatstudentquery=mysqli_query($con,"SELECT * FROM `registration` WHERE `receipt_number`='$id'");
$result=mysqli_fetch_assoc($updatedatatstudentquery)or die("");

$studentcampusid=$result['student_campus'];
$studentcourseid=$result['student_course'];
$studentspecilizationid=$result['student_specilization'];



$campusnamequery=mysqli_query($con,"SELECT * FROM `campus` WHERE `campus_id`='$studentcampusid'");
$resultcampusname=mysqli_fetch_assoc($campusnamequery)or die("");
$campusname=$resultcampusname['campus_name'];

$coursenamequery=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`='$studentcourseid'");
$resultcoursename=mysqli_fetch_assoc($coursenamequery)or die("");
$coursename=$resultcoursename['course_name'];

if($studentspecilizationid) {
$specilizationnamequery=mysqli_query($con,"SELECT * FROM `specilization` WHERE `specilization_id`='$studentspecilizationid'");
$resultspecilizationnamequery=mysqli_fetch_assoc($specilizationnamequery)or die("");
$studentspecilizationname=$resultspecilizationnamequery['specilization_name'];
}
  ?>
      <h4 align="left" style="font-family:'type'; color:#f7260f" ><b>Note:
       
        <b>
            
        <br>&emsp;&emsp;*Any Change in Detail
        <br>&emsp;&emsp;*Mail us on :- tekvisory@geu.ac.in
        <br>&emsp;&emsp;*Contact us on :- 7302020015.
        <br>&emsp;&emsp;*Don't back the page.
        <br>&emsp;&emsp;*Please wait for Payment Confirmation after payment completion.
         <br>&emsp;&emsp;*confirmation mail will be got after payment completion in within 1 minute.
    </b>
</h4>
  <form>
<style>
    #classloaderdiv
    {
         background-color: #ffffff;
 width: 100%;
 position: absolute
    }
    #loader {
    position:fixed;
    width:100%;
    left:0;right:0;top:0;bottom:0;
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
    display:none;
}


</style>
  <div class="card-body" id="classloaderdiv">
 <div id='loader' style='display: none;'>
    <div align="center">
        <p class="text-center mb-0"><img src="admin\image\loading.svg" style="width:100px; height:100px;"/>  Please wait ... </p>
 
  </div>
      </div>
    <h5 class="card-title"></h5>
    <p class="card-text"><b>Team Amount:-</b> ₹<?php echo $resultEventnameQuery['course_fee']; ?></p>
    <input type="hidden" name="InputEvent_name" id="InputEvent_name" value="<?php echo $eventname;?>">
     <input type="hidden" name="receiptnumber" id="receiptnumber" value="<?php echo $id;?>">
     <p class="card-text"><b>Team Name:-</b> <?php echo $result['team_name']; ?></p>
      <p class="card-text"><b>Student Head Name:-</b> <?php echo $result['student_name']; ?></p>
      <p class="card-text"><b>Admission Id:-</b> <?php echo $result['student_id']; ?></p>
      <input type="hidden" name="student_id" id="student_id" value="<?php echo $result['student_id']; ?>">
      <input type="hidden" name="student_Email" id="student_Email" value="<?php echo $result['student_email']; ?>">
      <input type="hidden" name="student_Number" id="student_Number" value="<?php echo $result['student_number']; ?>">
      <p class="card-text"><b>Date Of Birth:-</b> <?php echo date("d-m-Y", strtotime($result['student_dob'] )); ?></p>
      <p class="card-text"><b>Campus:-</b> <?php echo $campusname ; ?> </p>
      <p class="card-text"><b>Course:-</b> <?php if($studentcourseid=="527") { echo $result['student_othercoursename']; } else { echo $coursename." ".$studentspecilizationname ; } ?></p>
       <p class="card-text"><b>Semester:-</b> <?php echo $result['student_semester'] ; ?> </p>
      <p class="card-text"><b>Number:-</b> <?php echo $result['student_number'] ; ?> </p>
      <p class="card-text"><b>Email:-</b>  <?php echo $result['student_email'] ; ?> </p>
      <p class="card-text"><b>Date:-</b>   <?php echo date('d-m-Y'); ?> </p><br>
      <input type="hidden" name="cdate" id="cdate" value="<?php echo  date('Y-m-d'); ?>">
      <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>

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
 
<script>
    function pay_now(){
        var receiptnumber=jQuery('#receiptnumber').val();
        var TotalAmount=<?php echo $resultEventnameQuery['course_fee']; ?>;
       var eventnamevalue=jQuery('#InputEvent_name').val();
        //var eventnamevalue=<?php echo $resultEventnameQuery['event_name']; ?>;
        var student_id=jQuery('#student_id').val();
        var cdate=jQuery('#cdate').val();
        var semail=jQuery('#student_Email').val();
        var snumber=jQuery('#student_Number').val();
         var description="Order Id ="+receiptnumber+" Payment Of student id="+student_id;

        
         jQuery.ajax({
               type:'POST',
               url:'payment_process.php',
               data:"TotalAmount="+TotalAmount+"&receiptnumber="+receiptnumber+"&student_id="+student_id+"&cdate="+cdate,
               success:function(result){
                   var options = {
                        "key": "rzp_test_5J6dsIZe19EHmm", 
                        "amount": TotalAmount*100, 
                        "currency": "INR",
                         "captured": true,
                        "name": eventnamevalue,
                        
                        "description": description,
                         "notify": 
                         {
                           "sms": true,
                           "email": true
                         },           
                          "prefill": {
    "contact": "91"+snumber,
    "email": semail
  },          
                        "image": "https://techwizard.geumca.in/img/logo.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'POST',
                               url:'payment_process.php',
                               data:"invoice_number="+response.razorpay_payment_id,
                               beforeSend: function(){
    // Show image container
    $("#loader").show();
   },
                               success:function(result){
                                 
                                 window.alert("Payment Successful!")
                                 window.alert("Please Check Your Mail for the confirmation.")
                                
                                   window.location.href="index.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
        $(window).load(function() {
            alert("success");
        });

    </script>

</div>
</body>
</html>