<?php
include("include/header.php");
require("permission_check.php");
?>

<script type="text/javascript">
     function CourseChangeFunction() {
        selectElement_fee = document.querySelector('#inputCourseName');
        selectElement_fee_output = selectElement_fee.value;
        if(selectElement_fee_output == "123")
        {
       document.getElementById("inputStudentSpecilization").readOnly = false;
       document.getElementById("inputStudentSpecilization").disabled = false;
       //document.getElementById("inputStudentSpecilization").value=" ";
       document.getElementById("inputStudentSpecilization").required = true;
        
         }
         else 
         {
        document.getElementById("inputStudentSpecilization").readOnly = true;
       document.getElementById("inputStudentSpecilization").disabled = true;
       document.getElementById("inputStudentSpecilization").value="none";
       document.getElementById("inputStudentSpecilization").required = false;

         }
     }
    
</script>
<?php
extract($_REQUEST);
 $id=$_GET['id'];
date_default_timezone_set('Asia/Kolkata');      
$date=date("d-m-Y h:i:sa");

$updatedatatstudentquery=mysqli_query($con,"SELECT * FROM `registration` WHERE `payment_id`='$id'");
$result=mysqli_fetch_assoc($updatedatatstudentquery)or die("");
if(isset($submit))
{
   
   $dateyear=$_POST['inputStudentSession']; 
    $studentsessionquery=mysqli_query($con,"SELECT * FROM `session`  WHERE `fyear`='$dateyear'");
            $studentsessionqueryrow1=mysqli_fetch_array($studentsessionquery);
            $studentsessionyearrecord = $studentsessionqueryrow1['session_year'];

            if($result['student_id']!=$inputStudentId)
            {
$studentidcheck=mysqli_query($con,"SELECT * FROM `registration` WHERE `student_id`='$inputStudentId' AND `session`='$studentsessionyearrecord'");
if (mysqli_num_rows($studentidcheck)>0)
{
    echo "<script language='javascript'>alert('Student ID Already Exits');window.location='update_student.php?id=$id'</script>";
exit;
}  
}
//echo "<script language='javascript'>alert('$studentsessionyearrecord')</script>";
$studentupdatequery="UPDATE `registration` SET `student_id`='$inputStudentId',`student_name`='$inputStudentName',`student_number`='$inputStudentNumber',`student_email`='$inputStudentEmail',`student_gender`='$inputStudentGender',`student_course`='$inputCourseName',`student_semester`='$inputStudentSemester',`student_campus`='$inputStudentCampus',`student_whatsappnumber`='$inputStudentWhatsappNumber',`student_dob`='$inputStudentDob',`student_specilization`='$inputStudentSpecilization',`session`='$studentsessionyearrecord',`updateby`='$log',`updatetime`='$date' WHERE `payment_id` = '$id' ";

mysqli_query($con,$studentupdatequery);

echo "<script language='javascript'>alert(' \"$inputStudentName\" Update Successfully');window.location='update_student.php?id=$id'</script>";
    
}

?>

                     
           <!-- main content -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-2">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Add Student</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post" onSubmit="return check();">
                                            <div class="row mb-3">
                                                <div class="col-md-2">

                              <div class="form-floating mb-3 mb-md-0">
                                                        <select class="form-select" name="inputStudentSession" id="inputStudentSession" value="<?php echo $result['session'];?>"  required="inputStudentSession">
          <option selected="selected" disabled selected>-- Select an option --</option>
<?php
$sequery=mysqli_query($con,"SELECT * FROM `session`  ORDER BY `session`.`session_year` DESC");
      while($rowsequery=mysqli_fetch_array($sequery))
{
if($rowsequery[1]==$result['session'])
{
echo "<option value='$rowsequery[3]' selected='selected'>$rowsequery[1]</option>";
}
else
{
   echo "<option value='$rowsequery[3]'>$rowsequery[1]</option>";

}

}
?>

      </select>
                                                        <label for="inputStudentSession"> Session</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0"><?php if($login_user_type=="superuser") { ?>
                                                        <input class="form-control" id="inputStudentId" name="inputStudentId" type="text" value="<?php echo $result['student_id']; ?>" />
                                                            <?php } else { ?>
                                                                 <input class="form-control" id="inputStudentId" name="inputStudentId" type="text" value="<?php echo $result['student_id']; ?>" readonly />
                                                            <?php } ?>
                                                        <label for="inputStudentId">Student ID</label>
                                                    </div>
                                                </div>
                                                  <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputStudentName" name="inputStudentName" type="text" placeholder="Enter your First Name" 
                                                        required="inputStudentName"  value="<?php echo $result['student_name'];?>" />
                                                        <label for="inputStudentName">First Name</label>
                                                    </div>
                                                </div>
                                              
                                                
                                               
                                               <div class="col-md-2">
                                                   <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputStudentNumber" name="inputStudentNumber" type="text" placeholder="Enter your Student Number"  value="<?php echo $result['student_number'];?>"
                                                        required="inputStudentNumber" max="10" maxlength="10" />
                             <label for="inputStudentNumber">Student Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputStudentEmail" name="inputStudentEmail" type="email" placeholder="Enter your Email Id" required="inputStudentEmail" value="<?php echo $result['student_email'];?>" />
                                                        <label for="inputStudentEmail">Student Email Id</label>
                                                    </div>
                                                </div>

                                       
                                                
                                                
                                            </div>
                                           
                                          
                                             <div class="row mb-3">
                                              
                                              
                                                  <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                     <select class="form-select" name="inputStudentGender"  value="<?php echo $result['student_gender'];?>" id="inputStudentGender" required="inputStudentGender">
          <option selected="selected" disabled selected>-- Select an option --</option>
          <option  value="Male" <?php
       if($result["student_gender"]=="Male")
       {
        echo "selected";
       }
       ?>>Male</option>
 <option  value="Female" <?php
       if($result["student_gender"]=="Female")
       {
        echo "selected";
       }
       ?>>Female</option>
 <option  value="Other" <?php
       if($result["student_gender"]=="Other")
       {
        echo "selected";
       }
       ?>>Other</option>
                                                        </select>
                                                        <label for="inputStudentGender">Gender</label>
                                                    </div>
                                                </div> 
                                                <div class="col-md-3">
                  <div class="form-floating mb-3 mb-md-0">
                     <select class="form-select" name="inputStudentCampus"  value="<?php echo $result['student_campus'];?>" id="inputStudentCampus" required="inputStudentCampus">
          <option selected="selected" disabled selected>-- Select an option --</option>
            <?php
