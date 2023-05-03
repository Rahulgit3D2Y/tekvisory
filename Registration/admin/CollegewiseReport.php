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
                                CampusWise Paid Collection Record
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="datatablesSimpl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Campus Name</th>
                                            <th>Total Student</th>

                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
    $count = 0;
     $sql=mysqli_query($con,"SELECT  campus.`campus_id`,campus.`campus_name`
                                    ,campuspermission.`permissioncampus_id`,campuspermission.`permissionuser_id`,campuspermission.`campuspermission_status` FROM `campus` INNER JOIN `campuspermission` on campuspermission.`permissioncampus_id`=campus.`campus_id`   WHERE  campuspermission.`permissionuser_id`='$log' AND campuspermission.`campuspermission_status`=\"True\" AND campus.`status`=\"Active\"");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;

$courseid=$result['campus_id'];

                                     
         $result12=mysqli_query($con,"SELECT COUNT(`student_id`) FROM `registration` WHERE `student_campus`=\"$courseid\" AND `fee_status`='Active'AND `session`='$activesession_record'");
        $row1=mysqli_fetch_array($result12);
        $upadted_user_login_name=$row1[0];


$user_count=$row1[0]+$user_count;
                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $result['campus_name']; ?></td>
                                            
                                            <td><?php echo $upadted_user_login_name; ?></td>

                                            

                                           
                                            
                                        </tr>
                                         <?php
                                    }
                                        ?>
                                     
                                       
                                       
                                       
                                    </tbody>
                  <tr>
    <th colspan="2">Total Count</th>
   
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
                                CampusWise UnPaid Collection Record
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                <table id="NewRecordTabl">
                                    <thead>
                                        <tr>
                                           <th>S.No</th>
                                            <th>Campus Name</th>
                                            <th>Total Student</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                       <?php
                                     
    $count = 0;
     $sql=mysqli_query($con,"SELECT  campus.`campus_id`,campus.`campus_name`
                                    ,campuspermission.`permissioncampus_id`,campuspermission.`permissionuser_id`,campuspermission.`campuspermission_status` FROM `campus` INNER JOIN `campuspermission` on campuspermission.`permissioncampus_id`=campus.`campus_id`   WHERE  campuspermission.`permissionuser_id`='$log' AND campuspermission.`campuspermission_status`=\"True\" AND campus.`status`=\"Active\"");
                                        while($result=mysqli_fetch_assoc($sql))
    {
        $count+=1;

$courseid=$result['campus_id'];

                                     
         $result12=mysqli_query($con,"SELECT COUNT(`student_id`) FROM `registration` WHERE `student_campus`=\"$courseid\" AND `fee_status`='Rejected'AND `session`='$activesession_record'");
        $row13=mysqli_fetch_array($result12);
        $upadted_user_login_name=$row13[0];
        $user_count1=$row13[0]+$user_count1;


                                        ?>

                                        <tr>        
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $result['campus_name']; ?></td>
                                            
                                            <td><?php echo $upadted_user_login_name; ?></td>
                                            

                                           
                                            
                                        </tr>
                                         <?php
                                    }
                                        ?>
                                       
                                       
                                       
                                       
                                       
                                    </tbody>
                                    <tr>
    <th colspan="2">Total Count</th>
    

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
      

                                              
                                           