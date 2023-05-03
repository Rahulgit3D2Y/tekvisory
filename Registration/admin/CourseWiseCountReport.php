<?php
include("include/header.php");
//require("permission_check.php");
?>


                     
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                            
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                CourseWise Paid Collection Record
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Campus</th>
                                            <th>Course</th>
                                            <th>Total Count</th>

                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
    $count = 0;
     $sql=mysqli_query($con,"SELECT  campus.`campus_id`,campus.`campus_name`
                                    ,campuspermission.`permissioncampus_id`,campuspermission.`permissionuser_id`,campuspermission.`campuspermission_status` FROM `campus` INNER JOIN `campuspermission` on campuspermission.`permissioncampus_id`=campus.`campus_id`   WHERE  campuspermission.`permissionuser_id`='$log' AND campuspermission.`campuspermission_status`=\"True\" AND campus.`status`=\"Active\"");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        //$count+=1;

$Campusid=$result['campus_id'];

$coursesql=mysqli_query($con,"SELECT  course_detail.`course_id2`,course_detail.`course_name`
                                    ,mst_subjectpermission.`c_id`,mst_subjectpermission.`id`,mst_subjectpermission.`subjectpermission` FROM `course_detail` INNER JOIN `mst_subjectpermission` on mst_subjectpermission.`c_id`=course_detail.`course_id2`   WHERE  mst_subjectpermission.`id`='$log' AND mst_subjectpermission.`subjectpermission`=\"True\" AND course_detail.`status`=\"Active\"");
                                        while($coursesqlresult=mysqli_fetch_assoc($coursesql))
    {
        $count+=1;

$courseid=$coursesqlresult['course_id2'];
                                     
         $result12=mysqli_query($con,"SELECT COUNT(`student_id`) FROM `registration` WHERE `student_campus`=\"$Campusid\" AND `student_course`=\"$courseid\" AND `fee_status`='Active' AND `session`='$activesession_record'");
        $row1=mysqli_fetch_array($result12);
        $upadted_user_login_name=$row1[0];


$user_count=$row1[0]+$user_count;
                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $result['campus_name']; ?></td>
                                             <td><?php echo $coursesqlresult['course_name']; ?></td>
                                            <td><?php echo $upadted_user_login_name; ?></td>

                                            

                                           
                                            
                                        </tr>
                                         <?php
                                    }
                                }
                                        ?>
                                     
                                       
                                       
                                       
                                    </tbody>
                  <tr>
    <th colspan="3">Total Count</th>
   
    <td><?php echo $user_count; ?></td>
</tr> 
                                       
                                </table>
                            </div>
                        </div>
                    </div>
  </div>

<div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                            
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                CourseWise UnPaid Collection Record
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="NewRecordTabl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Campus</th>
                                            <th>Course</th>
                                            <th>Total Count</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
    $count = 0;
     $sql=mysqli_query($con,"SELECT  campus.`campus_id`,campus.`campus_name`
                                    ,campuspermission.`permissioncampus_id`,campuspermission.`permissionuser_id`,campuspermission.`campuspermission_status` FROM `campus` INNER JOIN `campuspermission` on campuspermission.`permissioncampus_id`=campus.`campus_id`   WHERE  campuspermission.`permissionuser_id`='$log' AND campuspermission.`campuspermission_status`=\"True\" AND campus.`status`=\"Active\"");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        //$count+=1;

$Campusid=$result['campus_id'];

$coursesql=mysqli_query($con,"SELECT  course_detail.`course_id2`,course_detail.`course_name`
                                    ,mst_subjectpermission.`c_id`,mst_subjectpermission.`id`,mst_subjectpermission.`subjectpermission` FROM `course_detail` INNER JOIN `mst_subjectpermission` on mst_subjectpermission.`c_id`=course_detail.`course_id2`   WHERE  mst_subjectpermission.`id`='$log' AND mst_subjectpermission.`subjectpermission`=\"True\" AND course_detail.`status`=\"Active\"");
                                        while($coursesqlresult=mysqli_fetch_assoc($coursesql))
    {
        $count+=1;

$courseid=$coursesqlresult['course_id2'];
                                     
         $result123=mysqli_query($con,"SELECT COUNT(`student_id`) FROM `registration` WHERE `student_campus`=\"$Campusid\" AND `student_course`=\"$courseid\" AND `fee_status`='Rejected' AND `session`='$activesession_record'");
        $row12=mysqli_fetch_array($result123);
        $upadted_user_login_name=$row12[0];


$user_count1=$row12[0]+$user_count1;
                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $result['campus_name']; ?></td>
                                             <td><?php echo $coursesqlresult['course_name']; ?></td>
                                            <td><?php echo $upadted_user_login_name; ?></td>

                                            

                                           
                                            
                                        </tr>
                                         <?php
                                    }
                                }
                                        ?>
                                       
                                       
                                       
                                       
                                       
                                    </tbody>
                                    <tr>
    <th colspan="3">Total Count</th>
    

    <td><?php echo $user_count1; ?></td>
</tr> 
                                </table>
                            </div>
                        </div>
                    </div>
  </div>


                </main>

<?php
          include("include/footer.php");  
      ?>
      

                                              
                                           