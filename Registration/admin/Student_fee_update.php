<?php
include("include/header.php");
require("permission_check.php");
?>
<?php

 extract($_POST);
extract($_GET);
 date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");
//$cpaiddate=date("d-m-Y");
$finalstatus="Active";
if(isset($studentfeesearch))
{
    //echo "<script language='javascript'>alert('your Process is already Completed');window.location='$Currentwebsiteurl'</script>";
  
     $StudentId=$_POST['inputStudentId'];
     $studentsqlsearchquery=mysqli_query($con,"SELECT * FROM `registration` WHERE `student_id`='$StudentId' AND `session`='$activesession_record'");
$studentresult=mysqli_fetch_assoc($studentsqlsearchquery)or die("<script language='javascript'>alert('Login ID is Not Correct');window.location='$Currentwebsiteurl'</script>");
$studentReceiptNumber = $studentresult['receipt_number'];
}
 ?>

<?php 
if(isset($feesubmit))
{
    $StudentId=$_POST['inputStudentId'];
     $cpaiddate = date("d-m-Y", strtotime($_POST['inputStudentFeeDate'])); 
    $rsquery=mysqli_query($con,"SELECT * FROM `registration` WHERE `order_id`='$inputStudentTranscationId'");
if (mysqli_num_rows($rsquery)>0)
{
    
    echo "<script language='javascript'>alert('Order Id Exit')</script>";
        //echo "<script language='javascript'>alert('Order Id Exit ');</script>";
        //exit();
    
}
else
{

  $studentupdatequery="UPDATE `registration` SET `cpaid_date`='$cpaiddate',`order_id`='$inputStudentTranscationId',`paid_mode`='$inputStudentFeeMode',`feeupdateby`='$log',`feeupdatedatetime`='$date',`fee_status`='$finalstatus',`student_status`='$finalstatus' WHERE `student_id` = '$StudentId'";
mysqli_query($con,$studentupdatequery);

  echo "<script language='javascript'>alert('$StudentId Fee updated Successfully');window.location='$Currentwebsiteurl'</script>";  
}

    
       
}



?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Student Fee</h3></div>
                                    <div class="card-body">
                    <form action="" method="POST"  onSubmit="return check();" name="fee" enctype="multipart/form-data" >
                                            <div class="row mb-3">
                                              
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">

                      <input class="form-control" id="inputStudentId" name="inputStudentId" type="text"   placeholder="Enter your student Id" required value="<?php echo $StudentId; ?>"/>
                     <label for="inputStudentId">Student ID</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="btn btn-success "type="submit" name="studentfeesearch" id="studentfeesearch" Value="Search"/>
                    </form>
                                 <form action="" method="POST"  onSubmit="return check();" name="fee2" >                   </div>
                                                </div>
                                           
