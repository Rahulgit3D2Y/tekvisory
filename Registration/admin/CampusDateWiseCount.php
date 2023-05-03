<?php
include("include/header.php");
require("permission_check.php");
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-6">
                        
                        <div class="card mb-4">
                         
                        </div>
<form action="<?php echo $Currentwebsiteurl; ?>" method="POST" onSubmit="return check();" enctype="multipart/form-data">
                                            <div class="row mb-6">
                                             
                                          <div class="col-md-2">  
                                 <div class="form-floating mb-3 mb-md-0">
                                                        <input type="date" name="Firstdate" id="Firstdate" class="form-control" value="<?php echo $Firstdate;?>" required max="<?php echo date('Y-m-d'); ?>">
                                                        <label for="inputFirstdateSelect"> Select Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="date" name="Seconddate" value="<?php echo $Seconddate;?>" id="Seconddate" class="form-control" max="<?php echo date('Y-m-d'); ?>" required>
                                                        <label for="inputSeconddateSelect"> Select Date</label>
                                                        
                                                    </div>
                                                </div>
                                                 <div class="col-md-2">  
                                 <div class="form-floating mb-3 mb-md-0">
                         <select class="form-select" name="Campus" id="Campus" <?php if($login_user_type!="superuser"){?>required<?php } ?>  >
        <option selected="selected" value="" disabled >-- Select--</option>
          
          <?php
$rscampus=mysqli_query($con,"SELECT  campus.`campus_id`,campus.`campus_name`
                                    ,campuspermission.`permissioncampus_id`,campuspermission.`permissionuser_id`,campuspermission.`campuspermission_status` FROM `campus` INNER JOIN `campuspermission` on campuspermission.`permissioncampus_id`=campus.`campus_id`   WHERE  campuspermission.`permissionuser_id`='$log' AND campuspermission.`campuspermission_status`=\"True\" AND campus.`status`=\"Active\"");
      while($rowcampus=mysqli_fetch_array($rscampus))
{
?>
<option value='<?php echo $rowcampus[0]; ?>'<?php if($rowcampus[0]==$Campus) {   echo "selected"; }?>><?php echo $rowcampus[1];?></;?></option>

<?php
}
?>
                                                    </select>
                         <label for="Campus"> Campus</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" name="Course" id="Course" <?php if($login_user_type!="superuser"){?>required<?php } ?>  >
        <option selected="selected" value="" disabled>-- Select--</option>
          
          <?php