$campusselect=mysqli_query($con,"SELECT * FROM `campus` WHERE  `status`='Active'");
      while($resultcampusselect=mysqli_fetch_array($campusselect))
{
    if($resultcampusselect[0]==$result['student_campus'])
{
echo "<option value='$resultcampusselect[0]' selected='selected'>$resultcampusselect[1]</option>";
}
else
{
   echo "<option value='$resultcampusselect[0]'>$resultcampusselect[1]</option>";

}


}
?>
                                                        </select>
                                                        <label for="inputStudentCampus">Campus</label>
                                                    </div>
                                                </div> 

                                       <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" name="inputCourseName" id="inputCourseName" value="<?php echo $result['student_course'];?>" onchange="CourseChangeFunction()" required="inputCourseName">
          <option selected="selected" disabled selected>-- Select an option --</option>
<?php
$rscourse=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `status` = \"Active\"",$cn);
      while($rowcourse=mysqli_fetch_array($rscourse))
{
if($rowcourse[1]==$result['student_course'])
{
echo "<option value='$rowcourse[1]' selected='selected'>$rowcourse[2]</option>";
}
else
{
   echo "<option value='$rowcourse[1]'>$rowcourse[2]</option>";

}

}

?>
      </select>
                        <label for="inputCourseName"> Select Course</label>
                                                    </div>
                                                </div>

                                                  <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                         <select class="form-select" name="inputStudentSemester"  value="<?php echo $result['student_semester'];?>" id="inputStudentSemester" required="inputStudentSemester">
          <option selected="selected" disabled selected>-- Select an option --</option>
        <?php for($i=1; $i<=10; ++$i) { ?>
  <option  value="<?php echo $i; ?>"<?php
       if($result["student_semester"]==$i)
       {
        echo "selected";
       }
       ?>><?php echo $i; ?></option>
 
        <?php } ?>

                                                        </select>
                                                        <label for="inputStudentSemester">Semester</label>
                                                    </div>
                                                </div> 


                
                                                </div>
                                                
                                         
                                            
                                             <div class="row mb-3">
                                                 <div class="col-md-4">
                                                    <div class="form-floating mb-3 mb-md-0">
                     <select class="form-select" name="inputStudentSpecilization" id="inputStudentSpecilization" value="<?php echo $result['student_specilization'];?>"  required="inputStudentSpecilization" <?php if(!$result['student_specilization']) { ?>disabled <?php } ?>>
          <option selected="selected" disabled selected>-- Select an option --</option>
<?php
$courseselect=mysqli_query($con,"SELECT * FROM `specilization` WHERE `status` = \"Active\"",$cn);
      while($resultcourseselect=mysqli_fetch_array($courseselect))
{
if($resultcourseselect[0]==$result['student_specilization'])
{
echo "<option value='$resultcourseselect[0]' selected='selected'>$resultcourseselect[1]</option>";
}
else
{
   echo "<option value='$resultcourseselect[0]'>$resultcourseselect[1]</option>";

}

}

?>
      </select>
                        <label for="inputStudentSpecilization"> Select Specilization</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
    <input class="form-control" id="inputStudentWhatsappNumber" name="inputStudentWhatsappNumber" type="text" placeholder="Enter your Student Number"  value="<?php echo $result['student_whatsappnumber'];?>"
                                                        required="inputStudentWhatsappNumber" max="10" maxlength="10" />
                             <label for="inputStudentWhatsappNumber">Student Whatsapp Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
    <input class="form-control" id="inputStudentDob" name="inputStudentDob" type="date" placeholder="Enter your Student Number"  value="<?php echo $result['student_dob'];?>"
                                                        required="inputStudentDob"  />
                             <label for="inputStudentDob">Student Date Of Birth</label>
                                                    </div>
                                                </div>
                                             </div>    
                                                  


                                          
                                            <div class="mt-4 mb-0" align="center">
                                                 <input class="btn btn-success "type="submit" name="submit" id="submit" Value="Update"/>                                            </div>
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


<?php
include("include/footer.php");
?>