<?php if ($studentReceiptNumber) { ?>
<?php
 $resultname=mysqli_query($con,"SELECT * FROM `registration` WHERE `student_id`=\"$StudentId\"");
    $rowresultname=mysqli_fetch_array($resultname);
    $student_result_name=$rowresultname['student_name'];
    $student_result_number=$rowresultname['student_number'];
    $student_result_email=$rowresultname['student_email'];
    $student_result_whatsapp=$rowresultname['student_whatsappnumber'];
    $student_result_gender=$rowresultname['student_gender'];
    $student_result_dob=$rowresultname['student_dob'];
    $student_result_campus=$rowresultname['student_campus'];
    $student_result_course=$rowresultname['student_course'];
    $student_result_semester=$rowresultname['student_semester'];
    $student_result_specilization=$rowresultname['student_specilization'];
    $student_result_Reg=$rowresultname['paid_date'];
    $student_result_fee_status=$rowresultname['fee_status'];
    $student_result_mode=$rowresultname['paid_mode'];
    $student_result_order_id=$rowresultname['order_id'];                                               
                                                        ?>
                                              
                     <div class="col-md-2">

                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php if($student_result_fee_status=="Active") { echo "Completed"; }elseif($student_result_fee_status=="Rejected"){ echo "Pending";}?>"  />
                        <label for="inputStudentFullName">Fee Status</label>
                                                    </div>
                                                </div>
                                                         </div>
                                        
            <div class="row mb-3">
                <div class="col-md-3">

                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $student_result_name; ?>"  />
                        <label for="inputStudentFullName">Student Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                   
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $student_result_number; ?>"  />
                        <label for="inputStudentFullName">Student Number</label>
                                                    </div>
                                                </div>
                                                 <div class="col-md-3">
                   
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $student_result_email; ?>"  />
                        <label for="inputStudentFullName">Student Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                   
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $student_result_whatsapp; ?>"  />
                        <label for="inputStudentFullName">Student WhatsApp Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                  <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $student_result_gender; ?>"  />
                                                        <label for="inputStudentGender">Gender</label>
                                                    </div>
                                                </div> 
                                                 <div class="col-md-2">
                        <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="date"   placeholder="Enter your First Name" readonly value="<?php echo $student_result_dob; ?>"/>
                <label for="inputStudentGender">Date Of Birth</label>
                                                    </div>
                                                </div> 

                                                  <div class="col-md-2">
                        <div class="form-floating mb-3 mb-md-0">
                            <?php 
                            $resultcampus=mysqli_query($con,"SELECT * FROM `campus` WHERE `campus_id`=\"$student_result_campus\"");
    $rowresultcampusname=mysqli_fetch_array($resultcampus);
    $campus_name=$rowresultcampusname['campus_acroym'];
    ?>
                    <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $campus_name; ?>"/>
                <label for="inputStudentGender">Campus</label>
                                                    </div>
                                                </div> 
                                                <div class="col-md-2">
                        <div class="form-floating mb-3 mb-md-0">
                            <?php 
                            $resultcourse=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`=\"$student_result_course\"");
    $rowresultcoursename=mysqli_fetch_array($resultcourse);
    $course_name=$rowresultcoursename['course_acroym'];
    ?>
                    <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $course_name; ?>"/>
                <label for="inputStudentGender">Course</label>
                                                    </div>
                                                </div> 
                                                 <div class="col-md-2">
                        <div class="form-floating mb-3 mb-md-0">
                          
                    <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $student_result_semester; ?>"/>
                <label for="inputStudentGender">Semester</label>
                                                    </div>
                                                </div> 
                                                 <div class="col-md-2">
                                                    <?php 
                            $resultspecilization=mysqli_query($con,"SELECT * FROM `specilization` WHERE `specilization_id`=\"$student_result_specilization\"");
    $rowresultspecilizationname=mysqli_fetch_array($resultspecilization);
    $specilization_name=$rowresultspecilizationname['specilization_name'];
    ?>
                        <div class="form-floating mb-3 mb-md-0">
                          
                    <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="text"   placeholder="Enter your First Name" readonly value="<?php echo $specilization_name; ?>"/>
                <label for="inputStudentGender">Specilization</label>
                                                    </div>
                                                </div> 
                                            </div>
          
            <input class="form-control" id="inputStudentId" name="inputStudentId" type="hidden"   placeholder="Enter your student Id" required value="<?php echo $StudentId; ?>">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">

                        <input class="form-control" id="inputStudentFeeDate" name="inputStudentFeeDate" type="date" placeholder="Enter your student Id" required value="<?php echo date('Y-m-d');?>" <?php if($login_user_type=="superuser") 
{

}
else
{ ?>
  max="<?php echo date('Y-m-d');?>"
<?php } ?> />
                                                        <label for="inputStudentFeeDate">Date </label>
                                                    </div>
                                                </div>
                                <div class="col-md-2">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputStudentFullName" name="inputStudentFullName" type="date"   placeholder="Enter your First Name" readonly value="<?php echo date("Y-m-d", strtotime($student_result_Reg));  ?>"/>
                <label for="inputStudentGender">Registration date</label>

                            </div>
                                </div>
                                 <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
             <select class="form-select"  required name="inputStudentFeeMode" id="inputStudentFeeMode" <?php if($student_result_fee_status=="Active") {?> readonly <?php } ?> onchange="FeeTypeFunction()" >
          <option selected="selected" value=""disabled selected>-- Select an option --</option>
          <option  value="Online"<?php if($student_result_mode=="Online") { echo "selected"; } ?>>Online</option>
           <option  value="Cash"<?php if($student_result_mode=="Cash") { echo "selected"; } ?>>Cash</option>
           

                                                        </select>
                     <label for="inputStudentFeeMode">Paid Mode</label>
                                                    </div>
                                                </div>
<div class="col-md-3">  
        <div class="form-floating mb-3 mb-md-0">
    <input class="form-control" id="inputStudentTranscationId" name="inputStudentTranscationId" type="text" <?php if($student_result_fee_status=="Rejected") { ?> required <?php } elseif($student_result_fee_status=="Active") {?> Value="<?php echo $student_result_order_id;?>" readonly <?php } ?>placeholder="Enter your student Id"    />
            <label for="inputStudentTranscationId">Transcation Id </label>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="mt-4 mb-0" align="center">
                <?php if($student_result_fee_status=="Rejected") { ?>
                                    <input class="btn btn-success "type="submit" name="feesubmit" id="feesubmit" Value="Receive"/>   
                                    <?php } ?>                                         </div>
                                      </form>     
                                              <?php }?>


                                    </div>
                        
   
                                </div>
                                
    
                            </div>
                           
                        </div>
                  <br>
                 
                </main>
                <script type="text/javascript">
window.onload = function(e){ 
   selectElement = document.querySelector('#inputStudentId');
        output = selectElement.value;
        selectElement_fee = document.querySelector('#inputStudentFeeMode');
        selectElement_fee_output = selectElement_fee.value;
        if(selectElement_fee_output == "Cash")
        {
       document.getElementById("inputStudentTranscationId").disabled = false;document.getElementById("inputStudentTranscationId").value = output;
       document.getElementById("inputStudentTranscationId").readOnly = true;
     document.getElementById("inputStudentTranscationId").required = true;
        
         }
        
}
       
    
    function FeeTypeFunction() {
        selectElement = document.querySelector('#inputStudentId');
        output = selectElement.value;
        selectElement_fee = document.querySelector('#inputStudentFeeMode');
        selectElement_fee_output = selectElement_fee.value;
        if(selectElement_fee_output == "Cash")
        {
       document.getElementById("inputStudentTranscationId").disabled = false;document.getElementById("inputStudentTranscationId").value = output;
       document.getElementById("inputStudentTranscationId").readOnly = true;
     document.getElementById("inputStudentTranscationId").required = true;
        
         }
         else if(selectElement_fee_output == "Online")
         {
            document.getElementById("inputStudentTranscationId").value = null;
     document.getElementById("inputStudentTranscationId").disabled = false; 
     document.getElementById("inputStudentTranscationId").required = true;
      document.getElementById("inputStudentTranscationId").readOnly = false;
         }
         else
         {
            document.getElementById("inputStudentTranscationId").readOnly = false;
           document.getElementById("inputStudentTranscationId").required = true; 
         }
    
    }


</script>
            
            
        <?php
include("include/footer.php");
    ?>

