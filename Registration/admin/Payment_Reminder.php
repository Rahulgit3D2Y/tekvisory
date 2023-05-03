<?php
include("include/header.php");
require("permission_check.php");
?>


                 
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                      
                        <div class="card mb-4">
                              
                                
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Registration Deatil
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Payment Status</th>
                                            <th>Student Name</th>
                                            <th>Student Id</th>
                                            <th>Email ID</th>
                                            <th>Payment Url</th>
                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
                                       $count = 0;
                                        $sql=mysqli_query($con,"SELECT * FROM `registration` WHERE `fee_status`='Rejected' AND `session`='$activesession_record' ");
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

                
                //$useramount=$usercountrow12['first_name']." ".$usercountrow12['middle_name']." ".$usercountrow12['last_name'];


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            
                                            <td><?php if($result['fee_status']=="Rejected") echo "Pending"; ?></td>
                                            <td><?php echo $result['student_name']; ?></td>
                                            <td><?php echo $result['student_id']; ?></td>
                                            <td><?php echo $result['student_email']; ?></td>
                                            <td>localhost/tekvisory/Registration/Complete_PaymentProcess.php?id=<?php echo urlencode(base64_encode($result['receipt_number'])); ?></td>
                                            
                                           
                                            
                                           
                                             
                                            
                                           
                                        

                                           
                                            
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

                </main>

<?php
          include("include/footer.php");  
      ?>
      

                                              
                                           