$rscampus=mysqli_query($con,"SELECT  course_detail.`course_id2`,course_detail.`course_name`
                                    ,mst_subjectpermission.`c_id`,mst_subjectpermission.`id`,mst_subjectpermission.`subjectpermission` FROM `course_detail` INNER JOIN `mst_subjectpermission` on mst_subjectpermission.`c_id`=course_detail.`course_id2`   WHERE  mst_subjectpermission.`id`='$log' AND mst_subjectpermission.`subjectpermission`=\"True\" AND course_detail.`status`=\"Active\"");
      while($rowcampus=mysqli_fetch_array($rscampus))
{
?>
<option value='<?php echo $rowcampus[0]; ?>'<?php if($rowcampus[0]==$Course) {   echo "selected"; }?>><?php echo $rowcampus[1];?></;?></option>

<?php
}
?>
                                                    </select>
                                                        <label for="Course"> Course</label>
                                                        
                                                    </div>
                                                </div>
                                                 <div class="col-md-2">
                                                    <div class="form-floating mb-3 mb-md-0">
                    <select class="form-select" name="Semester" id="Semester" <?php if($login_user_type!="superuser"){?>required<?php } ?> >
        <option selected="selected" value="" disabled>-- Select--</option>
          
          <option value="1"<?php if($Semester=="1") {   echo "selected"; }?>>1</option>
                                <option value="3"<?php if($Semester=="3") {   echo "selected"; }?>>3</option>
                                <option value="5"<?php if($Semester=="5") {   echo "selected"; }?>>5</option>
                                <option value="7"<?php if($Semester=="7") {   echo "selected"; }?>>7</option>
                                                    </select>
                                                        <label for="Semester"> Semester</label>
                                                        
                                                    </div>
                                                </div>
                                                

                                                <div class="col-md-1">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="btn btn-success "type="submit" name="search" id="search" Value="Search"/>
                                                    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                             
                                             </form>
                                             <?php 
    if(isset($search))
{
    $ReportType="Completed";
    $inputFirstdate = date("d-m-Y", strtotime($_POST['Firstdate'])); 
    $inputSeconddate =date("d-m-Y", strtotime($_POST['Seconddate'])); 
    $inputReportType="Completed";
        $inputCampus = $_POST['Campus'];
    $inputCourse = $_POST['Course'];
$inputSemester = $_POST['Semester'];
              if($ReportType=="Completed") {          
                                   ?>
                                   <!-- Code For Student Report-->
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Registration Payment Success Detail 
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                       
                                    <thead>
                                        <tr>
                                           <!-- <th  data-sortable="false"><input type="checkbox" onclick='selects()'>-->
                                            <th>S.No</th>
                                            <th>Reg. Date</th>
                                            <th>Payment Status</th>
                                            <th>Student Name</th>
                                            <th>Student Id</th>
                                            <th>Email ID</th>
                                            <th>Contact Number</th>
                                            <th>WhatsApp Number</th>
                                            <th>Gender</th>
                                            <th>Campus</th>
                                            <th>Course</th>
                                            <th>Semester</th>
                                            <th>Specilization</th>
                                            <th>DOB</th>
                                             
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `registration`  WHERE `fee_status`='Active' AND
                                            `session`='$activesession_record' AND `cpaid_date` BETWEEN '$inputFirstdate' AND '$inputSeconddate'AND `student_campus`LIKE \"%$inputCampus%\" AND `student_course`LIKE \"%$inputCourse%\"AND `student_semester`LIKE \"%$inputSemester%\"");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;

$updated_user_id=$result['updateby'];
$courseid=$result['student_course'];
$collegeid=$result['student_campus'];
$specilizationid=$result['student_specilization'];
//if($collegeid==1) { $college_name="GEU"; } elseif($collegeid==2) { $college_name="GEHU (DDN)"; } elseif ($collegeid==3) { $college_name="GEHU (BTL)"; } elseif($collegeid==4) { $college_name="GEHU (HLD)"; }

 $campusname=mysqli_query($con,"SELECT * FROM `campus` WHERE `campus_id`='$collegeid'");
                $campusnameresult=mysqli_fetch_array($campusname);
                $college_name=$campusnameresult['campus_acroym'];
                                     
                $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                $row12=mysqli_fetch_array($result123);
                $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                $coursequery=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`=\"$courseid\"");
                                        $resultcoursequery=mysqli_fetch_array($coursequery);
                                                          $course_name=$resultcoursequery['course_acroym'];
                  $specilizationquery=mysqli_query($con,"SELECT * FROM `specilization` WHERE `specilization_id`=\"$specilizationid\"");
    $resultspecilizationquery=mysqli_fetch_array($specilizationquery);
         $specilizationname=$resultspecilizationquery['specilization_name'];                                         

                                        ?>
                                       <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($result['createdtime']));  ?></td>
                                            <td><?php if($result['fee_status']=="Active") echo "Completed"; ?></td>
                                            <td><?php echo $result['student_name']; ?></td>
                                            <td><?php echo $result['student_id']; ?></td>
                                            <td><?php echo $result['student_email']; ?></td>
                                            <td><?php echo $result['student_number']; ?></td>
                                            <td><?php echo $result['student_whatsappnumber']; ?></td>
                                            <td><?php echo $result['student_gender']; ?></td>
                                             <td><?php echo $college_name; ?></td>
                                            <td><?php echo $course_name; ?></td>
                                            <td><?php echo $result['student_semester']; ?></td>
                                             <td><?php echo $specilizationname; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($result['student_dob']));  ?></td>
                                            
                                    
                                        </tr>


<?php

  }
?>                          </tbody>
                                </table>
                                  </div>
                        </div>
                   


                        
                    </div>
                                <!-- End OF Stduent Report--->
                           <?php } elseif($ReportType=="Pending") { ?>


  <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registration Payment Pending Detail 
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Reg. Date</th>
                                            <th>Payment Status</th>
                                            <th>Student Name</th>
                                            <th>Student Id</th>
                                            <th>Email ID</th>
                                            <th>Contact Number</th>
                                            <th>WhatsApp Number</th>
                                            <th>Gender</th>
                                            <th>Campus</th>
                                            <th>Course</th>
                                            <th>Semester</th>
                                            <th>Specilization</th>
                                            <th>DOB</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
                                        $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `registration`  WHERE `fee_status`='Rejected' AND
                                            `session`='$activesession_record' AND `cpaid_date` BETWEEN '$inputFirstdate' AND '$inputSeconddate'AND `student_campus`LIKE \"%$inputCampus%\" AND `student_course`LIKE \"%$inputCourse%\"AND `student_semester`LIKE \"%$inputSemester%\"");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;

$updated_user_id=$result['updateby'];
$courseid=$result['student_course'];
$collegeid=$result['student_campus'];
$specilizationid=$result['student_specilization'];
//if($collegeid==1) { $college_name="GEU"; } elseif($collegeid==2) { $college_name="GEHU (DDN)"; } elseif ($collegeid==3) { $college_name="GEHU (BTL)"; } elseif($collegeid==4) { $college_name="GEHU (HLD)"; }

 $campusname=mysqli_query($con,"SELECT * FROM `campus` WHERE `campus_id`='$collegeid'");
                $campusnameresult=mysqli_fetch_array($campusname);
                $college_name=$campusnameresult['campus_acroym'];
                                     
                $result123=mysqli_query($con,"SELECT * FROM `user` WHERE `id`=\"$created_user_id\"");
                $row12=mysqli_fetch_array($result123);
                $user_login_name=$row12['first_name']." ".$row12['middle_name']." ".$row12['last_name'];
                $coursequery=mysqli_query($con,"SELECT * FROM `course_detail` WHERE `course_id2`=\"$courseid\"");
                                        $resultcoursequery=mysqli_fetch_array($coursequery);
                                                          $course_name=$resultcoursequery['course_acroym'];
                                                          
 $specilizationquery=mysqli_query($con,"SELECT * FROM `specilization` WHERE `specilization_id`=\"$specilizationid\"");
    $resultspecilizationquery=mysqli_fetch_array($specilizationquery);
         $specilizationname=$resultspecilizationquery['specilization_name'];
                                        ?>
                                       <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($result['createdtime']));  ?></td>
                                            <td><?php if($result['fee_status']=="Rejected") echo "Pending"; ?></td>
                                            <td><?php echo $result['student_name']; ?></td>
                                            <td><?php echo $result['student_id']; ?></td>
                                            <td><?php echo $result['student_email']; ?></td>
                                            <td><?php echo $result['student_number']; ?></td>
                                            <td><?php echo $result['student_whatsappnumber']; ?></td>
                                            <td><?php echo $result['student_gender']; ?></td>
                                             <td><?php echo $college_name; ?></td>
                                            <td><?php echo $course_name; ?></td>
                                            <td><?php echo $result['student_semester']; ?></td>
                                            <td><?php echo $specilizationname; ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($result['student_dob']));  ?></td>
                                            
                                    
                                        </tr>
                                         <?php
                                    }
                                        ?>

                                       
                                       
                                       
                                       
                                    
                                       
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
  </div>






                           <?php }  }  ?>

                    
                       
                </main>


<?php
          include("include/footer.php");  
      ?>
      

                                              
