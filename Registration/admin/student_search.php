<?php
include("include/header.php");
require("permission_check.php");
?>
<?php
 $StudentId=$_POST['inputStudentId'];
 extract($_POST);
extract($_GET);

 ?>


<div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-1">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-0">Student Search</h3></div>
                                    <div class="card-body">
                                         <form action="" method="post"  onSubmit="return check();" enctype="multipart/form-data" >
                                            <div class="row mb-3">
                                               <?php //echo $activesession_record; 
                                               //echo  $StudentId;?>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <input class="form-control" id="inputStudentId" name="inputStudentId" type="text"   placeholder="Enter your student Id" required value="<?php echo $StudentId; ?>"/>
                                                        <label for="inputStudentId">Student ID /  Name /  Mobile Number /  Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="btn btn-success "type="submit" name="search" id="search" Value="Search"/>
                                                    </div>
                                                </div>
                                            
                                                        
                                                    
                 
                                      
                               
                                        
                                        </div>
                                    </div>
                        
    </form>
                                </div>
                                
    
                            </div>
                           
                        </div>
                  <br>
                  <?php if($StudentId) { ?>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Student Search
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Reg. Date</th>
                                            <th>Payment. Date</th>
                                            <th>Payment Status</th>
                                            <th>Received By</th>
                                            <th>Payment Mode</th>
                                            <th>Order Id</th>
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
                                            <th>Certificate Download</th>
                                            <th>Update</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                       <?php
                                     
$count = 0;
 $sql=mysqli_query($con,"SELECT * FROM `registration` WHERE `student_id` = '$StudentId' OR `student_name` LIKE '%$StudentId%'  OR `student_number` LIKE '%$StudentId%'  OR `student_whatsappnumber` LIKE '%$StudentId%' OR `student_gender` LIKE '%$StudentId%' OR `student_email` LIKE '%$StudentId%'  OR `order_id` LIKE '%$StudentId%'  OR `receipt_number` LIKE '%$StudentId%' AND`session`='$activesession_record'  ");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;
$id=$result['payment_id'];
$updated_user_id=$result['updateby'];
$courseid=$result['student_course'];
$collegeid=$result['student_campus'];
$specilizationid=$result['student_specilization'];
$created_user_id=$result['feeupdateby'];
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
                                            <td><?php echo  date("d-m-Y", strtotime($result['createdtime']));  ?></td>
                                            <td><?php echo  date("d-m-Y", strtotime($result['cpaid_date']));  ?></td>
                                            <td><?php if($result['fee_status']=="Active") echo "Completed"; elseif($result['fee_status']=="Rejected") echo "Pending"; ?></td>
                                            <td><?php if($user_login_name) { echo $user_login_name; } else{ echo "Auto Generated"; } ?></td>
                                             <td><?php echo $result['paid_mode']; ?></td>
                                             <td><?php echo $result['order_id']; ?></td>
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
                                            <td><?php  if($result['certificate_name']) { echo "Yes"; } else {echo "No"; } ?></td>
                                            <td><a href="update_student.php?id=<?php echo $id;?>"><span class='fas fa-edit'></span></a></td>
                                           
                                            
                                           
                                             
                                            
                                           
                                        

                                           
                                            
                                        </tr>
                                         <?php
                                    }
                                        ?>


                                       
                                    </tbody>
                                </table>
                            </div>
                                </div>
                                 </div>
    <?php } ?>
                    
                </main>
            
            
        <?php
include("include/footer.php");
    ?>

